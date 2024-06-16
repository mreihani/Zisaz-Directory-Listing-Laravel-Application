<?php

namespace App\Models\Frontend\UserModels\Project\Sections;

use Illuminate\Database\Eloquent\Model;
use App\Models\Frontend\UserModels\Project\Project;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProjectImage extends Model
{
    protected $guarded = [];

    public function project() {
        return $this->belongsTo(Project::class);
    }
}
