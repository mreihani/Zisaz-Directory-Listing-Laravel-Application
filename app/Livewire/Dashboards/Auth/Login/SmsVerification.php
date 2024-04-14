<?php

namespace App\Livewire\Dashboards\Auth\Login;

use App\Models\User;
use Livewire\Component;
use Illuminate\Http\Request;
use Stevebauman\Purify\Facades\Purify;
use App\Rules\Auth\Login\VerificationCodeLoginValidation;
use App\Rules\Profile\ContactInfo\VerificationLoginValidation;


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

                // Get remember me boolean
                $remember = false;
                if(session()->has('remember_me')) {
                    $remember = session()->get('remember_me');
                    session()->forget('remember_me');
                } 
                
                // Login User
                auth()->login($user, $remember);

                // Show Toaster
                    $toasterTitle = "
                    خوش آمدید!
                ";
                $toasterMessage = "
                    ". auth()->user()->firstname ."
                    عزیز، ورود شما با موفقیت انجام شد.
                ";
                session()->flash('flash_message', 'success' . '|' . $toasterTitle . '|' . $toasterMessage);

                // Redirect to admin dashboard
                redirect(route('admin.dashboard.index'));
            }
        }
    }

    public function render()
    {
        return view('dashboards.auth.login.sms-verification');
    }
}
