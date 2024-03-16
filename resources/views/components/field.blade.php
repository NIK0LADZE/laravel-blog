@props(['label', 'message'])

<div class="mb-6">
    <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="{{ $attributes['name'] }}">
        {{ $label }}
    </label>

    <input value="{{ old($attributes['name']) }}" class="border border-gray-400 p-2 w-full" {{ $attributes }}>

    @error($attributes['name'])
        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
    @enderror
</div>
