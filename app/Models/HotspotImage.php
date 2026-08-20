<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HotspotImage extends Model
{
    use HasFactory;

    protected $fillable = [
        'key',
        'label',
        'image_path',
        'left_percent',
        'top_percent',
    ];

    protected $casts = [
        'left_percent' => 'decimal:2',
        'top_percent' => 'decimal:2',
    ];
}