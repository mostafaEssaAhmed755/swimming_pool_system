<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePreparingsessionRequest extends FormRequest
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
            'coach_id' => 'required',
            'gymnastic_id' => 'required',
            'trainingdate_id' => 'required',
        ];
    }
}
