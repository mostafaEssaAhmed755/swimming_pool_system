<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCoachRequest extends FormRequest
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
            "identification" => 'required|digits:14|numeric|unique:coaches,identification',
            "adress" => 'string',
            "mobile" => 'required|regex:/(01)[0-9]{9}/|unique:coaches,mobile',
        ];
    }
}
