<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title' => 'required',
            'excerpt' => 'required',
            'description' => 'required',
            'price' => 'required',
            'image' => 'required'
        ];
    }
}
