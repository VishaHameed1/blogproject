@extends('layouts.admin')

@section('title', 'Manage Posts · Admin')

@section('content')
<div class="max-w-7xl mx-auto animate-fade-in">
    {{-- Header --}}
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-8">
        <div>
            <h1 class="heading-font text-3xl font-bold text-[var(--color-text-primary)] tracking-tight">Manage Posts</h1>
            <p class="text-sm text-[var(--color-text-secondary)] mt-1">Create and manage your blog posts</p>
        </div>
        <div class="flex justify-center sm:justify-end">
            <a href="{{ route('admin.posts.create') }}"
                class="inline-flex items-center gap-2 px-6 py-2.5 bg-[var(--color-primary)] text-white rounded-xl shadow-lg shadow-[var(--color-primary)]/20 hover:shadow-[var(--color-primary)]/40 hover:bg-[var(--color-primary-hover)] transition-all duration-300 text-sm heading-font font-semibold transform hover:scale-[1.02]">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                New Post
            </a>
        </div>
    </div>

    {{-- Success Message --}}
    @if(session('success'))
    <div class="mb-6 p-4 bg-green-100 dark:bg-green-500/10 border border-green-200 dark:border-green-500/20 rounded-2xl text-green-700 dark:text-green-300 text-sm flex items-center gap-3 animate-fade-in">
        <svg class="w-5 h-5 text-green-600 dark:text-green-400 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
        <span>{{ session('success') }}</span>
    </div>
    @endif

    {{-- Search & Filter Section --}}
    <div class="bg-[var(--color-bg-card)] border border-[var(--color-border)] rounded-2xl p-4 md:p-5 mb-6 shadow-sm transition-all duration-300 hover:shadow-md">
        <form method="GET" action="{{ route('admin.posts.index') }}" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 items-center">
            {{-- Keyword Search --}}
            <div class="relative">
                <input type="text"
                    name="search"
                    value="{{ request('search') }}"
                    placeholder="Search title..."
                    class="w-full pl-10 pr-4 py-2.5 bg-[var(--color-bg)] border border-[var(--color-border)] rounded-xl text-sm text-[var(--color-text-primary)] placeholder:text-[var(--color-text-muted)] focus:outline-none focus:border-[var(--color-primary)] focus:ring-2 focus:ring-[var(--color-primary)]/20 transition-all">
                <svg class="w-4 h-4 text-[var(--color-text-muted)] absolute left-3.5 top-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
            </div>

            {{-- Category Filter --}}
            <div>
                <select name="category" class="w-full px-4 py-2.5 bg-[var(--color-bg)] border border-[var(--color-border)] rounded-xl text-sm text-[var(--color-text-primary)] focus:outline-none focus:border-[var(--color-primary)] focus:ring-2 focus:ring-[var(--color-primary)]/20 transition-all appearance-none">
                    <option value="" class="bg-[var(--color-bg-card)] text-[var(--color-text-secondary)]">All Categories</option>
                    @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }} class="bg-[var(--color-bg-card)] text-[var(--color-text-primary)]">
                        {{ $category->name }}
                    </option>
                    @endforeach
                </select>
            </div>

            {{-- Status Filter --}}
            <div>
                <select name="status" class="w-full px-4 py-2.5 bg-[var(--color-bg)] border border-[var(--color-border)] rounded-xl text-sm text-[var(--color-text-primary)] focus:outline-none focus:border-[var(--color-primary)] focus:ring-2 focus:ring-[var(--color-primary)]/20 transition-all appearance-none">
                    <option value="" class="bg-[var(--color-bg-card)] text-[var(--color-text-secondary)]">All Statuses</option>
                    <option value="pending" {{ request('status') === 'pending' ? 'selected' : '' }} class="bg-[var(--color-bg-card)] text-[var(--color-text-primary)]">Pending Review</option>
                    <option value="published" {{ request('status') === 'published' ? 'selected' : '' }} class="bg-[var(--color-bg-card)] text-[var(--color-text-primary)]">Published</option>
                    <option value="draft" {{ request('status') === 'draft' ? 'selected' : '' }} class="bg-[var(--color-bg-card)] text-[var(--color-text-primary)]">Draft</option>
                </select>
            </div>

            {{-- Action Buttons --}}
            <div class="flex items-center gap-2">
                <button type="submit" class="flex-1 px-4 py-2.5 bg-[var(--color-primary)] text-white heading-font font-semibold rounded-xl text-sm hover:bg-[var(--color-primary-hover)] transition-all duration-300 shadow-lg shadow-[var(--color-primary)]/20 transform hover:scale-[1.02]">
                    Filter
                </button>
                @if(request()->hasAny(['search', 'category', 'status']))
                <a href="{{ route('admin.posts.index') }}" class="px-4 py-2.5 bg-[var(--color-bg)] text-[var(--color-text-secondary)] hover:text-[var(--color-text-primary)] border border-[var(--color-border)] rounded-xl text-sm heading-font font-medium transition-all duration-300">
                    Reset
                </a>
                @endif
            </div>
        </form>
    </div>

    {{-- Posts Table Card --}}
    <div class="bg-[var(--color-bg-card)] border border-[var(--color-border)] rounded-2xl shadow-sm hover:shadow-md transition-all duration-300 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="admin-table w-full text-left">
                <thead class="bg-[var(--color-bg)] border-b border-[var(--color-border)] text-[var(--color-text-muted)] uppercase text-xs heading-font font-semibold tracking-wider">
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
                <tbody class="divide-y divide-[var(--color-border)] text-sm">
                    @forelse ($posts as $post)
                    <tr class="hover:bg-[var(--color-primary-soft)] transition-colors duration-300 group">
                        {{-- Image --}}
                        <td class="px-6 py-4">
                            @php
                            $imagePath = $post->featured_image_path ?? $post->featured_image ?? null;
                            $imageExists = $imagePath && Storage::disk('public')->exists($imagePath);
                            @endphp
                            @if($imageExists)
                            <img src="{{ asset('storage/' . $imagePath) }}"
                                alt="{{ $post->title }}"
                                class="w-12 h-12 rounded-xl object-cover border border-[var(--color-border)] shadow-sm transform transition-transform duration-300 group-hover:scale-105">
                            @elseif($post->featured_image && filter_var($post->featured_image, FILTER_VALIDATE_URL))
                            <img src="{{ $post->featured_image }}"
                                alt="{{ $post->title }}"
                                class="w-12 h-12 rounded-xl object-cover border border-[var(--color-border)] shadow-sm transform transition-transform duration-300 group-hover:scale-105">
                            @else
                            <div class="w-12 h-12 rounded-xl bg-[var(--color-bg)] flex items-center justify-center border border-[var(--color-border)]">
                                <span class="text-[10px] uppercase heading-font font-bold text-[var(--color-text-muted)] tracking-wider">No img</span>
                            </div>
                            @endif
                        </td>

                        {{-- Title --}}
                        <td class="px-6 py-4">
                            <a href="{{ route('posts.show', $post) }}" target="_blank" class="heading-font font-semibold text-[var(--color-text-primary)] hover:text-[var(--color-primary)] transition-colors tracking-tight text-sm line-clamp-1">
                                {{ $post->title }}
                            </a>
                        </td>

                        {{-- Author --}}
                        <td class="px-6 py-4 text-[var(--color-text-secondary)] text-xs font-medium">
                            {{ $post->author->name ?? $post->user->name ?? 'Admin' }}
                        </td>

                        {{-- Category --}}
                        <td class="px-6 py-4">
                            <span class="inline-flex items-center px-3 py-1 bg-[var(--color-primary-soft)] border border-[var(--color-primary-soft)] rounded-lg text-xs heading-font font-semibold text-[var(--color-primary)] shadow-sm">
                                {{ $post->category->name ?? 'Uncategorized' }}
                            </span>
                        </td>

                        {{-- Status --}}
                        <td class="px-6 py-4">
                            @php
                            $status = $post->status ?? ($post->published_at ? 'published' : 'draft');
                            if ($post->published_at && $post->published_at > now()) {
                            $status = 'scheduled';
                            }
                            @endphp
                            <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs heading-font font-semibold uppercase tracking-wider border
                                @if($status === 'pending') bg-[var(--color-primary-soft)] text-[var(--color-primary)] border-[var(--color-primary-soft)]
                                @elseif($status === 'published') bg-green-100 text-green-800 border-green-300 dark:bg-green-900/60 dark:text-green-200 dark:border-green-700
                                @elseif($status === 'scheduled') bg-yellow-100 text-yellow-800 border-yellow-300 dark:bg-yellow-900/60 dark:text-yellow-200 dark:border-yellow-700
                                @else bg-[var(--color-bg)] text-[var(--color-text-muted)] border-[var(--color-border)] @endif">
                                <span class="w-1.5 h-1.5 rounded-full
                                    @if($status === 'pending') bg-[var(--color-primary)]
                                    @elseif($status === 'published') bg-green-600 dark:bg-green-400
                                    @elseif($status === 'scheduled') bg-yellow-600 dark:bg-yellow-400
                                    @else bg-[var(--color-text-muted)] @endif">
                                </span>
                                {{ $status === 'scheduled' ? 'Scheduled' : ucfirst($status) }}
                            </span>
                        </td>

                        {{-- Published Date --}}
                        <td class="px-6 py-4 text-[var(--color-text-secondary)] text-xs font-medium">
                            @if($post->published_at)
                            {{ $post->published_at->format('M j, Y') }}
                            @else
                            —
                            @endif
                        </td>

                        {{-- Actions --}}
                        <td class="px-6 py-4">
                            <div class="flex items-center justify-end gap-1">
                                <a href="{{ route('posts.show', $post) }}" target="_blank" class="p-2 text-[var(--color-text-muted)] hover:text-[var(--color-primary)] hover:bg-[var(--color-primary-soft)] rounded-xl transition-all duration-300" title="View">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    </svg>
                                </a>
                                <a href="{{ route('admin.posts.edit', $post) }}" class="p-2 text-[var(--color-text-muted)] hover:text-[var(--color-primary)] hover:bg-[var(--color-primary-soft)] rounded-xl transition-all duration-300" title="Edit">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                    </svg>
                                </a>
                                <form action="{{ route('admin.posts.toggle-publish', $post) }}" method="POST" class="inline">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="p-2 text-[var(--color-text-muted)] hover:text-[var(--color-primary)] hover:bg-[var(--color-primary-soft)] rounded-xl transition-all duration-300" title="{{ $post->published_at && $post->published_at <= now() ? 'Unpublish' : 'Publish' }}">
                                        @if($post->published_at && $post->published_at <= now())
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                            </svg>
                                            @else
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                            </svg>
                                            @endif
                                    </button>
                                </form>
                                <form action="{{ route('admin.posts.destroy', $post) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this post?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="p-2 text-[var(--color-text-muted)] hover:text-red-600 dark:hover:text-red-400 hover:bg-red-50/50 dark:hover:bg-red-500/10 rounded-xl transition-all duration-300" title="Delete">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="px-6 py-16 text-center text-[var(--color-text-secondary)]">
                            <div class="text-4xl mb-3 opacity-80">📝</div>
                            <p class="heading-font font-semibold text-[var(--color-text-primary)] text-base">No posts found</p>
                            <p class="text-xs text-[var(--color-text-muted)] mt-1">Try adjusting your filters or create a new post.</p>
                            <a href="{{ route('admin.posts.create') }}" class="inline-block mt-4 px-6 py-2.5 bg-[var(--color-primary)] text-white rounded-xl text-xs heading-font font-semibold shadow-lg shadow-[var(--color-primary)]/20 hover:bg-[var(--color-primary-hover)] transition-all duration-300 transform hover:scale-[1.02]">
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
        <div class="px-6 py-4 border-t border-[var(--color-border)] bg-[var(--color-bg)]">
            {{ $posts->withQueryString()->links() }}
        </div>
        @endif
    </div>
