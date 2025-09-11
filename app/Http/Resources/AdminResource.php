<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AdminResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray($request)
    {
        return
        [
            'id'=>$this->id,
            'user'=>new UserResource($this->whenLoaded('user')),
            'bouquets'=>BouquetResource::collection($this->whenLoaded('bouquets')),

        ];
    }
}
