<?php

namespace App\Models\Frontend\ReferenceData\Gender;

use Illuminate\Database\Eloquent\Model;
use App\Models\Frontend\UserModels\Activity\Activity;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Gender extends Model
{
    protected $guarded = [];
    public $timestamps = false;

    public function activity() {
        return $this->belongsToMany(Activity::class);
    }
}
