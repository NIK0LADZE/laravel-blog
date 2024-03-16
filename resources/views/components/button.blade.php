@props(['type'])

@php
    $colors = ['primary' => 'bg-blue-500', 'danger' => 'bg-red-500'];
@endphp

<button type="submit"
        class="{{ $colors[$type] }} text-white uppercase font-semibold text-xs py-2 px-10 rounded-2xl hover:bg-blue-600"
>
    {{ $slot }}
</button>
