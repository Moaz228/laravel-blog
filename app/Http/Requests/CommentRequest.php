<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function rules(): array
    {
        return [
            'post_id' => 'required|exists:posts,id',
            'name' => 'required',
            'comment' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Field is required.',
            'comment.required' => 'Field is required.'
        ];
    }
}
