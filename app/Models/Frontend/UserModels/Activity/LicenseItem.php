<?php

namespace App\Models\Frontend\UserModels\Activity;

use Illuminate\Database\Eloquent\Model;
use App\Models\Frontend\UserModels\Activity\Activity;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Frontend\UserModels\Activity\Resume\Resume;

class LicenseItem extends Model
{
    protected $guarded = [];

    public function activity() {
        return $this->belongsTo(Activity::class);
    }
}
