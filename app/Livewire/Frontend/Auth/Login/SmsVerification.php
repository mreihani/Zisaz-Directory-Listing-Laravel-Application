<?php

namespace App\Livewire\Frontend\Auth\Login;

use App\Models\User;
use Livewire\Component;
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

            if(!empty($user)) {
                // Delete code
                $user->activeCode()->delete();

                // Get remember me boolean
                $remember = false;
                if(session()->has('remember_me')) {
                    $remember = session()->get('remember_me');
                    session()->forget('remember_me');
                } 
                
                // Login User
                auth()->login($user, $remember);

                // Hide model after login
                $this->dispatch('hideModelAfterLogin');

                // Show my account header for authenticated users
                $this->dispatch('showMyAccountHeaderAuth');    

                // show phone number in ads single page
                $this->dispatch('showPhone', 
                    showPhone: true, 
                );
                
                // Show Toaster
                $toasterWelcomeMessage = "
                    ". auth()->user()->firstname ."
                    عزیز، ورود شما با موفقیت انجام شد.
                ";
                $this->dispatch('showToaster', 
                    title: 'خوش آمدید!', 
                    message: $toasterWelcomeMessage, 
                    type: 'bg-success'
                );

                return redirect(route('user.dashboard.profile-settings.index'));
            }
        }
    }

    public function render()
    {
        return view('frontend.layouts.header.auth-modals.login.sms-verification');
    }
}
