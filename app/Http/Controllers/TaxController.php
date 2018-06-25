<?php

namespace App\Http\Controllers;

use App\Tax;
use Illuminate\Http\Request;

class TaxController extends Controller
{
    public function update()
    {
        $update = Tax::updateTax();
        return view('admin.item-manager.tax-administration.update', ['update' => $update]);
    }

    public function postTax(Request $request)
    {
        $this->validate($request, [
            'tax' => 'required|max:255|numeric',
            'member_tax' => 'required|max:255|numeric',
        ],
            [
                'tax.numeric' => 'Tax(%)' . config('constant.err.numeric'),
                'tax.required' => 'Tax(%)' . config('constant.err.required'),
                'tax.max' => 'Tax(%)' . config('constant.err.longContain'),
                'member_tax.numeric' => 'Member tax(%)' . config('constant.err.numeric'),
                'member_tax.required' => 'Member tax(%)' . config('constant.err.required'),
                'member_tax.max' => 'Member tax(%)' . config('constant.err.longContain'),
            ]
        );
        $tax = Tax::find($request->tax_id);
        $tax->value = $request->tax;
        $member_tax = Tax::find($request->member_tax_id);
        $member_tax->value = $request->member_tax;
        $tax->save();
        $member_tax->save();
        return redirect()->route('tax')->with('success', 'Tax update successfully');;
    }
}
