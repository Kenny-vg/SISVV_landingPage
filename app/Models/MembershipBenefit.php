<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MembershipBenefit extends Model
{
    use HasFactory;

    protected $fillable = [
        'membership_id',
        'benefit',
        'sort_order',
    ];

    public function membership(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Membership::class);
    }
}
