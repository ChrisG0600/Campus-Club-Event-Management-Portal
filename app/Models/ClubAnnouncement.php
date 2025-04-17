<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ClubAnnouncement extends Model
{
    //
    protected $fillable = [
        'title',
        'content',
        'announcement_date',
        'time',
        'place',
    ];

    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
