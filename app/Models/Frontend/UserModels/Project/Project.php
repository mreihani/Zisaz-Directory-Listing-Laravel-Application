<?php

namespace App\Models\Frontend\UserModels\Project;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Frontend\UserModels\Project\Sections\ProjectInfo;
use App\Models\Frontend\UserModels\Project\Sections\ProjectImage;
use App\Models\Frontend\UserModels\Project\Sections\ProjectVideo;
use App\Models\Frontend\UserModels\Project\Sections\ProjectContact;
use App\Models\Frontend\UserModels\Project\Sections\ProjectFacility;
use App\Models\Frontend\ReferenceData\ProjectWelfareFacility\WelfareFacility;

class Project extends Model
{
    protected $guarded = [];

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
        return self::latest()->first() ? self::latest()->first()->id : 0;
    }
}
