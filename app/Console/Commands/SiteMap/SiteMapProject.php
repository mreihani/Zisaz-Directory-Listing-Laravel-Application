<?php

namespace App\Console\Commands\SiteMap;

use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use App\Models\Frontend\UserModels\Project\Project;

class SiteMapProject extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:site-map-project';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate site map for projects';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $sitemap = Sitemap::create();

        Project::all()->each(function (Project $projectItem) use ($sitemap) {
            $sitemap->add(Url::create("https://zisaz.ir/project-item/{$projectItem->slug}"));
        });

        $sitemap->writeToFile(public_path('/sitemap/sitemap_projects.xml'));
    }
}
