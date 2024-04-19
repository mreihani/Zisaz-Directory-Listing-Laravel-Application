<?php

namespace App\Livewire\Frontend\Pages\Activity;

use Livewire\Component;
use Livewire\WithFileUploads;
use Intervention\Image\Facades\Image;
use Stevebauman\Purify\Facades\Purify;
use Illuminate\Support\Facades\Storage;
use App\Rules\Activity\GenderValidationRule;
use App\Rules\Activity\WorkExpValidationRule;
use App\Rules\Activity\AcademicValidationRule;
use App\Rules\Activity\AdsImagesValidationRule;
use App\Rules\Activity\AdsTitleValidationRule;
use App\Rules\Activity\JobTitleValidationRule;
use App\Rules\Activity\shopNameValidationRule;
use App\Rules\Activity\ReturnTimeValidationRule;
use App\Rules\Activity\shopAddressValidationRule;
use App\Rules\Activity\AgreeToTermsValidationRule;
use App\Rules\Activity\CompanyTitleValidationRule;
use App\Rules\Activity\SelectedCityValidationRule;
use App\Rules\Activity\AcademicLevelValidationRule;
use App\Rules\Activity\CompanyRegNumValidationRule;
use App\Models\Frontend\ReferenceData\Gender\Gender;
use App\Rules\Activity\AdsDescriptionValidationRule;
use App\Rules\Activity\EmployerGenderValidationRule;
use App\Rules\Activity\ProvinceToWorkValidationRule;
use App\Rules\Activity\SelectedProvinceValidationRule;
use App\Rules\Activity\SellingActGrpsIdValidationRule;
use App\Models\Frontend\ReferenceData\Academic\Academic;
use App\Models\Frontend\ReferenceData\AdsStatus\AdsStat;
use App\Models\Frontend\UserModels\Activity\Resume\Resume;
use App\Rules\Activity\SelectedPaymentMethodValidationRule;
use App\Rules\Activity\SelectedShopActGrpsIdValidationRule;
use App\Rules\Activity\SelectedInvestmentCityValidationRule;
use App\Models\Frontend\ReferenceData\PaymentMethod\PaymntMtd;
use App\Models\Frontend\ReferenceData\ProvinceAndCity\Province;
use App\Models\Frontend\ReferenceData\Construction\Skill\ActCat;
use App\Models\Frontend\ReferenceData\Construction\Skill\ActGrp;
use App\Models\Frontend\ReferenceData\ContractType\ContractType;
use App\Rules\Activity\SelectedInvestmentProvinceValidationRule;
use App\Rules\Activity\SellingAdsManufacturerTypeValidationRule;

class Index extends Component
{
    use WithFileUploads;

    public $section;
    public $activityType;
    public $selectedProvinceIdValidation;
    public $selectedCityIdValidation;
    public $selectedInvestmentProvinceIdValidation;
    public $selectedInvestmentCityIdValidation;

    // resume section
    public $resumeGoal;
    public $provinces;
    public $selectedProvinceId;
    public $cities;
    public $selectedCityId;
    public $address;
    public $postalcode;
    public $landline_phone;
    public $jobTitle;
    public $licenses;
    public $licenseTypeValue;
    public $otherDescription;
    public $otherDescriptionStatus;
    public $licenseImage;
    public $licenseItem;
    public $resumeDescription;
    public $licenseInputs;
    public $licenseIteration;
    public $actGrpsId;
    public $sellingActGrpsId;
    public $sellingActGrpsIdValidation;
    public $actGrpsShopArray;
    public $actGrpsEngArray;
    public $actGrpsManagerArray;
    public $actGrpsTechnicalArray;
    public $actGrpsCompleteArray;
    public $actGrpsMassConstArray;
    public $actGrpsDesignArray;
    public $actGrpsOfficeArray;
    public $actGrpsTrenchArray;
    public $actGrpsFoundationArray;
    public $actGrpsFacadeArray;
    public $actGrpsElectricalArray;
    public $actGrpsIsolationArray;
    public $actGrpsOtherArray;
    public $actGrpsDoorArray;
    public $actGrpsInternalArray;
    public $actGrpsGardenArray;
    public $actGrpsMachinaryArray;
    public $actGrpsLabsArray;
    public $companyTitle;
    public $companyRegNum;
    public $shopName;
    public $shopLicense;
    public $shopBannerImage;
    public $factoryProjectDescription;

