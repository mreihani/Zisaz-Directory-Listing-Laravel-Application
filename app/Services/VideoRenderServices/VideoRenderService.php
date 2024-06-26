<?php

namespace App\Services\VideoRenderServices;

use File;
use Illuminate\Http\UploadedFile;
use App\Jobs\Media\ConvertMediaVideo;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use App\Jobs\Media\CreateImageThumbnailMediaVideo;

class VideoRenderService {
    public $video;
    public $dir;
    public $mediaId;

    public function __construct($video, $dir, $mediaId) {
        $this->video = $video;
        $this->dir = $dir;
        $this->mediaId = $mediaId;
    }

    // large image rendreing
    public function resizeVideo($width, $height) {

        if(is_null($this->video)) {
            return;
        }

        $filename = hexdec(uniqid());
        $dir = 'upload/' . $this->dir . '/' . $filename . '.' . 'mp4';
        
        // store temporary video
        $this->video->storeAs('public/upload/' . $this->dir, $filename . '_temp.' . $this->video->getClientOriginalExtension());
        $tempPath = 'upload/' . $this->dir . '/' . $filename . '_temp.' . $this->video->getClientOriginalExtension();
        
        //dispatch a job to convert video by FFmpeg
        $videoJob = dispatch(new ConvertMediaVideo([
            'tempPath' => $tempPath,
            'dir' => $dir,
            'mediaId' => $this->mediaId,
            'width' => $width,
            'height' => $height,
        ]));
        
        return [
            'file_path' => 'storage/upload/' . $this->dir . '/' . $filename . '.' . 'mp4',
            'temp_path' => 'storage/upload/' . $this->dir . '/' . $filename . '_temp' . '.' . 'mp4',
            'video_conversion_temp_path' => $tempPath
        ];
    }

    public function generateVideoThumbnail($tempPath) {

        if(is_null($this->video)) {
            return;
        }

        $filename = hexdec(uniqid()) . '.' . 'png';
        $dir = 'upload/' . $this->dir . '/' . $filename;

        //dispatch a job to convert video by FFmpeg
        dispatch(new CreateImageThumbnailMediaVideo([
            'tempPath' => $tempPath,
            'dir' => $dir,
            'mediaId' => $this->mediaId,
        ]));
        
        return 'storage/upload/' . $this->dir . '/' . $filename;
    }
}