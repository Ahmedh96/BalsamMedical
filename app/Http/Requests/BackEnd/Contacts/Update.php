<?php

namespace App\Http\Requests\BackEnd\Contacts;

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
            'email'                     => ['required', 'string', 'email', 'max:255', 'unique:contacts,email,'.$this->contact],
            'type_message'              => ['required'],
            'subject'                   => ['required'],
            'message'                   => ['required']
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
            'message.required'          => 'A Message is required',
        ];
    }
}
