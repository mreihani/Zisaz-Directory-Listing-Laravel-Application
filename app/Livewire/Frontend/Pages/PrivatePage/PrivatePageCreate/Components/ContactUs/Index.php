<?php

namespace App\Livewire\Frontend\Pages\PrivatePage\PrivatePageCreate\Components\ContactUs;

use File;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Intervention\Image\Facades\Image;
use Stevebauman\Purify\Facades\Purify;
use Illuminate\Support\Facades\Storage;
use App\Models\Frontend\ReferenceData\ProvinceAndCity\Province;

class Index extends Component
{
    use WithFileUploads;

    public $businessType;
    public $businessTitle;
    public $businessLicenseNumber;
    public $businessImage;
    public $selectedProvinceId;
    public $selectedProvinceIdValidation;
    public $selectedCityId;
    public $selectedCityIdValidation;
    public $provinces;
    public $cities;
  
    // address repeater form
    public $address;
    public $addressInputs;
    public $addressIteration;

    // office phone repeater form
    public $officePhone;
    public $officePhoneInputs;
    public $officePhoneIteration;

    // mobile phone repeater form
    public $mobilePhone;
    public $mobilePhoneInputs;
    public $mobilePhoneIteration;

    // social mediarepeater form
    public $socialMedia;
    public $socialMediaInputs;
    public $socialMediaIteration;
    public $socialMediaTypeValue;

    // postal code repeater form
    public $postalCode;
    public $postalCodeInputs;
    public $postalCodeIteration;

    // license items repeater form
    public $licenses = false;
    public $licenseImage = [null];
    public $licenseTypeValue = [""];
    public $otherDescription = [];
    public $otherDescriptionStatus = [];
    public $licenseInputs = [0];
    public $licenseIteration = 1;
    
    protected function rules() {
        return [
            // 'selectedProvinceIdValidation' => new SelectedProvinceValidationRule($this->resumeGoal, $this->selectedProvinceId, $this->adsType, $this->employmentAdsType),
            // 'selectedCityIdValidation' => new SelectedCityValidationRule($this->resumeGoal, $this->selectedCityId, $this->adsType, $this->employmentAdsType),
        ];
    }

    // protected $messages = [
    //     'addressTypeValue.*.required_if' => 'لطفا نوع مجوز را انتخاب نمایید.',
        
    // ];

    public function mount() {
        $this->businessType = "";
        $this->businessImage = "";
        $this->selectedProvinceId = "";
        $this->selectedCityId = "";
        $this->provinces = Province::all();
        $this->cities = [];

        // address repeater form
        $this->address = [];
        $this->addressInputs = [0];
        $this->addressIteration = 1;

        // office phone repeater form
        $this->officePhone = [];
        $this->officePhoneInputs = [0];
        $this->officePhoneIteration = 1;

        // mobile phone repeater form
        $this->mobilePhone = [];
        $this->mobilePhoneInputs = [0];
        $this->mobilePhoneIteration = 1;

        // social media repeater form
        $this->socialMedia = [];
        $this->socialMediaInputs = [0];
        $this->socialMediaIteration = 1;
        $this->socialMediaTypeValue = [""];

        // postal code repeater form
        $this->postalCode = [];
        $this->postalCodeInputs = [0];
        $this->postalCodeIteration = 1;
        
        // license items repeater form
        $this->licenses = false;
        $this->licenseImage = [null];
        $this->licenseTypeValue = [""];
        $this->otherDescription = [];
        $this->otherDescriptionStatus = [];
        $this->licenseInputs = [0];
        $this->licenseIteration = 1;
    }

    public function loadCitiesByProvinceChange() {
        $selectedProvinceId = $this->selectedProvinceId;
        $this->cities = Province::find($selectedProvinceId)->city;
        $this->selectedCityId = $this->cities->first()->id;
    }

    // address repeater form
    public function addAddress($addressIteration) {
        $this->addressIteration = $addressIteration + 1;
        array_push($this->addressInputs, $addressIteration);
    }
    public function removeAddress($addressKey) {
        if(count($this->addressInputs) > 1) {
            unset($this->addressInputs[$addressKey]);    
        }
    }

    // office phone repeater form
    public function addOfficePhone($officePhoneIteration) {
        $this->officePhoneIteration = $officePhoneIteration + 1;
        array_push($this->officePhoneInputs, $officePhoneIteration);
    }
    public function removeOfficePhone($officePhoneKey) {
        if(count($this->officePhoneInputs) > 1) {
            unset($this->officePhoneInputs[$officePhoneKey]);    
        }
    }

