<nav x-data="{ open: false }" class="bg-[var(--color-bg-card)] border-b border-[var(--color-border)] body-font shadow-sm">
    <style>
        /* Theme variables for inline use */
        :root {
            --color-bg: #F8F9FA;
            --color-bg-card: #FFFFFF;
            --color-text-primary: #111827;
            --color-text-secondary: #6B7280;
            --color-text-muted: #9CA3AF;
            --color-border: #E5E7EB;
            --color-primary: #7C3AED;
            --color-primary-hover: #6D28D9;
            --color-secondary: #3B82F6;
            --color-secondary-hover: #60A5FA;
        }

        [data-theme="dark"] {
            --color-bg: #0A0A0A;
            --color-bg-card: #1A1A1A;
            --color-text-primary: #FFFFFF;
            --color-text-secondary: #A0A0A0;
            --color-text-muted: #6B7280;
            --color-border: #2A2A2A;
            --color-primary: #7C3AED;
            --color-primary-hover: #6D28D9;
            --color-secondary: #3B82F6;
            --color-secondary-hover: #60A5FA;
        }

        /* Logo hover - Blue in dark mode */
        .logo-link {
            transition: all 0.3s ease;
            text-decoration: none;
        }

        .logo-link:hover .logo-text {
            color: var(--color-primary) !important;
        }

        .logo-link:hover .logo-icon {
            transform: scale(1.1) rotate(10deg);
        }

        [data-theme="dark"] .logo-link:hover .logo-text {
            color: #60A5FA !important;
        }

        [data-theme="dark"] .logo-link:hover .logo-icon {
            color: #60A5FA !important;
        }

        /* Heading font */
        .heading-font {
            font-family: 'Poppins', ui-sans-serif, system-ui, sans-serif !important;
            letter-spacing: -0.02em !important;
        }

        /* Theme toggle button */
        .theme-toggle-nav {
            background: var(--color-bg);
            border: 1px solid var(--color-border);
            color: var(--color-text-primary);
            padding: 4px 10px;
            border-radius: 9999px;
            cursor: pointer;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 4px;
            font-family: 'Work Sans', sans-serif;
            font-size: 12px;
            font-weight: 500;
        }

        .theme-toggle-nav:hover {
            background: var(--color-primary);
            color: #ffffff;
            border-color: var(--color-primary);
        }

        [data-theme="dark"] .theme-toggle-nav:hover {
            background: #3B82F6;
            border-color: #3B82F6;
        }

        .theme-toggle-nav svg {
            width: 14px;
            height: 14px;
        }

        /* Nav link styles */
        .nav-link-custom {
            color: var(--color-text-secondary) !important;
            transition: all 0.3s ease;
            position: relative;
            font-weight: 500;
        }

        .nav-link-custom:hover {
            color: var(--color-text-primary) !important;
        }

        .nav-link-custom::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 0;
            height: 2px;
            background: var(--color-primary);
            transition: width 0.3s ease;
        }

        .nav-link-custom:hover::after {
            width: 100%;
        }

        .nav-link-custom.active {
            color: var(--color-primary) !important;
            font-weight: 600;
        }

        .nav-link-custom.active::after {
            width: 100%;
        }

        [data-theme="dark"] .nav-link-custom::after {
            background: #60A5FA;
        }

        [data-theme="dark"] .nav-link-custom:hover {
            color: #60A5FA !important;
        }

        [data-theme="dark"] .nav-link-custom.active {
            color: #60A5FA !important;
        }

        /* Responsive nav link */
        .responsive-nav-link {
            color: var(--color-text-secondary) !important;
            transition: all 0.3s ease;
            font-weight: 500;
        }

        .responsive-nav-link:hover {
            color: var(--color-text-primary) !important;
            background-color: var(--color-bg) !important;
        }

        .responsive-nav-link.active {
            color: var(--color-primary) !important;
            background-color: rgba(124, 58, 237, 0.08) !important;
        }

        [data-theme="dark"] .responsive-nav-link.active {
            color: #60A5FA !important;
            background-color: rgba(59, 130, 246, 0.08) !important;
        }

        /* Dropdown styles */
        .dropdown-trigger {
            background: var(--color-bg-card) !important;
            border-color: var(--color-border) !important;
            color: var(--color-text-secondary) !important;
        }

        .dropdown-trigger:hover {
            border-color: var(--color-primary) !important;
            color: var(--color-text-primary) !important;
        }

        [data-theme="dark"] .dropdown-trigger:hover {
            border-color: #60A5FA !important;
            color: #60A5FA !important;
        }

        .dropdown-content {
            background: var(--color-bg-card) !important;
            border-color: var(--color-border) !important;
        }

        .dropdown-link {
            color: var(--color-text-secondary) !important;
        }

        .dropdown-link:hover {
            color: var(--color-primary) !important;
            background-color: var(--color-bg) !important;
        }

        [data-theme="dark"] .dropdown-link:hover {
            color: #60A5FA !important;
        }

        .dropdown-link-logout {
            color: #EF4444 !important;
        }

        .dropdown-link-logout:hover {
            color: #F87171 !important;
            background-color: rgba(239, 68, 68, 0.1) !important;
        }

        [data-theme="dark"] .dropdown-link-logout {
            color: #F87171 !important;
        }

        [data-theme="dark"] .dropdown-link-logout:hover {
            color: #FCA5A5 !important;
        }
    </style>

    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('posts.index') }}" class="logo-link heading-font text-2xl sm:text-3xl font-bold tracking-tight text-[var(--color-text-primary)] transition-colors duration-300 flex items-center gap-2 group">
                        <span class="logo-icon text-[var(--color-primary)] group-hover:scale-110 transition-all duration-300">✦</span>
                        <span class="logo-text transition-colors duration-300">chronicle</span>
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex items-center">
                    <a href="{{ route('posts.index') }}" class="nav-link-custom {{ request()->routeIs('posts.index') ? 'active' : '' }}">
                        {{ __('Home') }}
                    </a>
                    <a href="{{ route('posts.categories') }}" class="nav-link-custom {{ request()->routeIs('posts.categories') ? 'active' : '' }}">
                        {{ __('Categories') }}
                    </a>
                    @auth
                    @if(Auth::user()->isAuthor())
                    <a href="{{ route('author.dashboard') }}" class="nav-link-custom {{ request()->routeIs('author.dashboard') ? 'active' : '' }}">
                        {{ __('Author Dashboard') }}
                    </a>
                    @endif
                    @endauth
                </div>
            </div>

            <!-- Settings Dropdown / Guest Auth -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                @auth
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="dropdown-trigger inline-flex items-center px-3 py-1.5 border text-sm font-medium rounded-full transition ease-in-out duration-300 heading-font">
                            <div class="w-6 h-6 rounded-full bg-[var(--color-primary)]/20 text-[var(--color-primary)] flex items-center justify-center font-bold text-xs me-2">
                                {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                            </div>
                            <div class="text-[var(--color-text-primary)]">{{ Auth::user()->name }}</div>

                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4 text-[var(--color-text-muted)]" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <div class="dropdown-content rounded-xl shadow-2xl p-2 border">
                            <!-- Profile Link -->
                            <a href="{{ route('profile.index') }}" class="dropdown-link flex items-center gap-3 px-4 py-2.5 rounded-xl text-sm transition-colors heading-font">
                                <svg class="w-4 h-4 text-[var(--color-primary)]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.485 0 4.779.65 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                                {{ __('Profile') }}
                            </a>

                            <!-- Saved Posts -->
                            <a href="{{ route('users.saved') }}" class="dropdown-link flex items-center gap-3 px-4 py-2.5 rounded-xl text-sm transition-colors heading-font">
                                <svg class="w-4 h-4 text-[var(--color-primary)]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z" />
                                </svg>
                                {{ __('Saved Posts') }}
                            </a>

                            <!-- Reading History -->
                            <a href="{{ route('users.history') }}" class="dropdown-link flex items-center gap-3 px-4 py-2.5 rounded-xl text-sm transition-colors heading-font">
                                <svg class="w-4 h-4 text-[var(--color-primary)]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                {{ __('Reading History') }}
                            </a>

                            <div class="border-t border-[var(--color-border)] my-2"></div>

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="dropdown-link-logout flex items-center gap-3 w-full px-4 py-2.5 rounded-xl text-sm transition-colors heading-font text-left">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                    </svg>
                                    {{ __('Log Out') }}
                                </button>
                            </form>
                        </div>
                    </x-slot>
                </x-dropdown>
                @else
                <div class="space-x-4 flex items-center">
                    <a href="{{ route('login') }}" class="text-sm text-[var(--color-text-secondary)] hover:text-[var(--color-text-primary)] font-medium heading-font transition-colors duration-300">
                        Log in
                    </a>
                    @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="text-sm px-4 py-2 rounded-full bg-[var(--color-primary)] hover:bg-[var(--color-primary-hover)] text-white font-semibold transition-all duration-300 shadow-lg shadow-[var(--color-primary)]/20 hover:shadow-[var(--color-primary)]/40 transform hover:scale-105 heading-font">
                        Register
                    </a>
                    @endif
                </div>
                @endauth

                {{-- Theme Toggle --}}
                <button onclick="toggleTheme()" class="theme-toggle-nav ms-3" aria-label="Toggle theme">
                    <svg id="nav-theme-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
                    </svg>
                    <span id="nav-theme-label">Dark</span>
                </button>
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-[var(--color-text-muted)] hover:text-[var(--color-text-primary)] hover:bg-[var(--color-bg)] focus:outline-none focus:bg-[var(--color-bg)] transition duration-300">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden bg-[var(--color-bg-card)] border-t border-[var(--color-border)]">
        <div class="pt-2 pb-3 space-y-1">
            <a href="{{ route('posts.index') }}" class="responsive-nav-link block px-4 py-3 rounded-xl text-base font-medium transition-colors {{ request()->routeIs('posts.index') ? 'active' : '' }}">
                {{ __('Home') }}
            </a>
            <a href="{{ route('posts.categories') }}" class="responsive-nav-link block px-4 py-3 rounded-xl text-base font-medium transition-colors {{ request()->routeIs('posts.categories') ? 'active' : '' }}">
                {{ __('Categories') }}
            </a>
            @auth
            @if(Auth::user()->isAuthor())
            <a href="{{ route('author.dashboard') }}" class="responsive-nav-link block px-4 py-3 rounded-xl text-base font-medium transition-colors {{ request()->routeIs('author.dashboard') ? 'active' : '' }}">
                {{ __('Author Dashboard') }}
            </a>
            @endif
            @endauth
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-[var(--color-border)]">
            @auth
            <div class="px-4">
                <div class="font-medium text-base text-[var(--color-text-primary)] heading-font">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-[var(--color-text-muted)] body-font">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <a href="{{ route('profile.index') }}" class="responsive-nav-link block px-4 py-3 rounded-xl text-base font-medium transition-colors {{ request()->routeIs('profile.*') ? 'active' : '' }}">
                    {{ __('Profile') }}
                </a>
                <a href="{{ route('users.saved') }}" class="responsive-nav-link block px-4 py-3 rounded-xl text-base font-medium transition-colors {{ request()->routeIs('users.saved') ? 'active' : '' }}">
                    {{ __('Saved Posts') }}
                </a>
                <a href="{{ route('users.history') }}" class="responsive-nav-link block px-4 py-3 rounded-xl text-base font-medium transition-colors {{ request()->routeIs('users.history') ? 'active' : '' }}">
                    {{ __('Reading History') }}
                </a>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="responsive-nav-link block w-full text-left px-4 py-3 rounded-xl text-base font-medium transition-colors text-red-400 hover:text-red-300 hover:bg-red-500/10">
                        {{ __('Log Out') }}
                    </button>
                </form>
            </div>
            @else
            <div class="pt-2 pb-3 space-y-1">
                <a href="{{ route('login') }}" class="responsive-nav-link block px-4 py-3 rounded-xl text-base font-medium transition-colors">
                    {{ __('Log in') }}
                </a>
                @if (Route::has('register'))
                <a href="{{ route('register') }}" class="responsive-nav-link block px-4 py-3 rounded-xl text-base font-medium transition-colors">
                    {{ __('Register') }}
                </a>
                @endif
            </div>
            @endauth
        </div>
    </div>
</nav>

<script>
    // Theme toggle functionality for navigation
    function toggleTheme() {
        const html = document.documentElement;
        const currentTheme = html.getAttribute('data-theme');
        const newTheme = currentTheme === 'dark' ? 'light' : 'dark';

        html.setAttribute('data-theme', newTheme);
        localStorage.setItem('theme', newTheme);

        updateNavThemeUI(newTheme);
    }

    function updateNavThemeUI(theme) {
        const isDark = theme === 'dark';
        const icon = document.getElementById('nav-theme-icon');
        const label = document.getElementById('nav-theme-label');

        if (icon) {
            icon.innerHTML = isDark ?
                '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"/>' :
                '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"/>';
        }

        if (label) label.textContent = isDark ? 'Light' : 'Dark';
    }

    // Load saved theme
    document.addEventListener('DOMContentLoaded', function() {
        const savedTheme = localStorage.getItem('theme') || 'light';
        document.documentElement.setAttribute('data-theme', savedTheme);
        updateNavThemeUI(savedTheme);
    });
</script>