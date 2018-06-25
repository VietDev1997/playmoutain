<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Color;

class ColorController extends Controller
{
    public function index(Request $request)
    {
        $list = Color::listColor();
        $key = $request->keyword;
        $items = $request->items;
        if (isset($key) && !empty($key)) {
            $list = $list->where('color_name', 'like', '%' . $key . '%');
        }
        $list = $list->paginate(is_null($items) ? 5 : $items);
        return view('admin.item-manager.color-management.list', ['list' => $list, 'items' => $items, 'key' => $key]);
    }

    public static function create()
    {
        $list = Color::all();
        return view('admin.item-manager.color-management.create', ['list' => $list]);
    }

    public function addColor(Request $request)
    {
        $this->validate($request, [
            'color_name' => 'max:255',
            'rgb' => 'max:127',
        ],
            [
                'color_name.max' => 'Color name' . config('constant.err.longContain'),
                'rgb.max' => 'Rgb color name' . config('constant.err.contain'),
            ]
        );
        $data = $request->only(['id', 'color_name', 'rgb', 'status']);
        $res = Color::createColor($data);
        if ($res) {
            return redirect()->route('create-color-management')->with('success', 'color create successfully');
        }
        return redirect()->back()->with('error', 'color error');
    }

    public function edit($id)
    {
        $color = Color::findOrFail($id);
        return view('admin.item-manager.color-management.update', ['color' => $color]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'color_name' => 'max:255',
            'rgb' => 'max:127',
        ],
            [
                'color_name.max' => 'Color name' . config('constant.err.longContain'),
                'rgb.max' => 'Rgb color name' . config('constant.err.contain'),
            ]
        );
        $data = $request->only(['id', 'color_name', 'rgb', 'status']);
        $result = Color::updateColor($data, $id);
        $list = Color::select('status')->where('id', $id)->first();
        if ($list->status == 1) {
            if ($result) {
                return redirect()->route('color-manager')->with('success', 'Color updated successfully');
            }
            return redirect()->back()->with('error', 'Color error');
        }
        return redirect()->back()->with('error', config('constant.err.dataErr'));

    }

    public function destroy(Request $request, $id)
    {
        $list = Color::select('status')->where('id', $id)->first();
        if ($list->status == 1) {
            $del = Color::find($id);
            $del->status = $request->status = 2;
            $del->save();
            return redirect()->route('color-manager')->with('success', 'Color delete successfully');
        }
        return redirect()->back()->with('error', config('constant.err.dataErr'));
    }
}

