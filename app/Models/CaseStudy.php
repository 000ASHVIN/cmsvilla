<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CaseStudy extends Model
{
    protected $table = 'case_studies';
    protected $fillable = [
        'name',
        'slug',
        'description',
        'short_description',
        'photo',
        'seo_title',
        'seo_meta_description'
    ];

}
