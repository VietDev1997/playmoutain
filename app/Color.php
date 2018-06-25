<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    protected $table = "mst_color";
    protected $primaryKey = "id";
    protected $fillable = ['id', 'color_name', 'rgb', 'status'];
    public $timestamps = false;

    public static function listColor()
    {
        return Color::where('status', 1);
    }

    public static function getId($color_name)
    {
        $color = Color::where('color_name', $color_name)->first();
        return $color !== null && isset($color->id) ? $color->id : false;
    }

    public static function createColor($data)
    {
        $model = new Color();
        foreach ($data as $k => $v) {
            $model->$k = $v;
        }
        $model->created_date = $model->updated_date = date('Y-m-d H:i:s');
        $res = $model->save();
        return $res;
    }

    public static function updateColor($data, $id)
    {
        $model = Color::findOrFail($id);
        foreach ($data as $k => $v) {
            $model->$k = $v;
        }
        $model->updated_date = date('Y-m-d H:i:s');
        $res = $model->save();
        return $res;
    }

    public function product()
    {
        return $this->hasMany('App\Product', 'color_id', 'id');
    }
}
