<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Models\ActiveCode;
use App\Models\UserGrpType;
use App\Models\Profile\UserProfile;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    /**
     * Get the active codes associated with the user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function activeCode()
    {
        return $this->hasMany(ActiveCode::class);
    }

    /**
     * Set the email attribute to lowercase.
     *
     * @param  string  $value
     * @return void
     */
    public function setEmailAttribute($value) {
        $this->attributes['email'] = strtolower($value);
    }

    public function UserProfile()
    {
        return $this->hasOne(UserProfile::class, 'user_id', 'id');
    }

    public function userGroupType()
    {
        return $this->hasOne(UserGrpType::class, 'user_id', 'id');
    }

    public function avatar() {
        $avatar = 
        (auth()->user()->userProfile
        && auth()->user()->userProfile->userProfileInformation
        && auth()->user()->userProfile->userProfileInformation->profile_image)
        ? asset(auth()->user()->userProfile->userProfileInformation->profile_image) :
            asset('assets/dashboards/assets/img/jaban/user.png');

        return $avatar;    
    }
   
}
