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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'sometimes|required|min:3',
            'lastname' => 'sometimes|required|min:3',
            'email' => 'sometimes|required|unique',
            'password' => 'sometimes|required|confirmed',
            'role_id' => 'sometimes|required|integer'
        ];
    }
}
