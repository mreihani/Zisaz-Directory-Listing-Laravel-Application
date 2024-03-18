<?php

namespace App\Livewire\Dashboards\Users\Admin\Pages\AccountSettings\Security\TwoFactorAuth;

use Livewire\Component;
use Illuminate\Validation\Validator;

class Index extends Component
{
    public $confirmationCode;

    public function mount() {
        $this->confirmationCode = false;
    }

    protected $listeners = [
        'confirmationCode' => 'confirmationCode'
    ];

    public function confirmationCode($confirmationCode) {
        $this->confirmationCode = $confirmationCode;
    }
    
    public function render()
    {
        return view('dashboards.users.admin.pages.account-settings.security.component.two-factor-auth.index');
    }
}
