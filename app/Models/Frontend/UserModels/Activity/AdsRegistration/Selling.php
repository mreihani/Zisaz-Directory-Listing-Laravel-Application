<?php

namespace App\Models\Frontend\UserModels\Activity\AdsRegistration;

use Illuminate\Database\Eloquent\Model;
use App\Models\Frontend\UserModels\Activity\Activity;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Frontend\ReferenceData\ProvinceAndCity\City;

class Selling extends Model
{
    protected $guarded = [];

    public function activity() {
        return $this->belongsTo(Activity::class);
    }

    public function city() {
        return $this->belongsTo(City::class);
    }
}
