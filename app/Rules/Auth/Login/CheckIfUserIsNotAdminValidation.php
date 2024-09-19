<?php

namespace App\Rules\Auth\Login;

use Closure;
use App\Models\User;
use App\Models\Frontend\UserModels\ActiveCode;
use Illuminate\Contracts\Validation\ValidationRule;

class CheckIfUserIsNotAdminValidation implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $user = User::where($attribute, $value)->first();

        if(empty($user)) {
            return;
        }

        if(!in_array($user->role, collect(config('jaban.user_roles'))->pluck('title')->toArray())) {
            $fail("کاربر مورد نظر دسترسی لازم را ندارد.");
        }
    }
}
