<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $table = 'products';

    public function category(){
    	return $this->belongsTo('App\Category');
    }

    public function brand(){
    	return $this->belongsTo('App\Brand');
    }

    public function shop(){
    	return $this->belongsTo('App\ShopManagement');
    }

    public function data_product(){
        return $this->hasOne('App\DataProduct');
    }

    public function seo_product(){
        return $this->hasOne('App\SeoProduct');
    }

    public function specifications(){
        return $this->hasMany('App\Specification');
    }

    public function qtydiscounts(){
        return $this->hasMany('App\QtyDiscount');
    }

    public function specialdiscounts(){
        return $this->hasMany('App\SpecialDiscount');
    }
}
