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
            'url' => $this->incoming['url'] ?? null,
            'device' => $this->incoming['device'] ?? null,
            'platform' => $this->incoming['platform'] ?? null,
            'browser' => $this->incoming['browser'] ?? null,
            'ip' => $ip ?? null,
            'user_id' => $this->incoming['user_id'] ?? null,
            'country' => $location->countryName ?? null,
            'city' => $location->cityName ?? null,
            'province' => $location->regionName ?? null,
            'country_code' => $location->countryCode ?? null,
        ];

        Visit::create($data);
    }
}
