<?php

namespace App\Models;

use App\Models\Concerns\AutoSlug;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discipline extends Model
{
    use AutoSlug;
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'category',
        'description',
        'schedule',
        'prioridad',
        'is_published',
    ];

    protected function casts(): array
    {
        return [
            'is_published' => 'boolean',
            'prioridad' => 'decimal:2',
        ];
    }

    public function images(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(DisciplineImage::class)->orderBy('sort_order');
    }
}
