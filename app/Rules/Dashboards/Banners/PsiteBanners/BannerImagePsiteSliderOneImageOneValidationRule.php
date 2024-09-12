<?php

namespace App\Rules\Dashboards\Banners\PsiteBanners;

use Closure;
use App\Models\Frontend\Banners\BannerPsitePage;
use Illuminate\Contracts\Validation\ValidationRule;

class BannerImagePsiteSliderOneImageOneValidationRule implements ValidationRule
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
        $psiteFirstSliderSlideOne = BannerPsitePage::where('position', 'psite_first_slider_slide_one')->first();
        if(!$psiteFirstSliderSlideOne && is_null($this->request->slider_image_one)) {
            $fail('لطفا تصویر اسلاید اول را بارگذاری نمایید.');
        } 
    }
}
