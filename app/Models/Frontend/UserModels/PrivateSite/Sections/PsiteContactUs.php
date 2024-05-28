<?php

namespace App\Models\Frontend\UserModels\PrivateSite\Sections;

use Illuminate\Database\Eloquent\Model;
use App\Models\Frontend\UserModels\PrivateSite\Psite;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Frontend\UserModels\PrivateSite\Sections\PsiteContactUs\PsiteContactUsEmail;
use App\Models\Frontend\UserModels\PrivateSite\Sections\PsiteContactUs\PsiteContactUsWorkingHour;
use App\Models\Frontend\UserModels\PrivateSite\Sections\PsiteContactUs\PsiteContactUsMobilePhone;
use App\Models\Frontend\UserModels\PrivateSite\Sections\PsiteContactUs\PsiteContactUsPostalCode;
use App\Models\Frontend\UserModels\PrivateSite\Sections\PsiteContactUs\PsiteContactUsSocial;
use App\Models\Frontend\UserModels\PrivateSite\Sections\PsiteContactUs\PsiteContactUsAddress;
use App\Models\Frontend\UserModels\PrivateSite\Sections\PsiteContactUs\PsiteContactUsOfficePhone;

class PsiteContactUs extends Model
{
    protected $guarded = [];

    public function psite() {
        return $this->belongsTo(Psite::class);
    }

    public function psiteContactUsAddressItems() {
        return $this->hasMany(PsiteContactUsAddress::class);
    }

    public function psiteContactUsOfficePhoneItems() {
        return $this->hasMany(PsiteContactUsOfficePhone::class);
    }

    public function psiteContactUsMobilePhoneItems() {
        return $this->hasMany(PsiteContactUsMobilePhone::class);
    }

    public function psiteContactUsEmailItems() {
        return $this->hasMany(PsiteContactUsEmail::class);
    }

    public function psiteContactUsSocialMediaItems() {
        return $this->hasMany(PsiteContactUsSocial::class);
    }

    public function psiteContactUsPostalCodeItems() {
        return $this->hasMany(PsiteContactUsPostalCode::class);
    }

    public function psiteContactUsWorkingHourItems() {
        return $this->hasMany(PsiteContactUsWorkingHour::class);
    }
}
