<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BouquetResource extends JsonResource
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
            'name'           => $this->name,
            'price'          => $this->price,
            'description'    => $this->description,
            'image'          => $this->image,
            'stock_quantity' => $this->stock_quantity,
            'category'       => new CategoryResource($this->whenLoaded('category')),
            'admin'          => new AdminResource($this->whenLoaded('admin')),
            'add_ons'        => AddOnResource::collection($this->whenLoaded('addOns')),
        ];
    }
}
