<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InstitutionCreateRequest extends FormRequest
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
            'institution' => 'required',
            'district_id' => 'required',
            'teaching_id' => 'required',
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'is_active' => 'required',
        ];
    }

    public function messages(){
        return [
            'institution.required' => 'O campo instituição é obrigatório.'
        ];
    }
}
