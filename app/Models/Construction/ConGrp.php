<?php

namespace App\Models\Construction;

use App\Models\User;

use App\Models\ConProf;
use App\Models\UserGrpType;
use App\Models\Construction\ConAct;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ConGrp extends Model
{
    protected $guarded = [];
    public $timestamps = false;

    public function conAct() {
        return $this->belongsTo(ConAct::class);
    }

    public function profiles() {
        return $this->morphMany(UserGrpType::class, 'groupable');
    }
}
