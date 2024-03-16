<?php

namespace App\Models\Profile\ProfileInfo;

use App\Models\Profile\ProfileInfo;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProfileInfoCompany extends Model
{
    protected $guarded = [];

    public function profileInfo() {
        return $this->belongsTo(ProfileInfo::class);
    }
}
