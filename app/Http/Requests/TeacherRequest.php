<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TeacherRequest extends FormRequest
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
            'birthdate' => 'required|date',
            'gender' => 'required',
            'entry_date' => 'required|date|after:birthdate'
        ];
    
    }

    public function messages()
    {  
        return [
            'birthdate.required' => 'O campo data de nascimento é obrigatório.',
            'entry_date.required' => 'O campo data de ingresso é obrigatório.',
            'entry_date.after' => 'O campo data de incresso deve conter uma data posterior a data de nascimento.'
        ];
    }
}
