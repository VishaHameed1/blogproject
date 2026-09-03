@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-semibold text-sm text-[#1A1A2E] dark:text-white/70 mb-2 heading-font tracking-wide']) }}>
    {{ $value ?? $slot }}
</label>