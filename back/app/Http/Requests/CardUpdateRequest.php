<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CardUpdateRequest extends FormRequest
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
            'creation_date' => 'sometimes|required',
            'expiration_date' => 'sometimes|required',
            'user_id' => 'sometimes|required|numeric',
            'card_type_id' => 'sometimes|required|numeric|max:1'
        ];
    }
}
