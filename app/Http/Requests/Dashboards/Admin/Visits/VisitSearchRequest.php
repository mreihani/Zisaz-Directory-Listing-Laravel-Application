<?php

namespace App\Http\Requests\Dashboards\Admin\Visits;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;
use App\Rules\Dashboards\Visits\VisitsDateSpanValidationRule;


class VisitSearchRequest extends FormRequest
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
           'ip' => $request->ip ? 'ipv4' : '',
           'device' => $request->device ? 'regex:/^[a-zA-Z\s]*$/' : '',
           'platform' => $request->platform ? 'regex:/^[a-zA-Z\s]*$/' : '',
           'browser' => $request->browser ? 'regex:/^[a-zA-Z\s]*$/' : '',
           'dateValidation' => new VisitsDateSpanValidationRule($request->startDate, $request->endDate)
        ];
    }
    
    public function messages(): array
    {
        return [
            'ip.ipv4' => 'لطفا آی پی صحیح وارد نمایید.',
            'device.regex' => 'لطفا نام دستگاه را به درستی وارد نمایید.',
            'platform.regex' => 'لطفا نام پلتفرم را به درستی وارد نمایید.',
            'browser.regex' => 'لطفا نام مرورگر را به درستی وارد نمایید.',
        ];
    }
}
