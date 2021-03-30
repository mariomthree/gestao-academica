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
            'institutionName' => 'required',
            'district_id' => 'required',
            'userName' => 'required',
            'userEmail' => 'required|email|unique:users',
            'userPassword' => 'required|min:8',
            'is_active' => 'required',
        ];
    }
}
