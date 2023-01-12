<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class PartnerRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        if ($this->method() == 'POST') {

            return [
                'name' => 'required|max:250' ,
                'email' => 'required|unique:partners,email' ,
                'password' => 'required|min:5' ,
                'mobile' => 'required|numeric|unique:partners,mobile' ,
                'manager' => 'required' ,
                'manager_mobile' => 'required|numeric|unique:partners,manager_mobile' ,
                'img' => 'required|mimes:png,jpg,jpg' ,
                'location_img' => 'required|mimes:png,jpg,jpg' ,


            ];

        }else{
            return [

                'name' => 'required|max:250' ,
                'email' => 'required' ,
                'password' => 'required|min:5' ,
                'mobile' => 'required|numeric' ,
                'manager' => 'required' ,
                'manager_mobile' => 'required|numeric' ,
                'img' => 'nullable|mimes:png,jpg,jpg' ,
                'location_img' => 'nullable|mimes:png,jpg,jpg' ,
                

            ];
        }
    }
}
