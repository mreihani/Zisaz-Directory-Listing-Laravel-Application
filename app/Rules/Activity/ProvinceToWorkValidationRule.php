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
                $fail('لطفا استان های که متقاضی کار می تواند در آنجا مشغول به کار شود را تعیین نمایید.');
            }
        }
    }
}