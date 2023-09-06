<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PageIndustryItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'special_title',
        'special_subtitle',
        'special_content',
        'special_btn_text',
        'special_btn_url',
        'special_yt_video',
        'special_bg',
        'special_video_bg',
        'special_status',
        'workflow_title',
        'workflow_subtitle',
        'workflow_content',
    ];
}
