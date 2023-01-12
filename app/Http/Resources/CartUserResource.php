<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CartUserResource extends JsonResource
{

    public function toArray($request)
    {
        return [
          'id' => $this->product->id ,
          'name' => $this->product->name ,
          'img' => url('storage/'. $this->product->img) ,
          'title' => $this->product->title ,
          'price' => $this->price ,
          'qty' => $this->qty ,
          'total_product' => strval( number_format(($this->price * $this->qty) , 2) )
        ];
    }
}
