<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'firstName' => [
                'max:150',
                'min:0',
                'required',
                'string',
            ],
            'email' => [
                'max:150',
                'min:0',
                'required',
                'email',
            ],
            'login' => [
                'max:150',
                'min:0',
                'required',
                'string',
            ],
            'phoneNumber' => [
                'max:150',
                'min:0',
                'required',
                'string',
            ],
            'password' => [
                'max:150',
                'min:0',
                'required',
                'string',
                'confirmed'
            ],
            'password_confirmation' => [
                'max:150',
                'min:0',
                'required',
                'string',
            ],
        ];
       
    }
}
