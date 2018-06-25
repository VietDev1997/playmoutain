<?php

namespace App\Http\Controllers;

use App\Size;
use Illuminate\Http\Request;

class SizeController extends Controller
{
    public function index(Request $request)
    {
        $list = Size::listSize();
        $key = $request->keyword;
        $items = $request->items;
        if (isset($key) && !empty($key)) {
            $list = $list->where('size_name', 'like', '%' . $key . '%');
        }
        $list = $list->paginate(is_null($items) ? 5 : $items);
        return view('admin.item-manager.size-management.list', ['list' => $list, 'items' => $items, 'key' => $key]);
    }

    public static function create()
    {
        $list = Size::all();
        return view('admin.item-manager.size-management.create', ['list' => $list]);
    }

    public function addSize(Request $request)
    {
        $this->validate($request, [
            'size_name' => 'max:255',
            'size_description' => 'max:255',
        ],
            [
                'size_name.max' => 'Name size' . config('constant.err.longContain'),
                'size_description.max' => 'Description size' . config('constant.err.longContain'),
            ]
        );
        $data = $request->only(['id', 'size_name', 'size_description', 'status']);
        $res = Size::createSize($data);
        if ($res) {
            return redirect()->route('create-size-management')->with('success', 'size create successfully');
        }
        return redirect()->back()->with('error', 'size error');
    }

    public function edit($id)
    {
        $size = Size::findOrFail($id);
        return view('admin.item-manager.size-management.update', ['size' => $size]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'size_name' => 'max:255',
            'size_description' => 'max:255',
        ],
            [
                'size_name.max' => 'Name size' . config('constant.err.longContain'),
                'size_description.max' => 'Description size' . config('constant.err.longContain'),
            ]
        );
        $list = Size::select('status')->where('id', $id)->first();
        $data = $request->only(['id', 'size_name', 'size_description', 'status']);
        $result = Size::updateSize($data, $id);
        if ($list->status == 1) {
            if ($result) {
                return redirect()->route('size-management')->with('success', 'Size updated successfully');
            }
            return redirect()->back()->with('error', 'Size error');
        }
        return redirect()->back()->with('error', config('constant.err.dataErr'));

    }

    public function destroy(Request $request, $id)
    {
        $list = Size::select('status')->where('id', $id)->first();
        if ($list->status == 1) {
            $del = Size::find($id);
            $del->status = $request->status = 2;
            $del->save();
            return redirect()->route('size-management')->with('success', 'Size delete successfully');
        }
        return redirect()->back()->with('error', config('constant.err.dataErr'));
    }
}
