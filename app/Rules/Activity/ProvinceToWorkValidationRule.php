<?php

namespace App\Rules\Activity;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class ProvinceToWorkValidationRule implements ValidationRule
{
    public $adsType;
    public $employmentAdsType;

    public function __construct($adsType, $employmentAdsType) {
        $this->adsType = $adsType;
        $this->employmentAdsType = $employmentAdsType;
    }

    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if(($this->adsType == "employment") && ($this->employmentAdsType == "employer")) {
            if(!in_array(true, $value)) {
                $fail('لطفا استان هایی که متقاضی کار می تواند در آنجا مشغول به کار شود را تعیین نمایید.');
            }
        }

        if(($this->adsType == "contractor")) {
            if(!in_array(true, $value)) {
                $fail('لطفا استان هایی که پیمانکار می تواند در آن جا فعالیت کند را تعیین نمایید.');
            }
        }
    }
}