<?php

namespace App\Rules\Activity;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class AdsImagesValidationRule implements ValidationRule
{
    public $adsImages;
    public $adsType;
    
    public function __construct($adsImages, $adsType) {
        $this->adsImages = $adsImages;
        $this->adsType = $adsType;
    }

    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if((empty($this->adsImages)) && ($this->adsType == "selling")) {
            $fail('لطفا تصویر آگهی را وارد نمایید!');
        }
    }
}
