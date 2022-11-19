<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MealPriceUpdateRequest extends FormRequest
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
            'price'=>'sometimes|required|max:4|numeric',
            'card_type_id'=>'sometimes|required|numeric|max:1',
            'meal_id'=>'sometimes|required|numeric|max:2'
        ];
    }
}
