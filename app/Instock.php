<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Instock extends Model
{
    protected $table = 'in_stock';
    protected $primaryKey = "id";
    protected $fillable = ['product_id', 'shop_id', 'in_number'];
    public $timestamps = false;

    public static function insert($value, $product_id)
    {
        if (!empty($product_id)) {
            $row = new Instock();
            $row->product_id = $product_id;
            $row->shop_id = $value['shop_id'];
            $row->in_number = $value['in_number'];
            return $row->save();
        }
    }

    public static function inStock($product_id, $shop_id, $number)
    {
        $model = new Instock();
        $model->product_id = $product_id;
        $model->shop_id = $shop_id;
        $model->in_number = $number;
        $model->created_date = $model->updated_date = date('Y-m-d H:i:s');
        $res = $model->save();
        return $res;
    }

    public static function multiAdd($multiStock, $multiProductId, $multiShopId)
    {
        $model = new Instock();
        if (isset($multiProductId)) {
            foreach ($multiProductId as $key => $product) {
                if (isset($multiStock[$key]) ? $multiStock[$key] : null) {
                        $model->product_id = $multiProductId[$key];
                        $model->shop_id = $multiShopId[$key];
                        $model->in_number = $multiStock[$key];
                        $model->created_date = $model->updated_date = date('Y-m-d H:i:s');
                        $res = $model->save();
                }
            }
        }
        if (isset($res)){
            return $res;
        }
    }
    
    public function product()
    {
        return $this->belongsTo('App\Product', 'product_id', 'id');
    }

    public function stock()
    {
        return $this->belongsTo('App\Stock', 'stock_id', 'id');
    }

}
