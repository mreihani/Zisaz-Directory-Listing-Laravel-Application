<?php

namespace App\Models\Frontend\UserModels\PrivateSite\Sections\PsiteHero;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Frontend\UserModels\PrivateSite\Sections\PsiteHero;

class PsiteHeroSlider extends Model
{
    protected $guarded = [];

    public function psiteHero() {
        return $this->belongsTo(PsiteHero::class);
    }
}
