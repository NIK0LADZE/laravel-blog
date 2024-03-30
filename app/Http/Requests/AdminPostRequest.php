<?php

namespace App\Http\Requests;

use App\Models\Post;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AdminPostRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $post = Post::find($this->route('post'));

        return [
            'title' => 'required|string|max:255',
            'thumbnail' => [$post?->exists ? 'nullable' : 'required', 'image', 'mimes:png,jpg,jpeg'],
            'slug' => ['required', 'string', 'max:255', Rule::unique('posts', 'slug')->ignore($post)],
            'excerpt' => 'required|string',
            'body' => 'required|string',
            'category_id' => ['required', Rule::exists('categories', 'id')],
            'published_at' => ['required', 'date']
        ];
    }
}
