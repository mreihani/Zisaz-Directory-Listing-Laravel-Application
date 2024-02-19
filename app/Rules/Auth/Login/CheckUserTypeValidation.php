<?php

namespace App\Rules\Auth\Login;

use Closure;
use App\Models\User;
use Illuminate\Contracts\Validation\ValidationRule;

class CheckUserTypeValidation implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $user = User::where($attribute, $value)->first();

        if($user->role == 'user') {
            $fail("کاربر مورد نظر دسترسی لازم را ندارد.");
        }
    }
}
