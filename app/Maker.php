<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Maker extends Model
{
    protected $table = "maker";
    protected $fillable = ['maker_name', 'maker_code', 'tel', 'addr1', 'addr2', 'zipcode'];
    protected $primaryKey = 'id';
    public $timestamps = false;

    public static function listMaker()
    {
        return Maker::where('status', 1);
    }

    public static function updateProducer($data, $id)
    {
        $model = Maker::find($id);
        foreach ($data as $k => $v) {
            $model->$k = $v;
        }
        $model->updated_date = date('Y-m-d H:i:s');
        $res = $model->save();
        return $res;
    }

    public static function getId($maker_name)
    {
        $maker = Maker::where('maker_name', $maker_name)->first();
        return $maker !== null && isset($maker->id) ? $maker->id : false;
    }

    public static function createProducer($data)
    {
        $model = new Maker();
        foreach ($data as $k => $v) {
            $model->$k = $v;
        }
        $model->created_date = $model->updated_date = date('Y-m-d H:i:s');
        $res = $model->save();
        return $res;
    }

    public function product()
    {
        return $this->hasMany('App\Product', 'maker_id', 'id');
    }

    public function shop()
    {
        return $this->belongsTo('App\Shop', 'shop_id', 'id');
    }

    public function pref()
    {
        return $this->belongsTo('App\Pref', 'pref_id', 'id');
    }
}
