<?php

namespace App\Livewire\Frontend\Pages\PrivatePage\PrivatePageEdit\Components\ContactUs;

use File;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Intervention\Image\Facades\Image;
use Stevebauman\Purify\Facades\Purify;
use Illuminate\Support\Facades\Storage;
use App\Models\Frontend\UserModels\PrivateSite\Psite;

class Index extends Component
{
    use WithFileUploads;

    public $privateSiteId;
    public $privateSiteSectionNumber;
  
    public $address;
    public $phone;
    public $email;

    // social media form
    public $instagram;
    public $telegram;
    public $whatsapp;
    public $x;
    public $linkedin;
    public $eitaa;
   
    // map
    public $latitude;
    public $longitude;
    public $mapInputValidation;
    
    protected function rules() {
        return [
            'address' => 'required',
            'phone' => 'required|regex:/^\d+$/',
            'email' => $this->email ? 'email' : ''
        ];
    }

    protected $messages = [
        'address.required' => 'لطفا آدرس کسب و کار را وارد نمایید',
        'phone.required' => 'لطفا شماره تلفن را وارد نمایید',
        'phone.regex' => 'لطفا شماره تلفن صحیح وارد نمایید',
        'email.email' => 'لطفا ایمیل صحیح وارد نمایید',
    ];

    public function mount() {
        $psite = Psite::queryWithAllVerificationStatuses()->findOrFail($this->privateSiteId);
        
        $this->address = is_null($psite->contactUs) ? null : $psite->contactUs->address; 
        $this->phone = is_null($psite->contactUs) ? null : $psite->contactUs->phone; 
        $this->email = is_null($psite->contactUs) ? null : $psite->contactUs->email; 

        // social media
        $this->instagram = is_null($psite->contactUs) ? null : $psite->contactUs->instagram; 
        $this->telegram = is_null($psite->contactUs) ? null : $psite->contactUs->telegram; 
        $this->whatsapp = is_null($psite->contactUs) ? null : $psite->contactUs->whatsapp; 
        $this->x = is_null($psite->contactUs) ? null : $psite->contactUs->x; 
        $this->linkedin = is_null($psite->contactUs) ? null : $psite->contactUs->linkedin; 
        $this->eitaa = is_null($psite->contactUs) ? null : $psite->contactUs->eitaa; 

        // map lat and lon
        $this->latitude = (is_null($psite->contactUs) || empty($psite->contactUs->lt)) ? null : $psite->contactUs->lt; 
        $this->longitude = (is_null($psite->contactUs) || empty($psite->contactUs->ln)) ? null : $psite->contactUs->ln; 
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

    public function save() {    

        $this->validate();

        $psite = $this->isPsiteOwner($this->privateSiteId);
        
        $psite->update([
            'verify_status' => 'pending',
            'reject_description' => NULL
        ]);
        
        $contactUs = $psite->contactUs()->updateOrCreate([
            'psite_id' => $psite->id
        ],[
            'address' => Purify::clean(trim($this->address)),
            'phone' => Purify::clean(trim($this->phone)),
            'email' => Purify::clean(trim(strtolower($this->email))),
            'lt' => Purify::clean(trim($this->latitude)),
            'ln' => Purify::clean(trim($this->longitude)),
            'instagram' => Purify::clean(trim($this->instagram)),
            'telegram' => Purify::clean(trim($this->telegram)),
            'whatsapp' => Purify::clean(trim($this->whatsapp)),
            'x' => Purify::clean(trim($this->x)),
            'linkedin' => Purify::clean(trim($this->linkedin)),
            'eitaa' => Purify::clean(trim($this->eitaa)),
        ]);

        $this->dispatch('privateSiteSectionNumber', 
            privateSiteSectionNumber: 3, 
        );
    }

    public function render()
    {
        return view('frontend.pages.private-page.private-page-create.components.website-sections.contact-us.index');
    } 
}
