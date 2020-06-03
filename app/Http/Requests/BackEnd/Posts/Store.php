<?php

namespace App\Http\Requests\BackEnd\Posts;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Config;

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
        $rules = [
            'image'                 => ['required' , 'image' , 'mimes:jpg,png,jpeg'],
            'category_id'           => ['required' , 'integer'],
            'meta_keywords'         => ['min:3'],
            'meta_description'      => ["min:3"],
        ];

        foreach (Config::get('translatable.locales') as $locale) {
            $rules += [$locale . '.title' => 'required|string|unique:post_translations,title'];
            $rules += [$locale . '.description' => 'required'];
        }

        return $rules;
    }

                /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'title.required'        => 'Title is required',
            'description.required'  => 'Description is required',
            'image.required'        => 'Image is required',
            'category_id.required'  => 'Category is required',
        ];
    }
}
