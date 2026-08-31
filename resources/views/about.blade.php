@extends('layouts.public')

@section('title', 'About · chronicle')

@section('content')

{{-- Global Font Optimization --}}
<style>
    /* Heading font - Poppins */
    .heading-font {
        font-family: 'Poppins', ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif !important;
        letter-spacing: -0.02em !important;
    }

    /* Body font - Work Sans */
    .body-font {
        font-family: 'Work Sans', ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif !important;
    }

    /* Rust color variables */
    .about-rust {
        color: #c45a2e;
    }
    .about-rust-bg {
        background-color: #c45a2e;
    }
    .about-rust-border {
        border-color: #c45a2e;
    }
    .about-rust-bg\/10 {
        background-color: rgba(196, 90, 46, 0.1);
    }
    .about-rust-border\/30 {
        border-color: rgba(196, 90, 46, 0.3);
    }
    .about-rust-border\/50 {
        border-color: rgba(196, 90, 46, 0.5);
    }
    .about-rust-hover:hover {
        border-color: #c45a2e;
    }

    /* Replace all #C45A2E with #c45a2e */
    .bg-\[\#C45A2E\] {
        background-color: #c45a2e !important;
    }
    .text-\[\#C45A2E\] {
        color: #c45a2e !important;
    }
    .border-\[\#C45A2E\] {
        border-color: #c45a2e !important;
    }
    .bg-\[\#C45A2E\]\/10 {
        background-color: rgba(196, 90, 46, 0.1) !important;
    }
    .border-\[\#C45A2E\]\/30 {
        border-color: rgba(196, 90, 46, 0.3) !important;
    }
    .border-\[\#C45A2E\]\/50 {
        border-color: rgba(196, 90, 46, 0.5) !important;
    }
    .hover\:border-\[\#C45A2E\]\/50:hover {
        border-color: rgba(196, 90, 46, 0.5) !important;
    }
    .selection\:bg-\[\#C45A2E\] {
        background-color: #c45a2e !important;
    }

    /* Selection color */
    ::selection {
        background-color: rgba(196, 90, 46, 0.3) !important;
        color: #ffffff !important;
    }
</style>

