<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        if($this->method() == 'POST'){
            return [
                'title' => 'required' ,
                'img' => 'required|mimes:png,jpg,jpg' ,
                'price' => 'required|numeric' ,
                'new_price' => 'nullable|numeric' ,
                'desc' => 'required' ,
                'qty' => 'required' ,
                'category_id' => 'required' ,
                'tag_id' => 'nullable' ,
             ];
        }else{
            return [
                'title' => 'required' ,
                'img' => 'nullable|mimes:png,jpg,jpg' ,
                'price' => 'required|numeric' ,
                'new_price' => 'nullable|numeric' ,
                'desc' => 'required' ,
                'qty' => 'required' ,
                'category_id' => 'required' ,
                'tag_id' => 'nullable' ,
             ];
        }
    }
}
