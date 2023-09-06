<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PageIndustryItem extends Model
{
    use HasFactory;

    protected $fillable = [
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
        'need_status',
    ];
}
