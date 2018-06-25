<?php

namespace App\Http\Controllers;

use App\Pref;
use App\Shop;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index(Request $request)
    {
        $list = Shop::listShop();
        $items = $request->items;
        $key = $request->keyword;
        if (isset($key) && !empty($key)){
            $list = $list->where('shop_name','like', '%'.$key.'%');
        }
        $list = $list->paginate(is_null($items)?5:$items);
        $links = str_replace('/?','?',$list->render());
        return view('admin.shop-manager.list', ['list' => $list, 'items'=>$items, 'key'=>$key]);
    }

    public function create()
    {
        $list = Pref::all();
        return view('admin.shop-manager.create', ['list' => $list]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'register_price' => 'required|numeric',
            'second_register_price' => 'required',
            'other_shop_entry_fee' => 'required',
        ],
            [
                'required' => ':attribute required',
                'min' => ':attribute min',
                'max' => ':attribute max',
                'numeric' => ':attribute numeric only',
            ]
        );
        $data = $request->only(['shop_code', 'shop_name', 'tel', 'addr1', 'addr2', 'register_price', 'second_register_price', 'other_shop_entry_fee', 'pref_id']);
        $res = Shop::createShop($data);
        if ($res) {
            return redirect()->route('shop-manager')->with('success', 'Shop created successfully');
        }
        return redirect()->back()->with('error', 'Shop error');
    }

    public function show(Shop $shop)
    {

    }

    public function edit($id)
    {
        $list = Pref::all();
        $shop = Shop::findOrFail($id);
        return view('admin.shop-manager.update', ['shop' => $shop, 'list' => $list]);

    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'register_price' => 'required|numeric',
            'second_register_price' => 'required',
            'other_shop_entry_fee' => 'required',
        ],
            [
                'required' => ':attribute required',
                'min' => ':attribute min',
                'max' => ':attribute max',
                'numeric' => ':attribute numeric only',
            ]
        );
        $data = $request->only(['shop_code', 'shop_name', 'tel', 'addr1', 'addr2', 'register_price', 'second_register_price', 'other_shop_entry_fee', 'pref_id']);
        $result = Shop::updateShop($data, $id);
        if ($result) {
            return redirect()->route('shop-show-manager')->with('success', 'Shop updated successfully');
        }
        return redirect()->back()->with('error', 'Shop error');
    }

    public function destroy(Request $request, $id)
    {
        $del = Shop::find($id);
        $del->status = $request->status = 2;
        $del->save();
        return redirect()->route('shop-show-manager')->with('success', 'Shop delete successfully');
    }

}