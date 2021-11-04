<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreTrainingdateRequest extends FormRequest
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
            "date" => 'required|numeric' ,
            "from" => 'required|date_format:H:i',
            "to" => 'required|date_format:H:i|different:from',
            "gymnastic_id" =>  ['required', 
                Rule::unique('trainingdates')
                       ->where('date', $this->date)
                       ->where('from', $this->from)
                       ->where('to', $this->to)
                       ->where('gymnastic_id', $this->gymnastic_id)

               ]

        ];
    }
}
