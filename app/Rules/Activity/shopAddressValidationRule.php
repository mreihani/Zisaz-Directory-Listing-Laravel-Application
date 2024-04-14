<?php

namespace App\Rules\Activity;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class shopAddressValidationRule implements ValidationRule
{
    public $resumeGoal;
    public $address;
    
    public function __construct($resumeGoal, $address) {
        $this->resumeGoal = $resumeGoal;
        $this->address = $address;
    }

    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if(($this->resumeGoal != "") && ($this->resumeGoal == 2) && ($this->address == "")) {
            $fail('لطفا آدرس فروشگاه را وارد نمایید!');
        }

        if(($this->resumeGoal != "") && ($this->resumeGoal == 3) && ($this->address == "")) {
            $fail('لطفا آدرس شرکت ساختمانی را وارد نمایید!');
        }

        if(($this->resumeGoal != "") && ($this->resumeGoal == 4) && ($this->address == "")) {
            $fail('لطفا آدرس دفتر طراحی مهندسی را وارد نمایید!');
        }

        if(($this->resumeGoal != "") && ($this->resumeGoal == 5) && ($this->address == "")) {
            $fail('لطفا آدرس آزمایشگاه مصالح ساختمانی را وارد نمایید!');
        }

        if(($this->resumeGoal != "") && ($this->resumeGoal == 6) && ($this->address == "")) {
            $fail('لطفا آدرس کارخانه / کارگاه را وارد نمایید!');
        }
    }
}
