<?php

namespace App\Livewire\Dashboards\Users\Admin\Pages\AccountSettings\Security\TwoFactorAuth\Component;

use Livewire\Component;
use App\Models\ActiveCode;
use Illuminate\Validation\Validator;
use App\Notifications\Auth\SmsVerification;
use App\Rules\Dashboards\IgnorePhoneChangeValidation;

class ChangePhone extends Component
{
    public $confirmationCode;
    public $phone;

    public function mount() {
        $this->confirmationCode = false;
        $this->phone = auth()->user()->phone;
    }

    protected function rules()
    {
        return 
        [
            'phone' => ['required', new IgnorePhoneChangeValidation(), config('phone-regex.ir.regex')],
        ];
	}

    protected $messages = [
        'phone.required' => 'لطفا شماره تلفن همراه خود را وارد نمایید.',
        'phone.regex' => 'لطفا شماره تلفن صحیح وارد نمایید.',
    ];

    public function changePhone() {

        // Validate user input
        $this->validate();

        // Show SMS verification input section after user clicks on submit
        $this->dispatch('confirmationCode', confirmationCode: true);

        // Get current user
        $user = auth()->user();

        // Generate code and send via SMS
        $code = ActiveCode::generateCode($user);
        $user->notify(new SmsVerification($code, $this->phone));

        // Save phone number in session
        session()->put('phone_number_for_change', $this->phone);
    }

    public function render()
    {
        return view('dashboards.users.admin.pages.account-settings.security.component.two-factor-auth.component.change-phone');
    }
}
