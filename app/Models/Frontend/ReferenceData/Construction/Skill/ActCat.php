<?php

namespace App\Models\Frontend\ReferenceData\Construction\Skill;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Frontend\ReferenceData\Construction\Skill\ActGrp;

class ActCat extends Model
{
    protected $guarded = [];
    public $timestamps = false;

    public function activityGroup()
    {
        return $this->hasMany(ActGrp::class, 'act_cat_id', 'id');
    }
}
