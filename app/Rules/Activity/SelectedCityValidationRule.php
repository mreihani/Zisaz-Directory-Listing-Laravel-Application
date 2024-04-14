<?php

namespace App\Rules\Activity;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class SelectedCityValidationRule implements ValidationRule
{
    public $resumeGoal;
    public $selectedCityId;
    public $adsType;
    public $employmentAdsType;

    public function __construct($resumeGoal, $selectedCityId, $adsType, $employmentAdsType) {
        $this->resumeGoal = $resumeGoal;
        $this->selectedCityId = $selectedCityId;
        $this->adsType = $adsType;
        $this->employmentAdsType = $employmentAdsType;
    }

    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if(($this->resumeGoal != "") && ($this->selectedCityId == "")) {
            $fail('لطفا شهر را انتخاب کنید!');
        }

        if(($this->adsType != "") && ($this->selectedCityId == "") && ($this->employmentAdsType != "employer")) {
            $fail('لطفا شهر را انتخاب کنید!');
        }
    }
}
