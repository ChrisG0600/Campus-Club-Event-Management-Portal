<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
    ];
}
