<?php

namespace App\Rules\Activity;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class AgreeToTermsValidationRule implements ValidationRule
{
    public $agreeToTerms;
    public $adsType;

    public function __construct($agreeToTerms, $adsType) {
        $this->agreeToTerms = $agreeToTerms;
        $this->adsType = $adsType;
    }

    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if($this->adsType == "selling" || $this->adsType == "employment" || $this->adsType == "investment") {
            if(!$value) {
                $fail('لطفا قوانین و مقررات را تأیید نمایید.');
            }
        }
    }
}