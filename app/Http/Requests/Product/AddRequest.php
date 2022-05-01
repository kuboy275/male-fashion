<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class AddRequest extends FormRequest
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
        return [
            'name' => 'required | min:3 | unique:products,name',
            'price' => 'required | numeric',
            'image_path_master' => 'required | mimes:png,jpg,jpeg,webp',
            'image_path[]' => 'mimes:png,jpg,jpeg,webp',
            'category_id' => 'required',
            'content' => 'required'
        ];
    }
}
