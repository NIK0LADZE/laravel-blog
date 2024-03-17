<x-dropdown>
    <x-slot name="trigger">
        <button class="py-2 pl-3 pr-9 text-sm font-semibold w-full lg:w-40 text-left flex lg:inline-flex">
            {{ isset($currentCategory) ? ucwords($currentCategory) : 'Categories' }}

            <x-icon name="down-arrow" class="absolute pointer-events-none" style="right: 12px;"/>
        </button>
    </x-slot>

    <x-dropdown-item href="{{ route('home') }}" :active="request()->routeIs('home')">All</x-dropdown-item>

    @foreach ($categories as $category)
        <x-dropdown-item
            href="{{ route('category.posts', $category->slug) }}"
            :active="$currentCategory === $category->name"
        >{{ ucwords($category->name) }}</x-dropdown-item>
    @endforeach
</x-dropdown>