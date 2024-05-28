<?php

namespace App\Models\Frontend\UserModels\PrivateSite\Sections\PsiteTrustedCustomer;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Frontend\UserModels\PrivateSite\Sections\PsiteTrustedCustomer;

class PsiteTrustedCustomerItem extends Model
{
    protected $guarded = [];

    public function psiteTrustedCustomer() {
        return $this->belongsTo(PsiteTrustedCustomer::class);
    }
}
