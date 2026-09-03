@if ($paginator->hasPages())
<nav class="flex flex-col sm:flex-row items-center justify-between gap-4 mt-8" role="navigation" aria-label="Pagination Navigation">
    {{-- Mobile: Previous/Next Only --}}
    <div class="flex w-full sm:hidden items-center justify-between gap-2">
        <ul class="flex items-center gap-1.5 w-full justify-between">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
            <li class="inline-flex" aria-disabled="true">
                <span class="inline-flex items-center px-4 py-2 text-sm font-medium text-[var(--color-text-muted)] bg-[var(--color-bg-card)] border border-[var(--color-border)] cursor-default rounded-xl transition-all duration-300">
                    @lang('pagination.previous')
                </span>
            </li>
            @else
            <li class="inline-flex">
                <a class="inline-flex items-center px-4 py-2 text-sm font-medium text-[var(--color-text-secondary)] bg-[var(--color-bg-card)] border border-[var(--color-border)] rounded-xl hover:bg-[var(--color-primary-soft)] hover:text-[var(--color-primary)] hover:border-[var(--color-primary)] transition-all duration-300" href="{{ $paginator->previousPageUrl() }}" rel="prev">
                    @lang('pagination.previous')
                </a>
            </li>
            @endif

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
            <li class="inline-flex">
                <a class="inline-flex items-center px-4 py-2 text-sm font-medium text-[var(--color-text-secondary)] bg-[var(--color-bg-card)] border border-[var(--color-border)] rounded-xl hover:bg-[var(--color-primary-soft)] hover:text-[var(--color-primary)] hover:border-[var(--color-primary)] transition-all duration-300" href="{{ $paginator->nextPageUrl() }}" rel="next">
                    @lang('pagination.next')
                </a>
            </li>
            @else
            <li class="inline-flex" aria-disabled="true">
                <span class="inline-flex items-center px-4 py-2 text-sm font-medium text-[var(--color-text-muted)] bg-[var(--color-bg-card)] border border-[var(--color-border)] cursor-default rounded-xl transition-all duration-300">
                    @lang('pagination.next')
                </span>
            </li>
            @endif
        </ul>
    </div>

    {{-- Desktop: Full Pagination --}}
    <div class="hidden sm:flex sm:flex-1 sm:items-center sm:justify-between w-full">
        <div>
            <p class="text-sm text-[var(--color-text-secondary)]">
                {!! __('Showing') !!}
                <span class="font-medium text-[var(--color-text-primary)]">{{ $paginator->firstItem() }}</span>
                {!! __('to') !!}
                <span class="font-medium text-[var(--color-text-primary)]">{{ $paginator->lastItem() }}</span>
                {!! __('of') !!}
                <span class="font-medium text-[var(--color-text-primary)]">{{ $paginator->total() }}</span>
                {!! __('results') !!}
            </p>
        </div>

        <div>
            <ul class="flex items-center gap-1.5">
                {{-- Previous Page Link --}}
                @if ($paginator->onFirstPage())
                <li class="inline-flex" aria-disabled="true" aria-label="@lang('pagination.previous')">
                    <span class="inline-flex items-center justify-center w-10 h-10 text-sm font-medium text-[var(--color-text-muted)] bg-[var(--color-bg-card)] border border-[var(--color-border)] cursor-default rounded-xl transition-all duration-300" aria-hidden="true">
                        &lsaquo;
                    </span>
                </li>
                @else
                <li class="inline-flex">
                    <a class="inline-flex items-center justify-center w-10 h-10 text-sm font-medium text-[var(--color-text-secondary)] bg-[var(--color-bg-card)] border border-[var(--color-border)] rounded-xl hover:bg-[var(--color-primary-soft)] hover:text-[var(--color-primary)] hover:border-[var(--color-primary)] transition-all duration-300" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">
                        &lsaquo;
                    </a>
                </li>
                @endif

                {{-- Pagination Elements --}}
                @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                <li class="inline-flex" aria-disabled="true">
                    <span class="inline-flex items-center justify-center w-10 h-10 text-sm font-medium text-[var(--color-text-muted)] bg-[var(--color-bg-card)] border border-[var(--color-border)] cursor-default rounded-xl transition-all duration-300">
                        {{ $element }}
                    </span>
                </li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                @foreach ($element as $page => $url)
                @if ($page == $paginator->currentPage())
                <li class="inline-flex" aria-current="page">
                    <span class="inline-flex items-center justify-center w-10 h-10 text-sm font-semibold text-white bg-[var(--color-primary)] border border-[var(--color-primary)] rounded-xl shadow-lg shadow-[var(--color-primary)]/20">
                        {{ $page }}
                    </span>
                </li>
                @else
                <li class="inline-flex">
                    <a class="inline-flex items-center justify-center w-10 h-10 text-sm font-medium text-[var(--color-text-secondary)] bg-[var(--color-bg-card)] border border-[var(--color-border)] rounded-xl hover:bg-[var(--color-primary-soft)] hover:text-[var(--color-primary)] hover:border-[var(--color-primary)] transition-all duration-300" href="{{ $url }}" aria-label="{{ __('Go to page :page', ['page' => $page]) }}">
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
                    <a class="inline-flex items-center justify-center w-10 h-10 text-sm font-medium text-[var(--color-text-secondary)] bg-[var(--color-bg-card)] border border-[var(--color-border)] rounded-xl hover:bg-[var(--color-primary-soft)] hover:text-[var(--color-primary)] hover:border-[var(--color-primary)] transition-all duration-300" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">
                        &rsaquo;
                    </a>
                </li>
                @else
                <li class="inline-flex" aria-disabled="true" aria-label="@lang('pagination.next')">
                    <span class="inline-flex items-center justify-center w-10 h-10 text-sm font-medium text-[var(--color-text-muted)] bg-[var(--color-bg-card)] border border-[var(--color-border)] cursor-default rounded-xl transition-all duration-300" aria-hidden="true">
                        &rsaquo;
                    </span>
                </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
@endif