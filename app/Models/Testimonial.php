<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    protected $fillable = [
        'name',
        'designation',
        'photo',
        'located_page',
        'comment'
    ];

    public function industries()
    {
        return $this->belongsToMany(Industry::class, 'testimonial_industry');
    }

    public function caseStudies()
    {
        return $this->belongsToMany(CaseStudy::class, 'case_study_testimonial');
    }
}
