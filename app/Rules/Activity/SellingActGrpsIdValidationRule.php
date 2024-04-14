<?php

namespace App\Rules\Activity;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class SellingActGrpsIdValidationRule implements ValidationRule
{
    public $sellingActGrpsId;
    public $adsType;
    
    public function __construct($sellingActGrpsId, $adsType) {
        $this->sellingActGrpsId = $sellingActGrpsId;
        $this->adsType = $adsType;
    }

    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if(($this->sellingActGrpsId == "") && ($this->adsType == "selling")) {
            $fail('لطفا کالا و خدمات فروشگاه را انتخاب نمایید!');
        }
    }
}
