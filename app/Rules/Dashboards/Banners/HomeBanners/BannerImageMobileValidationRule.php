<?php

namespace App\Rules\Dashboards\Banners\HomeBanners;

use Closure;
use App\Models\Frontend\Banners\BannerHomePage;
use Illuminate\Contracts\Validation\ValidationRule;

class BannerImageMobileValidationRule implements ValidationRule
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
        // mobile banner validation rule
        $homeTopBannerMobile = BannerHomePage::where('position', 'home_top_banner_mobile')->first();
        if(!$homeTopBannerMobile && is_null($this->request->banner_image_mobile)) {
            $fail('لطفا تصویر بنر موبایل را بارگذاری نمایید.');
        } 
    }
}
