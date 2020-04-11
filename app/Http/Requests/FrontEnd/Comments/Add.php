<?php

namespace App\Http\Requests\FrontEnd\Comments;

use Illuminate\Foundation\Http\FormRequest;

class Add extends FormRequest
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
            'post_id'           => ['required'],
            'comment'           => ['required'],
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
            'post_id.required' => 'Post is required',
            'comment.required' => 'Comment is required',
        ];
    }
}
