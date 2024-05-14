<?php

namespace App\Rules\Activity;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class InquirerValidationRule implements ValidationRule
{
    public $inquirer;
    public $adsType;
    
    public function __construct($inquirer, $adsType) {
        $this->inquirer = $inquirer;
        $this->adsType = $adsType;
    }

    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if(($this->inquirer == "") && ($this->adsType == "inquiry")) {
            $fail('لطفا استعلام کننده را مشخص نمایید!');
        }
    }
}
