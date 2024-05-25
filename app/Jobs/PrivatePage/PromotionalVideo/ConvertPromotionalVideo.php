<?php

namespace App\Jobs\PrivatePage\PromotionalVideo;

use FFMpeg\Format\Video\X264;
use Illuminate\Bus\Queueable;
use FFMpeg\Coordinate\Dimension;
use Illuminate\Support\Facades\Log;
use FFMpeg\Filters\Video\VideoFilters;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use ProtoneMedia\LaravelFFMpeg\Support\FFMpeg;
use ProtoneMedia\LaravelFFMpeg\Filters\WatermarkFactory;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;
use File;

class ConvertPromotionalVideo implements ShouldQueue
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
        $video = $this->createObjectFromAbsolutePath($this->incoming['path']);
        
        $lowBitrate = (new X264)->setKiloBitrate(250);
        $highBitrate = (new X264)->setKiloBitrate(1000);

        FFMpeg::fromDisk('public')
        ->open($video)
        ->addWatermark(function(WatermarkFactory $watermark) {
        $watermark->fromDisk('public')
            ->open('upload/private-website-resources/zsaz_watermark_sm.png')
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
}
