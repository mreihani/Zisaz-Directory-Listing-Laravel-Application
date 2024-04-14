<?php

namespace App\Rules\Activity;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class SelectedInvestmentProvinceValidationRule implements ValidationRule
{
    public $selectedInvestmentProvinceId;
    public $adsType;
    public $investmentAdsType;

    public function __construct($selectedInvestmentProvinceId, $adsType, $investmentAdsType) {
        $this->selectedInvestmentProvinceId = $selectedInvestmentProvinceId;
        $this->adsType = $adsType;
        $this->investmentAdsType = $investmentAdsType;
    }

    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if(($this->adsType == "investment") && ($this->selectedInvestmentProvinceId == "") && ($this->investmentAdsType == "invested")) {
            $fail('لطفا استان را انتخاب کنید!');
        }
    }
}
