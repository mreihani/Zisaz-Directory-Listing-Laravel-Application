<?php

namespace App\Models\Frontend\UserModels\PrivateSite\Sections\PsiteService;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Frontend\UserModels\PrivateSite\Sections\PsiteService;

class PsiteServiceItem extends Model
{
    protected $guarded = [];

    public function psiteService() {
        return $this->belongsTo(PsiteService::class);
    }
}
