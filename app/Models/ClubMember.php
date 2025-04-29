<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ClubMember extends Model
{
    //
    protected $fillable = [
        'club_id',
        'student_id',
        'student_number',
        'status',
        'reject_message',
        'why_interested',
        'experience',
        'role',
        'resubmission_count',
        'can_resubmit',
        'declined_at',
        'declined_reason',
        'withdrawn_at',
        'withdrawn_reason',
        'actioned_by',
    ];
    public function club(): BelongsTo
    {
        return $this->belongsTo(ClubRegistration::class, 'club_id');
    }

    public function student(): BelongsTo
    {
        return $this->belongsTo(User::class, 'student_id');
    }

}
