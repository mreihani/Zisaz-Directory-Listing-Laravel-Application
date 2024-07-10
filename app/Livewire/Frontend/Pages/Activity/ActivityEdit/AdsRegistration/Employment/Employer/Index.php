<?php

namespace App\Livewire\Frontend\Pages\Activity\ActivityEdit\AdsRegistration\Employment\Employer;

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
use App\Rules\Activity\AcademicLevelValidationRule;
use App\Models\Frontend\ReferenceData\Gender\Gender;
use App\Rules\Activity\EmployerGenderValidationRule;
use App\Rules\Activity\ProvinceToWorkValidationRule;
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
    public $academicLevel;
    public $academicArray;

    // gender form section
    public $employerGender;
    public $genderArray;

    // work experience section
    public $workExp;
    public $workExpValidation;

    // province to work field
    public $provinces;
    public $provinceToWork;

    // agreement
    public $agreeToTerms;
    
    protected function rules() {
        return [
            'actGrpsId' => new SelectedActGrpsIdValidationRule("employment"),
            'adsTitle' => 'required',
            'employerGender' => new EmployerGenderValidationRule("employment", "employer"),
            'academicLevel' => new AcademicLevelValidationRule("employment", "employer"),
            'workExpValidation' => new WorkExpValidationRule($this->workExp, "employment"),
            'provinceToWork' => new ProvinceToWorkValidationRule("employment", "employer"),
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
        $this->adsImage = $this->activity->adsImages->pluck('image')->first();

        // contract types
        $this->contractType = [];
        $this->provinces = Province::all();
        $this->contractTypeArray = ContractType::all();
        foreach ($this->contractTypeArray->pluck('id')->toArray() as $checkedItemValue) {
            if(in_array($checkedItemValue, $this->activity->contractType->pluck('id')->toArray())) {
                $this->contractType[$checkedItemValue] = true;
            }
        }

        // academic info section
        $this->academicLevel = [];
        $this->academicArray = Academic::all();
        foreach ($this->academicArray->pluck('id')->toArray() as $checkedItemValue) {
            if(in_array($checkedItemValue, $this->activity->academic->pluck('id')->toArray())) {
                $this->academicLevel[$checkedItemValue] = true;
            }
        }

        // gender form section
        $this->employerGender = [];
        $this->genderArray = Gender::all();
        foreach ($this->academicArray->pluck('id')->toArray() as $checkedItemValue) {
            if(in_array($checkedItemValue, $this->activity->gender->pluck('id')->toArray())) {
                $this->employerGender[$checkedItemValue] = true;
            }
        }

        // work experience section
        $this->workExp = $this->employment->work_exp;

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

    // save employer academic into DB
    private function saveEmployerAcademicHandler($activity) {
        // get items which are true
        $grpArray = [];
        foreach ($this->academicLevel as $key => $value) {
            if($value) {
                $grpArray[] = Purify::clean($key);
            }
        }

        $activity->academic()->sync($grpArray, true);
    }
    // save employer gender into DB
    private function saveEmployerGenderHandler($activity) {
        // get items which are true
        $grpArray = [];
        foreach ($this->employerGender as $key => $value) {
            if($value) {
                $grpArray[] = Purify::clean($key);
            }
        }

        $activity->gender()->sync($grpArray, true);
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
        // کارفرما
        $ads = $this->activity->employment()->update([
            'item_title' => Purify::clean($this->adsTitle),
            'item_description' => Purify::clean($this->adsDescription),
            'work_exp' => Purify::clean($this->workExp),
        ]);

        // save academic into DB
        $this->saveEmployerAcademicHandler($this->activity);

        // save gender into DB
        $this->saveEmployerGenderHandler($this->activity);

        // save activity group handler
        $this->saveActivityGroupHandler($this->activity);

        // save contract type into DB
        $this->saveContractTypeHandler($this->activity);

        // save province into DB
        $this->saveProvinceHandler($this->activity);

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
        return view('frontend.pages.activity.activity-edit.ads_registration.employment.employer');
    }
}
