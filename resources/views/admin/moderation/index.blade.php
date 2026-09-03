<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="heading-font text-xl font-bold text-[var(--color-text-primary)] tracking-tight">
                    {{ __('Post Moderation Queue') }}
                </h2>
                <p class="text-sm text-[var(--color-text-muted)] mt-0.5">Review and manage pending post submissions</p>
            </div>
            <span class="px-3 py-1 bg-[var(--color-primary-soft)] text-[var(--color-primary)] text-xs heading-font font-semibold rounded-full border border-[var(--color-primary-soft)]">
                {{ $pendingPosts->total() }} Pending
            </span>
        </div>
    </x-slot>

    <div class="py-12 bg-[var(--color-bg)]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            @if(session('success'))
            <div class="mb-4 p-4 bg-green-100 dark:bg-green-500/10 border border-green-200 dark:border-green-500/20 rounded-xl text-green-700 dark:text-green-400 text-sm flex items-center gap-2">
                <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                {{ session('success') }}
            </div>
            @endif

            <div class="bg-[var(--color-bg-card)] border border-[var(--color-border]) rounded-2xl overflow-hidden shadow-sm hover:shadow-md transition-all duration-300 hover:border-[var(--color-primary)]/30">
                <div class="p-6 border-b border-[var(--color-border])">
                    <div class="flex items-center gap-2">
                        <span class="w-1.5 h-4 bg-[var(--color-primary)] rounded-full"></span>
                        <h3 class="heading-font font-semibold text-sm text-[var(--color-text-primary)] uppercase tracking-wider">Pending Approval Requests</h3>
                    </div>
                </div>

                <div class="p-6 space-y-6">
                    @forelse($pendingPosts as $post)
                    <div class="bg-[var(--color-bg)] border border-[var(--color-border]) rounded-xl p-5 hover:border-[var(--color-primary)]/30 transition-all duration-300">
                        <div class="flex flex-col md:flex-row md:items-start md:justify-between gap-4">
                            <div class="flex-1 min-w-0">
                                <div class="flex items-center gap-2 mb-2">
                                    <span class="px-2 py-0.5 bg-[var(--color-primary-soft)] text-[var(--color-primary)] text-[10px] heading-font font-semibold rounded-full border border-[var(--color-primary-soft)]">
                                        Pending
                                    </span>
                                    <span class="text-[10px] text-[var(--color-text-muted)]">
                                        Submitted {{ $post->updated_at->diffForHumans() }}
                                    </span>
                                </div>

                                <h4 class="heading-font text-lg font-bold text-[var(--color-text-primary)] truncate">{{ $post->title }}</h4>

                                <div class="flex flex-wrap items-center gap-3 mt-1.5 text-xs text-[var(--color-text-muted)]">
                                    <span class="flex items-center gap-1.5">
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                        </svg>
                                        <span class="font-medium text-[var(--color-text-secondary)]">{{ $post->author->name ?? 'Unknown' }}</span>
                                    </span>
                                    <span>·</span>
                                    <span class="flex items-center gap-1.5">
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z" />
                                        </svg>
                                        <span>{{ $post->category->name ?? 'N/A' }}</span>
                                    </span>
                                </div>

                                <div class="mt-3 text-sm text-[var(--color-text-secondary)] bg-[var(--color-bg-card)] p-3 rounded-lg border border-[var(--color-border)] leading-relaxed line-clamp-3">
                                    {{ Str::limit(strip_tags($post->body), 300) }}
                                </div>
                            </div>

                            <div class="flex flex-row md:flex-col gap-2 shrink-0">
                                <form action="{{ route('admin.posts.approve', $post) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="w-full px-4 py-2 bg-green-100 dark:bg-green-500/10 hover:bg-green-200 dark:hover:bg-green-500/20 text-green-700 dark:text-green-400 border border-green-200 dark:border-green-500/20 rounded-lg text-xs heading-font font-semibold uppercase tracking-wider transition-all duration-300 flex items-center justify-center gap-1.5">
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                        </svg>
                                        Approve
                                    </button>
                                </form>

                                <details class="w-full">
                                    <summary class="w-full px-4 py-2 bg-red-100 dark:bg-red-500/10 hover:bg-red-200 dark:hover:bg-red-500/20 text-red-700 dark:text-red-400 border border-red-200 dark:border-red-500/20 rounded-lg text-xs heading-font font-semibold uppercase tracking-wider cursor-pointer transition-all duration-300 flex items-center justify-center gap-1.5">
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                        </svg>
                                        Reject
                                    </summary>
                                    <form action="{{ route('admin.posts.reject', $post) }}" method="POST" class="mt-2 p-3 bg-[var(--color-bg-card)] rounded-lg border border-[var(--color-border])">
                                        @csrf
                                        @method('PATCH')
                                        <textarea name="rejection_reason" required placeholder="Reason for rejection..." class="w-full text-xs bg-[var(--color-bg)] border border-[var(--color-border]) rounded-lg text-[var(--color-text-primary)] placeholder:text-[var(--color-text-muted)] focus:outline-none focus:border-[var(--color-primary)] focus:ring-1 focus:ring-[var(--color-primary)]/30 transition-all p-2.5 resize-none" rows="3"></textarea>
                                        <button type="submit" class="w-full mt-2 py-1.5 bg-red-100 dark:bg-red-500/10 hover:bg-red-200 dark:hover:bg-red-500/20 text-red-700 dark:text-red-400 border border-red-200 dark:border-red-500/20 rounded-lg text-xs heading-font font-semibold uppercase tracking-wider transition-all duration-300">
                                            Confirm Reject
                                        </button>
                                    </form>
                                </details>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="text-center py-12">
                        <div class="text-4xl mb-3">✅</div>
                        <p class="heading-font text-lg font-medium text-[var(--color-text-secondary)]">All caught up!</p>
                        <p class="text-sm text-[var(--color-text-muted)] mt-1">No posts currently waiting for approval.</p>
                    </div>
                    @endforelse
                </div>

                @if($pendingPosts->hasPages())
                <div class="px-6 py-4 border-t border-[var(--color-border])">
                    {{ $pendingPosts->links() }}
                </div>
                @endif
            </div>
        </div>
    </div>

    @push('styles')
    <style>
        /* Heading font - Poppins */
        .heading-font {
            font-family: 'Poppins', ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif !important;
            letter-spacing: -0.02em !important;
        }

        /* Body font - Work Sans */
        .body-font {
            font-family: 'Work Sans', ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif !important;
        }

        /* Selection color - Theme aware */
        ::selection {
            background-color: var(--color-primary-soft) !important;
            color: #ffffff !important;
        }

        /* Scrollbar styling - Theme aware */
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

        /* Line clamp */
        .line-clamp-3 {
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
    </style>
    @endpush
</x-app-layout>