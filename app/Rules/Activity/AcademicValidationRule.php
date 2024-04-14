<?php

namespace App\Rules\Activity;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class AcademicValidationRule implements ValidationRule
{
    public $academic;
    public $adsType;
    public $employmentAdsType;
    
    public function __construct($academic, $adsType, $employmentAdsType) {
        $this->academic = $academic;
        $this->adsType = $adsType;
        $this->employmentAdsType = $employmentAdsType;
    }

    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if(($this->academic == "") && ($this->adsType == "employment") && ($this->employmentAdsType == "employee")) {
            $fail('لطفا مقطع تحصیلی را مشخص نمایید!');
        }
    }
}
