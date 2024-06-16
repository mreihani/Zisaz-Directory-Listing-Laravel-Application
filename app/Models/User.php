<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use App\Models\Frontend\UserModels\ActiveCode;
use App\Models\Frontend\UserModels\Project\Project;
use App\Models\Frontend\UserModels\Activity\Activity;
use App\Models\Frontend\UserModels\PrivateSite\Psite;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Frontend\UserModels\Profile\UserProfile;
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

    public function userProfile()
    {
        return $this->hasOne(UserProfile::class, 'user_id', 'id');
    }

    public function avatar() {
        $avatar = 
        (auth()->user()->userProfile
        && auth()->user()->userProfile->profile_image)
        ? asset(auth()->user()->userProfile->profile_image) :
            asset('assets/dashboards/assets/img/jaban/user.png');

        return $avatar;    
    }
   
    public function activity() {
        return $this->hasMany(Activity::class);
    }

    public function privateSite() {
        return $this->hasMany(Psite::class);
    }

    public function project() {
        return $this->hasMany(Project::class);
    }
}
