<?php

namespace App\Models\Profile;

use App\Models\Profile\UserProfile;
use Illuminate\Database\Eloquent\Model;
use App\Models\Profile\License\ProfileLicenseItem;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProfileLicense extends Model
{
    protected $guarded = [];
    public $timestamps = false;

    public function userProfile() {
        return $this->belongsTo(UserProfile::class);
    }

    public function licenseItems()
    {
        return $this->hasMany(ProfileLicenseItem::class, 'profile_license_id', 'id');
    }
}
