<?php

namespace App\Livewire\Frontend\Pages\Profile\ProfilePages\ContactInfo\Phone;

use App\Models\User;
use Livewire\Component;
use App\Models\ActiveCode;
use Illuminate\Http\Request;
use Stevebauman\Purify\Facades\Purify;
use App\Rules\Profile\ContactInfo\VerificationLoginValidation;


class SmsVerification extends Component
{
    public $verification_code_login;
   
    protected function rules()
    {
        return 
        [
            'verification_code_login' => ['required','digits:5', new VerificationLoginValidation()],
        ];
	}

    protected $messages = [
        'verification_code_login.required' => 'لطفا کد اعتبار سنجی پیامک شده را وارد نمایید.',
        'verification_code_login.digits' => 'لطفا کد اعتبار سنجی صحیح را وارد نمایید.',
    ];

    public function userVerificationCode() {

        // Validate user input
        $this->validate();

        $user = auth()->user();
    
        // Delete code
        $user->activeCode()->delete();

        // Check if session phone_number_for_change exsits
        if(session()->has('phone_number_for_change')) {

            // Get session data
            $phone = session()->get('phone_number_for_change');

            // Delete session
            session()->forget('phone_number_for_change');

            // Change user phone mumber
            $user->update([
                'phone' => Purify::clean($phone),
            ]);

            // Hide SMS verification input section after user clicks on submit
            $this->dispatch('confirmationCode', confirmationCode: false);

            // Change phone number in header area after user clicks on submit
            $this->dispatch('headerPhone', headerPhone: $phone);

            // Show Toaster
            $this->dispatch('showToaster', 
                title: '', 
                message: '
                    شماره تلفن با موفقیت تغییر یافت.
                ', 
                type: 'bg-success'
            );
        }    
    }

    public function render()
    {
        return view('frontend.pages.profile.profile-pages.contact-info.component.phone.sms-verification');
    }
}
