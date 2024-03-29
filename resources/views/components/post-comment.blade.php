@props(['post', 'comment'])

<x-card class="bg-gray-50">
    <article class="flex space-x-4">
        <div class="flex-shrink-0">
            <img src="https://i.pravatar.cc/60?u={{ $comment->id }}" alt="" width="60" height="60" class="rounded-xl">
        </div>

        <div class="w-full">
            <header class="mb-4">
                <div class="flex justify-between">
                    <div>
                        <h3 class="font-bold">{{ $comment->author->username }}</h3>

                        <p class="text-xs">
                            Posted
                            <time>{{ $comment->created_at }}</time>
                        </p>
                    </div>

                    @if ($comment->author->id === request()->user()?->id)
                        <form action="{{ route('comments.destroy', $post->slug) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <input type="text" name="comment_id" value="{{ $comment->id }}" hidden>
                            <x-form.button type="danger">Delete</x-form.button>
                        </form>
                    @endif
                </div>
            </header>

            <p>
                {!! nl2br($comment->body) !!}
            </p>
        </div>
    </article>
</x-card>
