<?php

namespace App\Models\Frontend\UserModels\PrivateSite\Sections\PsiteContactUs;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Frontend\UserModels\PrivateSite\Sections\PsiteContactUs;

class PsiteContactUsEm extends Model
{
    protected $guarded = [];

    public function contactUs() {
        return $this->belongsTo(PsiteContactUs::class);
    }
}