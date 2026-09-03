<!DOCTYPE html>
<html
    lang="{{ str_replace('_', '-', app()->getLocale()) }}"
    data-theme="light">

<head>

    <meta charset="utf-8">

    <meta name="viewport"
        content="width=device-width, initial-scale=1">

    <meta name="csrf-token"
        content="{{ csrf_token() }}">

    <title>
        @yield('title', config('app.name', 'chronicle'))
    </title>


    {{-- =========================================================
         THEME — LOAD BEFORE RENDER
    ========================================================== --}}

    <script>
        (() => {
            const savedTheme = localStorage.getItem('theme') || 'light';

            document.documentElement.setAttribute(
                'data-theme',
                savedTheme
            );
        })();
    </script>


    {{-- =========================================================
         FONTS
    ========================================================== --}}

    <link rel="preconnect"
        href="https://fonts.bunny.net">

    <link
        href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap"
        rel="stylesheet">

    <link rel="preconnect"
        href="https://fonts.googleapis.com">

    <link rel="preconnect"
        href="https://fonts.gstatic.com"
        crossorigin>

    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&family=Work+Sans:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">


    {{-- =========================================================
         VITE
    ========================================================== --}}

    @vite([
    'resources/css/app.css',
    'resources/js/app.js'
    ])


    @stack('styles')


    <style>
        /* =========================================================
           CHRONICLE GLOBAL COLOR SYSTEM
        ========================================================== */

        :root {

            /* Light */
            --color-bg: #F8F9FA;
            --color-bg-card: #FFFFFF;

            --color-text-primary: #111827;
            --color-text-secondary: #6B7280;
            --color-text-muted: #9CA3AF;

            --color-border: #E5E7EB;

            --color-primary: #7C3AED;
            --color-primary-hover: #6D28D9;
            --color-primary-soft: rgba(124, 58, 237, 0.10);

            --color-secondary: #3B82F6;
            --color-secondary-hover: #2563EB;

            --color-shadow: rgba(0, 0, 0, 0.08);
            --color-shadow-hover: rgba(0, 0, 0, 0.12);
        }


        /* =========================================================
           DARK THEME
        ========================================================== */

        [data-theme="dark"] {

            /* TRUE BLACK PAGE */
            --color-bg: #0A0A0A;

            /* Slightly elevated surfaces */
            --color-bg-card: #141414;

            /* Typography */
            --color-text-primary: #FFFFFF;
            --color-text-secondary: #A0A0A0;
            --color-text-muted: #6B7280;

            /* Borders */
            --color-border: #2A2A2A;

            /* Dark accent */
            --color-primary: #3B82F6;
            --color-primary-hover: #60A5FA;
            --color-primary-soft: rgba(59, 130, 246, 0.10);

            --color-secondary: #3B82F6;
            --color-secondary-hover: #60A5FA;

            --color-shadow: rgba(0, 0, 0, 0.30);
            --color-shadow-hover: rgba(0, 0, 0, 0.50);
        }


        /* =========================================================
           GLOBAL BODY
        ========================================================== */

        html,
        body {

            margin: 0;
            padding: 0;

            min-height: 100%;

            background-color: var(--color-bg) !important;
            color: var(--color-text-secondary);

            transition:
                background-color 0.3s ease,
                color 0.3s ease;
        }


        body {

            font-family:
                'Work Sans',
                -apple-system,
                BlinkMacSystemFont,
                'Segoe UI',
                Roboto,
                sans-serif;

            background-color: var(--color-bg) !important;
        }


        /* =========================================================
           GLOBAL PAGE SURFACES
        ========================================================== */

        .min-h-screen,
        main,
        footer,
        header {

            background-color: var(--color-bg) !important;

            transition:
                background-color 0.3s ease,
                color 0.3s ease;
        }


        /* =========================================================
           HEADINGS
        ========================================================== */

        h1,
        h2,
        h3,
        h4,
        h5,
        h6,
        .text-2xl,
        .text-3xl,
        .heading-font,
        .font-serif {

            font-family:
                'Poppins',
                -apple-system,
                BlinkMacSystemFont,
                'Segoe UI',
                Roboto,
                sans-serif !important;

            letter-spacing: -0.02em !important;

            color:
                var(--color-text-primary) !important;
        }


        /* =========================================================
           INPUTS
        ========================================================== */

        input,
        select,
        textarea {

            font-size: 16px !important;

            background-color:
                var(--color-bg-card) !important;

            color:
                var(--color-text-primary) !important;

            border-color:
                var(--color-border) !important;
        }


        input:focus,
        select:focus,
        textarea:focus {

            border-color:
                var(--color-primary) !important;

            outline: none;

            box-shadow:
                0 0 0 3px rgba(124, 58, 237, 0.15);
        }

        [data-theme="dark"] input:focus,
        [data-theme="dark"] select:focus,
        [data-theme="dark"] textarea:focus {

            box-shadow:
                0 0 0 3px rgba(59, 130, 246, 0.15);
        }


        /* =========================================================
           PURPLE
        ========================================================== */

        .bg-purple {
            background-color:
                var(--color-primary) !important;
        }

        .bg-purple\/5 {
            background-color:
                rgba(124, 58, 237, 0.05) !important;
        }

        [data-theme="dark"] .bg-purple\/5 {
            background-color:
                rgba(59, 130, 246, 0.05) !important;
        }

        .bg-purple\/10 {
            background-color:
                rgba(124, 58, 237, 0.10) !important;
        }

        [data-theme="dark"] .bg-purple\/10 {
            background-color:
                rgba(59, 130, 246, 0.10) !important;
        }

        .bg-purple\/20 {
            background-color:
                rgba(124, 58, 237, 0.20) !important;
        }

        [data-theme="dark"] .bg-purple\/20 {
            background-color:
                rgba(59, 130, 246, 0.20) !important;
        }

        .bg-purple\/30 {
            background-color:
                rgba(124, 58, 237, 0.30) !important;
        }

        [data-theme="dark"] .bg-purple\/30 {
            background-color:
                rgba(59, 130, 246, 0.30) !important;
        }

        .bg-purple\/40 {
            background-color:
                rgba(124, 58, 237, 0.40) !important;
        }

        [data-theme="dark"] .bg-purple\/40 {
            background-color:
                rgba(59, 130, 246, 0.40) !important;
        }

        .bg-purple\/50 {
            background-color:
                rgba(124, 58, 237, 0.50) !important;
        }

        [data-theme="dark"] .bg-purple\/50 {
            background-color:
                rgba(59, 130, 246, 0.50) !important;
        }

        .bg-purple\/60 {
            background-color:
                rgba(124, 58, 237, 0.60) !important;
        }

        [data-theme="dark"] .bg-purple\/60 {
            background-color:
                rgba(59, 130, 246, 0.60) !important;
        }

        .bg-purple\/70 {
            background-color:
                rgba(124, 58, 237, 0.70) !important;
        }

        [data-theme="dark"] .bg-purple\/70 {
            background-color:
                rgba(59, 130, 246, 0.70) !important;
        }

        .bg-purple\/80 {
            background-color:
                rgba(124, 58, 237, 0.80) !important;
        }

        [data-theme="dark"] .bg-purple\/80 {
            background-color:
                rgba(59, 130, 246, 0.80) !important;
        }

        .bg-purple\/90 {
            background-color:
                rgba(124, 58, 237, 0.90) !important;
        }

        [data-theme="dark"] .bg-purple\/90 {
            background-color:
                rgba(59, 130, 246, 0.90) !important;
        }


        .hover\:bg-purple:hover {
            background-color:
                var(--color-primary) !important;
        }

        .hover\:bg-purple\/80:hover {
            background-color:
                rgba(124, 58, 237, 0.80) !important;
        }

        [data-theme="dark"] .hover\:bg-purple\/80:hover {
            background-color:
                rgba(59, 130, 246, 0.80) !important;
        }


        .text-purple {
            color:
                var(--color-primary) !important;
        }

        .text-purple\/30 {
            color:
                rgba(124, 58, 237, 0.30) !important;
        }

        [data-theme="dark"] .text-purple\/30 {
            color:
                rgba(59, 130, 246, 0.30) !important;
        }

        .text-purple\/50 {
            color:
                rgba(124, 58, 237, 0.50) !important;
        }

        [data-theme="dark"] .text-purple\/50 {
            color:
                rgba(59, 130, 246, 0.50) !important;
        }

        .text-purple\/60 {
            color:
                rgba(124, 58, 237, 0.60) !important;
        }

        [data-theme="dark"] .text-purple\/60 {
            color:
                rgba(59, 130, 246, 0.60) !important;
        }

        .text-purple\/70 {
            color:
                rgba(124, 58, 237, 0.70) !important;
        }

        [data-theme="dark"] .text-purple\/70 {
            color:
                rgba(59, 130, 246, 0.70) !important;
        }

        .text-purple\/80 {
            color:
                rgba(124, 58, 237, 0.80) !important;
        }

        [data-theme="dark"] .text-purple\/80 {
            color:
                rgba(59, 130, 246, 0.80) !important;
        }


        .hover\:text-purple:hover {
            color:
                var(--color-primary) !important;
        }


        .border-purple {
            border-color:
                var(--color-primary) !important;
        }

        .border-purple\/10 {
            border-color:
                rgba(124, 58, 237, 0.10) !important;
        }

        [data-theme="dark"] .border-purple\/10 {
            border-color:
                rgba(59, 130, 246, 0.10) !important;
        }

        .border-purple\/20 {
            border-color:
                rgba(124, 58, 237, 0.20) !important;
        }

        [data-theme="dark"] .border-purple\/20 {
            border-color:
                rgba(59, 130, 246, 0.20) !important;
        }

        .border-purple\/30 {
            border-color:
                rgba(124, 58, 237, 0.30) !important;
        }

        [data-theme="dark"] .border-purple\/30 {
            border-color:
                rgba(59, 130, 246, 0.30) !important;
        }

        .border-purple\/40 {
            border-color:
                rgba(124, 58, 237, 0.40) !important;
        }

        [data-theme="dark"] .border-purple\/40 {
            border-color:
                rgba(59, 130, 246, 0.40) !important;
        }

        .border-purple\/50 {
            border-color:
                rgba(124, 58, 237, 0.50) !important;
        }

        [data-theme="dark"] .border-purple\/50 {
            border-color:
                rgba(59, 130, 246, 0.50) !important;
        }


        /* =========================================================
           BLUE
        ========================================================== */

        .bg-blue {
            background-color:
                var(--color-secondary) !important;
        }

        .bg-blue\/10 {
            background-color:
                rgba(59, 130, 246, 0.10) !important;
        }

        .bg-blue\/20 {
            background-color:
                rgba(59, 130, 246, 0.20) !important;
        }

        .text-blue {
            color:
                var(--color-secondary) !important;
        }

        .border-blue {
            border-color:
                var(--color-secondary) !important;
        }


        /* =========================================================
           IMPORTANT:
           DO NOT OVERRIDE .bg-black
           
           Tailwind bg-black should remain actual #000000.
        ========================================================== */

        .bg-black {
            background-color: #000000 !important;
        }

        .dark\:bg-black {
            background-color: #000000 !important;
        }


        /* =========================================================
           CARD SURFACE
        ========================================================== */

        .bg-bg-card {
            background-color:
                var(--color-bg-card) !important;
        }


        /* =========================================================
           WHITE TEXT UTILITIES
        ========================================================== */

        .text-white {
            color:
                var(--color-text-primary) !important;
        }

        .text-white\/90 {
            color:
                var(--color-text-primary) !important;
        }

        .text-white\/75,
        .text-white\/70,
        .text-white\/60 {
            color:
                var(--color-text-secondary) !important;
        }

        .text-white\/50,
        .text-white\/40,
        .text-white\/30,
        .text-white\/20,
        .text-white\/10 {
            color:
                var(--color-text-muted) !important;
        }


        /* =========================================================
           THEME TEXT
        ========================================================== */

        .text-primary {
            color:
                var(--color-text-primary) !important;
        }

        .text-secondary {
            color:
                var(--color-text-secondary) !important;
        }

        .text-muted {
            color:
                var(--color-text-muted) !important;
        }


        /* =========================================================
           HOVER TEXT
        ========================================================== */

        .hover\:text-white:hover {
            color:
                var(--color-text-primary) !important;
        }

        .hover\:text-primary:hover {
            color:
                var(--color-text-primary) !important;
        }


        /* =========================================================
           BORDERS
        ========================================================== */

        .border-white\/5,
        .border-white\/10,
        .border-border {

            border-color:
                var(--color-border) !important;
        }


        /* =========================================================
           SELECTION
        ========================================================== */

        ::selection {

            background-color:
                var(--color-primary) !important;

            color:
                #ffffff !important;
        }


        /* =========================================================
           BACKDROP
        ========================================================== */

        .backdrop-blur-sm {
            backdrop-filter: blur(4px);
        }


        /* =========================================================
           TRANSITIONS
        ========================================================== */

        .transition-all,
        .transition-colors,
        .transition-transform {

            transition-property: all;

            transition-timing-function:
                cubic-bezier(0.4, 0, 0.2, 1);

            transition-duration: 300ms;
        }


        /* =========================================================
           GROUP HOVER
        ========================================================== */

        .group-hover\:scale-110:hover {
            transform: scale(1.1);
        }

        .group-hover\:text-purple:hover {
            color:
                var(--color-primary) !important;
        }


        /* =========================================================
           MOBILE MENU
        ========================================================== */

        #mobile-menu {

            background-color:
                var(--color-bg-card) !important;

            border-color:
                var(--color-border) !important;
        }


        /* =========================================================
           THEME TOGGLE
        ========================================================== */

        .theme-toggle {

            background:
                var(--color-bg-card);

            border:
                1px solid var(--color-border);

            color:
                var(--color-text-primary);

            padding:
                6px 12px;

            border-radius:
                9999px;

            cursor:
                pointer;

            transition:
                all 0.3s ease;

            display:
                inline-flex;

            align-items:
                center;

            gap:
                6px;

            font-family:
                'Work Sans',
                sans-serif;

            font-size:
                14px;
        }


        .theme-toggle:hover {

            background:
                var(--color-primary);

            color:
                #ffffff;

            border-color:
                var(--color-primary);
        }


        .theme-toggle svg {

            width:
                18px;

            height:
                18px;
        }


        /* =========================================================
           LEGACY RUST
        ========================================================== */

        .bg-rust {
            background-color:
                var(--color-primary) !important;
        }

        .hover\:bg-rust\/80:hover {
            background-color:
                rgba(124, 58, 237, 0.80) !important;
        }

        [data-theme="dark"] .hover\:bg-rust\/80:hover {
            background-color:
                rgba(59, 130, 246, 0.80) !important;
        }

        .text-rust {
            color:
                var(--color-primary) !important;
        }

        .hover\:text-rust:hover {
            color:
                var(--color-primary) !important;
        }

        .border-rust {
            border-color:
                var(--color-primary) !important;
        }

        .border-rust\/20 {
            border-color:
                rgba(124, 58, 237, 0.20) !important;
        }

        [data-theme="dark"] .border-rust\/20 {
            border-color:
                rgba(59, 130, 246, 0.20) !important;
        }

        .border-rust\/10 {
            border-color:
                rgba(124, 58, 237, 0.10) !important;
        }

        [data-theme="dark"] .border-rust\/10 {
            border-color:
                rgba(59, 130, 246, 0.10) !important;
        }

        .shadow-rust\/20 {
            box-shadow:
                0 4px 6px -1px rgba(124, 58, 237, 0.20),
                0 2px 4px -1px rgba(124, 58, 237, 0.10) !important;
        }

        [data-theme="dark"] .shadow-rust\/20 {
            box-shadow:
                0 4px 6px -1px rgba(59, 130, 246, 0.20),
                0 2px 4px -1px rgba(59, 130, 246, 0.10) !important;
        }

        .shadow-rust\/40 {
            box-shadow:
                0 10px 15px -3px rgba(124, 58, 237, 0.40),
                0 4px 6px -2px rgba(124, 58, 237, 0.20) !important;
        }

        [data-theme="dark"] .shadow-rust\/40 {
            box-shadow:
                0 10px 15px -3px rgba(59, 130, 246, 0.40),
                0 4px 6px -2px rgba(59, 130, 246, 0.20) !important;
        }


        /* =========================================================
           NEON TRACER BOX
        ========================================================== */

        @keyframes border-spin {
            100% {
                transform: rotate(360deg);
            }
        }

        .neon-tracer-box {
            position: relative;
            border-radius: 1.5rem;
            overflow: hidden;
            padding: 2px;
            isolation: isolate;
        }

        .neon-tracer-box::before {
            content: '';
            position: absolute;
            inset: -50%;
            width: 200%;
            height: 200%;
            background: conic-gradient(transparent 0deg,
                    transparent 280deg,
                    var(--color-primary) 340deg,
                    var(--color-primary-hover) 360deg);
            animation: border-spin 6s linear infinite;
            z-index: -1;
        }

        [data-theme="dark"] .neon-tracer-box::before {
            background: conic-gradient(transparent 0deg,
                    transparent 280deg,
                    #3B82F6 340deg,
                    #60A5FA 360deg);
        }

        @media (prefers-reduced-motion: reduce) {
            .neon-tracer-box::before {
                animation: none;
            }
        }
    </style>

</head>


<body
    class="font-sans antialiased
           bg-[var(--color-bg)]
           text-[var(--color-text-secondary)]
           selection:text-white">

    <div
        class="min-h-screen flex flex-col
               bg-[var(--color-bg)]">


        {{-- =====================================================
             HEADER
        ====================================================== --}}

        <header
            class="sticky top-0 z-50
                   bg-[var(--color-bg-card)]/95
                   backdrop-blur-sm
                   border-b
                   border-[var(--color-border)]
                   shadow-sm">

            <div
                class="max-w-7xl mx-auto
                       px-4 sm:px-6 lg:px-8">

                <div
                    class="flex justify-between
                           items-center h-16">


                    {{-- Logo --}}

                    <a
                        href="{{ route('posts.index') }}"
                        class="flex items-center gap-2
                               heading-font
                               text-2xl sm:text-3xl
                               font-bold
                               tracking-tight
                               text-[var(--color-text-primary)]
                               hover:text-[var(--color-primary)]
                               transition-colors duration-300
                               group">

                        <span
                            class="text-[var(--color-primary)]
                                   group-hover:scale-110
                                   transition-transform duration-300">
                            ✦
                        </span>

                        <span>
                            chronicle
                        </span>

                    </a>


                    {{-- Navigation --}}

                    <nav
                        class="flex items-center gap-6
                               text-sm font-medium">

                        <a
                            href="{{ route('posts.index') }}"
                            class="relative
                                   text-[var(--color-text-secondary)]
                                   hover:text-[var(--color-text-primary)]
                                   transition-colors duration-300
                                   py-1 group">

                            <span>
                                Home
                            </span>

                            <span
                                class="absolute bottom-0 left-0
                                       w-0 h-0.5
                                       bg-[var(--color-primary)]
                                       group-hover:w-full
                                       transition-all duration-300">
                            </span>

                        </a>


                        {{-- Theme Toggle --}}

                        <button
                            onclick="toggleTheme()"
                            class="theme-toggle"
                            aria-label="Toggle theme">

                            <svg
                                id="theme-icon"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24">

                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M20.354 15.354A9 9 0 018.646 3.646
                                       9.003 9.003 0 0012 21
                                       a9.003 9.003 0 008.354-5.646z" />

                            </svg>

                            <span id="theme-label">
                                Dark
                            </span>

                        </button>


                        {{-- Register --}}

                        @if (Route::has('register'))

                        <a
                            href="{{ route('register') }}"
                            class="px-5 py-2
                                       bg-[var(--color-primary)]
                                       text-white
                                       hover:bg-[var(--color-primary-hover)]
                                       rounded-full
                                       transition-all duration-300
                                       shadow-lg
                                       shadow-[var(--color-primary)]/20
                                       hover:shadow-[var(--color-primary)]/40
                                       transform hover:scale-105
                                       font-medium text-base">

                            Register

                        </a>

                        @endif

                    </nav>

                </div>

            </div>

        </header>


        {{-- =====================================================
             PAGE CONTENT
        ====================================================== --}}

        <main
            class="flex-1
                   bg-[var(--color-bg)]">

            {{ $slot }}

        </main>


        {{-- =====================================================
             FOOTER
        ====================================================== --}}

        <footer
            class="bg-[var(--color-bg)]
                   text-[var(--color-text-secondary)]
                   border-t
                   border-[var(--color-border)]">

            <div
                class="max-w-7xl mx-auto
                       px-4 sm:px-6 lg:px-8
                       py-6">

                <div
                    class="flex flex-col
                           sm:flex-row
                           justify-between
                           items-center
                           text-sm
                           text-[var(--color-text-muted)]">

                    <p>
                        &copy; {{ date('Y') }}
                        chronicle · crafted with care
                    </p>


                    <div
                        class="flex items-center gap-4
                               mt-2 sm:mt-0">

                        <a
                            href="{{ route('posts.index') }}"
                            class="hover:text-[var(--color-primary)]
                                   transition-colors duration-300">
                            Home
                        </a>

                        <span>·</span>

                        <a
                            href="#"
                            class="hover:text-[var(--color-primary)]
                                   transition-colors duration-300">
                            Privacy
                        </a>

                        <span>·</span>

                        <a
                            href="#"
                            class="hover:text-[var(--color-primary)]
                                   transition-colors duration-300">
                            Terms
                        </a>

                        <span>·</span>

                        <button
                            onclick="toggleTheme()"
                            class="hover:text-[var(--color-primary)]
                                   transition-colors duration-300
                                   text-xs">

                            <span id="footer-theme-label">
                                Switch to Dark
                            </span>

                        </button>

                    </div>

                </div>

            </div>

        </footer>

    </div>


    {{-- =========================================================
         THEME SCRIPT
    ========================================================== --}}

    <script>
        function toggleTheme() {

            const html =
                document.documentElement;

            const currentTheme =
                html.getAttribute('data-theme');

            const newTheme =
                currentTheme === 'dark' ?
                'light' :
                'dark';


            html.setAttribute(
                'data-theme',
                newTheme
            );


            localStorage.setItem(
                'theme',
                newTheme
            );


            updateThemeUI(newTheme);
        }


        function updateThemeUI(theme) {

            const isDark =
                theme === 'dark';


            const icon =
                document.getElementById(
                    'theme-icon'
                );

            const label =
                document.getElementById(
                    'theme-label'
                );

            const footerLabel =
                document.getElementById(
                    'footer-theme-label'
                );


            if (icon) {

                icon.innerHTML = isDark

                    ?
                    `
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M12 3v1m0 16v1m9-9h-1M4 12H3
                               m15.364 6.364l-.707-.707
                               M6.343 6.343l-.707-.707
                               m12.728 0l-.707.707
                               M6.343 17.657l-.707.707
                               M16 12a4 4 0 11-8 0
                               4 4 0 018 0z"/>
                      `

                    :
                    `
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M20.354 15.354A9 9 0 018.646 3.646
                               9.003 9.003 0 0012 21
                               a9.003 9.003 0 008.354-5.646z"/>
                      `;
            }


            if (label) {

                label.textContent =
                    isDark ?
                    'Light' :
                    'Dark';
            }


            if (footerLabel) {

                footerLabel.textContent =
                    isDark ?
                    'Switch to Light' :
                    'Switch to Dark';
            }

        }


        /* Update button UI after DOM loads */

        document.addEventListener(
            'DOMContentLoaded',
            function() {

                const theme =
                    document.documentElement
                    .getAttribute('data-theme') ||
                    'light';

                updateThemeUI(theme);

            }
        );
    </script>


    @stack('scripts')

</body>

</html>