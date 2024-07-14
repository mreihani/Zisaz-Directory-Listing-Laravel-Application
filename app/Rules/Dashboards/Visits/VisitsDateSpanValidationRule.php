<?php

namespace App\Rules\Dashboards\Visits;

use Closure;
use App\Models\User;
use Morilog\Jalali\Jalalian;
use Illuminate\Contracts\Validation\ValidationRule;

class VisitsDateSpanValidationRule implements ValidationRule
{
    public $startDate;
    public $endDate;

    public function __construct($startDate, $endDate) {
        $this->startDate = $startDate;
        $this->endDate = $endDate;
    }

    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $startDate = !empty($this->startDate) ? Jalalian::fromFormat('Y-m-d', trim($this->startDate))->toCarbon() : ''; 
        $endDate = !empty($this->endDate) ? Jalalian::fromFormat('Y-m-d', trim($this->endDate))->toCarbon() : ''; 

        if(!empty($startDate) && !empty($endDate) && ($startDate > $endDate)) {
            $fail('بازه تاریخ شروع نمی تواند بعد از تاریخ پایان باشد.');
        }
    }
}
