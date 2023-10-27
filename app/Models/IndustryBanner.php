<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IndustryBanner extends Model
{
    use HasFactory;
    protected $table = 'industry_banner';
    protected $fillable = [
        'name',
        'seo_meta_description'
    ];
}
