@props(['heading'])

<section class="py-8 max-w-4xl mx-auto">
    <h1 class="text-lg font-bold mb-4 ml-48">
        {{ $heading }}
    </h1>

    <div class="flex">
        <aside class="w-48 flex-shrink-0">
            <ul>
                <li>
                    <a href="{{ route('admin.posts.index') }}" class="{{ request()->routeIs('admin.posts.index') ? 'text-blue-500' : '' }}">All Posts</a>
                </li>

                <li>
                    <a href="{{ route('admin.posts.create') }}" class="{{ request()->routeIs('admin.posts.create') ? 'text-blue-500' : '' }}">New Post</a>
                </li>
            </ul>
        </aside>

        <main class="flex-1">
            <div {{ $attributes->twMerge(['class' => "border border-gray-200 p-6 pt-0 rounded-xl"]) }}>
                {{ $slot }}
            </div>
        </main>
    </div>
</section>
