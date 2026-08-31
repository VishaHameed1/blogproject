@php
    $pendingPosts = \App\Models\Post::where('status', 'pending')->with('user')->latest()->get();
    $pendingCount = $pendingPosts->count();
@endphp

<aside class="hidden md:flex flex-col justify-between w-64 shrink-0 bg-[#0a0a0a] border-r border-white/5 h-screen sticky top-0 z-30">
    <div class="p-5 overflow-y-auto">
        {{-- Logo / Brand - Using Poppins for friendly brand feel --}}
        <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-2 heading-font text-xl font-bold tracking-tight text-white hover:text-rust transition-colors duration-300 group mb-8">
            <span class="text-rust group-hover:scale-110 transition-transform duration-300">✦</span>
            chronicle
        </a>

        {{-- Primary Navigation - Using Poppins for friendly navigation --}}
        <nav class="space-y-1">
            <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-xl text-sm text-white/60 hover:text-white hover:bg-white/5 transition-all duration-300 {{ request()->routeIs('admin.dashboard') ? 'bg-rust/10 text-rust border border-rust/20' : '' }}">
                <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 00-1-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                </svg>
                <span class="truncate heading-font text-sm font-medium">Dashboard</span>
            </a>

            <a href="{{ route('admin.posts.index') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-xl text-sm text-white/60 hover:text-white hover:bg-white/5 transition-all duration-300 {{ request()->routeIs('admin.posts.*') ? 'bg-rust/10 text-rust border border-rust/20' : '' }}">
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

            {{-- Notifications Section --}}
            <div class="relative mt-2" x-data="{ open: false }">
                <button @click="open = !open" type="button" class="flex items-center gap-3 px-4 py-2.5 rounded-xl text-sm text-white/60 hover:text-white hover:bg-white/5 transition-all duration-300 w-full text-left">
                    <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/>
                    </svg>
                    <span class="truncate heading-font text-sm font-medium">Notifications</span>
                    @if($pendingCount > 0)
                        <span class="ml-auto px-2 py-0.5 bg-rust/20 text-rust text-[10px] heading-font font-semibold rounded-full shrink-0">
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
                     class="absolute left-0 mt-2 w-72 bg-[#121212] border border-white/5 rounded-xl shadow-2xl py-2 z-50">
                    
                    <div class="px-4 py-2 border-b border-white/5 flex justify-between items-center text-xs heading-font font-bold text-white/80">
                        <span>Pending Review Requests</span>
                        <span class="text-rust heading-font font-semibold">{{ $pendingCount }} new</span>
                    </div>

                    <div class="max-h-64 overflow-y-auto divide-y divide-white/5">
                        @forelse($pendingPosts as $pendingPost)
                            <a href="{{ route('admin.posts.edit', $pendingPost) }}" class="block px-4 py-3 hover:bg-white/5 transition-colors">
                                <p class="text-xs heading-font font-semibold text-white truncate">{{ $pendingPost->title }}</p>
                                <p class="text-[11px] text-white/40 mt-1 body-font">
                                    Requested by: <span class="heading-font font-bold text-white/60">{{ $pendingPost->user->name ?? 'Author' }}</span>
                                </p>
                                <span class="text-[10px] text-white/30 block mt-0.5 body-font">{{ $pendingPost->updated_at->diffForHumans() }}</span>
                            </a>
                        @empty
                            <div class="px-4 py-6 text-center text-xs body-font text-white/30">
                                No pending post requests.
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>

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

<style>
    .heading-font {
        font-family: 'Poppins', ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif !important;
        letter-spacing: -0.02em !important;
    }
    .body-font {
        font-family: 'Work Sans', ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif !important;
    }
</style>