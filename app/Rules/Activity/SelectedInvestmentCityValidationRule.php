<?php

namespace App\Rules\Activity;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class SelectedInvestmentCityValidationRule implements ValidationRule
{
    public $selectedInvestmentCityId;
    public $adsType;
    public $investmentAdsType;

    public function __construct($selectedInvestmentCityId, $adsType, $investmentAdsType) {
        $this->selectedInvestmentCityId = $selectedInvestmentCityId;
        $this->adsType = $adsType;
        $this->investmentAdsType = $investmentAdsType;
    }

    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if(($this->adsType != "") && ($this->selectedInvestmentCityId == "") && ($this->investmentAdsType == "invested")) {
            $fail('لطفا شهر را انتخاب کنید!');
        }
    }
}
