<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class BannerRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        if($this->method() == "POST"){
            return [

                'name_ar'  => 'required' ,
                'name_en'  => 'required' ,
                'img'      => 'required|mimes:png,jpg,jpeg' ,

            ];
        }else{
            return [

                'name_ar'  => 'required' ,
                'name_en'  => 'required' ,
                'img'      => 'nullable|mimes:png,jpg,jpeg' ,

            ];
        }

    }
}
