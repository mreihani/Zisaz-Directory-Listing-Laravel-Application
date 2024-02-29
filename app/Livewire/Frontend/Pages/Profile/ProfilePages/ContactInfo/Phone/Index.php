<?php

namespace App\Livewire\Frontend\Pages\Profile\ProfilePages\ContactInfo\Phone;

use App\Models\User;
use Livewire\Component;
use App\Models\ActiveCode;
use Illuminate\Validation\Rule;
use Stevebauman\Purify\Facades\Purify;
use App\Notifications\Auth\SmsVerification;
use App\Rules\Profile\IgnorePhoneChangeValidation;

class Index extends Component
{
    public $confirmationCode;
    public $phone;

    public function __construct() {
        $this->confirmationCode = false;
        $this->phone = auth()->user()->phone;
    }

    protected function rules()
    {
        return 
        [
            'phone' => [
                'required', 
                new IgnorePhoneChangeValidation(),
                config('phone-regex.ir.regex'),
            ],
        ];
	}
    
    protected $messages = [
        'phone.required' => 'لطفا شماره تلفن همراه خود را وارد نمایید.',
        'phone.regex' => 'لطفا شماره تلفن صحیح وارد نمایید.',
    ];

    protected $listeners = [
        'confirmationCode' => 'confirmationCode'
    ];

    public function confirmationCode($confirmationCode) {
        $this->confirmationCode = $confirmationCode;
    }
    
    public function changePhone() {

        // Validate user input
        $this->validate();

        // Show SMS verification input section after user clicks on submit
        $this->confirmationCode = true;

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
        return view('frontend.pages.profile.profile-pages.contact-info.component.phone.index');
    }
}
