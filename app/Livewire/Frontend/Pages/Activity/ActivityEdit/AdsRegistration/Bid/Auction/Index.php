<?php

namespace App\Livewire\Frontend\Pages\Activity\ActivityEdit\AdsRegistration\Bid\Auction;

use File;
use Livewire\Component;
use Livewire\WithFileUploads;
use Intervention\Image\Facades\Image;
use Stevebauman\Purify\Facades\Purify;
use Illuminate\Support\Facades\Storage;
use App\Rules\Activity\AuctioneerValidationRule;
use App\Rules\Activity\ReturnTimeValidationRule;
use App\Rules\Activity\AgreeToTermsValidationRule;
use App\Rules\Activity\SelectedCityValidationRule;
use App\Rules\Activity\SelectedProvinceValidationRule;
use App\Rules\Activity\SelectedActGrpsIdValidationRule;
use App\Rules\Activity\SelectedInvestmentCityValidationRule;
use App\Models\Frontend\ReferenceData\ProvinceAndCity\Province;
use App\Models\Frontend\ReferenceData\Construction\Skill\ActCat;
use App\Rules\Activity\SelectedInvestmentProvinceValidationRule;

class Index extends Component
{
    use WithFileUploads;
    
    public $activity;
    public $bid;

    // auction groups
    public $actGrpsId;
    public $actGrpsAuctionAdsArray;

    // title and description
    public $adsTitle;
    public $adsDescription;

    // province and city sectino
    public $cities;
    public $selectedCityId;
    public $selectedCityIdValidation;
    public $provinces;
    public $selectedProvinceId;
    public $selectedProvinceIdValidation;

    // images
    public $adsImage;

    // auctioneer type dropdown
    public $auctioneer;
    public $auctioneerValidation;

    // address field
    public $address;

    // auction number
    public $auctionNumber;

    // licenses
    public $licenses;
    public $licenseImage;
    public $licenseTypeValue;
    public $otherDescription;
    public $otherDescriptionStatus;
    public $licenseInputs;
    public $licenseIteration;

    // auction dates
    public $auctionExpDateStart;
    public $auctionExpDateEnd;

    public $agreeToTerms;

    protected function rules() {
        return [
            'actGrpsId' => new SelectedActGrpsIdValidationRule("bid"),
            'adsTitle' => 'required',
            'adsDescription' => 'required',
            'selectedProvinceIdValidation' => new SelectedProvinceValidationRule($this->selectedProvinceId, "bid", "auction"),
            'selectedCityIdValidation' => new SelectedCityValidationRule($this->selectedCityId, "bid", "auction"),
            'licenseTypeValue.*' => 'required_if:auctioneer,==,private_company|required_if:auctioneer,==,public_company',
            'licenseImage.*' => 'required_if:auctioneer,==,private_company|required_if:auctioneer,==,public_company',
            'auctioneerValidation' => new AuctioneerValidationRule($this->auctioneer, "bid", "auction", ""),
            'auctionNumber' => 'required_if:auctioneer,==,private_company|required_if:auctioneer,==,public_company',
            'agreeToTerms' => new AgreeToTermsValidationRule($this->agreeToTerms, "bid"),
        ];
    }

    protected $messages = [
        'adsTitle.required' => 'لطفا عنوان آگهی را وارد نمایید!',
        'adsDescription.required' => 'لطفا شرح آگهی را وارد نمایید!',
        'licenseTypeValue.*.required_if' => 'لطفا نوع مجوز را انتخاب نمایید.',
        'licenseImage.*.required_if' => 'لطفا تصویر مجوز را بارگذاری نمایید.',
        'auctionNumber.required_if' => 'لطفا شماره مزایده را وارد نمایید.',
        'inquiryNumber.required_if' => 'لطفا شماره استعلام را وارد نمایید.',
    ];

    public function mount() {
        $this->bid = $this->activity->subactivity;
       
        $this->getInitialValues();
    }

