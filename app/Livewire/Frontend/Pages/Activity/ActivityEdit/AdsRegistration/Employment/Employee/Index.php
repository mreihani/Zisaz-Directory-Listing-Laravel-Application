<?php

namespace App\Livewire\Frontend\Pages\Activity\ActivityEdit\AdsRegistration\Employment\Employee;

use File;
use Livewire\Component;
use Livewire\WithFileUploads;
use Intervention\Image\Facades\Image;
use Stevebauman\Purify\Facades\Purify;
use Illuminate\Support\Facades\Storage;
use App\Rules\Activity\GenderValidationRule;
use App\Rules\Activity\WorkExpValidationRule;
use App\Rules\Activity\AcademicValidationRule;
use App\Rules\Activity\AgreeToTermsValidationRule;
use App\Rules\Activity\SelectedCityValidationRule;
use App\Rules\Activity\AcademicLevelValidationRule;
use App\Models\Frontend\ReferenceData\Gender\Gender;
use App\Rules\Activity\SelectedProvinceValidationRule;
use App\Rules\Activity\SelectedActGrpsIdValidationRule;
use App\Models\Frontend\ReferenceData\Academic\Academic;
use App\Models\Frontend\ReferenceData\ProvinceAndCity\Province;
use App\Models\Frontend\ReferenceData\Construction\Skill\ActCat;
use App\Models\Frontend\ReferenceData\ContractType\ContractType;

class Index extends Component
{
    use WithFileUploads;

    public $activity;
    public $employment;

    // groups
    public $actGrpsId;
    public $actGrpsTechnicalAdsArray;
    public $actGrpsEngAdsArray;
    public $actGrpsManagerAdsArray;

    // title and description
    public $adsTitle;
    public $adsDescription;

    // images
    public $adsImage;

    // contract type
    public $contractType;
    public $contractTypeArray;

    // academic info
    public $academic;
    public $academicArray;
    public $academicValidation;

    // age field
    public $age;

    // gender form section
    public $gender;
    public $genderArray;
    public $genderValidation;

    // work experience section
    public $workExp;
    public $workExpValidation;
    public $workExpDescription;

    // province and city sectino
    public $cities;
    public $selectedCityId;
    public $selectedCityIdValidation;
    public $provinces;
    public $selectedProvinceId;
    public $selectedProvinceIdValidation;

    // address field
    public $address;

    // province to work field
    public $provinceToWork;

    // agreement
    public $agreeToTerms;
    
    protected function rules() {
        return [
            'actGrpsId' => new SelectedActGrpsIdValidationRule("employment"),
            'adsTitle' => 'required',
            'academicValidation' => new AcademicValidationRule($this->academic, "employment", "employee"),
            'genderValidation' => new GenderValidationRule($this->gender, "employment", "employee"),
            'workExpValidation' => new WorkExpValidationRule($this->workExp, "employment"),
            'selectedProvinceIdValidation' => new SelectedProvinceValidationRule($this->selectedProvinceId, "employment", ""),
            'selectedCityIdValidation' => new SelectedCityValidationRule($this->selectedCityId, "employment", ""),
            'agreeToTerms' => new AgreeToTermsValidationRule($this->agreeToTerms, "employment"),
        ];
    }

    protected $messages = [
        'adsTitle.required' => 'لطفا عنوان آگهی را وارد نمایید!',
    ];

    public function mount() {
        $this->employment = $this->activity->subactivity;

        $this->getInitialValues();
    }

