<?php

namespace App\Http\Requests\Dashboards\Admin\User;

use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;
use App\Rules\Dashboards\Media\MediaStoreValidationRule;
use App\Rules\Dashboards\User\IgnoreEmailRegistrationUserStoreValidation;
use App\Rules\Dashboards\User\IgnorePhoneRegistrationUserStoreValidation;

class UserStoreRequest extends FormRequest
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
        return [
            'firstname' => 'required',
            'lastname' => 'required',
            'phone' => ['required', new IgnorePhoneRegistrationUserStoreValidation(), config('phone-regex.ir.regex')],
            'email' => [new IgnoreEmailRegistrationUserStoreValidation()],
            'password' =>  $request->account_type == 'admin' ? 'required|min:8' : '',
            'account_type' => 'required'
        ];
    }

    public function messages(): array
    {
        return [
            'firstname.required' => 'لطفا نام کاربر را وارد نمایید.',
            'lastname.required' => 'لطفا نام خانوادگی کاربر را وارد نمایید.',
            'phone.required' => 'لطفا شماره تلفن همراه کاربر را وارد نمایید.',
            'phone.regex' => 'لطفا شماره تلفن صحیح وارد نمایید.',
            'phone.unique' => 'شماره تلفن مورد نظر قبلا در سامانه ثبت شده است. شماره دیگری وارد نمایید.',
            'password.required' => 'لطفا کلمه عبور را وارد نمایید.',
            'password.min' => 'حداقل 8 کاراکتر برای کلمه عبور الزامی است.',
            'account_type.required' => 'لطفا سطح دسترسی کاربر را انتخاب نمایید.',
        ];
    }
}