    private function getInitialValues() {
        $this->actGrpsId = [];

        // auction groups
        $this->actGrpsAuctionAdsArray = ActCat::find(20)->activityGroup->chunk($this->calculateChunkNumber(20))->toArray();
        foreach (ActCat::find(20)->activityGroup->pluck('id')->toArray() as $checkedItemValue) {
            if(in_array($checkedItemValue, $this->activity->activityGroups->pluck('id')->toArray())) {
                $this->actGrpsId[$checkedItemValue] = true;
            }
        }

        // title and description
        $this->adsTitle = $this->bid->item_title;
        $this->adsDescription = $this->bid->item_description;

        // images
        $this->adsImage = $this->activity->adsImages->pluck('image')->first();

        // auctioneer type dropdown
        $this->auctioneer = $this->bid->auctioneer;

        // address field
        $this->address = $this->bid->address;

        // auction number
        $this->auctionNumber = $this->bid->auction_number;

        // auction dates
        $this->auctionExpDateStart = $this->bid->auction_exp_date_start;
        $this->auctionExpDateEnd = $this->bid->auction_exp_date_end;

        // province and cities
        $this->provinces = Province::all();
        $this->selectedProvinceId = $this->activity->subactivity->city->province->id;
        $this->cities = $this->activity->subactivity->city->province->city;
        $this->selectedCityId = $this->activity->subactivity->city->id;

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
    }

    private function calculateChunkNumber($id) {
        $totalCount = ActCat::find($id)->activityGroup->count();
        return (int) ceil($totalCount / 2);
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
    public function licenseType($value, $licenseValue) {
        if($value == "other") {
            $this->otherDescriptionStatus[$licenseValue] = true;
        } else {
            $this->otherDescriptionStatus[$licenseValue] = false;
        }
    }

    public function loadCitiesByProvinceChange() {
        $selectedProvinceId = $this->selectedProvinceId;
        $this->cities = Province::find($selectedProvinceId)->city;
        $this->selectedCityId = $this->cities->first()->id;
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

    // public ads single image upload handler
    private function handlePublicAdsSingleFileUpload($activity) {
        
        if($this->adsImage == "" || is_string($this->adsImage)) {
            return;
        }
       
        $folderId = $activity->id;
        $dir = 'storage/upload/ads-images/' . $folderId;

        // remove image items from DB and server
        if($activity->adsImages->count()) {
            foreach ($activity->adsImages as $oldImage) {
                unlink($oldImage->image);
                unlink($oldImage->image_sm);
            }
            $activity->adsImages()->delete();
        }

        // for large images
        $unique_image_name = hexdec(uniqid());
        $filename = $unique_image_name . '.' . 'jpg';
        $img = Image::make($this->adsImage)->fit(746,421)->encode('jpg');
        Storage::disk('public')->put('upload/ads-images/' . $folderId . '/' . $filename, $img);
        $image_path = $dir . '/' . $filename;

        // for thumbnails
        $unique_image_name_sm = hexdec(uniqid());
        $filename_sm = $unique_image_name_sm . '.' . 'jpg';
        $img_sm = Image::make($this->adsImage)->fit(428,195)->encode('jpg');
        Storage::disk('public')->put('upload/ads-images/' . $folderId . '/' . $filename_sm, $img_sm);
        $image_path_sm = $dir . '/' . $filename_sm;

        $activity->adsImages()->create([
            'image' => $image_path,
            'image_sm' => $image_path_sm,
        ]);
    }

    // check if it is related to the owner
    private function isOwner() {
        $userId = $this->activity->user->id;
        
        if(!auth()->check() || $userId !== auth()->user()->id) {
            abort(403);
        }
    }

    private function saveAdsRegistrationHandler() {

        $this->activity->update([
            'verify_status' => 'pending',
            'reject_description' => NULL
        ]);
        
        // ثبت آگهی
        // آگهی مزایده و مناقصه
        // آگهی مزایده
        $ads = $this->activity->bid()->update([
            'item_title' => Purify::clean($this->adsTitle),
            'item_description' => Purify::clean($this->adsDescription),
            'auctioneer' => Purify::clean($this->auctioneer),
            'city_id' => Purify::clean($this->selectedCityId),
            'auction_number' => Purify::clean($this->auctionNumber),
            'address' => Purify::clean($this->address),
            'auction_exp_date_start' => Purify::clean($this->auctionExpDateStart),
            'auction_exp_date_end' => Purify::clean($this->auctionExpDateEnd),
        ]);
        
        // upload ads image
        $this->handlePublicAdsSingleFileUpload($this->activity);

        // save activity group handler
        $this->saveActivityGroupHandler($this->activity);

        // save license image and title
        $this->saveLicenseHandler($this->activity);
    } 

    public function save() {    
      
        $this->validate();

        $this->isOwner();

        // ثبت آگهی
        $this->saveAdsRegistrationHandler();

        // Show Toaster
        $this->dispatch('showToaster', 
            title: '', 
            message: '
                اطلاعات با موفقیت ذخیره شد.
            ', 
            type: 'bg-success'
        );

        return redirect(route('user.dashboard.saved-ads.index'));
    }

    public function render()
    {
        return view('frontend.pages.activity.activity-edit.ads_registration.bid.auction');
    }
    
}
