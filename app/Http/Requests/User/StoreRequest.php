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
                'min:1',
                'required',
                'string',
            ],
            'email' => [
                'max:150',
                'required',
                'email',
                'unique:users' 
            ],
            'login' => [
                'max:150',
                'min:6',
                'required',
                'string',
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[A-Za-z\d]{6,}$/'
            ],
            'phoneNumber' => [
                'max:150',
                'min:11',
                'required',
                'string',
            ],
            'password' => [
                'max:150',
                'min:6',
                'required',
                'string',
                'confirmed',
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&])[A-Za-z\d$@$!%*?&]{6,}$/'

            ],
            'password_confirmation' => [
                'max:150',
                'min:6',
                'required',
                'string',
            ],
            'role_id' => [
                'exists:roles,id',
            ],
        ];
       
    }
}
