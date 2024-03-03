<?php

namespace App\Models\Profile;

use App\Models\Profile\ShopActGrp;
use App\Models\Profile\UserProfile;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProfileInfo extends Model
{
    protected $guarded = [];

    public function userProfile() {
        return $this->belongsTo(UserProfile::class);
    }

    public function shopActivityGroup()
    {
        return $this->belongsTo(ShopActGrp::class, 'shop_act_grps_id', 'id');
    }
}
