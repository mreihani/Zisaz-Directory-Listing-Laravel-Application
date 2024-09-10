<?php

namespace App\Rules\PrivateSite\Info;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class PrivateSiteInfoBusinessBannerValidationRule implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */

    public $businessBanner;

    public function __construct($businessBanner) {
        $this->businessBanner = $businessBanner;
    }

    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if(!is_string($this->businessBanner)) {
            if(!isset($this->businessBanner) || $this->businessBanner == null) {
                $fail('لطفا تصویر را بارگذاری نمایید.');
            }
            if(isset($this->businessBanner) && !in_array(strtolower($this->businessBanner->getClientOriginalExtension()), ['jpg', 'jpeg', 'png', 'bmp'])) {
                $fail('لطفا تصویر با فرمت مجاز را بارگذاری نمایید.');
            }
            if(isset($this->businessBanner) && $this->businessBanner->getSize() > 4194304) {
                $fail('حجم تصویر بیشتر از مقدار مجاز است.');
            }
        } 
    }
}
