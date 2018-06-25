<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    protected $table = "mst_size";
    protected $primaryKey = "id";
    protected $fillable = ['size_name', 'size_description', 'status'];
    public $timestamps = false;

    public static function listSize()
    {
        return Size::where('status', 1);
    }

    public static function getId($size_name)
    {
        $size = Size::where('size_name', $size_name)->first();
        return $size !== null && isset($size->id) ? $size->id : false;
    }

    public static function createSize($data)
    {
        $model = new Size();
        foreach ($data as $k => $v) {
            $model->$k = $v;
        }
        $model->created_date = $model->updated_date = date('Y-m-d H:i:s');
        $res = $model->save();
        return $res;
    }

    public static function updateSize($data, $id)
    {
        $model = Size::findOrFail($id);
        foreach ($data as $k => $v) {
            $model->$k = $v;
        }
        $model->updated_date = date('Y-m-d H:i:s');
        $res = $model->save();
        return $res;
    }

    public function product()
    {
        return $this->hasMany('App\Product', 'size_id', 'id');
    }
}
