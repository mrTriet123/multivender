<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CmsBanner extends Model
{
    //
    protected $table = 'cms_banners';

    public function typebanner()
    {
     
        return $this->belongsTo(TypeBanner::class, 'type_banner_id');
    }
}
