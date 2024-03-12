<?php

namespace App\Rules\Profile\ProfileInfo;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class SelectedShopActGrpsIdValidationRule implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if(!in_array(true, $value)) {
            $fail('لطفا صنف فعالیت را مشخص نمایید.');
        }
    }
}
