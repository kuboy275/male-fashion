<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            'email' => 'required | email',
            'message' => 'required',
            'file_contact_path' => 'max:2048|mimes:jpeg,png,doc,docs,pdf'
        ];
    }
    public function messages(){
        return [
            'file_contact_path.max' => 'The File must not be greater than 2MB'
        ];
    }
}
