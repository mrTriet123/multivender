<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    //
    protected $table = 'brands';
    protected $fillable = ['name', 'logo', 'slug', 'description'];

    public function product()
    {
        return $this->hasOne('App\Product');
    }
}
