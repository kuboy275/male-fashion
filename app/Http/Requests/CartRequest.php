<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CartRequest extends FormRequest
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
            'product_qty' => 'numeric|min:1|max:20',
        ];
    }

    public function messages(){
        return [
            'product_qty.numeric' => 'The product quantity must be a number.',
            'product_qty.max' => 'The number of products should not be more than :max',
            'product_qty.min' => 'The number of products should not be less than :min',
        ];
    }
}
