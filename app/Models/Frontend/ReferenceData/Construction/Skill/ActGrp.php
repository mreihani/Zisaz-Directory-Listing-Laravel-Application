<?php

namespace App\Models\Frontend\ReferenceData\Construction\Skill;

use Illuminate\Database\Eloquent\Model;
use App\Models\Frontend\UserModels\Activity\Activity;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Frontend\ReferenceData\Construction\Skill\ActCat;

class ActGrp extends Model
{
    protected $guarded = [];
    public $timestamps = false;

    public function activityCategory() {
        return $this->belongsTo(ActCat::class, 'act_cat_id', 'id');
    }

    public function activity() {
        return $this->belongsToMany(Activity::class);
    }
}
