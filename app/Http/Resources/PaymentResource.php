<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PaymentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
     public function toArray($request)
    {
        return [
            'id'             => $this->id,
            'total_amount'   => $this->total_amount,
            'payment_date'   => $this->payment_date,
            'payment_method' => $this->payment_method,
            'payment_status' => $this->payment_status,
            'order_id'       => $this->order_id,
        ];
    }
}
