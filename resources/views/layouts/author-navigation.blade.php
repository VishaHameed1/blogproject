<nav class="bg-[var(--color-bg-card)] text-[var(--color-text-secondary)] border-b border-[var(--color-border)] shadow-sm font-body">
    <style>
        /* ==========================================================
           CHRONICLE DUAL-TONE THEME
           Light: Purple (#7C3AED) | Dark: Blue (#3B82F6)
        ========================================================== */

        :root {
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
            --color-secondary-hover: #60A5FA;
            --color-shadow: rgba(0, 0, 0, 0.08);
            --color-shadow-hover: rgba(0, 0, 0, 0.12);
        }

        [data-theme="dark"] {
            --color-bg: #0A0A0A;
            --color-bg-card: #141414;
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

        /* Nav link styles */
        .nav-link-author {
            color: var(--color-text-secondary) !important;
            transition: all 0.2s ease;
            font-weight: 500;
        }

        .nav-link-author:hover {
            color: var(--color-text-primary) !important;
            background-color: var(--color-bg) !important;
        }

        .nav-link-author.active {
            color: var(--color-primary) !important;
            background-color: var(--color-primary-soft) !important;
            box-shadow: 0 1px 2px var(--color-shadow) !important;
        }

        /* New Post button */
        .btn-primary-author {
            background-color: var(--color-primary) !important;
            color: #ffffff !important;
            transition: all 0.3s ease;
        }

        .btn-primary-author:hover {
            background-color: var(--color-primary-hover) !important;
            transform: scale(1.02);
        }

        /* View Blog button */
        .btn-outline-author {
            color: var(--color-primary) !important;
            border-color: var(--color-primary-soft) !important;
            transition: all 0.3s ease;
        }

        .btn-outline-author:hover {
            background-color: var(--color-primary) !important;
            color: #ffffff !important;
            border-color: var(--color-primary) !important;
        }

        /* Logout button */
        .btn-logout-author {
            background-color: #EF4444 !important;
            color: #ffffff !important;
            transition: all 0.3s ease;
        }

        .btn-logout-author:hover {
            background-color: #DC2626 !important;
            transform: scale(1.02);
        }

        /* Logo hover */
        .logo-link-author-nav {
            transition: all 0.3s ease;
            text-decoration: none;
        }

        .logo-link-author-nav:hover .logo-text {
            color: var(--color-primary) !important;
        }

        .logo-link-author-nav:hover .logo-icon {
            transform: scale(1.1) rotate(10deg);
        }
    </style>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16">
            <!-- Left Side: Mobile Toggle & Logo & Links -->
            <div class="flex items-center space-x-4 md:space-x-8">
                <!-- Mobile Hamburger Button -->
                <button
                    id="sidebar-toggle-btn"
                    type="button"
                    onclick="openAuthorSidebar()"
                    class="md:hidden p-2 rounded-md text-[var(--color-text-muted)] hover:text-[var(--color-text-primary)] hover:bg-[var(--color-bg)] focus:outline-none transition"
                    aria-label="Open navigation">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>

                <a href="{{ route('author.dashboard') }}" class="logo-link-author-nav font-bold text-xl text-[var(--color-text-primary)] tracking-wide hover:text-[var(--color-primary)] transition font-heading flex items-center gap-2">
                    <span class="logo-icon text-[var(--color-primary)] transition-all duration-300">✦</span>
                    <span class="logo-text transition-colors duration-300">Author Panel</span>
                </a>

                <div class="hidden md:flex space-x-4 font-heading">
                    <a href="{{ route('author.dashboard') }}"
                        class="nav-link-author px-3 py-2 rounded-md text-sm font-medium transition {{ request()->routeIs('author.dashboard') ? 'active' : '' }}">
                        Dashboard
                    </a>
                    <a href="{{ route('author.posts.index') }}"
                        class="nav-link-author px-3 py-2 rounded-md text-sm font-medium transition {{ request()->routeIs('author.posts.*') ? 'active' : '' }}">
                        My Posts
                    </a>
                    <a href="{{ route('author.posts.create') }}"
                        class="btn-primary-author px-4 py-2 rounded-md text-sm font-medium transition shadow-lg shadow-[var(--color-primary)]/20 hover:shadow-[var(--color-primary)]/40">
                        + New Post
                    </a>
                </div>
            </div>

            <!-- Right Side: User Profile & Public Site Link -->
            <div class="flex items-center space-x-3 sm:space-x-4 font-heading">
                <!-- THEME TOGGLE REMOVED FROM HERE -->

                <a href="{{ route('posts.index') }}" target="_blank" class="btn-outline-author text-xs border px-3 py-1.5 rounded-full transition hidden sm:inline-block shadow-sm hover:shadow-md">
                    🌐 View Main Blog
                </a>

                <span class="text-sm font-medium text-[var(--color-text-primary)] truncate max-w-[120px] sm:max-w-none">{{ auth()->user()->name ?? 'Author' }}</span>

                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf
                    <button type="submit" class="btn-logout-author text-xs px-3 py-1.5 rounded-md font-medium transition shadow-lg shadow-red-500/20 hover:shadow-red-500/40">
                        Logout
                    </button>
                </form>
            </div>
        </div>
    </div>
</nav>