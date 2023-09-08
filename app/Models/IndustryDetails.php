<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IndustryDetails extends Model
{
    use HasFactory;
    protected $table = "industry_details_items";
    protected $fillable = [
        'name',
        'description',
        'photo'
    ];
}
