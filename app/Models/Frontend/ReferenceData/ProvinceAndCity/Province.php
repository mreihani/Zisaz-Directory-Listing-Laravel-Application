<?php

namespace App\Models\Frontend\ReferenceData\ProvinceAndCity;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Frontend\ReferenceData\ProvinceAndCity\City;

class Province extends Model
{
    protected $guarded = [];
    public $timestamps = false;

    public function city()
    {
        return $this->hasMany(City::class, 'province_id', 'id');
    }
}
