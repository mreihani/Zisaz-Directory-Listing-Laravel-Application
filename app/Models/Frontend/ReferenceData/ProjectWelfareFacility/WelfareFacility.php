<?php

namespace App\Models\Frontend\ReferenceData\ProjectWelfareFacility;

use Illuminate\Database\Eloquent\Model;
use App\Models\Frontend\UserModels\Project\Project;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class WelfareFacility extends Model
{
    protected $guarded = [];
    public $timestamps = false;

    public function project() {
        return $this->belongsToMany(Project::class);
    }
}
