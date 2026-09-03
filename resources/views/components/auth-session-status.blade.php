@props(['status'])

@if ($status)
    <div {{ $attributes->merge(['class' => 'font-medium text-sm text-[#7C3AED] bg-[#7C3AED]/10 border border-[#7C3AED]/20 rounded-xl px-4 py-3 text-center transition-all duration-300']) }}>
        {{ $status }}
    </div>
@endif