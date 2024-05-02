<?php

namespace App\Models\Frontend\UserModels\Activity;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use App\Models\Frontend\ReferenceData\Gender\Gender;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Frontend\ReferenceData\Academic\Academic;
use App\Models\Frontend\ReferenceData\AdsStatus\AdsStat;
use App\Models\Frontend\UserModels\Activity\LicenseItem;
use App\Models\Frontend\UserModels\Activity\Resume\Resume;
use App\Models\Frontend\ReferenceData\ProvinceAndCity\City;
use App\Models\Frontend\ReferenceData\PaymentMethod\PaymntMtd;
use App\Models\Frontend\ReferenceData\ProvinceAndCity\Province;
use App\Models\Frontend\ReferenceData\Construction\Skill\ActGrp;
use App\Models\Frontend\ReferenceData\ContractType\ContractType;
use App\Models\Frontend\UserModels\Activity\AdsRegistration\Selling;
use App\Models\Frontend\UserModels\Activity\AdsRegistration\AdsImage;
use App\Models\Frontend\UserModels\Activity\AdsRegistration\Employment;
use App\Models\Frontend\UserModels\Activity\AdsRegistration\Investment;

class Activity extends Model
{
    protected $guarded = [];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function resume() {
        return $this->hasOne(Resume::class);
    }

    public function license() {
        return $this->hasMany(LicenseItem::class);
    }

    public function activityGroups() {
        return $this->belongsToMany(ActGrp::class);
    }

    public function selling() {
        return $this->hasOne(Selling::class);
    }

    public function employment() {
        return $this->hasOne(Employment::class);
    }

    public function investment() {
        return $this->hasOne(Investment::class);
    }

    public function paymentMethod() {
        return $this->belongsToMany(PaymntMtd::class, 'paymnt_mtd_activity');
    }

    public function adsStats() {
        return $this->belongsToMany(AdsStat::class, 'ads_stat_activity');
    }

    public function adsImages() {
        return $this->hasMany(AdsImage::class);
    }

    public function contractType() {
        return $this->belongsToMany(ContractType::class, 'contract_type_activity');
    }

    public function province() {
        return $this->belongsToMany(Province::class, 'province_activity');
    }

    public function academic() {
        return $this->belongsToMany(Academic::class, 'academic_activity');
    }

    public function gender() {
        return $this->belongsToMany(Gender::class, 'gender_activity');
    }

    public function subactivity() {
        return $this->morphTo();
    }

    public function adsImagesUrl() {
        return ($this->adsImages->first() !== null) ? asset($this->adsImages->first()->image_sm) : asset('assets/frontend/img/logo/zsaz_sm.png');
    }

    // This is for slug, it gets the last ID to create a unique random string
    public static function getLatestId() {
        return self::latest()->first() ? self::latest()->first()->id : 0;
    }
}
