<?php

namespace App\Rules\Activity;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class AdsTitleValidationRule implements ValidationRule
{
    public $adsTitle;
    public $adsType;
    
    public function __construct($adsTitle, $adsType) {
        $this->adsTitle = $adsTitle;
        $this->adsType = $adsType;
    }

    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if(($this->adsTitle == "") && ($this->adsType == "selling")) {
            $fail('لطفا عنوان آگهی را وارد نمایید!');
        }

        if(($this->adsTitle == "") && ($this->adsType == "employment")) {
            $fail('لطفا عنوان آگهی را وارد نمایید!');
        }

        if(($this->adsTitle == "") && ($this->adsType == "investment")) {
            $fail('لطفا عنوان آگهی را وارد نمایید!');
        }

        if(($this->adsTitle == "") && ($this->adsType == "bid")) {
            $fail('لطفا عنوان آگهی را وارد نمایید!');
        }

        if(($this->adsTitle == "") && ($this->adsType == "inquiry")) {
            $fail('لطفا عنوان آگهی را وارد نمایید!');
        }

        if(($this->adsTitle == "") && ($this->adsType == "contractor")) {
            $fail('لطفا عنوان آگهی را وارد نمایید!');
        }
    }
}
