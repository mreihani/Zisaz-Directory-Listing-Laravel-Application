<?php

namespace App\Rules\Activity;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class SelectedCityValidationRule implements ValidationRule
{
    public $selectedCityId;
    public $adsType;
    public $employmentAdsType;

    public function __construct($selectedCityId, $adsType, $employmentAdsType) {
        $this->selectedCityId = $selectedCityId;
        $this->adsType = $adsType;
        $this->employmentAdsType = $employmentAdsType;
    }

    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if(($this->adsType != "") && ($this->selectedCityId == "") && ($this->employmentAdsType != "employer") && ($this->adsType != "contractor")) {
            $fail('لطفا شهر را انتخاب کنید!');
        }
    }
}
