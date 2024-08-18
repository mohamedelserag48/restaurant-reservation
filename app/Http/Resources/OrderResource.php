<?php

namespace App\Http\Resources;

use App\Models\OrderDetails;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
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
            "waiter" => $this->user->name ,
            "customer" => $this->reservation->customer->name ,
            "reservation_id" => $this->reservation_id,
            "dining_table_id" => $this->dining_table_id,
            "paid" => $this->paid,
            "date" => $this->date,
            "total" => $this->total + $this->taxes + $this->service,
            "taxes" => $this->taxes,
            "service " => $this->service,
            "meals" => OrderDetailsResource::collection($this->orderDetails),
        ];
    }

}
