<?php

namespace App\Rules\PrivateSite\TrustedCustomers;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class PrivateSiteTrustedCustomersImagesValidationRule implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */

    public $isHidden;

    public function __construct($isHidden) {
        $this->isHidden = $isHidden;
    }

    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if(!is_string($value) && !$this->isHidden) {
            if(!isset($value) || $value == null) {
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
