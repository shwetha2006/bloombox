<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AddOnResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id'             => $this->id,
            'name'           => $this->name,
            'price'          => $this->price,
            'description'    => $this->description,
            'image'          => $this->image,
            'stock_quantity' => $this->stock_quantity,
            'bouquets'       => BouquetResource::collection($this->whenLoaded('bouquets')),
        ];
    }
}