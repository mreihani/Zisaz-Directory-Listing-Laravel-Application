<?php

namespace App\Models\Frontend\UserModels\PrivateSite\Sections\PsiteTestimonial;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Frontend\UserModels\PrivateSite\Sections\PsiteTestimonial;

class PsiteTestimonialItem extends Model
{
    protected $guarded = [];

    public function psiteTestimonial() {
        return $this->belongsTo(PsiteTestimonial::class);
    }
}
