<?php

namespace App\Models\Profile\License;

use App\Models\Profile\UserProfile;
use App\Models\Profile\ProfileLicense;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProfileLicenseItem extends Model
{
    protected $guarded = [];

    public function profileLicense() {
        return $this->belongsTo(ProfileLicense::class);
    }
}
