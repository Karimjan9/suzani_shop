@props([
    'href',
    'label',
    'icon',
    'external' => false,
])

<a
    href="{{ $href }}"
    class="footer-social-link"
    aria-label="{{ $label }}"
    @if ($external) target="_blank" rel="noreferrer" @endif
>
    <x-home.icon :name="$icon" />
    <span class="sr-only">{{ $label }}</span>
</a>