</div>

@push('styles')
<style>
    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(6px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .animate-fade-in {
        animation: fadeIn 0.6s ease-out forwards;
    }

    .heading-font {
        font-family: 'Poppins', ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif !important;
        letter-spacing: -0.02em !important;
    }

    ::selection {
        background-color: var(--color-primary-soft) !important;
        color: #ffffff !important;
    }

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

    .admin-table {
        width: 100%;
        font-size: 0.875rem;
    }

    .admin-table tbody td {
        padding: 0.75rem 1.5rem;
        color: var(--color-text-secondary);
    }

    .line-clamp-1 {
        display: -webkit-box;
        -webkit-line-clamp: 1;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    select {
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke='%236B7280'%3E%3Cpath stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M19 9l-7 7-7-7'%3E%3C/path%3E%3C/svg%3E");
        background-repeat: no-repeat;
        background-position: right 1rem center;
        background-size: 1rem;
        padding-right: 2.5rem;
    }

    [data-theme="dark"] select {
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke='%23A0A0A0'%3E%3Cpath stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M19 9l-7 7-7-7'%3E%3C/path%3E%3C/svg%3E");
    }

    /* Dark mode specific overrides */
    [data-theme="dark"] .bg-green-100 {
        background-color: rgba(52, 211, 153, 0.10) !important;
    }

    [data-theme="dark"] .text-green-800 {
        color: #34D399 !important;
    }

    [data-theme="dark"] .border-green-300 {
        border-color: rgba(52, 211, 153, 0.20) !important;
    }

    [data-theme="dark"] .bg-yellow-100 {
        background-color: rgba(251, 191, 36, 0.10) !important;
    }

    [data-theme="dark"] .text-yellow-800 {
        color: #FBBF24 !important;
    }

    [data-theme="dark"] .border-yellow-300 {
        border-color: rgba(251, 191, 36, 0.20) !important;
    }
</style>
@endpush
@endsection