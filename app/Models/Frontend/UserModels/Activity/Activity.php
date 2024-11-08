<?php

namespace App\Models\Frontend\UserModels\Activity;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Artesaos\SEOTools\Facades\SEOMeta;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Frontend\ReferenceData\Gender\Gender;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Frontend\ReferenceData\Academic\Academic;
use App\Models\Frontend\ReferenceData\AdsStatus\AdsStat;
use App\Models\Frontend\ReferenceData\ProvinceAndCity\City;
use App\Models\Frontend\ReferenceData\PaymentMethod\PaymntMtd;
use App\Models\Frontend\ReferenceData\ProvinceAndCity\Province;
use App\Models\Frontend\ReferenceData\Construction\Skill\ActGrp;
use App\Models\Frontend\ReferenceData\ContractType\ContractType;
use App\Models\Frontend\UserModels\Activity\ActivityLicenseItem;
use App\Models\Frontend\UserModels\Activity\AdsRegistration\Bid;
use App\Models\Frontend\UserModels\Activity\AdsRegistration\Inquiry;
use App\Models\Frontend\UserModels\Activity\AdsRegistration\Selling;
use App\Models\Frontend\UserModels\Activity\AdsRegistration\AdsImage;
use App\Models\Frontend\UserModels\Activity\AdsRegistration\Contractor;
use App\Models\Frontend\UserModels\Activity\AdsRegistration\Employment;
use App\Models\Frontend\UserModels\Activity\AdsRegistration\Investment;

class Activity extends Model
{
    use SoftDeletes;
    
    protected $guarded = [];

    // Define a global scope in the model
    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope('verify_status', function (Builder $builder) {
            $builder->where('verify_status', 'verified');
        });
    }

    public static function scopeQueryWithAllVerificationStatuses($query) {
        return $query->withoutGlobalScope('verify_status');
    }

    public static function scopeQueryWithVerifyStatusPending($query) {
        return $query->withoutGlobalScope('verify_status')->where('verify_status', 'pending');
    }

    public static function scopeQueryWithVerifyStatusRejected($query) {
        return $query->withoutGlobalScope('verify_status')->where('verify_status', 'rejected');
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function license() {
        return $this->hasMany(ActivityLicenseItem::class);
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

    public function bid() {
        return $this->hasOne(Bid::class);
    }

    public function inquiry() {
        return $this->hasOne(Inquiry::class);
    }

    public function contractor() {
        return $this->hasOne(Contractor::class);
    }

    public function setSeoMeta() {
        if(!empty($this->meta_title)) {
            SEOMeta::setTitle($this->meta_title);
        } else {
            SEOMeta::setTitle($this->subactivity->item_title);
        }

        if(!empty($this->meta_description)) {
            SEOMeta::setDescription($this->meta_description);
        } else {
            SEOMeta::setDescription($this->subactivity->item_description);
        }

        if(!empty($this->meta_keywords)) {
            $meta_keywords = explode('،', $this->meta_keywords);
            SEOMeta::setKeywords($meta_keywords);
        } else {
            SEOMeta::setKeywords($this->activityGroups->pluck('title')->toArray());
        }
    }
}
