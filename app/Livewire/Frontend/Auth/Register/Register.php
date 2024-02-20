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
    public $firstname;
    public $lastname;
    public $phone;
    public $email;
    public $terms_and_conditions;
    public $smsVerificationSectionVisible = false;

    protected function rules()
    {
        return 
        [
            'firstname' => 'required',
            'lastname' => 'required',
            'phone' => ['required', new IgnorePhoneRegistrationValidation(), config('phone-regex.ir.regex')],
            'email' => ['email', 'required', new IgnoreEmailRegistrationValidation()],
            'terms_and_conditions' => 'required',
        ];
	}
    
    protected $messages = [
        'firstname.required' => 'لطفا نام خود را وارد نمایید.',
        'lastname.required' => 'لطفا نام خانوادگی خود را وارد نمایید.',
        'email.email' => 'لطفا آدرس ایمیل صحیح وارد نمایید.',
        'email.required' => 'لطفا آدرس ایمیل خود را وارد نمایید.',
        'phone.required' => 'لطفا شماره تلفن همراه خود را وارد نمایید.',
        'phone.regex' => 'لطفا شماره تلفن صحیح وارد نمایید.',
        'terms_and_conditions.required' => 'لطفا برای ادامه شرایط و ضوابط سامانه جابان را تأیید نمایید.',
    ];

    public function registerUser() {

        // Validate user input
        $this->validate();
       
        // Show SMS verification input section after user clicks on submit
        $this->smsVerificationSectionVisible = true;

        // Create user after successful validation
        $user = User::create([
            'firstname' => Purify::clean($this->firstname),
            'lastname' => Purify::clean($this->lastname),
            'phone' => Purify::clean($this->phone),
            'email' => Purify::clean($this->email),
        ]);

        // Generate code and send via SMS
        $code = ActiveCode::generateCode($user);
        $user->notify(new SmsVerification($code, $user->phone));

        // Save user_id in session
        session()->put('user_id_for_registration_verification', $user->id);
    }

    public function render()
    {
        return view('frontend.layouts.header.auth-modals.register.register');
    }
}
