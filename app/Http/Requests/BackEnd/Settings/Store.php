<?php

namespace App\Http\Requests\BackEnd\Settings;

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
            'sitename'              => ['required', 'string', 'min:3' , 'max:100'],
            'email'                 => ['required', 'string', 'min:3' , 'max:100'],
            'keywords'              => ['max:255'],
            'description'           => ['max:255'],
            'logo'                  => ['required' , 'image' , 'mimes:jpg,png,jpeg'],
            'icon'                  => ['required' , 'image' , 'mimes:jpg,png,jpeg' ],
            'main_lang'             => ['required'],
            'status'                => ['required'],
            'message_maintenance'   => [''],
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
            'sitename.required'     => 'Site Name is required',
            'email.required'        => 'Email is required',
            'logo.required'         => 'Logo is required',
            'icon.required'         => 'Icon is required',
            'main_lang.required'    => 'Main Lang Icon is required',
            'status.required'       => 'Status Icon is required',
        ];
    }
}
