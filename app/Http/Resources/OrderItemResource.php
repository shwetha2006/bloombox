<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderItemResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray($request)
    {
        return [
            'id'           => $this->id,
            'quantity'     => $this->quantity,
            'price'        => $this->price,
            'order_id'     => $this->order_id,
            'bouquet'      => new BouquetResource($this->whenLoaded('bouquet')),
            'add_on'       => new AddOnResource($this->whenLoaded('addOn')),
            'parent_item'  => new OrderItemResource($this->whenLoaded('parent')),
            'children'     => OrderItemResource::collection($this->whenLoaded('children')),
        ];
    }
}
