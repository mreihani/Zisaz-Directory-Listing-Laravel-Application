<?php

namespace App\Livewire\Frontend\Auth\Register;

use App\Models\User;
use Livewire\Component;
use App\Models\ActiveCode;
use Illuminate\Http\Request;
use Stevebauman\Purify\Facades\Purify;
use App\Notifications\Auth\SmsVerification;
use App\Rules\Auth\Registration\IgnoreEmailRegistrationValidation;
use App\Rules\Auth\Registration\IgnorePhoneRegistrationValidation;

class Register extends Component
{
    public $smsVerificationSectionVisible = false;

    protected $listeners = [
        'smsVerificationSectionVisible' => 'smsVerificationSectionVisible'
    ];

    public function smsVerificationSectionVisible($smsVerificationSectionVisible) {
        $this->smsVerificationSectionVisible = true;
    }

    public function render()
    {
        return view('frontend.layouts.header.auth-modals.register.register');
    }
}
