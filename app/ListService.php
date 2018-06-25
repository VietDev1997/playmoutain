<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ListService extends Model
{
    protected $table = 'mst_service';
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'service_name', 'fee', 'service_description', 'status', 'shop_id', 'customer_type_id'];
    public $timestamps = false;

    public static function list()
    {
        return ListService::where('status', 1);
    }

    public static function createService($data)
    {
        $model = new ListService();
        foreach ($data as $k => $v) {
            $model->$k = $v;
        }
        $model->created_date = $model->updated_date = date('Y-m-d H:i:s');
        $res = $model->save();
        return $res;
    }

    public static function updateService($data, $id)
    {
        $model = ListService::find($id);
        foreach ($data as $k => $v) {
            $model->$k = $v;
        }
        $model->updated_date = date('Y-m-d H:i:s');
        $res = $model->save();
        return $res;
    }


    public function customertype()
    {
        return $this->belongsTo('App\CustomerType', 'customer_type_id', 'id');
    }

    public function shop()
    {
        return $this->belongsTo('App\Shop', 'shop_id', 'id');
    }
}