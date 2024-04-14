<?php

namespace App\Rules\Activity;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class ReturnTimeValidationRule implements ValidationRule
{
    public $adsType;
    public $returnTime;
    
    public function __construct($adsType, $returnTime) {
        $this->adsType = $adsType;
        $this->returnTime = $returnTime;
    }

    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if(($this->returnTime == "") && ($this->adsType == "investment")) {
            $fail('لطفا مدت سرمایه گذاری را مشخص نمایید!');
        }
    }
}
