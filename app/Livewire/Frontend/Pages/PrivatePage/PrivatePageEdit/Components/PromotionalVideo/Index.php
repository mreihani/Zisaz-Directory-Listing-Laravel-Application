<?php

namespace App\Livewire\Frontend\Pages\PrivatePage\PrivatePageEdit\Components\PromotionalVideo;

use File;
use Livewire\Component;
use Illuminate\Support\Str;
use FFMpeg\Format\Video\X264;
use Livewire\WithFileUploads;
use FFMpeg\Coordinate\Dimension;
use Illuminate\Http\UploadedFile;
use Intervention\Image\Facades\Image;
use FFMpeg\Filters\Video\VideoFilters;
use Stevebauman\Purify\Facades\Purify;
use Illuminate\Support\Facades\Storage;
use ProtoneMedia\LaravelFFMpeg\Support\FFMpeg;
use App\Models\Frontend\UserModels\PrivateSite\Psite;
use ProtoneMedia\LaravelFFMpeg\Filters\WatermarkFactory;
use App\Jobs\PrivatePage\PromotionalVideo\ConvertPromotionalVideo;
use App\Jobs\PrivatePage\PromotionalVideo\CreateImageThumbnailPromotionalVideo;
use App\Rules\PrivateSite\PromotionalVideo\PrivateSitePromotionalVideoValidationRule;

class Index extends Component
{
    use WithFileUploads;
    
    public $privateSiteId;
    public $privateSiteSectionNumber;
    
    public $isHidden;
    public $headerDescription;
    public $video;
    public $videoValidation;
    public $isUploadAllowed;
    public $promotionalVideo;

    protected function rules() {
        return [
            'headerDescription' => 'required_if:isHidden,==,false',
            'videoValidation' => new PrivateSitePromotionalVideoValidationRule($this->video, $this->isHidden, $this->privateSiteId),
        ];
    }

    protected $messages = [
        'headerDescription.required_if' => 'لطفا شرح خدمات را وارد نمایید.',
    ];

    public function mount() {
        if(is_null($this->privateSiteId)) {
            $this->image = null; 
            $this->isHidden = false;
            $this->isUploadAllowed = false;
        } else {
            $psite = Psite::queryWithAllVerificationStatuses()->findOrFail($this->privateSiteId);
            
            $this->headerDescription = is_null($psite->promotionalVideo) ? "" : $psite->promotionalVideo->header_description; 
            $this->isHidden = (!is_null($psite->promotionalVideo) && $psite->promotionalVideo->is_hidden == 1) ? true : false;
            $this->isUploadAllowed = $this->isUploadAllowedHandler($psite);
            $this->promotionalVideo = $psite->promotionalVideo;
        }
    }

    // find out if user is allowed to upload a new video or to replace the old one
    private function isUploadAllowedHandler($psite) {
        // clean slate, first time upload
        if(is_null($psite->promotionalVideo) || is_null($psite->promotionalVideo->video)) {
            return true;
        }

        // user has already uploaded a video and the job has been finished succesfully
        if($psite->promotionalVideo->isVideoJobFinished() && $psite->promotionalVideo->isThumbnailJobFinished()) {
            return true;
        }

        return false;
    }

    private function handleVideoUpload($psite) {
        if(is_null($this->video)) {
            return;
        }

        // remove existing file from server
        if(!is_null($psite->promotionalVideo) && !is_null($psite->promotionalVideo->video) && file_exists($psite->promotionalVideo->video)) {
            unlink($psite->promotionalVideo->video);
        }

        $filename = hexdec(uniqid()) . '.' . 'mp4';
        $dir = 'upload/private-website-resources/' . $psite->id . '/promotional-video' . '/' . $filename;

        //dispatch a job to convert video by FFmpeg
        dispatch(new ConvertPromotionalVideo([
            'path' => $this->video->getRealPath(),
            'dir' => $dir,
            'privateSiteId' => $this->privateSiteId
        ]));

        return 'storage/upload/private-website-resources/' . $psite->id . '/promotional-video' . '/' . $filename;
    }

    private function handleThumbnailUpload($psite) {
        if(is_null($this->video)) {
            return;
        }

        // remove existing file from server
        if(!is_null($psite->promotionalVideo) && !is_null($psite->promotionalVideo->thumbnail) && file_exists($psite->promotionalVideo->thumbnail)) {
            unlink($psite->promotionalVideo->thumbnail);
        }

        $filename = hexdec(uniqid()) . '.' . 'png';
        $dir = 'upload/private-website-resources/' . $psite->id . '/promotional-video' . '/' . $filename;

        //dispatch a job to convert video by FFmpeg
        dispatch(new CreateImageThumbnailPromotionalVideo([
            'path' => $this->video->getRealPath(),
            'dir' => $dir,
            'privateSiteId' => $this->privateSiteId
        ]));

        return 'storage/upload/private-website-resources/' . $psite->id . '/promotional-video' . '/' . $filename;
    }

    public function back() {
        $this->dispatch('privateSiteSectionNumber', 
            privateSiteSectionNumber: 3, 
        );
    }

    // check if private site id is related to the owner
    private function isPsiteOwner($privateSiteId) {
        $psite = Psite::queryWithAllVerificationStatuses()->findOrFail($this->privateSiteId);

        if(!auth()->check() || $psite->user->id !== auth()->user()->id) {
            abort(403);
        }

        return $psite;
    }

    public function changeDisplayStatus() {
        //
    }

    public function save() {  
        
        $this->validate();
        
        $psite = $this->isPsiteOwner($this->privateSiteId);

        $psite->update([
            'verify_status' => 'pending'
        ]);
        
        // here the user wants to skip the promotional video section
        if($this->isHidden) {
            $promotionalVideo = $psite->promotionalVideo()->updateOrCreate([
                'psite_id' => $psite->id
            ],[
                'is_hidden' => $this->isHidden == true ? 1 : 0,
            ]);
            // here the user is trying to upload a video for the first time
        } elseif(!$this->isHidden && !is_null($this->video)) {
            $promotionalVideo = $psite->promotionalVideo()->updateOrCreate([
                'psite_id' => $psite->id
            ],[
                'is_hidden' => $this->isHidden == true ? 1 : 0,
                'header_description' => Purify::clean($this->headerDescription),
                'video_job_id' => NULL,
                'video' => $this->handleVideoUpload($psite),
                'thumbnail_job_id' => NULL,
                'thumbnail' => $this->handleThumbnailUpload($psite),
            ]);
            // the video has already been uploaded and the user skips this section
        } elseif(!$this->isHidden && is_null($this->video)) {
            $promotionalVideo = $psite->promotionalVideo()->updateOrCreate([
                'psite_id' => $psite->id
            ],[
                'is_hidden' => $this->isHidden == true ? 1 : 0,
                'header_description' => Purify::clean($this->headerDescription),
            ]);
        }

        $this->dispatch('privateSiteSectionNumber', 
            privateSiteSectionNumber: 5, 
        );
    }

    public function render()
    {
        return view('frontend.pages.private-page.private-page-edit.components.website-sections.promotional-video.index');
    } 
}
