<?php

namespace App\Models\Frontend\UserModels\Project\Sections;

use Illuminate\Database\Eloquent\Model;
use App\Models\Frontend\UserModels\Project\Project;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Frontend\UserModels\Project\Sections\ProjectInfo\ProjectInfoImage;


class ProjectInfo extends Model
{
    protected $guarded = [];

    public function project() {
        return $this->belongsTo(Project::class);
    }

    public function projectInfoImages() {
        return $this->hasMany(ProjectInfoImage::class);
    }
}
