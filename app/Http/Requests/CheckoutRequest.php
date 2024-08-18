<?php

namespace App\Http\Requests;

use App\Http\Requests\ResponseShape as FormRequest;

class CheckoutRequest extends FormRequest
{

/**
* Get the validation rules that apply to the request.
*
* @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
*/
    public function rules(): array
    {
        return [
            "order_id" => "required|exists:orders,id"
        ];
    }

}
