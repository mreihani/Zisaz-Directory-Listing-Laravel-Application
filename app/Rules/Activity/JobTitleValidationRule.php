<?php

namespace App\Rules\Activity;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class JobTitleValidationRule implements ValidationRule
{
    public $adsType;
    public $resumeGoal;
    public $jobTitle;
    
    public function __construct($adsType, $resumeGoal, $jobTitle) {
        $this->adsType = $adsType;
        $this->resumeGoal = $resumeGoal;
        $this->jobTitle = $jobTitle;
    }

    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if(($this->resumeGoal == "selling") && ($this->resumeGoal == 1) && ($this->jobTitle == "")) {
            $fail('لطفا عنوان شغل خود را وارد نمایید!');
        }
    }
}
