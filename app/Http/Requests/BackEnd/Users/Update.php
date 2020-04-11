<?php

namespace App\Http\Requests\BackEnd\Users;

use Illuminate\Foundation\Http\FormRequest;

class Update extends FormRequest
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
            'name'                      => ['required', 'string', 'max:255'],
            'email'                     => ['required', 'string', 'email', 'max:255', 'unique:users,email,'.$this->user],
            'password'                  => ['sometimes' , 'confirmed'],
            'password_confirmation'     => ['sometimes', 'same:password'],
            'admin'                     => ['required'],
            'image'                     => ['sometimes' , 'image' , 'mimes:jpg,png,jpeg'],
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required'                     => 'A Name is required',
            'email.required'                    => 'A Email is required',
            'admin.required'                    => 'A Admin is required'
        ];
    }
}
