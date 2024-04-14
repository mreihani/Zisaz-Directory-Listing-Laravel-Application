<?php

namespace App\Livewire\Dashboards\Users\Admin\Pages\AccountSettings\Security\TwoFactorAuth\Component;

use App\Models\User;
use Livewire\Component;
use Illuminate\Http\Request;
use Stevebauman\Purify\Facades\Purify;
use App\Rules\Profile\ContactInfo\VerificationLoginValidation;

class TwoFactorAuth extends Component
{
    public $twoFactorAuth;
   
    public function mount() {
        $this->twoFactorAuth = auth()->user()->two_factor_auth == 1 ? true : false;
    }

    public function save() {
        auth()->user()->update([
            'two_factor_auth' => $this->twoFactorAuth ? 1 : 0
        ]);

        // Show Toaster
        $this->dispatch('showToaster', 
            title: '', 
            message: '
                تنظیمات با موفقیت ذخیره شد.
                ', 
            type: 'bg-success'
        );
    }

    public function render()
    {
        return view('dashboards.users.admin.pages.account-settings.security.component.two-factor-auth.component.two-factor-auth');
    }
}
