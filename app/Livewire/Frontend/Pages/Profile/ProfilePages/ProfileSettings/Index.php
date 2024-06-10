<?php

namespace App\Livewire\Frontend\Pages\Profile\ProfilePages\ProfileSettings;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Validation\Rule;
use Intervention\Image\Facades\Image;
use Stevebauman\Purify\Facades\Purify;
use Illuminate\Support\Facades\Storage;


class Index extends Component
{
    use WithFileUploads;

    public $profile_image;
    public $email;
    public $username;
    public $bio;

    // social media
    public $instagram;
    public $telegram;
    public $whatsapp;
    public $x;
    public $linkedin;
    public $eitaa;

    protected function rules() {
        return [
            'email' => ['required', 'email', Rule::unique('users')->ignore(auth()->user()->id, 'id')],
            'username' => ['required', 'string', 'regex:/^[A-z0-9\- ]+$/', Rule::unique('users')->ignore(auth()->user()->id, 'id')],
        ];
    }

    protected $messages = [
        'email.required' => 'لطفا ایمیل خود را وارد نمایید!',
        'email.email' => 'لطفا ایمیل صحیح وارد نمایید!',
        'email.unique' => 'ایمیل مورد نظر قبلا در سامانه ثبت شده است. لطفا ایمیل دیگری انتخاب نمایید.',
        'username.required' => 'لطفا نام کاربری خود را وارد نمایید!',
        'username.string' => 'لطفا نام کاربری صحیح وارد نمایید.',
        'username.regex' => 'لطفا نام کاربری را به انگلیسی با حروف لاتین وارد نمایید.',
        'username.unique' => 'نام کاربری مورد نظر قبلا در سامانه ثبت شده است. لطفا عبارت دیگری انتخاب نمایید.',
    ];

    public function mount() {
        $this->profile_image = (
        auth()->user()->userProfile
        && auth()->user()->userProfile->profile_image
        ) ? asset(auth()->user()->userProfile->profile_image) :
        null;

        $this->email = auth()->user()->email;
        $this->username = auth()->user()->username;

        // retrieve ser's biography from db
        $this->bio = (auth()->user()->userProfile
        && auth()->user()->userProfile->bio
        ) ? auth()->user()->userProfile->bio :
        null;

        // retrieve instagram from db
        $this->instagram = (auth()->user()->userProfile
        && auth()->user()->userProfile->instagram
        ) ? auth()->user()->userProfile->instagram :
        null;

        // retrieve telegram from db
        $this->telegram = (auth()->user()->userProfile
        && auth()->user()->userProfile->telegram
        ) ? auth()->user()->userProfile->telegram :
        null;

        // retrieve whatsapp from db
        $this->whatsapp = (auth()->user()->userProfile
        && auth()->user()->userProfile->whatsapp
        ) ? auth()->user()->userProfile->whatsapp :
        null;

        // retrieve x from db
        $this->x = (auth()->user()->userProfile
        && auth()->user()->userProfile->x
        ) ? auth()->user()->userProfile->x :
        null;
        
        // retrieve linkedin from db
        $this->linkedin = (auth()->user()->userProfile
        && auth()->user()->userProfile->linkedin
        ) ? auth()->user()->userProfile->linkedin :
        null;
         
        // retrieve eitaa from db
        $this->eitaa = (auth()->user()->userProfile
        && auth()->user()->userProfile->eitaa
        ) ? auth()->user()->userProfile->eitaa :
        null;
    }

    public function saveProfile() {    

        $this->validate();
        
        // Get uploaded image address
        $profileImageAddress = $this->handleFileUpload();

        auth()->user()->update([
            'email' => Purify::clean(strtolower(trim($this->email))),
            'username' => Purify::clean(strtolower(trim($this->username))),
        ]);

        // Save user profile
        $userProfile = auth()->user()->userProfile()->updateOrCreate(
        [
            'user_id' => auth()->user()->id,
        ],[
            'user_id' => auth()->user()->id,
            'profile_image' => $profileImageAddress,
            'bio' => Purify::clean(trim($this->bio)),
            'instagram' => Purify::clean(strtolower(trim($this->instagram))),
            'telegram' => Purify::clean(strtolower(trim($this->telegram))),
            'whatsapp' => Purify::clean(strtolower(trim($this->whatsapp))),
            'x' => Purify::clean(strtolower(trim($this->x))),
            'linkedin' => Purify::clean(strtolower(trim($this->linkedin))),
            'eitaa' => Purify::clean(strtolower(trim($this->eitaa))),
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
