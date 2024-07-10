<?php

namespace App\Livewire\Frontend\Pages\Activity\ActivityEdit\AdsRegistration\Selling;

use File;
use Livewire\Component;
use Livewire\WithFileUploads;
use Intervention\Image\Facades\Image;
use Stevebauman\Purify\Facades\Purify;
use Illuminate\Support\Facades\Storage;
use App\Rules\Activity\AdsImagesValidationRule;
use App\Rules\Activity\AgreeToTermsValidationRule;
use App\Rules\Activity\SelectedCityValidationRule;
use App\Rules\Activity\SelectedProvinceValidationRule;
use App\Rules\Activity\SellingActGrpsIdValidationRule;
use App\Models\Frontend\ReferenceData\AdsStatus\AdsStat;
use App\Rules\Activity\SelectedPaymentMethodValidationRule;
use App\Models\Frontend\ReferenceData\PaymentMethod\PaymntMtd;
use App\Models\Frontend\ReferenceData\ProvinceAndCity\Province;
use App\Models\Frontend\ReferenceData\Construction\Skill\ActCat;
use App\Rules\Activity\SellingAdsManufacturerTypeValidationRule;

class Index extends Component
{
    use WithFileUploads;

    public $activity;
    public $selling;

    public $actGrpsShopArray;
    public $sellingActGrpsId;
    public $sellingActGrpsIdValidation;

    public $adsTitle;
    public $adsDescription;
    public $sellingAdsManufacturereType;
    public $sellingAdsManufacturerTypeValidation;
    public $productBrand;
    public $adsStatus;
    public $adsStatusArray;
    public $adsImage;
    public $adsImages;
    public $price;
    public $priceByAgreement;
    public $paymentMethod;
    public $paymentMethodArray;
    public $agreeToTerms;
    public $address;
    public $latitude;
    public $longitude;

    public $cities;
    public $selectedCityId;
    public $selectedCityIdValidation;
    public $provinces;
    public $selectedProvinceId;
    public $selectedProvinceIdValidation;

    protected function rules() {
        return [
            'sellingActGrpsIdValidation' => new SellingActGrpsIdValidationRule($this->sellingActGrpsId, "selling"),
            'adsTitle' => 'required',
            'sellingAdsManufacturerTypeValidation' => new SellingAdsManufacturerTypeValidationRule($this->sellingAdsManufacturereType, "selling"),
            'selectedProvinceIdValidation' => new SelectedProvinceValidationRule($this->selectedProvinceId, "selling", ""),
            'selectedCityIdValidation' => new SelectedCityValidationRule($this->selectedCityId, "selling", ""),
            'paymentMethod' => new SelectedPaymentMethodValidationRule($this->paymentMethod, "selling"),
            'agreeToTerms' => new AgreeToTermsValidationRule($this->agreeToTerms, "selling"),
        ];
    }

    protected $messages = [
        'adsTitle.required' => 'لطفا عنوان آگهی را وارد نمایید!',
    ];

    public function mount() {
        $this->selling = $this->activity->subactivity;
       
        $this->getInitialValues();
    }

    private function getInitialValues() {
        // category groups
        $this->actGrpsShopArray = ActCat::find(19)->activityGroup->chunk($this->calculateChunkNumber(19))->toArray();
        $this->sellingActGrpsId = $this->activity->activityGroups->first()->id;

        // title and description
        $this->adsTitle = $this->selling->item_title;
        $this->adsDescription = $this->selling->item_description;

        // manufacturer and brand
        $this->sellingAdsManufacturereType = $this->selling->manufacturer;
        $this->productBrand = $this->selling->product_brand;
       
        // images
        $this->adsImage = "";
        $this->adsImages = $this->activity->adsImages->pluck('image')->toArray();

        // province and cities
        $this->provinces = Province::all();
        $this->selectedProvinceId = $this->activity->subactivity->city->province->id;
        $this->cities = $this->activity->subactivity->city->province->city;
        $this->selectedCityId = $this->activity->subactivity->city->id;

        // address field
        $this->address = $this->activity->subactivity->address;
        $this->latitude = $this->activity->subactivity->lt;
        $this->longitude = $this->activity->subactivity->ln;

        // price secrion
        $this->price = $this->activity->subactivity->price;
        $this->priceByAgreement = $this->activity->subactivity->price_by_agreement ? true : false;
     
        // set checkbox items related to ads status
        $this->adsStatus = [];
        $this->adsStatusArray = AdsStat::all();
        foreach ($this->adsStatusArray->pluck('id')->toArray() as $checkedItemValue) {
            if(in_array($checkedItemValue, $this->activity->adsStats->pluck('id')->toArray())) {
                $this->adsStatus[$checkedItemValue] = true;
            }
        }
       
        // set checkbox items related to payment method
        $this->paymentMethod = [];
        $this->paymentMethodArray = PaymntMtd::all();
        foreach ($this->paymentMethodArray->pluck('id')->toArray() as $checkedItemValue) {
            if(in_array($checkedItemValue, $this->activity->paymentMethod->pluck('id')->toArray())) {
                $this->paymentMethod[$checkedItemValue] = true;
            }
        }
    }

