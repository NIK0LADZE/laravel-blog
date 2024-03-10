@props(['type' => ''])

@php
    switch ($type) {
        case 'primary':
            $colorClass = 'bg-blue-500';
            break;
        case 'danger':
            $colorClass = 'bg-red-500';
            break;
        default:
            $colorClass = 'bg-blue-500';
            break;
    }
@endphp

<button type="submit"
        class="{{ $colorClass }} text-white uppercase font-semibold text-xs py-2 px-10 rounded-2xl hover:bg-blue-600"
>
    {{ $slot }}
</button>
