<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SeoProduct extends Model
{
    //
    protected $table = 'seo_products';

    public function product(){
    	return $this->belongsTo('App\Product');
    }
}
