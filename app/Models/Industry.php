<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Industry extends Model
{
    protected $table = 'industry';
    protected $fillable = [
        'name',
        'slug',
        'seo_title',
        'seo_meta_description'
    ];

    public function pageIndustryItem() {
        return $this->hasOne(PageIndustryItem::class, 'industry_id', 'id');
    }
}
