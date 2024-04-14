<?php

namespace App\Models\Frontend\UserModels\Profile;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use App\Models\Profile\ProfileCompanySpec;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserProfile extends Model
{
    protected $guarded = [];
    public $timestamps = false;

    public function user() {
        return $this->belongsTo(User::class);
    }
}
