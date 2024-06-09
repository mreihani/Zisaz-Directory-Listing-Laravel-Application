<?php

namespace App\Livewire\Frontend\Pages\Activity\ActivityEdit\Resume\Goal2;

use File;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Intervention\Image\Facades\Image;
use Stevebauman\Purify\Facades\Purify;
use Illuminate\Support\Facades\Storage;
use App\Rules\Activity\SelectedCityValidationRule;
use App\Rules\Activity\SelectedProvinceValidationRule;
use App\Rules\Activity\SelectedActGrpsIdValidationRule;
use App\Models\Frontend\ReferenceData\ProvinceAndCity\Province;
use App\Models\Frontend\ReferenceData\Construction\Skill\ActCat;

class Index extends Component
{
    use WithFileUploads;
    
    public $activity;
    public $resume;

    // province and city
    public $selectedProvinceIdValidation;
    public $selectedCityIdValidation;
    public $provinces;
    public $selectedProvinceId;
    public $cities;
    public $selectedCityId;

    // addresses
    public $address;
    public $postalcode;
    public $landline_phone;
    public $shopName;
    public $shopLicense;

    // licenses
    public $licenses;
    public $licenseTypeValue;
    public $otherDescription;
    public $otherDescriptionStatus;
    public $licenseImage;
    public $licenseItem;
    public $licenseInputs;
    public $licenseIteration;

    // description
    public $resumeDescription;

    // groups
    public $actGrpsId;
    public $actGrpsShopArray;

    // images
    public $shopBannerImage;
    
    protected function rules() {
        return [
            'selectedProvinceIdValidation' => new SelectedProvinceValidationRule(2, $this->selectedProvinceId, "", ""),
            'selectedCityIdValidation' => new SelectedCityValidationRule(2, $this->selectedCityId, "", ""),
            'shopName' => 'required',
            'address' => 'required',
            'actGrpsId' => new SelectedActGrpsIdValidationRule(2, ""),
        ];
    }

    protected $messages = [
        'shopName.required' => 'لطفا نام فروشگاه را وارد نمایید!',
        'address.required' => 'لطفا آدرس فروشگاه را وارد نمایید!',
    ];

    public function mount() {
        $this->resume = $this->activity->subactivity;
        
        $this->getInitialValues();
    }

    private function getInitialValues() {

        // province and cities
        $this->provinces = Province::all();
        $this->selectedProvinceId = $this->activity->subactivity->city->province->id;
        $this->cities = $this->activity->subactivity->city->province->city;
        $this->selectedCityId = $this->activity->subactivity->city->id;

        // address and postalcode field
        $this->address = $this->resume->address;
        $this->postalcode = $this->resume->postalcode;
        $this->landline_phone = $this->resume->landline_phone;

        // title and description
        $this->shopName = $this->resume->item_title;
        $this->shopLicense = $this->resume->business_license == 1 ? 'yes' : 'no';
        $this->resumeDescription = $this->resume->resume_description;

        // images
        $this->shopBannerImage = $this->resume->banner_image;

        // licenses
        $this->licenseTypeValue = $this->activity->license->pluck('license_type')->toArray();
        $this->licenseImage = $this->activity->license->pluck('license_image')->toArray();
        $this->otherDescription = $this->activity->license->pluck('description')->toArray();
        $this->licenseInputs = $this->activity->license->keys()->toArray();
        $this->licenseIteration = $this->activity->license->count();
        // show license other form or not based on user inputs from DB
        $this->otherDescriptionStatus = [];
        foreach ($this->activity->license->pluck('license_type')->toArray() as $licenseTypeValue) {
            if($licenseTypeValue == "other") {
                $this->otherDescriptionStatus[] = true;
            } else {
                $this->otherDescriptionStatus[] = false;
            }
        }

        // resume groups
        $this->actGrpsShopArray = ActCat::find(19)->activityGroup->chunk($this->calculateChunkNumber(19))->toArray();
        foreach (ActCat::find(19)->activityGroup->pluck('id')->toArray() as $checkedItemValue) {
            if(in_array($checkedItemValue, $this->activity->activityGroups->pluck('id')->toArray())) {
                $this->actGrpsId[$checkedItemValue] = true;
            }
        }
        
    }

    public function loadCitiesByProvinceChange() {
        $selectedProvinceId = $this->selectedProvinceId;
        $this->cities = Province::find($selectedProvinceId)->city;
        $this->selectedCityId = $this->cities->first()->id;
    }
    public function licenseType($value, $licenseValue) {
        if($value == "other") {
            $this->otherDescriptionStatus[$licenseValue] = true;
        } else {
            $this->otherDescriptionStatus[$licenseValue] = false;
        }
    }

