<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class IngredentResource extends JsonResource
{

    public function toArray($request)
    {
        return [
          'id' => $this->id ,
          'name' => $this->name ,
          'img' =>url('storage/'. $this->img) ,
        ];
    }
}
