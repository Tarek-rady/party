<?php

namespace App\Http\Requests\Site;

use Illuminate\Foundation\Http\FormRequest;

class RateRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [

            'name' => 'required',
            'email' => 'required|unique:rates,email',
            'rate' => 'required|min:1|max:5',
            'desc' => 'required',

        ];
    }
}
