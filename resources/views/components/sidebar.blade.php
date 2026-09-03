@php
$pendingPosts = \App\Models\Post::where('status', 'pending')
->with('user')
->latest()
->get();

$pendingCount = $pendingPosts->count();
@endphp

@props(['mobile' => false])

<aside
    class="{{ $mobile ? 'flex' : 'hidden md:flex' }} flex-col w-64 shrink-0
           h-screen sticky top-0 z-30
           transition-colors duration-300
           {{ $mobile ? 'p-0' : 'p-4' }}">

    <style>
        /* =========================================================
           CHRONICLE ADMIN SIDEBAR - SINGLE CARD
           No floating, no transparent - just one card
        ========================================================= */

        /* ---------- Single Card Container ---------- */

        .sidebar-card {
            background: var(--color-bg-card);
            border: 1px solid var(--color-border);
            border-radius: 1.25rem;
            padding: 1.5rem 1.25rem;
            transition: all 0.3s ease;
            box-shadow: 0 2px 12px var(--color-shadow);
            display: flex;
            flex-direction: column;
            height: 100%;
            width: 100%;
            overflow-y: auto;
        }

        /* Hide scrollbar */
        .sidebar-card::-webkit-scrollbar {
            display: none;
        }

        .sidebar-card {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }

        .sidebar-card:hover {
            border-color: var(--color-primary);
        }

        /* Mobile version - remove border and shadow */
        .sidebar-card-mobile {
            background: var(--color-bg-sidebar);
            border: none;
            border-radius: 0;
            padding: 1.5rem 1.25rem;
            display: flex;
            flex-direction: column;
            height: 100%;
            width: 100%;
            overflow-y: auto;
        }

        .sidebar-card-mobile::-webkit-scrollbar {
            display: none;
        }

        .sidebar-card-mobile {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }


        /* ---------- Brand ---------- */

        .logo-link-sidebar {
            color: var(--color-text-primary);
            text-decoration: none;
            transition: color 0.25s ease;
            padding-bottom: 1rem;
            border-bottom: 1px solid var(--color-border);
            margin-bottom: 1rem;
            flex-shrink: 0;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .logo-link-sidebar:hover {
            color: var(--color-primary);
        }

        .logo-icon {
            color: var(--color-primary);
            transition:
                transform 0.25s ease,
                color 0.25s ease;
        }

        .logo-link-sidebar:hover .logo-icon {
            color: var(--color-primary-hover);
            transform: scale(1.08) rotate(8deg);
        }


        /* ---------- Navigation ---------- */

        .sidebar-link {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 0.6rem 0.75rem;
            border-radius: 0.75rem;
            color: var(--color-text-secondary) !important;
            background: transparent !important;
            border: 1px solid transparent !important;
            transition:
                color 0.2s ease,
                background-color 0.2s ease,
                border-color 0.2s ease;
            font-size: 0.875rem;
        }

        .sidebar-link:hover {
            color: var(--color-text-primary) !important;
            background-color: var(--color-bg) !important;
            border-color: var(--color-border) !important;
        }

        .sidebar-link:hover svg {
            color: var(--color-primary);
        }

        .sidebar-link.active {
            color: var(--color-primary) !important;
            background-color: var(--color-primary-soft) !important;
            border-color: var(--color-primary-soft) !important;
        }

        .sidebar-link.active svg {
            color: var(--color-primary);
        }


        /* ---------- Notification ---------- */

        .notification-link {
            display: flex;
            align-items: center;
            width: 100%;
            gap: 0.75rem;
            padding: 0.6rem 0.75rem;
            border-radius: 0.75rem;
            border: 1px solid transparent;
            color: var(--color-text-secondary);
            background: transparent;
            text-decoration: none;
            font-size: 0.875rem;
            transition:
                color 0.2s ease,
                background-color 0.2s ease,
                border-color 0.2s ease;
        }

        .notification-link:hover {
            color: var(--color-text-primary);
            background-color: var(--color-bg);
            border-color: var(--color-border);
        }

        .notification-link:hover svg {
            color: var(--color-primary);
        }

        .notification-link.active {
            color: var(--color-primary) !important;
            background-color: var(--color-primary-soft) !important;
            border-color: var(--color-primary-soft) !important;
        }

        .notification-link.active svg {
            color: var(--color-primary);
        }


        /* ---------- Notification Badge ---------- */

        .badge-notification {
            min-width: 20px;
            height: 20px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 0 6px;
            border-radius: 9999px;
            background: var(--color-primary) !important;
            color: #ffffff !important;
            font-family: 'Poppins', sans-serif;
            font-size: 10px;
            font-weight: 600;
            line-height: 1;
        }


        /* ---------- User Area ---------- */

        .user-avatar {
            background-color: var(--color-primary-soft) !important;
            color: var(--color-primary) !important;
            border: 1px solid var(--color-primary-soft) !important;
            transition:
                background-color 0.2s ease,
                border-color 0.2s ease;
            flex-shrink: 0;
            width: 2.25rem;
            height: 2.25rem;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            font-size: 0.75rem;
        }

        .group:hover .user-avatar {
            background-color: var(--color-primary-soft) !important;
            border-color: var(--color-primary) !important;
        }

        .user-name {
            color: var(--color-text-primary) !important;
            font-weight: 500;
            font-size: 0.875rem;
        }

        .user-email {
            color: var(--color-text-muted) !important;
            font-size: 0.7rem;
        }


        /* ---------- Logout ---------- */

        .logout-btn {
            color: var(--color-text-muted) !important;
            transition: all 0.2s ease;
            padding: 0.4rem 0.75rem;
            border-radius: 0.5rem;
            width: 100%;
            text-align: left;
            font-size: 0.875rem;
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .logout-btn:hover {
            color: #EF4444 !important;
            background-color: rgba(239, 68, 68, 0.08) !important;
        }

        .logout-btn:hover svg {
            color: #EF4444;
        }


        /* ---------- View Site ---------- */

        .view-site-link {
            color: var(--color-text-muted) !important;
            transition: all 0.2s ease;
            padding: 0.6rem 0.75rem;
            border-radius: 0.75rem;
            font-size: 0.875rem;
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .view-site-link:hover {
            color: var(--color-primary) !important;
            background-color: var(--color-bg) !important;
        }

        .view-site-link:hover svg {
            color: var(--color-primary);
        }


        /* ---------- Divider ---------- */

        .sidebar-divider {
            border-color: var(--color-border);
            margin: 0.75rem 0;
        }


        /* ---------- Alpine ---------- */

        [x-cloak] {
            display: none !important;
        }
    </style>


    {{-- =========================================================
         SIDEBAR CARD - SINGLE CARD
    ========================================================== --}}

    <div class="flex-1 w-full h-full">

        {{-- ONLY ONE CARD --}}
        <div class="{{ $mobile ? 'sidebar-card-mobile' : 'sidebar-card' }}">

            {{-- Brand --}}
            <a
                href="{{ route('admin.dashboard') }}"
                class="logo-link-sidebar heading-font text-xl font-bold tracking-tight">

                <span class="logo-icon text-xl">✦</span>
                <span>chronicle</span>

            </a>


            {{-- Navigation --}}
            <nav class="space-y-0.5 flex-1">

                {{-- Dashboard --}}
                <a
                    href="{{ route('admin.dashboard') }}"
                    class="sidebar-link
                           {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">

                    <svg
                        class="w-5 h-5 shrink-0"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                        aria-hidden="true">

                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a2 2 0 01-2-2v-4a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2m-6 0h6" />

                    </svg>

                    <span class="truncate heading-font text-sm font-medium">
                        Dashboard
                    </span>

                </a>


                {{-- Posts --}}
                <a
                    href="{{ route('admin.posts.index') }}"
                    class="sidebar-link
                           {{ request()->routeIs('admin.posts.*') ? 'active' : '' }}">

                    <svg
                        class="w-5 h-5 shrink-0"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                        aria-hidden="true">

                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />

                    </svg>

                    <span class="truncate heading-font text-sm font-medium">
                        Posts
                    </span>

                </a>


                {{-- Categories --}}
                <a
                    href="{{ route('admin.categories.index') }}"
                    class="sidebar-link
                           {{ request()->routeIs('admin.categories.*') ? 'active' : '' }}">

                    <svg
                        class="w-5 h-5 shrink-0"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                        aria-hidden="true">

                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z" />

                    </svg>

                    <span class="truncate heading-font text-sm font-medium">
                        Categories
                    </span>

                </a>


                {{-- Users --}}
                <a
                    href="{{ route('admin.users.index') }}"
                    class="sidebar-link
                           {{ request()->routeIs('admin.users.*') ? 'active' : '' }}">

                    <svg
                        class="w-5 h-5 shrink-0"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                        aria-hidden="true">

                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />

                    </svg>

                    <span class="truncate heading-font text-sm font-medium">
                        Users
                    </span>

                </a>


                {{-- Notifications --}}
                <a
                    href="{{ route('admin.posts.index', ['status' => 'pending']) }}"
                    class="notification-link mt-1
                           {{ request()->routeIs('admin.posts.index') && request('status') === 'pending' ? 'active' : '' }}">

                    <svg
                        class="w-5 h-5 shrink-0"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                        aria-hidden="true">

                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 00-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />

                    </svg>

                    <span class="truncate heading-font text-sm font-medium">
                        Notifications
                    </span>

                    @if($pendingCount > 0)

                    <span class="ml-auto badge-notification shrink-0">
                        {{ $pendingCount > 99 ? '99+' : $pendingCount }}
                    </span>

                    @endif

                </a>


                {{-- Divider --}}
                <hr class="sidebar-divider">


                {{-- View Site --}}
                <a
                    href="{{ route('posts.index') }}"
                    target="_blank"
                    rel="noopener noreferrer"
                    class="view-site-link">

                    <svg
                        class="w-5 h-5 shrink-0"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                        aria-hidden="true">

                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />

                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />

                    </svg>

                    <span class="truncate heading-font text-sm font-medium">
                        View Site
                    </span>

                </a>

            </nav>


            {{-- Divider before user --}}
            <hr class="sidebar-divider">


            {{-- User & Logout --}}
            <div class="mt-auto flex-shrink-0">

                {{-- User --}}
                <div
                    class="flex items-center gap-3 px-1 py-2 rounded-xl
                           hover:bg-[var(--color-bg)]
                           transition-colors duration-200
                           group mb-1">

                    {{-- Avatar --}}
                    <div class="user-avatar">
                        {{ strtoupper(substr(auth()->user()->name ?? 'U', 0, 2)) }}
                    </div>


                    {{-- User Information --}}
                    <div class="flex-1 min-w-0">

                        <p class="user-name truncate">
                            {{ auth()->user()->name ?? 'User' }}
                        </p>

                        <p class="user-email truncate">
                            {{ auth()->user()->email ?? '' }}
                        </p>

                    </div>

                </div>


                {{-- Logout --}}
                <form
                    method="POST"
                    action="{{ route('logout') }}">

                    @csrf

                    <button
                        type="submit"
                        class="logout-btn">

                        <svg
                            class="w-5 h-5 shrink-0"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                            aria-hidden="true">

                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />

                        </svg>

                        <span class="heading-font text-sm font-medium">
                            Logout
                        </span>

                    </button>

                </form>

            </div>

        </div>

    </div>

</aside>