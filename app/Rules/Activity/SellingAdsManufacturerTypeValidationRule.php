<?php

namespace App\Rules\Activity;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class SellingAdsManufacturerTypeValidationRule implements ValidationRule
{
    public $sellingAdsManufacturereType;
    public $adsType;
    
    public function __construct($sellingAdsManufacturereType, $adsType) {
        $this->sellingAdsManufacturereType = $sellingAdsManufacturereType;
        $this->adsType = $adsType;
    }

    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if(($this->sellingAdsManufacturereType == "") && ($this->adsType == "selling")) {
            $fail('لطفا تولید کننده کالا را مشخص نمایید!');
        }
    }
}
