<?php

namespace App\Models\ContractType;

use Illuminate\Database\Eloquent\Model;
use App\Models\Profile\Resume\ResumeField;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ContractType extends Model
{
    protected $guarded = [];
    public $timestamps = false;

    public function resumeFields() {
        return $this->belongsToMany(ResumeField::class);
    }
}
