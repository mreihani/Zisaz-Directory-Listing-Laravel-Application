<?php

namespace App\Rules\Activity;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class GenderValidationRule implements ValidationRule
{
    public $gender;
    public $adsType;
    public $employmentAdsType;
    
    public function __construct($gender, $adsType, $employmentAdsType) {
        $this->gender = $gender;
        $this->adsType = $adsType;
        $this->employmentAdsType = $employmentAdsType;
    }

    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if(($this->gender == "") && ($this->adsType == "employment") && ($this->employmentAdsType == "employee")) {
            $fail('لطفا جنسیت را مشخص نمایید!');
        }
    }
}