    // ads section
    public $adsType;
    public $employmentAdsType;
    public $investmentAdsType;
    public $adsTitle;
    public $adsDescription;
    public $sellingAdsManufacturereType;
    public $sellingAdsManufacturerTypeValidation;
    public $productBrand;
    public $adsStatus;
    public $adsStatusArray;
    public $adsImages;
    public $price;
    public $priceByAgreement;
    public $paymentMethod;
    public $paymentMethodArray;
    public $agreeToTerms;
    public $contractType;
    public $contractTypeArray;
    public $academic;
    public $academicArray;
    public $academicValidation;
    public $academicLevel;
    public $age;
    public $gender;
    public $genderArray;
    public $genderValidation;
    public $employerGender;
    public $workExp;
    public $workExpValidation;
    public $workExpDescription;
    public $provinceToWork;
    public $investmentValue;
    public $returnTime;
    public $returnTimeValidation;
    public $invenstmentYearlyProfitPercent;
    public $invenstmentGauranteedProfitPercent;
    public $investmentBail;
    public $investedAcademic;
    public $selectedInvestmentProvinceId;
    public $selectedInvestmentCityId;
    public $investmentCities;
    public $actGrpsTechnicalAdsArray;
    public $actGrpsEngAdsArray;
    public $actGrpsManagerAdsArray;
    public $latitude;
    public $longitude;

    // custom web page
    public $customWebPage;

    protected function rules() {
        return [
            'selectedProvinceIdValidation' => new SelectedProvinceValidationRule($this->resumeGoal, $this->selectedProvinceId, $this->adsType, $this->employmentAdsType),
            'selectedCityIdValidation' => new SelectedCityValidationRule($this->resumeGoal, $this->selectedCityId, $this->adsType, $this->employmentAdsType),
            'selectedInvestmentProvinceIdValidation' => new SelectedInvestmentProvinceValidationRule($this->selectedInvestmentProvinceId, $this->adsType, $this->investmentAdsType),
            'selectedInvestmentCityIdValidation' => new SelectedInvestmentCityValidationRule($this->selectedInvestmentCityId, $this->adsType, $this->investmentAdsType),
            'jobTitle' => new JobTitleValidationRule($this->section, $this->resumeGoal, $this->jobTitle),
            'shopName' => new shopNameValidationRule($this->resumeGoal, $this->shopName),
            'address' => new shopAddressValidationRule($this->resumeGoal, $this->address),
            'actGrpsId' => new SelectedShopActGrpsIdValidationRule($this->resumeGoal, $this->adsType),
            'companyTitle' => new CompanyTitleValidationRule($this->resumeGoal, $this->companyTitle),
            'companyRegNum' => new CompanyRegNumValidationRule($this->resumeGoal, $this->companyRegNum),
            'sellingActGrpsIdValidation' => new SellingActGrpsIdValidationRule($this->sellingActGrpsId, $this->adsType),
            'adsTitle' => new AdsTitleValidationRule($this->adsTitle, $this->adsType),
            'adsImages' => new AdsImagesValidationRule($this->adsImages, $this->adsType),
            'sellingAdsManufacturerTypeValidation' => new SellingAdsManufacturerTypeValidationRule($this->sellingAdsManufacturereType, $this->adsType),
            'paymentMethod' => new SelectedPaymentMethodValidationRule($this->paymentMethod, $this->adsType),
            'agreeToTerms' => new AgreeToTermsValidationRule($this->agreeToTerms, $this->adsType),
            'academicValidation' => new AcademicValidationRule($this->academic, $this->adsType, $this->employmentAdsType),
            'genderValidation' => new GenderValidationRule($this->gender, $this->adsType, $this->employmentAdsType),
            'workExpValidation' => new WorkExpValidationRule($this->workExp, $this->adsType),
            'academicLevel' => new AcademicLevelValidationRule($this->adsType, $this->employmentAdsType),
            'employerGender' => new EmployerGenderValidationRule($this->adsType, $this->employmentAdsType),
            'returnTimeValidation' => new ReturnTimeValidationRule($this->adsType, $this->returnTime),
            'licenseTypeValue.*' => 'required_if:resumeGoal,==,5',
            'licenseImage.*' => 'required_if:resumeGoal,==,5',
            'provinceToWork' => new ProvinceToWorkValidationRule($this->adsType, $this->employmentAdsType),
            'adsDescription' => new AdsDescriptionValidationRule($this->adsType, $this->investmentAdsType),
        ];
    }

