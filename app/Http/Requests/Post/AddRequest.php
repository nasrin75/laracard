<?php

namespace App\Http\Requests\Post;

use Illuminate\Foundation\Http\FormRequest;

class AddRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    
    public function rules(): array
    {
        return [
            'title' => 'required|min:3|max:150',
            'content' => 'required|min:3',
            'image' => 'nullable|mimes:png,jpeg,jpg|max:2048',
            'publish_at' => 'required|date_format:Y-m-d H:i:s'
        ];
    }
}
