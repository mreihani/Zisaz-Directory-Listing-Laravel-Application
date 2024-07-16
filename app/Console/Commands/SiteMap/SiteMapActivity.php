<?php

namespace App\Console\Commands\SiteMap;

use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use App\Models\Frontend\UserModels\Activity\Activity;


class SiteMapActivity extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:site-map-activity';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate site map for activities';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $sitemap = Sitemap::create();

        Activity::all()->each(function (Activity $activityItem) use ($sitemap) {
            $sitemap->add(Url::create("/activity-item/{$activityItem->slug}"));
        });

        $sitemap->writeToFile(public_path('/sitemap/sitemap_activities.xml'));
    }
}
