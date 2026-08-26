<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PageSection extends Model
{
    use HasFactory;

    protected $fillable = [
        'key',
        'title',
        'heading',
        'heading_accent',
        'content',
        'image',
        'image_float',
        'is_active',
    ];

    protected function casts(): array
    {
        return [
            'is_active' => 'boolean',
        ];
    }

    protected static function booted(): void
    {
        static::saving(function (self $model) {
            $model->content = sanitize_html($model->content);
            $model->heading = trim(strip_tags((string) $model->heading));
            $model->heading_accent = trim(strip_tags((string) $model->heading_accent));
        });
    }
}
