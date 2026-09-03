<x-author-layout>

    <x-slot name="header">
        <div class="flex items-center justify-between w-full">
            <span>Author Dashboard</span>
        </div>
    </x-slot>

    <div class="max-w-7xl mx-auto py-6 sm:py-8 px-4 sm:px-6 lg:px-8">

        {{-- Welcome Header --}}
        <section class="mb-10">
            <div class="max-w-2xl">
                <div class="flex items-center gap-2 mb-2">
                    <span class="inline-block h-1 w-8 bg-[var(--color-primary)] rounded-full"></span>
                    <span class="text-xs uppercase tracking-widest font-semibold text-[var(--color-primary)] heading-font">Author Studio</span>
                </div>
                <h1 class="heading-font text-4xl font-bold text-[var(--color-text-primary)] tracking-tight">
                    Welcome back, {{ auth()->user()->name }}
                </h1>
                <p class="mt-2 text-base text-[var(--color-text-secondary)]">
                    Manage your articles, track submissions, and monitor post statuses seamlessly.
                </p>

                <div class="mt-6 flex items-center gap-3">
                    <a href="{{ route('author.posts.create') }}"
                        class="inline-flex items-center justify-center gap-2 px-6 py-2.5 rounded-xl bg-[var(--color-primary)] hover:bg-[var(--color-primary-hover)] text-white text-sm heading-font font-semibold shadow-lg shadow-[var(--color-primary)]/25 hover:shadow-[var(--color-primary)]/40 transition-all duration-300">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                        <span>Write New Post</span>
                    </a>

                    {{-- Notification Bell with Badge --}}
                    <div class="relative">
                        <button class="p-2.5 rounded-xl bg-[var(--color-bg-card)] border border-[var(--color-border)] hover:border-[var(--color-primary)] transition-all duration-300 hover:shadow-lg hover:shadow-[var(--color-primary)]/10 relative">
                            <svg class="w-5 h-5 text-[var(--color-text-secondary)]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                            </svg>
                            @php
                            $pendingCount = $stats['pending'] ?? 0;
                            @endphp
                            @if($pendingCount > 0)
                            <span class="absolute -top-1 -right-1 flex items-center justify-center w-5 h-5 text-[10px] font-bold text-white bg-red-500 rounded-full shadow-lg shadow-red-500/30 animate-pulse">
                                {{ $pendingCount }}
                            </span>
                            @endif
                        </button>
                    </div>
                </div>
            </div>
        </section>

        {{-- Success Flash Alert --}}
        @if(session('success'))
        <div class="mb-6 rounded-xl bg-emerald-500/10 border border-emerald-500/20 px-4 py-3 text-sm text-emerald-600 dark:text-emerald-400 flex items-center gap-2 backdrop-blur-sm">
            <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
            </svg>
            <span>{{ session('success') }}</span>
        </div>
        @endif

        {{-- Stats Grid with Icons and Trending Arrows --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5 mb-8">

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
                <div class="stat-value text-[var(--color-text-primary)]">{{ $stats['total'] ?? 0 }}</div>
                <div class="stat-label">Total Posts</div>
                <div class="stat-meta">
                    @php
                    $totalChange = $stats['total_change'] ?? 0;
                    $totalArrow = $totalChange >= 0 ? '↑' : '↓';
                    $totalColor = $totalChange >= 0 ? 'text-emerald-500' : 'text-rose-500';
                    @endphp
                    <span class="{{ $totalColor }} font-semibold">{{ $totalArrow }} {{ abs($totalChange) }}%</span>
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
                <div class="stat-value text-emerald-600 dark:text-emerald-400">{{ $stats['published'] ?? 0 }}</div>
                <div class="stat-label">Published</div>
                <div class="stat-meta">
                    @php
                    $pubChange = $stats['published_change'] ?? 0;
                    $pubArrow = $pubChange >= 0 ? '↑' : '↓';
                    $pubColor = $pubChange >= 0 ? 'text-emerald-500' : 'text-rose-500';
                    @endphp
                    <span class="{{ $pubColor }} font-semibold">{{ $pubArrow }} {{ abs($pubChange) }}%</span>
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
                <div class="stat-value text-[var(--color-primary)]">{{ $stats['pending'] ?? 0 }}</div>
                <div class="stat-label">Pending Review</div>
                <div class="stat-meta">
                    @php
                    $pendingChange = $stats['pending_change'] ?? 0;
                    $pendingArrow = $pendingChange >= 0 ? '↑' : '↓';
                    $pendingColor = $pendingChange >= 0 ? 'text-amber-500' : 'text-emerald-500';
                    @endphp
                    <span class="{{ $pendingColor }} font-semibold">{{ $pendingArrow }} {{ abs($pendingChange) }}%</span>
                    <span>needs attention</span>
                </div>
            </div>

            {{-- Drafts --}}
            <div class="stat-card">
                <div class="flex items-center justify-between mb-2">
                    <div class="stat-icon bg-gray-500/10 text-gray-500">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                        </svg>
                    </div>
                    <span class="text-xs font-medium text-[var(--color-text-muted)]">Drafts</span>
                </div>
                <div class="stat-value text-[var(--color-text-muted)]">{{ $stats['draft'] ?? 0 }}</div>
                <div class="stat-label">Drafts</div>
                <div class="stat-meta">
                    @php
                    $draftChange = $stats['draft_change'] ?? 0;
                    $draftArrow = $draftChange >= 0 ? '↑' : '↓';
                    $draftColor = $draftChange >= 0 ? 'text-amber-500' : 'text-emerald-500';
                    @endphp
                    <span class="{{ $draftColor }} font-semibold">{{ $draftArrow }} {{ abs($draftChange) }}%</span>
                    <span>in progress</span>
                </div>
            </div>
        </div>

        {{-- Author Profile (Full Width) --}}
        <div class="dashboard-card mb-8">
            <div class="flex items-center gap-3 mb-4">
                <div class="p-2 bg-purple-500/10 rounded-lg text-purple-500">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                </div>
                <div>
                    <h2 class="section-title">Author Profile</h2>
                    <p class="body-font text-xs text-[var(--color-text-muted)] mt-0.5">Your account overview</p>
                </div>
            </div>

            <div class="flex flex-col sm:flex-row items-start sm:items-center gap-4 p-4 bg-[var(--color-bg)] rounded-xl border border-[var(--color-border)]">
                <div class="w-14 h-14 rounded-full bg-[var(--color-primary)]/10 flex items-center justify-center text-[var(--color-primary)] font-bold text-xl heading-font border border-[var(--color-primary)]/20 shrink-0">
                    {{ strtoupper(substr(auth()->user()->name, 0, 2)) }}
                </div>
                <div class="min-w-0 flex-1">
                    <p class="text-base heading-font font-semibold text-[var(--color-text-primary)] truncate">
                        {{ auth()->user()->name }}
                    </p>
                    <p class="body-font text-sm text-[var(--color-text-muted)] truncate">
                        {{ auth()->user()->email }}
                    </p>
                    <div class="flex items-center gap-3 mt-1.5 flex-wrap">
                        <span class="inline-flex items-center gap-1 text-xs text-[var(--color-text-muted)]">
                            <span class="w-1.5 h-1.5 rounded-full bg-green-500"></span>
                            Active
                        </span>
                        <span class="text-xs text-[var(--color-text-muted)]">·</span>
                        <span class="text-xs text-[var(--color-text-muted)]">Member since {{ auth()->user()->created_at?->format('M Y') ?? '—' }}</span>
                        <span class="text-xs text-[var(--color-text-muted)]">·</span>
                        <span class="text-xs text-[var(--color-text-muted)]">Total Posts: {{ $stats['total'] ?? 0 }}</span>
                    </div>
                </div>
                <a href="{{ url('/author/profile') }}" class="px-4 py-2 text-xs heading-font font-semibold text-[var(--color-primary)] border border-[var(--color-primary)]/20 rounded-full hover:bg-[var(--color-primary)]/10 transition-all flex items-center gap-1.5 shrink-0">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                    </svg>
                    Edit Profile
                </a>
            </div>
        </div>

        {{-- Recent Posts --}}
        <div class="dashboard-card">
            <div class="flex items-center justify-between mb-6">
                <div>
                    <h2 class="section-title">Recent Posts</h2>
                    <p class="body-font text-xs text-[var(--color-text-muted)] mt-0.5">Your recently published and drafted articles</p>
                </div>
                <a href="{{ route('author.posts.create') }}" class="inline-flex items-center gap-2 px-4 py-2 rounded-xl bg-[var(--color-primary)] hover:bg-[var(--color-primary-hover)] text-white text-sm heading-font font-semibold transition-all shadow-lg shadow-[var(--color-primary)]/20 hover:shadow-[var(--color-primary)]/40">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                    New Post
                </a>
            </div>

            <div class="divide-y divide-[var(--color-border)]">
                @forelse($posts ?? [] as $post)
                <div class="flex items-center justify-between gap-4 py-4 first:pt-0 last:pb-0 group hover:bg-[var(--color-bg)] -mx-2 px-3 rounded-xl transition-colors">
                    <div class="min-w-0 flex-1">
                        <p class="text-sm heading-font font-medium text-[var(--color-text-primary)] truncate">{{ $post->title }}</p>
                        <p class="text-xs text-[var(--color-text-muted)] mt-1">
                            {{ $post->created_at->format('M j, Y') }} ·
                            @if($post->published_at && $post->published_at <= now())
                                Published
                                @elseif($post->published_at && $post->published_at > now())
                                Scheduled
                                @else
                                Draft
                                @endif
                        </p>
                    </div>
                    <div class="flex items-center gap-3 shrink-0">
                        <span class="status-badge
                            @if($post->published_at && $post->published_at <= now()) status-published
                            @elseif($post->published_at && $post->published_at > now()) status-scheduled
                            @else status-draft @endif">
                            @if($post->published_at && $post->published_at <= now())
                                Published
                                @elseif($post->published_at && $post->published_at > now())
                                Scheduled
                                @else
                                Draft
                                @endif
                        </span>
                        <a href="{{ route('author.posts.edit', $post) }}" class="px-3 py-1.5 rounded-lg text-xs heading-font font-semibold text-[var(--color-primary)] bg-[var(--color-primary)]/10 hover:bg-[var(--color-primary)]/20 transition-colors">
                            Edit
                        </a>
                    </div>
                </div>
                @empty
                <div class="py-12 text-center">
                    <p class="text-sm text-[var(--color-text-muted)]">No posts yet. Create your first post to get started!</p>
                </div>
                @endforelse
            </div>
        </div>

    </div>

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
            box-shadow: 0 1px 3px var(--color-shadow);
        }

        .stat-card:hover {
            border-color: var(--color-primary);
            transform: translateY(-2px);
            box-shadow: 0 10px 30px var(--color-shadow-hover);
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
            color: var(--color-text-muted);
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
            color: var(--color-text-muted);
        }

        .stat-small {
            display: block;
            margin-top: 0.125rem;
            font-family: 'Poppins', sans-serif;
            font-size: 0.875rem;
            line-height: 1.25rem;
            font-weight: 600;
            color: var(--color-text-primary);
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
            box-shadow: 0 1px 3px var(--color-shadow);
        }

        .dashboard-card:hover {
            border-color: var(--color-primary);
            box-shadow: 0 10px 30px var(--color-shadow-hover);
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
            color: var(--color-text-primary);
        }

        /* ==========================================================
            STATUS BADGES
        ========================================================== */
        .status-badge {
            display: inline-flex;
            align-items: center;
            padding: 0.25rem 0.75rem;
            border-radius: 9999px;
            font-family: 'Poppins', sans-serif;
            font-size: 0.625rem;
            line-height: 1rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            border-width: 1px;
            border-style: solid;
        }

        .status-published {
            background: rgba(16, 185, 129, 0.10);
            color: #059669;
            border-color: rgba(16, 185, 129, 0.20);
        }

        [data-theme="dark"] .status-published {
            background: rgba(52, 211, 153, 0.10);
            color: #34D399;
            border-color: rgba(52, 211, 153, 0.20);
        }

        .status-scheduled {
            background: rgba(245, 158, 11, 0.10);
            color: #D97706;
            border-color: rgba(245, 158, 11, 0.20);
        }

        [data-theme="dark"] .status-scheduled {
            background: rgba(251, 191, 36, 0.10);
            color: #FBBF24;
            border-color: rgba(251, 191, 36, 0.20);
        }

        .status-draft {
            background: rgba(107, 114, 128, 0.08);
            color: var(--color-text-muted);
            border-color: var(--color-border);
        }

        /* ==========================================================
            SCROLLBAR & SELECTION
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

</x-author-layout>