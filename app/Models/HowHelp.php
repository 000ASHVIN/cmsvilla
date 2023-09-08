<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HowHelp extends Model
{
    protected $table = 'how_help';
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
