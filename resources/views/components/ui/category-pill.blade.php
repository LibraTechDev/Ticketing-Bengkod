@props(['label', 'active' => false])

<span {{ $attributes->merge([
    'class' => $active
        ? 'badge badge-primary badge-lg font-semibold'
        : 'badge badge-outline badge-lg hover:badge-primary transition-colors'
]) }}>
    {{ $label }}
</span>