<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tax extends Model
{
    protected $table = "config";
    protected $primaryKey ="id";
    protected $fillable=['name','value'];
    public $timestamps = false;
    public static function updateTax()
    {
        return Tax::where('id', '>' ,1)->get();
    }
}
