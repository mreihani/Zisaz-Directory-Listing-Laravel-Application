<?php

namespace App\Jobs\VisitorLogging;

use Illuminate\Bus\Queueable;
use App\Models\Dashboards\Admin\Visit;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\Dashboards\Admin\VisitChart;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class VisitorLoggingChartGlobalUniqueVisits implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $lastday_jdate = jdate()->subDays(1)->format('Y-m-d');
        
        $all_visits_count = Visit::select('country', 'j_date', 'ip')
        ->where('j_date', $lastday_jdate)
        ->whereNot('country', 'Iran')
        ->get()
        ->pluck('ip')
        ->unique()
        ->count();

        VisitChart::updateOrCreate(
        [
            'visits_date' => $lastday_jdate
        ]
        ,[
            'global_unique_visits_count' => $all_visits_count
        ]);
    }
}
