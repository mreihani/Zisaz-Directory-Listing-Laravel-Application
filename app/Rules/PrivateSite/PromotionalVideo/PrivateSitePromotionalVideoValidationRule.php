<?php

namespace App\Rules\PrivateSite\PromotionalVideo;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use App\Models\Frontend\UserModels\PrivateSite\Psite;

class PrivateSitePromotionalVideoValidationRule implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */

    public $video;
    public $isHidden;
    public $privateSiteId;

    public function __construct($video, $isHidden, $privateSiteId) {
        $this->video = $video;
        $this->isHidden = $isHidden;
        $this->privateSiteId = $privateSiteId;
    }

    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        // video has already been uploaded
        $psite = Psite::findOrFail($this->privateSiteId);
        if(!is_null($psite->promotionalVideo) && !is_null($psite->promotionalVideo->video)) {
            return;
        }

        // video is being uploaded for the first time
        if(is_null($this->video) && !$this->isHidden) {
            if(!isset($this->video) || $this->video == null) {
                $fail('لطفا فایل ویدئویی را بارگذاری نمایید.');
            }
            if(isset($this->video) && !in_array(strtolower($this->video->getClientOriginalExtension()), ['flv', 'mp4', 'mkv'])) {
                $fail('لطفا فایل ویدئویی با فرمت مجاز را بارگذاری نمایید.');
            }
            if(isset($this->video) && $this->video->getSize() > 104857600) {
                $fail('حجم فایل ویدئویی بیشتر از مقدار مجاز است.');
            }
        } 
    }
}
