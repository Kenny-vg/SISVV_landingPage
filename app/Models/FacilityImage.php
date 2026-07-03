<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FacilityImage extends Model
{
    use HasFactory;

    protected $fillable = [
        'facility_id',
        'image_path',
        'sort_order',
    ];

    public function facility(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Facility::class);
    }
}