    // save activity groups into DB
    private function saveActivityGroupHandler($activity) {

        // get items which are true
        $grpArray = [];
        foreach ($this->actGrpsId as $key => $value) {
            if($value) {
                $grpArray[] = Purify::clean($key);
            }
        }
        
        $activity->activityGroups()->sync($grpArray, true);
    }
    // private license image upload handler
    private function handlePrivateFileUpload($licenseImage, $activity) {
        $folderId = $activity->id;
        $unique_image_name = hexdec(uniqid());
        $filename = $unique_image_name . '.' . 'jpg';

        $dir = "activity/$folderId/$filename";
       
        // upload all license images into private folder
        $img = Image::make($licenseImage)->encode('jpg')->resize(1200, null, function ($constraint) {
            $constraint->aspectRatio();
        });
        Storage::disk('private')->put($dir, $img);

        return $filename;
    }
    // save license items into DB
    private function saveLicenseHandler($activity) {

        foreach ($this->licenseImage as $key => $value) {
            
            // do not allow empty input files
            if(!isset($value)) {
                continue;
            }

            // check if new image is being sent, images from database have type of string
            if(!is_string($value)) {
              
                // Get uploaded image address
                $profileImageAddress = $this->handlePrivateFileUpload($this->licenseImage[$key], $activity);

                $activity->license()->create([
                    'license_type' => Purify::clean($this->licenseTypeValue[$key]),
                    'description' => isset($this->otherDescription[$key]) ? Purify::clean($this->otherDescription[$key]) : null,
                    'license_image' => $profileImageAddress,
                ]);
            
            } else {
                // this is for items already stored in the database and server
                $items = $this->activity->license;
               
                // delete items from DB and server
                foreach ($items as $itemKey => $item) {
                    if(!in_array($item->license_image, $this->licenseImage)) {
                        // here remove image from server disk
                        $imagePath = "private/activity/" . $this->activity->id ."/$item->license_image";
                        if(Storage::exists($imagePath)) {
                            unlink(Storage::path($imagePath));
                        }

                        // here delete item from database
                        $item->delete();
                    } else {
                        // here it updates the description field without any image change
                        // but first, itemKey needs to be checked of available since one element can be deleted by the user
                        if(isset($this->itemTitle[$itemKey])) {
                            $item->update([
                                'license_type' => Purify::clean($this->licenseTypeValue[$itemKey]),
                                'description' => isset($this->otherDescription[$itemKey]) ? Purify::clean($this->otherDescription[$itemKey]) : null,
                                'license_image' => $profileImageAddress,
                            ]);
                        }
                    }
                }
            }
        }
    }
    // public banner image upload handler
    private function handlePublicFileUpload($activity) {
      
        if(is_null($this->shopBannerImage)) {
            return null;
        }

        // remove old picture file from server
        if(!is_null($this->resume->banner_image)) {
            unlink($this->resume->banner_image);
        }

        $folderId = $activity->id;
        $dir = 'storage/upload/banner-images/' . $folderId;

        $unique_image_name = hexdec(uniqid());
        $filename = $unique_image_name . '.' . 'jpg';

        $img = Image::make($this->shopBannerImage)->fit(1300,200)->encode('jpg');

        Storage::disk('public')->put('upload/banner-images/' . $folderId . '/' . $filename, $img);

        return $dir . '/' . $filename;
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
    private function calculateChunkNumber($id) {
        $totalCount = ActCat::find($id)->activityGroup->count();
        return (int) ceil($totalCount / 2);
    }

    // check if it is related to the owner
    private function isOwner() {
        $userId = $this->activity->user->id;
        
        if(!auth()->check() || $userId !== auth()->user()->id) {
            abort(403);
        }
    }

    private function saveResumeHandler() {

        // معرفی رزومه
        // معرفی فروشگاه
        $resume = $this->activity->resume()->update([
            'city_id' => Purify::clean($this->selectedCityId),
            'address' => Purify::clean($this->address),
            'postalcode' => Purify::clean($this->postalcode),
            'landline_phone' => Purify::clean($this->landline_phone),
            'item_title' => Purify::clean($this->shopName),
            'business_license' => $this->shopLicense == 'yes' ? 1 : 0,
            'resume_description' => Purify::clean($this->resumeDescription),
            'banner_image' => $this->handlePublicFileUpload($this->activity),
        ]);

        // save license image and title
        $this->saveLicenseHandler($this->activity);

        // save activity group handler
        $this->saveActivityGroupHandler($this->activity);
    }

    public function save() {    
      
        $this->validate();

        $this->isOwner();

        // ثبت آگهی
        $this->saveResumeHandler();

        // Show Toaster
        $this->dispatch('showToaster', 
            title: '', 
            message: '
                اطلاعات با موفقیت ذخیره شد.
            ', 
            type: 'bg-success'
        );

        return redirect(route('user.dashboard.saved-resumes.index'));
    }

    public function render()
    {
        return view('frontend.pages.activity.activity-edit.resume.goal-2.index');
    }
}
