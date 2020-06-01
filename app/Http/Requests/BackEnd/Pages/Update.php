<?php

namespace App\Http\Requests\BackEnd\Pages;

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
            'meta_keywords'     => ['max:255'],
            'meta_description'  => ['max:255'],
        ];
        foreach (Config::get('translatable.locales') as $locale) {
            $rules += [$locale . '.name' => ['required', 'string', Rule::unique('page_translations', 'name')->whereNot('page_id', $this->page)]];
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
