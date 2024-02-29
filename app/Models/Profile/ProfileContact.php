<?php

namespace App\Models\Profile;

use App\Models\Profile\UserProfile;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProfileContact extends Model
{
    protected $guarded = [];

    public function userProfile() {
        return $this->belongsTo(UserProfile::class);
    }
}
