<?php

namespace App\Livewire\Frontend\Pages\Profile\ProfilePages\ProfileSettings;

use Livewire\Component;
use Livewire\WithFileUploads;
use Intervention\Image\Facades\Image;
use Stevebauman\Purify\Facades\Purify;
use Illuminate\Support\Facades\Storage;

class Index extends Component
{
    use WithFileUploads;

    public $profile_image;
    public $activityGroupObj;

    public function mount() {
        $this->profile_image = (
        auth()->user()->userProfile
        && auth()->user()->userProfile->profile_image
        ) ? asset(auth()->user()->userProfile->profile_image) :
        null;
    }

    public function saveProfile() {    
        
        // Get uploaded image address
        $profileImageAddress = $this->handleFileUpload();

        // Save user profile
       $userProfile = auth()->user()->userProfile()->updateOrCreate(
        [
            'user_id' => auth()->user()->id,
        ],[
            'user_id' => auth()->user()->id,
            'profile_image' => $profileImageAddress,
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

        // Remove exsting profile image
        if(
            auth()->user()->userProfile
            && auth()->user()->userProfile->profile_image
            ) {
            unlink(auth()->user()->userProfile->profile_image);
        }

        $userId = auth()->user()->id;
        $dir = 'storage/upload/profile-images/' . $userId;

        $unique_image_name = hexdec(uniqid());
        $filename = $unique_image_name . '.' . 'jpg';

        $img = Image::make($this->profile_image)->fit(200)->encode('jpg');

        Storage::disk('public')->put('upload/profile-images/' . $userId . '/' . $filename, $img);

        return $dir . '/' . $filename;
    }

    public function render()
    {
        return view('frontend.pages.profile.profile-pages.profile-settings.component.index');
    }
}
