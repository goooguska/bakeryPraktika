<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProviderRequest extends FormRequest
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
                'unique:providers,name',
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
            'date_of_delivery' => [
                'date',
                'required',
            ],
           
        ];
    }
}
