<?php

namespace App\Http\Requests\Dashboards\Admin\Magazine\MagazineCategory;

use Illuminate\Foundation\Http\FormRequest;

class MagazineCategoryStoreRequest extends FormRequest
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
    public function rules(): array
    {
        return [
           'title' => 'required|unique:mag_categories',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'لطفا عنوان دسته بندی مقاله را وارد نمایید.',
            'title.unique' => 'عنوان مورد نظر قبلا در سامانه ثبت شده است. لطفا عنوان دیگری وارد نمایید.',
        ];
    }
}
