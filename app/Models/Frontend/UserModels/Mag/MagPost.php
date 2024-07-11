<?php

namespace App\Models\Frontend\UserModels\Mag;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Frontend\UserModels\Mag\MagCategory;
use App\Models\Frontend\UserModels\Mag\MagPostVideo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MagPost extends Model
{
    use SoftDeletes;
    
    protected $guarded = [];

    // Define a global scope in the model
    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope('review_status', function (Builder $builder) {
            $builder->where('review_status', 1);
        });
    }

    public static function scopeQueryWithAllReviewStatuses($query) {
        return $query->withoutGlobalScope('review_status');
    }

    public static function scopeQueryWithReviewStatusFalse($query) {
        return $query->withoutGlobalScope('review_status')->where('review_status', 0);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function magazineCategory() {
        return $this->belongsTo(MagCategory::class, 'mag_category_id');
    }
}
