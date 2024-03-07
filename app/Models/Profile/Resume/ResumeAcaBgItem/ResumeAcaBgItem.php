<?php

namespace App\Models\Profile\Resume\ResumeAcaBgItem;

use App\Models\Profile\UserProfile;
use App\Models\Profile\ProfileResume;
use Illuminate\Database\Eloquent\Model;
use App\Models\Profile\Resume\ResumeAcaBg;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ResumeAcaBgItem extends Model
{
    protected $guarded = [];

    public function resumeAcademicBcg() {
        return $this->belongsTo(ResumeAcaBg::class, 'resume_aca_bg_id');
    }
}
