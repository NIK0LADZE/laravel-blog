@props(['author', 'isPostPage' => false])

<div {{ $attributes->merge(['class' => 'flex items-center text-sm']) }}>
    <img src="/images/lary-avatar.svg" alt="Lary avatar">
    <div class="ml-3{{ $isPostPage ? ' text-left': '' }}">
        <a href="/authors/{{ $author->username }}">
            <h5 class="font-bold">{{ $author->name }}</h5>
        </a>
        <h6>Mascot at Laracasts</h6>
    </div>
</div>
