<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRecipeRequest extends FormRequest
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
                'required',
                'string',
                'unique:recipes,name',
            ],
            'info' => [
                'required',
                'string',
            ],
            'baking_time' => [
                'date',
                'required',
            ],
        ];
    }
}
