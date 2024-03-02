@props(['post'])
<article {{ $attributes->merge(['class' => 'transition-colors duration-300 hover:bg-gray-100 border border-black border-opacity-0 hover:border-opacity-5 rounded-xl']) }}>
    <div class="flex flex-col h-full py-6 px-5">
        <div>
            <img src="/images/illustration-5.png" alt="Blog Post illustration" class="rounded-xl">
        </div>

        <div class="mt-8 flex flex-col flex-1 justify-between">
            <div>
                <header>
                    <x-category-label :category="$post->category" />

                    <div class="mt-4">
                        <h1 class="text-3xl">
                            <a href="/posts/{{ $post->slug }}">
                                {{ $post->title }}
                            </a>
                        </h1>

                        <span class="mt-2 block text-gray-400 text-xs">
                            Published <time>{{ $post->published_at->diffForHumans() }}</time>
                        </span>
                    </div>
                </header>

                <div class="text-sm mt-4">
                    <p>
                        {{ $post->excerpt }}
                    </p>
                </div>
            </div>

            <footer class="flex justify-between items-center mt-8">
                <x-author-card :author="$post->author" />

                <div>
                    <a href="/posts/{{ $post->slug }}" class="transition-colors duration-300 text-xs font-semibold bg-gray-200 hover:bg-gray-300 rounded-full py-2 px-8">
                        Read More
                    </a>
                </div>
            </footer>
        </div>
    </div>
</article>
