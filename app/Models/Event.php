<?php

namespace App\Models;

use App\Models\Concerns\AutoSlug;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use AutoSlug;
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'category',
        'date',
        'prioridad',
        'description',
        'image',
        'pdf_path',
        'is_published',
    ];

    protected $casts = [
        'is_published' => 'boolean',
        'date' => 'date',
        'prioridad' => 'decimal:2',
    ];
}
