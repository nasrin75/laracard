<?php

namespace App\Http\Requests\Post;

use Illuminate\Foundation\Http\FormRequest;

class EditRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->check();
    }

    public function rules(): array
    {
        return [
            'title' => 'nullable|min:3|max:150',
            'content' => 'nullable|min:3',
            'image' => 'nullable|mimes:png,jpeg,jpg|max:2048',
            'publish_at' => 'nullable|date_format:Y-m-d H:i:s'
        ];
    }
}
