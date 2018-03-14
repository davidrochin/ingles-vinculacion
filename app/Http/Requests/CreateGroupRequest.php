<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateGroupRequest extends FormRequest
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
            'name' => 'required',
            'code' => 'required',
            'level' => 'required',
            'professorId' => 'required',
            'scheduleStart' => 'required',
            'scheduleEnd' => 'required',
            'days' => 'required',
        ];
    }

    public function messages(){
        return [
            'name.required' => 'No puede estar vacío.',
            'days.required' => 'Es necesario especificar al menos un día.',
        ];
    }
}