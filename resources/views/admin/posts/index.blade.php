@extends('layouts.admin')

@section('title', 'Manage Posts · Admin')

@section('content')
<div class="max-w-7xl mx-auto animate-fade-in">
    {{-- Header --}}
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-8">
        <div class="text-center sm:text-left">
            <h1 class="heading-font text-3xl font-bold text-white tracking-tight">Manage Posts</h1>
            <p class="text-sm text-white/50 mt-1">Create and manage your blog posts</p>
        </div>
        <div class="flex justify-center sm:justify-end">
            <a href="{{ route('admin.posts.create') }}" 
               class="inline-flex items-center gap-2 px-6 py-2.5 bg-rust text-white rounded-xl shadow-lg shadow-rust/20 hover:shadow-rust/40 hover:bg-rust/80 transition-all duration-300 text-sm heading-font font-semibold transform hover:scale-[1.02]">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                </svg>
                New Post
            </a>
        </div>
    </div>

    {{-- Success Message --}}
    @if(session('success'))
        <div class="mb-6 p-4 bg-green-400/5 border border-green-400/20 rounded-2xl text-green-400 text-sm flex items-center gap-3 animate-fade-in">
            <svg class="w-5 h-5 text-green-400 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
            <span>{{ session('success') }}</span>
        </div>
    @endif

    {{-- Search & Filter Section --}}
    <div class="bg-[#121212] border border-white/5 rounded-2xl p-4 md:p-5 mb-6 shadow-xl transition-all duration-300 hover:border-rust/30">
        <form method="GET" action="{{ route('admin.posts.index') }}" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 items-center">
            {{-- Keyword Search --}}
            <div class="relative">
                <input type="text" 
                       name="search" 
                       value="{{ request('search') }}" 
                       placeholder="Search title..." 
                       class="w-full pl-10 pr-4 py-2.5 bg-[#0a0a0a]/80 border border-white/5 rounded-xl text-sm text-white placeholder:text-white/20 focus:outline-none focus:border-rust focus:ring-1 focus:ring-rust/30 transition-all">
                <svg class="w-4 h-4 text-white/20 absolute left-3.5 top-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                </svg>
            </div>

            {{-- Category Filter --}}
            <div>
                <select name="category" class="w-full px-4 py-2.5 bg-[#0a0a0a]/80 border border-white/5 rounded-xl text-sm text-white focus:outline-none focus:border-rust focus:ring-1 focus:ring-rust/30 transition-all appearance-none">
                    <option value="" class="bg-[#121212] text-white/50">All Categories</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }} class="bg-[#121212] text-white">
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- Status Filter --}}
            <div>
                <select name="status" class="w-full px-4 py-2.5 bg-[#0a0a0a]/80 border border-white/5 rounded-xl text-sm text-white focus:outline-none focus:border-rust focus:ring-1 focus:ring-rust/30 transition-all appearance-none">
                    <option value="" class="bg-[#121212] text-white/50">All Statuses</option>
                    <option value="pending" {{ request('status') === 'pending' ? 'selected' : '' }} class="bg-[#121212] text-white">Pending Review</option>
                    <option value="published" {{ request('status') === 'published' ? 'selected' : '' }} class="bg-[#121212] text-white">Published</option>
                    <option value="draft" {{ request('status') === 'draft' ? 'selected' : '' }} class="bg-[#121212] text-white">Draft</option>
                </select>
            </div>

            {{-- Action Buttons --}}
            <div class="flex items-center gap-2">
                <button type="submit" class="flex-1 px-4 py-2.5 bg-rust text-white heading-font font-semibold rounded-xl text-sm hover:bg-rust/80 transition-all duration-300 shadow-lg shadow-rust/20 hover:shadow-rust/40 transform hover:scale-[1.02]">
                    Filter
                </button>
                @if(request()->hasAny(['search', 'category', 'status']))
                    <a href="{{ route('admin.posts.index') }}" class="px-4 py-2.5 bg-white/5 text-white/40 hover:text-white border border-white/5 rounded-xl text-sm heading-font font-medium transition-all duration-300 hover:border-rust/30">
                        Reset
                    </a>
                @endif
            </div>
        </form>
    </div>

    {{-- Posts Table Card --}}
    <div class="bg-[#121212] border border-white/5 rounded-2xl shadow-xl overflow-hidden transition-all duration-300 hover:border-rust/30">
        <div class="overflow-x-auto">
            <table class="admin-table w-full text-left">
                <thead class="bg-[#0a0a0a]/80 border-b border-white/5 text-white/40 uppercase text-xs heading-font font-semibold tracking-wider">
                    <tr>
                        <th class="px-6 py-4">Image</th>
                        <th class="px-6 py-4">Title</th>
                        <th class="px-6 py-4">Author</th>
                        <th class="px-6 py-4">Category</th>
                        <th class="px-6 py-4">Status</th>
                        <th class="px-6 py-4">Published</th>
                        <th class="px-6 py-4 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-white/5 text-sm">
                    @forelse ($posts as $post)
                        <tr class="hover:bg-rust/5 transition-colors duration-300 group">
                            {{-- Image --}}
                            <td class="px-6 py-4">
                                @php
                                    $imageUrl = $post->featured_image ?? null;
                                @endphp
                                @if($imageUrl)
                                    <img src="{{ asset('storage/' . $imageUrl) }}" 
                                         alt="{{ $post->title }}" 
                                         class="w-12 h-12 rounded-xl object-cover border border-white/5 shadow-sm transform transition-transform duration-300 group-hover:scale-105">
                                @else
                                    <div class="w-12 h-12 rounded-xl bg-[#0a0a0a] flex items-center justify-center border border-white/5">
                                        <span class="text-[10px] uppercase heading-font font-bold text-white/20 tracking-wider">No img</span>
                                    </div>
                                @endif
                            </td>
                            
                            {{-- Title --}}
                            <td class="px-6 py-4">
                                <a href="{{ route('posts.show', $post) }}" target="_blank" class="heading-font font-semibold text-white hover:text-rust transition-colors tracking-tight text-sm line-clamp-1">
                                    {{ $post->title }}
                                </a>
                            </td>
                            
                            {{-- Author --}}
                            <td class="px-6 py-4 text-white/50 text-xs">
                                {{ $post->user->name ?? 'Admin' }}
                            </td>
                            
                            {{-- Category --}}
                            <td class="px-6 py-4">
                                <span class="inline-flex items-center px-2.5 py-1 bg-white/5 border border-white/5 rounded-lg text-xs heading-font font-medium text-rust">
                                    {{ $post->category->name ?? 'Uncategorized' }}
                                </span>
                            </td>
                            
                            {{-- Status --}}
                            <td class="px-6 py-4">
                                @php
                                    $status = $post->status ?? ($post->is_published ? 'published' : 'draft');
                                @endphp
                                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs heading-font font-semibold uppercase tracking-wider border
                                    @if($status === 'pending') bg-rust/10 text-rust border-rust/20
                                    @elseif($status === 'published' || $post->is_published) bg-green-500/10 text-green-400 border-green-500/20
                                    @else bg-white/5 text-white/30 border-white/5 @endif">
                                    <span class="w-1.5 h-1.5 rounded-full
                                        @if($status === 'pending') bg-rust
                                        @elseif($status === 'published' || $post->is_published) bg-green-400
                                        @else bg-white/30 @endif">
                                    </span>
                                    {{ $status === 'pending' ? 'Pending' : ($status === 'published' ? 'Published' : 'Draft') }}
                                </span>
                            </td>
                            
                            {{-- Published Date --}}
                            <td class="px-6 py-4 text-white/30 text-xs">
                                @if($post->published_at)
                                    {{ $post->published_at->format('M j, Y') }}
                                @else
                                    —
                                @endif
                            </td>
                            
                            {{-- Actions --}}
                            <td class="px-6 py-4">
                                <div class="flex items-center justify-end gap-1">
                                    <a href="{{ route('posts.show', $post) }}" target="_blank" class="p-2 text-white/30 hover:text-white hover:bg-white/5 rounded-xl transition-all duration-300" title="View">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                        </svg>
                                    </a>
                                    <a href="{{ route('admin.posts.edit', $post) }}" class="p-2 text-white/30 hover:text-rust hover:bg-white/5 rounded-xl transition-all duration-300" title="Edit">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                        </svg>
                                    </a>
                                    <form action="{{ route('admin.posts.toggle-publish', $post) }}" method="POST" class="inline">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="p-2 text-white/30 hover:text-rust hover:bg-white/5 rounded-xl transition-all duration-300" title="{{ $post->is_published ? 'Unpublish' : 'Publish' }}">
                                            @if($post->is_published)
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                                </svg>
                                            @else
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                                                </svg>
                                            @endif
                                        </button>
                                    </form>
                                    <form action="{{ route('admin.posts.destroy', $post) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this post?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="p-2 text-white/30 hover:text-red-400 hover:bg-red-500/10 rounded-xl transition-all duration-300" title="Delete">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="px-6 py-16 text-center text-white/40">
                                <div class="text-4xl mb-3 opacity-60">📝</div>
                                <p class="heading-font font-semibold text-white text-base">No posts found</p>
                                <p class="text-xs text-white/30 mt-1">Try adjusting your filters or create a new post.</p>
                                <a href="{{ route('admin.posts.create') }}" class="inline-block mt-4 px-6 py-2.5 bg-rust text-white rounded-xl text-xs heading-font font-semibold shadow-lg shadow-rust/20 hover:shadow-rust/40 hover:bg-rust/80 transition-all duration-300 transform hover:scale-[1.02]">
                                    Create Post
                                </a>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- Pagination --}}
        @if($posts->hasPages())
            <div class="px-6 py-4 border-t border-white/5 bg-[#0a0a0a]/30">
                {{ $posts->withQueryString()->links() }}
            </div>
        @endif
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

    /* Table styles */
    .admin-table {
        width: 100%;
        font-size: 0.875rem;
    }
    .admin-table thead th {
        padding: 0.75rem 1.5rem;
        text-align: left;
        font-weight: 600;
        color: rgba(255, 255, 255, 0.4);
        font-family: 'Poppins', sans-serif;
        font-size: 0.65rem;
        text-transform: uppercase;
        letter-spacing: 0.05em;
    }
    .admin-table tbody td {
        padding: 0.75rem 1.5rem;
        color: rgba(255, 255, 255, 0.6);
    }

    /* Line clamp */
    .line-clamp-1 {
        display: -webkit-box;
        -webkit-line-clamp: 1;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    /* Select dropdown arrow */
    select {
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke='rgba(255,255,255,0.3)'%3E%3Cpath stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M19 9l-7 7-7-7'%3E%3C/path%3E%3C/svg%3E");
        background-repeat: no-repeat;
        background-position: right 1rem center;
        background-size: 1rem;
        padding-right: 2.5rem;
    }
</style>
@endpush
@endsection