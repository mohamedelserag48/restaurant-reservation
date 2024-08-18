<?php

namespace App\Http\Requests;

use App\Http\Requests\ResponseShape as FormRequest;
class LoginRequest extends FormRequest
{
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
            //
            "email" => "required|email",
            "password" => "required"
        ];
    }

}
