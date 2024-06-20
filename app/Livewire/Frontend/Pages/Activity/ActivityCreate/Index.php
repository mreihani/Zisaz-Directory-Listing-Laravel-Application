<?php

namespace App\Livewire\Frontend\Pages\Activity\ActivityCreate;

use File;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Intervention\Image\Facades\Image;
use Stevebauman\Purify\Facades\Purify;
use Illuminate\Support\Facades\Storage;
use App\Rules\Activity\GenderValidationRule;
use App\Rules\Activity\WorkExpValidationRule;
use App\Rules\Activity\AcademicValidationRule;
use App\Rules\Activity\AdsTitleValidationRule;
use App\Rules\Activity\InquirerValidationRule;
use App\Rules\Activity\AdsImagesValidationRule;
use App\Rules\Activity\AuctioneerValidationRule;
use App\Rules\Activity\ReturnTimeValidationRule;
use App\Rules\Activity\AgreeToTermsValidationRule;
use App\Rules\Activity\SelectedCityValidationRule;
use App\Rules\Activity\AcademicLevelValidationRule;
use App\Models\Frontend\ReferenceData\Gender\Gender;
use App\Rules\Activity\AdsDescriptionValidationRule;
use App\Rules\Activity\EmployerGenderValidationRule;
use App\Rules\Activity\ProvinceToWorkValidationRule;
use App\Models\Frontend\UserModels\Activity\Activity;
use App\Rules\Activity\SelectedProvinceValidationRule;
use App\Rules\Activity\SellingActGrpsIdValidationRule;
use App\Rules\Activity\SelectedActGrpsIdValidationRule;
use App\Models\Frontend\ReferenceData\Academic\Academic;
use App\Models\Frontend\ReferenceData\AdsStatus\AdsStat;
use App\Rules\Activity\SelectedPaymentMethodValidationRule;
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
    public $bidAdsType;
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
    public $actGrpsAuctionAdsArray;
    public $auctioneer;
    public $auctioneerValidation;
    public $auctionNumber;
    public $auctionExpDateStart;
    public $auctionExpDateEnd;
    public $tenderAdsType;
    public $actGrpsTenderBuyAdsArray;
    public $actGrpsTenderProjectAdsArray;
    public $inquiryAdsType;
    public $actGrpsInquiryBuyAdsArray;
    public $inquirer;
    public $inquirerValidation;
    public $inquiryNumber;
    public $inquiryExpDateStart;
    public $inquiryExpDateEnd;
    public $actGrpsInquiryProjectAdsArray;
    public $actGrpsContractorAdsArray;
    public $websiteAddress;
    public $whatsappAddress;
    public $telegramAddress;
    public $eitaaAddress;
    public $adsHaveDiscount;

    protected function rules() {
        return [
            'selectedProvinceIdValidation' => new SelectedProvinceValidationRule($this->selectedProvinceId, $this->adsType, $this->employmentAdsType),
            'selectedCityIdValidation' => new SelectedCityValidationRule($this->selectedCityId, $this->adsType, $this->employmentAdsType),
            'selectedInvestmentProvinceIdValidation' => new SelectedInvestmentProvinceValidationRule($this->selectedInvestmentProvinceId, $this->adsType, $this->investmentAdsType),
            'selectedInvestmentCityIdValidation' => new SelectedInvestmentCityValidationRule($this->selectedInvestmentCityId, $this->adsType, $this->investmentAdsType),
            'actGrpsId' => new SelectedActGrpsIdValidationRule($this->adsType),
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
            'licenseTypeValue.*' => 'required_if:auctioneer,==,private_company|required_if:auctioneer,==,public_company|required_if:inquirer,==,public_company|required_if:inquirer,==,private_company',
            'licenseImage.*' => 'required_if:auctioneer,==,private_company|required_if:auctioneer,==,public_company|required_if:inquirer,==,public_company|required_if:inquirer,==,private_company',
            'provinceToWork' => new ProvinceToWorkValidationRule($this->adsType, $this->employmentAdsType),
            'adsDescription' => new AdsDescriptionValidationRule($this->adsType, $this->investmentAdsType),
            'auctioneerValidation' => new AuctioneerValidationRule($this->auctioneer, $this->adsType, $this->bidAdsType, $this->tenderAdsType),
            'auctionNumber' => 'required_if:auctioneer,==,private_company|required_if:auctioneer,==,public_company',
            'inquirerValidation' => new InquirerValidationRule($this->inquirer, $this->adsType),
            'inquiryNumber' => 'required_if:inquirer,==,private_company|required_if:inquirer,==,public_company',
        ];
    }

    protected $messages = [
        'licenseTypeValue.*.required_if' => 'لطفا نوع مجوز را انتخاب نمایید.',
        'licenseImage.*.required_if' => 'لطفا تصویر مجوز را بارگذاری نمایید.',
        'auctionNumber.required_if' => 'لطفا شماره مزایده را وارد نمایید.',
        'inquiryNumber.required_if' => 'لطفا شماره استعلام را وارد نمایید.',
    ];

    public function mount() {
       
        $this->activityType = 'ads_registration';
        $this->section = 'ads_registration';
        $this->adsType = "";

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
        $this->employmentAdsType = "";
        $this->investmentAdsType = "";
        $this->bidAdsType = "";
        $this->sellingAdsManufacturereType = "";
        $this->adsStatus = [];
        $this->adsStatusArray = AdsStat::all();
        $this->adsImage = "";
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
        $this->actGrpsEngAdsArray = $this->actGrpsEngArray;
        $this->actGrpsManagerAdsArray = $this->actGrpsManagerArray;
        $this->actGrpsTechnicalAdsArray = $this->actGrpsTechnicalArray;
        $this->actGrpsAuctionAdsArray = ActCat::find(20)->activityGroup->chunk($this->calculateChunkNumber(20))->toArray();
        $this->auctioneer = "";
        $this->tenderAdsType = "";
        $this->actGrpsTenderBuyAdsArray = ActCat::find(21)->activityGroup->chunk($this->calculateChunkNumber(21))->toArray();
        $this->actGrpsTenderProjectAdsArray = ActCat::find(22)->activityGroup->chunk($this->calculateChunkNumber(22))->toArray();
        $this->actGrpsInquiryBuyAdsArray = ActCat::find(23)->activityGroup->chunk($this->calculateChunkNumber(23))->toArray();
        $this->actGrpsInquiryProjectAdsArray = ActCat::find(24)->activityGroup->chunk($this->calculateChunkNumber(24))->toArray();
        $this->actGrpsContractorAdsArray = ActCat::find(25)->activityGroup->chunk($this->calculateChunkNumber(25))->toArray();
        $this->inquiryAdsType = "";
        $this->inquirer = "";
        $this->adsHaveDiscount = "no";
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
    public function changeBidAdsType($value) {
        $this->bidAdsType = $value;
    }
    public function changePriceByAgreement() {
        //        
    }
    public function loadInvestmentCitiesByProvinceChange() {
        $selectedInvestmentProvinceId = $this->selectedInvestmentProvinceId;
        $this->investmentCities = Province::find($selectedInvestmentProvinceId)->city;
        $this->selectedInvestmentCityId = $this->investmentCities->first()->id;
    }
    public function changeTenderAdsType($value) {
        $this->tenderAdsType = $value;
    }
    public function changeInquiryAdsType($value) {
        $this->inquiryAdsType = $value;
    }

    // save into db handlers section
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

    // public ads single image upload handler
    private function handlePublicAdsSingleFileUpload($activity) {
        
        if($this->adsImage == "") {
            return;
        }
       
        $folderId = $activity->id;
        $dir = 'storage/upload/ads-images/' . $folderId;

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
        foreach ($this->provinceToWork as $key => $value) {
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
    // save bid activity group into DB
    private function saveBidActivityGroupHandler($activity) {
        // get items which are true
        $grpArray = [0 => $this->bidActGrpsId];
        
        $activity->activityGroups()->attach($grpArray);
    }

    // save ads registration into DB
    private function saveAdsRegistrationHandler() {
        
        // create activity item
        $activity = auth()->user()->activity()->create([
            'activity_type' => Purify::clean($this->section),
            'slug' => str_replace(' ', '-', Purify::clean($this->adsTitle)) .'-'. Str::random() .''. Activity::getLatestId(),
        ]);
        
        // ثبت آگهی
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
                'type' => Purify::clean($this->employmentAdsType),
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

            // upload ads image
            $this->handlePublicAdsSingleFileUpload($activity);
        }

        // ثبت آگهی
        // آگهی استخدام
        // کارفرما
        if($this->adsType == "employment" && $this->employmentAdsType == "employer") {
            $ads = $activity->employment()->create([
                'type' => Purify::clean($this->employmentAdsType),
                'item_title' => Purify::clean($this->adsTitle),
                'item_description' => Purify::clean($this->adsDescription),
                'work_exp' => Purify::clean($this->workExp),
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

            // upload ads image
            $this->handlePublicAdsSingleFileUpload($activity);
        }

        // ثبت آگهی
        // آگهی شراکت و سرمایه کذاری
        // سرمایه گذار
        if($this->adsType == "investment" && $this->investmentAdsType == "investor") {
            $ads = $activity->investment()->create([
                'type' => Purify::clean($this->investmentAdsType),
                'item_title' => Purify::clean($this->adsTitle),
                'item_description' => Purify::clean($this->adsDescription),
                'investment_value' => Purify::clean($this->investmentValue),
                'return_time' => Purify::clean($this->returnTime),
                'investment_bail' => Purify::clean($this->investmentBail),
                'city_id' => Purify::clean($this->selectedCityId),
            ]);

            // upload ads image
            $this->handlePublicAdsSingleFileUpload($activity);
        }

        // ثبت آگهی
        // آگهی شراکت و سرمایه کذاری
        // سرمایه پذیر
        if($this->adsType == "investment" && $this->investmentAdsType == "invested") {
            $ads = $activity->investment()->create([
                'type' => Purify::clean($this->investmentAdsType),
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

            // upload ads image
            $this->handlePublicAdsSingleFileUpload($activity);
        }

        // ثبت آگهی
        // آگهی مزایده و مناقصه
        // آگهی مزایده
        if($this->adsType == "bid" && $this->bidAdsType == "auction") {
            $ads = $activity->bid()->create([
                'type' => Purify::clean($this->bidAdsType),
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
            $this->handlePublicAdsSingleFileUpload($activity);

            // save activity group handler
            $this->saveActivityGroupHandler($activity);

            // save license image and title
            $this->saveLicenseHandler($activity);
        }
        
        // ثبت آگهی
        // آگهی مزایده و مناقصه
        // آگهی مناقصه
        if($this->adsType == "bid" && $this->bidAdsType == "tender") {
            $ads = $activity->bid()->create([
                'type' => Purify::clean($this->tenderAdsType),
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
            $this->handlePublicAdsSingleFileUpload($activity);

            // save activity group handler
            $this->saveActivityGroupHandler($activity);

            // save license image and title
            $this->saveLicenseHandler($activity);
        }

        // ثبت آگهی
        // آگهی استعلام قیمت
        // خرید
        if($this->adsType == "inquiry" && $this->inquiryAdsType == "inquiry_buy") {
            $ads = $activity->inquiry()->create([
                'type' => Purify::clean($this->inquiryAdsType),
                'item_title' => Purify::clean($this->adsTitle),
                'item_description' => Purify::clean($this->adsDescription),
                'inquirer' => Purify::clean($this->inquirer),
                'city_id' => Purify::clean($this->selectedCityId),
                'inquiry_number' => Purify::clean($this->inquiryNumber),
                'address' => Purify::clean($this->address),
                'inquiry_exp_date_start' => Purify::clean($this->inquiryExpDateStart),
                'inquiry_exp_date_end' => Purify::clean($this->inquiryExpDateEnd),
            ]);

            // upload ads image
            $this->handlePublicAdsSingleFileUpload($activity);

            // save activity group handler
            $this->saveActivityGroupHandler($activity);

            // save license image and title
            $this->saveLicenseHandler($activity);
        }

        // ثبت آگهی
        // آگهی استعلام قیمت
        // اجرای پروژه
        if($this->adsType == "inquiry" && $this->inquiryAdsType == "inquiry_project") {
            $ads = $activity->inquiry()->create([
                'type' => Purify::clean($this->inquiryAdsType),
                'item_title' => Purify::clean($this->adsTitle),
                'item_description' => Purify::clean($this->adsDescription),
                'inquirer' => Purify::clean($this->inquirer),
                'city_id' => Purify::clean($this->selectedCityId),
                'inquiry_number' => Purify::clean($this->inquiryNumber),
                'address' => Purify::clean($this->address),
                'inquiry_exp_date_start' => Purify::clean($this->inquiryExpDateStart),
                'inquiry_exp_date_end' => Purify::clean($this->inquiryExpDateEnd),
            ]);

            // upload ads image
            $this->handlePublicAdsSingleFileUpload($activity);

            // save activity group handler
            $this->saveActivityGroupHandler($activity);

            // save license image and title
            $this->saveLicenseHandler($activity);
        }

        // ثبت آگهی
        // فرم ثبت آگهی پیمانکاری
        if($this->adsType == "contractor") {
            $ads = $activity->contractor()->create([
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
            $this->saveActivityGroupHandler($activity);

            // save selling ads status type into DB
            $this->saveSellingAdsStatusHandler($activity);

            // upload ads image
            $this->handlePublicAdsFileUpload($activity);
 
            // save payment method into DB
            $this->savePaymentMethodHandler($activity);

            // save province into DB
            $this->saveProvinceHandler($activity);
        }

        $activity->update([
            'subactivity_id' => $ads->id,
            'subactivity_type' => get_class($ads),
        ]);
    }

    public function save() {    
      
        $this->validate();

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

        return redirect(route('user.dashboard.saved-ads.index'));
    }

   
    public function render()
    {
        return view('frontend.pages.activity.activity-create.component.index');
    } 
}
