<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MoveStock extends Model
{
    protected $table = 'move_stock_history';
    public $timestamps = false;

    public static function moveStock($product_id, $stock_id, $shop, $shop_id, $from_number, $toStockNumber, $number)
    {
        $model = new MoveStock();
        $model->shop_from = $shop;
        $model->product_id = $product_id;
        $model->stock_id = $stock_id;
        $model->move_number = $number;
        $model->shop_to = $shop_id;
        $model->from_stock_number = $from_number;
        $model->to_stock_number = $toStockNumber;
        $model->move_date = date('Y-m-d H:i:s');
        $res = $model->save();
        return $res;
    }

    public function stock()
    {
        return $this->hasMany('App\Stock', 'stock_id', 'id');
    }

}
