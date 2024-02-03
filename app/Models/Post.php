<?php

namespace App\Models;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;

class Post
{
    public static function all()
    {
        $posts = File::files(resource_path("posts/"));

        return collect($posts)
            ->map(fn ($post) => YamlFrontMatter::parseFile($post))
            ->sortByDesc(fn ($post) => $post->date);
    }

    public static function findOrFail($slug)
    {
        $post = static::all()->first(fn ($post) => $post->slug === $slug);

        return $post ? cache()->remember("posts.{$slug}", 5, fn () => $post) : throw new ModelNotFoundException();
    }
}
