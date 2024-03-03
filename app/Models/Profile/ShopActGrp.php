<?php

namespace App\Models\Profile;

use App\Models\Profile\ShopActCat;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ShopActGrp extends Model
{
    protected $guarded = [];
    public $timestamps = false;

    public function shopActivityCategory() {
        return $this->belongsTo(ShopActCat::class, 'shop_act_cat_id', 'id');
    }
}
