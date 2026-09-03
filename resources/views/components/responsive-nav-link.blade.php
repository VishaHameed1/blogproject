@props(['active'])

@php
$classes = ($active ?? false)
            ? 'block w-full ps-3 pe-4 py-2 border-l-4 border-[#7C3AED] text-start text-sm font-medium text-[#7C3AED] bg-[#7C3AED]/10 focus:outline-none focus:text-[#6D28D9] focus:bg-[#7C3AED]/20 focus:border-[#6D28D9] transition duration-200 ease-in-out body-font'
            : 'block w-full ps-3 pe-4 py-2 border-l-4 border-transparent text-start text-sm font-medium text-[#6B7280] dark:text-white/60 hover:text-[#1A1A2E] dark:hover:text-white hover:bg-[#F8F9FA] dark:hover:bg-[#1A1A2E] hover:border-[#7C3AED]/30 dark:hover:border-[#7C3AED]/30 focus:outline-none focus:text-[#1A1A2E] dark:focus:text-white focus:bg-[#F8F9FA] dark:focus:bg-[#1A1A2E] focus:border-[#7C3AED]/30 dark:focus:border-[#7C3AED]/30 transition duration-200 ease-in-out body-font';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>