<?php

namespace App\Models;

use App\Models\Concerns\AutoSlug;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use AutoSlug;
    use HasFactory;

    protected string $slugSource = 'name';

    protected $fillable = [
        'name',
        'slug',
        'description',
        'is_visible',
        'image',
        'pdf',
        'schedule',
    ];

    protected function casts(): array
    {
        return [
            'is_visible' => 'boolean',
        ];
    }


}
