@php
$pendingPosts = \App\Models\Post::where('status', 'pending')->with('user')->latest()->get();
$pendingCount = $pendingPosts->count();
@endphp

<aside class="hidden md:flex flex-col justify-between w-64 shrink-0 bg-[var(--color-bg-sidebar)] border-r border-[var(--color-border)] h-screen sticky top-0 z-30 transition-colors duration-300">
    <style>
        /* Theme variables for inline use */
        :root {
            --color-bg: #F8F9FA;
            --color-bg-card: #FFFFFF;
            --color-bg-sidebar: #FFFFFF;
            --color-text-primary: #111827;
            --color-text-secondary: #6B7280;
            --color-text-muted: #9CA3AF;
            --color-border: #E5E7EB;
            --color-primary: #7C3AED;
            --color-primary-hover: #6D28D9;
            --color-primary-soft: rgba(124, 58, 237, 0.10);
            --color-secondary: #3B82F6;
            --color-secondary-hover: #60A5FA;
        }

        [data-theme="dark"] {
            --color-bg: #0A0A0A;
            --color-bg-card: #141414;
            --color-bg-sidebar: #0A0A0A;
            --color-text-primary: #FFFFFF;
            --color-text-secondary: #A0A0A0;
            --color-text-muted: #6B7280;
            --color-border: #2A2A2A;
            --color-primary: #3B82F6;
            --color-primary-hover: #60A5FA;
            --color-primary-soft: rgba(59, 130, 246, 0.14);
            --color-secondary: #3B82F6;
            --color-secondary-hover: #60A5FA;
        }

        /* Heading font - Poppins */
        .heading-font {
            font-family: 'Poppins', ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif !important;
            letter-spacing: -0.02em !important;
            color: var(--color-text-primary) !important;
        }

        /* Body font - Work Sans */
        .body-font {
            font-family: 'Work Sans', ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif !important;
        }

        /* Logo hover */
        .logo-link-sidebar {
            transition: all 0.3s ease;
            text-decoration: none;
        }

        .logo-link-sidebar:hover .logo-text {
            color: var(--color-primary) !important;
        }

        .logo-link-sidebar:hover .logo-icon {
            transform: scale(1.1) rotate(10deg);
        }

        /* Sidebar link styles */
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

        /* Notification badge */
        .badge-notification {
            background-color: var(--color-primary) !important;
            color: #ffffff !important;
        }

        /* Notification popover */
        .popover-content {
            background-color: var(--color-bg-card) !important;
            border-color: var(--color-border) !important;
        }

        .popover-item {
            color: var(--color-text-secondary) !important;
        }

        .popover-item:hover {
            background-color: var(--color-bg) !important;
        }

        .popover-divider {
            border-color: var(--color-border) !important;
        }

        .popover-title {
            color: var(--color-text-primary) !important;
        }

        /* User section */
        .user-avatar {
            background-color: var(--color-primary-soft) !important;
            color: var(--color-primary) !important;
            border-color: var(--color-primary-soft) !important;
        }

        .user-name {
            color: var(--color-text-primary) !important;
        }

        .user-email {
            color: var(--color-text-muted) !important;
        }

        /* Logout button */
        .logout-btn {
            color: var(--color-text-muted) !important;
        }

        .logout-btn:hover {
            color: var(--color-text-primary) !important;
            background-color: var(--color-bg) !important;
        }

        /* View Site link */
        .view-site-link {
            color: var(--color-text-muted) !important;
        }

        .view-site-link:hover {
            color: var(--color-text-primary) !important;
            background-color: var(--color-bg) !important;
        }

        /* Scrollbar */
        .sidebar-scroll::-webkit-scrollbar {
            width: 5px;
        }

        .sidebar-scroll::-webkit-scrollbar-track {
            background: transparent;
        }

        .sidebar-scroll::-webkit-scrollbar-thumb {
            background: var(--color-primary-soft);
            border-radius: 999px;
        }

        .sidebar-scroll::-webkit-scrollbar-thumb:hover {
            background: var(--color-primary);
        }
    </style>

    <div class="p-5 sidebar-scroll ">
        {{-- Logo / Brand --}}
        <a href="{{ route('admin.dashboard') }}" class="logo-link-sidebar flex items-center gap-2 heading-font text-xl font-bold tracking-tight text-[var(--color-text-primary)] transition-colors duration-300 group mb-8">
            <span class="logo-icon text-[var(--color-primary)] group-hover:scale-110 transition-all duration-300">✦</span>
            <span class="logo-text transition-colors duration-300">chronicle</span>
        </a>

        {{-- Primary Navigation --}}
        <nav class="space-y-1">
            <a href="{{ route('admin.dashboard') }}" class="sidebar-link flex items-center gap-3 px-4 py-2.5 rounded-xl text-sm transition-all duration-300 border {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 00-1-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                </svg>
                <span class="truncate heading-font text-sm font-medium">Dashboard</span>
            </a>

            <a href="{{ route('admin.posts.index') }}" class="sidebar-link flex items-center gap-3 px-4 py-2.5 rounded-xl text-sm transition-all duration-300 border {{ request()->routeIs('admin.posts.*') ? 'active' : '' }}">
                <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                </svg>
                <span class="truncate heading-font text-sm font-medium">Posts</span>
            </a>

            <a href="{{ route('admin.categories.index') }}" class="sidebar-link flex items-center gap-3 px-4 py-2.5 rounded-xl text-sm transition-all duration-300 border {{ request()->routeIs('admin.categories.*') ? 'active' : '' }}">
                <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z" />
                </svg>
                <span class="truncate heading-font text-sm font-medium">Categories</span>
            </a>

            <a href="{{ route('admin.users.index') }}" class="sidebar-link flex items-center gap-3 px-4 py-2.5 rounded-xl text-sm transition-all duration-300 border {{ request()->routeIs('admin.users.*') ? 'active' : '' }}">
                <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                </svg>
                <span class="truncate heading-font text-sm font-medium">Users</span>
            </a>

            {{-- Notifications Section --}}
            <div class="relative mt-2" x-data="{ open: false }">
                <button @click="open = !open" type="button" class="sidebar-link flex items-center gap-3 px-4 py-2.5 rounded-xl text-sm transition-all duration-300 w-full text-left border">
                    <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                    </svg>
                    <span class="truncate heading-font text-sm font-medium">Notifications</span>
                    @if($pendingCount > 0)
                    <span class="ml-auto px-2 py-0.5 badge-notification text-[10px] heading-font font-semibold rounded-full shrink-0">
                        {{ $pendingCount }}
                    </span>
                    @endif
                </button>

                {{-- Notification Popover --}}
                <div x-show="open"
                    @click.away="open = false"
                    x-transition:enter="transition ease-out duration-100"
                    x-transition:enter-start="transform opacity-0 scale-95"
                    x-transition:enter-end="transform opacity-100 scale-100"
                    x-transition:leave="transition ease-in duration-75"
                    x-transition:leave-start="transform opacity-100 scale-100"
                    x-transition:leave-end="transform opacity-0 scale-95"
                    x-cloak
                    class="absolute left-0 mt-2 w-72 popover-content border rounded-xl shadow-2xl py-2 z-50">

                    <div class="px-4 py-2 border-b popover-divider flex justify-between items-center text-xs heading-font font-bold">
                        <span class="popover-title">Pending Review Requests</span>
                        <span class="text-[var(--color-primary)] heading-font font-semibold">{{ $pendingCount }} new</span>
                    </div>

                    <div class="max-h-64 overflow-y-auto divide-y popover-divider">
                        @forelse($pendingPosts as $pendingPost)
                        <a href="{{ route('admin.posts.edit', $pendingPost) }}" class="popover-item block px-4 py-3 hover:bg-[var(--color-bg)] transition-colors">
                            <p class="text-xs heading-font font-semibold text-[var(--color-text-primary)] truncate">{{ $pendingPost->title }}</p>
                            <p class="text-[11px] text-[var(--color-text-muted)] mt-1 body-font">
                                Requested by: <span class="heading-font font-bold text-[var(--color-text-secondary)]">{{ $pendingPost->user->name ?? 'Author' }}</span>
                            </p>
                            <span class="text-[10px] text-[var(--color-text-muted)] block mt-0.5 body-font">{{ $pendingPost->updated_at->diffForHumans() }}</span>
                        </a>
                        @empty
                        <div class="px-4 py-6 text-center text-xs body-font text-[var(--color-text-muted)]">
                            No pending post requests.
                        </div>
                        @endforelse
                    </div>
                </div>
            </div>

            <hr class="border-[var(--color-border)] my-4">

            <a href="{{ route('posts.index') }}" target="_blank" class="view-site-link flex items-center gap-3 px-4 py-2.5 rounded-xl text-sm transition-all duration-300">
                <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                </svg>
                <span class="truncate heading-font text-sm font-medium">View Site</span>
            </a>
        </nav>
    </div>

    {{-- Bottom User & Logout --}}
    <div class="p-4 border-t border-[var(--color-border)]">
        <div class="flex items-center gap-3 px-2 py-2 rounded-xl hover:bg-[var(--color-bg)] transition-colors duration-300 group mb-2">
            <div class="w-9 h-9 rounded-full user-avatar flex items-center justify-center font-bold text-sm heading-font border shrink-0">
                {{ strtoupper(substr(auth()->user()->name, 0, 2)) }}
            </div>
            <div class="flex-1 min-w-0">
                <p class="text-sm heading-font font-medium user-name truncate">{{ auth()->user()->name }}</p>
                <p class="text-xs user-email truncate body-font">{{ auth()->user()->email }}</p>
            </div>
        </div>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="logout-btn flex items-center gap-3 transition-colors duration-300 w-full text-left px-2 py-1.5 rounded-lg hover:bg-[var(--color-bg)]">
                <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                </svg>
                <span class="heading-font text-sm font-medium">Logout</span>
            </button>
        </form>
    </div>
</aside>

<style>
    .heading-font {
        font-family: 'Poppins', ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif !important;
        letter-spacing: -0.02em !important;
    }

    .body-font {
        font-family: 'Work Sans', ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif !important;
    }

    [x-cloak] {
        display: none !important;
    }
</style>