<?php

namespace App\Http\Controllers;

use App\Pref;
use App\Shop;
use App\Staff;
use Illuminate\Http\Request;
use DB;

class StaffController extends Controller
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
        $list = Staff::list();
        $items = $request->items;
        $key = $request->keyword;
        if (isset($key) && !empty($key)) {
            $list = $list->where('name', 'like', '%' . $key . '%');
        }
        $list = $list->paginate(is_null($items) ? 5 : $items);
        return view('admin.staff-management.list', ['list' => $list, 'key' => $key, 'items' => $items]);
    }

    public function create()
    {
        {
            $list = Pref::all();
            $shop = Shop::all();
            return view('admin.staff-management.create', ['list' => $list, 'shop' => $shop]);
        }
    }

    public function addStaff(Request $request)
    {
        $this->validate($request, [
            'username' => 'max:100',
            'name' => 'max:255',
            'password' => 'max:100',
            'shop_id' => 'required',
            'tel' => 'max:255',
            'zip_code' => 'max:127',
            'ward' => 'max:255',
            'addr1' => 'max:255',
            'addr2' => 'max:255',
        ],
            [
                'username.max' => 'User Name ' . config('constant.err.lengContain'),
                'name.max' => 'Staff Name' . config('constant.err.contain'),
                'password.max' => 'Pass Word ' . config('constant.err.lengContain'),
                'tel.max' => 'Post Number' . config('constant.err.longContain'),
                'zip_code.max' => 'Zip Code' . config('constant.err.contain'),
                'ward.max' => 'District' . config('constant.err.longContain'),
                'addr1.max' => 'Town' . config('constant.err.longContain'),
                'addr2.max' => 'Detailed address' . config('constant.err.longContain'),
                'shop_id.required' => 'Shop Name' . config('constant.err.required')
            ]
        );
        $data = $request->only(['username', 'name', 'password', 'tel', 'is_parttime', 'zipcode', 'pref_id', 'ward', 'addr1', 'addr2', 'shop_id']);
        $res = Staff::createStaff($data);
        if ($res) {
            return redirect()->route('create_staff')->with('success', 'Staff created successfully');
        }
        return redirect()->back()->with('error', 'Staff error');
    }

    public function edit($id)
    {
        $list = Pref::all();
        $shop = Shop::all();
        $staff = Staff::findOrFail($id);
        return view('admin.staff-management.update', ['list' => $list, 'shop' => $shop, 'staff' => $staff]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'username' => 'max:100',
            'name' => 'max:255',
            'password' => 'max:100',
            'shop_id' => 'required',
            'tel' => 'max:255',
            'zip_code' => 'max:10',
            'ward' => 'max:255',
            'addr1' => 'max:255',
            'addr2' => 'max:255',
        ],
            [
                'username.max' => 'Provider name' . config('constant.err.lengContain'),
                'supplier_code.max' => 'Provider code' . config('constant.err.contain'),
                'password.max' => 'Pass Word' . config('constant.err.lengContain'),
                'tel.max' => 'Post Number' . config('constant.err.longContain'),
                'zip_code.max' => 'Zip Code' . config('constant.err.contain'),
                'ward.max' => 'District' . config('constant.err.longContain'),
                'addr1.max' => 'Town' . config('constant.err.longContain'),
                'addr2.max' => 'Detailed address' . config('constant.err.longContain'),
                'shop_id.required' => 'Shop Name' . config('constant.err.required')
            ]
        );
        $data = $request->only(['username', 'name', 'password', 'tel', 'is_parttime', 'zipcode', 'pref_id', 'ward', 'addr1', 'addr2', 'shop_id']);
        $res = Staff::updateStaff($data, $id);
        if ($res) {
            return redirect()->route('staff')->with('success', 'Staff update successfully');
        }
        return redirect()->back()->with('error', 'Staff error');
    }

    public function delete(Request $request, $id)
    {
        $del = Staff::find($id);
        $del->status = $request->status = 2;
        $del->save();
        return redirect()->route('staff')->with('success', 'Staff delete successfully');
    }

}
