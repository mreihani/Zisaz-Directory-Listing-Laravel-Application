<?php

namespace App\Models\Frontend\UserModels\Mag;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Frontend\UserModels\Mag\MagCategory;
use App\Models\Frontend\UserModels\Mag\MagPostVideo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MagPost extends Model
{
    use SoftDeletes;
    
    protected $guarded = [];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function magazineCategory() {
        return $this->belongsTo(MagCategory::class);
    }
}
