<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
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
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700;800&family=Work+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    {{-- HTMX --}}
    <script src="https://unpkg.com/htmx.org@1.9.12"></script>

    @stack('styles')

    <style>
        /* Global typography & color variables */
        :root {
            --color-rust: #c45a2e;
            --color-rust-hover: rgba(196, 90, 46, 0.8);
            --color-black: #000000;
            --color-dark: #121212;
            --color-white: #ffffff;
            --color-white-75: rgba(255, 255, 255, 0.75);
            --color-white-50: rgba(255, 255, 255, 0.5);
            --color-white-30: rgba(255, 255, 255, 0.3);
            --color-white-05: rgba(255, 255, 255, 0.05);
        }

        /* Apply Work Sans as base font */
        body {
            font-family: 'Work Sans', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            background-color: #000000 !important;
        }

        /* Heading font family */
        h1, h2, h3, h4, h5, h6,
        .text-2xl, .text-3xl,
        .heading-font {
            font-family: 'Poppins', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif !important;
            letter-spacing: -0.02em !important;
        }

        /* Input minimum font size for mobile */
        input, select, textarea {
            font-size: 16px !important;
        }

        /* All backgrounds to black */
        body, .min-h-screen, main, footer, header {
            background-color: #000000 !important;
        }

        /* Card/container backgrounds to dark charcoal */
        .bg-amber-500, .bg-amber-600, .bg-rust {
            background-color: #c45a2e !important;
        }
        
        .hover\:bg-amber-500:hover, .hover\:bg-amber-600:hover, .hover\:bg-rust:hover {
            background-color: rgba(196, 90, 46, 0.8) !important;
        }

        /* Text colors - Rust */
        .text-amber-400, .text-amber-500, .text-amber-600, 
        .text-rust, .text-rust-400, .text-rust-500 {
            color: #c45a2e !important;
        }
        
        .text-amber-500\/80, .text-rust\/80 {
            color: rgba(196, 90, 46, 0.8) !important;
        }
        
        .hover\:text-amber-400:hover, .hover\:text-amber-500:hover,
        .hover\:text-rust:hover, .hover\:text-rust-400:hover {
            color: #c45a2e !important;
        }

        /* Border colors - Rust */
        .border-amber-500, .border-rust {
            border-color: #c45a2e !important;
        }
        .border-amber-500\/50, .border-rust\/50 {
            border-color: rgba(196, 90, 46, 0.5) !important;
        }
        .border-rust\/10 {
            border-color: rgba(196, 90, 46, 0.1) !important;
        }
        .border-rust\/20 {
            border-color: rgba(196, 90, 46, 0.2) !important;
        }
        .border-rust\/40 {
            border-color: rgba(196, 90, 46, 0.4) !important;
        }

        /* Focus states */
        .focus\:border-amber-500:focus, .focus\:border-rust:focus {
            border-color: #c45a2e !important;
        }
        .focus\:ring-amber-500:focus, .focus\:ring-rust:focus {
            --tw-ring-color: #c45a2e !important;
        }

        /* Selection */
        ::selection, .selection\:bg-amber-500\/30::selection {
            background-color: rgba(196, 90, 46, 0.3) !important;
            color: #ffffff !important;
        }

        /* Dark backgrounds - force all to black or charcoal */
        .bg-\[\#0f0e0d\], .bg-\[\#161513\], .bg-\[\#141311\], 
        .bg-charcoal-950, .bg-charcoal-900, .bg-charcoal-800,
        .bg-zinc-800, .bg-zinc-800\/60, .bg-zinc-800\/90, 
        .bg-zinc-700\/80, .bg-\[\#1c1a17\] {
            background-color: #000000 !important;
        }

        /* Card-like elements to charcoal */
        .rounded-xl, .rounded-2xl, .rounded-full,
        .bg-\[\#121212\], .bg-\[\#1c1a17\], .bg-zinc-800 {
            background-color: #121212 !important;
        }

        /* Override any remaining white backgrounds */
        *[class*="bg-white"]:not(.bg-white\/5):not(.bg-white\/30):not(.bg-white\/50):not(.bg-white\/75) {
            background-color: #121212 !important;
        }

        /* Text colors - White variations */
        .text-white { color: #ffffff !important; }
        .text-gray-200, .text-gray-300, .text-stone-200, .text-stone-300 {
            color: rgba(255, 255, 255, 0.75) !important;
        }
        .text-zinc-400, .text-stone-400, .text-gray-400 {
            color: rgba(255, 255, 255, 0.5) !important;
        }
        .text-zinc-500, .text-stone-500, .text-gray-500 {
            color: rgba(255, 255, 255, 0.3) !important;
        }
        .hover\:text-white:hover { color: #ffffff !important; }
        .hover\:text-stone-100:hover { color: #ffffff !important; }

        /* Border colors - white variations */
        .border-zinc-800, .border-stone-800, 
        .border-zinc-800\/80, .border-stone-800\/80,
        .border-zinc-700\/80, .border-stone-700\/80,
        .border-zinc-700, .border-stone-700 {
            border-color: rgba(255, 255, 255, 0.05) !important;
        }
        .divide-zinc-800 > *, .divide-stone-800 > * {
            border-color: rgba(255, 255, 255, 0.05) !important;
        }

        /* Placeholder */
        .placeholder\:text-zinc-500::placeholder, .placeholder\:text-stone-500::placeholder {
            color: rgba(255, 255, 255, 0.3) !important;
        }

        /* Shadows */
        .shadow-sm { box-shadow: 0 1px 2px 0 rgba(196, 90, 46, 0.05) !important; }
        .shadow-2xl { box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5) !important; }
        .shadow-rust\/20 { box-shadow: 0 4px 6px -1px rgba(196, 90, 46, 0.2), 0 2px 4px -1px rgba(196, 90, 46, 0.1) !important; }
        .shadow-rust\/40 { box-shadow: 0 10px 15px -3px rgba(196, 90, 46, 0.4), 0 4px 6px -2px rgba(196, 90, 46, 0.2) !important; }

        /* Hover states for links with rust */
        .hover\:text-\[\#c45a2e\]:hover, .hover\:text-rust:hover {
            color: #c45a2e !important;
        }
        .hover\:border-rust:hover, .hover\:border-rust\/40:hover {
            border-color: #c45a2e !important;
        }
        .hover\:border-rust\/30:hover {
            border-color: rgba(196, 90, 46, 0.3) !important;
        }
        .hover\:bg-rust\/10:hover {
            background-color: rgba(196, 90, 46, 0.1) !important;
        }
        .hover\:bg-rust\/20:hover {
            background-color: rgba(196, 90, 46, 0.2) !important;
        }

        /* Group hover states */
        .group-hover\:text-rust:hover, .group-hover\:text-amber-400:hover {
            color: #c45a2e !important;
        }
        .group-hover\:border-rust:hover {
            border-color: #c45a2e !important;
        }

        /* Backdrop blur backgrounds */
        .bg-black\/90, .bg-black\/95 {
            background-color: rgba(0, 0, 0, 0.95) !important;
        }

        /* Glow effects */
        .bg-rust\/5, .bg-amber-500\/5 {
            background-color: rgba(196, 90, 46, 0.05) !important;
        }
        .bg-rust\/20, .bg-amber-500\/20 {
            background-color: rgba(196, 90, 46, 0.2) !important;
        }
        .hover\:bg-rust\/80:hover {
            background-color: rgba(196, 90, 46, 0.8) !important;
        }

        /* Ring */
        .ring-amber-500, .ring-rust {
            --tw-ring-color: #c45a2e !important;
        }
        .focus\:ring-1.focus\:ring-amber-500:focus, .focus\:ring-1.focus\:ring-rust:focus {
            --tw-ring-color: #c45a2e !important;
        }

        /* Smooth transitions */
        .transition-all, .transition-colors {
            transition-property: all;
            transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
            transition-duration: 300ms;
        }

        /* Logo font override */
        .font-\[\'Fraunces\'\], .font-serif {
            font-family: 'Poppins', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif !important;
        }

        /* Mobile menu background */
        #mobile-menu, .bg-\[\#161513\] {
            background-color: #000000 !important;
        }

        /* Footer search container */
        #footer-search-container input {
            background-color: #121212 !important;
        }

        /* Dropdown menu background */
        .bg-\[\#1c1a17\], .dropdown-menu {
            background-color: #121212 !important;
        }

        /* Specific overrides for any remaining light elements */
        [class*="bg-stone-"], [class*="bg-zinc-"]:not(.bg-zinc-800):not(.bg-zinc-900):not(.bg-zinc-950) {
            background-color: #000000 !important;
        }
        
        /* Ensure text inputs have proper background */
        input[type="text"], input[type="email"], input[type="password"], 
        input[type="search"], textarea, select {
            background-color: #121212 !important;
            color: #ffffff !important;
        }

        /* Button backgrounds - primary */
        .bg-rust, .bg-amber-500, .bg-amber-600 {
            background-color: #c45a2e !important;
        }
        .bg-rust\/80, .bg-amber-500\/80 {
            background-color: rgba(196, 90, 46, 0.8) !important;
        }

        /* Success/status colors if needed */
        .text-green-400 { color: #4ade80 !important; }
        .bg-green-400\/5 { background-color: rgba(74, 222, 128, 0.05) !important; }
    </style>
</head>
<body class="antialiased bg-black text-white/75 selection:bg-rust/30 selection:text-white">
    <div class="min-h-screen flex flex-col bg-black">
        {{-- Navigation --}}
        <nav class="sticky top-0 z-50 bg-black/95 backdrop-blur-md border-b border-rust/10">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between items-center h-16">
                    {{-- Logo --}}
                    <div class="flex items-center">
                        <a href="{{ route('posts.index') }}" class="flex items-center gap-2 text-2xl sm:text-3xl font-bold tracking-tight text-white hover:text-rust transition-colors group heading-font">
                            <span class="text-rust group-hover:scale-110 transition-transform duration-300">✦</span>
                            chronicle
                        </a>
                    </div>

                    {{-- Desktop Navigation --}}
                    <div class="hidden sm:flex sm:items-center sm:space-x-6 text-sm font-medium">
                        <a href="{{ route('posts.index') }}" 
                           class="text-white/75 hover:text-white border-b-2 border-transparent hover:border-rust/50 transition-all py-1 {{ request()->routeIs('posts.index') ? 'border-rust text-white font-semibold' : '' }}">
                            Home
                        </a>

                        {{-- Categories Hover Dropdown Menu --}}
                        <div class="relative group py-5">
                            <a href="{{ route('categories.index') }}" 
                               class="flex items-center gap-1 text-white/75 hover:text-white border-b-2 border-transparent hover:border-rust/50 transition-all py-1 {{ request()->routeIs('categories.*') || request()->routeIs('posts.category') ? 'border-rust text-white font-semibold' : '' }}">
                                <span>Categories</span>
                                <svg class="w-4 h-4 transition-transform duration-300 group-hover:rotate-180 text-white/50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                </svg>
                            </a>

                            <div class="absolute left-0 top-full hidden group-hover:block w-56 pt-1 z-50">
                                <div class="bg-[#121212] border border-white/5 rounded-xl shadow-2xl p-2 overflow-hidden transition-all duration-300">
                                    @if(isset($navCategories) && $navCategories->count())
                                        @foreach($navCategories as $cat)
                                            <a href="{{ route('posts.category', $cat) }}" 
                                               class="block px-4 py-2 text-sm text-white/75 hover:text-white hover:bg-white/5 rounded-lg transition-colors">
                                                {{ $cat->name }}
                                            </a>
                                        @endforeach
                                    @endif

                                    <div class="border-t border-white/5 my-1"></div>

                                    <a href="{{ route('categories.index') }}" 
                                       class="block px-4 py-2 text-xs font-semibold text-rust/80 hover:text-rust hover:bg-white/5 rounded-lg transition-colors">
                                        View All Categories &rarr;
                                    </a>
                                </div>
                            </div>
                        </div>

                        <a href="{{ route('about') }}" 
                           class="text-white/75 hover:text-white border-b-2 border-transparent hover:border-rust/50 transition-all py-1 {{ request()->routeIs('about') ? 'border-rust text-white font-semibold' : '' }}">
                            About
                        </a>

                        @auth
                            @if(auth()->user()->is_admin ?? false)
                                <a href="{{ route('admin.posts.index') }}" class="text-white/75 hover:text-white border-b-2 border-transparent hover:border-rust/50 transition-all py-1">
                                    Dashboard
                                </a>
                            @endif
                            <a href="{{ route('logout') }}" 
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                               class="text-white/75 hover:text-white border-b-2 border-transparent hover:border-rust/50 transition-all py-1">
                                Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                                @csrf
                            </form>
                        @else
                            <a href="{{ route('login') }}" class="bg-rust text-white px-5 py-2 text-base rounded-full hover:bg-rust/80 transition-all shadow-lg shadow-rust/20 hover:shadow-rust/40 transform hover:scale-105 font-medium">
                                Sign In
                            </a>
                        @endauth
                    </div>

                    {{-- Mobile Menu Button --}}
                    <div class="flex items-center sm:hidden">
                        <button id="menu-toggle" aria-label="Toggle navigation menu" aria-expanded="false" class="inline-flex items-center justify-center p-2 rounded-md text-white/75 hover:text-white hover:bg-white/5 transition-colors focus:outline-none">
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            {{-- Mobile Navigation --}}
            <div id="mobile-menu" class="hidden sm:hidden border-t border-white/5 bg-black">
                <div class="px-2 pt-2 pb-3 space-y-1">
                    @php
                        $navItems = [
                            'posts.index' => 'Home',
                            'categories.index' => 'Categories',
                            'about' => 'About',
                        ];
                    @endphp

                    @foreach($navItems as $route => $label)
                        <a href="{{ route($route) }}" class="block px-3 py-2 rounded-md text-base font-medium transition-colors {{ request()->routeIs($route) ? 'bg-white/5 text-white' : 'text-white/75 hover:bg-white/5 hover:text-white' }}">
                            {{ $label }}
                        </a>
                    @endforeach

                    @auth
                        @if(auth()->user()->is_admin ?? false)
                            <a href="{{ route('admin.posts.index') }}" class="block px-3 py-2 rounded-md text-base font-medium text-white/75 hover:bg-white/5 transition-colors">
                                Dashboard
                            </a>
                        @endif
                        <a href="{{ route('logout') }}" 
                           onclick="event.preventDefault(); document.getElementById('logout-form-mobile').submit();"
                           class="block px-3 py-2 rounded-md text-base font-medium text-white/75 hover:bg-white/5 transition-colors">
                            Logout
                        </a>
                        <form id="logout-form-mobile" action="{{ route('logout') }}" method="POST" class="hidden">
                            @csrf
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="block w-full text-center px-3 py-2 mt-2 rounded-full text-base font-medium bg-rust text-white hover:bg-rust/80 transition-colors">
                            Sign In
                        </a>
                    @endauth
                </div>
            </div>
        </nav>

        {{-- Main Content Container --}}
        <main class="flex-1 w-full bg-black">
            @yield('content')
        </main>

        {{-- Footer --}}
        <footer class="bg-black text-white/75 border-t border-rust/10 relative overflow-hidden">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 relative z-10">
                
                {{-- Integrated Auto-Suggestions Search Bar --}}
                <div class="max-w-2xl mx-auto mb-14 relative" id="footer-search-container">
                    <form method="GET" action="{{ route('posts.index') }}" class="relative group">
                        <input
                            type="text"
                            id="footer-search-input"
                            name="q"
                            value="{{ request('q', $search ?? '') }}"
                            placeholder="Search articles or topics..."
                            autocomplete="off"
                            class="w-full px-6 py-3.5 pl-12 rounded-full bg-[#121212] border border-white/5 text-white placeholder:text-white/30 focus:outline-none focus:border-rust focus:ring-1 focus:ring-rust transition-all text-sm"
                        >
                        <svg class="absolute left-4 top-1/2 -translate-y-1/2 w-5 h-5 text-white/30 group-focus-within:text-rust transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                        <button type="submit" class="absolute right-1.5 top-1/2 -translate-y-1/2 px-5 py-2 bg-rust hover:bg-rust/80 text-white rounded-full text-xs font-medium transition-colors shadow-sm">
                            Search
                        </button>
                    </form>

                    {{-- Live Dropdown Suggestions Container --}}
                    <div id="footer-suggestions-dropdown" class="hidden absolute left-0 right-0 bottom-full mb-2 bg-[#121212] border border-white/5 rounded-2xl shadow-2xl overflow-hidden z-50 text-left text-sm max-h-80 overflow-y-auto divide-y divide-white/5">
                        <div id="footer-suggestions-content"></div>
                    </div>

                    @if (request('q') || ($search ?? false))
                        <div class="text-center mt-3">
                            <a href="{{ route('posts.index') }}" class="text-xs text-white/30 hover:text-white/75 transition-colors">
                                Clear search results
                            </a>
                        </div>
                    @endif
                </div>

                <div class="grid grid-cols-1 md:grid-cols-4 gap-10">
                    <div class="md:col-span-1">
                        <a href="{{ route('posts.index') }}" class="inline-flex items-center gap-2 text-2xl sm:text-3xl font-bold text-white hover:text-rust transition-colors mb-3 group heading-font">
                            <span class="text-rust group-hover:scale-110 transition-transform duration-300">✦</span>
                            <span>chronicle</span>
                        </a>
                        <p class="text-white/50 max-w-md text-sm leading-relaxed">
                            A quiet corner for thoughtful writing, curated essays, and slow reading.
                        </p>
                    </div>

                    <div class="text-left md:text-center">
                        <h5 class="font-semibold text-rust/80 text-xs uppercase tracking-widest mb-4 heading-font">Explore Topics</h5>
                        <ul class="space-y-2.5 text-sm">
                            <li><a href="{{ route('posts.index') }}" class="text-white/75 hover:text-rust transition-colors">All Posts</a></li>
                            <li><a href="{{ route('categories.index') }}" class="text-white/75 hover:text-rust transition-colors">Categories</a></li>
                            <li><a href="{{ route('about') }}" class="text-white/75 hover:text-rust transition-colors">About</a></li>
                        </ul>
                    </div>

                    <div>
                        <h5 class="font-semibold text-rust/80 text-xs uppercase tracking-widest mb-4 heading-font">Categories</h5>
                        <ul class="space-y-2.5 text-sm">
                            @if(isset($navCategories) && $navCategories->count())
                                @foreach($navCategories as $cat)
                                    <li>
                                        <a href="{{ route('posts.category', $cat) }}" class="text-white/75 hover:text-rust transition-colors">
                                            {{ $cat->name }}
                                        </a>
                                    </li>
                                @endforeach
                            @endif
                            <li>
                                <a href="{{ route('categories.index') }}" class="text-rust/80 hover:text-rust transition-colors text-xs font-semibold inline-flex items-center gap-1 mt-1 group">
                                    <span>View all</span>
                                    <span class="group-hover:translate-x-1 transition-transform duration-300">&rarr;</span>
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div>
                        <h5 class="font-semibold text-rust/80 text-xs uppercase tracking-widest mb-4 heading-font">Connect</h5>
                        <ul class="space-y-2.5 text-sm">
                            <li><a href="#" class="text-white/75 hover:text-rust transition-colors">Newsletter</a></li>
                            <li><a href="#" class="text-white/75 hover:text-rust transition-colors">RSS Feed</a></li>
                        </ul>
                    </div>
                </div>

                <div class="border-t border-white/5 mt-12 pt-8 flex flex-col sm:flex-row justify-between items-center text-xs text-white/30">
                    <p>&copy; {{ date('Y') }} chronicle · crafted with care</p>
                </div>
            </div>
        </footer>
    </div>

    {{-- JavaScript for Mobile Menu & Footer Live Search --}}
    <script>
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
                                    html += `<div class="px-4 py-2 text-[10px] font-semibold text-rust/80 uppercase tracking-widest bg-black border-b border-white/5 heading-font">Categories</div>`;
                                    data.categories.forEach(cat => {
                                        const catUrl = cat.url || `/category/${cat.slug || cat.id}`;
                                        html += `
                                            <a href="${catUrl}" class="px-4 py-2.5 hover:bg-white/5 transition-colors flex items-center justify-between group">
                                                <span class="font-medium text-white/75 group-hover:text-white transition-colors">${cat.name}</span>
                                                <span class="text-[10px] px-2 py-0.5 rounded bg-[#121212] text-white/30 font-semibold border border-white/5">Category</span>
                                            </a>
                                        `;
                                    });
                                }

                                if (data.posts && data.posts.length > 0) {
                                    html += `<div class="px-4 py-2 text-[10px] font-semibold text-rust/80 uppercase tracking-widest bg-black border-b border-white/5 heading-font">Posts</div>`;
                                    data.posts.forEach(post => {
                                        const postUrl = post.url || `/posts/${post.slug || post.id}`;
                                        html += `
                                            <a href="${postUrl}" class="px-4 py-2.5 hover:bg-white/5 transition-colors flex items-center justify-between group">
                                                <span class="font-medium text-white/75 group-hover:text-white transition-colors truncate max-w-[320px]">${post.title}</span>
                                                <span class="text-[10px] px-2 py-0.5 rounded bg-[#121212] text-white/30 font-semibold border border-white/5">Post</span>
                                            </a>
                                        `;
                                    });
                                }

                                if ((!data.categories || data.categories.length === 0) && (!data.posts || data.posts.length === 0)) {
                                    html = `<div class="p-4 text-center text-white/30 text-xs">No matching posts or categories</div>`;
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
    </script>
    
    @stack('scripts')
</body>
</html>