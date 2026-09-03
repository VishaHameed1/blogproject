<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full" data-theme="light">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
        @yield('title', $title ?? 'Author Panel')
        - {{ config('app.name', 'Chronicle') }}
    </title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&family=Work+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    @vite([
    'resources/css/app.css',
    'resources/js/app.js'
    ])

    <style>
        /* ==========================================================
           CHRONICLE DUAL-TONE THEME
           Light: Purple (#7C3AED) | Dark: Blue (#3B82F6)
        ========================================================== */

        :root {
            --color-bg: #F8F9FA;
            --color-bg-card: #FFFFFF;
            --color-bg-sidebar: #FFFFFF;
            --color-bg-elevated: #FFFFFF;
            --color-text-primary: #111827;
            --color-text-secondary: #6B7280;
            --color-text-muted: #9CA3AF;
            --color-border: #E5E7EB;
            --color-primary: #7C3AED;
            --color-primary-hover: #6D28D9;
            --color-primary-soft: rgba(124, 58, 237, 0.10);
            --color-secondary: #3B82F6;
            --color-secondary-hover: #60A5FA;
            --color-shadow: rgba(0, 0, 0, 0.06);
            --color-shadow-hover: rgba(0, 0, 0, 0.12);
        }

        [data-theme="dark"] {
            --color-bg: #0A0A0A;
            --color-bg-card: #141414;
            --color-bg-sidebar: #0A0A0A;
            --color-bg-elevated: #1A1A1A;
            --color-text-primary: #FFFFFF;
            --color-text-secondary: #A0A0A0;
            --color-text-muted: #6B7280;
            --color-border: #2A2A2A;
            --color-primary: #3B82F6;
            --color-primary-hover: #60A5FA;
            --color-primary-soft: rgba(59, 130, 246, 0.14);
            --color-secondary: #3B82F6;
            --color-secondary-hover: #60A5FA;
            --color-shadow: rgba(0, 0, 0, 0.30);
            --color-shadow-hover: rgba(0, 0, 0, 0.50);
        }

        /* Font families */
        .font-heading {
            font-family: 'Poppins', ui-sans-serif, system-ui, sans-serif !important;
            letter-spacing: -0.02em !important;
        }

        .font-body {
            font-family: 'Work Sans', ui-sans-serif, system-ui, sans-serif !important;
        }

        /* Selection color - Theme aware */
        ::selection {
            background-color: var(--color-primary-soft) !important;
            color: #ffffff !important;
        }

        /* Scrollbar - Theme aware */
        ::-webkit-scrollbar {
            width: 6px;
        }

        ::-webkit-scrollbar-track {
            background: var(--color-bg);
        }

        ::-webkit-scrollbar-thumb {
            background: var(--color-primary);
            border-radius: 3px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: var(--color-primary-hover);
        }

        /* ==========================================================
           SIDEBAR - FLOATING CARD (MATCHES ADMIN)
        ========================================================== */

        .author-sidebar-wrapper {
            padding: 1rem;
            background: transparent;
            height: 100vh;
            position: sticky;
            top: 0;
        }

        .author-sidebar-card {
            background: var(--color-bg-card);
            border: 1px solid var(--color-border);
            border-radius: 1.25rem;
            padding: 1.25rem 1rem;
            transition: all 0.3s ease;
            box-shadow: 0 4px 20px var(--color-shadow);
            display: flex;
            flex-direction: column;
            height: 100%;
            width: 100%;
            overflow-y: auto;
        }

        .author-sidebar-card::-webkit-scrollbar {
            display: none;
        }

        .author-sidebar-card {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }

        .author-sidebar-card:hover {
            border-color: var(--color-primary);
            box-shadow: 0 8px 32px var(--color-shadow-hover);
        }

        /* ==========================================================
           SIDEBAR - MOBILE
        ========================================================== */

        .mobile-sidebar-overlay {
            position: fixed;
            inset: 0;
            background: rgba(0, 0, 0, 0.5);
            z-index: 40;
            display: none;
            backdrop-filter: blur(4px);
        }

        .mobile-sidebar-overlay.active {
            display: block;
        }

        .mobile-sidebar {
            position: fixed;
            top: 0;
            left: 0;
            height: 100%;
            width: 280px;
            background: var(--color-bg-sidebar);
            border-right: 1px solid var(--color-border);
            z-index: 50;
            transform: translateX(-100%);
            transition: transform 0.3s ease;
            padding: 1rem;
            overflow-y: auto;
        }

        .mobile-sidebar::-webkit-scrollbar {
            display: none;
        }

        .mobile-sidebar {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }

        .mobile-sidebar.open {
            transform: translateX(0);
        }

        .mobile-sidebar .author-sidebar-card {
            border: none;
            box-shadow: none;
            padding: 0;
            height: 100%;
        }

        .mobile-sidebar .author-sidebar-card:hover {
            border: none;
            box-shadow: none;
        }

        .mobile-close-btn {
            position: absolute;
            top: 1rem;
            right: 1rem;
            background: transparent;
            border: none;
            color: var(--color-text-muted);
            font-size: 1.5rem;
            cursor: pointer;
            transition: color 0.2s ease;
            z-index: 51;
        }

        .mobile-close-btn:hover {
            color: var(--color-text-primary);
        }

        /* ==========================================================
           MOBILE TOGGLE BUTTON
        ========================================================== */

        .mobile-toggle-btn {
            display: none;
            align-items: center;
            justify-content: center;
            background: var(--color-bg-card);
            border: 1px solid var(--color-border);
            border-radius: 0.75rem;
            padding: 0.5rem;
            cursor: pointer;
            color: var(--color-text-secondary);
            transition: all 0.2s ease;
            position: fixed;
            bottom: 1rem;
            left: 1rem;
            z-index: 30;
            box-shadow: 0 4px 12px var(--color-shadow);
        }

        .mobile-toggle-btn:hover {
            border-color: var(--color-primary);
            color: var(--color-primary);
            box-shadow: 0 4px 16px var(--color-shadow-hover);
        }

        .mobile-toggle-btn svg {
            width: 1.5rem;
            height: 1.5rem;
        }

        /* ==========================================================
           THEME TOGGLE
        ========================================================== */

        .theme-toggle-author {
            display: inline-flex;
            align-items: center;
            gap: 0.4rem;
            padding: 0.4rem 0.75rem;
            background: var(--color-bg-card);
            border: 1px solid var(--color-border);
            border-radius: 999px;
            color: var(--color-text-secondary);
            cursor: pointer;
            font-family: 'Work Sans', sans-serif;
            font-size: 0.75rem;
            font-weight: 500;
            transition: all 0.2s ease;
        }

        .theme-toggle-author:hover {
            background: var(--color-primary);
            border-color: var(--color-primary);
            color: #FFFFFF;
            transform: translateY(-1px);
            box-shadow: 0 5px 15px var(--color-shadow);
        }

        .theme-toggle-author svg {
            width: 14px;
            height: 14px;
        }

        /* ==========================================================
           SIDEBAR LINKS
        ========================================================== */

        .sidebar-link {
            color: var(--color-text-secondary) !important;
            transition: all 0.2s ease;
            border-color: transparent !important;
        }

        .sidebar-link:hover {
            color: var(--color-text-primary) !important;
            background-color: var(--color-bg) !important;
            border-color: var(--color-border) !important;
        }

        .sidebar-link.active {
            color: var(--color-primary) !important;
            background-color: var(--color-primary-soft) !important;
            border-color: var(--color-primary-soft) !important;
        }

        .sidebar-link.active svg {
            color: var(--color-primary);
        }

        .sidebar-link svg {
            color: var(--color-text-muted);
            transition: color 0.2s ease;
        }

        .sidebar-link:hover svg {
            color: var(--color-primary);
        }

        /* ==========================================================
           LOGO
        ========================================================== */

        .logo-link-author {
            transition: all 0.3s ease;
            text-decoration: none;
        }

        .logo-link-author:hover .logo-text {
            color: var(--color-primary) !important;
        }

        .logo-link-author:hover .logo-icon {
            transform: scale(1.1) rotate(10deg);
        }

        /* ==========================================================
           RESPONSIVE
        ========================================================== */

        @media (max-width: 1023px) {
            .desktop-sidebar {
                display: none !important;
            }

            .mobile-toggle-btn {
                display: inline-flex;
            }

            .author-main {
                padding: 1rem;
                width: 100%;
                margin-left: 0 !important;
            }
        }

        @media (min-width: 1024px) {
            .mobile-toggle-btn {
                display: none !important;
            }

            .mobile-sidebar-overlay {
                display: none !important;
            }

            .mobile-sidebar {
                display: none !important;
            }
        }

        /* ==========================================================
           ACCESSIBILITY
        ========================================================== */

        @media (prefers-reduced-motion: reduce) {

            *,
            *::before,
            *::after {
                animation-duration: 0.01ms !important;
                animation-iteration-count: 1 !important;
                transition-duration: 0.01ms !important;
                scroll-behavior: auto !important;
            }
        }
    </style>

    @stack('styles')
