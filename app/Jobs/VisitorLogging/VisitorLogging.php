<?php

namespace App\Jobs\VisitorLogging;

use Illuminate\Bus\Queueable;
use App\Models\Dashboards\Admin\Visit;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class VisitorLogging implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $incoming;

    /**
     * Create a new job instance.
     */
    public function __construct($incoming)
    {
        $this->incoming = $incoming;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $ip = $this->incoming['ip'];

        $location = \Location::get($ip) ?: null;

        $data = [
            'url' => $this->incoming['url'],
            'device' => $this->incoming['device'],
            'platform' => $this->incoming['platform'],
            'browser' => $this->incoming['browser'],
            'ip' => $ip,
            'user_id' => $this->incoming['user_id'],
            'country' => (!is_null($location) && $location->countryName) ? $location->countryName : null,
            'city' => (!is_null($location) && $location->cityName) ? $location->cityName : null,
            'province' => (!is_null($location) && $location->regionName) ? $location->regionName : null,
            'country_code' => (!is_null($location) && $location->countryCode) ? $location->countryCode : null,
        ];

        Visit::create($data);
    }
}
