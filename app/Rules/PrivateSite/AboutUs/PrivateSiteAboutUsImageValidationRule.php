<?php

namespace App\Rules\PrivateSite\AboutUs;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class PrivateSiteAboutUsImageValidationRule implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */

    public $image;

    public function __construct($image) {
        $this->image = $image;
    }

    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if(!is_string($this->image)) {
            if(!isset($this->image) || $this->image == null) {
                $fail('لطفا تصویر را بارگذاری نمایید.');
            }
            if(isset($this->image) && !in_array($this->image->getClientOriginalExtension(), ['jpg', 'jpeg', 'png', 'bmp'])) {
                $fail('لطفا تصویر با فرمت مجاز را بارگذاری نمایید.');
            }
            if(isset($this->image) && $this->image->getSize() > 4194304) {
                $fail('حجم تصویر بیشتر از مقدار مجاز است.');
            }
        } 
    }
}
