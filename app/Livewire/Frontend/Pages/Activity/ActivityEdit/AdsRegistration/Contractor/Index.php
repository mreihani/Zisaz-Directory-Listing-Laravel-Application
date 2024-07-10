<?php

namespace App\Livewire\Frontend\Pages\Activity\ActivityEdit\AdsRegistration\Contractor;

use File;
use Livewire\Component;
use Livewire\WithFileUploads;
use Intervention\Image\Facades\Image;
use Stevebauman\Purify\Facades\Purify;
use Illuminate\Support\Facades\Storage;
use App\Rules\Activity\AgreeToTermsValidationRule;
use App\Rules\Activity\ProvinceToWorkValidationRule;
use App\Rules\Activity\SelectedActGrpsIdValidationRule;
use App\Rules\Activity\SelectedPaymentMethodValidationRule;
use App\Models\Frontend\ReferenceData\PaymentMethod\PaymntMtd;
use App\Models\Frontend\ReferenceData\ProvinceAndCity\Province;
use App\Models\Frontend\ReferenceData\Construction\Skill\ActCat;

class Index extends Component
{
    use WithFileUploads;

    public $activity;
    public $contractor;

    public $actGrpsContractorAdsArray;
    public $actGrpsId;
    public $adsTitle;
    public $adsDescription;
    public $adsImages;
    public $provinces;
    public $provinceToWork;
    public $websiteAddress;
    public $whatsappAddress;
    public $telegramAddress;
    public $eitaaAddress;
    public $price;
    public $priceByAgreement;
    public $paymentMethodArray;
    public $paymentMethod;
    public $adsHaveDiscount;
    public $agreeToTerms;

    protected function rules() {
        return [
            'actGrpsId' => new SelectedActGrpsIdValidationRule("contractor"),
            'adsTitle' => 'required',
            'adsDescription' => 'required',
            'provinceToWork' => new ProvinceToWorkValidationRule("contractor", ""),
            'paymentMethod' => new SelectedPaymentMethodValidationRule($this->paymentMethod, "contractor"),
            'agreeToTerms' => new AgreeToTermsValidationRule($this->agreeToTerms, "inquiry"),
        ];
    }

    protected $messages = [
        'adsTitle.required' => 'لطفا عنوان آگهی را وارد نمایید!',
        'adsDescription.required' => 'لطفا شرح آگهی را وارد نمایید!',
    ];

    public function mount() {
        $this->contractor = $this->activity->subactivity;
        
        $this->getInitialValues();
    }

    private function getInitialValues() {

        $this->actGrpsId = [];

        // inquirer groups
        $this->actGrpsContractorAdsArray = ActCat::find(25)->activityGroup->chunk($this->calculateChunkNumber(25))->toArray();
        foreach (ActCat::find(25)->activityGroup->pluck('id')->toArray() as $checkedItemValue) {
            if(in_array($checkedItemValue, $this->activity->activityGroups->pluck('id')->toArray())) {
                $this->actGrpsId[$checkedItemValue] = true;
            }
        }

        // image
        $this->adsImages = $this->activity->adsImages->pluck('image')->toArray();

        // title and description
        $this->adsTitle = $this->contractor->item_title;
        $this->adsDescription = $this->contractor->item_description;

        // set checkbox items related to province to work
        $this->provinceToWork = [];
        $this->provinces = Province::all();
        foreach ($this->provinces->pluck('id')->toArray() as $checkedItemValue) {
            if(in_array($checkedItemValue, $this->activity->province->pluck('id')->toArray())) {
                $this->provinceToWork[$checkedItemValue] = true;
            }
        }

        $this->websiteAddress = $this->contractor->website_address;
        $this->whatsappAddress = $this->contractor->whatsapp_address;
        $this->telegramAddress = $this->contractor->telegram_address;
        $this->eitaaAddress = $this->contractor->eitaa_address;
        $this->price = $this->contractor->price;
        $this->priceByAgreement = $this->activity->subactivity->price_by_agreement ? true : false;
        $this->adsHaveDiscount = $this->activity->subactivity->ads_have_discount ? true : false;
        
        // set checkbox items related to payment method
        $this->paymentMethodArray = PaymntMtd::all();
        foreach ($this->paymentMethodArray->pluck('id')->toArray() as $checkedItemValue) {
            if(in_array($checkedItemValue, $this->activity->paymentMethod->pluck('id')->toArray())) {
                $this->paymentMethod[$checkedItemValue] = true;
            }
        }
    }

    private function calculateChunkNumber($id) {
        $totalCount = ActCat::find($id)->activityGroup->count();
        return (int) ceil($totalCount / 2);
    }

    public function changePriceByAgreement() {
        //        
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
    // save province into DB
    private function saveProvinceHandler($activity) {
        // get items which are true
        $grpArray = [];
        foreach ($this->provinceToWork as $key => $value) {
            if($value) {
                $grpArray[] = Purify::clean($key);
            }
        }

        $activity->province()->sync($grpArray, true);
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
        $ads = $this->activity->contractor()->update([
            'item_title' => Purify::clean($this->adsTitle),
            'item_description' => Purify::clean($this->adsDescription),
            'website_address' => Purify::clean($this->websiteAddress),
            'whatsapp_address' => Purify::clean($this->whatsappAddress),
            'telegram_address' => Purify::clean($this->telegramAddress),
            'eitaa_address' => Purify::clean($this->eitaaAddress),
            'price' => Purify::clean($this->price),
            'price_by_agreement' => Purify::clean($this->priceByAgreement) == true ? 1 : 0,
            'ads_have_discount' => Purify::clean($this->adsHaveDiscount) == "yes" ? 1 : 0,
        ]);
        
        // save activity group handler
        $this->saveActivityGroupHandler($this->activity);

        // upload ads image
        $this->handlePublicAdsFileUpload($this->activity);

        // save payment method into DB
        $this->savePaymentMethodHandler($this->activity);

        // save province into DB
        $this->saveProvinceHandler($this->activity);
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
        return view('frontend.pages.activity.activity-edit.ads_registration.contractor.contractor');
    }
}
