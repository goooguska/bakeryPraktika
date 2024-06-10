<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProviderRequest extends FormRequest
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
            'name' => [
                'max:155',
                'min:0',
                'string',
                'unique:providers,name',
            ],
            'cost' => [
                'integer',
                'max:1000',
                'min:0',
            ],
            'quantity' => [
                'integer',
                'max:99',
                'min:0',
            ],
            'date_of_delivery' => [
                'date'
            ],
            'ingredient_id' => [
                'exists:ingredients,id',
            ],
        ];
    }
}
