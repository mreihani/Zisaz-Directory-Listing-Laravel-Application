<?php

namespace App\Console\Commands\Pages\PrivateWebsite;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use App\Models\Frontend\UserModels\PrivateSite\Psite;

class ForceDeleteTrashedPrivateWebsites extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:force-delete-trashed-private-websites';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'It simply forde-deletes all private website items after specific time passed';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $trashedPrivateWebsites = Psite::onlyTrashed()->where('updated_at', '<', now()->subMonth(6))->get();
        if($trashedPrivateWebsites->count()) {
            $trashedPrivateWebsites->each(function($trashedPrivateWebsiteItem) {
                $trashedPrivateWebsiteItem->forceDelete();
                Storage::deleteDirectory("public/upload/private-website-resources/$trashedPrivateWebsiteItem->id");
            });
        }
    }
}