    // mobile phone repeater form
    public function addMobilePhone($mobilePhoneIteration) {
        $this->mobilePhoneIteration = $mobilePhoneIteration + 1;
        array_push($this->mobilePhoneInputs, $mobilePhoneIteration);
    }
    public function removeMobilePhone($mobilePhoneKey) {
        if(count($this->mobilePhoneInputs) > 1) {
            unset($this->mobilePhoneInputs[$mobilePhoneKey]);    
        }
    }

    // social media repeater form
    public function addSocialMedia($socialMediaIteration) {
        $this->socialMediaIteration = $socialMediaIteration + 1;
        $this->socialMediaTypeValue[$socialMediaIteration] = "";
        array_push($this->socialMediaInputs, $socialMediaIteration);
    }
    public function removeSocialMedia($socialMediaKey) {
        if(count($this->socialMediaInputs) > 1) {
            unset($this->socialMediaInputs[$socialMediaKey]);    
            unset($this->socialMediaTypeValue[$socialMediaKey]);    
        }
    }

    // postal code repeater form
    public function addPostalCode($postalCodeIteration) {
        $this->postalCodeIteration = $postalCodeIteration + 1;
        array_push($this->postalCodeInputs, $postalCodeIteration);
    }
    public function removePostalCode($postalCodeKey) {
        if(count($this->postalCodeInputs) > 1) {
            unset($this->postalCodeInputs[$postalCodeKey]);    
        }
    }

    // license items repeater form
    public function licenseType($value, $licenseValue) {
        if($value == "other") {
            $this->otherDescriptionStatus[$licenseValue] = true;
        } else {
            $this->otherDescriptionStatus[$licenseValue] = false;
        }
    }
    private function handleLicenseUpload() {
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
    public function addLicense($licenseIteration) {
        $this->licenseIteration = $licenseIteration + 1;
        $this->licenseTypeValue[$licenseIteration] = "";
        $this->licenseImage[$licenseIteration] = null;
        array_push($this->licenseInputs, $licenseIteration);
    }
    public function removeLicense($licenseKey) {
        if(count($this->licenseInputs) > 1) {
            unset($this->licenseInputs[$licenseKey]);    
            unset($this->licenseTypeValue[$licenseKey]);    
            unset($this->licenseImage[$licenseKey]);    
        }
    }

    // save addresses into DB
    private function saveAddressesHandler($psite) {
        foreach ($this->address as $key => $value) {

            if($value == "") {
                continue;
            }

            $psite->privateSiteAddresses()->create([
                'address' => Purify::clean($value),
            ]);
        }
    }

    // save office phone numbers into DB
    private function saveOfficePhoneNumbersHandler($psite) {
        foreach ($this->officePhone as $key => $value) {

            if($value == "") {
                continue;
            }

            $psite->privateSiteOfficePhoneNumbers()->create([
                'office_phone' => Purify::clean($value),
            ]);
        }
    }

    // save mobile phone numbers into DB
    private function saveMobilePhoneNumbersHandler($psite) {
        foreach ($this->mobilePhone as $key => $value) {

            if($value == "") {
                continue;
            }

            $psite->privateSiteMobilePhoneNumbers()->create([
                'mobile_phone' => Purify::clean($value),
            ]);
        }
    }

    // save social media into DB
    private function saveSocialMediaHandler($psite) {
        foreach ($this->socialMediaTypeValue as $key => $value) {

            if($value == "") {
                continue;
            }

            $psite->privateSiteSocialMedia()->create([
                'social_media' => Purify::clean($value),
            ]);
        }
    }

    // save postal code numbers into DB
    private function savePostalCodesHandler($psite) {
        foreach ($this->postalCode as $key => $value) {

            if($value == "") {
                continue;
            }

            $psite->privateSitePostalCodes()->create([
                'postal_code' => Purify::clean($value),
            ]);
        }
    }

    public function save() {    
      
        $this->validate();

        $psite = auth()->user()->privateSite()->create([
            'business_type' => Purify::clean($this->businessType),
            'business_title' => Purify::clean($this->businessTitle),
            'business_license_number' => Purify::clean($this->businessLicenseNumber),
            'city_id' => Purify::clean($this->selectedCityId),
            // 'image' => ,
            // 'image_sm' => ,
        ]);
        
        // save addresses into DB
        $this->saveAddressesHandler($psite);

        // save office phone numbers into DB
        $this->saveOfficePhoneNumbersHandler($psite);

        // save mobile phone numbers into DB
        $this->saveMobilePhoneNumbersHandler($psite);

        // save social media into DB
        $this->saveSocialMediaHandler($psite);

        // save postal code numbers into DB
        $this->savePostalCodesHandler($psite);

        // Show Toaster
        $this->dispatch('showToaster', 
            title: '', 
            message: '
                اطلاعات با موفقیت ذخیره شد.
            ', 
            type: 'bg-success'
        );
    }

   
    public function render()
    {
        return view('frontend.pages.private-page.private-page-create.component.index');
    } 
}
