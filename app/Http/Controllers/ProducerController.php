<?php

namespace App\Http\Controllers;

use App\Maker;
use App\Pref;
use App\Shop;
use Illuminate\Http\Request;
use Config;

class ProducerController extends Controller
{
    public function index(Request $request)
    {
        $list = Maker::listMaker()->orderBy('id', 'desc');
        $key = $request->keyword;
        $items = $request->items;
        if (isset($key) && !empty($key)) {
            $list = $list->where('maker_name', 'like', '%' . $key . '%');
            $list->paginate(is_null($items) ? 5 : $items);
        }
        $list = $list->paginate(is_null($items) ? 5 : $items);
        return view('admin.item-manager.producer.list', ['list' => $list, 'key' => $key, 'items' => $items]);
    }

    public function create()
    {
        $list = Maker::all();
        $pref = Pref::select('name')->get();
        $shop = Shop::select('shop_name')->get();
        return view('admin.item-manager.producer.create', ['list' => $list, 'shop' => $shop, 'pref' => $pref]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'maker_code' => 'required|numeric|digits_between:1,127',
            'maker_name' => 'required|max:255',
            'zipcode' => 'max:127',
            'tel' => 'max:255',
            'ward' => 'max:255',
            'addr1' => 'max:255',
            'addr2' => 'max:255',
        ],
            [
                'maker_code.required' => 'Producer code' . config('constant.err.required'),
                'maker_code.numeric' => 'Producer code' . config('constant.err.numeric'),
                'maker_code.digits_between' => 'Producer code' . config('constant.err.contain'),
                'maker_name.required' => 'Producer name' . config('constant.err.required'),
                'maker_name.max' => 'Producer name' . config('constant.err.longContain'),
                'zipcode.max' => 'Post code' . config('constant.err.contain'),
                'tel.max' => 'Phone number' . config('constant.err.longContain'),
                'ward.max' => 'District' . config('constant.err.longContain'),
                'addr1.max' => 'Town' . config('constant.err.longContain'),
                'addr2.max' => 'Detail address' . config('constant.err.longContain'),
            ]
        );
        $data = $request->only(['maker_code', 'maker_name', 'tel', 'zipcode', 'addr1', 'shop_id', 'addr2', 'pref_id']);
        $res = Maker::createProducer($data);
        if ($res) {
            return redirect()->route('producer')->with('success', 'Producer created successfully');
        }
        return redirect()->back()->with('error', 'Producer error');
    }

    public function edit($id)
    {
        $list = Pref::all();
        $shop = Shop::all();
        $producer = Maker::find($id);
        return view('admin.item-manager.producer.update', ['list' => $list, 'producer' => $producer, 'shop' => $shop]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'maker_code' => 'required|numeric|digits_between:1,127',
            'maker_name' => 'required|max:255',
            'zipcode' => 'max:127',
            'tel' => 'max:255',
            'ward' => 'max:255',
            'addr1' => 'max:255',
            'addr2' => 'max:255',
        ],
            [
                'maker_code.required' => 'Producer code' . config('constant.err.required'),
                'maker_code.numeric' => 'Producer code' . config('constant.err.numeric'),
                'maker_code.digits_between' => 'Producer code' . config('constant.err.contain'),
                'maker_name.required' => 'Producer name' . config('constant.err.required'),
                'maker_name.max' => 'Producer name' . config('constant.err.longContain'),
                'zipcode.max' => 'Post code' . config('constant.err.contain'),
                'tel.max' => 'Phone number' . config('constant.err.longContain'),
                'ward.max' => 'District' . config('constant.err.longContain'),
                'addr1.max' => 'Town' . config('constant.err.longContain'),
                'addr2.max' => 'Detail address' . config('constant.err.longContain'),
            ]
        );
        $list = Maker::select('status')->where('id', $id)->first();
        if ($list->status == 1) {
            $data = $request->only(['maker_code', 'maker_name', 'tel', 'zipcode', 'addr1', 'shop_id', 'addr2', 'pref_id']);
            $result = Maker::updateProducer($data, $id);
            if ($result) {
                return redirect()->route('producer')->with('success', 'Producer updated successfully');
            }
            return redirect()->back()->with('error', 'Producer error');
        }
            return redirect()->back()->with('error', config('constant.err.dataErr'));
    }

    public function delete(Request $request, $id)
    {
        $list = Maker::select('status')->where('id', $id)->first();
        if ($list->status == 1) {
            $del = Maker::find($id);
            $del->status = $request->status = 2;
            $del->save();
            return redirect()->route('producer')->with('success', 'Producer delete successfully');
        }
            return redirect()->back()->with('error', config('constant.err.dataErr'));
    }

}