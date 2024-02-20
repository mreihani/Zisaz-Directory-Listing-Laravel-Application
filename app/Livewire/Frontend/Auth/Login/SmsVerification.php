<?php

namespace App\Livewire\Frontend\Auth\Login;

use App\Models\User;
use Livewire\Component;
use App\Models\ActiveCode;
use Illuminate\Http\Request;
use App\Rules\Auth\Login\VerificationCodeLoginValidation;


class SmsVerification extends Component
{
    public $verification_code_login;

    protected function rules()
    {
        return 
        [
            'verification_code_login' => ['required','digits:5', new VerificationCodeLoginValidation()],
        ];
	}

    protected $messages = [
        'verification_code_login.required' => 'لطفا کد اعتبار سنجی پیامک شده را وارد نمایید.',
        'verification_code_login.digits' => 'لطفا کد اعتبار سنجی صحیح را وارد نمایید.',
    ];

    public function loginUserVerificationCode() {

        // Validate user input
        $this->validate();

        // Check if session user_id_for_login_verification exsits
        if(session()->has('user_id_for_login_verification')) {

            // Get session data
            $user_id = session()->get('user_id_for_login_verification');

            // Delete session
            session()->forget('user_id_for_login_verification');

            // Find user
            $user = User::findOrFail($user_id);

            if(!is_null($user) && $user) {
                // Delete code
                $user->activeCode()->delete();

                // Login User
                auth()->login($user);

                // Hide model after login
                $this->dispatch('hideModelAfterLogin');

                // Show my account header for authenticated users
                $this->dispatch('showMyAccountHeaderAuth');           
            }
        }
    }

    public function render()
    {
        return view('frontend.layouts.header.auth-modals.login.sms-verification');
    }
}
