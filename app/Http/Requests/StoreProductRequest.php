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
            "name" => ['required', 'min:2'],
            "price" => "required|min:2"
        ];
    }
    public function messages()
    {
        return [
            "name" => ["required" => "please enter product name", "min" => "min is 5CHr"],
            "price" => ["required" => "please send product price!", "min" => "min is 2 digit"]
        ];
    }
}
