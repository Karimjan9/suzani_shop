@props([
    'variant' => 'medallion',
])

@if ($variant === 'loom')
    <svg viewBox="0 0 160 96" fill="none" role="presentation" {{ $attributes }}>
        <rect x="46" y="14" width="68" height="68" rx="18" />
        <circle cx="80" cy="48" r="18" />
        <circle cx="80" cy="48" r="7" />
        <path d="M80 18v12M80 66v12M50 48H38M122 48h-12" />
        <path d="M62 30c5 5 5 11 0 18M98 30c-5 5-5 11 0 18" />
        <path d="M62 66c5-5 5-11 0-18M98 66c-5-5-5-11 0-18" />
        <path d="M20 48h18M122 48h18" />
        <circle cx="28" cy="48" r="4" />
        <circle cx="132" cy="48" r="4" />
    </svg>
@elseif ($variant === 'vine')
    <svg viewBox="0 0 148 96" fill="none" role="presentation" {{ $attributes }}>
        <path d="M24 64c10-4 14-16 16-26c5 11 12 20 24 26c-12 5-19 15-24 26c-2-10-6-22-16-26Z" />
        <path d="M84 32c5 11 12 20 24 26c-12 5-19 15-24 26c-5-11-12-21-24-26c12-6 19-15 24-26Z" />
        <circle cx="40" cy="64" r="8" />
        <circle cx="84" cy="58" r="8" />
        <circle cx="116" cy="36" r="8" />
        <path d="M14 20h22M112 76h22M112 20h12M22 76h12" />
    </svg>
@else
    <svg viewBox="0 0 120 120" fill="none" role="presentation" {{ $attributes }}>
        <circle cx="60" cy="60" r="34" />
        <circle cx="60" cy="60" r="14" />
        <path d="M60 14v16M60 90v16M106 60H90M30 60H14" />
        <path d="M28 28l11 11M81 81l11 11M92 28 81 39M39 81 28 92" />
        <path d="M60 34c7 0 13 5 13 12s-6 12-13 12-13 5-13 12 6 12 13 12" />
        <path d="M34 60c0-7 5-13 12-13s12 6 12 13 5 13 12 13 12-6 12-13" />
    </svg>
@endif
