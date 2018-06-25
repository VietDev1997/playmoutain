<?php

namespace App\Http\Controllers;

use App\Instock;
use App\Product;
use App\Stock;
use Illuminate\Http\Request;

class MultiStockController extends Controller
{
    public function multiAdd(Request $request)
    {
        $multiStock = $request->stock_number_add;
        $multiProductId = $request->product_id;
        $multiShopId = $request->shop_add_id;
        $multiStockId = $request->stock_id;
        Instock::multiAdd($multiStock, $multiProductId, $multiShopId);  // add vao instock
        Stock::multiUpdateStock($multiStock, $multiProductId, $multiStockId); // update stock
    }

    public function multiMove(Request $request)
    {
        $data = request(['product_id', 'shop_id', 'stock_number_move', 'stock_id', 'shop_add_id', 'from_number']);
        $rs = [];
        $dataLength = count($data["product_id"]);
        foreach ($data as $dt) {
            for ($i = 0; $i < $dataLength; $i++) {
                $rs[$i][] = $dt[$i];
            }
        }
        foreach ($rs as $r) {
            if (isset($r[2])) {
                GoodsManagerController::move($r[0], $r[1], $r[2], $r[3], $r[4], $r[5]);
            }
        }
    }
}