<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomerType extends Model
{
    protected $table = 'mst_customer_type';
    protected $primaryKey = 'id';
    public $timestamps = false;
}
