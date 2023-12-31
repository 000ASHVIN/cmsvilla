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
        'located_page',
        'seo_meta_description'
    ];
    public function CaseStudyItems() {
        return $this->hasMany(CaseStudyItems::class, 'industry_id', 'id');
    }
    public function industries()
    {
        return $this->belongsToMany(Industry::class);
    }
    public function company()
    {
        return $this->belongsToMany(Company::class, 'case_study_company');
    }

    public function testimonial()
    {
        return $this->belongsToMany(Testimonial::class, 'case_study_testimonial');
    }
}
