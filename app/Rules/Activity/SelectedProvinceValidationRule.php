<?php

namespace App\Rules\Activity;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class SelectedProvinceValidationRule implements ValidationRule
{
    public $selectedProvinceId;
    public $adsType;
    public $employmentAdsType;

    public function __construct($selectedProvinceId, $adsType, $employmentAdsType) {
        $this->selectedProvinceId = $selectedProvinceId;
        $this->adsType = $adsType;
        $this->employmentAdsType = $employmentAdsType;
    }

    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if(($this->adsType != "") && ($this->selectedProvinceId == "") && ($this->employmentAdsType != "employer") && ($this->adsType != "contractor")) {
            $fail('لطفا استان را انتخاب کنید!');
        }
    }
}
