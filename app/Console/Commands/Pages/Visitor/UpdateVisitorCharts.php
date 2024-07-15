<?php

namespace App\Console\Commands\Pages\Visitor;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use App\Models\Frontend\UserModels\Project\Project;
use App\Jobs\VisitorLogging\VisitorLoggingChartIranVisits;
use App\Jobs\VisitorLogging\VisitorLoggingChartGlobalVisits;
use App\Jobs\VisitorLogging\VisitorLoggingChartIranUniqueVisits;
use App\Jobs\VisitorLogging\VisitorLoggingChartGlobalUniqueVisits;

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
        dispatch(new VisitorLoggingChartIranVisits());
        dispatch(new VisitorLoggingChartIranUniqueVisits());
        dispatch(new VisitorLoggingChartGlobalVisits());
        dispatch(new VisitorLoggingChartGlobalUniqueVisits());
    }
}
