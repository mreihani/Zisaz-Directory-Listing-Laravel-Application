<?php

namespace App\Rules\Profile\Resume;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class SelectedProvinceIdValidationRule implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $selectedProvinceIdArray = collect($value)->flatten()->toArray();
        
        if(in_array('', $selectedProvinceIdArray)) {
            $fail('لطفا استان و شهر را انتخاب نمایید.');
        }
    }
}
