<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateNewsRequest extends FormRequest
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
                'string',
                'unique:news,name',
            ],
            'date_news' => [
                'date',
            ],
            'info' => [
                'string',
            ],
            'image' => [
                'image',
                'max:5120',
                'mimes:gif,jpeg,png,webp',
                'min:1',
            ],
       
    ];
    }
}
