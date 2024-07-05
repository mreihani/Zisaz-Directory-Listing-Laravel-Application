<?php

namespace App\Rules\Dashboards\User;

use Closure;
use App\Models\User;
use Illuminate\Contracts\Validation\ValidationRule;

class IgnoreEmailRegistrationUserStoreValidation implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        // since email is optional, validation can be ignored for empty email
        if(empty($value)) {
            return;
        }

        // check if a user is inserting a valid email address 
        if(!filter_var($value, FILTER_VALIDATE_EMAIL)) {
            $fail('لطفا یک آدرس ایمیل معتبر وارد کنید.');
            return;
        }

        if(User::where($attribute, $value)->first()) {
            $fail('ایمیل مورد نظر قبلا در سامانه ثبت شده است. لطفا ایمیل دیگری وارد نمایید.');
        }
    }
}
