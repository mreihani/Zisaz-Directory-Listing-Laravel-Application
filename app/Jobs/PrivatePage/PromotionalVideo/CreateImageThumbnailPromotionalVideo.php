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

class CreateImageThumbnailPromotionalVideo implements ShouldQueue
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

        // save thumbnail
        FFMpeg::fromDisk('public')
        ->open($video)
        ->getFrameFromSeconds(2)
        ->export()
        ->toDisk('public')
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