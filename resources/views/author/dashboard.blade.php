<x-author-layout>

    <x-slot name="header">
        Author Dashboard
    </x-slot>

    <div class="max-w-7xl mx-auto py-6 sm:py-8 px-4 sm:px-6 lg:px-8 font-['Work_Sans',sans-serif] text-zinc-300">

        {{-- Welcome Header with Ambient Glow & Centered Layout --}}
        <section class="mb-10 text-center relative">
            <div class="absolute -top-16 left-1/2 -translate-x-1/2 w-72 h-72 bg-orange-600/10 blur-[100px] rounded-full pointer-events-none"></div>

            <div class="relative z-10 max-w-xl mx-auto">
                <div class="flex items-center justify-center gap-2 mb-1.5">
                    <span class="h-px w-6 bg-orange-500"></span>
                    <span class="text-[10px] uppercase tracking-[0.25em] font-semibold text-orange-400 font-['Poppins',sans-serif]">AUTHOR STUDIO</span>
                    <span class="h-px w-6 bg-orange-500"></span>
                </div>
                <h1 class="text-2xl sm:text-3xl font-bold tracking-tight text-white font-['Poppins',sans-serif]">
                    Welcome, {{ auth()->user()->name }}
                </h1>
                <p class="mt-1 text-xs sm:text-sm text-zinc-400">
                    Manage your articles, track submissions, and monitor post statuses seamlessly.
                </p>

                <div class="mt-5">
                    <a href="{{ route('author.posts.create') }}" 
                       class="inline-flex items-center justify-center gap-2 px-5 py-2.5 rounded-xl bg-gradient-to-r from-orange-600 to-amber-600 hover:from-orange-500 hover:to-amber-500 text-white text-xs sm:text-sm font-semibold shadow-md shadow-orange-950/30 transition-all duration-300 hover:-translate-y-0.5 font-['Poppins',sans-serif]">
                        <span>+ Write New Post</span>
                    </a>
                </div>
            </div>
        </section>

        {{-- Success Flash Alert --}}
        @if(session('success'))
            <div class="mb-6 rounded-xl bg-emerald-950/40 border border-emerald-500/30 px-4 py-3 text-xs text-emerald-400 flex items-center gap-2 font-['Poppins',sans-serif]">
                <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                </svg>
                <span>{{ session('success') }}</span>
            </div>
        @endif

        {{-- Stats Grid --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-8">
            
            {{-- Total Posts --}}
            <div class="bg-[#121212] border border-zinc-800/80 rounded-2xl p-5 hover:border-orange-500/40 transition-all duration-300 shadow-xl group">
                <div class="flex items-center gap-3.5">
                    <div class="p-3 rounded-xl bg-orange-500/10 text-orange-400 border border-orange-500/10 group-hover:bg-orange-500/20 transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/>
                        </svg>
                    </div>
                    <div>
                        <p class="text-[10px] font-bold uppercase tracking-[0.2em] text-zinc-400 font-['Poppins',sans-serif]">Total Posts</p>
                        <p class="text-2xl font-bold text-white mt-0.5 font-['Poppins',sans-serif]">{{ $stats['total'] ?? 0 }}</p>
                    </div>
                </div>
            </div>

            {{-- Published --}}
            <div class="bg-[#121212] border border-zinc-800/80 rounded-2xl p-5 hover:border-emerald-500/40 transition-all duration-300 shadow-xl group">
                <div class="flex items-center gap-3.5">
                    <div class="p-3 rounded-xl bg-emerald-500/10 text-emerald-400 border border-emerald-500/10 group-hover:bg-emerald-500/20 transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <div>
                        <p class="text-[10px] font-bold uppercase tracking-[0.2em] text-zinc-400 font-['Poppins',sans-serif]">Published</p>
                        <p class="text-2xl font-bold text-white mt-0.5 font-['Poppins',sans-serif]">{{ $stats['published'] ?? 0 }}</p>
                    </div>
                </div>
            </div>

            {{-- Pending Review --}}
            <div class="bg-[#121212] border border-zinc-800/80 rounded-2xl p-5 hover:border-amber-500/40 transition-all duration-300 shadow-xl group">
                <div class="flex items-center gap-3.5">
                    <div class="p-3 rounded-xl bg-amber-500/10 text-amber-400 border border-amber-500/10 group-hover:bg-amber-500/20 transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <div>
                        <p class="text-[10px] font-bold uppercase tracking-[0.2em] text-zinc-400 font-['Poppins',sans-serif]">Pending Review</p>
                        <p class="text-2xl font-bold text-white mt-0.5 font-['Poppins',sans-serif]">{{ $stats['pending'] ?? 0 }}</p>
                    </div>
                </div>
            </div>

            {{-- Drafts --}}
            <div class="bg-[#121212] border border-zinc-800/80 rounded-2xl p-5 hover:border-zinc-500/40 transition-all duration-300 shadow-xl group">
                <div class="flex items-center gap-3.5">
                    <div class="p-3 rounded-xl bg-zinc-800 text-zinc-400 border border-zinc-700/50 group-hover:bg-zinc-700 transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/>
                        </svg>
                    </div>
                    <div>
                        <p class="text-[10px] font-bold uppercase tracking-[0.2em] text-zinc-400 font-['Poppins',sans-serif]">Drafts</p>
                        <p class="text-2xl font-bold text-white mt-0.5 font-['Poppins',sans-serif]">{{ $stats['draft'] ?? 0 }}</p>
                    </div>
                </div>
            </div>

        </div>

        {{-- Activity & Quick Actions Grid --}}
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">
            
            {{-- Recent Activity --}}
            <div class="lg:col-span-2 bg-[#121212] border border-zinc-800/80 rounded-2xl p-6 shadow-xl relative overflow-hidden">
                <div class="h-1 w-full bg-gradient-to-r from-orange-700 via-orange-500 to-amber-500 absolute top-0 left-0"></div>
                
                <div class="flex items-center justify-between mb-4 mt-2">
                    <h3 class="text-xs font-bold uppercase tracking-[0.2em] text-zinc-200 flex items-center gap-2 font-['Poppins',sans-serif]">
                        <span class="w-1.5 h-1.5 rounded-full bg-orange-500"></span>
                        Recent Activity
                    </h3>
                </div>
                
                <div class="space-y-3">
                    @forelse($recentActivity ?? [] as $activity)
                        <div class="flex items-center gap-3 p-3 bg-[#0a0a0a] rounded-xl border border-zinc-800/60 hover:border-zinc-700 transition-all">
                            <div class="w-8 h-8 rounded-lg bg-orange-600/10 border border-orange-600/20 flex items-center justify-center text-orange-400 text-xs font-bold shrink-0 font-['Poppins',sans-serif]">
                                {{ strtoupper(substr($activity->title, 0, 1)) }}
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="text-xs font-semibold text-zinc-200 truncate font-['Poppins',sans-serif]">{{ $activity->title }}</p>
                                <p class="text-[11px] text-zinc-500 mt-0.5">{{ $activity->created_at->diffForHumans() }}</p>
                            </div>
                            @php
                                $actStatus = $activity->status ?? 'draft';
                                $actClasses = match ($actStatus) {
                                    'published' => 'bg-emerald-950/80 text-emerald-400 border-emerald-800/50',
                                    'pending'   => 'bg-amber-950/80 text-amber-500 border-amber-800/50',
                                    'rejected'  => 'bg-rose-950/80 text-rose-400 border-rose-800/50',
                                    default     => 'bg-zinc-800 text-zinc-400 border-zinc-700/50',
                                };
                            @endphp
                            <span class="px-2.5 py-0.5 rounded-full text-[10px] font-bold uppercase tracking-wider border shrink-0 font-['Poppins',sans-serif] {{ $actClasses }}">
                                {{ $actStatus }}
                            </span>
                        </div>
                    @empty
                        <div class="text-center py-8 text-zinc-500">
                            <p class="text-xs">No recent activity recorded.</p>
                        </div>
                    @endforelse
                </div>
            </div>

            {{-- Quick Actions --}}
            <div class="bg-[#121212] border border-zinc-800/80 rounded-2xl p-6 shadow-xl relative overflow-hidden">
                <div class="h-1 w-full bg-gradient-to-r from-orange-700 via-orange-500 to-amber-500 absolute top-0 left-0"></div>

                <h3 class="text-xs font-bold uppercase tracking-[0.2em] text-zinc-200 mb-4 mt-2 font-['Poppins',sans-serif]">Quick Actions</h3>
                <div class="space-y-3">
                    
                    <a href="{{ route('author.posts.create') }}" class="flex items-center gap-3 p-3 bg-[#0a0a0a] rounded-xl border border-zinc-800/60 hover:border-orange-600/50 hover:bg-orange-600/5 transition-all group">
                        <div class="p-2 rounded-lg bg-orange-600/10 text-orange-400 group-hover:bg-orange-600 group-hover:text-white transition-all">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                            </svg>
                        </div>
                        <div>
                            <p class="text-xs font-semibold text-zinc-200 group-hover:text-orange-400 transition-colors font-['Poppins',sans-serif]">Write New Post</p>
                            <p class="text-[11px] text-zinc-500">Draft or submit a new article</p>
                        </div>
                    </a>

                    <a href="{{ route('author.posts.index') }}" class="flex items-center gap-3 p-3 bg-[#0a0a0a] rounded-xl border border-zinc-800/60 hover:border-orange-600/50 hover:bg-orange-600/5 transition-all group">
                        <div class="p-2 rounded-lg bg-zinc-800 text-zinc-400 group-hover:bg-orange-600 group-hover:text-white transition-all">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/>
                            </svg>
                        </div>
                        <div>
                            <p class="text-xs font-semibold text-zinc-200 group-hover:text-orange-400 transition-colors font-['Poppins',sans-serif]">View All Posts</p>
                            <p class="text-[11px] text-zinc-500">Manage existing content</p>
                        </div>
                    </a>

                    <a href="{{ route('author.profile') }}" class="flex items-center gap-3 p-3 bg-[#0a0a0a] rounded-xl border border-zinc-800/60 hover:border-orange-600/50 hover:bg-orange-600/5 transition-all group">
                        <div class="p-2 rounded-lg bg-zinc-800 text-zinc-400 group-hover:bg-orange-600 group-hover:text-white transition-all">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                            </svg>
                        </div>
                        <div>
                            <p class="text-xs font-semibold text-zinc-200 group-hover:text-orange-400 transition-colors font-['Poppins',sans-serif]">My Profile</p>
                            <p class="text-[11px] text-zinc-500">Update your profile & settings</p>
                        </div>
                    </a>

                    <a href="{{ route('home') }}" target="_blank" class="flex items-center gap-3 p-3 bg-[#0a0a0a] rounded-xl border border-zinc-800/60 hover:border-orange-600/50 hover:bg-orange-600/5 transition-all group">
                        <div class="p-2 rounded-lg bg-zinc-800 text-zinc-400 group-hover:bg-orange-600 group-hover:text-white transition-all">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                            </svg>
                        </div>
                        <div>
                            <p class="text-xs font-semibold text-zinc-200 group-hover:text-orange-400 transition-colors font-['Poppins',sans-serif]">View Live Site</p>
                            <p class="text-[11px] text-zinc-500">Open blog public feed</p>
                        </div>
                    </a>

                </div>
            </div>
        </div>

        {{-- Posts Section Container --}}
        <div class="bg-[#121212] border border-zinc-800/80 rounded-2xl overflow-hidden shadow-2xl relative">
            <div class="h-1 w-full bg-gradient-to-r from-orange-700 via-orange-500 to-amber-500"></div>

            <div class="px-6 py-5 border-b border-zinc-800/80 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 bg-[#0a0a0a]/50">
                <div>
                    <h3 class="font-bold text-base text-zinc-100 font-['Poppins',sans-serif]">
                        My Posts
                    </h3>
                    <p class="text-xs text-zinc-400 mt-0.5">
                        Your submitted articles and live blog entries.
                    </p>
                </div>

                <a href="{{ route('author.posts.create') }}"
                   class="inline-flex items-center justify-center gap-2 px-4 py-2 rounded-xl bg-gradient-to-r from-orange-600 to-amber-600 hover:from-orange-500 hover:to-amber-500 text-white text-xs font-semibold shadow-md shadow-orange-950/30 transition-all font-['Poppins',sans-serif]">
                    <span>+ Write Post</span>
                </a>
            </div>

            {{-- Posts List --}}
            @if($posts->count())
                <div class="divide-y divide-zinc-800/60">
                    @foreach($posts as $post)
                        <div class="px-6 py-4 hover:bg-zinc-900/40 transition-colors group">
                            <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4">

                                <div class="min-w-0">
                                    <h4 class="text-sm font-semibold text-zinc-200 truncate group-hover:text-orange-400 transition-colors font-['Poppins',sans-serif]">
                                        {{ $post->title }}
                                    </h4>

                                    <div class="mt-1.5 flex flex-wrap items-center gap-2 text-[11px] text-zinc-500">
                                        @if($post->category)
                                            <span class="text-orange-400 font-medium">
                                                {{ $post->category->name }}
                                            </span>
                                            <span>•</span>
                                        @endif

                                        <span>
                                            Created {{ $post->created_at->format('M j, Y') }}
                                        </span>

                                        @if($post->updated_at != $post->created_at)
                                            <span>•</span>
                                            <span>Updated {{ $post->updated_at->diffForHumans() }}</span>
                                        @endif
                                    </div>
                                </div>

                                {{-- Status & Edit --}}
                                <div class="flex items-center gap-3 shrink-0">
                                    @php
                                        $status = $post->status ?? 'draft';
                                        $statusClasses = match ($status) {
                                            'published' => 'bg-emerald-950/80 text-emerald-400 border-emerald-800/50',
                                            'pending'   => 'bg-amber-950/80 text-amber-500 border-amber-800/50',
                                            'rejected'  => 'bg-rose-950/80 text-rose-400 border-rose-800/50',
                                            default     => 'bg-zinc-800 text-zinc-400 border-zinc-700/50',
                                        };
                                    @endphp

                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full border text-[10px] font-bold uppercase tracking-wider font-['Poppins',sans-serif] {{ $statusClasses }}">
                                        {{ ucfirst($status) }}
                                    </span>

                                    <a href="{{ route('author.posts.edit', $post) }}"
                                       class="px-3 py-1.5 rounded-lg border border-zinc-800 bg-zinc-900 hover:bg-zinc-800 text-xs font-semibold text-zinc-300 hover:text-white transition font-['Poppins',sans-serif]">
                                        Edit
                                    </a>
                                </div>

                            </div>
                        </div>
                    @endforeach
                </div>

                {{-- Pagination --}}
                @if($posts->hasPages())
                    <div class="px-6 py-4 border-t border-zinc-800/80 bg-[#0a0a0a]/50">
                        {{ $posts->links() }}
                    </div>
                @endif

            @else
                {{-- Empty State --}}
                <div class="px-6 py-14 text-center">
                    <div class="mx-auto w-12 h-12 rounded-full bg-orange-950/30 border border-orange-900/40 flex items-center justify-center text-orange-500">
                        ✦
                    </div>
                    <h3 class="mt-3 font-semibold text-sm text-zinc-200 font-['Poppins',sans-serif]">
                        No posts found
                    </h3>
                    <p class="mt-1 text-xs text-zinc-500">
                        Get started by publishing your first piece of writing.
                    </p>
                    <a href="{{ route('author.posts.create') }}"
                       class="inline-flex items-center justify-center gap-2 mt-4 px-5 py-2.5 rounded-xl bg-gradient-to-r from-orange-600 to-amber-600 hover:from-orange-500 hover:to-amber-500 text-white text-xs font-semibold shadow-md shadow-orange-950/30 transition-all font-['Poppins',sans-serif]">
                        <span>Write your first post</span>
                    </a>
                </div>
            @endif

        </div>

    </div>

</x-author-layout>