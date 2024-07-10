<?php

namespace App\Livewire\Frontend\Pages\Activity\ActivityEdit\AdsRegistration\Investment\Investor;

use File;
use Livewire\Component;
use Livewire\WithFileUploads;
use Intervention\Image\Facades\Image;
use Stevebauman\Purify\Facades\Purify;
use Illuminate\Support\Facades\Storage;
use App\Rules\Activity\ReturnTimeValidationRule;
use App\Rules\Activity\AgreeToTermsValidationRule;
use App\Rules\Activity\SelectedCityValidationRule;
use App\Rules\Activity\SelectedProvinceValidationRule;
use App\Models\Frontend\ReferenceData\ProvinceAndCity\Province;

class Index extends Component
{
    use WithFileUploads;
    
    public $activity;
    public $investment;

    // title and description
    public $adsTitle;
    public $adsDescription;

    // investment items
    public $investmentValue;
    public $returnTime;
    public $returnTimeValidation;
    public $investmentBail;

    // images
    public $adsImage;

    // province and city sectino
    public $cities;
    public $selectedCityId;
    public $selectedCityIdValidation;
    public $provinces;
    public $selectedProvinceId;
    public $selectedProvinceIdValidation;

    public $agreeToTerms;

    protected function rules() {
        return [
            'adsTitle' => 'required',
            'returnTimeValidation' => new ReturnTimeValidationRule("investment", $this->returnTime),
            'selectedProvinceIdValidation' => new SelectedProvinceValidationRule($this->selectedProvinceId, "investment", "investor"),
            'selectedCityIdValidation' => new SelectedCityValidationRule($this->selectedCityId, "investment", "investor"),
            'agreeToTerms' => new AgreeToTermsValidationRule($this->agreeToTerms, "investment"),
        ];
    }

    protected $messages = [
        'adsTitle.required' => 'لطفا عنوان آگهی را وارد نمایید!',
    ];

    public function mount() {
        $this->investment = $this->activity->subactivity;

        $this->getInitialValues();
    }

    private function getInitialValues() {
        // title and description
        $this->adsTitle = $this->investment->item_title;
        $this->adsDescription = $this->investment->item_description;

        // images
        $this->adsImage = $this->activity->adsImages->pluck('image')->first();

        // province and cities
        $this->provinces = Province::all();
        $this->selectedProvinceId = $this->activity->subactivity->city->province->id;
        $this->cities = $this->activity->subactivity->city->province->city;
        $this->selectedCityId = $this->activity->subactivity->city->id;

        // investment items
        $this->investmentValue = $this->investment->investment_value;
        $this->returnTime = $this->investment->return_time;
        $this->investmentBail = $this->investment->investment_bail;
    }

    public function loadCitiesByProvinceChange() {
        $selectedProvinceId = $this->selectedProvinceId;
        $this->cities = Province::find($selectedProvinceId)->city;
        $this->selectedCityId = $this->cities->first()->id;
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
        // آگهی سرمایه گذاری
        // سرمایه گذار
        $ads = $this->activity->investment()->update([
            'item_title' => Purify::clean($this->adsTitle),
            'item_description' => Purify::clean($this->adsDescription),
            'investment_value' => Purify::clean($this->investmentValue),
            'return_time' => Purify::clean($this->returnTime),
            'investment_bail' => Purify::clean($this->investmentBail),
            'city_id' => Purify::clean($this->selectedCityId),
        ]);
        
        $this->handlePublicAdsSingleFileUpload($this->activity);
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
        return view('frontend.pages.activity.activity-edit.ads_registration.investment.investor');
    }
    
}
