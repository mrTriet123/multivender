<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DataProduct extends Model
{
    //
    protected $table = 'data_products';

    public function product(){
    	return $this->belongsTo('App\Product');
    }

}
