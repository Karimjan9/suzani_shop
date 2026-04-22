@props([
    'label',
    'value',
    'icon',
    'href' => null,
    'external' => false,
])

@php
    $tag = filled($href) ? 'a' : 'div';
@endphp

<{{ $tag }}
    @if (filled($href)) href="{{ $href }}" @endif
    @if ($tag === 'a' && $external) target="_blank" rel="noreferrer" @endif
    {{ $attributes->class(['footer-contact-row', 'is-static' => blank($href)]) }}
>
    <span class="footer-contact-icon" aria-hidden="true">
        <x-home.icon :name="$icon" />
    </span>
    <span class="footer-contact-copy">
        <small>{{ $label }}</small>
        <strong>{{ $value }}</strong>
    </span>
    <span class="footer-contact-action" aria-hidden="true">
        <x-home.icon name="chevron" />
    </span>
</{{ $tag }}>
