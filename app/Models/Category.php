<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    //
    protected $fillable = [
        'title',
        'description',
    ];
    
    public function clubRegistrations(): HasMany
    {
        return $this->hasMany(ClubRegistration::class);
    }
}
