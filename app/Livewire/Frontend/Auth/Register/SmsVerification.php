<?php

namespace App\Livewire\Frontend\Auth\Register;

use App\Models\User;
use Livewire\Component;
use App\Models\ActiveCode;
use Illuminate\Http\Request;
use App\Rules\Auth\Registration\VerificationCodeRegistrationValidation;


class SmsVerification extends Component
{
    public $verification_code;

    protected function rules()
    {
        return 
        [
            'verification_code' => ['required','digits:5', new VerificationCodeRegistrationValidation()],
        ];
	}

    protected $messages = [
        'verification_code.required' => 'لطفا کد اعتبار سنجی پیامک شده را وارد نمایید.',
        'verification_code.digits' => 'لطفا کد اعتبار سنجی صحیح را وارد نمایید.',
    ];

    public function registerUserVerificationCode() {

        // Validate user input
        $this->validate();

        // Check if session user_id_for_registration_verification exsits
        if(session()->has('user_id_for_registration_verification')) {
            
            // Get session data
            $user_id = session()->get('user_id_for_registration_verification');

            // Delete session
            session()->forget('user_id_for_registration_verification');

            // Find user
            $user = User::findOrFail($user_id);

            // Delete code
            $user->activeCode()->delete();

            // Set user phone as verified
            $user->update(['phone_verified' => 1]);
    
            // Login User
            auth()->login($user);

            // Hide model after registration
            $this->dispatch('hideModelAfterRegistration');

            // Show my account header for authenticated users
            $this->dispatch('showMyAccountHeaderAuth');
            
        } else {
            auth()->logout();
            return;
        }
    }

    public function render()
    {
        return view('frontend.layouts.header.auth-modals.register.sms-verification');
    }
}
