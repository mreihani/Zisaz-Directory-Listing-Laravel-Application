<?php

namespace App\Rules\PrivateSite\Hero;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class PrivateSiteSliderImagesValidationRule implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */

    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if(!is_string($value)) {
            if(!isset($value)) {
                $fail('لطفا تصویر را بارگذاری نمایید.');
            }
            if(isset($value) && !in_array($value->getClientOriginalExtension(), ['jpg', 'jpeg', 'png', 'bmp'])) {
                $fail('لطفا تصویر با فرمت مجاز را بارگذاری نمایید.');
            }
            if(isset($value) && $value->getSize() > 4194304) {
                $fail('حجم تصویر بیشتر از مقدار مجاز است.');
            }
        } 
    }
}
