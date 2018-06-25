<?php

namespace App\Http\Controllers;

use App\CustomerType;
use App\ListService;
use App\Shop;
use Illuminate\Http\Request;
use Config;

class ListServiceController extends Controller
{
    public function index(Request $request)
    {
        $list = ListService::list();
        $items = $request->items;
        $key = $request->keyword;
        $shop = $request->shop;
        if (isset($key) && !empty($key)) {
            $list = $list->where('service_name', 'like', '%' . $key . '%');
        }
        if (isset($shop)) {
            $list = $list->where('shop_id', $shop);
        }
        $list = $list->paginate(is_null($items) ? 5 : $items);
        $option = Shop::all();
        $store = $option->where('id', $shop)->first();
        return view('admin.basic-setting.service-package.list', ['list' => $list, 'option' => $option, 'items' => $items, 'key' => $key, 'shop' => $shop, 'store' => $store]);
    }

    public function create()
    {
        $style = CustomerType::all();
        $store = Shop::all();
        return view('admin.basic-setting.service-package.create', ['style' => $style, 'store' => $store]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'fee' => 'numeric|digits_between:1,10',
            'service_name' => 'required|max:127',
            'service_description' => 'max:255',
        ],
            [
                'service_name.required' => 'Service Name' . config('constant.err.required'),
                'service_name.max' => 'Service Name' . config('constant.err.contain'),
                'fee.numeric' => 'Service Rate' . config('constant.err.numeric'),
                'fee.digits_between' => 'Service Rate' . config('constant.err.maxMin'),
                'service_description.max' => 'Service Introduction' . config('constant.err.longContain'),
            ]
        );
        $data = $request->only(['id', 'service_name', 'fee', 'service_description', 'status', 'shop_id', 'customer_type_id']);
        $res = ListService::createService($data);
        if ($res) {
            return redirect()->back()->with('success', 'Service created successfully');
        }
        return redirect()->back()->with('error', 'Service error');
    }

    public function edit($id)
    {
        $value = ListService::find($id);
        $style = CustomerType::all();
        $store = Shop::all();
        return view('admin.basic-setting.service-package.update', ['style' => $style, 'store' => $store, 'value' => $value]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'fee' => 'numeric|digits_between:1,10',
            'service_name' => 'required|max:127',
            'service_description' => 'max:255',
        ],
            [
                'service_name.required' => 'Service Name' . config('constant.err.required'),
                'service_name.max' => 'Service Name' . config('constant.err.contain'),
                'fee.numeric' => 'Service Rate' . config('constant.err.numeric'),
                'fee.digits_between' => 'Service Rate' . config('constant.err.maxMin'),
                'service_description.max' => 'Service Introduction' . config('constant.err.longContain'),
            ]
        );
        $list = ListService::select('status')->where('id', $id)->first();
        if ($list->status == 1) {
            $data = $request->only(['id', 'service_name', 'fee', 'service_description', 'status', 'shop_id', 'customer_type_id']);
            $res = ListService::updateService($data, $id);
            if ($res) {
                return redirect()->route('list-of-service-packages')->with('success', 'Service created successfully');
            }
            return redirect()->back()->with('error', 'Service error');
        }
        return redirect()->back()->with('error', config('constant.err.dataErr'));
    }

    public function destroy(Request $request, $id)
    {
        $list = ListService::select('status')->where('id', $id)->first();
        if ($list->status == 1) {
            $del = ListService::find($id);
            $del->status = $request->status = 2;
            $del->save();
            return redirect()->route('list-of-service-packages')->with('success', 'Service delete successfully');
        }
        return redirect()->back()->with('error', config('constant.err.dataErr'));
    }
}