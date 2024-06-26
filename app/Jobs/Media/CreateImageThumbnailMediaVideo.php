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

class CreateImageThumbnailMediaVideo implements ShouldQueue
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

        $tempPath = ($this->incoming['tempPath']);

        // save thumbnail
        FFMpeg::fromDisk('public')
        ->open($tempPath)
        ->getFrameFromSeconds(2)
        ->export()
        ->toDisk('public')
        ->save($this->incoming['dir']);
    }

    private function setJobIdIntoVideoSection($jobId) {
        $videoFileObject = Media::findOrFail($this->incoming['mediaId']);

        $videoFileObject->update([
            'thumbnail_job_id' => $jobId
        ]);
    }
}
