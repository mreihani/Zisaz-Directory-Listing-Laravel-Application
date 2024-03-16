<?php

namespace App\Livewire\Dashboards\Users\Admin\Pages\AccountSettings\Account;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Profile\ShopActGrp;
use Illuminate\Validation\Validator;
use Stevebauman\Purify\Facades\Purify;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class Index extends Component
{

    use WithFileUploads;

    public $profileImage;

    protected function rules()
    {
        return 
        [
            'profileImage' => 'required',
        ];
	}

    protected function messages() {
        return
        [
            'profileImage.required' => 'لطفا تصویر پروفایل خود را بارگذاری نمایید.',
        ];
    }

    public function mount() {
        $this->profileImage = (auth()->user()->userProfile
        && auth()->user()->userProfile->userProfileInformation
        && auth()->user()->userProfile->userProfileInformation->profile_image)
        ? asset(auth()->user()->userProfile->userProfileInformation->profile_image) :
        null;
    }

    public function saveProfile() {

        $this->validate();

        // Get uploaded image address
        $profileImageAddress = $this->handleFileUpload();

        if(!is_null($profileImageAddress)) {
            // Save user profile
            $userProfile = auth()->user()->userProfile()->firstOrCreate([
                'user_id' => auth()->user()->id
            ]);

            $userProfile->userProfileInformation()->updateOrCreate([
                'user_profile_id' => $userProfile->id
            ],[
                'profile_image' => $profileImageAddress,
            ]);
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

    private function handleFileUpload() {

        if(is_string($this->profileImage)) {
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
        
        $img = Image::make($this->profileImage)->resize(200, null, function ($constraint) {
            $constraint->aspectRatio();
        })->encode('jpg');

        Storage::disk('public')->put('upload/profile-images/' . $userId . '/' . $filename, $img);

        return $dir . '/' . $filename;
    }
    
    public function render()
    {
        return view('dashboards.users.admin.pages.account-settings.account.component.index');
    }
}
