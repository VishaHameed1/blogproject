<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-[#0d0d0d]">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
        @yield('title', $title ?? 'Author Panel')
        - {{ config('app.name', 'Chronicle') }}
    </title>

    @vite([
        'resources/css/app.css',
        'resources/js/app.js'
    ])

    @stack('styles')
</head>

<body class="h-full bg-[#0d0d0d] text-zinc-300 font-body antialiased">

<div class="min-h-screen bg-[#0d0d0d] flex">

    {{-- MOBILE OVERLAY --}}
    <div
        id="author-sidebar-overlay"
        class="fixed inset-0 bg-black/70 backdrop-blur-sm z-40 hidden lg:hidden transition-opacity duration-300"
        onclick="closeAuthorSidebar()"
        aria-hidden="true"
    ></div>

    {{-- PERMANENT SIDEBAR (Desktop par hamesha visible, Mobile par drawer) --}}
    <aside
        id="author-sidebar"
        class="
            fixed
            inset-y-0
            left-0
            z-50
            w-72
            max-w-[85vw]
            bg-[#1e1e1e]
            border-r
            border-[#2a2a2a]
            flex
            flex-col
            justify-between
            transform
            -translate-x-full
            lg:translate-x-0
            transition-transform
            duration-300
            ease-out
            h-full
        "
    >
        <div class="min-h-0 flex flex-col flex-1">
            {{-- BRAND HEADER --}}
            <div class="h-16 shrink-0 flex items-center justify-between px-5 sm:px-6 border-b border-[#2a2a2a]">
                <a href="{{ route('author.dashboard') }}" class="flex items-center gap-2 min-w-0 group">
                    <span class="text-rust-500 font-heading font-bold text-xl tracking-tight truncate group-hover:text-rust-400 transition-colors">
                        ✦ chronicle
                    </span>
                    <span class="text-[10px] font-heading font-medium text-zinc-400 bg-white/5 border border-white/10 px-2 py-0.5 rounded-full">Author</span>
                </a>

                {{-- Mobile Close Button --}}
                <button
                    type="button"
                    onclick="closeAuthorSidebar()"
                    class="lg:hidden w-9 h-9 shrink-0 flex items-center justify-center rounded-xl text-zinc-400 hover:text-white hover:bg-white/5 transition-colors"
                    aria-label="Close navigation"
                >
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>

            {{-- NAVIGATION LINKS --}}
            <nav class="flex-1 overflow-y-auto p-4 space-y-1.5">
                {{-- Dashboard --}}
                <a
                    href="{{ route('author.dashboard') }}"
                    onclick="closeAuthorSidebar()"
                    class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-sm font-heading font-medium transition-all duration-200
                        {{ request()->routeIs('author.dashboard')
                            ? 'bg-rust-500/10 text-rust-400 border border-rust-500/20 shadow-sm'
                            : 'text-zinc-400 hover:text-white hover:bg-white/5 border border-transparent'
                        }}"
                >
                    <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6z M14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6z M4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2z M14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"/>
                    </svg>
                    <span>Dashboard</span>
                </a>

                {{-- My Posts --}}
                <a
                    href="{{ route('author.posts.index') }}"
                    onclick="closeAuthorSidebar()"
                    class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-sm font-heading font-medium transition-all duration-200
                        {{ request()->routeIs('author.posts.*')
                            ? 'bg-rust-500/10 text-rust-400 border border-rust-500/20 shadow-sm'
                            : 'text-zinc-400 hover:text-white hover:bg-white/5 border border-transparent'
                        }}"
                >
                    <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/>
                    </svg>
                    <span>My Posts</span>
                </a>

                {{-- Write Post --}}
                <a
                    href="{{ route('author.posts.create') }}"
                    onclick="closeAuthorSidebar()"
                    class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-sm font-heading font-medium transition-all duration-200
                        {{ request()->routeIs('author.posts.create')
                            ? 'bg-rust-500/10 text-rust-400 border border-rust-500/20 shadow-sm'
                            : 'text-zinc-400 hover:text-white hover:bg-white/5 border border-transparent'
                        }}"
                >
                    <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                    </svg>
                    <span>Write Post</span>
                </a>

                {{-- Divider --}}
                <hr class="border-[#2a2a2a] my-3">

                {{-- View Site --}}
                <a
                    href="{{ route('home') }}"
                    onclick="closeAuthorSidebar()"
                    target="_blank"
                    class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-sm font-heading font-medium transition-all duration-200 text-zinc-400 hover:text-white hover:bg-white/5 border border-transparent"
                >
                    <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                    </svg>
                    <span>View Site</span>
                </a>
            </nav>
        </div>

        {{-- SIDEBAR FOOTER (Logout) --}}
        <div class="shrink-0 p-4 border-t border-[#2a2a2a] bg-[#1e1e1e]">
            <a
                href="{{ route('logout') }}"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                class="flex items-center gap-2.5 px-3.5 py-2.5 rounded-xl text-xs font-heading font-medium text-zinc-400 hover:text-white hover:bg-white/5 transition-all duration-200 w-full"
            >
                <svg class="w-4 h-4 shrink-0 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                </svg>
                <span>Logout</span>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                @csrf
            </form>
        </div>
    </aside>

    {{-- MAIN CONTENT AREA (Left margin lg:ml-72 ki wajah se permanent sidebar ke sath overlap nahi hoga) --}}
    <div class="flex-1 min-h-screen lg:ml-72 flex flex-col w-full">
        {{-- HEADER --}}
        <header class="sticky top-0 z-30 h-16 shrink-0 border-b border-[#2a2a2a] bg-[#0d0d0d]/90 backdrop-blur-xl w-full">
            <div class="h-full px-4 sm:px-6 lg:px-8 flex items-center justify-between gap-4">
                {{-- LEFT SIDE (Mobile Toggle Button & Page Title) --}}
                <div class="flex items-center gap-3 min-w-0">
                    <button
                        id="sidebar-toggle-btn"
                        type="button"
                        onclick="openAuthorSidebar()"
                        class="lg:hidden w-10 h-10 shrink-0 flex items-center justify-center rounded-xl border border-[#2a2a2a] bg-white/5 text-zinc-400 hover:text-white hover:border-rust-500/40 transition-all active:scale-95"
                        aria-label="Open navigation"
                    >
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                        </svg>
                    </button>

                    <div class="min-w-0">
                        <h1 class="text-sm sm:text-base font-heading font-semibold text-white truncate">
                            @yield('header_title', 'Author Dashboard')
                        </h1>
                    </div>
                </div>

                {{-- PROFILE SECTION --}}
                @php
                    $currentUser = auth()->user();
                    $userName = $currentUser?->name ?? 'Author';
                    $initials = collect(preg_split('/\s+/', trim($userName)))
                        ->filter()
                        ->take(2)
                        ->map(fn ($name) => strtoupper(substr($name, 0, 1)))
                        ->implode('');
                @endphp

                <div class="flex items-center gap-3 shrink-0">
                    <div class="w-9 h-9 sm:w-10 sm:h-10 rounded-full bg-rust-500/20 border border-rust-500/30 flex items-center justify-center text-[11px] sm:text-xs font-heading font-semibold text-rust-400 shrink-0 shadow-sm">
                        {{ $initials ?: 'A' }}
                    </div>

                    <div class="hidden sm:block text-left min-w-0">
                        <p class="font-heading font-medium text-sm text-white truncate max-w-[180px]">
                            {{ $userName }}
                        </p>
                        <p class="text-xs font-body text-zinc-500">Author</p>
                    </div>
                </div>
            </div>
        </header>

        {{-- PAGE CONTENT CONTAINER --}}
        <main class="flex-1 w-full px-4 py-6 sm:px-6 sm:py-8 lg:px-8">
            <div class="w-full max-w-7xl mx-auto">
                @hasSection('content')
                    @yield('content')
                @else
                    {{ $slot ?? '' }}
                @endif
            </div>
        </main>
    </div>
</div>

{{-- MOBILE SIDEBAR TOGGLE SCRIPT --}}
<script>
    function openAuthorSidebar() {
        const sidebar = document.getElementById('author-sidebar');
        const overlay = document.getElementById('author-sidebar-overlay');

        if (!sidebar || !overlay) return;

        sidebar.classList.remove('-translate-x-full');
        sidebar.classList.add('translate-x-0');
        overlay.classList.remove('hidden');
        document.body.classList.add('overflow-hidden');
    }

    function closeAuthorSidebar() {
        const sidebar = document.getElementById('author-sidebar');
        const overlay = document.getElementById('author-sidebar-overlay');

        if (!sidebar || !overlay) return;

        sidebar.classList.remove('translate-x-0');
        sidebar.classList.add('-translate-x-full');
        overlay.classList.add('hidden');
        document.body.classList.remove('overflow-hidden');
    }

    // Close sidebar with Escape key
    document.addEventListener('keydown', function (event) {
        if (event.key === 'Escape') {
            closeAuthorSidebar();
        }
    });

    // Reset sidebar state on window resize to desktop view
    window.addEventListener('resize', function () {
        if (window.innerWidth >= 1024) {
            const sidebar = document.getElementById('author-sidebar');
            const overlay = document.getElementById('author-sidebar-overlay');

            if (sidebar) {
                sidebar.classList.remove('-translate-x-full');
                sidebar.classList.add('translate-x-0');
            }
            if (overlay) {
                overlay.classList.add('hidden');
            }
            document.body.classList.remove('overflow-hidden');
        }
    });

    // Close sidebar when clicking outside on mobile devices
    document.addEventListener('click', function(event) {
        const sidebar = document.getElementById('author-sidebar');
        const overlay = document.getElementById('author-sidebar-overlay');
        const toggleBtn = document.getElementById('sidebar-toggle-btn');
        
        if (window.innerWidth < 1024 && sidebar && !sidebar.classList.contains('-translate-x-full')) {
            if (!sidebar.contains(event.target) && toggleBtn && !toggleBtn.contains(event.target) && event.target !== overlay) {
                closeAuthorSidebar();
            }
        }
    });
</script>

@stack('scripts')
</body>
</html>