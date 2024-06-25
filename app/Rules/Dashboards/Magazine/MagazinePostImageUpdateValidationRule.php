<?php

namespace App\Rules\Dashboards\Magazine;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class MagazinePostImageUpdateValidationRule implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */

    public $image;    
    public $magPostImage;    

    public function __construct($image, $magPostImage) {
        $this->image = $image;
        $this->magPostImage = $magPostImage;
    }

    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if(is_null($this->image) && file_exists($this->magPostImage)) {
            return;
        }
        
        if(!isset($this->image)) {
            $fail('لطفا تصویر را بارگذاری نمایید.');
        }

        if(isset($this->image) && !in_array($this->image->getClientOriginalExtension(), ['jpg', 'jpeg', 'png', 'bmp'])) {
            $fail('لطفا تصویر با فرمت مجاز را بارگذاری نمایید.');
        }
        
        if(isset($this->image) && $this->image->getSize() > 4194304) {
            $fail('حجم تصویر بیشتر از مقدار مجاز است.');
        }
    }
}
