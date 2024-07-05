<?php

namespace App\Rules\Auth\Login;

use Closure;
use App\Models\User;
use Illuminate\Contracts\Validation\ValidationRule;

class ValidPhoneLoginValidation implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if(!User::where($attribute, $value)->where('role', 'construction')->where('phone_verified', 1)->exists()) {
            $fail('شماره تلفن مورد نظر در سامانه یافت نشد. لطفا شماره دیگری وارد نمایید.');
        }
    }
}
