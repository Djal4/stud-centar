<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MealPriceStoreRequest extends FormRequest
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
            'price' => 'required|max:4|numeric',
            'card_type_id' => 'required|numeric|max:1',
            'meal_id' => 'required|numeric|max:2'
        ];
    }
}
