<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStudentRequest extends FormRequest
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
            'system_id'=>'required',
            'gymnastic_id'=>'required',
            'uid'  => 'required|digits:12|numeric|unique:student,uid',
            "name" => 'required|string',
            "age" => 'required|numeric',
            "identification" => 'required|digits:14|numeric|unique:student,identification',
            "gender" => 'required|in:1,2',
            "mobile" => 'required|regex:/(01)[0-9]{9}/|unique:student,mobile',
            "adress" => 'required|string',
            "parentNam" => 'required|string',
            "parentNum" => 'required|regex:/(01)[0-9]{9}/',
        ];
    }
}
