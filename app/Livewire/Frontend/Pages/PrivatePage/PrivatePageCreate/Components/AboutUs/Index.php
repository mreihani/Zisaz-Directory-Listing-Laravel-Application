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
use App\Rules\PrivateSite\Hero\PrivateSiteSliderImagesValidationRule;

class Index extends Component
{
    use WithFileUploads;

    public $privateSiteId;
    public $privateSiteSectionNumber;

    public $image;
    public $title;
    public $aboutUs;
    public $licenses;
    public $contactUs;
    public $isDisplayed;

    protected function rules() {
        return [
            'image' => new PrivateSiteSliderImagesValidationRule(),
            'title' => 'required',
            'aboutUs' => 'required',
            'licenses' => 'required',
            'contactUs' => 'required',
        ];
    }

    protected $messages = [
        'title.required' => 'لطفا عنوان اصلی را وارد نمایید',
        'aboutUs.required' => 'لطفا اطلاعات مربوط به درباره ما را وارد نمایید',
        'licenses.required' => 'لطفا اطلاعات مربوط به مجوز ها و افتخارات را وارد نمایید',
        'contactUs.required' => 'لطفا اطلاعات تماس با ما را وارد نمایید',
    ];

    public function mount() {
        $this->privateSiteSectionNumber = 2; 

        if(is_null($this->privateSiteId)) {
            $this->image = ""; 
            $this->isDisplayed = false;
        } else {
            $psite = Psite::findOrFail($this->privateSiteId);
            
            $this->title = is_null($psite->aboutUs) ? "" : $psite->aboutUs->title; 
            $this->image = is_null($psite->aboutUs) ? "" : $psite->aboutUs->image; 
            $this->aboutUs = is_null($psite->aboutUs) ? "" : $psite->aboutUs->about_us; 
            $this->licenses = is_null($psite->aboutUs) ? "" : $psite->aboutUs->licenses; 
            $this->contactUs = is_null($psite->aboutUs) ? "" : $psite->aboutUs->contact_us; 
            $this->isDisplayed = (!is_null($psite->aboutUs) && $psite->aboutUs->is_displayed == 1) ? true : false;
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
        $psite = Psite::findOrFail($this->privateSiteId);

        if($psite->user->id !== auth()->user()->id) {
            abort(403);
        }

        return $psite;
    }

    public function save() {  
      
        $this->validate();

        $psite = $this->isPsiteOwner($this->privateSiteId);

        $aboutUs = $psite->aboutUs()->updateOrCreate([
            'psite_id' => $psite->id
        ],[
            'is_displayed' => $this->isDisplayed == true ? 1 : 0,
            'title' => Purify::clean($this->title),
            'about_us' => Purify::clean($this->aboutUs),
            'licenses' => Purify::clean($this->licenses),
            'contact_us' => Purify::clean($this->contactUs),
            'image' => $this->handleImageUpload($psite),
        ]);
        
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
