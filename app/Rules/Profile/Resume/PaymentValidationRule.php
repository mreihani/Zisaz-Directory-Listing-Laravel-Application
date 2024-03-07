<?php

namespace App\Rules\Profile\Resume;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class PaymentValidationRule implements ValidationRule
{
    public $paymentAmountTo;
    public $paymentAmountFrom;

    public function __construct($paymentAmountFrom, $paymentAmountTo) {
        $this->paymentAmountTo = $paymentAmountTo;
        $this->paymentAmountFrom = $paymentAmountFrom;
    }

    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if($this->paymentAmountFrom > $this->paymentAmountTo) {
            $fail('حداکثر حقوق باید از حداقل بیشتر باشد!');
        }
    }
}
