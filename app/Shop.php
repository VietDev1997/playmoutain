<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    protected $table = 'shop';
    protected $primaryKey = 'id';
    protected $fillable = ['shop_code', 'shop_name', 'tel', 'addr1', 'addr2', 'register_price', 'second_register_price', 'other_shop_entry_fee'];
    public $timestamps = false;

    public static function listShop()
    {
        return Shop::where('status', 1);
    }

    public static function createShop($data)
    {
        $model = new Shop();
        foreach ($data as $k => $v) {
            $model->$k = $v;
        }
        $model->created_date = $model->updated_date = date('Y-m-d H:i:s');
        $res = $model->save();
        return $res;
    }

    public static function updateShop($data, $id)
    {
        $model = Shop::find($id);
        foreach ($data as $k => $v) {
            $model->$k = $v;
        }
        $model->updated_date = date('Y-m-d H:i:s');
        $res = $model->save();
        return $res;
    }

    public function pref()
    {
        return $this->belongsTo('App\Pref', 'pref_id', 'id');
    }

    public function staff()
    {
        return $this->hasMany('App\Staff', 'shop_id', 'id');
    }

}
