<?php

namespace App\Models\Frontend\UserModels\Permission;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Frontend\ReferenceData\AdminRole\AdminRole;

class Permission extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function roles() {
        return $this->belongsToMany(AdminRole::class);
    }
}
