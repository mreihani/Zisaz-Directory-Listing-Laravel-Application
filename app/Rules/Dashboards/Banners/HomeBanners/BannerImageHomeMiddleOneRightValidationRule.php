<?php

namespace App\Rules\Dashboards\Banners\HomeBanners;

use Closure;
use App\Models\Frontend\Banners\BannerHomePage;
use Illuminate\Contracts\Validation\ValidationRule;

class BannerImageHomeMiddleOneRightValidationRule implements ValidationRule
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
        $homeMiddleOneRightBanner = BannerHomePage::where('position', 'home_middle_one_right_banner')->first();
        if(!$homeMiddleOneRightBanner && is_null($this->request->banner_image_right)) {
            $fail('لطفا تصویر بنر راست را بارگذاری نمایید.');
        } 
    }
}
