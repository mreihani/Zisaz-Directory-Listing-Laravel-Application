<?php

namespace App\Rules\Profile;

use Closure;
use App\Models\User;
use Illuminate\Contracts\Validation\ValidationRule;

class IgnorePhoneChangeValidation implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if(User::where($attribute, $value)->where('phone_verified', 1)->exists() && auth()->user()->phone != $value) {
            $fail('شماره تلفن مورد نظر قبلا در سامانه ثبت شده است. لطفا شماره دیگری وارد نمایید.');
        } elseif(User::where($attribute, $value)->where('phone_verified', 1)->exists() && auth()->user()->phone == $value) {
            $fail('این شماره قبلا ثبت شده است. لطفا شماره تلفن دیگری وارد نمایید.');
        }
    }
}
