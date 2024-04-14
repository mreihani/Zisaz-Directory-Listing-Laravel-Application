<?php

namespace App\Models\Frontend\UserModels\Activity\AdsRegistration;

use Illuminate\Database\Eloquent\Model;
use App\Models\Frontend\UserModels\Activity\Activity;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Investment extends Model
{
    protected $guarded = [];

    public function activity() {
        return $this->belongsTo(Activity::class);
    }
}
