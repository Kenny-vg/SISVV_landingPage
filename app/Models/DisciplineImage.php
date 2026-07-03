<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DisciplineImage extends Model
{
    use HasFactory;

    protected $fillable = [
        'discipline_id',
        'image_path',
        'sort_order',
    ];

    public function discipline(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Discipline::class);
    }
}
