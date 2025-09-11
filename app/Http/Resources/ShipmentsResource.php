<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ShipmentsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */

    public function toArray($request)
    {
        return [
            'id'              => $this->id,
            'shipment_date'   => $this->shipment_date,
            'shipment_cost'   => $this->shipment_cost,
            'order_id'        => $this->order_id,
            'address_line1'   => $this->address_line1,
            'address_line2'   => $this->address_line2,
            'city'            => $this->city,
            'postal_code'     => $this->postal_code,
            'shipment_status' => $this->shipment_status,
        ];
    }
}
