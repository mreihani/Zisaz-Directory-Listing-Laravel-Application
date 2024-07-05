<?php

namespace App\Rules\Dashboards\User;

use Closure;
use App\Models\User;
use Illuminate\Contracts\Validation\ValidationRule;

class IgnorePhoneRegistrationUserUpdateValidation implements ValidationRule
{
    public $phone;

    public function __construct($phone) {
        $this->phone = $phone;
    }

    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        // ignore users current phone number for validation
        if($this->phone == $value) {
            return;
        }

        if(User::where($attribute, $value)->exists()) {
            $fail('شماره تلفن مورد نظر قبلا در سامانه ثبت شده است. لطفا شماره دیگری وارد نمایید.');
        }
    }
}
