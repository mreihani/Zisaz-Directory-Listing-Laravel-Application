<?php

namespace App\Rules\Activity;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class JobTitleValidationRule implements ValidationRule
{
    public $section;
    public $resumeGoal;
    public $jobTitle;
    
    public function __construct($section, $resumeGoal, $jobTitle) {
        $this->section = $section;
        $this->resumeGoal = $resumeGoal;
        $this->jobTitle = $jobTitle;
    }

    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if(($this->section == "resume") && ($this->resumeGoal == 1) && ($this->jobTitle == "")) {
            $fail('لطفا عنوان شغل خود را وارد نمایید!');
        }
    }
}