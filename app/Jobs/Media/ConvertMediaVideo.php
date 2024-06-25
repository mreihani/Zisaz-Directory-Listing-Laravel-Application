<?php

namespace App\Jobs\Media;

use File;
use FFMpeg\Format\Video\X264;
use Illuminate\Bus\Queueable;
use FFMpeg\Coordinate\Dimension;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Log;
use App\Models\Dashboards\Admin\Media;
use FFMpeg\Filters\Video\VideoFilters;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use ProtoneMedia\LaravelFFMpeg\Support\FFMpeg;
use ProtoneMedia\LaravelFFMpeg\Filters\WatermarkFactory;

class ConvertMediaVideo implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $incoming;

    /**
     * Create a new job instance.
     */
    public function __construct($incoming)
    {
        $this->incoming = $incoming;
    }
    
    /**
     * Execute the job.
     */
    public function handle(): void
    {
        // set job id into promitional video table
        $this->setJobIdIntoVideoSection($this->job->getJobId());

        $tempraryVideoUrl = ($this->incoming['tempPath']);
        
        $lowBitrate = (new X264)->setKiloBitrate(250);
        $highBitrate = (new X264)->setKiloBitrate(1000);

        FFMpeg::fromDisk('public')
        ->openUrl($tempraryVideoUrl)
        //->open($video)
        ->addWatermark(function(WatermarkFactory $watermark) {
        $watermark->fromDisk('public')
            ->open('upload/zsaz_watermark_sm.png')
            ->right(25)
            ->bottom(25);
        })
        ->addFilter(function (VideoFilters $filters) {
            $filters->resize(new Dimension($this->incoming['width'], $this->incoming['height']));
        })
        ->export()
        ->toDisk('public')
        ->inFormat($lowBitrate)
        ->save($this->incoming['dir']);
    }

    private function setJobIdIntoVideoSection($jobId) {
        $videoFileObject = Media::findOrFail($this->incoming['mediaId']);

        $videoFileObject->update([
            'video_job_id' => $jobId
        ]);
    }
}
