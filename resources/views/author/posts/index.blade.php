<x-author-layout>

    <x-slot name="header">
        My Posts
    </x-slot>

    <div class="max-w-5xl mx-auto py-6 sm:py-8 px-4 sm:px-6 font-['Work_Sans',sans-serif]">

        {{-- Header Section with Studio Tag (Centered) --}}
        <section class="mb-10 text-center relative">
            <div class="absolute -top-16 left-1/2 -translate-x-1/2 w-72 h-72 bg-orange-600/10 blur-[100px] rounded-full pointer-events-none"></div>

            <div class="relative z-10 max-w-xl mx-auto">
                <div class="flex items-center justify-center gap-2 mb-1.5">
                    <span class="h-px w-6 bg-orange-500"></span>
                    <span class="text-[10px] uppercase tracking-[0.25em] font-semibold text-orange-400 font-['Poppins',sans-serif]">AUTHOR STUDIO</span>
                    <span class="h-px w-6 bg-orange-500"></span>
                </div>
                <h1 class="text-2xl sm:text-3xl font-bold tracking-tight text-white font-['Poppins',sans-serif]">
                    My Posts
                </h1>
                <p class="mt-1 text-xs sm:text-sm text-zinc-400">
                    Manage all your articles and submissions seamlessly.
                </p>

                <div class="mt-5">
                    <a href="{{ route('author.posts.create') }}"
                       class="inline-flex items-center justify-center gap-2 px-5 py-2.5 rounded-xl bg-gradient-to-r from-orange-600 to-amber-600 hover:from-orange-500 hover:to-amber-500 text-white text-xs sm:text-sm font-semibold shadow-md shadow-orange-950/30 transition-all duration-300 hover:-translate-y-0.5 font-['Poppins',sans-serif]">
                        <span>+ Write New Post</span>
                    </a>
                </div>
            </div>
        </section>

        {{-- Success/Error Alerts --}}
        @if(session('success'))
            <div class="mb-6 rounded-xl bg-emerald-950/40 border border-emerald-500/30 px-4 py-3 text-xs text-emerald-400 flex items-center gap-2 font-['Poppins',sans-serif]">
                <span>✓</span> {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="mb-6 rounded-xl bg-rose-950/40 border border-rose-500/30 px-4 py-3 text-xs text-rose-400 flex items-center gap-2 font-['Poppins',sans-serif]">
                <span>⚠</span> {{ session('error') }}
            </div>
        @endif

        {{-- Main Styled Container Card (Dark Charcoal & Rust Theme) --}}
        <div class="bg-[#121212] border border-zinc-800/80 rounded-2xl shadow-2xl shadow-black/50 overflow-hidden relative">

            {{-- Top Rust Accent Border Line --}}
            <div class="h-1 w-full bg-gradient-to-r from-orange-700 via-orange-500 to-amber-500"></div>

            <div class="p-6 sm:p-8 overflow-x-auto">

                @if($posts->count())
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="border-b border-zinc-800/80 text-[10px] font-bold uppercase tracking-[0.2em] text-zinc-500 font-['Poppins',sans-serif]">
                                <th class="pb-3.5">TITLE</th>
                                <th class="pb-3.5">CATEGORY</th>
                                <th class="pb-3.5">STATUS</th>
                                <th class="pb-3.5">DATE</th>
                                <th class="pb-3.5 text-right">ACTIONS</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-zinc-800/50 text-xs">
                            @foreach($posts as $post)
                                <tr class="hover:bg-zinc-800/20 transition-colors group">

                                    {{-- Title --}}
                                    <td class="py-4 pr-4">
                                        <span class="text-sm font-semibold text-zinc-100 group-hover:text-orange-400 transition-colors block font-['Poppins',sans-serif]">
                                            {{ $post->title }}
                                        </span>
                                    </td>

                                    {{-- Category --}}
                                    <td class="py-4 pr-4">
                                        <span class="text-zinc-400">
                                            {{ $post->category->name ?? 'Uncategorized' }}
                                        </span>
                                    </td>

                                    {{-- Status --}}
                                    <td class="py-4 pr-4 whitespace-nowrap">
                                        @php
                                            $status = $post->status ?? 'draft';
                                            $statusClasses = match ($status) {
                                                'published' => 'bg-emerald-950/80 text-emerald-400 border-emerald-800/50',
                                                'pending'   => 'bg-amber-950/80 text-amber-500 border-amber-800/50',
                                                'rejected'  => 'bg-rose-950/80 text-rose-400 border-rose-800/50',
                                                default     => 'bg-zinc-800 text-zinc-400 border-zinc-700/50',
                                            };
                                        @endphp
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full border text-[10px] font-bold uppercase tracking-wider {{ $statusClasses }}">
                                            {{ $status }}
                                        </span>
                                    </td>

                                    {{-- Date --}}
                                    <td class="py-4 pr-4 whitespace-nowrap">
                                        <span class="text-zinc-400">
                                            {{ $post->created_at->format('M j, Y') }}
                                        </span>
                                    </td>

                                    {{-- Actions --}}
                                    <td class="py-4 text-right whitespace-nowrap">
                                        <div class="inline-flex items-center justify-end gap-3 font-['Poppins',sans-serif]">
                                            <a href="{{ route('author.posts.edit', $post) }}"
                                               class="text-zinc-500 hover:text-orange-400 transition-colors"
                                               title="Edit">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                                </svg>
                                            </a>

                                            @if($post->status !== 'published' && $post->status !== 'pending')
                                                <form action="{{ route('author.posts.submit-for-review', $post) }}" method="POST" class="inline">
                                                    @csrf
                                                    @method('PATCH')
                                                    <button type="submit"
                                                            class="text-xs text-orange-500 hover:text-orange-400 font-semibold transition-colors"
                                                            onclick="return confirm('Submit this post for admin review?')">
                                                        Submit
                                                    </button>
                                                </form>
                                            @endif

                                            <form action="{{ route('author.posts.destroy', $post) }}" method="POST" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                        class="text-zinc-500 hover:text-rose-400 transition-colors"
                                                        onclick="return confirm('Delete this post?')">
                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
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
                        <div class="mt-6 pt-4 border-t border-zinc-800/80">
                            {{ $posts->links() }}
                        </div>
                    @endif

                @else

                    {{-- Empty State --}}
                    <div class="py-12 text-center">
                        <div class="mx-auto w-12 h-12 rounded-full bg-orange-950/30 border border-orange-900/40 flex items-center justify-center text-lg text-orange-500">
                            ✦
                        </div>
                        <h3 class="mt-3 text-sm font-semibold text-zinc-200 font-['Poppins',sans-serif]">No posts yet</h3>
                        <p class="mt-1 text-xs text-zinc-400">Start writing your first article and share it with the world.</p>
                        <a href="{{ route('author.posts.create') }}"
                           class="inline-flex items-center justify-center gap-2 mt-4 px-5 py-2.5 rounded-xl bg-gradient-to-r from-orange-600 to-amber-600 hover:from-orange-500 hover:to-amber-500 text-white text-xs font-semibold shadow-md shadow-orange-950/30 transition-all duration-300 hover:-translate-y-0.5 font-['Poppins',sans-serif]">
                            <span>Write your first post</span>
                        </a>
                    </div>

                @endif

            </div>
        </div>

        {{-- Footnote --}}
        <div class="mt-6 text-center flex items-center justify-center gap-2 text-xs text-zinc-500">
            <span class="text-orange-500">✦</span>
            <span>Manage, refine, and publish your content with ease.</span>
        </div>

    </div>

</x-author-layout>