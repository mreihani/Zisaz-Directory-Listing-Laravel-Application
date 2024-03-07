<?php

namespace App\Models\Profile\Resume;

use App\Models\Profile\UserProfile;
use App\Models\Profile\ProfileResume;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ResumeWorkExps extends Model
{
    protected $guarded = [];

    public function profileResume() {
        return $this->belongsTo(ProfileResume::class);
    }
}
