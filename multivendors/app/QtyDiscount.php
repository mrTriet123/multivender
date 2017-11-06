<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QtyDiscount extends Model
{
    //
    protected $table = "qtydiscounts";

    public function product(){

    	return $this->belongsTo('App\Product');
    }
}
