<?php

namespace App\Livewire\Dashboards\Auth\Login;

use App\Models\User;
use Livewire\Component;
use App\Models\ActiveCode;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Validator;
use App\Notifications\Auth\SmsVerification;
use App\Rules\Auth\Login\ValidPhonePasswordValidation;

class Index extends Component
{
    public $smsVerificationSectionVisible;
    public $phone;
    public $password;
    public $remember;

    protected function rules()
    {
        return 
        [
            'phone' => ['required', config('phone-regex.ir.regex')],
            'password' => new ValidPhonePasswordValidation($this->password, $this->phone)
        ];
	}
    
    protected $messages = [
        'phone.required' => 'لطفا شماره تلفن همراه خود را وارد نمایید.',
        'phone.regex' => 'لطفا شماره تلفن صحیح وارد نمایید.',
    ];

    public function mount() {
        $this->smsVerificationSectionVisible = false;
        $this->remember = $this->remember ? true : false;
    }

    public function loginUser() {
        // Validate user input
        $this->validate();

        // Get user object by phone number
        $user = User::where('phone', $this->phone)->first();

        if(!$user) {
            return;
        }

        if($user->two_factor_auth) {
            // Show SMS verification input section after user clicks on submit
            $this->smsVerificationSectionVisible = true;

            // Save user_id in session
            session()->put('user_id_for_login_verification', $user->id);

            // Put remememer me boolean
            session()->put('remember_me', $this->remember);

            // Generate code and send via SMS
            $code = ActiveCode::generateCode($user);
            $user->notify(new SmsVerification($code, $user->phone));
        } else {
            // Login User
            auth()->login($user, $this->remember);

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

    public function render()
    {
        return view('dashboards.auth.login.index');
    }
}
