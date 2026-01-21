<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hero extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'button_text',
        'button_link',
        'background_image',
        'satisfied_patients_count',
        'satisfied_patients_label',
        'statistics',
        'status',
        'sort_order'
    ];

    protected $casts = [
        'statistics' => 'array',
    ];
}

