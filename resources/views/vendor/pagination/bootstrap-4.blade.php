@if ($paginator->hasPages())
    <nav role="navigation" aria-label="Pagination Navigation" class="flex items-center justify-center mt-8">
        <ul class="flex items-center gap-1.5">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="inline-flex" aria-disabled="true" aria-label="@lang('pagination.previous')">
                    <span class="inline-flex items-center justify-center w-10 h-10 text-sm font-medium text-white/20 bg-[#121212] border border-white/5 cursor-default rounded-xl transition-all duration-300" aria-hidden="true">
                        &lsaquo;
                    </span>
                </li>
            @else
                <li class="inline-flex">
                    <a class="inline-flex items-center justify-center w-10 h-10 text-sm font-medium text-white/60 bg-[#121212] border border-white/5 rounded-xl hover:bg-rust/10 hover:text-rust hover:border-rust/30 transition-all duration-300" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">
                        &lsaquo;
                    </a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="inline-flex" aria-disabled="true">
                        <span class="inline-flex items-center justify-center w-10 h-10 text-sm font-medium text-white/20 bg-[#121212] border border-white/5 cursor-default rounded-xl transition-all duration-300">
                            {{ $element }}
                        </span>
                    </li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="inline-flex" aria-current="page">
                                <span class="inline-flex items-center justify-center w-10 h-10 text-sm font-semibold text-white bg-rust border border-rust rounded-xl shadow-lg shadow-rust/20">
                                    {{ $page }}
                                </span>
                            </li>
                        @else
                            <li class="inline-flex">
                                <a class="inline-flex items-center justify-center w-10 h-10 text-sm font-medium text-white/60 bg-[#121212] border border-white/5 rounded-xl hover:bg-rust/10 hover:text-rust hover:border-rust/30 transition-all duration-300" href="{{ $url }}" aria-label="{{ __('Go to page :page', ['page' => $page]) }}">
                                    {{ $page }}
                                </a>
                            </li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="inline-flex">
                    <a class="inline-flex items-center justify-center w-10 h-10 text-sm font-medium text-white/60 bg-[#121212] border border-white/5 rounded-xl hover:bg-rust/10 hover:text-rust hover:border-rust/30 transition-all duration-300" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">
                        &rsaquo;
                    </a>
                </li>
            @else
                <li class="inline-flex" aria-disabled="true" aria-label="@lang('pagination.next')">
                    <span class="inline-flex items-center justify-center w-10 h-10 text-sm font-medium text-white/20 bg-[#121212] border border-white/5 cursor-default rounded-xl transition-all duration-300" aria-hidden="true">
                        &rsaquo;
                    </span>
                </li>
            @endif
        </ul>
    </nav>
@endif