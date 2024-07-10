<?php

namespace App\Livewire\Frontend\Pages\PrivatePage\PrivatePageCreate\Components\AboutUs;

use File;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Gate;
use Intervention\Image\Facades\Image;
use Stevebauman\Purify\Facades\Purify;
use Illuminate\Support\Facades\Storage;
use App\Models\Frontend\UserModels\PrivateSite\Psite;
use App\Rules\PrivateSite\AboutUs\PrivateSiteAboutUsImageValidationRule;

class Index extends Component
{
    use WithFileUploads;

    public $privateSiteId;
    public $privateSiteSectionNumber;

    public $image;
    public $imageValidation;
    public $title;
    public $headerDescription;
    public $aboutUs;
    public $licenses;
    public $contactUs;
    public $isHidden;

    protected function rules() {
        return [
            'imageValidation' => new PrivateSiteAboutUsImageValidationRule($this->image, $this->isHidden),
            'title' => 'required_if:isHidden,==,false',
            'headerDescription' => 'required_if:isHidden,==,false',
            'aboutUs' => 'required_if:isHidden,==,false',
            'licenses' => 'required_if:isHidden,==,false',
            'contactUs' => 'required_if:isHidden,==,false',
        ];
    }

    protected $messages = [
        'title.required_if' => 'لطفا نام کسب و کار را وارد نمایید',
        'headerDescription.required_if' => 'لطفا سر تیتر را وارد نمایید',
        'aboutUs.required_if' => 'لطفا اطلاعات مربوط به درباره ما را وارد نمایید',
        'licenses.required_if' => 'لطفا اطلاعات مربوط به مجوز ها و افتخارات را وارد نمایید',
        'contactUs.required_if' => 'لطفا اطلاعات تماس با ما را وارد نمایید',
    ];

    public function mount() {
        $this->privateSiteSectionNumber = 2; 

        if(is_null($this->privateSiteId)) {
            $this->image = null; 
            $this->isHidden = false;
        } else {
            $psite = Psite::queryWithAllVerificationStatuses()->findOrFail($this->privateSiteId);
            
            $this->title = is_null($psite->aboutUs) ? "" : $psite->aboutUs->title; 
            $this->headerDescription = is_null($psite->aboutUs) ? "" : $psite->aboutUs->header_description; 
            $this->image = is_null($psite->aboutUs) ? null : $psite->aboutUs->image; 
            $this->aboutUs = is_null($psite->aboutUs) ? "" : $psite->aboutUs->about_us; 
            $this->licenses = is_null($psite->aboutUs) ? "" : $psite->aboutUs->licenses; 
            $this->contactUs = is_null($psite->aboutUs) ? "" : $psite->aboutUs->contact_us; 
            $this->isHidden = (!is_null($psite->aboutUs) && $psite->aboutUs->is_hidden == 1) ? true : false;
        }
    }

    private function handleImageUpload($psite) {

        if(!is_string($this->image)) {

            // remove previous image if available
            if(!is_null($psite->aboutUs) && !is_null($psite->aboutUs->image)) {
                $image = $psite->aboutUs->image;
                unlink($image);
            }

            $dir = 'upload/private-website-resources/' . $psite->id . '/about-us';

            $unique_image_name = hexdec(uniqid());
            $filename = $unique_image_name . '.' . 'jpg';
            $img = Image::make($this->image)->fit(576, 562)->encode('jpg');
            $image_path = $dir . '/' . $filename;
            Storage::disk('public')->put($image_path, $img);

            return 'storage/upload/private-website-resources/' . $psite->id . '/about-us' . '/' . $filename;
        } else {
            return $this->image;
        }
    }

    public function back() {
        $this->dispatch('privateSiteSectionNumber', 
            privateSiteSectionNumber: 1, 
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
            $aboutUs = $psite->aboutUs()->updateOrCreate([
                'psite_id' => $psite->id
            ],[
                'is_hidden' => $this->isHidden == true ? 1 : 0,
            ]);
        } else {
            $aboutUs = $psite->aboutUs()->updateOrCreate([
                'psite_id' => $psite->id
            ],[
                'is_hidden' => $this->isHidden == true ? 1 : 0,
                'title' => Purify::clean($this->title),
                'header_description' => Purify::clean($this->headerDescription),
                'about_us' => Purify::clean($this->aboutUs),
                'licenses' => Purify::clean($this->licenses),
                'contact_us' => Purify::clean($this->contactUs),
                'image' => $this->handleImageUpload($psite),
            ]);
        }
        
        $this->dispatch('privateSiteSectionNumber', 
            privateSiteSectionNumber: 3, 
        );

        $this->dispatch('privateSiteId', 
            privateSiteId: $psite->id, 
        );
    }

    public function render()
    {
        return view('frontend.pages.private-page.private-page-create.components.website-sections.about-us.index');
    } 
}
