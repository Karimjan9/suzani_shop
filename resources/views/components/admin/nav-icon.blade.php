@props([
    'name' => 'default',
])

<svg
    viewBox="0 0 24 24"
    fill="none"
    stroke="currentColor"
    stroke-width="1.8"
    stroke-linecap="round"
    stroke-linejoin="round"
    aria-hidden="true"
    focusable="false"
    {{ $attributes }}
>
    @switch($name)
        @case('dashboard')
            <rect x="3.5" y="3.5" width="7" height="7" rx="1.5" />
            <rect x="13.5" y="3.5" width="7" height="4.5" rx="1.5" />
            <rect x="13.5" y="10.5" width="7" height="10" rx="1.5" />
            <rect x="3.5" y="12" width="7" height="8.5" rx="1.5" />
            @break

        @case('orders')
            <path d="M7 7h13l-1.3 6.2a2 2 0 0 1-2 1.6H9.2a2 2 0 0 1-2-1.5L5.6 4.8A1.4 1.4 0 0 0 4.2 3.7H3.5" />
            <circle cx="10" cy="19" r="1.2" />
            <circle cx="17" cy="19" r="1.2" />
            @break

        @case('custom-orders')
            <path d="M6 18.5 18.5 6" />
            <path d="m14.5 5.5 4 4" />
            <path d="M5 19l3.5-.8L5.8 15.5 5 19Z" />
            <path d="M13 8h-1.5a3.5 3.5 0 0 0-3.5 3.5V13" />
            @break

        @case('customers')
            <path d="M15.5 19.5v-1.2A3.3 3.3 0 0 0 12.2 15h-4.4a3.3 3.3 0 0 0-3.3 3.3v1.2" />
            <circle cx="10" cy="9" r="3" />
            <path d="M18.5 19.5v-1a3 3 0 0 0-2.2-2.9" />
            <path d="M15.8 6.2a2.8 2.8 0 1 1 0 5.6" />
            @break

        @case('products')
            <path d="M12 3.8 19.3 8v8L12 20.2 4.7 16V8L12 3.8Z" />
            <path d="M12 3.8v8.2" />
            <path d="m19.3 8-7.3 4-7.3-4" />
            @break

        @case('categories')
            <path d="M12 4 4 8l8 4 8-4-8-4Z" />
            <path d="m4 12 8 4 8-4" />
            <path d="m4 16 8 4 8-4" />
            @break

        @case('content-blocks')
            <rect x="4" y="5" width="16" height="14" rx="2.5" />
            <path d="M8 9h8" />
            <path d="M8 13h6" />
            <path d="M8 17h4" />
            @break

        @case('contact-settings')
            <path d="M6.8 6.8a2.7 2.7 0 0 1 3.8 0l.6.6a1.6 1.6 0 0 1 0 2.3l-1 1a11 11 0 0 0 3.7 3.7l1-1a1.6 1.6 0 0 1 2.3 0l.6.6a2.7 2.7 0 0 1 0 3.8l-.6.6a3.4 3.4 0 0 1-3.5.9c-5.2-1.7-9.4-5.9-11.1-11a3.4 3.4 0 0 1 .9-3.6l.6-.6Z" />
            @break

        @case('hero-banners')
            <path d="M4 18V7.5A2.5 2.5 0 0 1 6.5 5H17" />
            <path d="M20 19H8a2 2 0 0 1-2-2V8" />
            <path d="m10 12 1.8 1.8L15 10.5l3 3" />
            <circle cx="15.5" cy="8.5" r="1.2" />
            @break

        @case('portfolio-items')
            <rect x="4" y="4.5" width="16" height="15" rx="2.5" />
            <path d="m8 15 2.5-2.5L13 15l1.5-1.5L17 16" />
            <path d="M8 8.5h8" />
            @break

        @case('feedback')
            <path d="M7 17.5 4.5 20V6.8A2.8 2.8 0 0 1 7.3 4h9.4a2.8 2.8 0 0 1 2.8 2.8v7.4a2.8 2.8 0 0 1-2.8 2.8H7Z" />
            <path d="M8 9h8" />
            <path d="M8 13h5" />
            @break

        @case('notification-logs')
            <path d="M9.2 18h5.6" />
            <path d="M10.2 20.2a2.1 2.1 0 0 0 3.6 0" />
            <path d="M6.5 16.5h11l-1.1-1.7a4 4 0 0 1-.6-2.1V10a4.8 4.8 0 1 0-9.6 0v2.7a4 4 0 0 1-.6 2.1l-1.1 1.7Z" />
            @break

        @case('site-settings')
            <circle cx="12" cy="12" r="2.5" />
            <path d="M19 12a7 7 0 0 0-.1-1l2-1.5-2-3.5-2.4 1a7.2 7.2 0 0 0-1.8-1l-.4-2.5H9.7l-.4 2.5a7.2 7.2 0 0 0-1.8 1l-2.4-1-2 3.5 2 1.5a7 7 0 0 0 0 2L3 14.5l2 3.5 2.4-1a7.2 7.2 0 0 0 1.8 1l.4 2.5h4.6l.4-2.5a7.2 7.2 0 0 0 1.8-1l2.4 1 2-3.5-1.9-1.5c.1-.3.1-.7.1-1Z" />
            @break

        @case('users')
            <path d="M5 19v-1a4 4 0 0 1 4-4h6a4 4 0 0 1 4 4v1" />
            <circle cx="12" cy="8.5" r="3.5" />
            @break

        @default
            <rect x="4.5" y="4.5" width="15" height="15" rx="3" />
            <path d="M8.5 12h7" />
            <path d="M12 8.5v7" />
    @endswitch
</svg>
