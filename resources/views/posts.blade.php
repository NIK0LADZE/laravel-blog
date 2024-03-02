<x-layout>
    @foreach ($posts as $post)
        <article>
            <h1>
                <a href="/posts/{{ $post->slug }}">
                    {{ $post->title }}
                </a>
            </h1>
            <p>
                <a href="/categories/{{ $post->category->slug }}">
                    {{ $post->category->name }}
                </a>
            </p>
            {{ $post->excerpt }}
            <p>{{ date_format(date_create($post->published_at), "j M Y") }}</p>
            <p>
                <a href="/authors/{{ $post->author->username }}">
                    {{ $post->author->name }}
                </a>
            </p>
        </article>
    @endforeach
</x-layout>
