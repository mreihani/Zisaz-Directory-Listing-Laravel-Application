<?php

namespace App\Rules\Dashboards\Banners\AdsBanners;

use Closure;
use App\Models\Frontend\Banners\BannerAdsPage;
use Illuminate\Contracts\Validation\ValidationRule;

class BannerImageAdsSliderOneImageOneValidationRule implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
    */

    public $request;

    public function __construct($request) {
        $this->request = $request;
    }

    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        // right side banner validation rule
        $adsFirstSliderSlideOne = BannerAdsPage::where('position', 'ads_first_slider_slide_one')->first();
        if(!$adsFirstSliderSlideOne && is_null($this->request->slider_image_one)) {
            $fail('لطفا تصویر اسلاید اول را بارگذاری نمایید.');
        } 
    }
}
