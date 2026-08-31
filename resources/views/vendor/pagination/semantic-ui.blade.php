@if ($paginator->hasPages())
    <div class="flex items-center justify-center gap-1.5 mt-8" role="navigation">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <span class="inline-flex items-center justify-center w-10 h-10 rounded-xl bg-[#121212] border border-white/5 text-white/20 cursor-not-allowed transition-all duration-300">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                </svg>
            </span>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')" class="inline-flex items-center justify-center w-10 h-10 rounded-xl bg-[#121212] border border-white/5 text-white/60 hover:bg-rust/10 hover:text-rust hover:border-rust/30 transition-all duration-300">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                </svg>
            </a>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <span class="inline-flex items-center justify-center w-10 h-10 rounded-xl bg-[#121212] border border-white/5 text-white/20 cursor-not-allowed transition-all duration-300">
                    {{ $element }}
                </span>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <span class="inline-flex items-center justify-center w-10 h-10 rounded-xl bg-rust text-white font-semibold border border-rust shadow-lg shadow-rust/20 transition-all duration-300">
                            {{ $page }}
                        </span>
                    @else
                        <a href="{{ $url }}" class="inline-flex items-center justify-center w-10 h-10 rounded-xl bg-[#121212] border border-white/5 text-white/60 hover:bg-rust/10 hover:text-rust hover:border-rust/30 transition-all duration-300" aria-label="@lang('Go to page :page', ['page' => $page])">
                            {{ $page }}
                        </a>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')" class="inline-flex items-center justify-center w-10 h-10 rounded-xl bg-[#121212] border border-white/5 text-white/60 hover:bg-rust/10 hover:text-rust hover:border-rust/30 transition-all duration-300">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                </svg>
            </a>
        @else
            <span class="inline-flex items-center justify-center w-10 h-10 rounded-xl bg-[#121212] border border-white/5 text-white/20 cursor-not-allowed transition-all duration-300">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                </svg>
            </span>
        @endif
    </div>
@endif