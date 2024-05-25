<?php

namespace App\Rules\PrivateSite\PromotionalVideo;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class PrivateSitePromotionalVideoValidationRule implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */

    public $video;
    public $isHidden;
    public $videoUploaded;

    public function __construct($video, $isHidden, $videoUploaded) {
        $this->video = $video;
        $this->isHidden = $isHidden;
        $this->videoUploaded = $videoUploaded;
    }

    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if(!is_string($this->video) && !$this->isHidden && !$this->videoUploaded) {
            if(!isset($this->video) || $this->video == null) {
                $fail('لطفا فایل ویدئویی را بارگذاری نمایید.');
            }
            if(isset($this->video) && !in_array($this->video->getClientOriginalExtension(), ['flv', 'mp4', 'mkv'])) {
                $fail('لطفا فایل ویدئویی با فرمت مجاز را بارگذاری نمایید.');
            }
            if(isset($this->video) && $this->video->getSize() > 104857600) {
                $fail('حجم فایل ویدئویی بیشتر از مقدار مجاز است.');
            }
        } 
    }
}
