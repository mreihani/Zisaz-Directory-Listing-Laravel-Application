<?php

namespace App\Rules\Dashboards\Banners\ProjectBanners;

use Closure;
use App\Models\Frontend\Banners\BannerProjectPage;
use Illuminate\Contracts\Validation\ValidationRule;

class BannerImageProjectSliderOneImageOneValidationRule implements ValidationRule
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
        $projectFirstSliderSlideOne = BannerProjectPage::where('position', 'project_first_slider_slide_one')->first();
        if(!$projectFirstSliderSlideOne && is_null($this->request->slider_image_one)) {
            $fail('لطفا تصویر اسلاید اول را بارگذاری نمایید.');
        } 
    }
}
