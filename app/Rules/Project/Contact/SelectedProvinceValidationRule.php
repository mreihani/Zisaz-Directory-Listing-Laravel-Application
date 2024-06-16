<?php

namespace App\Rules\Project\Contact;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class SelectedProvinceValidationRule implements ValidationRule
{
    public $selectedProvinceId;

    public function __construct($selectedProvinceId) {
        $this->selectedProvinceId = $selectedProvinceId;
    }

    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if($this->selectedProvinceId == "") {
            $fail('لطفا استان را انتخاب کنید!');
        }
    }
}
