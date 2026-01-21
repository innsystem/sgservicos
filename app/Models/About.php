<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    use HasFactory;
    protected $fillable = ['subtitle', 'title', 'description', 'description_2', 'features', 'button_text', 'button_link', 'image_1', 'image_2', 'status', 'sort_order'];
    protected $casts = ['features' => 'array'];
}

