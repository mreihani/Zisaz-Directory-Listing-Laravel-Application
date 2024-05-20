<?php

namespace App\Models\Frontend\UserModels\PrivateSite\Sections;

use Illuminate\Database\Eloquent\Model;
use App\Models\Frontend\UserModels\PrivateSite\Psite;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Frontend\UserModels\PrivateSite\Sections\PsiteHero\PsiteHeroSlider;

class PsiteHero extends Model
{
    protected $guarded = [];

    public function psite() {
        return $this->belongsTo(Psite::class);
    }

    public function psiteHeroSliders() {
        return $this->hasMany(PsiteHeroSlider::class);
    }
}
