<?php

namespace App\Rules\Profile\Resume;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class SelectedCityIdValidationRule implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $selectedCityIdArray = collect($value)->flatten()->toArray();
        
        if(in_array('', $selectedCityIdArray)) {
            $fail('لطفا شهر را انتخاب نمایید.');
        }
    }
}
