<?php

namespace App\Models\Profile;

use App\Models\User;
use App\Models\Profile\ProfileInfo;
use App\Models\Profile\ProfileResume;
use App\Models\Profile\ProfileContact;
use Illuminate\Database\Eloquent\Model;
use App\Models\Profile\ProfileCompanySpec;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserProfile extends Model
{
    protected $guarded = [];
    public $timestamps = false;

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function userProfileInformation()
    {
        return $this->hasOne(ProfileInfo::class, 'user_profile_id', 'id');
    }

    public function userProfileContact()
    {
        return $this->hasOne(ProfileContact::class, 'user_profile_id', 'id');
    }

    public function userProfileResume()
    {
        return $this->hasOne(ProfileResume::class, 'user_profile_id', 'id');
    }

    public function userProfileCompanySpecification()
    {
        return $this->hasOne(ProfileCompanySpec::class, 'user_profile_id', 'id');
    }
    
    public function userProfileLicense()
    {
        return $this->hasOne(ProfileLicense::class, 'user_profile_id', 'id');
    }
}
