<?php

namespace App\Http\Controllers;

use App\Rental;
use App\Shop;
use Illuminate\Http\Request;
use Config;

class RentalController extends Controller
{
    public function index(Request $request)
    {
        $list = Rental::list();
        $items = $request->items;
        $key = $request->keyword;
        $shop = $request->shop;
        if (isset($key) && !empty($key)) {
            $list = $list->where('retal_name', 'like', '%' . $key . '%');
        }
        if (isset($shop)) {
            $list = $list->where('shop_id', $shop);
        }
        $list = $list->paginate(is_null($items) ? 5 : $items);
        $option = Shop::all();
        $store = $option->where('id', $shop)->first();
        return view('admin.basic-setting.rental-listing.list', ['list' => $list, 'option' => $option, 'items' => $items, 'key' => $key, 'shop' => $shop, 'store' => $store]);
    }

    public function create()
    {
        $store = Shop::all();
        return view('admin.basic-setting.rental-listing.create', ['store' => $store]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'fee' => 'required|numeric|digits_between:1,10',
            'retal_name' => 'required|max:127',
            'shop_id' => 'required',
        ],
            [
                'shop_id.required' => 'Store Name' . config('constant.err.required'),
                'retal_name.required' => 'Rental Service Name' . config('constant.err.required'),
                'retal_name.max' => 'Rental Service Name' . config('constant.err.contain'),
                'fee.required' => 'Rental Service Rate' . config('constant.err.required'),
                'fee.numeric' => 'Rental Service Rate' . config('constant.err.numeric'),
                'fee.digits_between' => 'Rental Service Rate' . config('constant.err.maxMin'),
            ]
        );
        $data = $request->only(['id', 'retal_name', 'status', 'shop_id', 'fee', 'retal_description']);
        $res = Rental::createRental($data);
        if ($res) {
            return redirect()->back()->with('success', 'Rental created successfully');
        }
        return redirect()->back()->with('error', 'Rental listings error');
    }

    public function edit($id)
    {
        $list = Rental::find($id);
        $store = Shop::all();
        return view('admin.basic-setting.rental-listing.update', ['list' => $list, 'store' => $store]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'fee' => 'required|numeric|digits_between:1,10',
            'retal_name' => 'required|max:127',
            'shop_id' => 'required',
        ],
            [
                'shop_id.required' => 'Store Name' . config('constant.err.required'),
                'retal_name.required' => 'Rental Service Name' . config('constant.err.required'),
                'retal_name.max' => 'Rental Service Name' . config('constant.err.contain'),
                'fee.required' => 'Rental Service Rate' . config('constant.err.required'),
                'fee.numeric' => 'Rental Service Rate' . config('constant.err.numeric'),
                'fee.digits_between' => 'Rental Service Rate' . config('constant.err.maxMin'),
            ]
        );
        $list = Rental::select('status')->where('id', $id)->first();
        if ($list->status == 1) {
            $data = $request->only(['id', 'retal_name', 'status', 'shop_id', 'fee', 'retal_description']);
            $res = Rental::updateRental($data, $id);
            if ($res) {
                return redirect()->route('rental-listings')->with('success', 'Rental updated successfully');
            }
            return redirect()->back()->with('error', 'Rental listings error');
        }
        return redirect()->back()->with('error', config('constant.err.dataErr'));
    }

    public function destroy(Request $request, $id)
    {
        $list = Rental::select('status')->where('id', $id)->first();
        if ($list->status == 1) {
            $del = Rental::find($id);
            $del->status = $request->status = 2;
            $del->save();
            return redirect()->route('rental-listings')->with('success', 'Rental Service delete successfully');
        }
        return redirect()->back()->with('error', config('constant.err.dataErr'));
    }
}
