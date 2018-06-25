<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'stock';
    public $timestamps = false;

    public function product()
    {
        return $this->belongsTo('App\Product', 'product_id', 'id');
    }

    public static function idStock($product_id, $shop_id)
    {
        return Stock::select('id')->where('product_id', $product_id)->where('shop_id', $shop_id)->first()['id'];
    }

    public function in_stock()
    {
        return $this->hasMany('App\Instock', 'stock_id', 'id');
    }

    public static function inserts($value, $product_id)
    {
        $row = new Stock();
        $row->product_id = $product_id;
        $row->shop_id = $value['shop_id'];
        $row->stock_number = $value['in_number'];
        return $row->save();
    }

    public static function setId($product_id)
    {
        $stock = Stock::where('product_id', $product_id)->first();
        return $stock !== null && isset($stock->id) ? $stock->id : false;
    }

    public static function updateStock_import($value, $stock_id, $product_id)
    {
        if (!empty($stock_id)) {
            $row = Stock::find($stock_id);
            $row->product_id = $product_id;
            $row->shop_id = $value['shop_id'];
            $row->stock_number += $value['in_number'];
            return $row->save();
        }
    }

    public static function updateStock($stock_count, $product_id)
    {
        $model = Stock::find($product_id);
        if (is_object($model)) {
            $model->stock_number = $stock_count;
            $model->updated_date = date('Y-m-d H:i:s');
            $res = $model->save();
            return $res;
        }
    }

    public static function multiUpdateStock($multiStock, $multiProductId, $multiStockId)
    {
        foreach ($multiProductId as $key => $product) {
            if ($multiStock[$key]) {
                $model = Stock::find($multiProductId[$key]);
                if (is_object($model)) {
                    $oldNumber = Stock::select('stock_number')->where('id', $multiStockId[$key])->first()['stock_number'];
                    $model->stock_number = $multiStock[$key] + $oldNumber;
                    $model->updated_date = date('Y-m-d H:i:s');
                    $res = $model->save();
                }
            }
        }
        if (isset($res)) {
            return $res;
        }
    }

    public static function autoAdd($shop_id, $product_id, $stock_number)
    {
        $model = new Stock();
        $model->stock_number = $stock_number;
        $model->shop_id = $shop_id;
        $model->product_id = $product_id;
        $model->created_date = $model->updated_date = date('Y-m-d H:i:s');
        $res = $model->save();
        return $res;
    }

    public static function stockNumber($shop_id)
    {
        return Stock::select('stock_number')->where('shop_id', $shop_id)->first()['stock_number'];
    }

    public static function stockNumberOld($id)
    {
        return Stock::select('stock_number')->where('id', $id)->first()['stock_number'];
    }
    
    public static function multiStockNumberNew($multiStock)
    {
        foreach ($multiStock as $key => $product) {

            $result = $multiStock[$key];
        }
        return $result;
    }
}