</head>

<body class="h-full bg-[var(--color-bg)] text-[var(--color-text-secondary)] font-body antialiased">

    <div class="relative min-h-screen w-full flex flex-col lg:flex-row">

        {{-- ========================================================
            SIDEBAR - DESKTOP
        ========================================================= --}}
        <aside class="desktop-sidebar w-72 shrink-0 sticky top-0 h-screen z-30 hidden lg:block">

            <div class="author-sidebar-wrapper">

                <div class="author-sidebar-card">

                    {{-- BRAND --}}
                    <a href="{{ route('author.dashboard') }}" class="logo-link-author flex items-center gap-2 min-w-0 pb-4 border-b border-[var(--color-border)] mb-4 flex-shrink-0">
                        <span class="logo-icon text-[var(--color-primary)] font-heading font-bold text-xl tracking-tight">✦</span>
                        <span class="logo-text text-[var(--color-text-primary)] font-heading font-bold text-xl tracking-tight truncate group-hover:text-[var(--color-primary)] transition-colors">
                            chronicle
                        </span>
                        <span class="text-[10px] font-heading font-medium text-[var(--color-text-muted)] bg-[var(--color-bg)] border border-[var(--color-border)] px-2 py-0.5 rounded-full">
                            Author
                        </span>
                    </a>

                    {{-- NAVIGATION --}}
                    <nav class="flex-1 space-y-0.5 overflow-y-auto">

                        {{-- Dashboard --}}
                        <a href="{{ route('author.dashboard') }}" class="sidebar-link flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-sm font-heading font-medium transition-all duration-200 border {{ request()->routeIs('author.dashboard') ? 'active' : '' }}">
                            <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6z M14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6z M4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2z M14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
                            </svg>
                            <span>Dashboard</span>
                        </a>

                        {{-- My Posts --}}
                        <a href="{{ route('author.posts.index') }}" class="sidebar-link flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-sm font-heading font-medium transition-all duration-200 border {{ request()->routeIs('author.posts.*') ? 'active' : '' }}">
                            <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                            </svg>
                            <span>My Posts</span>
                        </a>

                        {{-- Write Post --}}
                        <a href="{{ route('author.posts.create') }}" class="sidebar-link flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-sm font-heading font-medium transition-all duration-200 border {{ request()->routeIs('author.posts.create') ? 'active' : '' }}">
                            <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                            </svg>
                            <span>Write Post</span>
                        </a>

                        {{-- Divider --}}
                        <hr class="border-[var(--color-border)] my-3">

                        {{-- View Site --}}
                        <a href="{{ route('home') }}" target="_blank" class="sidebar-link flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-sm font-heading font-medium transition-all duration-200 border">
                            <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                            <span>View Site</span>
                        </a>

                        {{-- Theme Toggle --}}
                        <hr class="border-[var(--color-border)] my-3">

                        <button onclick="toggleTheme()" class="sidebar-link flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-sm font-heading font-medium transition-all duration-200 border w-full text-left" aria-label="Toggle theme">
                            <svg id="sidebar-theme-icon" class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
                            </svg>
                            <span id="sidebar-theme-label">Dark</span>
                        </button>
                    </nav>

                    {{-- SIDEBAR FOOTER - Logout --}}
                    <div class="mt-auto flex-shrink-0 pt-4 border-t border-[var(--color-border)]">
                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="flex items-center gap-2.5 px-3.5 py-2.5 rounded-xl text-xs font-heading font-medium text-[var(--color-text-muted)] hover:text-[var(--color-text-primary)] hover:bg-[var(--color-bg)] transition-all duration-200 w-full">
                            <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                            </svg>
                            <span>Logout</span>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                            @csrf
                        </form>
                    </div>

                </div>

            </div>

        </aside>


        {{-- ========================================================
            SIDEBAR - MOBILE OVERLAY
        ========================================================= --}}
        <div id="mobileSidebarOverlay" class="mobile-sidebar-overlay" onclick="closeAuthorSidebar()"></div>


        {{-- ========================================================
            SIDEBAR - MOBILE
        ========================================================= --}}
        <div id="mobileSidebar" class="mobile-sidebar">

            <button onclick="closeAuthorSidebar()" class="mobile-close-btn" aria-label="Close sidebar">
                ✕
            </button>

            <div class="author-sidebar-card">

                {{-- BRAND --}}
                <a href="{{ route('author.dashboard') }}" class="logo-link-author flex items-center gap-2 min-w-0 pb-4 border-b border-[var(--color-border)] mb-4 flex-shrink-0">
                    <span class="logo-icon text-[var(--color-primary)] font-heading font-bold text-xl tracking-tight">✦</span>
                    <span class="logo-text text-[var(--color-text-primary)] font-heading font-bold text-xl tracking-tight truncate group-hover:text-[var(--color-primary)] transition-colors">
                        chronicle
                    </span>
                    <span class="text-[10px] font-heading font-medium text-[var(--color-text-muted)] bg-[var(--color-bg)] border border-[var(--color-border)] px-2 py-0.5 rounded-full">
                        Author
                    </span>
                </a>

                {{-- NAVIGATION --}}
                <nav class="flex-1 space-y-0.5 overflow-y-auto">

                    {{-- Dashboard --}}
                    <a href="{{ route('author.dashboard') }}" onclick="closeAuthorSidebar()" class="sidebar-link flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-sm font-heading font-medium transition-all duration-200 border {{ request()->routeIs('author.dashboard') ? 'active' : '' }}">
                        <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6z M14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6z M4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2z M14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
                        </svg>
                        <span>Dashboard</span>
                    </a>

                    {{-- My Posts --}}
                    <a href="{{ route('author.posts.index') }}" onclick="closeAuthorSidebar()" class="sidebar-link flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-sm font-heading font-medium transition-all duration-200 border {{ request()->routeIs('author.posts.*') ? 'active' : '' }}">
                        <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                        </svg>
                        <span>My Posts</span>
                    </a>

                    {{-- Write Post --}}
                    <a href="{{ route('author.posts.create') }}" onclick="closeAuthorSidebar()" class="sidebar-link flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-sm font-heading font-medium transition-all duration-200 border {{ request()->routeIs('author.posts.create') ? 'active' : '' }}">
                        <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                        </svg>
                        <span>Write Post</span>
                    </a>

                    {{-- Divider --}}
                    <hr class="border-[var(--color-border)] my-3">

                    {{-- View Site --}}
                    <a href="{{ route('home') }}" target="_blank" onclick="closeAuthorSidebar()" class="sidebar-link flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-sm font-heading font-medium transition-all duration-200 border">
                        <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                        </svg>
                        <span>View Site</span>
                    </a>

                    {{-- Theme Toggle --}}
                    <hr class="border-[var(--color-border)] my-3">

                    <button onclick="toggleTheme()" class="sidebar-link flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-sm font-heading font-medium transition-all duration-200 border w-full text-left" aria-label="Toggle theme">
                        <svg id="mobile-theme-icon" class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
                        </svg>
                        <span id="mobile-theme-label">Dark</span>
                    </button>
                </nav>

                {{-- SIDEBAR FOOTER - Logout --}}
                <div class="mt-auto flex-shrink-0 pt-4 border-t border-[var(--color-border)]">
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form-mobile').submit();" class="flex items-center gap-2.5 px-3.5 py-2.5 rounded-xl text-xs font-heading font-medium text-[var(--color-text-muted)] hover:text-[var(--color-text-primary)] hover:bg-[var(--color-bg)] transition-all duration-200 w-full">
                        <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                        </svg>
                        <span>Logout</span>
                    </a>
                    <form id="logout-form-mobile" action="{{ route('logout') }}" method="POST" class="hidden">
                        @csrf
                    </form>
                </div>

            </div>

        </div>


        {{-- ========================================================
            MOBILE TOGGLE BUTTON
        ========================================================= --}}
        <button onclick="openAuthorSidebar()" class="mobile-toggle-btn" aria-label="Toggle sidebar">
            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </button>


        {{-- ========================================================
            MAIN CONTENT
        ========================================================= --}}
        <main class="author-main w-full flex-1 p-4 sm:p-6 lg:p-8 min-h-screen box-border bg-[var(--color-bg)]">

            <div class="w-full max-w-7xl mx-auto">

                {{-- HEADER --}}
                <header class="flex justify-end mb-6">
                    <button onclick="toggleTheme()" class="theme-toggle-author" aria-label="Toggle theme">
                        <svg id="header-theme-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
                        </svg>
                        <span id="header-theme-label">Dark</span>
                    </button>
                </header>

                {{-- PAGE CONTENT --}}
                @hasSection('content')
                @yield('content')
                @else
                {{ $slot ?? '' }}
                @endif

            </div>

        </main>

    </div>

    {{-- ============================================================
        JAVASCRIPT
    ============================================================ --}}

    <script>
        // =============================================================
        // SIDEBAR TOGGLE
        // =============================================================

        function openAuthorSidebar() {
            const sidebar = document.getElementById('mobileSidebar');
            const overlay = document.getElementById('mobileSidebarOverlay');

            if (!sidebar || !overlay) return;

            sidebar.classList.add('open');
            overlay.classList.add('active');

            document.body.style.overflow = 'hidden';
        }

        function closeAuthorSidebar() {
            const sidebar = document.getElementById('mobileSidebar');
            const overlay = document.getElementById('mobileSidebarOverlay');

            if (!sidebar || !overlay) return;

            sidebar.classList.remove('open');
            overlay.classList.remove('active');

            document.body.style.overflow = '';
        }

        // Close on escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                closeAuthorSidebar();
            }
        });

        // Close on resize to desktop
        window.addEventListener('resize', function() {
            if (window.innerWidth >= 1024) {
                closeAuthorSidebar();
            }
        });


        // =============================================================
        // THEME TOGGLE
        // =============================================================

        function toggleTheme() {
            const html = document.documentElement;
            const currentTheme = html.getAttribute('data-theme');
            const newTheme = currentTheme === 'dark' ? 'light' : 'dark';

            html.setAttribute('data-theme', newTheme);
            localStorage.setItem('theme', newTheme);

            updateAuthorThemeUI(newTheme);
        }

        function updateAuthorThemeUI(theme) {
            const isDark = theme === 'dark';

            const icons = document.querySelectorAll(
                '#sidebar-theme-icon, #header-theme-icon, #mobile-theme-icon'
            );

            const labels = document.querySelectorAll(
                '#sidebar-theme-label, #header-theme-label, #mobile-theme-label'
            );

            icons.forEach(icon => {
                if (icon) {
                    icon.innerHTML = isDark ?
                        '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"/>' :
                        '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"/>';
                }
            });

            labels.forEach(label => {
                if (label) label.textContent = isDark ? 'Light' : 'Dark';
            });
        }

        // Load saved theme
        document.addEventListener('DOMContentLoaded', function() {
            const savedTheme = localStorage.getItem('theme') || 'light';
            document.documentElement.setAttribute('data-theme', savedTheme);
            updateAuthorThemeUI(savedTheme);
        });
    </script>

    @stack('scripts')
</body>

</html>