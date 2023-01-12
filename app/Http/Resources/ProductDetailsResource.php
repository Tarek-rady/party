<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductDetailsResource extends JsonResource
{

    public function toArray($request)
    {
        return [
          'id' => $this->id ,
          'name' => $this->name ,
          'title' => $this->title ,
          'desc' => $this->desc ,
          'price' => $this->price ,
          'sizes' => SizeResource::collection($this->sizes) ,
        ];
    }
}
