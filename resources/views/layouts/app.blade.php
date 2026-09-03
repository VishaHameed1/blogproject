<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="light">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', config('app.name', 'chronicle · thoughtful writing'))</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet" />

    <!-- Updated Fonts: Poppins for headings, Work Sans for body -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&family=Work+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- HTMX --}}
    <script src="https://unpkg.com/htmx.org@1.9.12"></script>

    @stack('styles')

    <style>
        /* ============================================================
           CHRONICLE COLORS - EXACTLY AS SPECIFIED
           ============================================================ */

        :root {
            /* Light Mode */
            --color-bg: #F8F9FA;
            --color-bg-card: #FFFFFF;
            --color-text-primary: #1A1A2E;
            --color-text-secondary: #6B7280;
            --color-text-muted: #9CA3AF;
            --color-border: #E5E7EB;
            --color-primary: #7C3AED;
            --color-primary-hover: #6D28D9;
            --color-primary-soft: rgba(124, 58, 237, 0.10);
            --color-shadow: rgba(0, 0, 0, 0.08);
            --color-shadow-hover: rgba(0, 0, 0, 0.12);
            --header-bg: rgba(255, 255, 255, 0.92);
        }

        [data-theme="dark"] {
            /* Dark Mode */
            --color-bg: #1A1A2E;
            --color-bg-card: #121212;
            --color-text-primary: #FFFFFF;
            --color-text-secondary: #A0A0A0;
            --color-text-muted: #6B7280;
            --color-border: rgba(255, 255, 255, 0.05);
            --color-primary: #3B82F6;
            --color-primary-hover: #60A5FA;
            --color-primary-soft: rgba(59, 130, 246, 0.14);
            --color-shadow: rgba(0, 0, 0, 0.40);
            --color-shadow-hover: rgba(0, 0, 0, 0.60);
            --header-bg: rgba(18, 18, 18, 0.94);
        }

        /* ============================================================
           BORDER SPIN ANIMATION FOR NEON TRACER
           ============================================================ */

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

        /* ============================================================
           BASE
           ============================================================ */

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html {
            background: var(--color-bg);
            scroll-behavior: smooth;
        }

        body {
            font-family: 'Work Sans', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            background-color: var(--color-bg) !important;
            color: var(--color-text-secondary) !important;
            transition: background-color 0.3s ease, color 0.3s ease;
            -webkit-font-smoothing: antialiased;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6,
        .text-2xl,
        .text-3xl,
        .heading-font {
            font-family: 'Poppins', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif !important;
            letter-spacing: -0.02em !important;
            color: var(--color-text-primary) !important;
        }

        a {
            text-decoration: none;
            color: var(--color-primary);
            transition: color 0.2s ease;
        }

        a:hover {
            color: var(--color-primary-hover);
        }

        /* ============================================================
           SELECTION
           ============================================================ */

        ::selection {
            background-color: var(--color-primary) !important;
            color: #ffffff !important;
        }

        ::-webkit-scrollbar {
            width: 7px;
            height: 7px;
        }

        ::-webkit-scrollbar-track {
            background: var(--color-bg);
        }

        ::-webkit-scrollbar-thumb {
            background: var(--color-border);
            border-radius: 999px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: var(--color-primary);
        }

        :focus-visible {
            outline: 2px solid var(--color-primary);
            outline-offset: 3px;
        }

        /* ============================================================
           INPUTS
           ============================================================ */

        input,
        select,
        textarea {
            font-size: 16px !important;
            background-color: var(--color-bg-card) !important;
            color: var(--color-text-primary) !important;
            border-color: var(--color-border) !important;
        }

        input::placeholder,
        textarea::placeholder {
            color: var(--color-text-muted) !important;
        }

        input:focus,
        select:focus,
        textarea:focus {
            border-color: var(--color-primary) !important;
            outline: none !important;
            box-shadow: 0 0 0 3px var(--color-primary-soft) !important;
        }

        /* ============================================================
           THEME TOGGLE
           ============================================================ */

        .theme-toggle {
            background: var(--color-bg) !important;
            border: 1px solid var(--color-border) !important;
            color: var(--color-text-primary) !important;
            padding: 8px 14px;
            border-radius: 9999px;
            cursor: pointer;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            font-family: 'Work Sans', sans-serif;
            font-size: 13px;
            font-weight: 500;
        }

        .theme-toggle:hover {
            background: var(--color-primary) !important;
            color: #ffffff !important;
            border-color: var(--color-primary) !important;
            transform: translateY(-1px);
        }

        .theme-toggle svg {
            width: 18px;
            height: 18px;
            flex-shrink: 0;
        }

        /* ============================================================
           CARDS
           ============================================================ */

        .card-hover {
            background-color: var(--color-bg-card) !important;
            border: 1px solid var(--color-border);
            border-radius: 1.25rem;
            transition: all 0.3s ease;
        }

        .card-hover:hover {
            box-shadow: 0 8px 25px var(--color-shadow-hover);
            transform: translateY(-2px);
            border-color: var(--color-primary);
        }

        .post-card {
            background: var(--color-bg-card);
            border: 1px solid var(--color-border);
            border-radius: 1.25rem;
            padding: 1.5rem 1.75rem;
            transition: all 0.3s ease;
        }

        .post-card:hover {
            border-color: var(--color-primary);
            box-shadow: 0 8px 30px var(--color-shadow);
            transform: translateY(-2px);
        }

        .rounded-xl,
        .rounded-2xl,
        .rounded-full {
            background-color: var(--color-bg-card) !important;
            border: 1px solid var(--color-border);
            transition: all 0.3s ease;
        }

        /* ============================================================
           BADGES / TAGS
           ============================================================ */

        .tag {
            display: inline-block;
            padding: 4px 14px;
            border-radius: 9999px;
            font-size: 12px;
            font-weight: 500;
            font-family: 'Work Sans', sans-serif;
            transition: all 0.2s ease;
        }

        .tag-primary {
            background: var(--color-primary);
            color: #ffffff;
        }

        .tag-primary:hover {
            background: var(--color-primary-hover);
            transform: scale(1.05);
        }

        .tag-outline {
            background: transparent;
            color: var(--color-text-secondary);
            border: 1px solid var(--color-border);
        }

        .tag-outline:hover {
            border-color: var(--color-primary);
            color: var(--color-primary);
        }

        .category-tag {
            display: inline-block;
            padding: 0.35rem 1rem;
            border-radius: 9999px;
            background: var(--color-bg);
            border: 1px solid var(--color-border);
            color: var(--color-text-secondary);
            font-size: 0.85rem;
            font-weight: 500;
            transition: all 0.2s ease;
            cursor: pointer;
        }

        .category-tag:hover {
            border-color: var(--color-primary);
            color: var(--color-primary);
            background: var(--color-primary-soft);
        }

        /* ============================================================
           SEARCH BAR
           ============================================================ */

        .search-bar {
            background: var(--color-bg-card) !important;
            border: 1px solid var(--color-border) !important;
            border-radius: 9999px !important;
            padding: 10px 20px !important;
            color: var(--color-text-primary) !important;
        }

        .search-bar:focus {
            border-color: var(--color-primary) !important;
            box-shadow: 0 0 0 3px var(--color-primary-soft) !important;
        }

        /* ============================================================
           BACKGROUND OVERRIDES
           ============================================================ */

        body,
        .min-h-screen,
        main,
        footer,
        header {
            background-color: var(--color-bg) !important;
            transition: background-color 0.3s ease;
        }

        /* Card backgrounds */
        .bg-\[\#121212\],
        .bg-\[\#1c1a17\],
        .bg-zinc-800,
        .bg-\[\#0f0e0d\],
        .bg-\[\#161513\],
        .bg-\[\#141311\],
        .bg-charcoal-950,
        .bg-charcoal-900,
        .bg-charcoal-800,
        .bg-zinc-800\/60,
        .bg-zinc-800\/90,
        .bg-zinc-700\/80,
        .bg-\[\#1c1a17\],
        #mobile-menu,
        .dropdown-menu {
            background-color: var(--color-bg-card) !important;
            transition: background-color 0.3s ease;
        }

        /* Navbar */
        .sticky.top-0 {
            background-color: var(--color-bg-card) !important;
            border-bottom: 1px solid var(--color-border) !important;
            box-shadow: 0 1px 3px var(--color-shadow) !important;
        }

        /* ============================================================
           TEXT COLORS
           ============================================================ */

        .text-white {
            color: var(--color-text-primary) !important;
        }

        .text-gray-200,
        .text-gray-300,
        .text-stone-200,
        .text-stone-300 {
            color: var(--color-text-secondary) !important;
        }

        .text-zinc-400,
        .text-stone-400,
        .text-gray-400 {
            color: var(--color-text-secondary) !important;
        }

        .text-zinc-500,
        .text-stone-500,
        .text-gray-500 {
            color: var(--color-text-muted) !important;
        }

        /* Primary color - Purple in light, Blue in dark */
        .text-amber-400,
        .text-amber-500,
        .text-amber-600,
        .text-rust,
        .text-rust-400,
        .text-rust-500,
        .text-purple-300,
        .text-purple-400,
        .text-purple-500,
        .text-purple {
            color: var(--color-primary) !important;
        }

        .hover\:text-amber-400:hover,
        .hover\:text-amber-500:hover,
        .hover\:text-rust:hover,
        .hover\:text-rust-400:hover,
        .hover\:text-purple:hover,
        .hover\:text-purple-300:hover {
            color: var(--color-primary) !important;
        }

        .hover\:text-white:hover {
            color: var(--color-text-primary) !important;
        }

        .hover\:text-stone-100:hover {
            color: var(--color-text-primary) !important;
        }

        /* ============================================================
           BUTTONS
           ============================================================ */

        .bg-amber-500,
        .bg-amber-600,
        .bg-rust,
        .bg-purple-600,
        .bg-purple {
            background-color: var(--color-primary) !important;
            color: #ffffff !important;
        }

        .hover\:bg-amber-500:hover,
        .hover\:bg-amber-600:hover,
        .hover\:bg-rust:hover,
        .hover\:bg-purple-500:hover,
        .hover\:bg-purple-700:hover {
            background-color: var(--color-primary-hover) !important;
        }

        .bg-rust\/80,
        .bg-amber-500\/80 {
            background-color: var(--color-primary-hover) !important;
            color: #ffffff !important;
        }

        .bg-rust\/10,
        .bg-purple\/10 {
            background-color: var(--color-primary-soft) !important;
        }

        .hover\:bg-rust\/10:hover,
        .hover\:bg-purple\/10:hover {
            background-color: var(--color-primary-soft) !important;
        }

        .hover\:bg-rust\/20:hover,
        .hover\:bg-purple\/20:hover {
            background-color: var(--color-primary-soft) !important;
        }

        /* ============================================================
           BORDERS
           ============================================================ */

        .border-zinc-800,
        .border-stone-800,
        .border-zinc-800\/80,
        .border-stone-800\/80,
        .border-zinc-700\/80,
        .border-stone-700\/80,
        .border-zinc-700,
        .border-stone-700,
        .border-white\/5 {
            border-color: var(--color-border) !important;
        }

        .border-amber-500,
        .border-rust,
        .border-purple-800,
        .border-purple-800\/40 {
            border-color: var(--color-primary) !important;
        }

        .border-rust\/10,
        .border-purple\/10,
        .border-rust\/20,
        .border-purple\/20 {
            border-color: var(--color-border) !important;
        }

        .hover\:border-rust:hover,
        .hover\:border-rust\/40:hover,
        .hover\:border-purple:hover,
        .hover\:border-purple-800:hover {
            border-color: var(--color-primary) !important;
        }

        .divide-zinc-800>*,
        .divide-stone-800>* {
            border-color: var(--color-border) !important;
        }

        /* ============================================================
           SHADOWS
           ============================================================ */

        .shadow-sm {
            box-shadow: 0 1px 3px var(--color-shadow) !important;
        }

        .shadow-2xl {
            box-shadow: 0 25px 50px -12px var(--color-shadow) !important;
        }

        .shadow-rust\/20,
        .shadow-amber-500\/20,
        .shadow-purple\/20 {
            box-shadow: 0 4px 6px -1px var(--color-shadow), 0 2px 4px -1px var(--color-shadow) !important;
        }

        /* ============================================================
           MOBILE MENU
           ============================================================ */

        #mobile-menu a:hover {
            background: var(--color-bg) !important;
            color: var(--color-text-primary) !important;
        }

        /* ============================================================
           RESPONSIVE
           ============================================================ */

        @media (max-width: 767px) {
            .theme-toggle span {
                display: none;
            }

            .theme-toggle {
                padding: 6px 10px;
            }
        }

        @media (prefers-reduced-motion: reduce) {
            * {
                animation-duration: 0.01ms !important;
                transition-duration: 0.01ms !important;
            }
        }
    </style>
</head>

<body class="antialiased bg-[var(--color-bg)] text-[var(--color-text-secondary)] selection:bg-[var(--color-primary)] selection:text-white">
    <div class="min-h-screen flex flex-col">

        {{-- ============================================================
             NAVIGATION
             ============================================================ --}}

        <nav class="sticky top-0 z-50 bg-[var(--color-bg-card)] backdrop-blur-md border-b border-[var(--color-border)] shadow-sm">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between items-center h-16">

                    {{-- LOGO --}}
                    <div class="flex items-center">
                        <a href="{{ route('posts.index') }}"
                            class="flex items-center gap-2 text-2xl sm:text-3xl font-bold tracking-tight text-[var(--color-text-primary)] hover:text-[var(--color-primary)] transition-colors group heading-font">
                            <span class="text-[var(--color-primary)] group-hover:scale-110 transition-transform duration-300">✦</span>
                            chronicle
                        </a>
                    </div>

                    {{-- DESKTOP NAV --}}
                    <div class="hidden sm:flex sm:items-center sm:space-x-6 text-sm font-medium">

                        <a href="{{ route('posts.index') }}"
                            class="text-[var(--color-text-secondary)] hover:text-[var(--color-text-primary)] border-b-2 border-transparent hover:border-[var(--color-primary)] transition-all py-1 {{ request()->routeIs('posts.index') ? 'border-[var(--color-primary)] text-[var(--color-text-primary)] font-semibold' : '' }}">
                            Home
                        </a>

                        {{-- Categories Dropdown --}}
                        <div class="relative group py-5">
                            <a href="{{ route('categories.index') }}"
                                class="flex items-center gap-1 text-[var(--color-text-secondary)] hover:text-[var(--color-text-primary)] border-b-2 border-transparent hover:border-[var(--color-primary)] transition-all py-1 {{ request()->routeIs('categories.*') || request()->routeIs('posts.category') ? 'border-[var(--color-primary)] text-[var(--color-text-primary)] font-semibold' : '' }}">
                                <span>Categories</span>
                                <svg class="w-4 h-4 transition-transform duration-300 group-hover:rotate-180 text-[var(--color-text-muted)]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                </svg>
                            </a>

                            <div class="absolute left-0 top-full hidden group-hover:block w-56 pt-1 z-50">
                                <div class="bg-[var(--color-bg-card)] border border-[var(--color-border)] rounded-xl shadow-lg p-2 overflow-hidden">
                                    @if(isset($navCategories) && $navCategories->count())
                                    @foreach($navCategories as $cat)
                                    <a href="{{ route('posts.category', $cat) }}"
                                        class="block px-4 py-2 text-sm text-[var(--color-text-secondary)] hover:text-[var(--color-text-primary)] hover:bg-[var(--color-bg)] rounded-lg transition-colors">
                                        {{ $cat->name }}
                                    </a>
                                    @endforeach
                                    @endif

                                    <div class="border-t border-[var(--color-border)] my-1"></div>

                                    <a href="{{ route('categories.index') }}"
                                        class="block px-4 py-2 text-xs font-semibold text-[var(--color-primary)] hover:text-[var(--color-primary-hover)] hover:bg-[var(--color-bg)] rounded-lg transition-colors">
                                        View All Categories &rarr;
                                    </a>
                                </div>
                            </div>
                        </div>

                        <a href="{{ route('about') }}"
                            class="text-[var(--color-text-secondary)] hover:text-[var(--color-text-primary)] border-b-2 border-transparent hover:border-[var(--color-primary)] transition-all py-1 {{ request()->routeIs('about') ? 'border-[var(--color-primary)] text-[var(--color-text-primary)] font-semibold' : '' }}">
                            About
                        </a>

                        {{-- THEME TOGGLE --}}
                        <button onclick="toggleTheme()" class="theme-toggle" aria-label="Toggle theme">
                            <svg id="theme-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
                            </svg>
                            <span id="theme-label">Dark</span>
                        </button>

                        @auth
                        @if(auth()->user()->is_admin ?? false)
                        <a href="{{ route('admin.posts.index') }}" class="text-[var(--color-text-secondary)] hover:text-[var(--color-text-primary)] border-b-2 border-transparent hover:border-[var(--color-primary)] transition-all py-1">
                            Dashboard
                        </a>
                        @endif
                        <a href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                            class="text-[var(--color-text-secondary)] hover:text-[var(--color-text-primary)] border-b-2 border-transparent hover:border-[var(--color-primary)] transition-all py-1">
                            Logout
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                            @csrf
                        </form>
                        @else
                        <a href="{{ route('login') }}"
                            class="bg-[var(--color-primary)] text-white px-5 py-2 text-base rounded-full hover:bg-[var(--color-primary-hover)] transition-all shadow-lg shadow-[var(--color-shadow)] hover:shadow-[var(--color-shadow-hover)] transform hover:scale-105 font-medium">
                            Sign In
                        </a>
                        @endauth
                    </div>

                    {{-- MOBILE MENU BUTTON --}}
                    <div class="flex items-center sm:hidden gap-2">
                        <button onclick="toggleTheme()" class="theme-toggle !p-2" aria-label="Toggle theme">
                            <svg id="mobile-theme-icon" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
                            </svg>
                        </button>
                        <button id="menu-toggle" aria-label="Toggle navigation menu" aria-expanded="false"
                            class="inline-flex items-center justify-center p-2 rounded-md text-[var(--color-text-secondary)] hover:text-[var(--color-text-primary)] hover:bg-[var(--color-bg)] transition-colors focus:outline-none">
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            </svg>
                        </button>
                    </div>

                </div>
            </div>

            {{-- MOBILE NAV --}}
            <div id="mobile-menu" class="hidden sm:hidden border-t border-[var(--color-border)] bg-[var(--color-bg)]">
                <div class="px-2 pt-2 pb-3 space-y-1">
                    @php
                    $navItems = [
                    'posts.index' => 'Home',
                    'categories.index' => 'Categories',
                    'about' => 'About',
                    ];
                    @endphp

                    @foreach($navItems as $route => $label)
                    <a href="{{ route($route) }}"
                        class="block px-3 py-2 rounded-md text-base font-medium transition-colors {{ request()->routeIs($route) ? 'bg-[var(--color-bg-card)] text-[var(--color-text-primary)]' : 'text-[var(--color-text-secondary)] hover:bg-[var(--color-bg-card)] hover:text-[var(--color-text-primary)]' }}">
                        {{ $label }}
                    </a>
                    @endforeach

                    @auth
                    @if(auth()->user()->is_admin ?? false)
                    <a href="{{ route('admin.posts.index') }}" class="block px-3 py-2 rounded-md text-base font-medium text-[var(--color-text-secondary)] hover:bg-[var(--color-bg-card)] transition-colors">
                        Dashboard
                    </a>
                    @endif
                    <a href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form-mobile').submit();"
                        class="block px-3 py-2 rounded-md text-base font-medium text-[var(--color-text-secondary)] hover:bg-[var(--color-bg-card)] transition-colors">
                        Logout
                    </a>
                    <form id="logout-form-mobile" action="{{ route('logout') }}" method="POST" class="hidden">
                        @csrf
                    </form>
                    @else
                    <a href="{{ route('login') }}"
                        class="block w-full text-center px-3 py-2 mt-2 rounded-full text-base font-medium bg-[var(--color-primary)] text-white hover:bg-[var(--color-primary-hover)] transition-colors">
                        Sign In
                    </a>
                    @endauth
                </div>
            </div>
        </nav>

        {{-- ============================================================
             MAIN CONTENT
             ============================================================ --}}

        <main class="flex-1 w-full bg-[var(--color-bg)]">
            @yield('content')
        </main>

        {{-- ============================================================
             FOOTER
             ============================================================ --}}

        <footer class="bg-[var(--color-bg)] text-[var(--color-text-secondary)] border-t border-[var(--color-border)] relative overflow-hidden">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 relative z-10">

                {{-- SEARCH BAR --}}
                <div class="max-w-2xl mx-auto mb-14 relative" id="footer-search-container">
                    <form method="GET" action="{{ route('posts.index') }}" class="relative group">
                        <input type="text" id="footer-search-input" name="q"
                            value="{{ request('q', $search ?? '') }}"
                            placeholder="Search articles or topics..."
                            autocomplete="off"
                            class="w-full px-6 py-3.5 pl-12 rounded-full bg-[var(--color-bg-card)] border border-[var(--color-border)] text-[var(--color-text-primary)] placeholder:text-[var(--color-text-muted)] focus:outline-none focus:border-[var(--color-primary)] focus:ring-1 focus:ring-[var(--color-primary)] transition-all text-sm">
                        <svg class="absolute left-4 top-1/2 -translate-y-1/2 w-5 h-5 text-[var(--color-text-muted)] group-focus-within:text-[var(--color-primary)] transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                        <button type="submit"
                            class="absolute right-1.5 top-1/2 -translate-y-1/2 px-5 py-2 bg-[var(--color-primary)] hover:bg-[var(--color-primary-hover)] text-white rounded-full text-xs font-medium transition-colors shadow-sm">
                            Search
                        </button>
                    </form>

                    {{-- Suggestions Dropdown --}}
                    <div id="footer-suggestions-dropdown"
                        class="hidden absolute left-0 right-0 bottom-full mb-2 bg-[var(--color-bg-card)] border border-[var(--color-border)] rounded-2xl shadow-2xl overflow-hidden z-50 text-left text-sm max-h-80 overflow-y-auto divide-y divide-[var(--color-border)]">
                        <div id="footer-suggestions-content"></div>
                    </div>

                    @if (request('q') || ($search ?? false))
                    <div class="text-center mt-3">
                        <a href="{{ route('posts.index') }}" class="text-xs text-[var(--color-text-muted)] hover:text-[var(--color-text-secondary)] transition-colors">
                            Clear search results
                        </a>
                    </div>
                    @endif
                </div>

                {{-- FOOTER GRID --}}
                <div class="grid grid-cols-1 md:grid-cols-4 gap-10">

                    <div class="md:col-span-1">
                        <a href="{{ route('posts.index') }}"
                            class="inline-flex items-center gap-2 text-2xl sm:text-3xl font-bold text-[var(--color-text-primary)] hover:text-[var(--color-primary)] transition-colors mb-3 group heading-font">
                            <span class="text-[var(--color-primary)] group-hover:scale-110 transition-transform duration-300">✦</span>
                            <span>chronicle</span>
                        </a>
                        <p class="text-[var(--color-text-muted)] max-w-md text-sm leading-relaxed">
                            A quiet corner for thoughtful writing, curated essays, and slow reading.
                        </p>
                    </div>

                    <div class="text-left md:text-center">
                        <h5 class="font-semibold text-[var(--color-primary)] text-xs uppercase tracking-widest mb-4 heading-font">Explore Topics</h5>
                        <ul class="space-y-2.5 text-sm">
                            <li><a href="{{ route('posts.index') }}" class="text-[var(--color-text-secondary)] hover:text-[var(--color-primary)] transition-colors">All Posts</a></li>
                            <li><a href="{{ route('categories.index') }}" class="text-[var(--color-text-secondary)] hover:text-[var(--color-primary)] transition-colors">Categories</a></li>
                            <li><a href="{{ route('about') }}" class="text-[var(--color-text-secondary)] hover:text-[var(--color-primary)] transition-colors">About</a></li>
                        </ul>
                    </div>

                    <div>
                        <h5 class="font-semibold text-[var(--color-primary)] text-xs uppercase tracking-widest mb-4 heading-font">Categories</h5>
                        <ul class="space-y-2.5 text-sm">
                            @if(isset($navCategories) && $navCategories->count())
                            @foreach($navCategories as $cat)
                            <li>
                                <a href="{{ route('posts.category', $cat) }}" class="text-[var(--color-text-secondary)] hover:text-[var(--color-primary)] transition-colors">
                                    {{ $cat->name }}
                                </a>
                            </li>
                            @endforeach
                            @endif
                            <li>
                                <a href="{{ route('categories.index') }}"
                                    class="text-[var(--color-primary)] hover:text-[var(--color-primary-hover)] transition-colors text-xs font-semibold inline-flex items-center gap-1 mt-1 group">
                                    <span>View all</span>
                                    <span class="group-hover:translate-x-1 transition-transform duration-300">&rarr;</span>
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div>
                        <h5 class="font-semibold text-[var(--color-primary)] text-xs uppercase tracking-widest mb-4 heading-font">Connect</h5>
                        <ul class="space-y-2.5 text-sm">
                            <li><a href="#" class="text-[var(--color-text-secondary)] hover:text-[var(--color-primary)] transition-colors">Newsletter</a></li>
                            <li><a href="#" class="text-[var(--color-text-secondary)] hover:text-[var(--color-primary)] transition-colors">RSS Feed</a></li>
                        </ul>
                    </div>

                </div>

                {{-- COPYRIGHT --}}
                <div class="border-t border-[var(--color-border)] mt-12 pt-8 flex flex-col sm:flex-row justify-between items-center text-xs text-[var(--color-text-muted)]">
                    <p>&copy; {{ date('Y') }} chronicle · crafted with care</p>
                    <button onclick="toggleTheme()" class="theme-toggle !text-xs mt-2 sm:mt-0">
                        <span id="footer-theme-label">Switch to Dark</span>
                    </button>
                </div>

            </div>
        </footer>

    </div>

    {{-- ============================================================
         JAVASCRIPT
         ============================================================ --}}

    <script>
        (function() {
            'use strict';

            const THEME_KEY = 'theme';

            function getStoredTheme() {
                const saved = localStorage.getItem(THEME_KEY);
                if (saved === 'dark' || saved === 'light') return saved;
                return 'light';
            }

            function applyTheme(theme) {
                const html = document.documentElement;
                html.setAttribute('data-theme', theme);
                localStorage.setItem(THEME_KEY, theme);
                updateThemeUI(theme);
            }

            function updateThemeUI(theme) {
                const isDark = theme === 'dark';

                const icon = document.getElementById('theme-icon');
                const mobileIcon = document.getElementById('mobile-theme-icon');
                const label = document.getElementById('theme-label');
                const footerLabel = document.getElementById('footer-theme-label');

                if (icon) {
                    icon.innerHTML = isDark ?
                        '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"/>' :
                        '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"/>';
                }

                if (mobileIcon) {
                    mobileIcon.innerHTML = icon ? icon.innerHTML : '';
                }

                if (label) label.textContent = isDark ? 'Light' : 'Dark';
                if (footerLabel) footerLabel.textContent = isDark ? 'Switch to Light' : 'Switch to Dark';

                const themeMeta = document.querySelector('meta[name="theme-color"]');
                if (themeMeta) {
                    themeMeta.setAttribute('content', isDark ? '#1A1A2E' : '#F8F9FA');
                }
            }

            window.toggleTheme = function() {
                const current = document.documentElement.getAttribute('data-theme') || 'light';
                applyTheme(current === 'dark' ? 'light' : 'dark');
            };

            // Apply saved theme
            applyTheme(getStoredTheme());

            document.addEventListener('DOMContentLoaded', function() {

                // Mobile menu toggle
                const toggleBtn = document.getElementById('menu-toggle');
                const mobileMenu = document.getElementById('mobile-menu');

                if (toggleBtn && mobileMenu) {
                    toggleBtn.addEventListener('click', function() {
                        const isHidden = mobileMenu.classList.toggle('hidden');
                        toggleBtn.setAttribute('aria-expanded', !isHidden);
                    });
                }

                // Close mobile menu on outside click
                document.addEventListener('click', function(event) {
                    if (mobileMenu && toggleBtn) {
                        if (!mobileMenu.classList.contains('hidden') &&
                            !mobileMenu.contains(event.target) &&
                            !toggleBtn.contains(event.target)) {
                            mobileMenu.classList.add('hidden');
                            toggleBtn.setAttribute('aria-expanded', 'false');
                        }
                    }
                });

                // Close mobile menu on Escape key
                document.addEventListener('keydown', function(event) {
                    if (event.key === 'Escape' && mobileMenu && !mobileMenu.classList.contains('hidden')) {
                        mobileMenu.classList.add('hidden');
                        toggleBtn.setAttribute('aria-expanded', 'false');
                    }
                });

                // Footer Search Live Suggestions
                const footerInput = document.getElementById('footer-search-input');
                const dropdown = document.getElementById('footer-suggestions-dropdown');
                const content = document.getElementById('footer-suggestions-content');
                const container = document.getElementById('footer-search-container');
                let debounceTimer;

                if (footerInput && dropdown && content) {
                    footerInput.addEventListener('input', function() {
                        const query = this.value.trim();
                        clearTimeout(debounceTimer);

                        if (query.length === 0) {
                            dropdown.classList.add('hidden');
                            content.innerHTML = '';
                            return;
                        }

                        debounceTimer = setTimeout(() => {
                            fetch(`{{ route('posts.suggestions') }}?q=${encodeURIComponent(query)}`)
                                .then(res => res.json())
                                .then(data => {
                                    let html = '';

                                    if (data.categories && data.categories.length > 0) {
                                        html += `<div class="px-4 py-2 text-[10px] font-semibold text-[var(--color-primary)] uppercase tracking-widest bg-[var(--color-bg)] border-b border-[var(--color-border)] heading-font">Categories</div>`;
                                        data.categories.forEach(cat => {
                                            const catUrl = cat.url || `/category/${cat.slug || cat.id}`;
                                            html += `
                                                <a href="${catUrl}" class="px-4 py-2.5 hover:bg-[var(--color-bg)] transition-colors flex items-center justify-between group">
                                                    <span class="font-medium text-[var(--color-text-secondary)] group-hover:text-[var(--color-text-primary)] transition-colors">${cat.name}</span>
                                                    <span class="text-[10px] px-2 py-0.5 rounded bg-[var(--color-bg-card)] text-[var(--color-text-muted)] font-semibold border border-[var(--color-border)]">Category</span>
                                                </a>
                                            `;
                                        });
                                    }

                                    if (data.posts && data.posts.length > 0) {
                                        html += `<div class="px-4 py-2 text-[10px] font-semibold text-[var(--color-primary)] uppercase tracking-widest bg-[var(--color-bg)] border-b border-[var(--color-border)] heading-font">Posts</div>`;
                                        data.posts.forEach(post => {
                                            const postUrl = post.url || `/posts/${post.slug || post.id}`;
                                            html += `
                                                <a href="${postUrl}" class="px-4 py-2.5 hover:bg-[var(--color-bg)] transition-colors flex items-center justify-between group">
                                                    <span class="font-medium text-[var(--color-text-secondary)] group-hover:text-[var(--color-text-primary)] transition-colors truncate max-w-[320px]">${post.title}</span>
                                                    <span class="text-[10px] px-2 py-0.5 rounded bg-[var(--color-bg-card)] text-[var(--color-text-muted)] font-semibold border border-[var(--color-border)]">Post</span>
                                                </a>
                                            `;
                                        });
                                    }

                                    if ((!data.categories || data.categories.length === 0) && (!data.posts || data.posts.length === 0)) {
                                        html = `<div class="p-4 text-center text-[var(--color-text-muted)] text-xs">No matching posts or categories</div>`;
                                    }

                                    content.innerHTML = html;
                                    dropdown.classList.remove('hidden');
                                })
                                .catch(() => dropdown.classList.add('hidden'));
                        }, 200);
                    });

                    document.addEventListener('click', function(e) {
                        if (container && !container.contains(e.target)) {
                            dropdown.classList.add('hidden');
                        }
                    });
                }

            });
        })();
    </script>

    @stack('scripts')
</body>

</html>