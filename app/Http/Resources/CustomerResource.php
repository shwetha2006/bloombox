<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CustomerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray($request)
    {
        return [
            'id'         => $this->id,
            'first_name' => $this->first_name,
            'last_name'  => $this->last_name,
            'mobile_num' => $this->mobile_num,
            'user'       => new UserResource($this->whenLoaded('user')),
            'orders'     => OrderResource::collection($this->whenLoaded('orders')),
        ];
    }
}
