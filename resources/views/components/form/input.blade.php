@props(['label'])

<x-form.field>
    <x-form.label :for="$attributes['name']" :label="$label" />
    <input class="border border-gray-200 p-2 w-full rounded" {{ $attributes(['value' => old($attributes['name'])]) }}>
    <x-form.error :name="$attributes['name']"  />
</x-form.field>
