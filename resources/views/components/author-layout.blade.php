<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-charcoal-950">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
        {{ $title ?? 'Author Dashboard · chronicle' }}
    </title>

    @vite([
        'resources/css/app.css',
        'resources/js/app.js'
    ])

    @stack('styles')
</head>

<body class="min-h-screen bg-charcoal-950 text-paper antialiased">

    <div class="min-h-screen flex">

        {{-- MOBILE OVERLAY --}}
        <div
            id="sidebar-overlay"
            class="fixed inset-0 bg-black/70 backdrop-blur-sm z-40 hidden md:hidden"
            onclick="closeSidebar()"
            aria-hidden="true"
        ></div>

        {{-- SIDEBAR (Desktop par Permanent, Mobile par Slide-out Drawer) --}}
        <aside
            id="author-sidebar"
            class="
                fixed
                inset-y-0
                left-0
                z-50
                w-64
                bg-charcoal-900
                border-r
                border-charcoal-800
                text-paper
                flex
                flex-col
                transform
                -translate-x-full
                md:translate-x-0
                transition-transform
                duration-300
                ease-out
                h-full
            "
        >
            {{-- Logo & Close Button --}}
            <div class="h-16 flex items-center justify-between px-6 border-b border-charcoal-800">
                <a href="{{ route('author.dashboard') }}" class="font-serif text-2xl font-semibold tracking-tight text-paper">
                    <span class="text-rust-500">✦</span>
                    chronicle
                </a>

                {{-- Mobile Close Button --}}
                <button
                    type="button"
                    onclick="closeSidebar()"
                    class="md:hidden text-paper/60 hover:text-paper"
                    aria-label="Close menu"
                >
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>

            {{-- Navigation --}}
            <nav class="flex-1 px-4 py-6 space-y-2 overflow-y-auto">
                {{-- Dashboard --}}
                <a href="{{ route('author.dashboard') }}"
                   onclick="closeSidebar()"
                   class="flex items-center gap-3 px-4 py-3 rounded-xl transition text-sm font-medium
                         {{ request()->routeIs('author.dashboard')
                             ? 'bg-rust-600/20 text-rust-400 border border-rust-600/30'
                             : 'text-paper/60 hover:bg-charcoal-800 hover:text-paper' }}"
                >
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zm10 0a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zm10 0a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"/>
                    </svg>
                    <span>Dashboard</span>
                </a>

                {{-- My Posts --}}
                <a href="{{ route('author.posts.index') }}"
                   onclick="closeSidebar()"
                   class="flex items-center gap-3 px-4 py-3 rounded-xl transition text-sm font-medium
                         {{ request()->routeIs('author.posts.*') && !request()->routeIs('author.posts.create')
                             ? 'bg-rust-600/20 text-rust-400 border border-rust-600/30'
                             : 'text-paper/60 hover:bg-charcoal-800 hover:text-paper' }}"
                >
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                    </svg>
                    <span>My Posts</span>
                </a>

                {{-- Write Post --}}
                <a href="{{ route('author.posts.create') }}"
                   onclick="closeSidebar()"
                   class="flex items-center gap-3 px-4 py-3 rounded-xl transition text-sm font-medium
                         {{ request()->routeIs('author.posts.create')
                             ? 'bg-rust-600/20 text-rust-400 border border-rust-600/30'
                             : 'text-paper/60 hover:bg-charcoal-800 hover:text-paper' }}"
                >
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                    </svg>
                    <span>Write Post</span>
                </a>

                {{-- Divider --}}
                <div class="border-t border-charcoal-800/50 my-4"></div>

                {{-- Profile (links to author.profile) --}}
                <a href="{{ route('author.profile') }}"
                   onclick="closeSidebar()"
                   class="flex items-center gap-3 px-4 py-3 rounded-xl transition text-sm font-medium
                         {{ request()->routeIs('author.profile')
                             ? 'bg-rust-600/20 text-rust-400 border border-rust-600/30'
                             : 'text-paper/60 hover:bg-charcoal-800 hover:text-paper' }}"
                >
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                    </svg>
                    <span>Profile</span>
                    {{-- Optional: Show badge if profile incomplete --}}
                    @if(!auth()->user()->avatar || !auth()->user()->bio)
                        <span class="ml-auto text-[10px] px-2 py-0.5 rounded-full bg-rust-500/20 text-rust-400">Update</span>
                    @endif
                </a>
            </nav>

            {{-- Bottom --}}
            <div class="p-4 border-t border-charcoal-800 space-y-2">
                <a href="{{ route('posts.index') }}"
                   onclick="closeSidebar()"
                   class="block px-4 py-2 text-sm text-paper/50 hover:text-rust-400 transition"
                >
                    ← Back to Chronicle
                </a>

                @auth
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="w-full text-left px-4 py-2 text-sm text-red-400/70 hover:text-red-400 hover:bg-charcoal-800/50 rounded-lg transition">
                            <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                            </svg>
                            Logout
                        </button>
                    </form>
                @endauth
            </div>

        </aside>

        {{-- Main Content Area (Desktop par md:ml-64 taaki sidebar ke peeche text na chupe) --}}
        <div class="flex-1 min-w-0 bg-charcoal-950 flex flex-col md:ml-64 min-h-screen">

            {{-- Top Bar (Responsive with Hamburger Button) --}}
            <header class="h-16 bg-charcoal-900 border-b border-charcoal-800 flex items-center justify-between px-4 sm:px-6 lg:px-8 sticky top-0 z-30">
                <div class="flex items-center gap-3">
                    {{-- Hamburger Toggle Button (Mobile Only) --}}
                    <button
                        type="button"
                        onclick="openSidebar()"
                        class="md:hidden text-paper/70 hover:text-paper focus:outline-none"
                        aria-label="Open menu"
                    >
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                        </svg>
                    </button>

                    <h1 class="font-semibold text-lg text-paper truncate">
                        {{ $header ?? 'Author Dashboard' }}
                    </h1>
                </div>

                {{-- User Profile --}}
                @auth
                    <div class="flex items-center gap-3">
                        @if(auth()->user()->avatar)
                            <img src="{{ asset('storage/' . auth()->user()->avatar) }}" 
                                 alt="{{ auth()->user()->name }}" 
                                 class="w-9 h-9 rounded-full border border-rust-500/30 object-cover">
                        @else
                            <div class="w-9 h-9 rounded-full bg-rust-600/20 border border-rust-500/30 text-rust-400 flex items-center justify-center text-sm font-semibold">
                                {{ auth()->user()->initials }}
                            </div>
                        @endif
                        <div class="hidden sm:block">
                            <p class="text-sm font-medium text-paper">
                                {{ auth()->user()->name }}
                            </p>
                            <p class="text-xs text-paper/50">
                                Author
                            </p>
                        </div>
                        {{-- Profile Link in Top Bar --}}
                        <a href="{{ route('author.profile') }}" 
                           class="ml-2 text-xs text-rust-400 hover:text-rust-300 transition-colors hidden sm:inline">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/>
                            </svg>
                        </a>
                    </div>
                @endauth
            </header>

            {{-- Page Content --}}
            <main class="p-4 sm:p-6 lg:p-8 flex-1 bg-charcoal-950">
                {{ $slot }}
            </main>

        </div>

    </div>

    {{-- SIDEBAR TOGGLE SCRIPT --}}
    <script>
        function openSidebar() {
            const sidebar = document.getElementById('author-sidebar');
            const overlay = document.getElementById('sidebar-overlay');
            if (!sidebar || !overlay) return;

            sidebar.classList.remove('-translate-x-full');
            sidebar.classList.add('translate-x-0');
            overlay.classList.remove('hidden');
            document.body.classList.add('overflow-hidden');
        }

        function closeSidebar() {
            const sidebar = document.getElementById('author-sidebar');
            const overlay = document.getElementById('sidebar-overlay');
            if (!sidebar || !overlay) return;

            sidebar.classList.remove('translate-x-0');
            sidebar.classList.add('-translate-x-full');
            overlay.classList.add('hidden');
            document.body.classList.remove('overflow-hidden');
        }

        // Close on ESC key
        document.addEventListener('keydown', function (e) {
            if (e.key === 'Escape') {
                closeSidebar();
            }
        });

        // Close sidebar on window resize (if going from mobile to desktop)
        window.addEventListener('resize', function() {
            if (window.innerWidth >= 768) {
                const sidebar = document.getElementById('author-sidebar');
                const overlay = document.getElementById('sidebar-overlay');
                if (sidebar && overlay) {
                    sidebar.classList.remove('translate-x-0');
                    sidebar.classList.add('-translate-x-full');
                    overlay.classList.add('hidden');
                    document.body.classList.remove('overflow-hidden');
                }
            }
        });
    </script>

    @stack('scripts')

</body>
</html>