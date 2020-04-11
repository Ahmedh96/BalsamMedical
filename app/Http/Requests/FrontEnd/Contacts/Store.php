<?php

namespace App\Http\Requests\FrontEnd\Contacts;

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
            'name'                      => ['required', 'string', 'max:100' , 'unique:contacts'],
            'email'                     => ['required', 'string', 'email', 'max:150', 'unique:contacts'],
            'type_message'              => ['required'],
            'subject'                   => ['required'],
            'bodyMessage'               => ['required']
            // 'subject'                   => ['sometimes'],
            // 'msg'                       => ['sometimes']
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
            'name.required'             => 'A Name is required',
            'email.required'            => 'A Email is required',
            'type_message.required'     => 'A Type Message is required',
            'subject.required'          => 'A Subject is required',
            'bodyMessage.required'      => 'A Message is required',
        ];
    }
}
