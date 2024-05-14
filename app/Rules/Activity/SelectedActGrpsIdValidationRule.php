<?php

namespace App\Rules\Activity;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class SelectedActGrpsIdValidationRule implements ValidationRule
{
    public $resumeGoal;
    public $adsType;

    public function __construct($resumeGoal, $adsType) {
        $this->resumeGoal = $resumeGoal;
        $this->adsType = $adsType;
    }

    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if($this->resumeGoal != "" || $this->adsType == "employment" || $this->adsType == "bid" || $this->adsType == "inquiry" || $this->adsType == "contractor") {
            if(!in_array(true, $value)) {
                $fail('لطفا زمینه فعالیت را مشخص نمایید.');
            }
        }
    }
}