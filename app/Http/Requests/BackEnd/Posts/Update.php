<?php

namespace App\Http\Requests\BackEnd\Posts;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Config;
use Illuminate\Validation\Rule;

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
        $rules = [
            'image'                 => ['sometimes' , 'image' , 'mimes:jpg,png,jpeg'],
            'category_id'           => ['required' , 'integer'],
            'meta_keywords'         => ['max:255'],
            'meta_description'      => ['max:255'],
        ];

        foreach (Config::get('translatable.locales') as $locale) {
            $rules += [$locale . '.title' => ['required', 'string', Rule::unique('post_translations', 'title')->whereNot('post_id', $this->post)]];
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
            'category_id.required'  => 'Category is required',
        ];
    }
}
