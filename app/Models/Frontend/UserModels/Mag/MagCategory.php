<?php

namespace App\Models\Frontend\UserModels\Mag;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Frontend\UserModels\Mag\MagPost;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MagCategory extends Model
{
    protected $guarded = [];

    public function magazinePosts() {
        return $this->hasMany(MagPost::class);
    }
}
