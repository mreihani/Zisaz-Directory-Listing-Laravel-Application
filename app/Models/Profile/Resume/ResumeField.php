<?php

namespace App\Models\Profile\Resume;

use App\Models\Profile\ShopActGrp;
use App\Models\Profile\UserProfile;
use App\Models\ProvinceAndCity\City;
use App\Models\Profile\ProfileResume;
use Illuminate\Database\Eloquent\Model;
use App\Models\ContractType\ContractType;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ResumeField extends Model
{
    protected $guarded = [];

    public function profileResume() {
        return $this->belongsTo(ProfileResume::class);
    }

    public function cities() {
        return $this->belongsToMany(City::class);
    }

    public function shopActGroups() {
        return $this->belongsToMany(ShopActGrp::class, 'shop_act_grp_resume_field', 'resume_field_id', 'shop_act_grp_id');
    }

    public function contactTypes() {
        return $this->belongsToMany(ContractType::class);
    }
}
