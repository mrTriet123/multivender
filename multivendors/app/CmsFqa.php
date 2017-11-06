<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CmsFqa extends Model
{
    //
    protected $table = 'cms_fqas';

    public function fqacategory()
    {
        // return $this->belongsToMany('App\FqaCategory');
        return $this->belongsTo(FqaCategory::class, 'fqa_category_id');
    }
}
