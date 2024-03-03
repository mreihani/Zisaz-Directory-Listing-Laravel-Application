<?php

namespace App\Models\Profile;

use App\Models\Profile\ShopActGrp;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ShopActCat extends Model
{
    protected $guarded = [];
    public $timestamps = false;

    public function shopActivityGroup()
    {
        return $this->hasMany(ShopActGrp::class, 'shop_act_cat_id', 'id');
    }
}
