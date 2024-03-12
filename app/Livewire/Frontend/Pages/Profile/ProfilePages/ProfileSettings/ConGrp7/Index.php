<?php

namespace App\Livewire\Frontend\Pages\Profile\ProfilePages\ProfileSettings\ConGrp7;

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
    public $activityGroupObj;
    public $companyName;
    public $companyRegNum;

    protected function rules()
    {
        return 
        [
            'companyName' => 'required',
            'companyRegNum' => 'required',
        ];
	}
    
    protected $messages = [
        'companyName.required' => 'لطفا نام شرکت را وارد نمایید.',
        'companyRegNum.required' => 'لطفا شماره ثبت شرکت را وارد نماید.',
    ];

    public function mount() {
        $this->profile_image = (auth()->user()->userProfile
        && auth()->user()->userProfile->userProfileInformation
        && auth()->user()->userProfile->userProfileInformation->profile_image)
        ? asset(auth()->user()->userProfile->userProfileInformation->profile_image) :
        null;

        $this->typeOfActivityObj = ShopActCat::all();

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
    }

    public function saveProfile() {
        
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
            'company_name' => Purify::clean($this->companyName),
            'company_reg_num' => Purify::clean($this->companyRegNum),
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
        return view('frontend.pages.profile.profile-pages.profile-settings.component.con-grp7.index');
    }
}
