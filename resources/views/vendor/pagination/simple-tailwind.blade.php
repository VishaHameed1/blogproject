@if ($paginator->hasPages())
    <nav role="navigation" aria-label="Pagination Navigation" class="flex items-center justify-between">
        {{-- Previous Page Link --}}
        <div>
            @if ($paginator->onFirstPage())
                <span class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-white/20 bg-[#121212] border border-white/5 cursor-default leading-5 rounded-xl">
                    {!! __('pagination.previous') !!}
                </span>
            @else
                <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-white/60 bg-[#121212] border border-white/5 leading-5 rounded-xl hover:bg-rust/10 hover:text-rust hover:border-rust/30 transition-all duration-300">
                    {!! __('pagination.previous') !!}
                </a>
            @endif
        </div>

        {{-- Page Numbers --}}
        <div class="hidden sm:flex items-center gap-1.5">
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <span class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-white/20 bg-[#121212] border border-white/5 cursor-default leading-5 rounded-xl">
                        {{ $element }}
                    </span>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <span class="relative inline-flex items-center px-4 py-2 text-sm font-semibold text-white bg-rust border border-rust leading-5 rounded-xl shadow-lg shadow-rust/20" aria-current="page">
                                {{ $page }}
                            </span>
                        @else
                            <a href="{{ $url }}" class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-white/60 bg-[#121212] border border-white/5 leading-5 rounded-xl hover:bg-rust/10 hover:text-rust hover:border-rust/30 transition-all duration-300" aria-label="{{ __('Go to page :page', ['page' => $page]) }}">
                                {{ $page }}
                            </a>
                        @endif
                    @endforeach
                @endif
            @endforeach
        </div>

        {{-- Mobile: Current / Total --}}
        <div class="flex sm:hidden items-center gap-2">
            <span class="text-sm text-white/40">
                {{ $paginator->currentPage() }} / {{ $paginator->lastPage() }}
            </span>
        </div>

        {{-- Next Page Link --}}
        <div>
            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-white/60 bg-[#121212] border border-white/5 leading-5 rounded-xl hover:bg-rust/10 hover:text-rust hover:border-rust/30 transition-all duration-300">
                    {!! __('pagination.next') !!}
                </a>
            @else
                <span class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-white/20 bg-[#121212] border border-white/5 cursor-default leading-5 rounded-xl">
                    {!! __('pagination.next') !!}
                </span>
            @endif
        </div>
    </nav>
@endif