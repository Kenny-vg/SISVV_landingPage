<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'event_date',
        'location',
        'image',
        'is_published',
    ];

    protected function casts(): array
    {
        return [
            'event_date' => 'datetime',
            'is_published' => 'boolean',
        ];
    }
}
