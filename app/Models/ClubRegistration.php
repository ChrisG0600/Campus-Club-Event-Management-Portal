<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ClubRegistration extends Model
{
    //
    protected $fillable = [
        'category_id',
        'created_by',
        'club_name',
        'club_description',
        'club_logo',
        'club_email',
        'club_advisor',
        'why_join',
        'activities',
        'is_pending',
        'rejected_reason',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function clubMembers()
    {
        return $this->hasMany(ClubMember::class, 'club_id');
    }

    
}
