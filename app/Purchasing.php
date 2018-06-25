<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Purchasing extends Model
{
   protected $table = 'purchasing';

    public function product()
    {
        return $this->belongsTo('App\Product', 'product_id', 'id');
    }
}
