<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class Suppliers extends Model
{
    protected $table = 'supplier';
    protected $fillable = ['supplier_name', 'id', 'tel', 'zipcode', 'addr1', 'status', 'shop_name', 'ward', 'addr1', 'addr2', 'created_date', 'updated_date'];
    public $timestamps = false;

    public function shop()
    {
        return $this->belongsTo('App\Shop', 'shop_id', 'id');
    }

    public function pref()
    {
        return $this->belongsTo('App\Pref', 'pref_id', 'id');
    }

    public static function List()
    {
        return Suppliers::where('status', 1);
    }

    public static function createSupplier($data)
    {
        $model = new Suppliers();
        foreach ($data as $k => $v) {
            $model->$k = $v;
        }
        $model->created_date = $model->updated_date = date('Y-m-d H:i:s');
        $res = $model->save();
        return $res;
    }

    public static function updateSupplier($data, $id)
    {
        $model = Suppliers::find($id);
        foreach ($data as $k => $v) {
            $model->$k = $v;
        }
        $model->created_date = $model->updated_date = date('Y-m-d H:i:s');
        $res = $model->save();
        return $res;
    }
}
