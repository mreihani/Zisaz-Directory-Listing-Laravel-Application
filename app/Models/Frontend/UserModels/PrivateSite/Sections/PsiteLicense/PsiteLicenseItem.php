<?php

namespace App\Models\Frontend\UserModels\PrivateSite\Sections\PsiteLicense;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Frontend\UserModels\PrivateSite\Sections\PsiteLicense;

class PsiteLicenseItem extends Model
{
    protected $guarded = [];

    public function license() {
        return $this->belongsTo(PsiteLicense::class);
    }
}
