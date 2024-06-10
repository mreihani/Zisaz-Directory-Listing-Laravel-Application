<?php

namespace App\Rules\Activity;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class SelectedActGrpsIdValidationRule implements ValidationRule
{
    public $adsType;

    public function __construct($adsType) {
        $this->adsType = $adsType;
    }

    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if($this->adsType == "employment" || $this->adsType == "bid" || $this->adsType == "inquiry" || $this->adsType == "contractor") {
            if(!in_array(true, $value)) {
                $fail('لطفا زمینه فعالیت را مشخص نمایید.');
            }
        }
    }
}