<?php

namespace App\Livewire\Frontend\Pages\Profile\ProfilePages\ProfileSettings\ConGrp2;

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
    public $gender;
    public $birth_date;

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

        $this->typeOfActivityObj = ShopActCat::all();
    }

    protected function rules()
    {
        return 
        [
            'gender' => 'required',
        ];
	}
    
    protected $messages = [
        'gender.required' => 'لطفا جنسیت را تعیین نماید.',
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
            'gender' => Purify::clean($this->gender),
            'birth_date' => Purify::clean($this->birth_date),
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
        return view('frontend.pages.profile.profile-pages.profile-settings.component.con-grp2.index');
    }
}
