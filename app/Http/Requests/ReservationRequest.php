<?php

namespace App\Http\Requests;

use App\Http\Requests\ResponseShape as FormRequest;

class ReservationRequest extends FormRequest
{


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "dining_table_id" => "required|exists:dining_tables,id",
            "customer_id" => "required|exists:customers,id",
            "from_time" => "required|date_format:H:i",
            "to_time" => "required|date_format:H:i",
            "date" => "required|date_format:Y-m-d",
        ];
    }
}
