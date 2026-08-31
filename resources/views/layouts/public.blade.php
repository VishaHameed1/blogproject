<!DOCTYPE html>
<html lang="en" class="dark">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'chronicle · thoughtful writing')</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <!-- Updated Fonts: Poppins for headings, Work Sans for body -->
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700;800&family=Work+Sans:wght@400;500;600;700&display=swap"
        rel="stylesheet"
    >

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <script src="https://cdn.tailwindcss.com"></script>

    <script>
        tailwind.config = {
            darkMode: 'class',

            theme: {
                extend: {

                    fontFamily: {
                        sans: [
                            'Work Sans',
                            'ui-sans-serif',
                            'system-ui',
                            'sans-serif'
                        ],

                        serif: [
                            'Poppins',
                            'ui-serif',
                            'Georgia',
                            'serif'
                        ],

                        heading: [
                            'Poppins',
                            'ui-sans-serif',
                            'system-ui',
                            'sans-serif'
                        ]
                    },

                    colors: {

                        rust: {
                            50: '#fff7ed',
                            100: '#ffedd5',
                            300: '#fdba74',
                            400: '#c45a2e',
                            500: '#c45a2e',
                            600: '#c45a2e',
                            700: '#a0461a',
                            800: '#7a3412',
                            900: '#5a260d',
                            950: '#431407',
                        },

                        charcoal: {
                            800: '#121212',
                            900: '#121212',
                            950: '#0a0a0a',
                        }
                    },

                    keyframes: {

                        'color-pulse': {
                            '0%, 100%': {
                                color: '#c45a2e'
                            },

                            '50%': {
                                color: '#a0461a'
                            }
                        },

                        'glow': {
                            '0%, 100%': {
                                opacity: '0.4'
                            },

                            '50%': {
                                opacity: '0.8'
                            }
                        }
                    },

                    animation: {
                        'color-pulse':
                            'color-pulse 4s infinite ease-in-out',

                        'glow':
                            'glow 3s infinite ease-in-out',
                    }
                }
            }
        }
    </script>

    <script src="https://unpkg.com/htmx.org@1.9.12"></script>

    <style>
        /* Apply Poppins to headings */
        h1, h2, h3, h4, h5, h6,
        .heading-font,
        .text-2xl, .text-3xl {
            font-family: 'Poppins', ui-sans-serif, system-ui, sans-serif !important;
            letter-spacing: -0.02em !important;
        }

        /* Input minimum font size for mobile */
        input, select, textarea {
            font-size: 16px !important;
        }

        /* Post list hover effect */
        .post-item {
            transition: all 0.2s ease;
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
            padding: 1.5rem 0;
        }
        .post-item:last-child {
            border-bottom: none;
        }
        .post-item:hover {
            padding-left: 0.75rem;
            border-color: rgba(196, 90, 46, 0.2);
        }
        .post-item:hover .post-title {
            color: #c45a2e;
        }
        .post-item:hover .post-arrow {
            opacity: 1;
            transform: translateX(4px);
        }
        .post-arrow {
            opacity: 0;
            transition: all 0.2s ease;
        }

        /* Scrollbar styling */
        ::-webkit-scrollbar {
            width: 6px;
        }
        ::-webkit-scrollbar-track {
            background: #0a0a0a;
        }
        ::-webkit-scrollbar-thumb {
            background: #c45a2e;
            border-radius: 3px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #a0461a;
        }

        /* Override default colors - CHARCOAL backgrounds (not pure black) */
        body, .min-h-screen, main, footer, header {
            background-color: #0a0a0a !important;
        }
        
        .bg-charcoal-950, .bg-charcoal-900, .bg-charcoal-800,
        .bg-\[\#0f0e0d\], .bg-\[\#161513\], .bg-\[\#141311\],
        .bg-stone-800, .bg-zinc-800 {
            background-color: #0a0a0a !important;
        }

        /* Card/container backgrounds to charcoal */
        .bg-\[\#121212\], .bg-\[\#1c1a17\], .bg-rust-950\/40,
        .bg-rust-950\/60, .bg-rust-950\/70 {
            background-color: #121212 !important;
        }

        /* RUST colors */
        .border-rust-950\/40, .border-rust-950\/50, .border-rust-950\/80,
        .border-rust\/10, .border-rust\/20, .border-rust\/40 {
            border-color: rgba(196, 90, 46, 0.1) !important;
        }
        .border-rust-800, .border-rust-800\/40 {
            border-color: #c45a2e !important;
        }
        .hover\:border-rust-800:hover, .hover\:border-rust:hover,
        .hover\:border-rust\/40:hover {
            border-color: #c45a2e !important;
        }

        .text-rust-400, .text-rust-500, .text-rust-300,
        .text-rust, .text-amber-400, .text-amber-500 {
            color: #c45a2e !important;
        }
        .hover\:text-rust-300:hover, .hover\:text-rust-400:hover,
        .hover\:text-rust:hover, .hover\:text-amber-400:hover {
            color: #c45a2e !important;
        }
        .group-hover\:text-amber-400:hover, .group-hover\:text-rust:hover {
            color: #c45a2e !important;
        }

        .bg-rust-600, .bg-rust, .bg-amber-500, .bg-amber-600 {
            background-color: #c45a2e !important;
        }
        .hover\:bg-rust-500:hover, .hover\:bg-rust\/80:hover,
        .hover\:bg-amber-500:hover, .hover\:bg-amber-600:hover {
            background-color: rgba(196, 90, 46, 0.8) !important;
        }
        .hover\:bg-rust-700:hover {
            background-color: #a0461a !important;
        }

        .focus\:border-rust-500:focus, .focus\:border-rust:focus {
            border-color: #c45a2e !important;
        }
        .focus\:ring-rust-500\/30:focus, .focus\:ring-rust\/30:focus {
            --tw-ring-color: rgba(196, 90, 46, 0.3) !important;
        }

        .from-rust-600, .to-amber-600 {
            --tw-gradient-from: #c45a2e !important;
            --tw-gradient-to: #c45a2e !important;
        }
        .hover\:from-rust-500:hover, .hover\:to-amber-500:hover {
            --tw-gradient-from: rgba(196, 90, 46, 0.8) !important;
            --tw-gradient-to: rgba(196, 90, 46, 0.8) !important;
        }

        .bg-rust-600\/20, .bg-rust\/20 {
            background-color: rgba(196, 90, 46, 0.2) !important;
        }
        .bg-rust-600\/5, .bg-rust\/5 {
            background-color: rgba(196, 90, 46, 0.05) !important;
        }
        .bg-rust\/10 {
            background-color: rgba(196, 90, 46, 0.1) !important;
        }
        .hover\:bg-rust\/10:hover {
            background-color: rgba(196, 90, 46, 0.1) !important;
        }
        .hover\:bg-rust\/20:hover {
            background-color: rgba(196, 90, 46, 0.2) !important;
        }

        .shadow-rust-600\/20, .shadow-rust\/20 {
            --tw-shadow-color: rgba(196, 90, 46, 0.2) !important;
        }
        .shadow-rust\/40 {
            --tw-shadow-color: rgba(196, 90, 46, 0.4) !important;
        }

        .selection\:bg-rust-600::selection, .selection\:bg-rust::selection {
            background-color: #c45a2e !important;
        }
        ::selection {
            background-color: #c45a2e !important;
            color: #ffffff !important;
        }

        /* Text colors - White variations */
        .text-stone-100, .text-white { color: #ffffff !important; }
        .text-stone-200, .text-stone-300, .text-gray-200, .text-gray-300 {
            color: rgba(255, 255, 255, 0.75) !important;
        }
        .text-stone-400, .text-gray-400, .text-zinc-400 {
            color: rgba(255, 255, 255, 0.5) !important;
        }
        .text-stone-500, .text-gray-500, .text-zinc-500 {
            color: rgba(255, 255, 255, 0.3) !important;
        }
        .hover\:text-stone-100:hover, .hover\:text-white:hover {
            color: #ffffff !important;
        }

        /* Border colors - White variations */
        .border-stone-800, .border-zinc-800,
        .border-stone-800\/80, .border-zinc-800\/80,
        .border-stone-700\/80, .border-zinc-700\/80,
        .border-stone-700, .border-zinc-700 {
            border-color: rgba(255, 255, 255, 0.05) !important;
        }
        .border-white\/5 {
            border-color: rgba(255, 255, 255, 0.05) !important;
        }
        .hover\:border-stone-700:hover, .group-hover\:border-stone-700:hover {
            border-color: rgba(255, 255, 255, 0.05) !important;
        }

        /* Background overrides - white variations */
        .bg-stone-800\/40, .bg-stone-800\/70,
        .bg-white\/5, .bg-zinc-800\/60, .bg-zinc-800\/90 {
            background-color: rgba(255, 255, 255, 0.05) !important;
        }
        .hover\:bg-stone-800\/70:hover, .hover\:bg-white\/5:hover {
            background-color: rgba(255, 255, 255, 0.05) !important;
        }

        .placeholder\:text-stone-500::placeholder,
        .placeholder\:text-zinc-500::placeholder {
            color: rgba(255, 255, 255, 0.3) !important;
        }

        /* Backdrop blur */
        .bg-black\/95, .bg-black\/90 {
            background-color: rgba(10, 10, 10, 0.95) !important;
        }

        /* Logo font override */
        .font-\[\'Fraunces\'\] {
            font-family: 'Poppins', ui-sans-serif, system-ui, sans-serif !important;
        }

        /* Transition fixes */
        .transition-all, .transition-colors {
            transition-property: all;
            transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
            transition-duration: 300ms;
        }

        /* Input styles */
        input[type="text"], input[type="email"], input[type="password"],
        input[type="search"], textarea, select {
            background-color: #121212 !important;
            color: #ffffff !important;
        }
    </style>

    @stack('styles')

</head>

<body
    class="
        font-sans
        antialiased
        bg-[#0a0a0a]
        text-white/75
        selection:bg-rust
        selection:text-white
        text-base
    "
>

<div class="min-h-screen flex flex-col bg-[#0a0a0a]">

    <header
        class="
            sticky
            top-0
            z-50
            relative
            bg-[#0a0a0a]/95
            backdrop-blur-md
            border-b
            border-rust/10
        "
    >

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <div
                class="
                    flex
                    items-center
                    justify-between
                    h-16
                    gap-3
                    sm:gap-6
                "
            >

                <a
                    href="{{ route('posts.index') }}"
                    class="
                        flex
                        items-center
                        gap-2
                        text-2xl
                        sm:text-3xl
                        font-bold
                        tracking-tight
                        text-white
                        hover:text-rust
                        transition-all
                        duration-300
                        group
                        shrink-0
                        heading-font
                    "
                >

                    <span
                        class="
                            text-rust
                            group-hover:scale-110
                            transition-all
                            duration-500
                            text-lg
                            sm:text-xl
                            inline-block
                        "
                    >
                        ✦
                    </span>

                    <span
                        class="
                            bg-gradient-to-r
                            from-white
                            via-white
                            to-rust
                            bg-clip-text
                            group-hover:text-transparent
                            transition-all
                            duration-300
                        "
                    >
                        chronicle
                    </span>

                </a>

                <div
                    class="
                        flex-1
                        min-w-0
                        max-w-xs
                        sm:max-w-md
                        relative
                        search-container
                    "
                >

                    <form
                        method="GET"
                        action="{{ route('posts.index') }}"
                        class="relative group"
                    >

                        @if(isset($category))

                            <input
                                type="hidden"
                                name="category"
                                value="{{ $category->slug ?? $category->id }}"
                            >

                        @endif

                        <input
                            type="text"
                            name="q"
                            value="{{ request('q') }}"
                            placeholder="Search articles..."
                            autocomplete="off"
                            hx-get="{{ route('posts.suggestions') }}"
                            hx-trigger="keyup changed delay:300ms, search"
                            hx-target="#nav-search-results"
                            hx-swap="innerHTML"
                            class="
                                w-full
                                h-9
                                sm:h-10
                                px-4
                                py-2
                                pl-9
                                pr-8
                                rounded-full
                                bg-[#121212]
                                border
                                border-white/5
                                text-white
                                placeholder:text-white/30
                                text-base
                                sm:text-sm
                                focus:outline-none
                                focus:border-rust
                                focus:ring-1
                                focus:ring-rust/30
                                group-hover:border-white/5
                                transition-all
                                duration-300
                            "
                        >

                        <svg
                            class="
                                absolute
                                left-3
                                top-1/2
                                -translate-y-1/2
                                w-4
                                h-4
                                text-white/30
                                group-focus-within:text-rust
                                transition-colors
                            "
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"
                            />
                        </svg>

                        @if(request('q'))

                            <a
                                href="{{ route('posts.index') }}"
                                class="
                                    absolute
                                    right-3
                                    top-1/2
                                    -translate-y-1/2
                                    text-white/30
                                    hover:text-white/75
                                    text-sm
                                    font-bold
                                "
                            >
                                ✕
                            </a>

                        @endif

                    </form>

                    <div
                        id="nav-search-results"
                        class="
                            absolute
                            left-0
                            right-0
                            top-full
                            mt-2
                            z-[60]
                            empty:hidden
                            max-h-80
                            overflow-y-auto
                            bg-[#121212]
                            border
                            border-white/5
                            rounded-2xl
                            shadow-2xl
                            p-2
                        "
                    ></div>

                </div>

                <nav
                    class="
                        hidden
                        md:flex
                        items-center
                        gap-6
                        text-sm
                        font-medium
                        shrink-0
                    "
                >

                    <a
                        href="{{ route('posts.index') }}"
                        class="
                            relative
                            py-1
                            transition-all
                            duration-300
                            group
                            {{ request()->routeIs('posts.index')
                                ? 'text-rust font-semibold'
                                : 'text-white/75 hover:text-white' }}
                        "
                    >
                        <span>Home</span>

                        <span
                            class="
                                absolute
                                bottom-0
                                left-0
                                h-0.5
                                bg-rust
                                transition-all
                                duration-300
                                {{ request()->routeIs('posts.index')
                                    ? 'w-full'
                                    : 'w-0 group-hover:w-full' }}
                            "
                        ></span>

                    </a>

                    <div class="relative group py-5">

                        <a
                            href="{{ route('categories.index') }}"
                            class="
                                flex
                                items-center
                                gap-1.5
                                transition-all
                                duration-300
                                {{ request()->routeIs('categories.*') || request()->routeIs('posts.category')
                                    ? 'text-rust font-semibold'
                                    : 'text-white/75 hover:text-white' }}
                            "
                        >

                            <span>Categories</span>

                            <svg
                                class="
                                    w-4
                                    h-4
                                    transition-transform
                                    duration-300
                                    group-hover:rotate-180
                                "
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M19 9l-7 7-7-7"
                                />
                            </svg>

                        </a>

                        <div
                            class="
                                absolute
                                left-0
                                top-full
                                hidden
                                group-hover:block
                                w-56
                                pt-1
                                z-50
                            "
                        >

                            <div
                                class="
                                    bg-[#121212]
                                    border
                                    border-white/5
                                    rounded-xl
                                    shadow-xl
                                    shadow-black/50
                                    p-2
                                "
                            >

                                @foreach(\App\Models\Category::orderBy('name')->take(6)->get() as $cat)

                                    <a
                                        href="{{ route('posts.category', $cat) }}"
                                        class="
                                            block
                                            px-4
                                            py-2.5
                                            text-sm
                                            text-white/75
                                            hover:text-rust
                                            hover:bg-white/5
                                            rounded-lg
                                            transition-colors
                                        "
                                    >
                                        {{ $cat->name }}
                                    </a>

                                @endforeach

                                <div class="border-t border-white/5 my-1"></div>

                                <a
                                    href="{{ route('categories.index') }}"
                                    class="
                                        block
                                        px-4
                                        py-2.5
                                        text-sm
                                        font-semibold
                                        text-rust
                                        hover:text-rust/80
                                        hover:bg-white/5
                                        rounded-lg
                                    "
                                >
                                    View All Categories →
                                </a>

                            </div>

                        </div>

                    </div>

                    <a
                        href="{{ route('about') }}"
                        class="
                            relative
                            py-1
                            transition-all
                            duration-300
                            group
                            {{ request()->routeIs('about')
                                ? 'text-rust font-semibold'
                                : 'text-white/75 hover:text-white' }}
                        "
                    >

                        <span>About</span>

                        <span
                            class="
                                absolute
                                bottom-0
                                left-0
                                h-0.5
                                bg-rust
                                transition-all
                                duration-300
                                {{ request()->routeIs('about')
                                    ? 'w-full'
                                    : 'w-0 group-hover:w-full' }}
                            "
                        ></span>

                    </a>

                    @auth

                        <div class="relative group py-3">

                            <button
                                type="button"
                                class="
                                    flex
                                    items-center
                                    gap-2
                                    px-2
                                    py-1.5
                                    rounded-full
                                    border
                                    border-white/5
                                    bg-[#121212]
                                    text-white/75
                                    hover:text-white
                                    hover:border-rust/40
                                    transition-all
                                    duration-300
                                "
                            >

                                {{-- Avatar Image or Initials --}}
                                @if(auth()->user()->avatar_url)
                                    <img 
                                        src="{{ auth()->user()->avatar_url }}" 
                                        alt="{{ auth()->user()->name }}"
                                        class="w-7 h-7 rounded-full object-cover border border-rust/30"
                                    >
                                @else
                                    <span
                                        class="
                                            flex
                                            items-center
                                            justify-center
                                            w-7
                                            h-7
                                            rounded-full
                                            bg-rust/20
                                            text-rust
                                            border
                                            border-rust/40
                                            font-bold
                                            text-xs
                                        "
                                    >
                                        {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                                    </span>
                                @endif

                                <span
                                    class="
                                        hidden
                                        lg:block
                                        max-w-[100px]
                                        truncate
                                    "
                                >
                                    {{ auth()->user()->name }}
                                </span>

                                <svg
                                    class="
                                        w-4
                                        h-4
                                        text-white/30
                                        transition-transform
                                        duration-300
                                        group-hover:rotate-180
                                    "
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M19 9l-7 7-7-7"
                                    />
                                </svg>

                            </button>

                            <div
                                class="
                                    absolute
                                    right-0
                                    top-full
                                    hidden
                                    group-hover:block
                                    w-56
                                    pt-2
                                    z-[70]
                                "
                            >

                                <div
                                    class="
                                        bg-[#121212]
                                        border
                                        border-white/5
                                        rounded-2xl
                                        shadow-2xl
                                        shadow-black/60
                                        p-2
                                    "
                                >

                                    <div
                                        class="
                                            px-4
                                            py-3
                                            mb-1
                                            rounded-xl
                                            bg-white/5
                                        "
                                    >

                                        <div class="flex items-center gap-3">

                                            {{-- Avatar Image or Initials --}}
                                            @if(auth()->user()->avatar_url)
                                                <img 
                                                    src="{{ auth()->user()->avatar_url }}" 
                                                    alt="{{ auth()->user()->name }}"
                                                    class="w-9 h-9 rounded-full object-cover border border-rust/30"
                                                >
                                            @else
                                                <span
                                                    class="
                                                        flex
                                                        items-center
                                                        justify-center
                                                        w-9
                                                        h-9
                                                        rounded-full
                                                        bg-rust/20
                                                        text-rust
                                                        border
                                                        border-rust/40
                                                        font-bold
                                                        text-sm
                                                    "
                                                >
                                                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                                                </span>
                                            @endif

                                            <div class="min-w-0">

                                                <p
                                                    class="
                                                        text-sm
                                                        font-semibold
                                                        text-white
                                                        truncate
                                                        heading-font
                                                    "
                                                >
                                                    {{ auth()->user()->name }}
                                                </p>

                                                <p
                                                    class="
                                                        text-xs
                                                        text-white/30
                                                        truncate
                                                        mt-0.5
                                                    "
                                                >
                                                    {{ auth()->user()->email }}
                                                </p>

                                            </div>

                                        </div>

                                    </div>

                                    <a
                                        href="{{ route('profile.index') }}"
                                        class="
                                            flex
                                            items-center
                                            gap-3
                                            px-4
                                            py-2.5
                                            rounded-xl
                                            text-sm
                                            text-white/75
                                            hover:text-white
                                            hover:bg-white/5
                                            transition-colors
                                        "
                                    >

                                        <svg
                                            class="w-4 h-4 text-rust"
                                            fill="none"
                                            stroke="currentColor"
                                            viewBox="0 0 24 24"
                                        >
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M5.121 17.804A13.937 13.937 0 0112 16c2.485 0 4.779.65 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0z"
                                            />
                                        </svg>

                                        <span>Profile</span>

                                    </a>

                                    <a
                                        href="{{ route('users.saved') }}"
                                        class="
                                            flex
                                            items-center
                                            gap-3
                                            px-4
                                            py-2.5
                                            rounded-xl
                                            text-sm
                                            text-white/75
                                            hover:text-white
                                            hover:bg-white/5
                                            transition-colors
                                            {{ request()->routeIs('users.saved')
                                                ? 'bg-rust/10 text-rust'
                                                : '' }}
                                        "
                                    >

                                        <svg
                                            class="w-4 h-4 text-rust"
                                            fill="none"
                                            stroke="currentColor"
                                            viewBox="0 0 24 24"
                                        >
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z"
                                            />
                                        </svg>

                                        <span>Saved Posts</span>

                                    </a>

                                    <a
                                        href="{{ route('users.history') }}"
                                        class="
                                            flex
                                            items-center
                                            gap-3
                                            px-4
                                            py-2.5
                                            rounded-xl
                                            text-sm
                                            text-white/75
                                            hover:text-white
                                            hover:bg-white/5
                                            transition-colors
                                            {{ request()->routeIs('users.history')
                                                ? 'bg-rust/10 text-rust'
                                                : '' }}
                                        "
                                    >

                                        <svg
                                            class="w-4 h-4 text-rust"
                                            fill="none"
                                            stroke="currentColor"
                                            viewBox="0 0 24 24"
                                        >
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"
                                            />
                                        </svg>

                                        <span>Reading History</span>

                                    </a>

                                    @if(auth()->user()->is_admin ?? false)

                                        <a
                                            href="{{ route('admin.posts.index') }}"
                                            class="
                                                flex
                                                items-center
                                                gap-3
                                                px-4
                                                py-2.5
                                                rounded-xl
                                                text-sm
                                                text-white/75
                                                hover:text-white
                                                hover:bg-white/5
                                                transition-colors
                                            "
                                        >

                                            <svg
                                                class="w-4 h-4 text-white/30"
                                                fill="none"
                                                stroke="currentColor"
                                                viewBox="0 0 24 24"
                                            >
                                                <path
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    stroke-width="2"
                                                    d="M3 13h8V3H3v10zm10 8h8V11h-8v10zM3 21h8v-4H3v4zm10-10h8V3h-8v8z"
                                                />
                                            </svg>

                                            <span>Dashboard</span>

                                        </a>

                                    @endif

                                    <div class="border-t border-white/5 my-2"></div>

                                    <a
                                        href="{{ route('logout') }}"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                        class="
                                            flex
                                            items-center
                                            gap-3
                                            w-full
                                            px-4
                                            py-2.5
                                            rounded-xl
                                            text-sm
                                            text-rust/80
                                            hover:text-white
                                            hover:bg-rust/10
                                            transition-colors
                                        "
                                    >

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
                                                d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"
                                            />
                                        </svg>

                                        <span>Logout</span>

                                    </a>

                                    <form
                                        id="logout-form"
                                        action="{{ route('logout') }}"
                                        method="POST"
                                        class="hidden"
                                    >
                                        @csrf
                                    </form>

                                </div>

                            </div>

                        </div>

                    @else

                        <div class="flex items-center gap-3">

                            <a
                                href="{{ route('login') }}"
                                class="
                                    text-sm
                                    text-white/75
                                    hover:text-white
                                    font-medium
                                    transition-colors
                                "
                            >
                                Log in
                            </a>

                            @if(Route::has('register'))

                                <a
                                    href="{{ route('register') }}"
                                    class="
                                        text-sm
                                        px-4
                                        py-2
                                        rounded-full
                                        bg-rust
                                        hover:bg-rust/80
                                        text-white
                                        font-medium
                                        transition-all
                                        shadow-lg
                                        shadow-rust/20
                                        hover:shadow-rust/40
                                    "
                                >
                                    Register
                                </a>

                            @endif

                        </div>

                    @endauth

                </nav>

                <button
                    id="menu-toggle"
                    type="button"
                    aria-label="Toggle navigation menu"
                    aria-expanded="false"
                    class="
                        md:hidden
                        shrink-0
                        p-2.5
                        rounded-xl
                        text-white/75
                        bg-[#121212]
                        border
                        border-white/5
                        hover:text-rust
                        hover:border-rust/40
                        transition-all
                        duration-300
                    "
                >

                    <svg
                        id="menu-open-icon"
                        class="h-5 w-5"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16"
                        />
                    </svg>

                    <svg
                        id="menu-close-icon"
                        class="hidden h-5 w-5"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M6 18L18 6M6 6l12 12"
                        />
                    </svg>

                </button>

            </div>

        </div>

        <div
            id="mobile-menu"
            class="
                hidden
                md:hidden
                absolute
                top-full
                right-4
                sm:right-6
                w-64
                max-w-[calc(100vw-2rem)]
                mt-2
                bg-[#121212]
                border
                border-white/5
                rounded-2xl
                shadow-2xl
                shadow-black/60
                p-2
                z-[70]
            "
        >

            @php
                $navItems = [
                    'posts.index' => 'Home',
                    'categories.index' => 'Categories',
                    'about' => 'About',
                ];
            @endphp

            <div class="space-y-1">

                @foreach($navItems as $route => $label)

                    <a
                        href="{{ route($route) }}"
                        class="
                            block
                            px-4
                            py-3
                            rounded-xl
                            text-base
                            font-medium
                            transition-all
                            duration-200
                            {{ request()->routeIs($route)
                                ? 'bg-rust/10 text-rust border border-rust/40'
                                : 'text-white/75 hover:text-white hover:bg-white/5' }}
                        "
                    >
                        {{ $label }}
                    </a>

                @endforeach

            </div>

            @auth

                <div class="border-t border-white/5 my-2"></div>

                <div
                    class="
                        px-4
                        py-3
                        mb-1
                        rounded-xl
                        bg-white/5
                    "
                >

                    <div class="flex items-center gap-3">

                        {{-- Avatar Image or Initials --}}
                        @if(auth()->user()->avatar_url)
                            <img 
                                src="{{ auth()->user()->avatar_url }}" 
                                alt="{{ auth()->user()->name }}"
                                class="w-9 h-9 rounded-full object-cover border border-rust/30"
                            >
                        @else
                            <span
                                class="
                                    flex
                                    items-center
                                    justify-center
                                    w-9
                                    h-9
                                    rounded-full
                                    bg-rust/20
                                    text-rust
                                    border
                                    border-rust/40
                                    shrink-0
                                    font-bold
                                    text-sm
                                "
                            >
                                {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                            </span>
                        @endif

                        <div class="min-w-0">

                            <p
                                class="
                                    text-sm
                                    font-semibold
                                    text-white
                                    truncate
                                    heading-font
                                "
                            >
                                {{ auth()->user()->name }}
                            </p>

                            <p
                                class="
                                    text-xs
                                    text-white/30
                                    truncate
                                "
                            >
                                {{ auth()->user()->email }}
                            </p>

                        </div>

                    </div>

                </div>

                <a
                    href="{{ route('profile.index') }}"
                    class="
                        flex
                        items-center
                        gap-3
                        px-4
                        py-3
                        rounded-xl
                        text-base
                        text-white/75
                        hover:text-white
                        hover:bg-white/5
                        transition-colors
                        {{ request()->routeIs('profile.*')
                            ? 'bg-rust/10 text-rust'
                            : '' }}
                    "
                >

                    <svg
                        class="w-5 h-5 text-rust"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M5.121 17.804A13.937 13.937 0 0112 16c2.485 0 4.779.65 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0z"
                        />
                    </svg>

                    <span>Profile</span>

                </a>

                <a
                    href="{{ route('users.saved') }}"
                    class="
                        flex
                        items-center
                        gap-3
                        px-4
                        py-3
                        rounded-xl
                        text-base
                        text-white/75
                        hover:text-white
                        hover:bg-white/5
                        transition-colors
                        {{ request()->routeIs('users.saved')
                            ? 'bg-rust/10 text-rust'
                            : '' }}
                    "
                >

                    <svg
                        class="w-5 h-5 text-rust"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z"
                        />
                    </svg>

                    <span>Saved Posts</span>

                </a>

                <a
                    href="{{ route('users.history') }}"
                    class="
                        flex
                        items-center
                        gap-3
                        px-4
                        py-3
                        rounded-xl
                        text-base
                        text-white/75
                        hover:text-white
                        hover:bg-white/5
                        transition-colors
                        {{ request()->routeIs('users.history')
                            ? 'bg-rust/10 text-rust'
                            : '' }}
                    "
                >

                    <svg
                        class="w-5 h-5 text-rust"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"
                        />
                    </svg>

                    <span>Reading History</span>

                </a>

                @if(Auth::user()->isAuthor())

                    <a
                        href="{{ route('author.dashboard') }}"
                        class="
                            flex
                            items-center
                            gap-3
                            px-4
                            py-3
                            rounded-xl
                            text-base
                            text-white/75
                            hover:text-white
                            hover:bg-white/5
                            transition-colors
                        "
                    >

                        <svg
                            class="w-5 h-5 text-rust"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M3 13h8V3H3v10zm10 8h8V11h-8v10zM3 21h8v-4H3v4zm10-10h8V3h-8v8z"
                            />
                        </svg>

                        <span>Author Dashboard</span>

                    </a>

                @endif

                @if(auth()->user()->is_admin ?? false)

                    <a
                        href="{{ route('admin.posts.index') }}"
                        class="
                            flex
                            items-center
                            gap-3
                            px-4
                            py-3
                            rounded-xl
                            text-base
                            text-white/75
                            hover:text-white
                            hover:bg-white/5
                            transition-colors
                        "
                    >

                        <svg
                            class="w-5 h-5 text-white/30"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M3 13h8V3H3v10zm10 8h8V11h-8v10zM3 21h8v-4H3v4zm10-10h8V3h-8v8z"
                            />
                        </svg>

                        <span>Dashboard</span>

                    </a>

                @endif

                <div class="border-t border-white/5 my-2"></div>

                <a
                    href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form-mobile').submit();"
                    class="
                        flex
                        items-center
                        justify-center
                        gap-2
                        w-full
                        px-4
                        py-3
                        text-base
                        font-medium
                        text-rust/80
                        bg-rust/10
                        hover:bg-rust/20
                        hover:text-rust
                        transition-all
                        rounded-xl
                    "
                >

                    <svg
                        class="w-5 h-5"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"
                        />
                    </svg>

                    <span>Logout</span>

                </a>

                <form
                    id="logout-form-mobile"
                    action="{{ route('logout') }}"
                    method="POST"
                    class="hidden"
                >
                    @csrf
                </form>

            @else

                <div class="border-t border-white/5 my-2"></div>

                <div class="grid grid-cols-2 gap-2">

                    <a
                        href="{{ route('login') }}"
                        class="
                            flex
                            items-center
                            justify-center
                            px-3
                            py-3
                            rounded-xl
                            text-sm
                            font-medium
                            text-white/75
                            border
                            border-white/5
                            hover:border-rust/40
                            hover:text-white
                            transition-all
                        "
                    >
                        Log in
                    </a>

                    @if(Route::has('register'))

                        <a
                            href="{{ route('register') }}"
                            class="
                                flex
                                items-center
                                justify-center
                                px-3
                                py-3
                                rounded-xl
                                text-sm
                                font-semibold
                                bg-rust
                                hover:bg-rust/80
                                text-white
                                transition-all
                                shadow-lg
                                shadow-rust/20
                                hover:shadow-rust/40
                            "
                        >
                            Register
                        </a>

                    @endif

                </div>

            @endauth

        </div>

    </header>

    <main class="flex-1 w-full bg-[#0a0a0a]">

        @yield('content')

    </main>

    <footer
        class="
            bg-[#121212]
            text-white/75
            border-t
            border-rust/10
            relative
            overflow-hidden
        "
    >

        <div
            class="
                absolute
                -top-24
                left-1/2
                -translate-x-1/2
                w-96
                h-96
                bg-rust/5
                blur-[120px]
                pointer-events-none
                rounded-full
            "
        ></div>

        <div
            class="
                max-w-7xl
                mx-auto
                px-5
                sm:px-6
                lg:px-8
                py-10
                sm:py-12
                relative
                z-10
            "
        >

            <div
                class="
                    grid
                    grid-cols-2
                    md:grid-cols-4
                    gap-x-8
                    gap-y-8
                    md:gap-10
                "
            >

                <div
                    class="
                        col-span-2
                        md:col-span-1
                    "
                >

                    <a
                        href="{{ route('posts.index') }}"
                        class="
                            inline-flex
                            items-center
                            gap-2
                            text-2xl
                            sm:text-3xl
                            font-bold
                            text-white
                            hover:text-rust
                            transition-colors
                            duration-300
                            mb-3
                            group
                            heading-font
                        "
                    >

                        <span
                            class="
                                text-rust
                                group-hover:scale-110
                                transition-transform
                                duration-300
                            "
                        >
                            ✦
                        </span>

                        <span>chronicle</span>

                    </a>

                    <p
                        class="
                            text-white/50
                            max-w-sm
                            text-base
                            leading-relaxed
                        "
                    >
                        A quiet corner for thoughtful writing, curated essays,
                        and slow reading.
                    </p>

                </div>

                <div>

                    <h5
                        class="
                            font-semibold
                            text-rust/80
                            text-xs
                            uppercase
                            tracking-widest
                            mb-4
                            heading-font
                        "
                    >
                        Explore Topics
                    </h5>

                    <ul
                        class="
                            space-y-2.5
                            text-sm
                            sm:text-base
                        "
                    >

                        <li>

                            <a
                                href="{{ route('posts.index') }}"
                                class="text-white/50 hover:text-rust transition-colors"
                            >
                                All Posts
                            </a>

                        </li>

                        <li>

                            <a
                                href="{{ route('categories.index') }}"
                                class="text-white/50 hover:text-rust transition-colors"
                            >
                                Categories
                            </a>

                        </li>

                        <li>

                            <a
                                href="{{ route('about') }}"
                                class="text-white/50 hover:text-rust transition-colors"
                            >
                                About
                            </a>

                        </li>

                    </ul>

                </div>

                <div>

                    <h5
                        class="
                            font-semibold
                            text-rust/80
                            text-xs
                            uppercase
                            tracking-widest
                            mb-4
                            heading-font
                        "
                    >
                        Categories
                    </h5>

                    <ul
                        class="
                            space-y-2.5
                            text-sm
                            sm:text-base
                        "
                    >

                        @foreach(\App\Models\Category::orderBy('name')->take(6)->get() as $cat)

                            <li>

                                <a
                                    href="{{ route('posts.category', $cat) }}"
                                    class="
                                        text-white/50
                                        hover:text-rust
                                        transition-colors
                                        block
                                    "
                                >
                                    {{ $cat->name }}
                                </a>

                            </li>

                        @endforeach

                        <li class="pt-1">

                            <a
                                href="{{ route('categories.index') }}"
                                class="
                                    text-rust
                                    hover:text-rust/80
                                    transition-colors
                                    text-sm
                                    font-semibold
                                    inline-flex
                                    items-center
                                    gap-1.5
                                "
                            >

                                <span>View all</span>

                                <span>→</span>

                            </a>

                        </li>

                    </ul>

                </div>

                <div
                    class="
                        col-span-2
                        md:col-span-1
                    "
                >

                    <h5
                        class="
                            font-semibold
                            text-rust/80
                            text-xs
                            uppercase
                            tracking-widest
                            mb-4
                            heading-font
                        "
                    >
                        Connect
                    </h5>

                    <div
                        class="
                            grid
                            grid-cols-2
                            md:grid-cols-1
                            gap-2.5
                            text-sm
                            sm:text-base
                        "
                    >

                        <a
                            href="#"
                            class="
                                text-white/50
                                hover:text-rust
                                transition-colors
                            "
                        >
                            Newsletter
                        </a>

                        <a
                            href="#"
                            class="
                                text-white/50
                                hover:text-rust
                                transition-colors
                            "
                        >
                            RSS Feed
                        </a>

                    </div>

                </div>

            </div>

            <div
                class="
                    border-t
                    border-white/5
                    mt-8
                    sm:mt-10
                    pt-6
                    sm:pt-8
                    text-sm
                    text-white/30
                "
            >

                <p>
                    &copy; {{ date('Y') }}
                    chronicle · crafted with care
                </p>

            </div>

        </div>

    </footer>

</div>

<script>

document.addEventListener('DOMContentLoaded', function () {

    const toggleBtn =
        document.getElementById('menu-toggle');

    const mobileMenu =
        document.getElementById('mobile-menu');

    const openIcon =
        document.getElementById('menu-open-icon');

    const closeIcon =
        document.getElementById('menu-close-icon');


    if (toggleBtn && mobileMenu) {

        toggleBtn.addEventListener('click', function (event) {

            event.stopPropagation();

            const isOpen =
                !mobileMenu.classList.contains('hidden');


            if (isOpen) {

                mobileMenu.classList.add('hidden');

                openIcon?.classList.remove('hidden');

                closeIcon?.classList.add('hidden');

                toggleBtn.setAttribute(
                    'aria-expanded',
                    'false'
                );

            } else {

                mobileMenu.classList.remove('hidden');

                openIcon?.classList.add('hidden');

                closeIcon?.classList.remove('hidden');

                toggleBtn.setAttribute(
                    'aria-expanded',
                    'true'
                );

            }

        });

    }


    document.addEventListener('click', function (event) {

        if (
            mobileMenu &&
            toggleBtn &&
            !mobileMenu.contains(event.target) &&
            !toggleBtn.contains(event.target)
        ) {

            mobileMenu.classList.add('hidden');

            openIcon?.classList.remove('hidden');

            closeIcon?.classList.add('hidden');

            toggleBtn.setAttribute(
                'aria-expanded',
                'false'
            );

        }

    });


    document.addEventListener('keydown', function (event) {

        if (event.key === 'Escape') {

            mobileMenu?.classList.add('hidden');

            openIcon?.classList.remove('hidden');

            closeIcon?.classList.add('hidden');

            toggleBtn?.setAttribute(
                'aria-expanded',
                'false'
            );

        }

    });


    document.addEventListener('click', function (event) {

        const searchContainer =
            document.querySelector('.search-container');

        const resultsContainer =
            document.getElementById('nav-search-results');


        if (
            searchContainer &&
            !searchContainer.contains(event.target)
        ) {

            if (resultsContainer) {

                resultsContainer.innerHTML = '';

            }

        }

    });


    document.addEventListener('keydown', function (event) {

        if (event.key === 'Escape') {

            const resultsContainer =
                document.getElementById('nav-search-results');


            if (resultsContainer) {

                resultsContainer.innerHTML = '';

            }

        }

    });


    window.addEventListener('resize', function () {

        if (window.innerWidth >= 768) {

            mobileMenu?.classList.add('hidden');

            openIcon?.classList.remove('hidden');

            closeIcon?.classList.add('hidden');

            toggleBtn?.setAttribute(
                'aria-expanded',
                'false'
            );

        }

    });

});

</script>

@stack('scripts')

</body>
</html>