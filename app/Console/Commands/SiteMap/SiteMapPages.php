<?php

namespace App\Console\Commands\SiteMap;

use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use App\Models\Frontend\UserModels\Project\Project;

class SiteMapPages extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:site-map-pages';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate site map for pages';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $sitemap = Sitemap::create()
        ->add(Url::create('https://zisaz.ir/'))
        ->add(Url::create('https://zisaz.ir/faq'))
        ->add(Url::create('https://zisaz.ir/support'))
        ->add(Url::create('https://zisaz.ir/about-us'))
        ->add(Url::create('https://zisaz.ir/contact-us'));

        $sitemap->writeToFile(public_path('/sitemap/sitemap_pages.xml'));
    }
}
