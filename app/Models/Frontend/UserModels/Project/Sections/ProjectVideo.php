<?php

namespace App\Models\Frontend\UserModels\Project\Sections;

use App\Models\Job;
use Illuminate\Database\Eloquent\Model;
use App\Models\Frontend\UserModels\Project\Project;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class ProjectVideo extends Model
{
    protected $guarded = [];

    public function project() {
        return $this->belongsTo(Project::class);
    }

    // check if job related to video conversion is done or not
    public function isVideoJobFinished() {
        if(is_null($this->video_job_id) || $this->belongsTo(Job::class, 'video_job_id', 'id')->get()->count()) {
            return false;
        }

        return true;
    }

    // check if job related to thumbnail conversion is done or not
    public function isThumbnailJobFinished() {
        if(is_null($this->thumbnail_job_id) || $this->belongsTo(Job::class, 'thumbnail_job_id', 'id')->get()->count()) {
            return false;
        }

        return true;
    }
}