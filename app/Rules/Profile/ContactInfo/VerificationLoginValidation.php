<?php

namespace App\Rules\Profile\ContactInfo;

use Closure;
use App\Models\User;
use App\Models\Frontend\UserModels\ActiveCode;
use Illuminate\Contracts\Validation\ValidationRule;

class VerificationLoginValidation implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $user = auth()->user();
        
        // Check if input code is correct
        $isCodeVerified = ActiveCode::verifyCode($value, $user);

        if(!$isCodeVerified) {
            $fail('لطفا کد اعتبار سنجی صحیح وارد نمایید.');
        }
    }
}
