<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ReservationResource extends JsonResource
{

    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id" => $this->id ,
            "table" => $this->diningTable->id ,
            "customer" => $this->customer->name,
            "from_time" => $this->from_time,
            "to_time" => $this->to_time,
            "date" => $this->date
        ];
    }

}
