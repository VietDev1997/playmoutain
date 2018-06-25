<?php

namespace App\Http\Controllers;

use App\Pref;
use App\Shop;
use App\Suppliers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Config;

class SuppliersController extends Controller
{
    public function getDataZipcode($zipcode)
    {
        if ($zipcode) {
            $result = DB::table('zipcode')->where("zipcode", $zipcode)->get();
            return json_decode($result);
        } else {
            response()->setStatusCode(404);
        }
    }

    public function index(Request $request)
    {
        $list = Suppliers::List();
        $items = $request->items;
        $key = $request->keyword;
        if (isset($key) && !empty($key)) {
            $list = $list->where('supplier_name', 'like', '%' . $key . '%');
        }
        $list = $list->paginate(is_null($items) ? 5 : $items);
        return view('admin.item-manager.supplier.list', ['list' => $list, 'key' => $key, 'items' => $items]);
    }

    public function create()
    {
        $list = Pref::all();
        $shop = Shop::all();
        return view('admin.item-manager.supplier.create', ['list' => $list, 'shop' => $shop]);
    }

    public function AddSupplier(Request $request)
    {
        $this->validate($request, [
            'supplier_code' => 'max:127',
            'supplier_name' => 'max:255',
            'tel' => 'max:255',
            'tel' => 'max:255',
            'zip_code' => 'max:127',
            'ward' => 'max:255',
            'addr1' => 'max:255',
            'addr2' => 'max:255',
        ],
            [
                'supplier_name.max' => 'Provider name' . config('constant.err.longContain'),
                'supplier_code.max' => 'Provider code' . config('constant.err.contain'),
                'tel.max' => 'Post Number' . config('constant.err.longContain'),
                'zip_code.max' => 'Post Code' . config('constant.err.contain'),
                'ward.max' => 'District' . config('constant.err.longContain'),
                'addr1.max' => 'Town' . config('constant.err.longContain'),
                'addr2.max' => 'Detailed address' . config('constant.err.longContain'),
            ]
        );
        $data = $request->only(['supplier_name', 'supplier_code', 'shop_id', 'tel', 'zipcode', 'addr1', 'status', 'shop_name', 'ward', 'addr1', 'addr2', 'created_date', 'updated_date']);
        $res = Suppliers::createSupplier($data);
        if ($res) {
            return redirect()->route('create')->with('success', 'Supplier created successfully');
        }
        return redirect()->back()->with('error', 'Supplier error');
    }

    public function edit($id)
    {
        $list = Pref::all();
        $shop = Shop::all();
        $supplier = Suppliers::findOrFail($id);
        return view('admin.item-manager.supplier.update', ['supplier' => $supplier, 'list' => $list, 'shop' => $shop]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'supplier_code' => 'max:127',
            'supplier_name' => 'max:255',
            'tel' => 'max:255',
            'tel' => 'max:255',
            'zip_code' => 'max:127',
            'ward' => 'max:255',
            'addr1' => 'max:255',
            'addr2' => 'max:255',
        ],
            [
                'supplier_name.max' => 'Provider name' . config('constant.err.longContain'),
                'supplier_code.max' => 'Provider code' . config('constant.err.contain'),
                'tel.max' => 'Post Number' . config('constant.err.longContain'),
                'zip_code.max' => 'Post Code' . config('constant.err.contain'),
                'ward.max' => 'District' . config('constant.err.longContain'),
                'addr1.max' => 'Town' . config('constant.err.longContain'),
                'addr2.max' => 'Detailed address' . config('constant.err.longContain'),
            ]
        );

        $data = $request->only(['supplier_name', 'id', 'shop_id', 'tel', 'zipcode', 'addr1', 'status', 'shop_name', 'ward', 'addr1', 'addr2', 'created_date', 'updated_date']);
        $res = Suppliers::updateSupplier($data, $id);
        if ($res) {
            return redirect()->route('supplier')->with('success', 'Supplier update successfully');
        }
        return redirect()->back()->with('error', 'Supplier error');
    }

    public function delete(Request $request, $id)
    {
        $del = Suppliers::find($id);
        $del->status = $request->status = 2;
        $del->save();
        return redirect()->route('supplier')->with('success', 'Supplier delete successfully');
    }
}
