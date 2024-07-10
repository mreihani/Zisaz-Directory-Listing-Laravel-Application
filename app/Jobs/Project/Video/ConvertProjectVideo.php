<?php

namespace App\Jobs\Project\Video;

use File;
use FFMpeg\Format\Video\X264;
use Illuminate\Bus\Queueable;
use FFMpeg\Coordinate\Dimension;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Log;
use FFMpeg\Filters\Video\VideoFilters;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use ProtoneMedia\LaravelFFMpeg\Support\FFMpeg;
use App\Models\Frontend\UserModels\Project\Project;
use App\Models\Frontend\UserModels\PrivateSite\Psite;
use ProtoneMedia\LaravelFFMpeg\Filters\WatermarkFactory;

class ConvertProjectVideo implements ShouldQueue
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
        
        $video = $this->createObjectFromAbsolutePath($this->incoming['path']);
        
        $lowBitrate = (new X264)->setKiloBitrate(250);
        $highBitrate = (new X264)->setKiloBitrate(1000);

        FFMpeg::fromDisk('public')
        ->open($video)
        ->addWatermark(function(WatermarkFactory $watermark) {
        $watermark->fromDisk('public')
            ->open('upload/zsaz_watermark_sm.png')
            ->right(25)
            ->bottom(25);
        })
        ->addFilter(function (VideoFilters $filters) {
            $filters->resize(new Dimension(1280, 720));
        })
        ->export()
        ->toDisk('public')
        ->inFormat($lowBitrate)
        ->save($this->incoming['dir']);
    }

    // create an object form file absolute path
    private function createObjectFromAbsolutePath($path) {
        $name = File::name( $path );
        $extension = File::extension( $path );
        $originalName = $name . '.' . $extension;
        $mimeType = File::mimeType( $path );
        $size = File::size( $path );
        $error = false;
        $test = false;

        $file = new UploadedFile( $path, $originalName, $mimeType, $size, $error, $test );

        return $file;
    }

    private function setJobIdIntoVideoSection($jobId) {
        $projectId = $this->incoming['projectId'];
        $projectVideo = Project::queryWithAllVerificationStatuses()->findOrFail($projectId)->projectVideo;

        $projectVideo->update([
            'video_job_id' => $jobId
        ]);
    }
}