    protected $messages = [
        'licenseTypeValue.*.required_if' => 'لطفا نوع مجوز را انتخاب نمایید.',
        'licenseImage.*.required_if' => 'لطفا تصویر مجوز را بارگذاری نمایید.',
    ];

    public function mount() {
        // این رو بعدا پاک کن برای فراخوانی فایل های شخصی است
        // $this->licenseImage = route('assets', [auth()->user()->id, $licenseItem->license_image]);

        $this->section = null;
        $this->activityType = "";

        // resume section
        $this->resumeGoal = "";
        $this->provinces = Province::all();
        $this->cities = [];
        $this->selectedProvinceId = '';
        $this->selectedCityId = '';
        $this->licenses = false;
        $this->licenseImage = [null];
        $this->licenseTypeValue = [""];
        $this->otherDescription = [];
        $this->otherDescriptionStatus = [];
        $this->licenseInputs = [0];
        $this->licenseIteration = 1;
        $this->actGrpsId = [];
        $this->sellingActGrpsId = "";
        $this->actGrpsShopArray = ActCat::find(19)->activityGroup->chunk($this->calculateChunkNumber(19))->toArray();
        $this->actGrpsTechnicalArray = ActCat::find(14)->activityGroup->chunk($this->calculateChunkNumber(14))->toArray();
        $this->actGrpsEngArray = ActCat::find(15)->activityGroup->chunk($this->calculateChunkNumber(15))->toArray();
        $this->actGrpsManagerArray = ActCat::find(16)->activityGroup->chunk($this->calculateChunkNumber(16))->toArray();
        $this->actGrpsCompleteArray = ActCat::find(1)->activityGroup->chunk($this->calculateChunkNumber(1))->toArray();
        $this->actGrpsMassConstArray = ActCat::find(2)->activityGroup->chunk($this->calculateChunkNumber(2))->toArray();
        $this->actGrpsDesignArray = ActCat::find(3)->activityGroup->chunk($this->calculateChunkNumber(3))->toArray();
        $this->actGrpsOfficeArray = ActCat::find(4)->activityGroup->chunk($this->calculateChunkNumber(4))->toArray();
        $this->actGrpsTrenchArray = ActCat::find(5)->activityGroup->chunk($this->calculateChunkNumber(5))->toArray();
        $this->actGrpsFoundationArray = ActCat::find(6)->activityGroup->chunk($this->calculateChunkNumber(6))->toArray();
        $this->actGrpsFacadeArray = ActCat::find(7)->activityGroup->chunk($this->calculateChunkNumber(7))->toArray();
        $this->actGrpsElectricalArray = ActCat::find(8)->activityGroup->chunk($this->calculateChunkNumber(8))->toArray();
        $this->actGrpsIsolationArray = ActCat::find(9)->activityGroup->chunk($this->calculateChunkNumber(9))->toArray();
        $this->actGrpsOtherArray = ActCat::find(10)->activityGroup->chunk($this->calculateChunkNumber(10))->toArray();
        $this->actGrpsDoorArray = ActCat::find(11)->activityGroup->chunk($this->calculateChunkNumber(11))->toArray();
        $this->actGrpsInternalArray = ActCat::find(12)->activityGroup->chunk($this->calculateChunkNumber(12))->toArray();
        $this->actGrpsGardenArray = ActCat::find(13)->activityGroup->chunk($this->calculateChunkNumber(13))->toArray();
        $this->actGrpsLabsArray = ActCat::find(17)->activityGroup->chunk($this->calculateChunkNumber(17))->toArray();
        $this->actGrpsMachinaryArray = ActCat::find(18)->activityGroup->chunk($this->calculateChunkNumber(18))->toArray();
        $this->shopLicense = "no";

        // ads section
        $this->adsType = "";
        $this->employmentAdsType = "";
        $this->investmentAdsType = "";
        $this->sellingAdsManufacturereType = "";
        $this->adsStatus = [];
        $this->adsStatusArray = AdsStat::all();
        $this->adsImages = [];
        $this->priceByAgreement = false;
        $this->paymentMethod = [];
        $this->paymentMethodArray = PaymntMtd::all();
        $this->contractType = [];
        $this->contractTypeArray = ContractType::all();
        $this->academic = "";
        $this->academicArray = Academic::all();
        $this->academicLevel = [];
        $this->gender = "";
        $this->genderArray = Gender::all();
        $this->employerGender = [];
        $this->workExp = "";
        $this->provinceToWork = [];
        $this->returnTime = "";
        $this->investmentCities = [];
        $this->selectedInvestmentProvinceId = '';
        $this->selectedInvestmentCityId = '';
        $this->actGrpsEngAdsArray = ActGrp::find([190,191,192,193,194,195,196,197,198])->chunk(2)->toArray();
        $this->actGrpsManagerAdsArray = ActGrp::find([221,222,223,224,225,226,227,228,229,230,231])->chunk(2)->toArray();
        $this->actGrpsTechnicalAdsArray = ActGrp::find([169,128,129,130,131,132,133,134,135,136,137,138,139,140,141,142,143,144,145,146,147,148,154,155,156,157,158,159,160,161,162,163,164,165,166,167])->chunk(2)->toArray();
        
        // custom web page
        $this->customWebPage = "";
    }

