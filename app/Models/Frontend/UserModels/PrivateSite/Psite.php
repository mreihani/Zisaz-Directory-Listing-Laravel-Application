<?php

namespace App\Models\Frontend\UserModels\PrivateSite;

use App\Models\User;
use Artesaos\SEOTools\Facades\SEOMeta;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Frontend\UserModels\PrivateSite\Sections\PsiteInfo;
use App\Models\Frontend\UserModels\PrivateSite\Sections\PsiteMember;
use App\Models\Frontend\UserModels\PrivateSite\Sections\PsiteLicense;
use App\Models\Frontend\UserModels\PrivateSite\Sections\PsiteContactUs;
use App\Models\Frontend\UserModels\PrivateSite\Sections\PsitePromotionalVideo;

class Psite extends Model
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

    public function info() {
        return $this->hasOne(PsiteInfo::class);
    }

    public function licenses() {
        return $this->hasOne(PsiteLicense::class);
    }

    public function contactUs() {
        return $this->hasOne(PsiteContactUs::class);
    }

    public function members() {
        return $this->hasOne(PsiteMember::class);
    }

    public function promotionalVideo() {
        return $this->hasOne(PsitePromotionalVideo::class);
    }

    // This is for slug, it gets the last ID to create a unique random string
    public static function getLatestId() {
        return self::latest()->first() ? self::latest()->first()->id : 0;
    }

    public function setSeoMeta() {
        if(!empty($this->meta_title)) {
            SEOMeta::setTitle($this->meta_title);
        } else {
            SEOMeta::setTitle($this->info->title);
        }

        if(!empty($this->meta_description)) {
            SEOMeta::setDescription($this->meta_description);
        } else {
            SEOMeta::setDescription($this->info->about_us);
        }

        if(!empty($this->meta_keywords)) {
            $meta_keywords = explode('،', $this->meta_keywords);
            SEOMeta::setKeywords($meta_keywords);
        } 
    }
}
