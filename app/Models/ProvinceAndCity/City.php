<?php

namespace App\Models\ProvinceAndCity;

use Illuminate\Database\Eloquent\Model;
use App\Models\ProvinceAndCity\Province;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class City extends Model
{
    protected $guarded = [];
    public $timestamps = false;

    public function province()
    {
        return $this->belongsTo(Province::class, 'province_id', 'id');
    }
}
