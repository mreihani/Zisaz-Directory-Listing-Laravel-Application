<?php

namespace App\Models\Profile;

use App\Models\Profile\ShopActGrp;
use App\Models\Profile\UserProfile;
use Illuminate\Database\Eloquent\Model;
use App\Models\Profile\ProfileInfo\ProfileInfoShop;
use App\Models\Profile\ProfileInfo\ProfileInfoCompany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Profile\ProfileInfo\ProfileInfoPersonal;

class ProfileInfo extends Model
{
    protected $guarded = [];

    public function userProfile() {
        return $this->belongsTo(UserProfile::class);
    }

    public function shopActGroups() {
        return $this->belongsToMany(ShopActGrp::class, 'shop_act_grp_profile_info', 'profile_info_id', 'shop_act_grp_id');
    }

    public function profileInfoPersonal() {
        return $this->hasOne(ProfileInfoPersonal::class);
    }

    public function profileInfoCompany() {
        return $this->hasOne(ProfileInfoCompany::class);
    }

    public function profileInfoShop() {
        return $this->hasOne(ProfileInfoShop::class);
    }
}
