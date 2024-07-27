<?php

namespace App\Livewire\Frontend\Auth\Login;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Route;
use App\Notifications\Auth\SmsVerification;
use App\Models\Frontend\UserModels\ActiveCode;
use App\Rules\Auth\Login\ValidPhoneLoginValidation;

class Login extends Component
{
    public $phone;
    public $remember;
    public $smsVerificationSectionVisible;
    public $showLoginModel;

    protected function rules()
    {
        return 
        [
            'phone' => ['required', new ValidPhoneLoginValidation(), config('phone-regex.ir.regex')],
        ];
	}
    
    protected $messages = [
        'phone.required' => 'لطفا شماره تلفن همراه خود را وارد نمایید.',
        'phone.regex' => 'لطفا شماره تلفن صحیح وارد نمایید.',
    ];

    public function mount() {
        $this->smsVerificationSectionVisible = false;
      
        // show login modal on login route
        $this->showLoginModel = Route::getCurrentRoute()->uri == "login" ? true : false;
        $this->openLoginModal();
    }

    // show login modal on login route
    private function openLoginModal() {
        if(!auth()->check()) {
                $this->dispatch('showLoginModal', 
                showModal: $this->showLoginModel, 
            ); 
        }
    }

    public function loginUser() {
       
        // Validate user input
        $this->validate();
       
        // Show SMS verification input section after user clicks on submit
        $this->smsVerificationSectionVisible = true;

        // Get user object by phone number
        $user = User::where('phone', $this->phone)->where('phone_verified', 1)->first();

        if(empty($user)) {
            return;
        }

        // Save user_id in session
        session()->put('user_id_for_login_verification', $user->id);

        // Put remememer me boolean
        session()->put('remember_me', $this->remember ? true : false);

        // Generate code and send via SMS
        $code = ActiveCode::generateCode($user);
        $user->notify(new SmsVerification($code, $user->phone));
    }

    public function render()
    {
        return view('frontend.layouts.header.auth-modals.login.login');
    }
}
