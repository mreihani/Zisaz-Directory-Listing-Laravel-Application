<?php

namespace App\Livewire\Frontend\Pages\Profile\ProfilePages\ProfileSettings;

use Livewire\Component;
use Livewire\WithFileUploads;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class Index extends Component
{
    use WithFileUploads;

    public $profile_image;
    public $gender;
    public $birth_date;

    public function __construct() {
        $this->profile_image = (auth()->user()->userProfile
        && auth()->user()->userProfile->userProfileInformation
        && auth()->user()->userProfile->userProfileInformation->profile_image)
        ? asset(auth()->user()->userProfile->userProfileInformation->profile_image) :
        // asset('assets/dashboards/assets/img/jaban/user.png');
        null;
        
        $this->gender = (auth()->user()->userProfile
        && auth()->user()->userProfile->userProfileInformation
        && auth()->user()->userProfile->userProfileInformation->gender)
        ? auth()->user()->userProfile->userProfileInformation->gender : '';   

        $this->birth_date = (auth()->user()->userProfile
        && auth()->user()->userProfile->userProfileInformation
        && auth()->user()->userProfile->userProfileInformation->birth_date)
        ? auth()->user()->userProfile->userProfileInformation->birth_date : '';   
    }

    protected function rules()
    {
        return 
        [
            'profile_image' => 'required|image|max:4096',
            'gender' => 'required',
            'birth_date' => 'required',
        ];
	}
    
    protected $messages = [
        'profile_image.required' => 'لطفا تصویر پروفایل خود را بارگذاری نمایید.',
        'profile_image.image' => 'لطفا فایل صحیح برای پروفایل بارگذاری نمایید.',
        'profile_image.max' => 'حداکثر حجم مجاز تصویر پروفایل 4 مگابایت است.',
        'gender.required' => 'لطفا جنسیت را تعیین نماید.',
        'birth_date.required' => 'لطفا تاریخ تولد خود را تعیین نمایید.',
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
            'gender' => $this->gender,
            'birth_date' => $this->birth_date
            // 'shop_name' => 'a',
            // 'shop_act_grps_id' => 1,
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
        return view('frontend.pages.profile.profile-pages.profile-settings.component.index');
    }
}
