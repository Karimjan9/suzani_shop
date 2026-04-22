@props([
    'name',
    'class' => '',
])

<svg viewBox="0 0 24 24" {{ $attributes->class($class)->merge(['aria-hidden' => 'true']) }}>
    @switch($name)
        @case('cart')
            <path d="M7 18h10l2-8H6.5L5.8 7.4A1.7 1.7 0 0 0 4.2 6H3" />
            <circle cx="9" cy="20" r="1.2" />
            <circle cx="17" cy="20" r="1.2" />
            @break

        @case('telegram')
            <path d="M21 4 3.8 10.6c-.9.4-.9 1.7.1 2l4.5 1.4 1.7 5c.3 1 1.7 1.1 2.2.2L21 4Z" />
            <path d="m8.4 14 9.9-7.6" />
            @break

        @case('phone')
            <path d="M6.6 4.8h2.8l1.4 4-1.8 1.5a15 15 0 0 0 4.6 4.6l1.5-1.8 4 1.4v2.8c0 .7-.5 1.3-1.2 1.4a14.8 14.8 0 0 1-13.4-13.4c.1-.7.7-1.2 1.4-1.2Z" />
            @break

        @case('menu')
            <path d="M4.5 6.5h15" />
            <path d="M4.5 12h15" />
            <path d="M4.5 17.5h15" />
            @break

        @case('instagram')
            <rect x="4.5" y="4.5" width="15" height="15" rx="4.2" />
            <circle cx="12" cy="12" r="3.5" />
            <circle cx="17.2" cy="6.8" r="1" fill="currentColor" stroke="none" />
            @break

        @case('location')
            <path d="M12 21s6-5.6 6-11a6 6 0 1 0-12 0c0 5.4 6 11 6 11Z" />
            <circle cx="12" cy="10" r="2.2" />
            @break

        @case('clock')
            <circle cx="12" cy="12" r="8" />
            <path d="M12 7.8v4.7l3.1 1.8" />
            @break

        @case('chevron')
            <path d="M8 6.5 15 12l-7 5.5" />
            @break

        @case('craft')
            <path d="m12 3 3.7 3.7L12 10.4 8.3 6.7 12 3Z" />
            <path d="m6.2 8.8 3.6 3.6-3.6 3.6-3.6-3.6 3.6-3.6Z" />
            <path d="m17.8 8.8 3.6 3.6-3.6 3.6-3.6-3.6 3.6-3.6Z" />
            <path d="m12 14.4 3.7 3.7L12 21.8l-3.7-3.7 3.7-3.7Z" />
            @break
    @endswitch
</svg>
