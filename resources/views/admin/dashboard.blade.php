@extends('layouts.admin')

@section('title', 'Dashboard · Admin')

@section('content')
<div class="max-w-full space-y-8">
    {{-- Header --}}
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div class="text-center sm:text-left">
            <h1 class="heading-font text-3xl font-bold text-white tracking-tight">Dashboard</h1>
            <p class="text-sm text-white/50 mt-1">Welcome back, <span class="heading-font font-semibold text-rust">{{ auth()->user()->name }}</span>!</p>
            <p class="text-xs text-white/30 mt-0.5">Manage your articles, track submissions, and monitor post statuses seamlessly.</p>
        </div>
        <div class="flex items-center justify-center sm:justify-end gap-3">
            <a href="{{ route('admin.posts.create') }}" class="inline-flex items-center justify-center px-4 py-2.5 bg-rust text-white text-sm heading-font font-semibold rounded-xl hover:bg-rust/80 transition-all duration-300 shadow-lg shadow-rust/20 hover:shadow-rust/40 transform hover:scale-[1.02]">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                </svg>
                Write New Post
            </a>
        </div>
    </div>

    {{-- Stats Grid --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
        {{-- Total Posts --}}
        <div class="bg-[#121212] border border-white/5 rounded-2xl p-6 text-center hover:border-rust/30 transition-all duration-300 hover:-translate-y-1">
            <div class="heading-font text-3xl font-bold text-white">{{ $stats['total_posts'] ?? 0 }}</div>
            <div class="text-xs heading-font font-semibold uppercase tracking-wider text-white/40 mt-1">Total Posts</div>
        </div>

        {{-- Published --}}
        <div class="bg-[#121212] border border-white/5 rounded-2xl p-6 text-center hover:border-rust/30 transition-all duration-300 hover:-translate-y-1">
            <div class="heading-font text-3xl font-bold text-white">{{ $stats['published_posts'] ?? 0 }}</div>
            <div class="text-xs heading-font font-semibold uppercase tracking-wider text-green-400 mt-1">Published</div>
        </div>

        {{-- Pending Review --}}
        <div class="bg-[#121212] border border-white/5 rounded-2xl p-6 text-center hover:border-rust/30 transition-all duration-300 hover:-translate-y-1">
            <div class="heading-font text-3xl font-bold text-rust">{{ $stats['pending_posts'] ?? 0 }}</div>
            <div class="text-xs heading-font font-semibold uppercase tracking-wider text-white/40 mt-1">Pending Review</div>
        </div>

        {{-- Drafts --}}
        <div class="bg-[#121212] border border-white/5 rounded-2xl p-6 text-center hover:border-rust/30 transition-all duration-300 hover:-translate-y-1">
            <div class="heading-font text-3xl font-bold text-white/30">{{ $stats['draft_posts'] ?? 0 }}</div>
            <div class="text-xs heading-font font-semibold uppercase tracking-wider text-white/40 mt-1">Drafts</div>
        </div>
    </div>

    {{-- Recent Activity --}}
    <div class="bg-[#121212] border border-white/5 rounded-2xl p-6 hover:border-rust/30 transition-all duration-300">
        <div class="flex items-center justify-between mb-5">
            <div class="flex items-center gap-2">
                <span class="w-1.5 h-4 bg-rust rounded-full"></span>
                <h2 class="heading-font font-semibold text-sm text-white uppercase tracking-wider">Recent Activity</h2>
            </div>
            <a href="{{ route('admin.posts.index') }}" class="text-xs heading-font font-semibold text-rust hover:text-rust/80 transition-colors flex items-center gap-1 group">
                View all 
                <svg class="w-3 h-3 transition-transform duration-300 group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                </svg>
            </a>
        </div>

        <div class="divide-y divide-white/5">
            @forelse($recent_posts ?? [] as $post)
                <div class="flex items-center justify-between gap-4 py-3.5 first:pt-0 last:pb-0 group hover:bg-white/5 rounded-lg px-2 -mx-2 transition-colors">
                    <div class="min-w-0">
                        <p class="text-sm heading-font font-medium text-white/75 group-hover:text-white truncate">{{ $post->title }}</p>
                        <p class="text-xs text-white/30 mt-0.5">
                            {{ $post->created_at->diffForHumans() }}
                        </p>
                    </div>
                    <div class="flex items-center gap-2 shrink-0">
                        <span class="shrink-0 px-3 py-1 rounded-full text-[10px] heading-font font-semibold uppercase tracking-wider border
                            @if($post->status === 'published') bg-green-500/10 text-green-400 border-green-500/20
                            @elseif($post->status === 'pending') bg-rust/10 text-rust border-rust/20
                            @else bg-white/5 text-white/30 border-white/5 @endif">
                            {{ $post->status ?? 'draft' }}
                        </span>
                    </div>
                </div>
            @empty
                <div class="py-8 text-center">
                    <svg class="w-8 h-8 text-white/10 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/>
                    </svg>
                    <p class="text-sm text-white/20">No posts found.</p>
                </div>
            @endforelse
        </div>
    </div>

    {{-- Quick Actions --}}
    <div class="bg-[#121212] border border-white/5 rounded-2xl p-6 hover:border-rust/30 transition-all duration-300">
        <h2 class="heading-font font-semibold text-base text-white mb-4 text-center sm:text-left">Quick Actions</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-2.5">
            <a href="{{ route('admin.posts.create') }}" class="flex items-center gap-3.5 p-3 rounded-xl hover:bg-rust/5 border border-transparent hover:border-rust/20 transition-all group">
                <div class="p-2 bg-rust/10 text-rust rounded-lg group-hover:bg-rust group-hover:text-white transition-all duration-300 group-hover:scale-110">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                    </svg>
                </div>
                <div>
                    <p class="text-sm heading-font font-medium text-white group-hover:text-rust transition-colors duration-300">Write New Post</p>
                    <p class="text-xs text-white/30">Draft or submit a new article</p>
                </div>
            </a>

            <a href="{{ route('admin.posts.index') }}" class="flex items-center gap-3.5 p-3 rounded-xl hover:bg-rust/5 border border-transparent hover:border-rust/20 transition-all group">
                <div class="p-2 bg-rust/10 text-rust rounded-lg group-hover:bg-rust group-hover:text-white transition-all duration-300 group-hover:scale-110">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/>
                    </svg>
                </div>
                <div>
                    <p class="text-sm heading-font font-medium text-white group-hover:text-rust transition-colors duration-300">View All Posts</p>
                    <p class="text-xs text-white/30">Manage existing content</p>
                </div>
            </a>

            <a href="{{ route('admin.users.edit', auth()->user()) }}" class="flex items-center gap-3.5 p-3 rounded-xl hover:bg-rust/5 border border-transparent hover:border-rust/20 transition-all group">
                <div class="p-2 bg-rust/10 text-rust rounded-lg group-hover:bg-rust group-hover:text-white transition-all duration-300 group-hover:scale-110">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                    </svg>
                </div>
                <div>
                    <p class="text-sm heading-font font-medium text-white group-hover:text-rust transition-colors duration-300">My Profile</p>
                    <p class="text-xs text-white/30">Update your profile and settings</p>
                </div>
            </a>

            <a href="{{ route('posts.index') }}" target="_blank" class="flex items-center gap-3.5 p-3 rounded-xl hover:bg-rust/5 border border-transparent hover:border-rust/20 transition-all group">
                <div class="p-2 bg-rust/10 text-rust rounded-lg group-hover:bg-rust group-hover:text-white transition-all duration-300 group-hover:scale-110">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                    </svg>
                </div>
                <div>
                    <p class="text-sm heading-font font-medium text-white group-hover:text-rust transition-colors duration-300">View Live Site</p>
                    <p class="text-xs text-white/30">Open blog public feed</p>
                </div>
            </a>
        </div>
    </div>

    {{-- Admin Studio --}}
    <div class="bg-[#121212] border border-white/5 rounded-2xl p-6 hover:border-rust/30 transition-all duration-300">
        <div class="flex items-center gap-4 mb-4 justify-center sm:justify-start">
            <div class="p-3 bg-rust/10 rounded-xl">
                <svg class="w-6 h-6 text-rust" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21v-2a4 4 0 00-4-4H9a4 4 0 00-4 4v2M12 11a4 4 0 100-8 4 4 0 000 8z"/>
                </svg>
            </div>
            <div>
                <h2 class="heading-font font-semibold text-lg text-white text-center sm:text-left">Admin Studio</h2>
                <p class="text-xs text-white/30 text-center sm:text-left">Complete control over your chronicle platform</p>
            </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-3">
            <div class="flex items-center gap-3 p-3 rounded-xl bg-white/5 border border-white/5 hover:border-rust/20 transition-all group">
                <div class="w-2 h-2 rounded-full bg-rust"></div>
                <div>
                    <p class="text-xs heading-font font-medium text-white/60">Role</p>
                    <p class="text-sm heading-font font-semibold text-white">Administrator</p>
                </div>
            </div>

            <div class="flex items-center gap-3 p-3 rounded-xl bg-white/5 border border-white/5 hover:border-rust/20 transition-all group">
                <div class="w-2 h-2 rounded-full bg-green-400"></div>
                <div>
                    <p class="text-xs heading-font font-medium text-white/60">Status</p>
                    <p class="text-sm heading-font font-semibold text-white">Active</p>
                </div>
            </div>

            <div class="flex items-center gap-3 p-3 rounded-xl bg-white/5 border border-white/5 hover:border-rust/20 transition-all group">
                <div class="w-2 h-2 rounded-full bg-rust"></div>
                <div>
                    <p class="text-xs heading-font font-medium text-white/60">Posts</p>
                    <p class="text-sm heading-font font-semibold text-white">{{ $stats['total_posts'] ?? 0 }} total</p>
                </div>
            </div>

            <div class="flex items-center gap-3 p-3 rounded-xl bg-white/5 border border-white/5 hover:border-rust/20 transition-all group">
                <div class="w-2 h-2 rounded-full bg-rust"></div>
                <div>
                    <p class="text-xs heading-font font-medium text-white/60">Member Since</p>
                    <p class="text-sm heading-font font-semibold text-white">{{ auth()->user()->created_at->format('M Y') }}</p>
                </div>
            </div>
        </div>

        <div class="mt-4 pt-4 border-t border-white/5 flex flex-wrap items-center justify-center sm:justify-between gap-3">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-full bg-rust/20 flex items-center justify-center text-rust font-bold text-sm heading-font border border-rust/30">
                    {{ strtoupper(substr(auth()->user()->name, 0, 2)) }}
                </div>
                <div>
                    <p class="text-sm heading-font font-semibold text-white">{{ auth()->user()->name }}</p>
                    <p class="text-xs text-white/30">{{ auth()->user()->email }}</p>
                </div>
            </div>
            <div class="flex items-center gap-2">
                <a href="{{ route('admin.users.edit', auth()->user()) }}" class="px-4 py-1.5 text-xs heading-font font-semibold text-rust border border-rust/20 rounded-full hover:bg-rust/10 transition-all">
                    Edit Profile
                </a>
            </div>
        </div>
    </div>
</div>

@push('styles')
<style>
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(6px); }
        to { opacity: 1; transform: translateY(0); }
    }

    .animate-fade-in {
        animation: fadeIn 0.6s ease-out forwards;
    }

    /* Heading font - Poppins */
    .heading-font {
        font-family: 'Poppins', ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif !important;
        letter-spacing: -0.02em !important;
    }

    /* Selection color */
    ::selection {
        background-color: rgba(196, 90, 46, 0.3) !important;
        color: #ffffff !important;
    }

    /* Scrollbar styling */
    ::-webkit-scrollbar {
        width: 6px;
    }
    ::-webkit-scrollbar-track {
        background: #0a0a0a;
    }
    ::-webkit-scrollbar-thumb {
        background: #c45a2e;
        border-radius: 3px;
    }
    ::-webkit-scrollbar-thumb:hover {
        background: #a0461a;
    }
</style>
@endpush
@endsection