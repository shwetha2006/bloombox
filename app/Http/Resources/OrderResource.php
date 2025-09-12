<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
     public function toArray($request)
    {
        return [
            'id'          => $this->id,
            'order_date'  => $this->order_date,
            'order_status'=> $this->order_status,
            'total_cost'  => $this->total_cost,
            'customer'    => new CustomerResource($this->whenLoaded('customer')),
            'order_items' => OrderItemResource::collection($this->whenLoaded('orderItems')),
            'payment'     => new PaymentResource($this->whenLoaded('payment')),
            'shipment'    => new ShipmentsResource($this->whenLoaded('shipment')),
        ];
    }
}
