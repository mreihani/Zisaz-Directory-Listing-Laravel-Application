<?php

namespace App\Livewire\Frontend\Pages\Profile\ProfilePages\ProfileSettings\ConGrp7;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Profile\ShopActCat;
use Intervention\Image\Facades\Image;
use Stevebauman\Purify\Facades\Purify;
use Illuminate\Support\Facades\Storage;
use App\Rules\Profile\ProfileInfo\SelectedShopActGrpsIdValidationRule;

class Index extends Component
{
    use WithFileUploads;

    public $profile_image;
    public $activityGroupObj;
    public $companyName;
    public $companyRegNum;
    public $shopActGrpsId;
    public $shopActGrpsMassConstArray;
    public $shopActGrpsWholeContractorArray;
    public $shopActGrpsExcavationArray;
    public $shopActGrpsFoundationArray;
    public $shopActGrpsExteriorArray;
    public $shopActGrpsMechanicalArray;
    public $shopActGrpsInsulationArray;
    public $shopActGrpsOtherArray;
    public $shopActGrpsDoorArray;
    public $shopActGrpsInteriorArray;
    public $shopActGrpsGardenArray;
    public $companyType;
    public $showCompanySpecs;

    protected function rules()
    {
        return 
        [
            'companyType' => 'required',
            'companyName' => 'required_if:companyType,corporate',
            'companyRegNum' => 'required_if:companyType,corporate',
            'shopActGrpsId' => new SelectedShopActGrpsIdValidationRule(),
        ];
	}
    
    protected $messages = [
        'companyType.required' => 'لطفا نوع پیمانکار را مشخص نمایید.',
        'companyName.required_if' => 'لطفا نام شرکت را وارد نمایید.',
        'companyRegNum.required_if' => 'لطفا شماره ثبت شرکت را وارد نماید.',
    ];

    public function mount() {
        $this->profile_image = (auth()->user()->userProfile
        && auth()->user()->userProfile->userProfileInformation
        && auth()->user()->userProfile->userProfileInformation->profile_image)
        ? asset(auth()->user()->userProfile->userProfileInformation->profile_image) :
        null;

        $this->companyType = (auth()->user()->userProfile
        && auth()->user()->userProfile->userProfileInformation
        && auth()->user()->userProfile->userProfileInformation->company_type)
        ? auth()->user()->userProfile->userProfileInformation->company_type :
        '';

        $this->companyName = (auth()->user()->userProfile
        && auth()->user()->userProfile->userProfileInformation
        && auth()->user()->userProfile->userProfileInformation->company_name)
        ? auth()->user()->userProfile->userProfileInformation->company_name :
        '';

        $this->companyRegNum = (auth()->user()->userProfile
        && auth()->user()->userProfile->userProfileInformation
        && auth()->user()->userProfile->userProfileInformation->company_reg_num)
        ? auth()->user()->userProfile->userProfileInformation->company_reg_num :
        '';

        $this->showCompanySpecs = (auth()->user()->userProfile
        && auth()->user()->userProfile->userProfileInformation
        && auth()->user()->userProfile->userProfileInformation->company_type == 'independent')
        ? false :
        true;

        $this->shopActGrpsId = $this->selectedshopActGrpsArray();
        $this->shopActGrpsMassConstArray = ShopActCat::find(2)->shopActivityGroup->chunk($this->calculateChunkNumber(2))->toArray();
        $this->shopActGrpsWholeContractorArray = ShopActCat::find(4)->shopActivityGroup->chunk($this->calculateChunkNumber(4))->toArray();
        $this->shopActGrpsExcavationArray = ShopActCat::find(5)->shopActivityGroup->chunk($this->calculateChunkNumber(5))->toArray();
        $this->shopActGrpsFoundationArray = ShopActCat::find(6)->shopActivityGroup->chunk($this->calculateChunkNumber(6))->toArray();
        $this->shopActGrpsExteriorArray = ShopActCat::find(7)->shopActivityGroup->chunk($this->calculateChunkNumber(7))->toArray();
        $this->shopActGrpsMechanicalArray = ShopActCat::find(8)->shopActivityGroup->chunk($this->calculateChunkNumber(7))->toArray();
        $this->shopActGrpsInsulationArray = ShopActCat::find(9)->shopActivityGroup->chunk($this->calculateChunkNumber(9))->toArray();
        $this->shopActGrpsOtherArray = ShopActCat::find(10)->shopActivityGroup->chunk($this->calculateChunkNumber(10))->toArray();
        $this->shopActGrpsDoorArray = ShopActCat::find(11)->shopActivityGroup->chunk($this->calculateChunkNumber(11))->toArray();
        $this->shopActGrpsInteriorArray = ShopActCat::find(12)->shopActivityGroup->chunk($this->calculateChunkNumber(12))->toArray();
        $this->shopActGrpsGardenArray = ShopActCat::find(13)->shopActivityGroup->chunk($this->calculateChunkNumber(13))->toArray();
    }

