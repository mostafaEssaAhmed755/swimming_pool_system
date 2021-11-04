<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AttenanceRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    
    public function rules()
    {
        return [
            'employee_id' => ['required'],
            'attendance'  => ['required'],
        ];
    }
    public function messages()
    {
        return [
            'employee_id.required' =>'الموظف مطلوب'

        ];
    }
}
