<?php

namespace App\Models\Frontend\UserModels\PrivateSite;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Frontend\UserModels\PrivateSite\Sections\PsiteBlog;
use App\Models\Frontend\UserModels\PrivateSite\Sections\PsiteHero;
use App\Models\Frontend\UserModels\PrivateSite\Sections\PsiteFooter;
use App\Models\Frontend\UserModels\PrivateSite\Sections\PsiteMember;
use App\Models\Frontend\UserModels\PrivateSite\Sections\PsiteAboutUs;
use App\Models\Frontend\UserModels\PrivateSite\Sections\PsiteProject;
use App\Models\Frontend\UserModels\PrivateSite\Sections\PsiteService;
use App\Models\Frontend\UserModels\PrivateSite\Sections\PsiteContactUs;
use App\Models\Frontend\UserModels\PrivateSite\Sections\PsiteLicenseItem;
use App\Models\Frontend\UserModels\PrivateSite\Sections\PsiteTestimonial;
use App\Models\Frontend\UserModels\PrivateSite\Sections\PsiteMiddleBanner;
use App\Models\Frontend\UserModels\PrivateSite\Sections\PsiteTrustedCustomer;
use App\Models\Frontend\UserModels\PrivateSite\Sections\PsitePromotionalVideo;

class Psite extends Model
{
    protected $guarded = [];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function license() {
        return $this->hasMany(PsiteLicenseItem::class);
    }

    public function aboutUs() {
        return $this->hasOne(PsiteAboutUs::class);
    }

    public function blog() {
        return $this->hasOne(PsiteBlog::class);
    }

    public function contactUs() {
        return $this->hasOne(PsiteContactUs::class);
    }

    public function footer() {
        return $this->hasOne(PsiteFooter::class);
    }

    public function hero() {
        return $this->hasOne(PsiteHero::class);
    }

    public function members() {
        return $this->hasOne(PsiteMember::class);
    }

    public function middleBanner() {
        return $this->hasOne(PsiteMiddleBanner::class);
    }

    public function promotionalVideo() {
        return $this->hasOne(PsitePromotionalVideo::class);
    }

    public function services() {
        return $this->hasOne(PsiteService::class);
    }

    public function testimonials() {
        return $this->hasOne(PsiteTestimonial::class);
    }

    public function trustedCustomer() {
        return $this->hasOne(PsiteTrustedCustomer::class);
    }

    public function projects() {
        return $this->hasOne(PsiteProject::class);
    }
}