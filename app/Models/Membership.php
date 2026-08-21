<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Membership extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'tipo',
        'area',
        'members_text',
        'has_golf_access',
        'sort_order',
        'is_published',
        'show_price',
        'is_featured',
    ];

    protected function casts(): array
    {
        return [
            'is_published' => 'boolean',
            'show_price' => 'boolean',
            'is_featured' => 'boolean',
            'has_golf_access' => 'boolean',
        ];
    }

    public function benefits(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Benefit::class)->orderBy('benefits.sort_order');
    }
}
