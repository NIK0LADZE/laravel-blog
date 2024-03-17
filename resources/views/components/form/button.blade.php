@props(['type'])

@php
    $colors = ['primary' => 'bg-blue-500 hover:bg-blue-600', 'danger' => 'bg-red-500 hover:bg-red-600'];
@endphp

<button type="submit"
        {{ $attributes->twMerge(['class' => "$colors[$type] text-white uppercase font-semibold text-xs py-2 px-10 rounded-2xl"]) }}
>
    {{ $slot }}
</button>
