<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    protected $table = 'staff';
    protected $fillable = ['username', 'name', 'password', 'tel', 'is_parttime', 'zipcode', 'pref_id', 'ward', 'addr1', 'addr2', 'created_date', 'updated_date'];
    public $timestamps = false;

    public function shop()
    {
        return $this->belongsTo('App\Shop', 'shop_id', 'id');
    }

    public function pref()
    {
        return $this->belongsTo('App\Pref', 'pref_id', 'id');
    }

    public static function list()
    {
        return Staff::where('status', 1);
    }

    public static function createStaff($data)
    {
        $model = new Staff();
        foreach ($data as $k => $v) {
            $model->$k = $v;
        }
        $model->created_date = $model->updated_date = date('Y-m-d H:i:s');
        $res = $model->save();
        return $res;
    }

    public static function updateStaff($data, $id)
    {
        $model = Staff::find($id);
        foreach ($data as $k => $v) {
            $model->$k = $v;
        }
        $model->updated_date = date('Y-m-d H:i:s');
        $res = $model->save();
        return $res;
    }

}
