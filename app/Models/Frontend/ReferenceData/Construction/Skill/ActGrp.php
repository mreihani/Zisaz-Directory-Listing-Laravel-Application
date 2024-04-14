<?php

namespace App\Models\Frontend\ReferenceData\Construction\Skill;

use App\Models\Profile\ActCat;
use Illuminate\Database\Eloquent\Model;
use App\Models\Profile\Resume\ResumeField;
use App\Models\Frontend\UserModels\Activity\Activity;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
