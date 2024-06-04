<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreNewsRequest extends FormRequest
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
                    'max:55',
                    'min:0',
                    'required',
                    'string',
                    'unique:news,name',
                ],
                'date_news' => [
                    'date',
                    'required',
                ],
                'info' => [
                    'required',
                    'string',
                ],
                'image' => [
                    'image',
                    'max:5120',
                    'mimes:gif,jpeg,png,webp',
                    'min:1',
                    'required',
                ],
           
        ];
    }
}
