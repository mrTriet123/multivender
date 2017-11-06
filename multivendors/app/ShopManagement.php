<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShopManagement extends Model
{
    //
    protected $table = 'shops_management';
    
    public function user(){
    	return $this->belongsTo('App\User');
    }

    public function country(){
    	return $this->belongsTo('App\Country');
    }

    public function state(){
    	return $this->belongsTo('App\Sate');
    }

    public function products()
    {
        return $this->hasOne('App\Product');
    }
}
