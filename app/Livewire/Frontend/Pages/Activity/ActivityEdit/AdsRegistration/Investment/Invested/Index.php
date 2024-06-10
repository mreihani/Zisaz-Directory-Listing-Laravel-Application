<?php

namespace App\Livewire\Frontend\Pages\Activity\ActivityEdit\AdsRegistration\Investment\Invested;

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
use App\Rules\Activity\SelectedInvestmentCityValidationRule;
use App\Models\Frontend\ReferenceData\ProvinceAndCity\Province;
use App\Rules\Activity\SelectedInvestmentProvinceValidationRule;

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
    public $invenstmentYearlyProfitPercent;
    public $invenstmentGauranteedProfitPercent;
    public $investmentBail;
    public $investedAcademic;

    // images
    public $adsImage;

    // province and city section
    public $cities;
    public $selectedCityId;
    public $selectedCityIdValidation;
    public $provinces;
    public $selectedProvinceId;
    public $selectedProvinceIdValidation;

    // investment province and city
    public $investmentCities;
    public $selectedInvestmentCityId;
    public $selectedInvestmentCityIdValidation;
    public $selectedInvestmentProvinceId;
    public $selectedInvestmentProvinceIdValidation;
    
    public $agreeToTerms;

    protected function rules() {
        return [
            'adsTitle' => 'required',
            'adsDescription' => 'required',
            'returnTimeValidation' => new ReturnTimeValidationRule("investment", $this->returnTime),
            'selectedProvinceIdValidation' => new SelectedProvinceValidationRule($this->selectedProvinceId, "investment", "invested"),
            'selectedCityIdValidation' => new SelectedCityValidationRule($this->selectedCityId, "investment", "invested"),
            'selectedInvestmentProvinceIdValidation' => new SelectedInvestmentProvinceValidationRule($this->selectedInvestmentProvinceId, "investment", "invested"),
            'selectedInvestmentCityIdValidation' => new SelectedInvestmentCityValidationRule($this->selectedInvestmentCityId, "investment", "invested"),
            'agreeToTerms' => new AgreeToTermsValidationRule($this->agreeToTerms, "investment"),
        ];
    }

    protected $messages = [
        'adsTitle.required' => 'لطفا عنوان آگهی را وارد نمایید!',
        'adsDescription.required' => 'لطفا شرح آگهی را وارد نمایید!',
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

        // investment province and city
        $this->selectedInvestmentProvinceId = $this->activity->subactivity->investedCity->province->id;
        $this->investmentCities = $this->activity->subactivity->investedCity->province->city;
        $this->selectedInvestmentCityId = $this->activity->subactivity->investedCity->id;

        // investment items
        $this->investmentValue = $this->investment->investment_value;
        $this->returnTime = $this->investment->return_time;
        $this->investmentBail = $this->investment->investment_bail;
        $this->invenstmentYearlyProfitPercent = $this->investment->yearly_profit_percent;
        $this->invenstmentGauranteedProfitPercent = $this->investment->gauranteed_profit_percent;
        $this->investedAcademic = $this->investment->invested_academic;
    }

    public function loadCitiesByProvinceChange() {
        $selectedProvinceId = $this->selectedProvinceId;
        $this->cities = Province::find($selectedProvinceId)->city;
        $this->selectedCityId = $this->cities->first()->id;
    }
    public function loadInvestmentCitiesByProvinceChange() {
        $selectedInvestmentProvinceId = $this->selectedInvestmentProvinceId;
        $this->investmentCities = Province::find($selectedInvestmentProvinceId)->city;
        $this->selectedInvestmentCityId = $this->investmentCities->first()->id;
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
        // ثبت آگهی
        // آگهی سرمایه گذاری
        // سرمایه پذیر
        $ads = $this->activity->investment()->update([
            'item_title' => Purify::clean($this->adsTitle),
            'item_description' => Purify::clean($this->adsDescription),
            'investment_value' => Purify::clean($this->investmentValue),
            'return_time' => Purify::clean($this->returnTime),
            'yearly_profit_percent' => Purify::clean($this->invenstmentYearlyProfitPercent),
            'gauranteed_profit_percent' => Purify::clean($this->invenstmentGauranteedProfitPercent),
            'investment_bail' => Purify::clean($this->investmentBail),
            'invested_academic' => Purify::clean($this->investedAcademic),
            'city_id' => Purify::clean($this->selectedCityId),
            'invested_city_id' => Purify::clean($this->selectedInvestmentCityId),
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
        return view('frontend.pages.activity.activity-edit.ads_registration.investment.invested');
    }
    
}
