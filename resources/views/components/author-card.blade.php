@props(['author', 'authorInfoClass'])
<div {{ $attributes->merge(['class' => 'flex items-center text-sm']) }}>
    <img src="/images/lary-avatar.svg" alt="Lary avatar">
    <div class="ml-3 {{ $authorInfoClass }}">
        <h5 class="font-bold">{{ $author->name }}</h5>
        <h6>Mascot at Laracasts</h6>
    </div>
</div>
