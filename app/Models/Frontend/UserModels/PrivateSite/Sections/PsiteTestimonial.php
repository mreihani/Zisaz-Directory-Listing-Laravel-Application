<?php

namespace App\Models\Frontend\UserModels\PrivateSite\Sections;

use Illuminate\Database\Eloquent\Model;
use App\Models\Frontend\UserModels\PrivateSite\Psite;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Frontend\UserModels\PrivateSite\Sections\PsiteTestimonial\PsiteTestimonialItem;

class PsiteTestimonial extends Model
{
    protected $guarded = [];

    public function psite() {
        return $this->belongsTo(Psite::class);
    }

    public function psiteTestimonialItem() {
        return $this->hasMany(PsiteTestimonialItem::class);
    }
}
