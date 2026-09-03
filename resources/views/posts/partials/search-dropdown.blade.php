<div id="search-results-list" class="space-y-3">
    <style>
        /* Theme variables */
        :root {
            --color-bg: #F8F9FA;
            --color-bg-card: #FFFFFF;
            --color-text-primary: #111827;
            --color-text-secondary: #6B7280;
            --color-text-muted: #9CA3AF;
            --color-border: #E5E7EB;
            --color-primary: #7C3AED;
            --color-primary-hover: #6D28D9;
            --color-secondary: #3B82F6;
            --color-secondary-hover: #60A5FA;
        }

        [data-theme="dark"] {
            --color-bg: #0A0A0A;
            --color-bg-card: #1A1A1A;
            --color-text-primary: #FFFFFF;
            --color-text-secondary: #A0A0A0;
            --color-text-muted: #6B7280;
            --color-border: #2A2A2A;
            --color-primary: #7C3AED;
            --color-primary-hover: #6D28D9;
            --color-secondary: #3B82F6;
            --color-secondary-hover: #60A5FA;
        }

        /* Heading font */
        .heading-font {
            font-family: 'Poppins', ui-sans-serif, system-ui, -apple-system, sans-serif !important;
            letter-spacing: -0.02em !important;
        }

        /* Search result styles */
        .search-section-title {
            color: var(--color-primary) !important;
        }
        [data-theme="dark"] .search-section-title {
            color: #60A5FA !important;
        }

        .search-result-item {
            color: var(--color-text-secondary) !important;
            transition: all 0.2s ease;
        }
        .search-result-item:hover {
            color: var(--color-primary) !important;
            background-color: rgba(124, 58, 237, 0.08) !important;
        }
        [data-theme="dark"] .search-result-item:hover {
            color: #60A5FA !important;
            background-color: rgba(59, 130, 246, 0.08) !important;
        }

        .search-result-tag {
            background-color: var(--color-bg) !important;
            color: var(--color-primary) !important;
            border-color: var(--color-border) !important;
        }
        [data-theme="dark"] .search-result-tag {
            color: #60A5FA !important;
            border-color: rgba(59, 130, 246, 0.2) !important;
        }

        .search-result-avatar {
            border-color: rgba(124, 58, 237, 0.3) !important;
        }
        [data-theme="dark"] .search-result-avatar {
            border-color: rgba(59, 130, 246, 0.3) !important;
        }

        .search-result-avatar-fallback {
            background-color: rgba(124, 58, 237, 0.2) !important;
            color: var(--color-primary) !important;
        }
        [data-theme="dark"] .search-result-avatar-fallback {
            background-color: rgba(59, 130, 246, 0.2) !important;
            color: #60A5FA !important;
        }

        .search-result-category {
            color: var(--color-text-muted) !important;
        }
        .search-result-item:hover .search-result-category {
            color: var(--color-text-secondary) !important;
        }
        [data-theme="dark"] .search-result-item:hover .search-result-category {
            color: #A0A0A0 !important;
        }

        .search-no-results {
            color: var(--color-text-muted) !important;
        }
        .search-no-results-highlight {
            color: var(--color-text-secondary) !important;
        }
        [data-theme="dark"] .search-no-results-highlight {
            color: var(--color-text-primary) !important;
        }
    </style>

    {{-- Categories Section --}}
    @if(isset($categories) && $categories->count() > 0)
        <div>
            <div class="px-3 py-1 text-[10px] font-bold uppercase tracking-wider search-section-title heading-font">
                Categories
            </div>
            @foreach($categories as $category)
                <a href="{{ route('posts.category', $category) }}" 
                   class="search-result-item flex items-center justify-between px-3 py-1.5 text-xs rounded-lg transition-colors group">
                    <span class="heading-font font-medium">{{ $category->name }}</span>
                    <span class="search-result-tag text-[10px] px-1.5 py-0.5 rounded border heading-font font-semibold">Category</span>
                </a>
            @endforeach
        </div>
    @endif

    {{-- Posts Section --}}
    @if(isset($posts) && $posts->count() > 0)
        <div>
            <div class="px-3 py-1 text-[10px] font-bold uppercase tracking-wider search-section-title heading-font">
                Posts
            </div>
            @foreach($posts->take(5) as $post)
                <a href="{{ route('posts.show', $post) }}" 
                   class="search-result-item flex items-center justify-between px-3 py-1.5 text-xs rounded-lg transition-colors group">
                    <div class="flex items-center gap-2 min-w-0">
                        {{-- Author Avatar --}}
                        @if($post->user && $post->user->avatar_url)
                            <img src="{{ $post->user->avatar_url }}" 
                                 alt="{{ $post->user->name }}" 
                                 class="w-5 h-5 rounded-full object-cover search-result-avatar shrink-0">
                        @else
                            <span class="w-5 h-5 rounded-full search-result-avatar-fallback flex items-center justify-center text-[8px] font-bold heading-font shrink-0">
                                {{ strtoupper(substr($post->user->name ?? 'A', 0, 1)) }}
                            </span>
                        @endif
                        <span class="truncate max-w-[160px] sm:max-w-[240px] heading-font font-medium">{{ $post->title }}</span>
                    </div>
                    <span class="search-result-category text-[10px] group-hover:text-[var(--color-text-secondary)] shrink-0 ml-2 transition-colors">
                        {{ $post->category->name ?? 'Uncategorized' }}
                    </span>
                </a>
            @endforeach
        </div>
    @elseif(!isset($categories) || $categories->count() === 0)
        <div class="px-3 py-4 text-center text-xs search-no-results">
            No results found for "<span class="search-no-results-highlight">{{ $search ?? '' }}</span>"
        </div>
    @endif
</div>