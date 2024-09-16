<?php

namespace App\Models\Frontend\UserModels\Project\Sections;

use Illuminate\Database\Eloquent\Model;
use App\Models\Frontend\UserModels\Project\Project;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Frontend\ReferenceData\ProvinceAndCity\City;
use App\Models\Frontend\UserModels\Project\Sections\ProjectContact\ProjectContactPhone;


class ProjectContact extends Model
{
    protected $guarded = [];

    public function project() {
        return $this->belongsTo(Project::class);
    }

    public function projectContactPhoneItems() {
        return $this->hasMany(ProjectContactPhone::class);
    }

    public function city() {
        return $this->belongsTo(City::class);
    }
}
