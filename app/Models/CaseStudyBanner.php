<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CaseStudyBanner extends Model
{
    use HasFactory;
    protected $table = 'case_study_banner';
    protected $fillable = [
        'name',
        'seo_meta_description'
    ];
}
