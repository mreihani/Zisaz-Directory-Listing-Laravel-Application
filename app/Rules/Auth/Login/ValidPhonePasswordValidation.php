<?php

namespace App\Rules\Auth\Login;

use Closure;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Contracts\Validation\ValidationRule;

class ValidPhonePasswordValidation implements ValidationRule
{
    public $password;
    public $phone;

    public function __construct($password, $phone) {
        $this->password = $password;
        $this->phone = $phone;
    }

    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        // Get user object by phone number
        $user = User::where('phone', trim($this->phone))->first();
        
        if(!$user || is_null($user->role)) {
            $fail('مجددا سعی نمایید.');
        }
       
        if(is_null($this->password) || $this->password == '') {
            $fail('کلمه عبور خود را وارد نمایید.');
        } elseif(!in_array($user->role, collect(config('jaban.admin_roles'))->pluck('title')->toArray())) {
            $fail('فقط مدیر اجازه دسترسی به این بخش را دارد.');
        } elseif (is_null($user) || !Hash::check($this->password, $user->password)) {
            $fail('شماره تلفن یا کلمه عبور نادرست است.');
        }
    }
}