    private function getInitialValues() {
        $this->actGrpsId = [];

        // set checkbox items related to technical ads
        $this->actGrpsTechnicalAdsArray = ActCat::find(14)->activityGroup->chunk($this->calculateChunkNumber(14))->toArray();
        foreach (ActCat::find(14)->activityGroup->pluck('id')->toArray() as $checkedItemValue) {
            if(in_array($checkedItemValue, $this->activity->activityGroups->pluck('id')->toArray())) {
                $this->actGrpsId[$checkedItemValue] = true;
            }
        }

        // set checkbox items related to engineering ads
        $this->actGrpsEngAdsArray = ActCat::find(15)->activityGroup->chunk($this->calculateChunkNumber(15))->toArray();
        foreach (ActCat::find(15)->activityGroup->pluck('id')->toArray() as $checkedItemValue) {
            if(in_array($checkedItemValue, $this->activity->activityGroups->pluck('id')->toArray())) {
                $this->actGrpsId[$checkedItemValue] = true;
            }
        }

        // set checkbox items related to manager ads
        $this->actGrpsManagerAdsArray = ActCat::find(16)->activityGroup->chunk($this->calculateChunkNumber(16))->toArray();
        foreach (ActCat::find(16)->activityGroup->pluck('id')->toArray() as $checkedItemValue) {
            if(in_array($checkedItemValue, $this->activity->activityGroups->pluck('id')->toArray())) {
                $this->actGrpsId[$checkedItemValue] = true;
            }
        }

        // title and description
        $this->adsTitle = $this->employment->item_title;
        $this->adsDescription = $this->employment->item_description;

        // images
        $this->adsImage = $this->activity->adsImages->pluck('image')->first();;

        // contract types
        $this->contractType = [];
        $this->contractTypeArray = ContractType::all();
        foreach ($this->contractTypeArray->pluck('id')->toArray() as $checkedItemValue) {
            if(in_array($checkedItemValue, $this->activity->contractType->pluck('id')->toArray())) {
                $this->contractType[$checkedItemValue] = true;
            }
        }

        // academic info section
        $this->academic = $this->activity->academic->first()->id;
        $this->academicArray = Academic::all();
     
        // age
        $this->age = $this->employment->age;

        // gender form section
        $this->gender = $this->activity->gender->first()->id;
        $this->genderArray = Gender::all();

        // work experience section
        $this->workExp = $this->employment->work_exp;

        // work experience description
        $this->workExpDescription = $this->employment->work_exp_description;

        // province and cities
        $this->provinces = Province::all();
        $this->selectedProvinceId = $this->activity->subactivity->city->province->id;
        $this->cities = $this->activity->subactivity->city->province->city;
        $this->selectedCityId = $this->activity->subactivity->city->id;

        // address
        $this->address = $this->employment->address;

        // province to work section
        $this->provinceToWork = [];
        $this->actGrpsManagerAdsArray = ActCat::find(16)->activityGroup->chunk($this->calculateChunkNumber(16))->toArray();
        foreach ($this->provinces->pluck('id')->toArray() as $checkedItemValue) {
            if(in_array($checkedItemValue, $this->activity->province->pluck('id')->toArray())) {
                $this->provinceToWork[$checkedItemValue] = true;
            }
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
    // save employee gender into DB
    private function saveEmployeeAcademicHandler($activity) {
        // get items which are true
        $grpArray = [0 => $this->academic];
        
        $activity->academic()->sync($grpArray, true);
    }
    // save contract type into DB
    private function saveContractTypeHandler($activity) {
        // get items which are true
        $grpArray = [];
        foreach ($this->contractType as $key => $value) {
            if($value) {
                $grpArray[] = Purify::clean($key);
            }
        }

        $activity->contractType()->sync($grpArray, true);
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
    // save employee gender 
    private function saveEmployeeGenderHandler($activity) {
        // get items which are true
        $grpArray = [0 => $this->gender];
                
        $activity->gender()->sync($grpArray, true);
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

    private function saveAdsRegistrationHandler() {

        $this->activity->update([
            'verify_status' => 'pending',
            'reject_description' => NULL
        ]);

        // ثبت آگهی
        // آگهی استخدام
        // کارجو
        $ads = $this->activity->employment()->update([
            'item_title' => Purify::clean($this->adsTitle),
            'item_description' => Purify::clean($this->adsDescription),
            'age' => Purify::clean($this->age),
            'work_exp' => Purify::clean($this->workExp),
            'work_exp_description' => Purify::clean($this->workExpDescription),
            'city_id' => Purify::clean($this->selectedCityId),
            'address' => Purify::clean($this->address),
        ]);

        // save academic into DB
        $this->saveEmployeeAcademicHandler($this->activity);

        // save activity group handler
        $this->saveActivityGroupHandler($this->activity);

        // save contract type into DB
        $this->saveContractTypeHandler($this->activity);

        // save province into DB
        $this->saveProvinceHandler($this->activity);

        // save gender into DB
        $this->saveEmployeeGenderHandler($this->activity);

        // upload ads image
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
        return view('frontend.pages.activity.activity-edit.ads_registration.employment.employee');
    }
}
