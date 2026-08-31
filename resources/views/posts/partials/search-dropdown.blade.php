<div id="search-results-list" class="space-y-3">
    {{-- Categories Section --}}
    @if(isset($categories) && $categories->count() > 0)
        <div>
            <div class="px-3 py-1 text-[10px] font-bold uppercase tracking-wider text-rust/80 heading-font">
                Categories
            </div>
            @foreach($categories as $category)
                <a href="{{ route('posts.category', $category) }}" 
                   class="flex items-center justify-between px-3 py-1.5 text-xs text-white/60 hover:bg-rust/10 hover:text-rust rounded-lg transition-colors group">
                    <span>{{ $category->name }}</span>
                    <span class="text-[10px] bg-[#0a0a0a] text-rust/60 px-1.5 py-0.5 rounded border border-white/5 heading-font font-semibold">Category</span>
                </a>
            @endforeach
        </div>
    @endif

    {{-- Posts Section --}}
    @if(isset($posts) && $posts->count() > 0)
        <div>
            <div class="px-3 py-1 text-[10px] font-bold uppercase tracking-wider text-rust/80 heading-font">
                Posts
            </div>
            @foreach($posts->take(5) as $post)
                <a href="{{ route('posts.show', $post) }}" 
                   class="flex items-center justify-between px-3 py-1.5 text-xs text-white/60 hover:bg-rust/10 hover:text-rust rounded-lg transition-colors group">
                    <span class="truncate max-w-[200px] sm:max-w-[280px] heading-font font-medium">{{ $post->title }}</span>
                    <span class="text-[10px] text-white/30 group-hover:text-white/50">Post</span>
                </a>
            @endforeach
        </div>
    @elseif(!isset($categories) || $categories->count() === 0)
        <div class="px-3 py-4 text-center text-xs text-white/30">
            No results found for "{{ $search }}"
        </div>
    @endif
</div>