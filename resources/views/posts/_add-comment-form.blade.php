@auth
    <x-card>
        <form method="POST" action="{{ route('comments.store', $post->slug) }}">
            @csrf

            <header class="flex items-center">
                <img src="https://i.pravatar.cc/60?u={{ auth()->id() }}"
                     alt=""
                     width="40"
                     height="40"
                     class="rounded-full">

                <h2 class="ml-4">Want to participate?</h2>
            </header>

            <x-form.textarea
                class="text-sm focus:outline-none focus:ring border-none"
                name="body"
                rows="5"
                placeholder="Quick, thing of something to say!"
                required
            />

            <div class="flex justify-end mt-6 pt-6 border-t border-gray-200">
                <x-form.button type="primary">Post</x-form.button>
            </div>
        </form>
    </x-card>
@else
    <p class="font-semibold">
        <a href="{{ route('register') }}" class="hover:underline">Register</a> or
        <a href="{{ route('login') }}" class="hover:underline">log in</a> to leave a comment.
    </p>
@endauth
