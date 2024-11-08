<?php

namespace App\Models\Frontend\UserModels\Project;

use App\Models\User;
use Artesaos\SEOTools\Facades\SEOMeta;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Frontend\UserModels\Project\Sections\ProjectInfo;
use App\Models\Frontend\UserModels\Project\Sections\ProjectImage;
use App\Models\Frontend\UserModels\Project\Sections\ProjectVideo;
use App\Models\Frontend\UserModels\Project\Sections\ProjectContact;
use App\Models\Frontend\UserModels\Project\Sections\ProjectFacility;
use App\Models\Frontend\ReferenceData\ProjectWelfareFacility\WelfareFacility;

class Project extends Model
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

    public function projectImages() {
        return $this->hasMany(ProjectImage::class);
    }

    public function projectInfo() {
        return $this->hasOne(ProjectInfo::class);
    }

    public function projectFacility() {
        return $this->hasOne(ProjectFacility::class);
    }

    public function projectContact() {
        return $this->hasOne(ProjectContact::class);
    }

    public function projectVideo() {
        return $this->hasOne(ProjectVideo::class);
    }

    public function welfareFacility() {
        return $this->belongsToMany(WelfareFacility::class, 'welfare_facility_project');
    }

    public function projectImagesUrl() {
        return ($this->projectImages->first() !== null) ? asset($this->projectImages->first()->image_sm) : asset('assets/frontend/img/logo/zsaz_sm.png');
    }

    // This is for slug, it gets the last ID to create a unique random string
    public static function getLatestId() {
        return self::queryWithAllVerificationStatuses()->latest()->first() ? self::queryWithAllVerificationStatuses()->latest()->first()->id : 0;
    }

    public function setSeoMeta() {
        if(!empty($this->meta_title)) {
            SEOMeta::setTitle($this->meta_title);
        } else {
            SEOMeta::setTitle($this->projectInfo->title);
        }

        if(!empty($this->meta_description)) {
            SEOMeta::setDescription($this->meta_description);
        } else {
            SEOMeta::setDescription($this->projectFacility->project_description);
        }

        if(!empty($this->meta_keywords)) {
            $meta_keywords = explode('،', $this->meta_keywords);
            SEOMeta::setKeywords($meta_keywords);
        } else {
            SEOMeta::setKeywords($this->welfareFacility->pluck('title')->toArray());
        }
    }
}
