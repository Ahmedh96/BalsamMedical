<?php

namespace App\Http\Requests\BackEnd\Categories;

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
            'name'              => ['required', 'string', 'min:3' , 'max:100'],
            'meta_keywords'     => ['max:255'],
            'meta_description'  => ['max:255'],
            'parent_id'         => ['sometimes'],
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
            'name.required' => 'Name is required',
        ];
    }
}