<?php

namespace App\Livewire\Frontend\Pages\Profile\ProfilePages\ProfileSettings\ConGrp8;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Profile\ShopActCat;
use Intervention\Image\Facades\Image;
use Stevebauman\Purify\Facades\Purify;
use Illuminate\Support\Facades\Storage;

class Index extends Component
{
    use WithFileUploads;

    public $profile_image;
    public $gender;
    public $birth_date;
    public $shop_name;
    public $typeOfActivityObj;
    public $type_of_activity_id;
    public $activityGroupObj;
    public $shop_act_grps_id;

    public function mount() {
        $this->profile_image = (auth()->user()->userProfile
        && auth()->user()->userProfile->userProfileInformation
        && auth()->user()->userProfile->userProfileInformation->profile_image)
        ? asset(auth()->user()->userProfile->userProfileInformation->profile_image) :
        null;
        
        $this->gender = (auth()->user()->userProfile
        && auth()->user()->userProfile->userProfileInformation
        && auth()->user()->userProfile->userProfileInformation->gender)
        ? auth()->user()->userProfile->userProfileInformation->gender : '';   

        $this->birth_date = (auth()->user()->userProfile
        && auth()->user()->userProfile->userProfileInformation
        && auth()->user()->userProfile->userProfileInformation->birth_date)
        ? auth()->user()->userProfile->userProfileInformation->birth_date : '';   

        $this->shop_name = (auth()->user()->userProfile
        && auth()->user()->userProfile->userProfileInformation
        && auth()->user()->userProfile->userProfileInformation->shop_name)
        ? auth()->user()->userProfile->userProfileInformation->shop_name : '';

        $this->typeOfActivityObj = ShopActCat::all();

        $this->type_of_activity_id = (auth()->user()->userProfile
        && auth()->user()->userProfile->userProfileInformation
        && auth()->user()->userProfile->userProfileInformation->shopActivityGroup)
        ? auth()->user()->userProfile->userProfileInformation->shopActivityGroup->shopActivityCategory->id : '';

        $this->activityGroupObj = (auth()->user()->userProfile
        && auth()->user()->userProfile->userProfileInformation
        && auth()->user()->userProfile->userProfileInformation->shopActivityGroup) 
        ? auth()->user()->userProfile->userProfileInformation->shopActivityGroup->shopActivityCategory->shopActivityGroup
        : [];

        $this->shop_act_grps_id = (auth()->user()->userProfile
        && auth()->user()->userProfile->userProfileInformation
        && auth()->user()->userProfile->userProfileInformation->shopActivityGroup)
        ? auth()->user()->userProfile->userProfileInformation->shopActivityGroup->id : '';
    }

    public function loadShopActivityGrpOnChange() {
        $typeOfActivityId = $this->type_of_activity_id;
        $this->activityGroupObj = ShopActCat::find($typeOfActivityId)->shopActivityGroup;
        $this->shop_act_grps_id = $this->activityGroupObj->first()->id;
    }

    protected function rules()
    {
        return 
        [
            'shop_name' => 'required',
            'type_of_activity_id' => 'required',
            'shop_act_grps_id' => 'required',
        ];
	}
    
    protected $messages = [       
        'shop_name.required' => 'لطفا نام فروشگاه خود را تعیین نمایید.',
        'type_of_activity_id.required' => 'لطفا فعالیت صنفی فروشگاه خود را تعیین نمایید.',
        'shop_act_grps_id.required' => 'لطفا زیر دسته فعالیت صنفی فروشگاه خود را تعیین نمایید.',
    ];

    public function saveProfile() {
        
        // Validate user input
        $this->validate();
        
        // Remove exsting profile image
        if(
            auth()->user()->userProfile
            && auth()->user()->userProfile->userProfileInformation
            && auth()->user()->userProfile->userProfileInformation->profile_image
            ) {
            unlink(auth()->user()->userProfile->userProfileInformation->profile_image);
        }
        
        // Get uploaded image address
        $profileImageAddress = $this->handleFileUpload();

        // Save user profile
        $userProfile = auth()->user()->userProfile()->firstOrCreate([
            'user_id' => auth()->user()->id
        ]);

        $userProfile->userProfileInformation()->updateOrCreate([
            'user_profile_id' => $userProfile->id
        ],[
            'profile_image' => $profileImageAddress,
            'shop_name' => Purify::clean($this->shop_name) ?: null,
            'shop_act_grps_id' => Purify::clean($this->shop_act_grps_id) ?: null,
        ]);

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

        $userId = auth()->user()->id;
        $dir = 'storage/upload/profile-images/' . $userId;

        $unique_image_name = hexdec(uniqid());
        $filename = $unique_image_name . '.' . 'jpg';

        $img = Image::make($this->profile_image)->encode('jpg');
        Storage::disk('public')->put('upload/profile-images/' . $userId . '/' . $filename, $img);

        return $dir . '/' . $filename;
    }

    public function render()
    {
        return view('frontend.pages.profile.profile-pages.profile-settings.component.con-grp8.index');
    }
}
