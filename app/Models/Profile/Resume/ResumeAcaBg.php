<?php

namespace App\Models\Profile\Resume;

use App\Models\Profile\UserProfile;
use App\Models\Profile\ProfileResume;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Profile\Resume\ResumeAcaBgItem\ResumeAcaBgItem;

class ResumeAcaBg extends Model
{
    protected $guarded = [];

    public function profileResume() {
        return $this->belongsTo(ProfileResume::class);
    }

    public function academicItems() {
        return $this->hasMany(ResumeAcaBgItem::class, 'resume_aca_bg_id');
    }
}
