<?php

namespace App\Rules\Activity;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class AdsDescriptionValidationRule implements ValidationRule
{
    public $adsType;
    public $investmentAdsType;

    public function __construct($adsType, $investmentAdsType) {
        $this->adsType = $adsType;
        $this->investmentAdsType = $investmentAdsType;
    }

    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if(($value == "") && ($this->adsType == "investment") && ($this->investmentAdsType == "invested")) {
            $fail('لطفا شرح آگهی را وارد نمایید.');
        }

        if(($value == "") && ($this->adsType == "bid")) {
            $fail('لطفا شرح آگهی را وارد نمایید.');
        }

        if(($value == "") && ($this->adsType == "inquiry")) {
            $fail('لطفا شرح آگهی را وارد نمایید.');
        }

        if(($value == "") && ($this->adsType == "contractor")) {
            $fail('لطفا شرح آگهی را وارد نمایید.');
        }
    }
}