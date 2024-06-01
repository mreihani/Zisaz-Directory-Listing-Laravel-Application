<?php

namespace App\Models\Frontend\UserModels\PrivateSite\Sections;

use Illuminate\Database\Eloquent\Model;
use App\Models\Frontend\UserModels\PrivateSite\Psite;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Frontend\UserModels\PrivateSite\Sections\PsiteContactUs\PsiteContactUsEm;
use App\Models\Frontend\UserModels\PrivateSite\Sections\PsiteContactUs\PsiteContactUsWh;
use App\Models\Frontend\UserModels\PrivateSite\Sections\PsiteContactUs\PsiteContactUsMo;
use App\Models\Frontend\UserModels\PrivateSite\Sections\PsiteContactUs\PsiteContactUsPc;
use App\Models\Frontend\UserModels\PrivateSite\Sections\PsiteContactUs\PsiteContactUsSo;
use App\Models\Frontend\UserModels\PrivateSite\Sections\PsiteContactUs\PsiteContactUsAd;
use App\Models\Frontend\UserModels\PrivateSite\Sections\PsiteContactUs\PsiteContactUsOp;

class PsiteContactUs extends Model
{
    protected $guarded = [];

    public function psite() {
        return $this->belongsTo(Psite::class);
    }

    public function psiteContactUsAddressItems() {
        return $this->hasMany(PsiteContactUsAd::class);
    }

    public function psiteContactUsOfficePhoneItems() {
        return $this->hasMany(PsiteContactUsOp::class);
    }

    public function psiteContactUsMobilePhoneItems() {
        return $this->hasMany(PsiteContactUsMo::class);
    }

    public function psiteContactUsEmailItems() {
        return $this->hasMany(PsiteContactUsEm::class);
    }

    public function psiteContactUsSocialMediaItems() {
        return $this->hasMany(PsiteContactUsSo::class);
    }

    public function psiteContactUsPostalCodeItems() {
        return $this->hasMany(PsiteContactUsPc::class);
    }

    public function psiteContactUsWorkingHourItems() {
        return $this->hasMany(PsiteContactUsWh::class);
    }
}
