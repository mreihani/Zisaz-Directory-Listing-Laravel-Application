<?php

namespace App\Livewire\Frontend\Pages\Profile\ProfilePages\License;

use Livewire\Component;
use Intervention\Image\Facades\Image;
use Stevebauman\Purify\Facades\Purify;
use Illuminate\Support\Facades\Storage;

class Index extends Component
{
   public $section;
   public $licenses;
   public $licenseItem;
   public $licenseSectionNumber;
    
    public function mount() {
        $this->section = 1;
        $this->licenses = $this->getLicenses();
        $this->licenseTypeValue = "";
        $this->otherDescriptionStatus = false;
    }

    protected $listeners = [
        'licenseSectionNumber' => 'licenseSectionNumber'
    ];

    public function licenseSectionNumber($licenseSectionNumber) {
        $this->licenses = $this->getLicenses();
        $this->section = $licenseSectionNumber;
    }

    private function isLicense() {
        return !! (
            auth()->user()->userProfile 
            && auth()->user()->userProfile->userProfileLicense 
            && auth()->user()->userProfile->userProfileLicense->licenseItems
        );
    }

    private function getLicenses() {
        if($this->isLicense()) {
            return auth()->user()->userProfile->userProfileLicense->licenseItems;
        }
        return false;
    }

    public function addNewLicense() {
        $this->licenseItem = null;
        $this->section = 2;
    }

    public function editLicense($id) {
        $this->licenseItem = auth()->user()->userProfile->userProfileLicense->licenseItems()->find($id);
        $this->section = 3;
        $this->licenseTypeValue = $this->licenseItem->license_type;
        $this->licenseImage = $this->licenseItem->license_image;
    }

    public function deleteLicense($id) {
        $userId = auth()->user()->id;
        $licenseItem = auth()->user()->userProfile->userProfileLicense->licenseItems()->find($id);
        $licenseImage = route('assets', [auth()->user()->id, $licenseItem->license_image]);
        unlink(Storage::path("private/" . $userId . "/" . $licenseItem->license_image));
        $licenseItem->delete();     
        
        $this->licenses = $this->getLicenses();
    }

    public function render()
    {
        return view('frontend.pages.profile.profile-pages.license.component.index');
    }
}