<section class="bg-[#0a0a0a] text-white/75 w-full body-font selection:bg-rust/30 selection:text-white py-12 md:py-20">

    {{-- Main Container --}}
    <div class="max-w-[1400px] mx-auto px-6 md:px-12 space-y-20 md:space-y-28">

        {{-- Section 1: Our Vision (Text Left, Image Right) --}}
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-16 items-center">

            <div class="lg:col-span-6 space-y-5">
                <span class="inline-block text-xs font-semibold uppercase tracking-widest text-rust heading-font">
                    // 01. Purpose
                </span>

                <h2 class="heading-font text-2xl md:text-4xl font-bold text-white leading-tight tracking-tight">
                    Our Vision
                </h2>

                <div class="space-y-3 text-white/50 text-xs md:text-sm leading-relaxed">
                    <p>
                        Writing is hard. It takes time, energy, and deep focus. Many creators spend hours trying to make content that connects across noise and algorithms.
                    </p>

                    <p>
                        We built <span class="font-medium text-white/75">chronicle</span> to restore intentionality to digital publishing—providing a space where long-form essays, technical reflections, and creative fragments flourish without distraction.
                    </p>

                    <p>
                        Our mission is to empower thinkers and builders by giving their voices a clean, elegant platform built for clarity and impact.
                    </p>
                </div>
            </div>

            <div class="lg:col-span-6">
                <div class="relative w-full h-[340px] md:h-[420px] rounded-xl overflow-hidden bg-[#121212] border border-white/5 shadow-2xl group">
                    <img src="https://images.unsplash.com/photo-1522071820081-009f0129c71c?auto=format&fit=crop&w=1200&q=80"
                         alt="Team Collaboration"
                         class="w-full h-full object-cover grayscale brightness-90 group-hover:scale-105 group-hover:grayscale-0 group-hover:brightness-100 transition-all duration-700 ease-out">
                    <div class="absolute inset-0 bg-gradient-to-t from-[#0a0a0a] via-transparent to-transparent pointer-events-none"></div>
                </div>
            </div>
        </div>

        {{-- Section 2: Our Approach (Image Left, Text Right) --}}
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-16 items-center">

            <div class="lg:col-span-6 order-2 lg:order-1">
                <div class="relative w-full h-[340px] md:h-[420px] rounded-xl overflow-hidden bg-[#121212] border border-white/5 shadow-2xl group">
                    <img src="https://images.unsplash.com/photo-1499750310107-5fef28a66643?auto=format&fit=crop&w=1200&q=80"
                         alt="Minimal Writing Setup"
                         class="w-full h-full object-cover grayscale brightness-90 group-hover:scale-105 group-hover:grayscale-0 group-hover:brightness-100 transition-all duration-700 ease-out">
                    <div class="absolute inset-0 bg-gradient-to-t from-[#0a0a0a] via-transparent to-transparent pointer-events-none"></div>
                </div>
            </div>

            <div class="lg:col-span-6 space-y-5 order-1 lg:order-2">
                <span class="inline-block text-xs font-semibold uppercase tracking-widest text-rust heading-font">
                    // 02. Methodology
                </span>

                <h2 class="heading-font text-2xl md:text-4xl font-bold text-white leading-tight tracking-tight">
                    Our Approach
                </h2>

                <div class="space-y-3 text-white/50 text-xs md:text-sm leading-relaxed">
                    <p>
                        We prioritize depth over frequency. In an internet dominated by clickbait and superficial snippets, we champion thoughtful, well-crafted discourse.
                    </p>

                    <p>
                        Every piece featured on chronicle undergoes curated editorial attention to ensure clarity, accuracy, and lasting resonance.
                    </p>

                    <p>
                        By combining modern full-stack performance with classical typography, we deliver an uncompromised reading experience across all devices.
                    </p>
                </div>
            </div>
        </div>

        {{-- Section 3: Our Process (Text Left, Image Right) --}}
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-16 items-center">

            <div class="lg:col-span-6 space-y-5">
                <span class="inline-block text-xs font-semibold uppercase tracking-widest text-rust heading-font">
                    // 03. Workflow
                </span>

                <h2 class="heading-font text-2xl md:text-4xl font-bold text-white leading-tight tracking-tight">
                    Our Process
                </h2>

                <div class="space-y-3 text-white/50 text-xs md:text-sm leading-relaxed">
                    <p>
                        From raw draft to published work, our workflow centers on author autonomy and reader comfort.
                    </p>

                    <p>
                        Contributors draft ideas in an intuitive markdown-friendly environment, supported by structural reviews and aesthetic layout design.
                    </p>

                    <p>
                        The end result is an archive of stories and insights that stand the test of time, free from intrusive popups and unnecessary noise.
                    </p>
                </div>
            </div>

            <div class="lg:col-span-6">
                <div class="relative w-full h-[340px] md:h-[420px] rounded-xl overflow-hidden bg-[#121212] border border-white/5 shadow-2xl group">
                    <img src="https://images.unsplash.com/photo-1455390582262-044cdead277a?auto=format&fit=crop&w=1200&q=80"
                         alt="Drafting and Notes"
                         class="w-full h-full object-cover grayscale brightness-90 group-hover:scale-105 group-hover:grayscale-0 group-hover:brightness-100 transition-all duration-700 ease-out">
                    <div class="absolute inset-0 bg-gradient-to-t from-[#0a0a0a] via-transparent to-transparent pointer-events-none"></div>
                </div>
            </div>
        </div>

        {{-- Feature Highlights Section --}}
        <div class="space-y-10 pt-4">

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

                {{-- Feature 1 --}}
                <div class="bg-[#121212] border border-white/5 rounded-xl p-6 text-center space-y-3 hover:border-rust/50 transition-all duration-300 group">
                    <div class="w-12 h-12 mx-auto rounded-full bg-rust/10 border border-rust/30 flex items-center justify-center text-rust group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                  d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656-.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                        </svg>
                    </div>

                    <h3 class="heading-font text-base font-semibold text-white">
                        Professional Team
                    </h3>

                    <p class="text-[11px] md:text-xs text-white/40 leading-relaxed">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus.
                    </p>
                </div>

                {{-- Feature 2 --}}
                <div class="bg-[#121212] border border-white/5 rounded-xl p-6 text-center space-y-3 hover:border-rust/50 transition-all duration-300 group">
                    <div class="w-12 h-12 mx-auto rounded-full bg-rust/10 border border-rust/30 flex items-center justify-center text-rust group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                  d="M13 10V3L4 14h7v7l9-11h-7z"/>
                        </svg>
                    </div>

                    <h3 class="heading-font text-base font-semibold text-white">
                        Target Oriented
                    </h3>

                    <p class="text-[11px] md:text-xs text-white/40 leading-relaxed">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus.
                    </p>
                </div>

                {{-- Feature 3 --}}
                <div class="bg-[#121212] border border-white/5 rounded-xl p-6 text-center space-y-3 hover:border-rust/50 transition-all duration-300 group">
                    <div class="w-12 h-12 mx-auto rounded-full bg-rust/10 border border-rust/30 flex items-center justify-center text-rust group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                  d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/>
                        </svg>
                    </div>

                    <h3 class="heading-font text-base font-semibold text-white">
                        Success Guarantee
                    </h3>

                    <p class="text-[11px] md:text-xs text-white/40 leading-relaxed">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus.
                    </p>
                </div>

            </div>
        </div>

    </div>
</section>

@endsection

@push('styles')
<style>
    /* Heading font - Poppins */
    .heading-font {
        font-family: 'Poppins', ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif !important;
        letter-spacing: -0.02em !important;
    }

    /* Body font - Work Sans */
    .body-font {
        font-family: 'Work Sans', ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif !important;
    }

    /* Selection color */
    ::selection {
        background-color: rgba(196, 90, 46, 0.3) !important;
        color: #ffffff !important;
    }
</style>
@endpush