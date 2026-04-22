@props([
    'label',
    'value',
    'class' => 'about-stat-card',
])

<div {{ $attributes->class($class) }}>
    <strong>{{ $value }}</strong>
    <span>{{ $label }}</span>
</div>
