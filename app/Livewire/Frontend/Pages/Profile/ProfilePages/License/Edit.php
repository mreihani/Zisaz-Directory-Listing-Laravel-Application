<?php

namespace App\Livewire\Frontend\Pages\Profile\ProfilePages\License;

use Livewire\Component;
use Livewire\WithFileUploads;
use Intervention\Image\Facades\Image;
use Stevebauman\Purify\Facades\Purify;
use Illuminate\Support\Facades\Storage;
use App\Rules\Profile\License\LicenseImageValidationRule;
use App\Rules\Profile\License\OtherDescriptionFieldValidationRule;

class Edit extends Component
{
   use WithFileUploads;

   public $section;
   public $licenses;
   public $licenseTypeValue;
   public $otherDescription;
   public $otherDescriptionStatus;
   public $licenseItem;
   public $licenseImage;
   
    protected function rules()
    {
        return 
        [
            'licenseTypeValue' => 'required',
            'otherDescription' => new OtherDescriptionFieldValidationRule($this->licenseTypeValue),
            'licenseImage' => [new LicenseImageValidationRule($this->licenseItem)],
        ];
	}
    
    protected $messages = [
        'licenseTypeValue.required' => 'لطفا نوع مجوز را انتخاب نمایید.',
    ];
    
    public function mount($licenseItem) {
        $this->licenseItem = $licenseItem;
        $this->section = 1;
        $this->licenses = $this->getLicenses();
        $this->licenseTypeValue = $licenseItem->license_type;
        $this->otherDescriptionStatus = $this->getOtherDescriptionStatus();
        $this->licenseImage = route('assets', [$this->getLicenseImageOwnerId(), $licenseItem->license_image]);
    }

    private function getLicenseImageOwnerId() {
        return $this->licenseItem->profileLicense->userProfile->user->id;
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

    public function licenseType($value) {
        if($value == "other") {
            $this->otherDescriptionStatus = true;
        } else {
            $this->otherDescriptionStatus = false;
        }
    }

    private function getOtherDescriptionStatus() {
        if($this->licenseItem->license_type == "other") {
            $this->otherDescription = $this->licenseItem->description;
            return true;
        }
        return false;
    }

    private function handleFileUpload() {
        $userId = auth()->user()->id;
        $file = $this->licenseImage;
     
        if(is_string($file)) {
            return false;
        }

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

    public function cancel() {
        $this->dispatch('licenseSectionNumber', licenseSectionNumber: 1 );
    }
    
    public function save() {

        $this->validate();

        // Get uploaded image address
        $profileImageAddress = $this->handleFileUpload();

        $userProfile = auth()->user()->userProfile()->firstOrCreate(['user_id' => auth()->user()->id]);
        $profileLicense = $userProfile->userProfileLicense()->firstOrCreate(['user_profile_id' => $userProfile->id]);

        if($profileImageAddress == false) {
            $profileLicense->licenseItems()->update([
                'license_type' => Purify::clean($this->licenseTypeValue),
                'description' => Purify::clean($this->otherDescription),
            ]);
        } else {
            $this->licenseItem->update([
                'license_type' => Purify::clean($this->licenseTypeValue),
                'description' => Purify::clean($this->otherDescription),
                'license_image' => $profileImageAddress,
            ]);
        }
        
        
        $this->dispatch('licenseSectionNumber', licenseSectionNumber: 1 );

        $this->dispatch('showToaster', 
            title: '', 
            message: 'مجوز با موفقیت بروزرسانی شد.', 
            type: 'bg-success'
        );
    }

    public function render()
    {
        return view('frontend.pages.profile.profile-pages.license.component.edit');
    }
}
