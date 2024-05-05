<?php

namespace App\Rules\Dashboards\Banners\HomeBanners;

use Closure;
use App\Models\Frontend\Banners\BannerHomePage;
use Illuminate\Contracts\Validation\ValidationRule;

class BannerImageHomeMiddleOneLeftValidationRule implements ValidationRule
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
        // left side banner validation rule
        $homeMiddleOneLeftBanner = BannerHomePage::where('position', 'home_middle_one_left_banner')->first();
        if(!$homeMiddleOneLeftBanner && is_null($this->request->banner_image_left)) {
            $fail('لطفا تصویر بنر چپ را بارگذاری نمایید.');
        } 
    }
}
