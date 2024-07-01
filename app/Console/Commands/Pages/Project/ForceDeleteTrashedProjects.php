<?php

namespace App\Console\Commands\Pages\Project;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use App\Models\Frontend\UserModels\Project\Project;

class forceDeleteTrashedProjects extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:force-delete-trashed-projects';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'It simply forde-deletes all project items after specific time passed';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $trashedProjects = Project::onlyTrashed()->where('updated_at', '<', now()->subMonth(6))->get();
        if($trashedProjects->count()) {
            $trashedProjects->each(function($trashedProjectItem) {
                $trashedProjectItem->forceDelete();
                Storage::deleteDirectory("public/upload/project-resources/$trashedProjectItem->id");
            });
        }
    }
}
