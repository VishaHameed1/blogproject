@extends('layouts.admin')

@section('title', 'Dashboard · Admin')

@section('content')

<div class="max-w-full space-y-8">

    {{-- =========================================================
        DASHBOARD HEADER WITH NOTIFICATIONS
    ========================================================== --}}
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">

        <div class="min-w-0">
            <h1 class="heading-font text-3xl font-bold text-[var(--color-text-primary)] tracking-tight">
                Dashboard
            </h1>

            <p class="body-font text-sm text-[var(--color-text-secondary)] mt-1">
                Welcome back,
                <span class="heading-font font-semibold text-[var(--color-primary)]">
                    {{ auth()->user()->name }}
                </span>
                !
            </p>

            <p class="body-font text-xs text-[var(--color-text-muted)] mt-0.5">
                Manage your articles, track submissions, and monitor post statuses seamlessly.
            </p>
        </div>

        <div class="flex items-center gap-3 shrink-0">
            {{-- Notification Bell with Badge --}}
            <div class="relative">
                <button class="p-2.5 rounded-xl bg-[var(--color-bg-card)] border border-[var(--color-border)] hover:border-[var(--color-primary)] transition-all duration-300 hover:shadow-lg hover:shadow-[var(--color-primary)]/10 relative">
                    <svg class="w-5 h-5 text-[var(--color-text-secondary)]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                    </svg>
                    @php
                    $pendingCount = $stats['pending_posts'] ?? 0;
                    @endphp
                    @if($pendingCount > 0)
                    <span class="absolute -top-1 -right-1 flex items-center justify-center w-5 h-5 text-[10px] font-bold text-white bg-red-500 rounded-full shadow-lg shadow-red-500/30 animate-pulse">
                        {{ $pendingCount }}
                    </span>
                    @endif
                </button>
            </div>

            <a
                href="{{ route('admin.posts.create') }}"
                class="inline-flex items-center justify-center shrink-0 px-4 py-2.5
                       bg-[var(--color-primary)]
                       text-white text-sm heading-font font-semibold
                       rounded-xl
                       hover:bg-[var(--color-primary-hover)]
                       transition-all duration-300
                       shadow-lg shadow-[var(--color-primary)]/20
                       hover:shadow-[var(--color-primary)]/40
                       hover:scale-[1.02]">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                Write New Post
            </a>
        </div>
    </div>


    {{-- =========================================================
        STATISTICS CARDS WITH ICONS
    ========================================================== --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">

        {{-- Total Posts --}}
        <div class="stat-card">
            <div class="flex items-center justify-between mb-2">
                <div class="stat-icon bg-blue-500/10 text-blue-500">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                    </svg>
                </div>
                <span class="text-xs font-medium text-[var(--color-text-muted)]">Posts</span>
            </div>
            <div class="stat-value text-[var(--color-text-primary)]">
                {{ $stats['total_posts'] ?? 0 }}
            </div>
            <div class="stat-label text-[var(--color-text-muted)]">Total Posts</div>
            <div class="stat-meta text-[var(--color-text-muted)]">
                @php
                $change = $dashboardStats['posts_change'] ?? 0;
                $arrow = $change >= 0 ? '↑' : '↓';
                $color = $change >= 0 ? 'text-green-500 dark:text-green-400' : 'text-red-500 dark:text-red-400';
                @endphp
                <span class="{{ $color }}">{{ $arrow }} {{ abs($change) }}%</span>
                <span>from last month</span>
            </div>
        </div>

        {{-- Published --}}
        <div class="stat-card">
            <div class="flex items-center justify-between mb-2">
                <div class="stat-icon bg-green-500/10 text-green-500">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <span class="text-xs font-medium text-[var(--color-text-muted)]">Published</span>
            </div>
            <div class="stat-value text-green-600 dark:text-green-400">
                {{ $stats['published_posts'] ?? 0 }}
            </div>
            <div class="stat-label text-[var(--color-text-muted)]">Published</div>
            <div class="stat-meta text-[var(--color-text-muted)]">
                @php
                $publishedChange = $dashboardStats['published_change'] ?? 0;
                $publishedArrow = $publishedChange >= 0 ? '↑' : '↓';
                $publishedColor = $publishedChange >= 0 ? 'text-green-500 dark:text-green-400' : 'text-red-500 dark:text-red-400';
                @endphp
                <span class="{{ $publishedColor }}">{{ $publishedArrow }} {{ abs($publishedChange) }}%</span>
                <span>this month</span>
            </div>
        </div>

        {{-- Pending Review --}}
        <div class="stat-card">
            <div class="flex items-center justify-between mb-2">
                <div class="stat-icon bg-yellow-500/10 text-yellow-500">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <span class="text-xs font-medium text-[var(--color-text-muted)]">Pending</span>
            </div>
            <div class="stat-value text-[var(--color-primary)]">
                {{ $stats['pending_posts'] ?? 0 }}
            </div>
            <div class="stat-label text-[var(--color-text-muted)]">Pending Review</div>
            <div class="stat-meta text-[var(--color-text-muted)]">
                @php
                $pendingChange = $dashboardStats['pending_change'] ?? 0;
                $pendingArrow = $pendingChange >= 0 ? '↑' : '↓';
                $pendingColor = $pendingChange >= 0 ? 'text-yellow-500 dark:text-yellow-400' : 'text-green-500 dark:text-green-400';
                @endphp
                <span class="{{ $pendingColor }}">{{ $pendingArrow }} {{ abs($pendingChange) }}%</span>
                <span>needs attention</span>
            </div>
        </div>

        {{-- Total Views --}}
        <div class="stat-card">
            <div class="flex items-center justify-between mb-2">
                <div class="stat-icon bg-purple-500/10 text-purple-500">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                    </svg>
                </div>
                <span class="text-xs font-medium text-[var(--color-text-muted)]">Views</span>
            </div>
            <div class="stat-value text-[var(--color-text-primary)]">
                {{ number_format($stats['total_views'] ?? 0) }}
            </div>
            <div class="stat-label text-[var(--color-text-muted)]">Total Views</div>
            <div class="stat-meta text-[var(--color-text-muted)]">
                @php
                $viewsChange = $dashboardStats['views_change'] ?? 0;
                $viewsArrow = $viewsChange >= 0 ? '↑' : '↓';
                $viewsColor = $viewsChange >= 0 ? 'text-green-500 dark:text-green-400' : 'text-red-500 dark:text-red-400';
                @endphp
                <span class="{{ $viewsColor }}">{{ $viewsArrow }} {{ abs($viewsChange) }}%</span>
                <span>vs last month</span>
            </div>
        </div>

    </div>


    {{-- =========================================================
        TOP PERFORMING POSTS (Full width)
    ========================================================== --}}
    <div class="dashboard-card">
        <div class="flex items-center justify-between mb-4">
            <div class="flex items-center gap-2">
                <div class="p-2 bg-amber-500/10 rounded-lg text-amber-500">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                    </svg>
                </div>
                <div>
                    <h2 class="section-title text-[var(--color-text-primary)]">Top Performing Posts</h2>
                    <p class="body-font text-xs text-[var(--color-text-muted)]">By page views</p>
                </div>
            </div>
            <a href="{{ route('admin.posts.index') }}" class="dashboard-link text-[var(--color-primary)] hover:text-[var(--color-primary-hover)] group">
                View all
                <svg class="w-3 h-3 transition-transform duration-300 group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </a>
        </div>

        <div class="space-y-2">
            @php
            $topPosts = $topPostLabels ?? [];
            $topViews = $topPostViews ?? [];
            @endphp
            @if(count($topPosts) > 0)
            @foreach($topPosts as $index => $title)
            <div class="flex items-center justify-between py-2 px-2 rounded-lg hover:bg-[var(--color-bg)] transition-colors border-b border-[var(--color-border)] last:border-0">
                <div class="flex items-center gap-2 min-w-0">
                    <span class="text-xs font-bold text-[var(--color-text-muted)] w-5">#{{ $index + 1 }}</span>
                    <span class="body-font text-sm text-[var(--color-text-primary)] truncate">
                        {{ $title }}
                    </span>
                </div>
                <span class="heading-font font-semibold text-sm text-[var(--color-text-secondary)] flex items-center gap-1">
                    <svg class="w-3.5 h-3.5 text-[var(--color-text-muted)]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                    </svg>
                    {{ number_format($topViews[$index] ?? 0) }}
                </span>
            </div>
            @endforeach
            @else
            <p class="body-font text-sm text-[var(--color-text-muted)] text-center py-4">
                No posts data available yet.
            </p>
            @endif
        </div>
    </div>


    {{-- =========================================================
        QUICK ACTIONS WITH ICONS
    ========================================================== --}}
    <div class="dashboard-card">
        <div class="flex items-center gap-2 mb-4">
            <div class="p-2 bg-indigo-500/10 rounded-lg text-indigo-500">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                </svg>
            </div>
            <h2 class="heading-font font-semibold text-base text-[var(--color-text-primary)]">
                Quick Actions
            </h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-2.5">

            {{-- Write New Post --}}
            <a href="{{ route('admin.posts.create') }}" class="quick-action">
                <div class="quick-action-icon">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                </div>
                <div>
                    <p class="quick-action-title text-[var(--color-text-primary)] group-hover:text-[var(--color-primary)]">Write New Post</p>
                    <p class="quick-action-description text-[var(--color-text-muted)]">Draft or submit a new article</p>
                </div>
            </a>

            {{-- View All Posts --}}
            <a href="{{ route('admin.posts.index') }}" class="quick-action">
                <div class="quick-action-icon">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                    </svg>
                </div>
                <div>
                    <p class="quick-action-title text-[var(--color-text-primary)] group-hover:text-[var(--color-primary)]">View All Posts</p>
                    <p class="quick-action-description text-[var(--color-text-muted)]">Manage existing content</p>
                </div>
            </a>

            {{-- Categories --}}
            <a href="{{ route('admin.categories.index') }}" class="quick-action">
                <div class="quick-action-icon">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z" />
                    </svg>
                </div>
                <div>
                    <p class="quick-action-title text-[var(--color-text-primary)] group-hover:text-[var(--color-primary)]">Manage Categories</p>
                    <p class="quick-action-description text-[var(--color-text-muted)]">Organize content by topics</p>
                </div>
            </a>

            {{-- View Live Site --}}
            <a href="{{ route('posts.index') }}" target="_blank" rel="noopener noreferrer" class="quick-action">
                <div class="quick-action-icon">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                    </svg>
                </div>
                <div>
                    <p class="quick-action-title text-[var(--color-text-primary)] group-hover:text-[var(--color-primary)]">View Live Site</p>
                    <p class="quick-action-description text-[var(--color-text-muted)]">Open blog public feed</p>
                </div>
            </a>

        </div>
    </div>


    {{-- =========================================================
        ADMIN STUDIO WITH ICONS
    ========================================================== --}}
    <div class="dashboard-card">
        <div class="flex items-center gap-4 mb-4">
            <div class="p-3 bg-[var(--color-primary)]/10 rounded-xl shrink-0">
                <svg class="w-6 h-6 text-[var(--color-primary)]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21v-2a4 4 0 00-4-4H9a4 4 0 00-4 4v2M12 11a4 4 0 100-8 4 4 0 000 8z" />
                </svg>
            </div>
            <div>
                <h2 class="heading-font font-semibold text-lg text-[var(--color-text-primary)]">
                    Admin Studio
                </h2>
                <p class="body-font text-xs text-[var(--color-text-muted)]">
                    Complete control over your chronicle platform
                </p>
            </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-3">
            <div class="studio-item">
                <div class="p-2 bg-blue-500/10 rounded-lg text-blue-500">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                </div>
                <div>
                    <p class="studio-label text-[var(--color-text-muted)]">Role</p>
                    <p class="studio-value text-[var(--color-text-primary)]">Administrator</p>
                </div>
            </div>
            <div class="studio-item">
                <div class="p-2 bg-green-500/10 rounded-lg text-green-500">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <div>
                    <p class="studio-label text-[var(--color-text-muted)]">Status</p>
                    <p class="studio-value text-[var(--color-text-primary)]">Active</p>
                </div>
            </div>
            <div class="studio-item">
                <div class="p-2 bg-purple-500/10 rounded-lg text-purple-500">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                    </svg>
                </div>
                <div>
                    <p class="studio-label text-[var(--color-text-muted)]">Posts</p>
                    <p class="studio-value text-[var(--color-text-primary)]">{{ $stats['total_posts'] ?? 0 }} total</p>
                </div>
            </div>
            <div class="studio-item">
                <div class="p-2 bg-amber-500/10 rounded-lg text-amber-500">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                </div>
                <div>
                    <p class="studio-label text-[var(--color-text-muted)]">Member Since</p>
                    <p class="studio-value text-[var(--color-text-primary)]">{{ auth()->user()->created_at?->format('M Y') ?? '—' }}</p>
                </div>
            </div>
        </div>

        {{-- User information --}}
        <div class="mt-4 pt-4 border-t border-[var(--color-border)] flex flex-wrap items-center justify-between gap-3">
            <div class="flex items-center gap-3 min-w-0">
                <div class="w-10 h-10 rounded-full bg-[var(--color-primary)]/10 flex items-center justify-center text-[var(--color-primary)] font-bold text-sm heading-font border border-[var(--color-primary)]/20 shrink-0">
                    {{ strtoupper(substr(auth()->user()->name, 0, 2)) }}
                </div>
                <div class="min-w-0">
                    <p class="text-sm heading-font font-semibold text-[var(--color-text-primary)] truncate">
                        {{ auth()->user()->name }}
                    </p>
                    <p class="body-font text-xs text-[var(--color-text-muted)] truncate">
                        {{ auth()->user()->email }}
                    </p>
                </div>
            </div>
            <a href="{{ route('admin.users.edit', auth()->user()) }}" class="px-4 py-1.5 text-xs heading-font font-semibold text-[var(--color-primary)] border border-[var(--color-primary)]/20 rounded-full hover:bg-[var(--color-primary)]/10 transition-all flex items-center gap-1.5">
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                </svg>
                Edit Profile
            </a>
        </div>
    </div>

</div>


{{-- =============================================================
    STYLES
============================================================= --}}
@push('styles')

<style>
    /* ==========================================================
       STAT CARDS
    ========================================================== */
    .stat-card {
        background: var(--color-bg-card);
        border: 1px solid var(--color-border);
        border-radius: 1rem;
        padding: 1.25rem;
        transition: all 0.3s ease;
    }

    .stat-card:hover {
        border-color: var(--color-primary);
        transform: translateY(-2px);
        box-shadow: 0 8px 30px var(--color-shadow);
    }

    .stat-icon {
        padding: 0.5rem;
        border-radius: 0.5rem;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .stat-value {
        font-family: 'Poppins', sans-serif;
        font-size: 1.875rem;
        line-height: 2.25rem;
        font-weight: 700;
    }

    .stat-label {
        margin-top: 0.25rem;
        font-family: 'Poppins', sans-serif;
        font-size: 0.75rem;
        line-height: 1rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.05em;
    }

    .stat-meta {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.25rem;
        margin-top: 0.5rem;
        font-family: 'Work Sans', sans-serif;
        font-size: 0.75rem;
        line-height: 1rem;
    }

    .stat-small {
        display: block;
        margin-top: 0.125rem;
        font-family: 'Poppins', sans-serif;
        font-size: 0.875rem;
        line-height: 1.25rem;
        font-weight: 600;
    }


    /* ==========================================================
       DASHBOARD CARDS
    ========================================================== */
    .dashboard-card {
        background: var(--color-bg-card);
        border: 1px solid var(--color-border);
        border-radius: 1rem;
        padding: 1.5rem;
        transition: all 0.3s ease;
        box-shadow: 0 1px 2px var(--color-shadow);
    }

    .dashboard-card:hover {
        border-color: var(--color-primary);
        transform: translateY(-1px);
        box-shadow: 0 8px 24px var(--color-shadow);
    }


    /* ==========================================================
       SECTION TITLE
    ========================================================== */
    .section-title {
        font-family: 'Poppins', sans-serif;
        font-size: 0.875rem;
        line-height: 1.25rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.05em;
    }


    /* ==========================================================
       DASHBOARD LINK
    ========================================================== */
    .dashboard-link {
        display: inline-flex;
        align-items: center;
        gap: 0.25rem;
        font-family: 'Poppins', sans-serif;
        font-size: 0.75rem;
        line-height: 1rem;
        font-weight: 600;
        transition: color 0.2s ease;
    }


    /* ==========================================================
       QUICK ACTIONS
    ========================================================== */
    .quick-action {
        display: flex;
        align-items: center;
        gap: 0.875rem;
        padding: 0.75rem;
        border-radius: 0.75rem;
        border: 1px solid transparent;
        transition: all 0.25s ease;
    }

    .quick-action:hover {
        background: var(--color-primary-soft);
        border-color: var(--color-primary-soft);
    }

    .quick-action-icon {
        padding: 0.5rem;
        border-radius: 0.5rem;
        background: var(--color-primary-soft);
        color: var(--color-primary);
        transition: all 0.25s ease;
        flex-shrink: 0;
    }

    .quick-action:hover .quick-action-icon {
        background: var(--color-primary);
        color: #ffffff;
        transform: scale(1.08);
    }

    .quick-action-title {
        font-family: 'Poppins', sans-serif;
        font-size: 0.875rem;
        line-height: 1.25rem;
        font-weight: 500;
        transition: color 0.2s ease;
    }

    .quick-action-description {
        margin-top: 0.125rem;
        font-family: 'Work Sans', sans-serif;
        font-size: 0.75rem;
        line-height: 1rem;
    }


    /* ==========================================================
       STUDIO ITEMS
    ========================================================== */
    .studio-item {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        padding: 0.75rem;
        border-radius: 0.75rem;
        background: var(--color-bg);
        border: 1px solid var(--color-border);
        transition: border-color 0.25s ease;
    }

    .studio-item:hover {
        border-color: var(--color-primary-soft);
    }

    .studio-label {
        font-family: 'Poppins', sans-serif;
        font-size: 0.75rem;
        line-height: 1rem;
        font-weight: 500;
    }

    .studio-value {
        margin-top: 0.125rem;
        font-family: 'Poppins', sans-serif;
        font-size: 0.875rem;
        line-height: 1.25rem;
        font-weight: 600;
    }


    /* ==========================================================
       SCROLLBAR
    ========================================================== */
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
       SELECTION
    ========================================================== */
    ::selection {
        background: var(--color-primary-soft);
        color: #ffffff;
    }


    /* ==========================================================
       ANIMATIONS
    ========================================================== */
    @keyframes pulse {

        0%,
        100% {
            transform: scale(1);
        }

        50% {
            transform: scale(1.1);
        }
    }

    .animate-pulse {
        animation: pulse 2s ease-in-out infinite;
    }
</style>

@endpush

@endsection