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
                'integer',
                'max:1000',
                'min:0',
                'required',
            ],
            'quantity' => [
                'integer',
                'max:99',
                'min:0',
                'required',
            ],
            'weight' => [
                'integer',
                'max:999',
                'min:0',
                'required'
            ],
            'image' => [
                'image',
                'max:5120',
                'mimes:gif,jpeg,png,webp',
                'min:1',
                'required',
            ],
            'type' => [
                'string',
                'max:100',
                'min:1',
                'required',
            ],
        ];
    }
}
