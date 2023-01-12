<?php

namespace App\Http\Requests\Api;

use App\Http\Requests\API\MasterApiRequest;
use Illuminate\Foundation\Http\FormRequest;

class CartRequest extends MasterApiRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [

            'product_id' => 'required|exists:products,id' ,
            'qty'        => 'required|numeric' ,

        ];
    }
}
