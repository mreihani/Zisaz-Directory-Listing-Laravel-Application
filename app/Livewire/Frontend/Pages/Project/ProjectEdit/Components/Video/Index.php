<?php

namespace App\Livewire\Frontend\Pages\Project\ProjectEdit\Components\Video;

use File;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Intervention\Image\Facades\Image;
use Stevebauman\Purify\Facades\Purify;
use Illuminate\Support\Facades\Storage;
use App\Jobs\Project\Video\ConvertProjectVideo;
use App\Models\Frontend\UserModels\Project\Project;
use App\Rules\Project\Video\ProjectVideoValidationRule;
use App\Jobs\Project\Video\CreateImageThumbnailProjectVideo;

class Index extends Component
{
    use WithFileUploads;

    public $projectId;
    public $projectSectionNumber;
    
    // video
    public $video;
    public $videoValidation;
    public $isUploadAllowed;
    public $projectVideo;

    protected function rules() {
        return [
            'videoValidation' => new ProjectVideoValidationRule($this->video, $this->projectId),
        ];
    }

    public function mount() {
        if(is_null($this->projectId)) {
            $this->isUploadAllowed = false;
        } else {
            $project = Project::findOrFail($this->projectId);
            $this->isUploadAllowed = $this->isUploadAllowedHandler($project);
            $this->projectVideo = $project->projectVideo;
        }
    }

    // find out if user is allowed to upload a new video or to replace the old one
    private function isUploadAllowedHandler($project) {
        // clean slate, first time upload
        if(is_null($project->projectVideo) || is_null($project->projectVideo->video)) {
            return true;
        }

        // user has already uploaded a video and the job has been finished succesfully
        if($project->projectVideo->isVideoJobFinished() && $project->projectVideo->isThumbnailJobFinished()) {
            return true;
        }

        return false;
    }

    private function handleVideoUpload($project) {
        if(is_null($this->video)) {
            return;
        }

        // remove existing file from server
        if(!is_null($project->projectVideo) && !is_null($project->projectVideo->video) && file_exists($project->projectVideo->video)) {
            unlink($project->projectVideo->video);
        }

        $filename = hexdec(uniqid()) . '.' . 'mp4';
        $dir = 'upload/project-resources/' . $project->id . '/video' . '/' . $filename;

        //dispatch a job to convert video by FFmpeg
        $videoJob = dispatch(new ConvertProjectVideo([
            'path' => $this->video->getRealPath(),
            'dir' => $dir,
            'projectId' => $this->projectId
        ]));

        return 'storage/upload/project-resources/' . $project->id . '/video' . '/' . $filename;
    }

    private function handleThumbnailUpload($project) {
        if(is_null($this->video)) {
            return;
        }

        // remove existing file from server
        if(!is_null($project->projectVideo) && !is_null($project->projectVideo->thumbnail) && file_exists($project->projectVideo->thumbnail)) {
            unlink($project->projectVideo->thumbnail);
        }

        $filename = hexdec(uniqid()) . '.' . 'png';
        $dir = 'upload/project-resources/' . $project->id . '/video' . '/' . $filename;

        //dispatch a job to convert video by FFmpeg
        dispatch(new CreateImageThumbnailProjectVideo([
            'path' => $this->video->getRealPath(),
            'dir' => $dir,
            'projectId' => $this->projectId
        ]));

        return 'storage/upload/project-resources/' . $project->id . '/video' . '/' . $filename;
    }

    public function back() {
        $this->dispatch('projectSectionNumber', 
            projectSectionNumber: 3, 
        );
    }

    // check if project id is related to the owner
    private function isProjectOwner($projectId) {
      
        $project = Project::findOrFail($this->projectId);

        // the user is trying to edit a project that does not belong to himself/herself
        if(!auth()->check() || $project->user->id !== auth()->user()->id) {
            abort(403);
        } 

        return $project;
    }

    public function save() {  
       
        $this->validate();

        $project = $this->isProjectOwner($this->projectId);

        // here the user wants to skip the promotional video section
        if(!is_null($this->video)) {
            $promotionalVideo = $project->projectVideo()->updateOrCreate([
                'project_id' => $project->id
            ],[
                'video_job_id' => NULL,
                'video' => $this->handleVideoUpload($project),
                'thumbnail_job_id' => NULL,
                'thumbnail' => $this->handleThumbnailUpload($project),
            ]);
        } 

        // Show Toaster
        $this->dispatch('showToaster', 
            title: '', 
            message: '
                اطلاعات با موفقیت ذخیره شد.
            ', 
            type: 'bg-success'
        );

        return redirect(route('user.dashboard.saved-projects.index'));
    }

    public function render()
    {
        return view('frontend.pages.project.project-edit.components.project-sections.video.index');
    } 
}
