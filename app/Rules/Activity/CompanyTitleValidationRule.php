<?php

namespace App\Rules\Activity;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class CompanyTitleValidationRule implements ValidationRule
{
    public $resumeGoal;
    public $companyTitle;
    
    public function __construct($resumeGoal, $companyTitle) {
        $this->resumeGoal = $resumeGoal;
        $this->companyTitle = $companyTitle;
    }

    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if(($this->resumeGoal != "") && ($this->resumeGoal == 3) && ($this->companyTitle == "")) {
            $fail('لطفا نام شرکت را وارد نمایید!');
        }

        if(($this->resumeGoal != "") && ($this->resumeGoal == 4) && ($this->companyTitle == "")) {
            $fail('لطفا نام دفتر مهندسی را وارد نمایید!');
        }

        if(($this->resumeGoal != "") && ($this->resumeGoal == 5) && ($this->companyTitle == "")) {
            $fail('لطفا نام آزمایشگاه را وارد نمایید!');
        }

        if(($this->resumeGoal != "") && ($this->resumeGoal == 6) && ($this->companyTitle == "")) {
            $fail('لطفا نام کارخانه / کارگاه را وارد نمایید!');
        }
    }
}
