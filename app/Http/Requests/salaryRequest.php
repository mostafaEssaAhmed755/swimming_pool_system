<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class salaryRequest extends FormRequest
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
            'year'  => ['required'],
            'month'  => ['required'],
            'salary'  => ['required'],
        ];
    }
    public function messages()
    {
        return [
            'employee_id.required' =>'الموظف مطلوب',
            'year.required' =>'سنة الصرف مطلوب',
            'month.required' =>'شهر الصرف مطلوب',
            'salary.required' =>'المرتب المصروف مطلوب'

        ];
    }
}
