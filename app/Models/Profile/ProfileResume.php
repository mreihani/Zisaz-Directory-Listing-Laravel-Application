<?php

namespace App\Models\Profile;

use App\Models\Profile\UserProfile;
use Illuminate\Database\Eloquent\Model;
use App\Models\Profile\Resume\ResumeAcaBg;
use App\Models\Profile\Resume\ResumeField;
use App\Models\Profile\Resume\ResumeWorkExps;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProfileResume extends Model
{
    protected $guarded = [];
    public $timestamps = false;

    public function userProfile() {
        return $this->belongsTo(UserProfile::class);
    }

    public function resumeField()
    {
        return $this->hasOne(ResumeField::class, 'profile_resume_id', 'id');
    }

    public function resumeAcaBg()
    {
        return $this->hasOne(ResumeAcaBg::class, 'profile_resume_id', 'id');
    }

    public function resumeWorkExps()
    {
        return $this->hasOne(ResumeWorkExps::class, 'profile_resume_id', 'id');
    }
}
