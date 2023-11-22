<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seo extends Model
{
    use HasFactory;
    protected $fillable = [
        'page',
        'content_id',
        'meta_title',
        'meta_description',
        'meta_image',
        'facebook_title',
        'facebook_description',
        'facebook_image',
        'twitter_title',
        'twitter_description',
        'twitter_image',
        'key_words',
        'meta_robots',

    ];
}
