<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SpecialDiscount extends Model
{
    //
    protected $table = "specialdiscounts";

    public function product(){

    	return $this->belongsTo('App\Product');
    }
}
