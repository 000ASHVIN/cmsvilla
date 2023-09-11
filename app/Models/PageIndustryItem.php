<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PageIndustryItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'industry_id',
        'testimonial_title',
        'testimonial_subtitle',
        'testimonial_status',
        'testimonial_bg',
        'testimonial_bg_color',
        'trusted_company_title',
        'trusted_company_subtitle',
        'trusted_company_status',
        'case_study_title',
        'case_study_subtitle',
        'case_study_status',
        'workflow_title',
        'workflow_subtitle',
        'workflow_content',
        'workflow_status',
        'need_title',
        'need_subtitle',
        'need_content',
        'need_btn_text',
        'need_btn_url',
        'need_yt_video',
        'need_video_bg',
        'need_bg_color',
        'need_status',
        'how_help_bg',
        'how_help_title',
        'how_help_subtitle',
        'how_help_status',
        'industry_title',
        'industry_subtitle',
        'industry_content',
        'industry_status',
    ];
}
