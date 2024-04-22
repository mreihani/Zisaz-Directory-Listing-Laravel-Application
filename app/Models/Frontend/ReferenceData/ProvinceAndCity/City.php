<?php

namespace App\Models\Frontend\ReferenceData\ProvinceAndCity;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Frontend\ReferenceData\ProvinceAndCity\Province;

class City extends Model
{
    protected $guarded = [];
    public $timestamps = false;

    public function province()
    {
        return $this->belongsTo(Province::class, 'province_id', 'id');
    }
}
