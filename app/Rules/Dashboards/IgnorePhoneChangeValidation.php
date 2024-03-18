<?php

namespace App\Rules\Dashboards;

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
        if(User::where($attribute, $value)->exists()) {
            $fail('شماره تلفن مورد نظر قبلا در سامانه ثبت شده است. لطفا شماره دیگری وارد نمایید.');
        } 
    }
}
