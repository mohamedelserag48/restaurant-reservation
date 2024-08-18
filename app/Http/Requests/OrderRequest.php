<?php

namespace App\Http\Requests;

use App\Http\Requests\ResponseShape as FormRequest;

class OrderRequest extends FormRequest
{


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "reservation_id" => "required|exists:reservations,id",
            "dining_table_id" => "required|exists:dining_tables,id",
            "meals" => "required|array",
            "meals.*.meal_id" => "required|exists:meals,id",
            "meals.*.count" => "required|integer|min:1",
        ];
    }
}
