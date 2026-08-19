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
        ];
    }

    public function benefits(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(MembershipBenefit::class)->orderBy('sort_order');
    }
}
