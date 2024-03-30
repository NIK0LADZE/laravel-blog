@props(['label' => ''])

<x-form.field>
    @if ($label)
        <x-form.label :for="$attributes['name']" :label="$label" />
    @endif

    <textarea
      {{ $attributes->merge(['class' => 'border border-gray-200 p-2 w-full rounded']) }}
    >{{ old('excerpt', $slot) }}</textarea>
    <x-form.error :name="$attributes['name']" />
</x-form.field>
