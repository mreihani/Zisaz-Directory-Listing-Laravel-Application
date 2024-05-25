<?php

namespace App\Livewire\Frontend\Pages\PrivatePage\PrivatePageCreate\Components\PromotionalVideo;

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

    protected function rules() {
        return [
            'headerDescription' => 'required_if:isHidden,==,false',
            'videoValidation' => new PrivateSitePromotionalVideoValidationRule($this->video, $this->isHidden),
        ];
    }

    protected $messages = [
        'headerDescription.required_if' => 'لطفا شرح خدمات را وارد نمایید.',
    ];

    public function mount() {
        if(is_null($this->privateSiteId)) {
            $this->image = null; 
            $this->isHidden = false;
        } else {
            $psite = Psite::findOrFail($this->privateSiteId);
            
            $this->headerDescription = is_null($psite->promotionalVideo) ? "" : $psite->promotionalVideo->header_description; 
            $this->isHidden = (!is_null($psite->promotionalVideo) && $psite->promotionalVideo->is_hidden == 1) ? true : false;
        }
    }

    private function handleVideoUpload($psite) {
        if(!is_string($this->video)) {

            // remove previous video if available
            // if(!is_null($psite->promotionalVideo) && !is_null($psite->promotionalVideo->video)) {
            //     $video = $psite->promotionalVideo->video;
            //     unlink($video);
            // }

            $filename = hexdec(uniqid()) . '.' . 'mp4';
            $dir = 'upload/private-website-resources/' . $psite->id . '/promotional-video' . '/' . $filename;

            //dispatch a job to convert video by FFmpeg
            dispatch(new ConvertPromotionalVideo([
                'path' => $this->video->getRealPath(),
                'dir' => $dir,
            ]));

            return 'storage/upload/private-website-resources/' . $psite->id . '/promotional-video' . '/' . $filename;
        } else {
            return $this->video;
        }
    }

    public function back() {
        $this->dispatch('privateSiteSectionNumber', 
            privateSiteSectionNumber: 3, 
        );
    }

    // check if private site id is related to the owner
    private function isPsiteOwner($privateSiteId) {
        $psite = Psite::findOrFail($this->privateSiteId);

        if($psite->user->id !== auth()->user()->id) {
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

        if($this->isHidden) {
            $promotionalVideo = $psite->promotionalVideo()->updateOrCreate([
                'psite_id' => $psite->id
            ],[
                'is_hidden' => $this->isHidden == true ? 1 : 0,
            ]);
        } else {
            $promotionalVideo = $psite->promotionalVideo()->updateOrCreate([
                'psite_id' => $psite->id
            ],[
                'is_hidden' => $this->isHidden == true ? 1 : 0,
                'header_description' => Purify::clean($this->headerDescription),
                'video' => $this->handleVideoUpload($psite),
            ]);
        }

        $this->dispatch('privateSiteSectionNumber', 
            privateSiteSectionNumber: 5, 
        );
    }

    public function render()
    {
        return view('frontend.pages.private-page.private-page-create.components.website-sections.promotional-video.index');
    } 
}
