<?php

namespace App\Rules\Activity;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class WorkExpValidationRule implements ValidationRule
{
    public $workExp;
    public $adsType;
    
    public function __construct($workExp, $adsType) {
        $this->workExp = $workExp;
        $this->adsType = $adsType;
    }

    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if(($this->workExp == "") && ($this->adsType == "employment")) {
            $fail('لطفا سابقه کار را مشخص نمایید!');
        }
    }
}
