<?php

namespace App\Livewire\Dashboards\Users\Admin\Pages\AccountSettings\Security\Password;

use Livewire\Component;
use App\Models\Profile\ShopActGrp;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Validator;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use App\Rules\Dashboards\MatchOldPassword;

class Index extends Component
{
    public $currentPassword;
    public $password;
    public $password_confirmation;

    protected function rules()
    {
        return 
        [
            'currentPassword' => ['required', new MatchOldPassword()],
            'password' => ['required', 'confirmed', 'min:8', 'max:20'],
        ];
	}

    protected function messages() {
        return
        [
            'currentPassword.required' => 'لطفا کلمه عبور فعلی خود را وارد نمایید.',
            'password.required' => 'لطفا کلمه عبور جدید را وارد نمایید.',
            'password.confirmed' => 'لطفا تکرار کلمه عبور را به درستی وارد نمایید.',
            'password.min' => 'کلمه عبور باید حداقل 8 کاراکتر باشد.',
            'password.max' => 'کلمه عبور باید حداکثر 20 کاراکتر باشد.',
        ];
    }

    public function save() {

        $this->validate();

        auth()->user()->update([
            'password' => Hash::make($this->password)
        ]);

        // Show Toaster
        $this->dispatch('showToaster', 
            title: '', 
            message: '
                کلمه عبور با موفقیت تغییر یافت.
            ', 
            type: 'bg-success'
        );
    }

    public function render()
    {
        return view('dashboards.users.admin.pages.account-settings.security.component.password.index');
    }
}
