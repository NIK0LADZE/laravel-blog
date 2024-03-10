@props(['posts'])

<x-post-main-card :post="$posts->first()" />

@if ($posts->count() > 1)
    <div class="lg:grid lg:grid-cols-6">
        @foreach ($posts->skip(1) as $post)
            @php($class = $loop->iteration >= 3 ? "col-span-2" : "col-span-3")
            <x-post-card :post="$post" class="{{ $class }}" />
        @endforeach
    </div>
@endif
