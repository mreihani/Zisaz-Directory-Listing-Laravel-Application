<?php

namespace App\Rules\Activity;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class SelectedPaymentMethodValidationRule implements ValidationRule
{
    public $paymentMethod;
    public $adsType;

    public function __construct($paymentMethod, $adsType) {
        $this->paymentMethod = $paymentMethod;
        $this->adsType = $adsType;
    }

    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if($this->adsType == "selling") {
            if(!in_array(true, $value)) {
                $fail('لطفا روش پرداخت کالا را مشخص نمایید.');
            }
        }
    }
}