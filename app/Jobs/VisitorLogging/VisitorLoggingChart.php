<?php

namespace App\Jobs\VisitorLogging;

use Illuminate\Bus\Queueable;
use App\Models\Dashboards\Admin\Visit;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\Dashboards\Admin\VisitChart;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class VisitorLoggingChart implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $lastday_jdate = trim(jdate()->subDays(1)->format('Y-m-d'));
        $lastday_jdate_db_row = VisitChart::where('visits_date', $lastday_jdate)->first();
        
        // iran visits count
        $iran_visits_count = Visit::select('country', 'j_date')
        ->where('j_date', $lastday_jdate)
        ->where('country', 'Iran')
        ->get()
        ->count();

        // global unique visits count
        $global_unique_visits_count = Visit::select('country', 'j_date', 'ip')
        ->where('j_date', $lastday_jdate)
        ->whereNot('country', 'Iran')
        ->get()
        ->pluck('ip')
        ->unique()
        ->count();
        
        // global visits count
        $global_visits_count = Visit::select('country', 'j_date', 'ip')
        ->where('j_date', $lastday_jdate)
        ->whereNot('country', 'Iran')
        ->get()
        ->count();

        // iran unique visits count
        $iran_unique_visits_count = Visit::select('country', 'j_date', 'ip')
        ->where('j_date', $lastday_jdate)
        ->where('country', 'Iran')
        ->get()
        ->pluck('ip')
        ->unique()
        ->count();

        if(!empty($lastday_jdate_db_row)) {
            $lastday_jdate_db_row->update([
                'iran_visits_count' => $iran_visits_count,
                'global_unique_visits_count' => $global_unique_visits_count,
                'global_visits_count' => $global_visits_count,
                'iran_unique_visits_count' => $iran_unique_visits_count
            ]);
        } else {
            VisitChart::create([
                'visits_date' => $lastday_jdate,
                'iran_visits_count' => $iran_visits_count, 
                'global_unique_visits_count' => $global_unique_visits_count,
                'global_visits_count' => $global_visits_count,
                'iran_unique_visits_count' => $iran_unique_visits_count
            ]);
        }
    }
}
