<?php

namespace App\Models\Frontend\UserModels\Activity\Resume;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use App\Models\Frontend\UserModels\Activity\Activity;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Resume extends Model
{
    protected $guarded = [];

    public function activity() {
        return $this->belongsTo(Activity::class);
    }
}
