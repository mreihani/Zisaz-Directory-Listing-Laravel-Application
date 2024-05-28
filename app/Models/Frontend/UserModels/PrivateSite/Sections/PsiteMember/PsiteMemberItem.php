<?php

namespace App\Models\Frontend\UserModels\PrivateSite\Sections\PsiteMember;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Frontend\UserModels\PrivateSite\Sections\PsiteMember;

class PsiteMemberItem extends Model
{
    protected $guarded = [];

    public function member() {
        return $this->belongsTo(PsiteMember::class);
    }
}
