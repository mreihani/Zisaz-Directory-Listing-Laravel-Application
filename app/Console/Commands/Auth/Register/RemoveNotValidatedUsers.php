<?php

namespace App\Console\Commands\Auth\Register;

use App\Models\User;
use Illuminate\Console\Command;

class RemoveNotValidatedUsers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:remove-not-validated-users';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Remove users which have not verified their phone number and the token has been expired';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        User::where('phone_verified', 0)->whereHas('activeCode', function ($query) {
            return $query->where('expired_at', '<', now());
        })->delete();
    }
}
