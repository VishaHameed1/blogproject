<x-author-layout>

    <x-slot name="header">
        My Posts
    </x-slot>

    <div class="max-w-5xl mx-auto py-6 sm:py-8 px-4 sm:px-6 body-font">

        {{-- Header Section (Left Aligned - Admin Style) --}}
        <section class="mb-8 relative">
            <div class="flex items-center justify-between gap-4 flex-wrap">
                <div>
                    <h1 class="heading-font text-3xl font-bold text-[var(--color-text-primary)] tracking-tight">
                        My Posts
                    </h1>
                    <p class="text-sm text-[var(--color-text-muted)] mt-1">
                        Manage all your articles and submissions seamlessly.
                    </p>
                </div>

                <a href="{{ route('author.posts.create') }}"
                    class="inline-flex items-center justify-center gap-2 px-5 py-2.5 rounded-xl bg-[var(--color-primary)] hover:bg-[var(--color-primary-hover)] text-white text-sm font-semibold shadow-lg shadow-[var(--color-primary)]/20 hover:shadow-[var(--color-primary)]/40 transition-all duration-300 hover:scale-[1.02] heading-font shrink-0">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                    <span>Write New Post</span>
                </a>
            </div>
        </section>

        {{-- Success/Error Alerts --}}
        @if(session('success'))
        <div class="mb-6 rounded-xl bg-emerald-500/10 border border-emerald-500/20 px-4 py-3 text-xs text-emerald-600 dark:text-emerald-400 flex items-center gap-2 heading-font">
            <span>✓</span> {{ session('success') }}
        </div>
        @endif

        @if(session('error'))
        <div class="mb-6 rounded-xl bg-rose-500/10 border border-rose-500/20 px-4 py-3 text-xs text-rose-600 dark:text-rose-400 flex items-center gap-2 heading-font">
            <span>⚠</span> {{ session('error') }}
        </div>
        @endif

        {{-- Main Styled Container Card --}}
        <div class="bg-[var(--color-bg-card)] border border-[var(--color-border]) rounded-2xl shadow-lg shadow-[var(--color-shadow)] overflow-hidden relative">

            {{-- Top Accent Border Line --}}
            <div class="h-1 w-full bg-gradient-to-r from-[var(--color-primary)] via-[var(--color-primary-hover)] to-[var(--color-primary)]"></div>

            <div class="p-6 sm:p-8 overflow-x-auto">

                @if($posts->count())
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="border-b border-[var(--color-border)] text-[10px] font-bold uppercase tracking-[0.2em] text-[var(--color-text-muted)] heading-font">
                            <th class="pb-3.5">TITLE</th>
                            <th class="pb-3.5">CATEGORY</th>
                            <th class="pb-3.5">STATUS</th>
                            <th class="pb-3.5">DATE</th>
                            <th class="pb-3.5 text-right">ACTIONS</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-[var(--color-border)] text-xs">
                        @foreach($posts as $post)
                        <tr class="hover:bg-[var(--color-primary-soft)] transition-colors group">

                            {{-- Title --}}
                            <td class="py-4 pr-4">
                                <span class="text-sm font-semibold text-[var(--color-text-primary)] group-hover:text-[var(--color-primary)] transition-colors block heading-font">
                                    {{ $post->title }}
                                </span>
                            </td>

                            {{-- Category --}}
                            <td class="py-4 pr-4">
                                <span class="text-[var(--color-text-secondary)] body-font">
                                    {{ $post->category->name ?? 'Uncategorized' }}
                                </span>
                            </td>

                            {{-- Status --}}
                            <td class="py-4 pr-4 whitespace-nowrap">
                                @php
                                $status = $post->status ?? 'draft';
                                $statusClasses = match ($status) {
                                'published' => 'bg-emerald-500/10 text-emerald-600 dark:text-emerald-400 border-emerald-500/20',
                                'pending' => 'bg-[var(--color-primary-soft)] text-[var(--color-primary)] border-[var(--color-primary-soft)]',
                                'rejected' => 'bg-rose-500/10 text-rose-600 dark:text-rose-400 border-rose-500/20',
                                default => 'bg-[var(--color-bg)] text-[var(--color-text-muted)] border-[var(--color-border])',
                                };
                                @endphp
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full border text-[10px] font-bold uppercase tracking-wider heading-font {{ $statusClasses }}">
                                    {{ $status }}
                                </span>
                            </td>

                            {{-- Date --}}
                            <td class="py-4 pr-4 whitespace-nowrap">
                                <span class="text-[var(--color-text-muted)] body-font">
                                    {{ $post->created_at->format('M j, Y') }}
                                </span>
                            </td>

                            {{-- Actions --}}
                            <td class="py-4 text-right whitespace-nowrap">
                                <div class="inline-flex items-center justify-end gap-3 heading-font">
                                    <a href="{{ route('author.posts.edit', $post) }}"
                                        class="text-[var(--color-text-muted)] hover:text-[var(--color-primary)] transition-colors"
                                        title="Edit">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg>
                                    </a>

                                    @if($post->status !== 'published' && $post->status !== 'pending')
                                    {{-- FIXED: Using update route with action parameter --}}
                                    <form action="{{ route('author.posts.update', $post) }}" method="POST" class="inline">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="action" value="submit">
                                        <button type="submit"
                                            class="text-xs text-[var(--color-primary)] hover:text-[var(--color-primary-hover)] font-semibold transition-colors"
                                            onclick="return confirm('Submit this post for admin review?')">
                                            Submit
                                        </button>
                                    </form>
                                    @endif

                                    <form action="{{ route('author.posts.destroy', $post) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="text-[var(--color-text-muted)] hover:text-rose-500 transition-colors"
                                            onclick="return confirm('Delete this post?')">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </td>

                        </tr>
                        @endforeach
                    </tbody>
                </table>

                {{-- Pagination --}}
                @if($posts->hasPages())
                <div class="mt-6 pt-4 border-t border-[var(--color-border])">
                    {{ $posts->links() }}
                </div>
                @endif

                @else

                {{-- Empty State --}}
                <div class="py-12 text-center">
                    <div class="mx-auto w-12 h-12 rounded-full bg-[var(--color-primary-soft)] border border-[var(--color-primary-soft)] flex items-center justify-center text-lg text-[var(--color-primary)]">
                        ✦
                    </div>
                    <h3 class="mt-3 text-sm font-semibold text-[var(--color-text-primary)] heading-font">No posts yet</h3>
                    <p class="mt-1 text-xs text-[var(--color-text-secondary)] body-font">Start writing your first article and share it with the world.</p>
                    <a href="{{ route('author.posts.create') }}"
                        class="inline-flex items-center justify-center gap-2 mt-4 px-5 py-2.5 rounded-xl bg-[var(--color-primary)] hover:bg-[var(--color-primary-hover)] text-white text-xs font-semibold shadow-lg shadow-[var(--color-primary)]/20 hover:shadow-[var(--color-primary)]/40 transition-all duration-300 hover:-translate-y-0.5 heading-font">
                        <span>Write your first post</span>
                    </a>
                </div>

                @endif

            </div>
        </div>

        {{-- Footnote --}}
        <div class="mt-6 text-center flex items-center justify-center gap-2 text-xs text-[var(--color-text-muted)]">
            <span class="text-[var(--color-primary)]">✦</span>
            <span class="body-font">Manage, refine, and publish your content with ease.</span>
        </div>

    </div>

</x-author-layout>