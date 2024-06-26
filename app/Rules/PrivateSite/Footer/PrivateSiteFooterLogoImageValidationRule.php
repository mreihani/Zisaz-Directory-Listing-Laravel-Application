<?php

namespace App\Rules\PrivateSite\Footer;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class PrivateSiteFooterLogoImageValidationRule implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */

    public $logo;

    public function __construct($logo) {
        $this->logo = $logo;
    }

    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if(!is_string($this->logo)) {
            if(!isset($this->logo) || $this->logo == null) {
                $fail('لطفا تصویر را بارگذاری نمایید.');
            }
            if(isset($this->logo) && !in_array(strtolower($this->logo->getClientOriginalExtension()), ['jpg', 'jpeg', 'png', 'bmp'])) {
                $fail('لطفا تصویر با فرمت مجاز را بارگذاری نمایید.');
            }
            if(isset($this->logo) && $this->logo->getSize() > 4194304) {
                $fail('حجم تصویر بیشتر از مقدار مجاز است.');
            }
        } 
    }
}
