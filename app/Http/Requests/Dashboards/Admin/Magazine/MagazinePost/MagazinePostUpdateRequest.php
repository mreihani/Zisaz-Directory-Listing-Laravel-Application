<?php

namespace App\Http\Requests\Dashboards\Admin\Magazine\MagazinePost;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;
use App\Models\Frontend\UserModels\Mag\MagPost;
use App\Rules\Dashboards\Magazine\MagazinePostImageUpdateValidationRule;

class MagazinePostUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(Request $request): array
    {

        $magPost = MagPost::queryWithAllReviewStatuses()->findOrFail($request->magPost);
        
        return [
           'title' => 'required',
           'slug' => ['required', Rule::unique('mag_posts')->ignore($magPost->id, 'id')],
           'body' => 'required',
           'meta_title' => 'required',
           'meta_description' => 'required',
           'meta_keywords' => 'required',
           'review_status' => 'required',
           'mag_category_id' => 'required',
           'imageValidation' => new MagazinePostImageUpdateValidationRule($request->image, $magPost->image),
        ];
    }
    
    public function messages()
    {
        return [
            'title.required' => 'لطفا عنوان مقاله را وارد نمایید.',
            'slug.required' => 'لطفا اسلاگ مقاله را وارد نمایید.',
            'slug.unique' => 'اسلاگ مورد نظر قبلا در سامانه ثبت شده است. لطفا عبارت دیگری وارد نمایید.',
            'body.required' => 'لطفا متن مقاله را وارد نمایید.',
            'meta_title.required' => 'لطفا عنوان متای مقاله را وارد نمایید.',
            'meta_description.required' => 'لطفا توضیحات متای مقاله را وارد نمایید.',
            'meta_keywords.required' => 'لطفا کلمات کلیدی سئوی مقاله را وارد نمایید.',
            'review_status.required' => 'لطفا وضعیت انتشار مقاله را تعیین نمایید.',
            'mag_category_id.required' => 'لطفا دسته بندی مقاله را مشخص نمایید.',
        ];
    }
}
