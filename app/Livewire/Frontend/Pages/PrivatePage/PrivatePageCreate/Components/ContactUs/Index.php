<?php

namespace App\Livewire\Frontend\Pages\PrivatePage\PrivatePageCreate\Components\ContactUs;

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
    
    public $isHidden;
    public $headerDescription;
  
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
    
    // email repeater form
    public $email;
    public $emailInputs;
    public $emailIteration;

    // social mediarepeater form
    public $socialMedia;
    public $socialMediaInputs;
    public $socialMediaIteration;
    public $socialMediaTypeValue;

    // postal code repeater form
    public $postalCode;
    public $postalCodeInputs;
    public $postalCodeIteration;

    // opening houres repeater form
    public $workingHour;
    public $workingHourInputs;
    public $workingHourIteration;

    // this email is used for contact us form
    public $contactUsFormEmail;

    // map
    public $latitude;
    public $longitude;
    public $mapInputValidation;
    
    protected function rules() {
        return [
            'contactUsFormEmail' => $this->isHidden ? '' : 'required|email',
            'mapInputValidation' => ((is_null($this->latitude) || is_null($this->longitude)) && $this->isHidden == false) ? 'required' : '',
        ];
    }

    protected $messages = [
        'contactUsFormEmail.required' => 'لطفا ایمیل فرم تماس با ما را وارد نمایید.',
        'contactUsFormEmail.email' => 'لطفا ایمیل صحیح وارد نمایید.',
        'mapInputValidation.required' => 'لطفا مختصات مکانی مورد نظر خود را از روی نقشه انتخاب نمایید.',
    ];

    public function mount() {
        if(is_null($this->privateSiteId)) {
            $this->isHidden = false;
        } else {
            $psite = Psite::findOrFail($this->privateSiteId);
            $this->isHidden = false;
            $this->contactUsFormEmail = is_null($psite->contactUs) ? "" : $psite->contactUs->email; 
            $this->latitude = is_null($psite->contactUs) ? "35.699756" : $psite->contactUs->lt; 
            $this->longitude = is_null($psite->contactUs) ? "51.338076" : $psite->contactUs->ln; 

            // repeater forms
            $this->getAddressesRepeaterFormInitialValues($psite);
            $this->getOfficePhoneRepeaterFormInitialValues($psite);
            $this->getMobilePhoneRepeaterFormInitialValues($psite);
            $this->getEmailRepeaterFormInitialValues($psite);
            $this->getSocialMediaRepeaterFormInitialValues($psite);
            $this->getPostalCodeRepeaterFormInitialValues($psite);
            $this->getWorkingHourRepeaterFormInitialValues($psite);
        }
    }

    private function getAddressesRepeaterFormInitialValues($psite) {
        if(is_null($psite->contactUs) || (!is_null($psite->contactUs) && count($psite->contactUs->psiteContactUsAddressItems) === 0)) {
            $this->address = [];
            $this->addressInputs = [0];
            $this->addressIteration = 1;
        } elseif(!is_null($psite->contactUs) && count($psite->contactUs->psiteContactUsAddressItems) > 0) {
            $this->address = $psite->contactUs->psiteContactUsAddressItems->pluck('address')->toArray();
            $this->addressInputs = $psite->contactUs->psiteContactUsAddressItems->keys()->toArray();
            $this->addressIteration = $psite->contactUs->psiteContactUsAddressItems->count();
        }
    }

    private function getOfficePhoneRepeaterFormInitialValues($psite) {
        if(is_null($psite->contactUs) || (!is_null($psite->contactUs) && count($psite->contactUs->psiteContactUsOfficePhoneItems) === 0)) {
            $this->officePhone = [];
            $this->officePhoneInputs = [0];
            $this->officePhoneIteration = 1;
        } elseif(!is_null($psite->contactUs) && count($psite->contactUs->psiteContactUsOfficePhoneItems) > 0) {
            $this->officePhone = $psite->contactUs->psiteContactUsOfficePhoneItems->pluck('phone')->toArray();
            $this->officePhoneInputs = $psite->contactUs->psiteContactUsOfficePhoneItems->keys()->toArray();
            $this->officePhoneIteration = $psite->contactUs->psiteContactUsOfficePhoneItems->count();
        }
    }

    private function getMobilePhoneRepeaterFormInitialValues($psite) {
        if(is_null($psite->contactUs) || (!is_null($psite->contactUs) && count($psite->contactUs->psiteContactUsMobilePhoneItems) === 0)) {
            $this->mobilePhone = [];
            $this->mobilePhoneInputs = [0];
            $this->mobilePhoneIteration = 1;
        } elseif(!is_null($psite->contactUs) && count($psite->contactUs->psiteContactUsMobilePhoneItems) > 0) {
            $this->mobilePhone = $psite->contactUs->psiteContactUsMobilePhoneItems->pluck('phone')->toArray();
            $this->mobilePhoneInputs = $psite->contactUs->psiteContactUsMobilePhoneItems->keys()->toArray();
            $this->mobilePhoneIteration = $psite->contactUs->psiteContactUsMobilePhoneItems->count();
        }
    }

    private function getEmailRepeaterFormInitialValues($psite) {
        if(is_null($psite->contactUs) || (!is_null($psite->contactUs) && count($psite->contactUs->psiteContactUsEmailItems) === 0)) {
            $this->email = [];
            $this->emailInputs = [0];
            $this->emailIteration = 1;
        } elseif(!is_null($psite->contactUs) && count($psite->contactUs->psiteContactUsEmailItems) > 0) {
            $this->email = $psite->contactUs->psiteContactUsEmailItems->pluck('email')->toArray();
            $this->emailInputs = $psite->contactUs->psiteContactUsEmailItems->keys()->toArray();
            $this->emailIteration = $psite->contactUs->psiteContactUsEmailItems->count();
        }
    }

    private function getSocialMediaRepeaterFormInitialValues($psite) {
        if(is_null($psite->contactUs) || (!is_null($psite->contactUs) && count($psite->contactUs->psiteContactUsSocialMediaItems) === 0)) {
            $this->socialMedia = [];
            $this->socialMediaTypeValue = [""];
            $this->socialMediaInputs = [0];
            $this->socialMediaIteration = 1;
        } elseif(!is_null($psite->contactUs) && count($psite->contactUs->psiteContactUsSocialMediaItems) > 0) {
            $this->socialMedia = $psite->contactUs->psiteContactUsSocialMediaItems->pluck('url')->toArray();
            $this->socialMediaTypeValue = $psite->contactUs->psiteContactUsSocialMediaItems->pluck('social')->toArray();
            $this->socialMediaInputs = $psite->contactUs->psiteContactUsSocialMediaItems->keys()->toArray();
            $this->socialMediaIteration = $psite->contactUs->psiteContactUsSocialMediaItems->count();
        }
    }

    private function getPostalCodeRepeaterFormInitialValues($psite) {
        if(is_null($psite->contactUs) || (!is_null($psite->contactUs) && count($psite->contactUs->psiteContactUsPostalCodeItems) === 0)) {
            $this->postalCode = [];
            $this->postalCodeInputs = [0];
            $this->postalCodeIteration = 1;
        } elseif(!is_null($psite->contactUs) && count($psite->contactUs->psiteContactUsPostalCodeItems) > 0) {
            $this->postalCode = $psite->contactUs->psiteContactUsPostalCodeItems->pluck('postal_code')->toArray();
            $this->postalCodeInputs = $psite->contactUs->psiteContactUsPostalCodeItems->keys()->toArray();
            $this->postalCodeIteration = $psite->contactUs->psiteContactUsPostalCodeItems->count();
        }
    }

    private function getWorkingHourRepeaterFormInitialValues($psite) {
        if(is_null($psite->contactUs) || (!is_null($psite->contactUs) && count($psite->contactUs->psiteContactUsWorkingHourItems) === 0)) {
            $this->workingHour = [];
            $this->workingHourInputs = [0];
            $this->workingHourIteration = 1;
        } elseif(!is_null($psite->contactUs) && count($psite->contactUs->psiteContactUsWorkingHourItems) > 0) {
            $this->workingHour = $psite->contactUs->psiteContactUsWorkingHourItems->pluck('hour_item')->toArray();
            $this->workingHourInputs = $psite->contactUs->psiteContactUsWorkingHourItems->keys()->toArray();
            $this->workingHourIteration = $psite->contactUs->psiteContactUsWorkingHourItems->count();
        }
    }

    // address repeater form
    public function addAddress($addressIteration) {
        if(count($this->addressInputs) < 4) {
            $this->address[$addressIteration] = null;
            $this->addressIteration = $addressIteration + 1;
            array_push($this->addressInputs, $addressIteration);
        } 
    }
    public function removeAddress($addressKey) {
        if(count($this->addressInputs) > 1) {
            unset($this->addressInputs[$addressKey]);    
            unset($this->address[$addressKey]);    
        }
    }

    // office phone repeater form
    public function addOfficePhone($officePhoneIteration) {
        if(count($this->officePhoneInputs) < 4) {
            $this->officePhone[$officePhoneIteration] = null;
            $this->officePhoneIteration = $officePhoneIteration + 1;
            array_push($this->officePhoneInputs, $officePhoneIteration);
        } 
    }
    public function removeOfficePhone($officePhoneKey) {
        if(count($this->officePhoneInputs) > 1) {
            unset($this->officePhoneInputs[$officePhoneKey]);    
            unset($this->officePhone[$officePhoneKey]); 
        }
    }

    // mobile phone repeater form
    public function addMobilePhone($mobilePhoneIteration) {
        if(count($this->mobilePhoneInputs) < 4) {
            $this->mobilePhone[$mobilePhoneIteration] = null;
            $this->mobilePhoneIteration = $mobilePhoneIteration + 1;
            array_push($this->mobilePhoneInputs, $mobilePhoneIteration);
        }
    }
    public function removeMobilePhone($mobilePhoneKey) {
        if(count($this->mobilePhoneInputs) > 1) {
            unset($this->mobilePhoneInputs[$mobilePhoneKey]);    
            unset($this->mobilePhone[$mobilePhoneKey]); 
        }
    }

    // email repeater form
    public function addEmail($emailIteration) {
        if(count($this->emailInputs) < 4) {
            $this->email[$emailIteration] = null;
            $this->emailIteration = $emailIteration + 1;
            array_push($this->emailInputs, $emailIteration);
        }
    }
    public function removeEmail($emailKey) {
        if(count($this->emailInputs) > 1) {
            unset($this->emailInputs[$emailKey]);   
            unset($this->email[$emailKey]);  
        }
    }

    // social media repeater form
    public function addSocialMedia($socialMediaIteration) {
        if(count($this->socialMediaInputs) < 4) {
            $this->socialMedia[$socialMediaIteration] = null;
            $this->socialMediaTypeValue[$socialMediaIteration] = "";
            $this->socialMediaIteration = $socialMediaIteration + 1;
            array_push($this->socialMediaInputs, $socialMediaIteration);
        }
    }
    public function removeSocialMedia($socialMediaKey) {
        if(count($this->socialMediaInputs) > 1) {
            unset($this->socialMediaInputs[$socialMediaKey]);  
            unset($this->socialMedia[$socialMediaKey]);    
            unset($this->socialMediaTypeValue[$socialMediaKey]);    
        }
    }

    // postal code repeater form
    public function addPostalCode($postalCodeIteration) {
        if(count($this->postalCodeInputs) < 4) {
            $this->postalCode[$postalCodeIteration] = null;
            $this->postalCodeIteration = $postalCodeIteration + 1;
            array_push($this->postalCodeInputs, $postalCodeIteration);
        }
    }
    public function removePostalCode($postalCodeKey) {
        if(count($this->postalCodeInputs) > 1) {
            unset($this->postalCodeInputs[$postalCodeKey]);    
            unset($this->postalCode[$postalCodeKey]);  
        }
    }

    // opening hours repeater form
    public function addWorkingHours($workingHourIteration) {
        if(count($this->workingHourInputs) < 7) {
            $this->workingHour[$workingHourIteration] = null;
            $this->workingHourIteration = $workingHourIteration + 1;
            array_push($this->workingHourInputs, $workingHourIteration);
        }
    }
    public function removeWorkingHours($workingHourKey) {
        if(count($this->workingHourInputs) > 1) {
            unset($this->workingHourInputs[$workingHourKey]);    
            unset($this->workingHour[$workingHourKey]);  
        }
    }

    // save addresses into DB
    private function saveAddressesHandler($psite, $contactUs) {

        if(count($this->address) == 0) {
            return;
        }
        
        $contactUs->psiteContactUsAddressItems()->delete();

        foreach ($this->address as $key => $value) {

            if($value == "") {
                continue;
            }

            $contactUs->psiteContactUsAddressItems()->create([
                'address' => Purify::clean(trim($value)),
            ]);
        }
    }

    // save office phone numbers into DB
    private function saveOfficePhoneNumbersHandler($psite, $contactUs) {

        if(count($this->officePhone) == 0) {
            return;
        }
        
        $contactUs->psiteContactUsOfficePhoneItems()->delete();

        foreach ($this->officePhone as $key => $value) {

            if($value == "") {
                continue;
            }

            $contactUs->psiteContactUsOfficePhoneItems()->create([
                'phone' => Purify::clean(trim($value)),
            ]);
        }
    }

    // save mobile phone numbers into DB
    private function saveMobilePhoneNumbersHandler($psite, $contactUs) {

        if(count($this->mobilePhone) == 0) {
            return;
        }
        
        $contactUs->psiteContactUsMobilePhoneItems()->delete();

        foreach ($this->mobilePhone as $key => $value) {

            if($value == "") {
                continue;
            }

            $contactUs->psiteContactUsMobilePhoneItems()->create([
                'phone' => Purify::clean(trim($value)),
            ]);
        }
    }

    // save email addresses into DB
    private function saveEmailsHandler($psite, $contactUs) {

        if(count($this->email) == 0) {
            return;
        }
        
        $contactUs->psiteContactUsEmailItems()->delete();

        foreach ($this->email as $key => $value) {

            if($value == "") {
                continue;
            }

            $contactUs->psiteContactUsEmailItems()->create([
                'email' => Purify::clean(trim($value)),
            ]);
        }
    }

    // save social media into DB
    private function saveSocialMediaHandler($psite, $contactUs) {

        if(count($this->socialMediaTypeValue) == 0) {
            return;
        }
        
        $contactUs->psiteContactUsSocialMediaItems()->delete();

        foreach ($this->socialMediaTypeValue as $key => $value) {

            if($value == "") {
                continue;
            }

            $contactUs->psiteContactUsSocialMediaItems()->create([
                'social' => Purify::clean(trim($this->socialMediaTypeValue[$key])),
                'url' => Purify::clean(trim($this->socialMedia[$key])),
            ]);
        }
    }
    
    // save postal code numbers into DB
    private function savePostalCodesHandler($psite, $contactUs) {

        if(count($this->postalCode) == 0) {
            return;
        }
        
        $contactUs->psiteContactUsPostalCodeItems()->delete();

        foreach ($this->postalCode as $key => $value) {

            if($value == "") {
                continue;
            }

            $contactUs->psiteContactUsPostalCodeItems()->create([
                'postal_code' => Purify::clean(trim($value)),
            ]);
        }
    }

    // save working hours into DB
    private function saveWorkingHoursHandler($psitem, $contactUs) {

        if(count($this->workingHour) == 0) {
            return;
        }
        
        $contactUs->psiteContactUsWorkingHourItems()->delete();

        foreach ($this->workingHour as $key => $value) {

            if($value == "") {
                continue;
            }

            $contactUs->psiteContactUsWorkingHourItems()->create([
                'hour_item' => Purify::clean(trim($value)),
            ]);
        }
    }

    public function back() {
        $this->dispatch('privateSiteSectionNumber', 
            privateSiteSectionNumber: 11, 
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
            $contactUs = $psite->contactUs()->updateOrCreate([
                'psite_id' => $psite->id
            ],[
                'is_hidden' => $this->isHidden == true ? 1 : 0,
            ]);
        } else {
            $contactUs = $psite->contactUs()->updateOrCreate([
                'psite_id' => $psite->id
            ],[
                'is_hidden' => $this->isHidden == true ? 1 : 0,
                'email' => Purify::clean(trim(strtolower($this->contactUsFormEmail))),
                'lt' => Purify::clean(trim($this->latitude)),
                'ln' => Purify::clean(trim($this->longitude)),
            ]);
            
            // save addresses into DB
            $this->saveAddressesHandler($psite, $contactUs);

            //  save office phone numbers into DB
            $this->saveOfficePhoneNumbersHandler($psite, $contactUs);

            // save mobile phone numbers into DB
            $this->saveMobilePhoneNumbersHandler($psite, $contactUs);

            // save email addresses into DB
            $this->saveEmailsHandler($psite, $contactUs);

            // save social media into DB
            $this->saveSocialMediaHandler($psite, $contactUs);

            // save postal code numbers into DB
            $this->savePostalCodesHandler($psite, $contactUs);

            // save working hours into DB
            $this->saveWorkingHoursHandler($psite, $contactUs);
        }

        $this->dispatch('privateSiteSectionNumber', 
            privateSiteSectionNumber: 13, 
        );
    }

   
    public function render()
    {
        return view('frontend.pages.private-page.private-page-create.components.website-sections.contact-us.index');
    } 
}
