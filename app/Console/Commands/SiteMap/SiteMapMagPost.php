<?php

namespace App\Console\Commands\SiteMap;

use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use App\Models\Frontend\UserModels\Mag\MagPost;

class SiteMapMagPost extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:site-map-mag-post';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate site map for magazine posts';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $sitemap = Sitemap::create('https://zisaz.ir/');

        MagPost::all()->each(function (MagPost $postItem) use ($sitemap) {
            $sitemap->add(Url::create("/mag-item/{$postItem->slug}"));
        });

        $sitemap->writeToFile(public_path('/sitemap/sitemap_magposts.xml'));
    }
}
