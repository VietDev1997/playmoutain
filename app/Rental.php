<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rental extends Model
{
    protected $table = 'mst_rental';
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'retal_name', 'status', 'shop_id', 'fee', 'retal_description'];
    public $timestamps = false;

    public static function list()
    {
        return Rental::where('status', 1);
    }

    public static function createRental($data)
    {
        $model = new Rental();
        foreach ($data as $k => $v) {
            $model->$k = $v;
        }
        $model->created_date = $model->updated_date = date('Y-m-d H:i:s');
        $res = $model->save();
        return $res;
    }

    public static function updateRental($data, $id)
    {
        $model = Rental::find($id);
        foreach ($data as $k => $v) {
            $model->$k = $v;
        }
        $model->updated_date = date('Y-m-d H:i:s');
        $res = $model->save();
        return $res;
    }

    public function shop()
    {
        return $this->belongsTo('App\Shop', 'shop_id', 'id');
    }
}
