<?php

namespace App\Rules\Project\Video;

use Closure;
use App\Models\Frontend\UserModels\Project\Project;
use Illuminate\Contracts\Validation\ValidationRule;
use App\Models\Frontend\UserModels\PrivateSite\Psite;

class ProjectVideoValidationRule implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */

    public $video;
    public $projectId;

    public function __construct($video, $projectId) {
        $this->video = $video;
        $this->projectId = $projectId;
    }

    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        // video has already been uploaded
        // $project = Project::findOrFail($this->projectId);
        // if(!is_null($project->projectVideo) && !is_null($project->projectVideo->video)) {
        //     return;
        // }

        // video is being uploaded for the first time
        if(!is_null($this->video)) {
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
