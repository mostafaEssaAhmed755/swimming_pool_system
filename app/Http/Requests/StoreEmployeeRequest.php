<?php

namespace App\Http\Requests;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Route;

use Illuminate\Foundation\Http\FormRequest;

class StoreEmployeeRequest extends FormRequest
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

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "name" => 'string|required',
            "uid" => Rule::requiredIf(Route::is('employee.store')),'digits:12|numeric|unique:employees,uid',
            "identification" => 'required|digits:14|numeric|unique:employees,identification',
            "adress" => 'required|string',
            "mobile_1" => 'required|regex:/(01)[0-9]{9}/|unique:employees,mobile_1|unique:employees,mobile_2',
            "mobile_2" => 'nullable|regex:/(01)[0-9]{9}/|unique:employees,mobile_1|different:mobile_1|unique:employees,mobile_2',
            "joinDate" => 'nullable|date',
            "salary" => 'required|numeric',
            "job_id" => 'required',
        ];
    }
}
