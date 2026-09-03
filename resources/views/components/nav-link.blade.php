@props(['active'])

@php
$classes = ($active ?? false)
? 'inline-flex items-center px-1 pt-1 border-b-2 border-[var(--color-primary)] text-sm font-medium leading-5 text-[var(--color-text-primary)] focus:outline-none focus:border-[var(--color-primary-hover)] transition duration-200 ease-in-out heading-font'
: 'inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-[var(--color-text-secondary)] hover:text-[var(--color-text-primary)] hover:border-[var(--color-primary-soft)] focus:outline-none focus:text-[var(--color-text-primary)] focus:border-[var(--color-primary-soft)] transition duration-200 ease-in-out heading-font';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>