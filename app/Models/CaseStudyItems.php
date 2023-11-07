<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CaseStudyItems extends Model
{
    use HasFactory;
    protected $table = 'case_study_items';
    protected $fillable = [
        'name',
        'slug',
        'description',
        'industry_id',
        'short_description',
        'photo',
        'seo_title',
        'seo_meta_description'
    ];
    public function CaseStudy() {
        return $this->hasMany(CaseStudy::class,'id', 'industry_id');
    }
}
