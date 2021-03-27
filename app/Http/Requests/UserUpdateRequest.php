<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
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
            'telephone' => 'size:9',
            'email' => 'required|email',
            'password' => 'required|min:8',
            'description' => 'max:100',
            'is_active' => 'required',
            'role_id' => 'required'
        ];
    }
}
