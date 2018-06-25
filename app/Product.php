<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'product';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = ['shop_id', 'product_code', 'product_name', 'tax_price', 'member_price', 'size_id', 'color_id', 'maker_id', 'supplier_id', 'notax_price', 'stock_price', 'notes'];

    public static function getGoodsManager()
    {
        return Product::where('status', 1);
    }

    public static function productCode($shop_id)
    {
        return Product::select('product_code')->where('shop_id', $shop_id)->first()['product_code'];
    }

    public static function createProduct($data)
    {
        $model = new Product();
        foreach ($data as $k => $v) {
            $model->$k = $v;
        }
        $model->created_date = $model->updated_date = date('Y-m-d H:i:s');
        $res = $model->save();
        return $res;
    }

    public static function insert($value)
    {
        unset($value['in_number'],$value['color_name'],$value['size_name'],$value['maker_name']);
        $row = new Product;
        foreach ($value as $key => $values){
            $row->$key = $values;
        }
        return $row->save();
    }

    public static function getId($product_code, $shop_id)
    {
        if (empty($product_code) || empty($shop_id)) return false;
        $product = Product::where('product_code', $product_code)->where('shop_id', $shop_id)->first();
        return $product !== null && isset($product->id) ? $product->id : false;
    }

    public function shop()
    {
        return $this->belongsTo('App\Shop', 'shop_id', 'id');
    }

    public function supplier()
    {
        return $this->belongsTo('App\Suppliers', 'supplier_id', 'id');
    }

    public function maker()
    {
        return $this->belongsTo('App\Maker', 'maker_id', 'id');
    }

    public function purchasing_online_detail()
    {
        return $this->hasMany('App\PurchasingOnlineDetail', 'product_id', 'id');
    }

    public function purchasing()
    {
        return $this->hasMany('App\Purchasing', 'product_id', 'id');
    }

    public function stock()
    {
        return $this->hasMany('App\Stock', 'product_id', 'id');
    }

    public function instock()
    {
        return $this->hasMany('App\Instock', 'product_id', 'id');
    }

    public function color()
    {
        return $this->belongsTo('App\Color', 'color_id', 'id');
    }

    public function size()
    {
        return $this->belongsTo('App\Size', 'size_id', 'id');
    }

}