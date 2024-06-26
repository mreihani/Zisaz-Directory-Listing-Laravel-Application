<?php

namespace App\Rules\Dashboards\Media;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class MediaStoreValidationRule implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */

    public $file;    

    public function __construct($file) {
        $this->file = $file;
    }

    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        // check input
        if(!isset($this->file) || is_null($this->file)) {
            $fail('لطفا فایل را بارگذاری نمایید.');
            return;
        }

        if(!in_array(strtolower($this->file->getClientOriginalExtension()), ['jpg', 'jpeg', 'png', 'bmp', 'flv', 'mp4', 'mkv'])) {
            $fail('لطفا فایل با پسوند مجاز را بارگذاری نمایید.');
            return;
        }
      
        // first check if file is image then impelment file validation logic
        if(in_array(strtolower($this->file->getClientOriginalExtension()), ['jpg', 'jpeg', 'png', 'bmp'])) {
            if(isset($this->file) && $this->file->getSize() > 4194304) {
                $fail('حجم تصویر بیشتر از مقدار مجاز است.');
            }
        }

        // video is being uploaded for the first time
        if(in_array(strtolower($this->file->getClientOriginalExtension()), ['flv', 'mp4', 'mkv'])) {
            if(isset($this->file) && $this->file->getSize() > 104857600) {
                $fail('حجم فایل ویدئویی بیشتر از مقدار مجاز است.');
            }
        } 
    }
}
