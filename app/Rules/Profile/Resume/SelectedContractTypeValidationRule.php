<?php

namespace App\Rules\Profile\Resume;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class SelectedContractTypeValidationRule implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if(!in_array(true, $value)) {
            $fail('لطفا نوع قرارداد را مشخص نمایید.');
        }
    }
}
