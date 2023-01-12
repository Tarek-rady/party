<?php

namespace App\Http\Requests\Api;

use App\Http\Requests\API\MasterApiRequest;
use Illuminate\Foundation\Http\FormRequest;

class UpdateQtyRequest extends MasterApiRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [

            'item_id' => 'required|exists:items,id' ,
            'qty'   => 'required|numeric'

        ];
    }
}
