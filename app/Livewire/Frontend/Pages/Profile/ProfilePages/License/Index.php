<?php

namespace App\Livewire\Frontend\Pages\Profile\ProfilePages\License;

use Livewire\Component;
use Livewire\WithFileUploads;
use Intervention\Image\Facades\Image;
use Stevebauman\Purify\Facades\Purify;
use Illuminate\Support\Facades\Storage;

class Index extends Component
{
   use WithFileUploads;

   public $section;
   public $licenses;
   public $licenseTypeValue;
   public $otherDescription;
   public $otherDescriptionStatus;
   public $licenseImage;
   public $licenseItem;
   
    protected function rules()
    {
        return 
        [
            'licenseTypeValue' => 'required',
            'otherDescription' => 'required',
            'licenseImage' => 'required',
        ];
	}
    
    protected $messages = [
        'licenseTypeValue.required' => 'لطفا نوع مجوز را انتخاب نمایید.',
        'otherDescription.required' => 'لطفا عنوان یا شرح مجوز را وارد نمایید.',
        'licenseImage.required' => 'لطفا تصویر مجوز را بارگذاری نمایید.',
    ];
    
    public function mount() {
        $this->section = 1;
        $this->licenses = $this->getLicenses();
        $this->licenseTypeValue = "";
        $this->otherDescriptionStatus = false;
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

    public function licenseType($value) {
        if($value == "other") {
            $this->otherDescriptionStatus = true;
        } else {
            $this->otherDescriptionStatus = false;
        }
    }

    private function handleFileUpload() {
        $userId = auth()->user()->id;
        $file = $this->licenseImage;

        $unique_image_name = hexdec(uniqid());
        $filename = $unique_image_name . '.' . 'jpg';

        $dir = "$userId/$filename";
       
        if ($this->licenseItem != null) {
            unlink(Storage::path("private/" . $userId . "/" . $this->licenseItem->license_image));
        }

        $img = Image::make($file)->encode('jpg')->resize(1200, null, function ($constraint) {
            $constraint->aspectRatio();
        });
        Storage::disk('private')->put($dir, $img);

        return $filename;
    }

    public function editLicense($id) {
        $this->licenseItem = auth()->user()->userProfile->userProfileLicense->licenseItems()->find($id);
        $this->section = 2;
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
    
    public function save() {

        // $this->validate();

        // Get uploaded image address
        $profileImageAddress = $this->handleFileUpload();

        $userProfile = auth()->user()->userProfile()->firstOrCreate(['user_id' => auth()->user()->id]);
        $profileLicense = $userProfile->userProfileLicense()->firstOrCreate(['user_profile_id' => $userProfile->id]);

        if(!is_null($this->licenseItem)) {
            $this->licenseItem->update([
                'license_type' => Purify::clean($this->licenseTypeValue),
                'description' => Purify::clean($this->otherDescription),
                'license_image' => $profileImageAddress,
            ]);
        } else {
            $userProfileLicense = $profileLicense->licenseItems()->create([
                'license_type' => Purify::clean($this->licenseTypeValue),
                'description' => Purify::clean($this->otherDescription),
                'license_image' => $profileImageAddress,
            ]);
        }

        // $this->dispatch('resumeSectionNumber', resumeSectionNumber: 4 );
        $this->section = 1;
        $this->licenseItem = null;
        $this->licenses = $this->getLicenses();
    }

    public function render()
    {
        return view('frontend.pages.profile.profile-pages.license.component.index');
    }
}
