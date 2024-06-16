<?php

namespace App\Models\Frontend\UserModels\Project\Sections\ProjectFacility;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Frontend\UserModels\Project\Sections\ProjectFacility;

class ProjectPlanImage extends Model
{
    protected $guarded = [];

    public function projectInfo() {
        return $this->belongsTo(ProjectFacility::class);
    }

    
}
