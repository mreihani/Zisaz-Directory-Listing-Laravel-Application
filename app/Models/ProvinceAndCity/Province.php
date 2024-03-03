<?php

namespace App\Models\ProvinceAndCity;

use App\Models\ProvinceAndCity\City;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Province extends Model
{
    protected $guarded = [];
    public $timestamps = false;

    public function city()
    {
        return $this->hasMany(City::class, 'province_id', 'id');
    }
}
