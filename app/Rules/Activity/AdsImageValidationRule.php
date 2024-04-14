<?php

namespace App\Rules\Activity;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class AdsImageValidationRule implements ValidationRule
{
    public $adsImage;
    public $adsType;
    
    public function __construct($adsImage, $adsType) {
        $this->adsImage = $adsImage;
        $this->adsType = $adsType;
    }

    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if((empty($this->adsImage)) && ($this->adsType == "selling")) {
            $fail('لطفا تصویر آگهی را وارد نمایید!');
        }
    }
}