    public function loadCitiesByProvinceChange() {
        $selectedProvinceId = $this->selectedProvinceId;
        $this->cities = Province::find($selectedProvinceId)->city;
        $this->selectedCityId = $this->cities->first()->id;
    }

    private function calculateChunkNumber($id) {
        $totalCount = ActCat::find($id)->activityGroup->count();
        return (int) ceil($totalCount / 2);
    }

    public function changePriceByAgreement() {
        //        
    }

    // save selling activity group into DB
    private function saveSellingActivityGroupHandler($activity) {
        // get items which are true
        $grpArray = [0 => $this->sellingActGrpsId];
        
        $activity->activityGroups()->sync($grpArray, true);
    }

    // save selling ads manufacturer type into DB
    private function saveSellingAdsStatusHandler($activity) {

        // get items which are true
        $grpArray = [];
        foreach ($this->adsStatus as $key => $value) {
            if($value) {
                $grpArray[] = Purify::clean($key);
            }
        }
        
        $activity->adsStats()->sync($grpArray, true);
    }

    // public ads image upload handler
    private function handlePublicAdsFileUpload($activity) {
        
        if(count($this->adsImages) == 0 || is_string($this->adsImages[0])) {
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

        foreach ($this->adsImages as $key => $value) {
            
            if($key > 4) {
                break;
            }

            $folderId = $activity->id;
            $dir = 'storage/upload/ads-images/' . $folderId;

            // for large images
            $unique_image_name = hexdec(uniqid());
            $filename = $unique_image_name . '.' . 'jpg';
            $img = Image::make($value)->fit(746,421)->encode('jpg');
            Storage::disk('public')->put('upload/ads-images/' . $folderId . '/' . $filename, $img);
            $image_path = $dir . '/' . $filename;

            // for thumbnails
            $unique_image_name_sm = hexdec(uniqid());
            $filename_sm = $unique_image_name_sm . '.' . 'jpg';
            $img_sm = Image::make($value)->fit(428,195)->encode('jpg');
            Storage::disk('public')->put('upload/ads-images/' . $folderId . '/' . $filename_sm, $img_sm);
            $image_path_sm = $dir . '/' . $filename_sm;

            $activity->adsImages()->create([
                'image' => $image_path,
                'image_sm' => $image_path_sm,
            ]);
        }
    }

    // save payment method into DB
    private function savePaymentMethodHandler($activity) {
        // get items which are true
        $grpArray = [];
        foreach ($this->paymentMethod as $key => $value) {
            if($value) {
                $grpArray[] = Purify::clean($key);
            }
        }
        
        $activity->paymentMethod()->sync($grpArray, true);
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

        $this->activity->selling()->update([
            'item_title' => Purify::clean($this->adsTitle),
            'item_description' => Purify::clean($this->adsDescription),
            'manufacturer' => Purify::clean($this->sellingAdsManufacturereType),
            'product_brand' => Purify::clean($this->productBrand),
            'city_id' => Purify::clean($this->selectedCityId),
            'address' => Purify::clean($this->address),
            'lt' => Purify::clean($this->latitude),
            'ln' => Purify::clean($this->longitude),
            'price' => Purify::clean($this->price),
            'price_by_agreement' => Purify::clean($this->priceByAgreement) == true ? 1 : 0,
        ]);

        // save selling activity group into DB
        $this->saveSellingActivityGroupHandler($this->activity);

        // save selling ads status type into DB
        $this->saveSellingAdsStatusHandler($this->activity);

        // upload ads image
        $this->handlePublicAdsFileUpload($this->activity);

        // save payment method into DB
        $this->savePaymentMethodHandler($this->activity);
    } 

    public function save() {    
      
        $this->validate();

        $this->isOwner();

        // ثبت آگهی
        // آکهی فروش کالا
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
        return view('frontend.pages.activity.activity-edit.ads_registration.selling.selling');
    }
}
