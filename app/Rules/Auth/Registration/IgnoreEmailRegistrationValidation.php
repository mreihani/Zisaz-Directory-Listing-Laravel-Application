<?php

namespace App\Rules\Auth\Registration;

use Closure;
use App\Models\User;
use Illuminate\Contracts\Validation\ValidationRule;

class IgnoreEmailRegistrationValidation implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if(User::where($attribute, $value)->where('phone_verified', 1)->exists()) {
            $fail('ایمیل مورد نظر قبلا در سامانه ثبت شده است. لطفا ایمیل دیگری وارد نمایید.');
        }
    }
}
