<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSaleRequest extends FormRequest
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
            'product_id' => [
                'exists:products,id',
            ],
            'user_id' => [
                'exists:users,id',
            ],
            'quantity' => [
                'integer',
                'max:2147483647',
                'min:0',
            ],
            'date_sale' => [
                'date',
            ],
        ];
    }
}
