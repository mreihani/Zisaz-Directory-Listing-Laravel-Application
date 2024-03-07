<?php

namespace App\Models\ProvinceAndCity;

use Illuminate\Database\Eloquent\Model;
use App\Models\ProvinceAndCity\Province;
use App\Models\Profile\Resume\ResumeField;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class City extends Model
{
    protected $guarded = [];
    public $timestamps = false;

    public function province()
    {
        return $this->belongsTo(Province::class, 'province_id', 'id');
    }

    public function resumeFields() {
        return $this->belongsToMany(ResumeField::class);
    }
}
