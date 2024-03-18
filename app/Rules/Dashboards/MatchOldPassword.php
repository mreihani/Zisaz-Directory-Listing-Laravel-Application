<?php

namespace App\Rules\Dashboards;

use Closure;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Contracts\Validation\ValidationRule;

class MatchOldPassword implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if(!Hash::check($value, auth()->user()->password)) {
            $fail('کلمه عبور فعلی شما صحیح نیست. لطفا کلمه عبور صحیح را وارد نمایید.');
        }
    }
}
