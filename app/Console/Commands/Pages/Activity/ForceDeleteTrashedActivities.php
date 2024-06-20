<?php

namespace App\Console\Commands\Pages\Activity;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use App\Models\Frontend\UserModels\ActiveCode;
use App\Models\Frontend\UserModels\Activity\Activity;

class ForceDeleteTrashedActivities extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:force-delete-trashed-activities';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'It simply forde-deletes all activity items after specific time passed';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $trashedActivities = Activity::onlyTrashed()->where('updated_at', '<', now()->subMonth(6))->get();
        if($trashedActivities->count()) {
            $trashedActivities->each(function($trashedActivityItem) {
                $trashedActivityItem->forcedelete();
                Storage::deleteDirectory("public/upload/ads-images/$trashedActivityItem->id");
                Storage::deleteDirectory("private/activity/$trashedActivityItem->id");
            });
        }
    }
}
