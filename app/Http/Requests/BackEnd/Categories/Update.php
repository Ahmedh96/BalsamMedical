<?php

namespace App\Http\Requests\BackEnd\Categories;

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
            'meta_keywords'         => ['min:3'],
            'meta_description'      => ["min:3"],
        ];
        foreach (Config::get('translatable.locales') as $locale) {
            $rules += [$locale . '.name' => ['required', 'string', Rule::unique('category_translations', 'name')->whereNot('category_id', $this->category)]];
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
            'name.required' => 'Name is required',
        ];
    }
}