    public function changeActivityType($value) {
        $this->section = $value;
    }

    // resume section
    public function changeResumeGoal($value) {
        $this->resumeGoal = $value;
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
    private function handleLicenseUpload() {
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

    // ads section
    public function changeAdsType($value) {
        $this->adsType = $value;
    }
    public function changeEmploymentAdsType($value) {
        $this->employmentAdsType = $value;    
    }
    public function changeInvestmentAdsType($value) {
        $this->investmentAdsType = $value;
    }
    public function changePriceByAgreement() {
        //        
    }
    public function loadInvestmentCitiesByProvinceChange() {
        $selectedInvestmentProvinceId = $this->selectedInvestmentProvinceId;
        $this->investmentCities = Province::find($selectedInvestmentProvinceId)->city;
        $this->selectedInvestmentCityId = $this->investmentCities->first()->id;
    }

    // custom page section
    public function changeCustomPage() {
        //
    }

    // save into db handlers section
    // private license image upload handler
    private function handlePrivateFileUpload($licenseImage, $activity) {
        $folderId = $activity->id;
        $unique_image_name = hexdec(uniqid());
        $filename = $unique_image_name . '.' . 'jpg';

        $dir = "activity/$folderId/$filename";
       
        $img = Image::make($licenseImage)->encode('jpg')->resize(1200, null, function ($constraint) {
            $constraint->aspectRatio();
        });
        Storage::disk('private')->put($dir, $img);

        return $dir;
    }
    // public banner image upload handler
    private function handlePublicFileUpload($activity) {

        if(is_null($this->shopBannerImage)) {
            return null;
        }

        $folderId = $activity->id;
        $dir = 'storage/upload/banner-images/' . $folderId;

        $unique_image_name = hexdec(uniqid());
        $filename = $unique_image_name . '.' . 'jpg';

        $img = Image::make($this->shopBannerImage)->fit(1300,200)->encode('jpg');

        Storage::disk('public')->put('upload/banner-images/' . $folderId . '/' . $filename, $img);

        return $dir . '/' . $filename;
    }
    // save license items into DB
    private function saveLicenseHandler($activity) {
        foreach ($this->licenseTypeValue as $key => $value) {

            // if image has not been uploaded in the loop item
            if(!isset($this->licenseImage[$key]) || $value == "") {
                continue;
            }

            // Get uploaded image address
            $profileImageAddress = $this->handlePrivateFileUpload($this->licenseImage[$key], $activity);

            $activity->license()->create([
                'license_type' => Purify::clean($this->licenseTypeValue[$key]),
                'description' => isset($this->otherDescription[$key]) ? Purify::clean($this->otherDescription[$key]) : null,
                'license_image' => $profileImageAddress,
            ]);
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
        
        $activity->activityGroups()->attach($grpArray);
    }
    // save resume into DB
    private function saveResumeHandler() {

        // create activity item
        $activity = auth()->user()->activity()->create([
            'activity_type' => Purify::clean($this->section)
        ]);

        // معرفی رزومه
        // معرفی تخصص، تجربیات و پروژه های شخصی 
        if($this->resumeGoal == 1) {
            $resume = $activity->resume()->create([
                'resume_goal' => Purify::clean($this->resumeGoal),
                'city_id' => Purify::clean($this->selectedCityId),
                'address' => Purify::clean($this->address),
                'postalcode' => Purify::clean($this->postalcode),
                'landline_phone' => Purify::clean($this->landline_phone),
                'item_title' => Purify::clean($this->jobTitle),
                'resume_description' => Purify::clean($this->resumeDescription),
            ]);

            // save license image and title
            $this->saveLicenseHandler($activity);

            // save activity group handler
            $this->saveActivityGroupHandler($activity);
        }
        
        // معرفی رزومه
        // معرفی فروشگاه
        if($this->resumeGoal == 2) {
            $resume = $activity->resume()->create([
                'resume_goal' => Purify::clean($this->resumeGoal),
                'city_id' => Purify::clean($this->selectedCityId),
                'address' => Purify::clean($this->address),
                'postalcode' => Purify::clean($this->postalcode),
                'landline_phone' => Purify::clean($this->landline_phone),
                'item_title' => Purify::clean($this->shopName),
                'business_license' => $this->shopLicense == 'yes' ? 1 : 0,
                'resume_description' => Purify::clean($this->resumeDescription),
                'banner_image' => $this->handlePublicFileUpload($activity),
            ]);

            // save license image and title
            $this->saveLicenseHandler($activity);

            // save activity group handler
            $this->saveActivityGroupHandler($activity);
        }

        // معرفی رزومه
        // معرفی شرکت ساختمانی
        if($this->resumeGoal == 3) {
            $resume = $activity->resume()->create([
                'resume_goal' => Purify::clean($this->resumeGoal),
                'city_id' => Purify::clean($this->selectedCityId),
                'address' => Purify::clean($this->address),
                'postalcode' => Purify::clean($this->postalcode),
                'landline_phone' => Purify::clean($this->landline_phone),
                'item_title' => Purify::clean($this->companyTitle),
                'reg_num' => Purify::clean($this->companyRegNum),
                'resume_description' => Purify::clean($this->resumeDescription),
            ]);

            // save license image and title
            $this->saveLicenseHandler($activity);

            // save activity group handler
            $this->saveActivityGroupHandler($activity);
        }

        // معرفی رزومه
        // معرفی دفتر طراحی و مهندسی
        if($this->resumeGoal == 4) {
            $resume = $activity->resume()->create([
                'resume_goal' => Purify::clean($this->resumeGoal),
                'city_id' => Purify::clean($this->selectedCityId),
                'address' => Purify::clean($this->address),
                'postalcode' => Purify::clean($this->postalcode),
                'landline_phone' => Purify::clean($this->landline_phone),
                'item_title' => Purify::clean($this->companyTitle),
                'reg_num' => Purify::clean($this->companyRegNum),
                'resume_description' => Purify::clean($this->resumeDescription),
            ]);

            // save license image and title
            $this->saveLicenseHandler($activity);

            // save activity group handler
            $this->saveActivityGroupHandler($activity);
        }

        // معرفی رزومه
        // معرفی آزمایشگاه مصالح ساختمانی
        if($this->resumeGoal == 5) {
            $resume = $activity->resume()->create([
                'resume_goal' => Purify::clean($this->resumeGoal),
                'city_id' => Purify::clean($this->selectedCityId),
                'address' => Purify::clean($this->address),
                'postalcode' => Purify::clean($this->postalcode),
                'landline_phone' => Purify::clean($this->landline_phone),
                'item_title' => Purify::clean($this->companyTitle),
                'reg_num' => Purify::clean($this->companyRegNum),
                'resume_description' => Purify::clean($this->resumeDescription),
            ]);

            // save license image and title
            $this->saveLicenseHandler($activity);

            // save activity group handler
            $this->saveActivityGroupHandler($activity);
        }

        // معرفی رزومه
        // معرفی کارخانه تولیدی
        if($this->resumeGoal == 6) {
            $resume = $activity->resume()->create([
                'resume_goal' => Purify::clean($this->resumeGoal),
                'city_id' => Purify::clean($this->selectedCityId),
                'address' => Purify::clean($this->address),
                'postalcode' => Purify::clean($this->postalcode),
                'landline_phone' => Purify::clean($this->landline_phone),
                'item_title' => Purify::clean($this->companyTitle),
                'reg_num' => Purify::clean($this->companyRegNum),
                'resume_description' => Purify::clean($this->resumeDescription),
                'project_description' => Purify::clean($this->factoryProjectDescription),
                'banner_image' => $this->handlePublicFileUpload($activity),
            ]);

            // save license image and title
            $this->saveLicenseHandler($activity);

            // save activity group handler
            $this->saveActivityGroupHandler($activity);
        }

        $activity->update([
            'subactivity_id' => $resume->id,
            'subactivity_type' => get_class($resume),
        ]);
    }
    // save custom page into Db
    private function saveCustomPageHandler() {
        if($this->customWebPage != "") {
            // create activity item
            $activity = auth()->user()->activity()->create([
                'activity_type' => Purify::clean($this->section)
            ]);

            // To Do
            // اطلاعات مربوط به صفحه اختصاصی باید در مدل و مایگریشن مخصوص اینجا ریخه شود
        }
    }
    // save selling activity group into DB
    private function saveSellingActivityGroupHandler($activity) {
        // get items which are true
        $grpArray = [0 => $this->sellingActGrpsId];
        
        $activity->activityGroups()->attach($grpArray);
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
        
        $activity->adsStats()->attach($grpArray);
    }
    // public ads image upload handler
    private function handlePublicAdsFileUpload($activity) {
        
        if(count($this->adsImages) == 0) {
            return;
        }
       
        $folderId = $activity->id;
        $dir = 'storage/upload/ads-images/' . $folderId;

        foreach ($this->adsImages as $key => $value) {
            
            if($key > 4) {
                break;
            }

            $unique_image_name = hexdec(uniqid());
            $filename = $unique_image_name . '.' . 'jpg';

            $img = Image::make($value)->fit(400)->encode('jpg');
            Storage::disk('public')->put('upload/ads-images/' . $folderId . '/' . $filename, $img);

            $image_path = $dir . '/' . $filename;

            $activity->adsImages()->create([
                'image' => $image_path
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
        
        $activity->paymentMethod()->attach($grpArray);
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

        $activity->contractType()->attach($grpArray);
    }
    // save province into DB
    private function saveProvinceHandler($activity) {
        // get items which are true
        $grpArray = [];
        foreach ($this->contractType as $key => $value) {
            if($value) {
                $grpArray[] = Purify::clean($key);
            }
        }

        $activity->province()->attach($grpArray);
    }
    // save academic into DB
    private function saveAcademicHandler($activity) {
        // get items which are true
        $grpArray = [];
        foreach ($this->academicLevel as $key => $value) {
            if($value) {
                $grpArray[] = Purify::clean($key);
            }
        }

        $activity->academic()->attach($grpArray);
    }
    // save employee gender into DB
    private function saveEmployeeAcademicHandler($activity) {
        // get items which are true
        $grpArray = [0 => $this->academic];
        
        $activity->academic()->attach($grpArray);
    }
    // save employee gender 
    private function saveEmployeeGenderHandler($activity) {
        // get items which are true
        $grpArray = [0 => $this->gender];
                
        $activity->gender()->attach($grpArray);
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

        $activity->academic()->attach($grpArray);
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

        $activity->gender()->attach($grpArray);
    }
    // save ads registration into DB
    private function saveAdsRegistrationHandler() {
        
        // create activity item
        $activity = auth()->user()->activity()->create([
            'activity_type' => Purify::clean($this->section)
        ]);

        // ثبت آگهی
        // آگهی استخدام
        // آکهی فروش کالا
        if($this->adsType == "selling") {
            $ads = $activity->selling()->create([
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
            $this->saveSellingActivityGroupHandler($activity);

            // save selling ads status type into DB
            $this->saveSellingAdsStatusHandler($activity);

            // upload ads image
            $this->handlePublicAdsFileUpload($activity);

            // save payment method into DB
            $this->savePaymentMethodHandler($activity);
        }

        // ثبت آگهی
        // آگهی استخدام
        // کارجو
        if($this->adsType == "employment" && $this->employmentAdsType == "employee") {
            $ads = $activity->employment()->create([
                'ads_type' => Purify::clean($this->employmentAdsType),
                'item_title' => Purify::clean($this->adsTitle),
                'item_description' => Purify::clean($this->adsDescription),
                'age' => Purify::clean($this->age),
                'work_exp' => Purify::clean($this->workExp),
                'work_exp_description' => Purify::clean($this->workExpDescription),
                'city_id' => Purify::clean($this->selectedCityId),
                'address' => Purify::clean($this->address),
            ]);

             // save academic into DB
             $this->saveEmployeeAcademicHandler($activity);

            // save activity group handler
            $this->saveActivityGroupHandler($activity);

            // save contract type into DB
            $this->saveContractTypeHandler($activity);

            // save province into DB
            $this->saveProvinceHandler($activity);

            // save gender into DB
            $this->saveEmployeeGenderHandler($activity);
        }

        // ثبت آگهی
        // آگهی استخدام
        // کارفرما
        if($this->adsType == "employment" && $this->employmentAdsType == "employer") {
            $ads = $activity->employment()->create([
                'ads_type' => Purify::clean($this->employmentAdsType),
                'item_title' => Purify::clean($this->adsTitle),
                'item_description' => Purify::clean($this->adsDescription),
                'age' => Purify::clean($this->age),
                'work_exp' => Purify::clean($this->workExp),
                'work_exp_description' => Purify::clean($this->workExpDescription),
                'address' => Purify::clean($this->address),
            ]);

            // save academic into DB
            $this->saveEmployerAcademicHandler($activity);

            // save gender into DB
            $this->saveEmployerGenderHandler($activity);

            // save activity group handler
            $this->saveActivityGroupHandler($activity);

            // save contract type into DB
            $this->saveContractTypeHandler($activity);

            // save province into DB
            $this->saveProvinceHandler($activity);
        }

        // ثبت آگهی
        // آگهی شراکت و سرمایه کذاری
        // سرمایه گذار
        if($this->adsType == "investment" && $this->investmentAdsType == "investor") {
            $ads = $activity->investment()->create([
                'ads_type' => Purify::clean($this->investmentAdsType),
                'item_title' => Purify::clean($this->adsTitle),
                'item_description' => Purify::clean($this->adsDescription),
                'investment_value' => Purify::clean($this->investmentValue),
                'return_time' => Purify::clean($this->returnTime),
                'investment_bail' => Purify::clean($this->investmentBail),
                'city_id' => Purify::clean($this->selectedCityId),
            ]);
        }

        // ثبت آگهی
        // آگهی شراکت و سرمایه کذاری
        // سرمایه پذیر
        if($this->adsType == "investment" && $this->investmentAdsType == "invested") {
            $ads = $activity->investment()->create([
                'ads_type' => Purify::clean($this->investmentAdsType),
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
        }
        
        $activity->update([
            'subactivity_id' => $ads->id,
            'subactivity_type' => get_class($ads),
        ]);
    }

    public function save() {    
      
        $this->validate();

        // saving resume into DB
        if($this->section == "resume") {
            $this->saveResumeHandler();
        }

        // ساخت صفحه اختصاصی
        if($this->section == "custom_page") {
            $this->saveCustomPageHandler();
        }

        // ثبت آگهی
        if($this->section == "ads_registration") {
            $this->saveAdsRegistrationHandler();
        }

        // Show Toaster
        $this->dispatch('showToaster', 
            title: '', 
            message: '
                اطلاعات با موفقیت ذخیره شد.
            ', 
            type: 'bg-success'
        );
    }

   
    public function render()
    {
        return view('frontend.pages.activity.component.index');
    } 
}
