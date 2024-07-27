<?php

namespace App\Jobs\VisitorLogging;

use Illuminate\Bus\Queueable;
use App\Models\Dashboards\Admin\Visit;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\Dashboards\Admin\VisitChart;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class VisitorLoggingChartIranVisits implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $lastday_jdate = jdate()->subDays(1)->format('Y-m-d');
        
        $all_visits_count = Visit::select('country', 'j_date')
        ->where('j_date', $lastday_jdate)
        ->where('country', 'Iran')
        ->get()
        ->count();

        $lastday_jdate_db_row = VisitChart::where('visits_date', $lastday_jdate)->first();

        if(!empty($lastday_jdate_db_row)) {
            $lastday_jdate_db_row->update([
                'iran_visits_count' => $all_visits_count
            ]);
        } else {
            VisitChart::create([
                'visits_date' => $lastday_jdate,
                'iran_visits_count' => $all_visits_count
            ]);
        }
    }
}
