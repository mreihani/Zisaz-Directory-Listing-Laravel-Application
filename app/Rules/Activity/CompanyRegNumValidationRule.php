<?php

namespace App\Rules\Activity;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class CompanyRegNumValidationRule implements ValidationRule
{
    public $resumeGoal;
    public $companyRegNum;
    
    public function __construct($resumeGoal, $companyRegNum) {
        $this->resumeGoal = $resumeGoal;
        $this->companyRegNum = $companyRegNum;
    }

    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if(($this->resumeGoal != "") && ($this->resumeGoal == 3) && ($this->companyRegNum == "")) {
            $fail('لطفا شماره ثبت شرکت را وارد نمایید!');
        }

        if(($this->resumeGoal != "") && ($this->resumeGoal == 5) && ($this->companyRegNum == "")) {
            $fail('لطفا شماره مجوز آزمایشگاه را وارد نمایید!');
        }
    }
}
