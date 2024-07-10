<?php

namespace App\Livewire\Frontend\Pages\PrivatePage\PrivatePageEdit\Components\MiddleBanner;

use File;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Intervention\Image\Facades\Image;
use Stevebauman\Purify\Facades\Purify;
use Illuminate\Support\Facades\Storage;
use App\Models\Frontend\UserModels\PrivateSite\Psite;
use App\Rules\PrivateSite\MiddleBanner\PrivateSiteMiddleBannerImageValidationRule;

class Index extends Component
{
    use WithFileUploads;

    public $privateSiteId;
    public $privateSiteSectionNumber;
    
    public $isHidden;
    public $headerTitle;
    public $headerDescription;
    public $image;
    public $imageValidation;

    protected function rules() {
        return [
            // 'imageValidation' => new PrivateSiteMiddleBannerImageValidationRule($this->image, $this->isHidden),
            'headerTitle' => 'required_if:isHidden,==,false',
            'headerDescription' => 'required_if:isHidden,==,false',
        ];
    }

    protected $messages = [
        'headerTitle.required_if' => 'لطفا عنوان اصلی بنر تبلیغاتی را وارد نمایید.',
        'headerDescription.required_if' => 'لطفا توضیحات بنر تبلیغاتی را وارد نمایید.',
    ];

    public function mount() {
        if(is_null($this->privateSiteId)) {
            $this->isHidden = false;
            $this->image = null; 
        } else {
            $psite = Psite::queryWithAllVerificationStatuses()->findOrFail($this->privateSiteId);
            $this->isHidden = (!is_null($psite->middleBanner) && $psite->middleBanner->is_hidden == 1) ? true : false;
            $this->image = is_null($psite->middleBanner) ? null : $psite->middleBanner->image; 
            $this->headerTitle = is_null($psite->middleBanner) ? "" : $psite->middleBanner->header_title; 
            $this->headerDescription = is_null($psite->middleBanner) ? "" : $psite->middleBanner->header_description; 
        }
    }

    private function handleImageUpload($psite) {

        if(!is_string($this->image) && !is_null($this->image)) {

            // remove previous image if available
            if(!is_null($psite->middleBanner) && !is_null($psite->middleBanner->image)) {
                $image = $psite->middleBanner->image;
                unlink($image);
            }

            $dir = 'upload/private-website-resources/' . $psite->id . '/middle-banner';

            $unique_image_name = hexdec(uniqid());
            $filename = $unique_image_name . '.' . 'jpg';
            $img = Image::make($this->image)->fit(1734, 891)->encode('jpg');
            $image_path = $dir . '/' . $filename;
            Storage::disk('public')->put($image_path, $img);

            return 'storage/upload/private-website-resources/' . $psite->id . '/middle-banner' . '/' . $filename;
        } else {
            return $this->image;
        }
    }

    public function back() {
        $this->dispatch('privateSiteSectionNumber', 
            privateSiteSectionNumber: 8, 
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
            'verify_status' => 'pending',
            'reject_description' => NULL
        ]);
        
        if($this->isHidden) {
            $middleBanner = $psite->middleBanner()->updateOrCreate([
                'psite_id' => $psite->id
            ],[
                'is_hidden' => $this->isHidden == true ? 1 : 0,
            ]);
        } else {
            $middleBanner = $psite->middleBanner()->updateOrCreate([
                'psite_id' => $psite->id
            ],[
                'is_hidden' => $this->isHidden == true ? 1 : 0,
                'header_title' => Purify::clean($this->headerTitle),
                'header_description' => Purify::clean($this->headerDescription),
                'image' => $this->handleImageUpload($psite),
            ]);
        }

        $this->dispatch('privateSiteSectionNumber', 
            privateSiteSectionNumber: 10, 
        );
    }

    public function render()
    {
        return view('frontend.pages.private-page.private-page-edit.components.website-sections.middle-banner.index');
    } 
}
