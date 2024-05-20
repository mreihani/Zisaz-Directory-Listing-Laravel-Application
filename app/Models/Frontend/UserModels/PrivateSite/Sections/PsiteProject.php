<?php

namespace App\Models\Frontend\UserModels\PrivateSite\Sections;

use Illuminate\Database\Eloquent\Model;
use App\Models\Frontend\UserModels\PrivateSite\Psite;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PsiteProject extends Model
{
    protected $guarded = [];

    public function psite() {
        return $this->belongsTo(Psite::class);
    }
}
