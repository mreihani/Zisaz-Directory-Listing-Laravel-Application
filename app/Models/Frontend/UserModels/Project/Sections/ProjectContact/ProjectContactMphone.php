<?php

namespace App\Models\Frontend\UserModels\Project\Sections\ProjectContact;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Frontend\UserModels\Project\Sections\ProjectContact;

class ProjectContactMphone extends Model
{
    protected $guarded = [];

    public function contact() {
        return $this->belongsTo(ProjectContact::class);
    }
}
