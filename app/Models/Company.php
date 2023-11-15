<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
    protected $fillable = [
        'slug',
        'photo',
        'located_page',
    ];

    public function industries()
    {
        return $this->belongsToMany(Industry::class, 'industry_company');
    }

    public function caseStudies()
    {
        return $this->belongsToMany(CaseStudy::class, 'case_study_company');
    }
}
