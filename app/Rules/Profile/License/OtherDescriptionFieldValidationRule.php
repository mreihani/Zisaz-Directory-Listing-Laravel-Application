<?php

namespace App\Rules\Profile\License;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class OtherDescriptionFieldValidationRule implements ValidationRule
{
    public $licenseTypeValue;

    public function __construct($licenseTypeValue) {
        $this->licenseTypeValue = $licenseTypeValue;
    }

    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if($this->licenseTypeValue == "other" && ($value == "" || $value == null)) {
            $fail('لطفا توضیحات خود را وارد کنید!');
        }
    }
}
