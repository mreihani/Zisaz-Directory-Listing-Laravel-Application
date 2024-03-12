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

    public function shopActGroups() {
        return $this->belongsToMany(ShopActGrp::class, 'shop_act_grp_profile_info', 'profile_info_id', 'shop_act_grp_id');
    }
}
