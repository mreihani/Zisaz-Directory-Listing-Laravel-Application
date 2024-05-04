<?php

namespace App\Rules\Dashboards\Banners\HomeBanners;

use Closure;
use App\Models\Frontend\Banners\BannerHomePage;
use Illuminate\Contracts\Validation\ValidationRule;

class BannerImageDesktopValidationRule implements ValidationRule
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
        // desktop banner validation rule
        $homeTopBannerDesktop = BannerHomePage::where('position', 'home_top_banner_desktop')->first();
        if(!$homeTopBannerDesktop && is_null($this->request->banner_image_desktop)) {
            $fail('لطفا تصویر بنر دسکتاپ را بارگذاری نمایید.');
        } 
    }
}
