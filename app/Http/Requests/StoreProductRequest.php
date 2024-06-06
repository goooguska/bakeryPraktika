<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
                'unique:products,name',
            ],
            'info' => [
                'required',
                'string',
            ],
            'cost' => [
                'decimal:0,2',
                'max:99999.99',
                'min:0',
                'required',
            ],
        ];
    }
}
