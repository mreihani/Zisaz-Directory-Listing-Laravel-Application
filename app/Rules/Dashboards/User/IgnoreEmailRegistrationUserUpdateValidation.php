<?php

namespace App\Rules\Dashboards\User;

use Closure;
use App\Models\User;
use Illuminate\Contracts\Validation\ValidationRule;

class IgnoreEmailRegistrationUserUpdateValidation implements ValidationRule
{
    public $email;

    public function __construct($email) {
        $this->email = $email;
    }

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

        // ignore users current email address for validation
        if($this->email == $value) {
            return;
        }

        // check if a user is inserting a valid email address 
        if(!filter_var($value, FILTER_VALIDATE_EMAIL)) {
            $fail('لطفا یک آدرس ایمیل معتبر وارد کنید.');
            return;
        }

        // ignore construction users whom have not verified their phone number yet
        $user = User::where($attribute, $value)->first();
        if(!$user || ($user->role == 'construction' && !$user->phone_verified)) {
            return;
        }
        
        $fail('ایمیل مورد نظر قبلا در سامانه ثبت شده است. لطفا ایمیل دیگری وارد نمایید.');
        return;
    }
}
