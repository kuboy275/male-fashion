<?php

namespace App\Http\Requests\Coupon;

use Illuminate\Foundation\Http\FormRequest;

class CouponRequest extends FormRequest
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
            'name' => 'required',
            'code' => 'required | max:6 |regex:/[A-Z][A-Z0-9]+/',
            'type' => 'required',
            'value' => 'required | numeric',
            'quantity' => 'required | numeric',
            'starts_at' => 'required | before:expires_at',
            'expires_at' => 'required | after:now'
        ];
    }

    public function messages(){
        return [
            'code.regex' => 'Code must be Uppercase'
        ];
    }
}
