<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class GuitarResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        // return parent::toArray($request);?

        return [
            'id' => $this->resource->id,
            'model_name' => $this->resource->model_name,
            'description' => $this->resource->description,
            'color' => $this->resource->color,
            'price' => $this->resource->price,
            'fingerboard' => $this->resource->fingerboard,
            'manufacturer' => $this->resource->manufacturer,
            'body_type' => new BodyTypeResource($this->resource->body_type)
        ];
    }

    public static $wrap = 'guitar';
}
