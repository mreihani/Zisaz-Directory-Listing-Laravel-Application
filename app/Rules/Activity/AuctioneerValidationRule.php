<?php

namespace App\Rules\Activity;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class AuctioneerValidationRule implements ValidationRule
{
    public $auctioneer;
    public $adsType;
    public $bidAdsType;
    public $tenderAdsType;
    
    public function __construct($auctioneer, $adsType, $bidAdsType, $tenderAdsType) {
        $this->auctioneer = $auctioneer;
        $this->adsType = $adsType;
        $this->bidAdsType = $bidAdsType;
        $this->tenderAdsType = $tenderAdsType;
    }

    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if(($this->auctioneer == "") && ($this->adsType == "bid") && ($this->bidAdsType == "auction")) {
            $fail('لطفا مزایده گذار را مشخص نمایید!');
        }

        if(($this->auctioneer == "") && ($this->adsType == "bid") && ($this->bidAdsType == "tender")) {
            $fail('لطفا مناقصه گذار را مشخص نمایید!');
        }
    }
}
