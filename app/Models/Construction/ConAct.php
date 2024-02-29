<?php

namespace App\Models\Construction;

use App\Models\Construction\ConGrp;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ConAct extends Model
{
    protected $guarded = [];
    public $timestamps = false;

    public function conGrp()
    {
        return $this->hasMany(ConGrp::class);
    }
}
