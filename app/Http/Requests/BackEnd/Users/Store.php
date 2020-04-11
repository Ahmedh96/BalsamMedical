<?php

namespace App\Http\Requests\BackEnd\Users;

use Illuminate\Foundation\Http\FormRequest;

class Store extends FormRequest
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
            'name'                      => ['required', 'string', 'max:100' , 'unique:users'],
            'email'                     => ['required', 'string', 'email', 'max:150', 'unique:users'],
            'password'                  => ['required', 'string', 'min:8' , 'confirmed'],
            'password_confirmation'     => ['required', 'string', 'min:8' , 'same:password'],
            'admin'                     => ['required' , 'string'],
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
            'password.required'                 => 'A Password is required',
            'password_confirmation.required'    => 'A Password Confirmation is required',
            'admin.required'                    => 'A Admin is required',
        ];
    }
}
