<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBakedProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [

            'baker_id' => [
                'exists:bakers,id',
                'required',
            ],
            'productRecipe_id' => [
                'exists:productRecipes,id',
                'required',
            ],
            'date_baking' => [
                'date',
                'required',
            ],
            'date_sale' => [
                'date',
                'required',
            ],
        ];
    }
}
