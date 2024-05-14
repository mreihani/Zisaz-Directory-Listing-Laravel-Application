<?php

namespace App\Rules\Activity;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class SelectedProvinceValidationRule implements ValidationRule
{
    public $resumeGoal;
    public $selectedProvinceId;
    public $adsType;
    public $employmentAdsType;

    public function __construct($resumeGoal, $selectedProvinceId, $adsType, $employmentAdsType) {
        $this->resumeGoal = $resumeGoal;
        $this->selectedProvinceId = $selectedProvinceId;
        $this->adsType = $adsType;
        $this->employmentAdsType = $employmentAdsType;
    }

    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if(($this->resumeGoal != "") && ($this->selectedProvinceId == "") && ($this->adsType != "contractor")) {
            $fail('لطفا استان را انتخاب کنید!');
        }

        if(($this->adsType != "") && ($this->selectedProvinceId == "") && ($this->employmentAdsType != "employer") && ($this->adsType != "contractor")) {
            $fail('لطفا استان را انتخاب کنید!');
        }
    }
}
