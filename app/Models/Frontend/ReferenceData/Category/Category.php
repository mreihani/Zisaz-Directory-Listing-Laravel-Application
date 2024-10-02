<?php

namespace App\Models\Frontend\ReferenceData\Category;

use Illuminate\Support\Arr;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Frontend\ReferenceData\Category\Category;

class Category extends Model
{
    protected $guarded = [];
    
    public function parentCategory() {
        return $this->hasOne($this, 'id', 'parent');
    }

    public function child() {
        return $this->hasMany($this, 'parent', 'id');
    }
    
    public function scopeAllChildren($query, $category_id) {

        $children_array = [];
        $children = $this->find($category_id)->child;

        foreach ($children as $category_item) {
            $children_array[] = $this->allChildren($category_item->id);
        
            array_push($children_array, $children);
        }
            
        $children_array = Arr::flatten($children_array);

        return $children_array;
    }

    public function scopeAllChildrenIds($query, $category_id) {
        $children_array_id = [];
        $children = $this->allChildren($category_id);
    
        foreach ($children as $item) {
            $children_array_id[] = $item->id;
        }

        $children_array_id = array_unique($children_array_id);

        return $children_array_id;
    }

    // این متد از متد پایینی استفاده می کنه برای برگردوندن یک آیدی کتگوری تکی، ورودیش حتما باید تک آیتم باشه نه آرایه
    public function scopeFindRootCategory($query, $id)
    {
        $id = array($id);
        return $this->findRootCategoryArray($id)[0];
    }

    // با استفاده از این متد، اگر یک آرایه از ای دی دسته بندی بدی، بهت آرایه ای از روت ها اش رو برمیگردونه
    public function scopeFindRootCategoryArray($query, $category_id_array) {
        $root_catgory_obj_array = [];
        $categories = $this->latest()->get();
        foreach ($category_id_array as $category_id) {

            if(empty($this->find($category_id))) {
                break;
            }

            $category_by_id = $this->find($category_id);
            foreach ($categories as $categoryItem) {
                if ($category_by_id->parent == 0) {
                $root_catgory_obj = $category_by_id;
                break;
                } else {
                $category_by_id = !empty($this->find($category_by_id->parent)) ? $this->find($category_by_id->parent) : $category_by_id;
                }
            }
            $root_catgory_obj_array[] = $root_catgory_obj;
        }
        
        $root_catgory_obj_array = array_unique($root_catgory_obj_array);

        return $root_catgory_obj_collection = collect($root_catgory_obj_array);
    }
}
