<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogPostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'post-title' => 'required',
            'author-name' => 'required',
            'body' => 'required'
        ];
    }

    public function messages(){
        return[
             'post-title.required' => 'Field is required.',
            'author-name.required' => 'Field is required.',
            'body.required' => 'Field is required.'
        ];
    }
}
