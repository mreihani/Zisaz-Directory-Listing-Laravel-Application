<?php

namespace App\Rules\Auth\Registration;

use Closure;
use App\Models\User;
use App\Models\ActiveCode;
use Illuminate\Contracts\Validation\ValidationRule;

class VerificationCodeRegistrationValidation implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        // Check if session user_id_for_registration_verification exsits
        if(session()->has('user_id_for_registration_verification')) {
            
            // Get session data
            $user_id = session()->get('user_id_for_registration_verification');

            $user = User::findOrFail($user_id);
           
            // Check if input code is correct
            $isCodeVerified = ActiveCode::verifyCode($value, $user);
    
            if(!$isCodeVerified) {
                $fail('لطفا کد اعتبار سنجی صحیح وارد نمایید.');
            }
        } else {
            $fail('لطفا کد اعتبار سنجی صحیح وارد نمایید.');
        }
    }
}
