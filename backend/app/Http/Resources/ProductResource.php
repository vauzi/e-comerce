<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        return [
            'id'            => $this->id,
            'category_id'   => $this->category_id,
            'image'         => $this->image,
            'name_product'  => $this->name_product,
            'buy'           => $this->buy,
            'sell'          => $this->sell,
            'stock'         => $this->stock,
            'description'   => $this->description
        ];
    }
}
