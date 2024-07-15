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
            'url' => !empty($this->incoming['url']) ? $this->incoming['url'] : null,
            'device' => !empty($this->incoming['device']) ? $this->incoming['device'] : null,
            'platform' => !empty($this->incoming['platform']) ? $this->incoming['platform'] : null,
            'browser' => !empty($this->incoming['browser']) ? $this->incoming['browser'] : null,
            'ip' => !empty($ip) ? $ip : null,
            'user_id' => !empty($this->incoming['user_id']) ? $this->incoming['user_id'] : null,
            'country' => (!empty($location) && !empty($location->countryName)) ? $location->countryName : null,
            'city' => (!empty($location) && !empty($location->cityName)) ? $location->cityName : null,
            'province' => (!empty($location) && !empty($location->regionName)) ? $location->regionName : null,
            'country_code' => (!empty($location) && !empty($location->countryCode)) ? $location->countryCode : null,
            'j_date' => jdate()->format('Y-m-d')
        ];

        Visit::create($data);
    }
}
