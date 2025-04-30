<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ClubAnnouncement extends Model
{
    //
    protected $fillable = [
        'created_by',
        'club_id',
        'title',
        'content',
        'announcement_date',
        'time',
        'place',
        'status',
        'rejection_reason',

    ];

    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function club(): BelongsTo
    {
        return $this->belongsTo(ClubRegistration::class, 'club_id');
    }
}
