<?php

namespace App\Models\Frontend\ReferenceData\AdminRole;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Frontend\UserModels\Permission\Permission;

class AdminRole extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function permission() {
        return $this->belongsToMany(Permission::class, 'admin_role_permission');
    }
}
