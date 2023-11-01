<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Industry extends Model
{
    protected $table = 'industry';
    protected $fillable = [
        'name',
        'slug',
        'description',
        'seo_title',
        'seo_meta_description',
        'photo'
    ];

    public function pageIndustryItem() {
        return $this->hasOne(PageIndustryItem::class, 'industry_id', 'id');
    }

    public function howHelp() {
        return $this->hasMany(HowHelp::class, 'industry_id', 'id');
    }
}
