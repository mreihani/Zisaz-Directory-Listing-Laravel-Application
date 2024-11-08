<?php

namespace App\Models\Frontend\UserModels\Mag;

use App\Models\User;
use Artesaos\SEOTools\Facades\SEOMeta;
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

    public function setSeoMeta() {
        if(!empty($this->meta_title)) {
            SEOMeta::setTitle($this->meta_title);
        } 

        if(!empty($this->meta_description)) {
            SEOMeta::setDescription($this->meta_description);
        } 
        if(!empty($this->meta_keywords)) {
            $meta_keywords = explode('،', $this->meta_keywords);
            SEOMeta::setKeywords($meta_keywords);
        }
    }
}
