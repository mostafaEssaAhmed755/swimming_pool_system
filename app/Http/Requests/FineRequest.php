<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FineRequest extends FormRequest
{
    
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'employee_id' => ['required'],
            'amount'  => ['required'],
        ];
    }
    public function messages()
    {
        return [
            'employee_id.required' =>'الموظف مطلوب',
            'amount.required' =>'خانة الخصومات مطلوبة',

        ];
    }
}
