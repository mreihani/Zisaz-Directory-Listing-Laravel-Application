<?php

namespace App\Models\Frontend\UserModels\Project\Sections;

use Illuminate\Database\Eloquent\Model;
use App\Models\Frontend\UserModels\Project\Project;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Frontend\ReferenceData\ProvinceAndCity\City;
use App\Models\Frontend\UserModels\Project\Sections\ProjectContact\ProjectContactOadd;
use App\Models\Frontend\UserModels\Project\Sections\ProjectContact\ProjectContactMphone;
use App\Models\Frontend\UserModels\Project\Sections\ProjectContact\ProjectContactOphone;


class ProjectContact extends Model
{
    protected $guarded = [];

    public function project() {
        return $this->belongsTo(Project::class);
    }

    public function projectContactOfficeAddressItems() {
        return $this->hasMany(ProjectContactOadd::class);
    }

    public function projectContactOfficePhoneItems() {
        return $this->hasMany(ProjectContactOphone::class);
    }

    public function projectContactMobilePhoneItems() {
        return $this->hasMany(ProjectContactMphone::class);
    }

    public function city() {
        return $this->belongsTo(City::class);
    }
}