    private function isProfileInfo() {
        return !! (
            auth()->user()->userProfile 
            && auth()->user()->userProfile->userProfileInformation
            && auth()->user()->userProfile->userProfileInformation->shopActGroups
        );
    }

    private function selectedshopActGrpsArray() {
        $selectedArray = $this->isProfileInfo() ? auth()->user()->userProfile->userProfileInformation->shopActGroups->pluck('id')->toArray() : null;
        if($selectedArray) {
            $selectedValuesArray = [];
            foreach ($selectedArray as $value) {
                $selectedValuesArray[$value] = true;
            }
            return $selectedValuesArray;
        }
        return []; 
    }

    private function calculateChunkNumber($id) {
       
        $totalCount = ShopActCat::find($id)->shopActivityGroup->count();

        return (int) ceil($totalCount / 4);
    }

    private function storeSelectedShopActGrpsId($userProfileInformation) {
        $selectedShopActGrpsIdArray = [];
        foreach ($this->shopActGrpsId as $key => $value) {
            if($value) {
                $selectedShopActGrpsIdArray[] = Purify::clean($key);
            }
        }
        
        $userProfileInformation->shopActGroups()->sync($selectedShopActGrpsIdArray, true);
    }

    public function changeCompanyType($value) {
        $this->companyType = $value;
 
        if($value == "corporate") {
            $this->showCompanySpecs = true;
        } elseif($value == "independent") {
            $this->showCompanySpecs = false;
        }
    }

    public function saveProfile() {
        
        $this->validate();
        
        // Get uploaded image address
        $profileImageAddress = $this->handleFileUpload();

        // Save user profile
        $userProfile = auth()->user()->userProfile()->firstOrCreate([
            'user_id' => auth()->user()->id
        ]);

        $userProfileInformation = $userProfile->userProfileInformation()->updateOrCreate([
            'user_profile_id' => $userProfile->id
        ],[
            'profile_image' => $profileImageAddress,
            'company_type' => Purify::clean($this->companyType),
            'company_name' => Purify::clean($this->companyName),
            'company_reg_num' => Purify::clean($this->companyRegNum),
        ]);

        // Store store selected shop act grps id into db
        $this->storeSelectedShopActGrpsId($userProfileInformation);
        
        // Show Toaster
        $this->dispatch('showToaster', 
            title: '', 
            message: '
                اطلاعات با موفقیت ذخیره شد.
            ', 
            type: 'bg-success'
        );
    }

    private function handleFileUpload() {

        if(is_null($this->profile_image)) {
            return null;
        }

        // Remove exsting profile image
        if(
        auth()->user()->userProfile
        && auth()->user()->userProfile->userProfileInformation
        && auth()->user()->userProfile->userProfileInformation->profile_image
        ) {
            unlink(auth()->user()->userProfile->userProfileInformation->profile_image);
        }
        
        $userId = auth()->user()->id;
        $dir = 'storage/upload/profile-images/' . $userId;

        $unique_image_name = hexdec(uniqid());
        $filename = $unique_image_name . '.' . 'jpg';

        $img = Image::make($this->profile_image)->resize(200, null, function ($constraint) {
            $constraint->aspectRatio();
        })->encode('jpg');
        
        Storage::disk('public')->put('upload/profile-images/' . $userId . '/' . $filename, $img);

        return $dir . '/' . $filename;
    }

    public function render()
    {
        return view('frontend.pages.profile.profile-pages.profile-settings.component.con-grp7.index');
    }
}
