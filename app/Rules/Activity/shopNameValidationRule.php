<?php

namespace App\Rules\Activity;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class shopNameValidationRule implements ValidationRule
{
    public $resumeGoal;
    public $shopName;
    
    public function __construct($resumeGoal, $shopName) {
        $this->resumeGoal = $resumeGoal;
        $this->shopName = $shopName;
    }

    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if(($this->resumeGoal != "") && ($this->resumeGoal == 2) && ($this->shopName == "")) {
            $fail('لطفا نام فروشگاه را وارد نمایید!');
        }
    }
}
