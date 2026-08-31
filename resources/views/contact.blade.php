@extends('layouts.public')

@section('title', 'Contact · chronicle')

@push('styles')
    {{-- Chronicle Typography - Poppins & Work Sans --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700;800&family=Work+Sans:wght@400;500;600;700&display=swap"
        rel="stylesheet"
    >

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

        /* Neon tracer for form card */
        .neon-tracer {
            position: relative;
            isolation: isolate;
            overflow: hidden;
            border-radius: 26px;
        }

        .neon-tracer::before {
            content: '';
            position: absolute;
            inset: -50%;
            width: 200%;
            height: 200%;
            background: conic-gradient(
                transparent 0deg,
                transparent 280deg,
                #c45a2e 340deg,
                #d4783e 360deg
            );
            animation: border-spin 6s linear infinite;
            z-index: -1;
        }

        @keyframes border-spin {
            to {
                transform: rotate(360deg);
            }
        }

        @media (prefers-reduced-motion: reduce) {
            .neon-tracer::before {
                animation: none;
            }
        }

        /* Form input styles */
        .contact-input {
            background-color: rgba(10, 10, 10, 0.6) !important;
            border-color: rgba(255, 255, 255, 0.06) !important;
            color: #ffffff !important;
        }

        .contact-input:focus {
            border-color: #c45a2e !important;
            box-shadow: 0 0 0 3px rgba(196, 90, 46, 0.15) !important;
        }

        .contact-input::placeholder {
            color: rgba(255, 255, 255, 0.20) !important;
        }

        .contact-select {
            background-color: rgba(10, 10, 10, 0.6) !important;
            border-color: rgba(255, 255, 255, 0.06) !important;
            color: #ffffff !important;
        }

        .contact-select option {
            background-color: #121212 !important;
            color: #ffffff !important;
        }
    </style>
@endpush

@section('content')
<section class="bg-[#0a0a0a] text-white/75 py-12 md:py-16 relative overflow-hidden min-h-[calc(100vh-80px)] flex items-center body-font selection:bg-rust/30 selection:text-white">
    {{-- Background Glow Accents --}}
    <div class="absolute top-0 right-0 w-1/3 h-full bg-rust/10 blur-3xl pointer-events-none"></div>
    <div class="absolute bottom-0 left-0 w-1/4 h-1/3 bg-rust/5 blur-2xl pointer-events-none"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 w-full">

        {{-- Side-by-Side Flex Layout Centered Vertically --}}
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-12 items-center">

            {{-- Left Column: Contact Details --}}
            <div class="lg:col-span-5 flex flex-col justify-center">

                <p class="text-xs font-semibold uppercase tracking-widest text-rust mb-2 heading-font">
                    // Get in Touch
                </p>

                <h1 class="heading-font text-4xl md:text-5xl lg:text-6xl font-bold leading-tight mb-4 tracking-tight text-white">
                    Contact Us
                </h1>

                <p class="text-white/50 text-base max-w-md mb-8 leading-relaxed">
                    Have a question, suggestion, or just want to say hello? We'd love to hear from you.
                </p>

                <div class="space-y-4 text-sm text-white/60">

                    <div class="flex items-center gap-3">
                        <svg class="w-5 h-5 text-rust shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>

                        <a
                            href="mailto:hello@chronicle.com"
                            class="hover:text-rust transition-colors duration-300"
                        >
                            hello@chronicle.com
                        </a>
                    </div>

                    <div class="flex items-center gap-3">
                        <svg class="w-5 h-5 text-rust shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                        </svg>

                        <span>
                            Support: (+21) 123 456 586
                        </span>
                    </div>

                </div>

                {{-- Back Link --}}
                <div class="mt-8">
                    <a
                        href="{{ route('posts.index') }}"
                        class="inline-flex items-center gap-2 text-sm text-white/30 hover:text-rust transition-colors duration-300 group"
                    >
                        <svg
                            class="w-4 h-4 transition-transform duration-300 group-hover:-translate-x-1"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M10 19l-7-7m0 0l7-7m-7 7h18"
                            />
                        </svg>

                        Back to home
                    </a>
                </div>

            </div>


            {{-- Right Column: Form Outer Card --}}
            <div class="lg:col-span-7">

                <div class="neon-tracer shadow-2xl shadow-rust/15">

                    {{-- Inner Card --}}
                    <div class="relative z-10 bg-[#121212] text-white/75 rounded-[23px] p-8 md:p-10 overflow-hidden border border-white/5">

                        {{-- Top Right Decorative Circles --}}
                        <div class="absolute -top-12 -right-12 w-40 h-40 border border-white/5 rounded-full pointer-events-none"></div>
                        <div class="absolute -top-6 -right-6 w-28 h-28 border border-white/5 rounded-full pointer-events-none"></div>

                        <h2 class="heading-font text-2xl md:text-3xl font-bold mb-1 text-white tracking-tight">
                            We'd love to hear from you!
                        </h2>

                        <p class="text-white/50 text-base mb-8">
                            Let's get in touch
                        </p>

                        @if(session('success'))
                            <div class="mb-6 p-4 bg-green-400/5 border border-green-400/20 rounded-xl text-green-400 text-sm">
                                {{ session('success') }}
                            </div>
                        @endif

                        <form
                            method="POST"
                            action="{{ route('contact.send') }}"
                            class="space-y-4"
                        >
                            @csrf

                            {{-- Full Name & Company --}}
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                                <div>
                                    <label
                                        for="name"
                                        class="block text-xs font-medium text-white/50 mb-1"
                                    >
                                        Full Name
                                    </label>

                                    <input
                                        type="text"
                                        name="name"
                                        id="name"
                                        value="{{ old('name') }}"
                                        required
                                        placeholder="John Doe"
                                        class="w-full px-3.5 py-2.5 rounded-lg contact-input border border-white/5 focus:border-rust focus:ring-1 focus:ring-rust/30 outline-none transition-all duration-300 text-sm text-white bg-[#0a0a0a]/60"
                                    >

                                    @error('name')
                                        <p class="text-red-400 text-xs mt-1">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>


                                <div>
                                    <label
                                        for="company"
                                        class="block text-xs font-medium text-white/50 mb-1"
                                    >
                                        Company
                                    </label>

                                    <input
                                        type="text"
                                        name="company"
                                        id="company"
                                        value="{{ old('company') }}"
                                        placeholder="Acme Inc."
                                        class="w-full px-3.5 py-2.5 rounded-lg contact-input border border-white/5 focus:border-rust focus:ring-1 focus:ring-rust/30 outline-none transition-all duration-300 text-sm text-white bg-[#0a0a0a]/60"
                                    >

                                    @error('company')
                                        <p class="text-red-400 text-xs mt-1">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>

                            </div>


                            {{-- Email & Phone --}}
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                                <div>
                                    <label
                                        for="email"
                                        class="block text-xs font-medium text-white/50 mb-1"
                                    >
                                        Email
                                    </label>

                                    <div class="relative">

                                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-white/20">
                                            <svg
                                                class="w-4 h-4"
                                                fill="none"
                                                stroke="currentColor"
                                                viewBox="0 0 24 24"
                                            >
                                                <path
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    stroke-width="2"
                                                    d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"
                                                />
                                            </svg>
                                        </div>

                                        <input
                                            type="email"
                                            name="email"
                                            id="email"
                                            value="{{ old('email') }}"
                                            required
                                            placeholder="you@example.com"
                                            class="w-full pl-9 pr-3.5 py-2.5 rounded-lg contact-input border border-white/5 focus:border-rust focus:ring-1 focus:ring-rust/30 outline-none transition-all duration-300 text-sm text-white bg-[#0a0a0a]/60"
                                        >

                                    </div>

                                    @error('email')
                                        <p class="text-red-400 text-xs mt-1">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>


                                <div>
                                    <label
                                        for="phone"
                                        class="block text-xs font-medium text-white/50 mb-1"
                                    >
                                        Phone number
                                    </label>

                                    <div class="flex rounded-lg border border-white/5 focus-within:border-rust focus-within:ring-1 focus-within:ring-rust/30 transition-all duration-300 bg-[#0a0a0a]/60 overflow-hidden">

                                        <select
                                            name="country_code"
                                            class="px-2 py-2.5 text-xs text-white/50 bg-transparent border-r border-white/5 outline-none contact-select"
                                        >
                                            <option value="US">US</option>
                                            <option value="UK">UK</option>
                                            <option value="PK">PK</option>
                                        </select>

                                        <input
                                            type="tel"
                                            name="phone"
                                            id="phone"
                                            value="{{ old('phone') }}"
                                            placeholder="+1 (555) 000-0000"
                                            class="w-full px-3 py-2.5 text-sm text-white outline-none bg-transparent"
                                        >

                                    </div>

                                    @error('phone')
                                        <p class="text-red-400 text-xs mt-1">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>

                            </div>


                            {{-- Address --}}
                            <div>

                                <label
                                    for="address"
                                    class="block text-xs font-medium text-white/50 mb-1"
                                >
                                    Address
                                </label>

                                <input
                                    type="text"
                                    name="address"
                                    id="address"
                                    value="{{ old('address') }}"
                                    placeholder="123 Main St, City"
                                    class="w-full px-3.5 py-2.5 rounded-lg contact-input border border-white/5 focus:border-rust focus:ring-1 focus:ring-rust/30 outline-none transition-all duration-300 text-sm text-white bg-[#0a0a0a]/60"
                                >

                                @error('address')
                                    <p class="text-red-400 text-xs mt-1">
                                        {{ $message }}
                                    </p>
                                @enderror

                            </div>


                            {{-- Message --}}
                            <div>

                                <label
                                    for="message"
                                    class="block text-xs font-medium text-white/50 mb-1"
                                >
                                    Your Message
                                </label>

                                <textarea
                                    name="message"
                                    id="message"
                                    rows="3"
                                    required
                                    placeholder="Type your message here..."
                                    class="w-full px-3.5 py-2.5 rounded-lg contact-input border border-white/5 focus:border-rust focus:ring-1 focus:ring-rust/30 outline-none transition-all duration-300 text-sm text-white bg-[#0a0a0a]/60 resize-none"
                                >{{ old('message') }}</textarea>

                                @error('message')
                                    <p class="text-red-400 text-xs mt-1">
                                        {{ $message }}
                                    </p>
                                @enderror

                            </div>


                            {{-- Submit Button --}}
                            <div class="pt-2">

                                <button
                                    type="submit"
                                    class="px-6 py-2.5 bg-rust text-white text-sm font-semibold rounded-lg hover:bg-rust/80 transition-all duration-300 shadow-lg shadow-rust/20 hover:shadow-rust/40 transform hover:scale-[1.02] heading-font"
                                >
                                    Send Message
                                </button>

                            </div>

                        </form>

                    </div>
                </div>

            </div>

        </div>
    </div>
</section>
@endsection