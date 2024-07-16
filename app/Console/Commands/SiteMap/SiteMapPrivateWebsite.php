<?php

namespace App\Console\Commands\SiteMap;

use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use App\Models\Frontend\UserModels\PrivateSite\Psite;

class SiteMapPrivateWebsite extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:site-map-private-website';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate site map for private websites';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $sitemap = Sitemap::create('https://zisaz.ir/');

        Psite::all()->each(function (Psite $psiteItem) use ($sitemap) {
            $sitemap->add(Url::create("/portal/{$psiteItem->slug}"));
        });

        $sitemap->writeToFile(public_path('/sitemap/sitemap_psites.xml'));
    }
}
