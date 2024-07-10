<?php

namespace App\Http\Requests\Dashboards\Admin\UsersActivities\Projects\Pending;

use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;


class UsersActivitiesProjectPendingUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function rules(Request $request): array
    {
        return [
           'verify_status' => 'required',
           'reject_description' => ($request->verify_status == 'rejected') ? 'required' : '',
        ];
    }
    
    public function messages()
    {
        return [
            'verify_status.required' => 'فیلد تغییر وضعیت نمی تواند خالی باشد.',
            'reject_description.required' => 'لطفا علت رد شدن را وارد نمایید.',
        ];
    }
}
