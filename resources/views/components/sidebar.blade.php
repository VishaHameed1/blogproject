@php
    $pendingPosts = \App\Models\Post::where('status', 'pending')->with('user')->latest()->get();
    $pendingCount = $pendingPosts->count();
@endphp

<div x-data="{ mobileOpen: false }" class="relative">

    {{-- Mobile Top Header & Toggle Button --}}
    <div class="md:hidden flex items-center justify-between p-4 bg-[#121212] border-b border-white/5 w-full sticky top-0 z-40">
        <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-2 heading-font text-xl font-bold text-white hover:text-rust transition-colors duration-300 group">
            <span class="text-rust group-hover:scale-110 transition-transform duration-300">✦</span>
            <span>chronicle</span>
        </a>
        <button @click="mobileOpen = !mobileOpen" type="button" class="p-2 text-white/60 hover:text-white focus:outline-none transition-colors duration-300">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
            </svg>
        </button>
    </div>

    {{-- Mobile Sidebar Drawer Overlay --}}
    <div x-show="mobileOpen" 
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition ease-in duration-150"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         @click="mobileOpen = false" 
         class="fixed inset-0 z-50 bg-black/80 backdrop-blur-sm md:hidden" 
         x-cloak></div>

    {{-- Mobile Drawer Panel --}}
    <aside x-show="mobileOpen"
           x-transition:enter="transition ease-out duration-200 transform"
           x-transition:enter-start="-translate-x-full"
           x-transition:enter-end="translate-x-0"
           x-transition:leave="transition ease-in duration-150 transform"
           x-transition:leave-start="translate-x-0"
           x-transition:leave-end="-translate-x-full"
           class="fixed inset-y-0 left-0 w-72 bg-[#121212] border-r border-white/5 p-6 z-50 flex flex-col justify-between md:hidden overflow-y-auto"
           x-cloak>
        <div>
            <div class="flex items-center justify-between mb-8">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-2 heading-font text-xl font-bold text-white hover:text-rust transition-colors duration-300 group">
                    <span class="text-rust group-hover:scale-110 transition-transform duration-300">✦</span>
                    <span>chronicle</span>
                </a>
                <button @click="mobileOpen = false" class="text-white/30 hover:text-white transition-colors duration-300">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
            
            <nav class="space-y-1">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-xl text-sm text-white/60 hover:text-white hover:bg-white/5 transition-all duration-300 {{ request()->routeIs('admin.dashboard') ? 'bg-rust/10 text-rust border border-rust/20' : '' }}">
                    <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 00-1-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                    </svg>
                    <span class="truncate heading-font text-sm font-medium">Dashboard</span>
                </a>

                <a href="{{ route('admin.posts.index') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-xl text-sm text-white/60 hover:text-white hover:bg-white/5 transition-all duration-300 {{ request()->routeIs('admin.posts.*') && request()->get('status') !== 'pending' ? 'bg-rust/10 text-rust border border-rust/20' : '' }}">
                    <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/>
                    </svg>
                    <span class="truncate heading-font text-sm font-medium">Posts</span>
                </a>

                <a href="{{ route('admin.categories.index') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-xl text-sm text-white/60 hover:text-white hover:bg-white/5 transition-all duration-300 {{ request()->routeIs('admin.categories.*') ? 'bg-rust/10 text-rust border border-rust/20' : '' }}">
                    <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z"/>
                    </svg>
                    <span class="truncate heading-font text-sm font-medium">Categories</span>
                </a>

                <a href="{{ route('admin.users.index') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-xl text-sm text-white/60 hover:text-white hover:bg-white/5 transition-all duration-300 {{ request()->routeIs('admin.users.*') ? 'bg-rust/10 text-rust border border-rust/20' : '' }}">
                    <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                    </svg>
                    <span class="truncate heading-font text-sm font-medium">Users</span>
                </a>

                {{-- Notifications Direct Link --}}
                <a href="{{ route('admin.posts.index', ['status' => 'pending']) }}" class="flex items-center gap-3 px-4 py-2.5 rounded-xl text-sm text-white/60 hover:text-white hover:bg-white/5 transition-all duration-300 {{ request()->get('status') === 'pending' ? 'bg-rust/10 text-rust border border-rust/20' : '' }}">
                    <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/>
                    </svg>
                    <span class="truncate heading-font text-sm font-medium">Notifications</span>
                    @if($pendingCount > 0)
                        <span class="ml-auto px-2 py-0.5 bg-rust/20 text-rust text-[10px] heading-font font-semibold rounded-full shrink-0">
                            {{ $pendingCount }}
                        </span>
                    @endif
                </a>

                <hr class="border-white/5 my-4">
                
                <a href="{{ route('posts.index') }}" target="_blank" class="flex items-center gap-3 px-4 py-2.5 rounded-xl text-sm text-white/40 hover:text-white hover:bg-white/5 transition-all duration-300">
                    <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                    </svg>
                    <span class="truncate heading-font text-sm font-medium">View Site</span>
                </a>
            </nav>
        </div>
        <div class="pt-4 border-t border-white/5">
            <div class="flex items-center gap-3 px-2 py-2 rounded-xl hover:bg-white/5 transition-colors duration-300 group mb-2">
                <div class="w-9 h-9 rounded-full bg-rust/20 flex items-center justify-center text-rust font-bold text-sm heading-font border border-rust/30 shrink-0">
                    {{ strtoupper(substr(auth()->user()->name, 0, 2)) }}
                </div>
                <div class="flex-1 min-w-0">
                    <p class="text-sm heading-font font-medium text-white truncate">{{ auth()->user()->name }}</p>
                    <p class="text-xs text-white/30 truncate body-font">{{ auth()->user()->email }}</p>
                </div>
            </div>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="flex items-center gap-3 text-white/30 hover:text-white transition-colors duration-300 w-full text-left px-2 py-1.5 rounded-lg hover:bg-white/5">
                    <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                    </svg>
                    <span class="heading-font text-sm font-medium">Logout</span>
                </button>
            </form>
        </div>
    </aside>

    {{-- Permanent Fixed Desktop Sidebar --}}
    <aside class="hidden md:flex flex-col justify-between w-64 bg-[#121212] border-r border-white/5 h-screen fixed top-0 left-0 z-40 shrink-0">
        <div class="p-5 overflow-y-auto">
            {{-- Logo / Brand --}}
            <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-2 heading-font text-xl font-bold tracking-tight text-white hover:text-rust transition-colors duration-300 group mb-8">
                <span class="text-rust group-hover:scale-110 transition-transform duration-300">✦</span>
                chronicle
            </a>

            {{-- Primary Navigation --}}
            <nav class="space-y-1">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-xl text-sm text-white/60 hover:text-white hover:bg-white/5 transition-all duration-300 {{ request()->routeIs('admin.dashboard') ? 'bg-rust/10 text-rust border border-rust/20' : '' }}">
                    <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 00-1-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                    </svg>
                    <span class="truncate heading-font text-sm font-medium">Dashboard</span>
                </a>

                <a href="{{ route('admin.posts.index') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-xl text-sm text-white/60 hover:text-white hover:bg-white/5 transition-all duration-300 {{ request()->routeIs('admin.posts.*') && request()->get('status') !== 'pending' ? 'bg-rust/10 text-rust border border-rust/20' : '' }}">
                    <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/>
                    </svg>
                    <span class="truncate heading-font text-sm font-medium">Posts</span>
                </a>

                <a href="{{ route('admin.categories.index') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-xl text-sm text-white/60 hover:text-white hover:bg-white/5 transition-all duration-300 {{ request()->routeIs('admin.categories.*') ? 'bg-rust/10 text-rust border border-rust/20' : '' }}">
                    <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z"/>
                    </svg>
                    <span class="truncate heading-font text-sm font-medium">Categories</span>
                </a>

                <a href="{{ route('admin.users.index') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-xl text-sm text-white/60 hover:text-white hover:bg-white/5 transition-all duration-300 {{ request()->routeIs('admin.users.*') ? 'bg-rust/10 text-rust border border-rust/20' : '' }}">
                    <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                    </svg>
                    <span class="truncate heading-font text-sm font-medium">Users</span>
                </a>

                {{-- Notifications Direct Redirect Link --}}
                <a href="{{ route('admin.posts.index', ['status' => 'pending']) }}" class="flex items-center gap-3 px-4 py-2.5 rounded-xl text-sm text-white/60 hover:text-white hover:bg-white/5 transition-all duration-300 {{ request()->get('status') === 'pending' ? 'bg-rust/10 text-rust border border-rust/20' : '' }}">
                    <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/>
                    </svg>
                    <span class="truncate heading-font text-sm font-medium">Notifications</span>
                    @if($pendingCount > 0)
                        <span class="ml-auto px-2 py-0.5 bg-rust/20 text-rust text-[10px] heading-font font-semibold rounded-full shrink-0">
                            {{ $pendingCount }}
                        </span>
                    @endif
                </a>

                <hr class="border-white/5 my-4">
                
                <a href="{{ route('posts.index') }}" target="_blank" class="flex items-center gap-3 px-4 py-2.5 rounded-xl text-sm text-white/40 hover:text-white hover:bg-white/5 transition-all duration-300">
                    <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                    </svg>
                    <span class="truncate heading-font text-sm font-medium">View Site</span>
                </a>
            </nav>
        </div>

        {{-- Bottom User & Logout --}}
        <div class="p-4 border-t border-white/5">
            <div class="flex items-center gap-3 px-2 py-2 rounded-xl hover:bg-white/5 transition-colors duration-300 group mb-2">
                <div class="w-9 h-9 rounded-full bg-rust/20 flex items-center justify-center text-rust font-bold text-sm heading-font border border-rust/30 shrink-0">
                    {{ strtoupper(substr(auth()->user()->name, 0, 2)) }}
                </div>
                <div class="flex-1 min-w-0">
                    <p class="text-sm heading-font font-medium text-white truncate">{{ auth()->user()->name }}</p>
                    <p class="text-xs text-white/30 truncate body-font">{{ auth()->user()->email }}</p>
                </div>
            </div>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="flex items-center gap-3 text-white/30 hover:text-white transition-colors duration-300 w-full text-left px-2 py-1.5 rounded-lg hover:bg-white/5">
                    <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                    </svg>
                    <span class="heading-font text-sm font-medium">Logout</span>
                </button>
            </form>
        </div>
    </aside>

</div>

<style>
    .heading-font {
        font-family: 'Poppins', ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif !important;
        letter-spacing: -0.02em !important;
    }
    .body-font {
        font-family: 'Work Sans', ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif !important;
    }
</style>