<?php

namespace App\Rules\Profile\License;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class LicenseImageValidationRule implements ValidationRule
{
    public $licenseItem;

    public function __construct($licenseItem) {
        $this->licenseItem = $licenseItem;
    }

    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if((is_null($this->licenseItem->license_image) || $this->licenseItem->license_image == "") && $value == null) {
            $fail('لطفا تصویر مجوز را بارگذاری نمایید!');
        } 
    }
}
