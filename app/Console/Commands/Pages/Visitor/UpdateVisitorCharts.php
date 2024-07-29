<?php

namespace App\Console\Commands\Pages\Visitor;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use App\Jobs\VisitorLogging\VisitorLoggingChart;
use App\Models\Frontend\UserModels\Project\Project;


class UpdateVisitorCharts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:update-visitor-charts';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update all charts related to visit counts';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        dispatch(new VisitorLoggingChart());
    }
}
