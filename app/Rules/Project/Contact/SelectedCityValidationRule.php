<?php

namespace App\Rules\Project\Contact;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class SelectedCityValidationRule implements ValidationRule
{
    public $selectedCityId;

    public function __construct($selectedCityId) {
        $this->selectedCityId = $selectedCityId;
    }

    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if($this->selectedCityId == "") {
            $fail('لطفا شهر را انتخاب کنید!');
        }
    }
}
