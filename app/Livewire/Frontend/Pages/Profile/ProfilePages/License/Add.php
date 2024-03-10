<?php

namespace App\Livewire\Frontend\Pages\Profile\ProfilePages\License;

use Livewire\Component;
use Livewire\WithFileUploads;
use Intervention\Image\Facades\Image;
use Stevebauman\Purify\Facades\Purify;
use Illuminate\Support\Facades\Storage;
use App\Rules\Profile\License\OtherDescriptionFieldValidationRule;

class Add extends Component
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
            'otherDescription' => new OtherDescriptionFieldValidationRule($this->licenseTypeValue),
            'licenseImage' => 'required|mimes:png,jpg|max:4096',
        ];
	}
    
    protected $messages = [
        'licenseTypeValue.required' => 'لطفا نوع مجوز را انتخاب نمایید.',
        'licenseImage.required' => 'لطفا تصویر مجوز را بارگذاری نمایید.',
        'licenseImage.mimes' => 'فرمت تصویر مجاز PNG و JPG است.',
        'licenseImage.max' => 'حداکثر حجم تصویر 4 مگابایت می باشد.',
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

    public function cancel() {
        $this->dispatch('licenseSectionNumber', licenseSectionNumber: 1 );
    }
    
    public function save() {

        $this->validate();

        // Get uploaded image address
        $profileImageAddress = $this->handleFileUpload();

        $userProfile = auth()->user()->userProfile()->firstOrCreate(['user_id' => auth()->user()->id]);
        $profileLicense = $userProfile->userProfileLicense()->firstOrCreate(['user_profile_id' => $userProfile->id]);

        $userProfileLicense = $profileLicense->licenseItems()->create([
            'license_type' => Purify::clean($this->licenseTypeValue),
            'description' => Purify::clean($this->otherDescription),
            'license_image' => $profileImageAddress,
        ]);
        
        $this->dispatch('licenseSectionNumber', licenseSectionNumber: 1 );

        $this->dispatch('showToaster', 
            title: '', 
            message: 'مجوز با موفقیت ذخیره شد.', 
            type: 'bg-success'
        );
    }

    public function render()
    {
        return view('frontend.pages.profile.profile-pages.license.component.add');
    }
}
