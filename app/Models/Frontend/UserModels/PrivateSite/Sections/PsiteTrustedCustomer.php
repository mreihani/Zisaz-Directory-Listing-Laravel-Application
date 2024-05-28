<?php

namespace App\Models\Frontend\UserModels\PrivateSite\Sections;

use Illuminate\Database\Eloquent\Model;
use App\Models\Frontend\UserModels\PrivateSite\Psite;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Frontend\UserModels\PrivateSite\Sections\PsiteTrustedCustomer\PsiteTrustedCustomerItem;

class PsiteTrustedCustomer extends Model
{
    protected $guarded = [];

    public function psite() {
        return $this->belongsTo(Psite::class);
    }

    public function psiteTrustedCustomerItem() {
        return $this->hasMany(PsiteTrustedCustomerItem::class);
    }
}
