@if ($paginator->hasPages())
<nav role="navigation" aria-label="Pagination Navigation" class="flex items-center justify-center gap-2 mt-8">
    {{-- Previous Page Link --}}
    @if ($paginator->onFirstPage())
    <span class="inline-flex items-center px-4 py-2 text-sm font-medium text-[var(--color-text-muted)] bg-[var(--color-bg-card)] border border-[var(--color-border)] cursor-default rounded-xl transition-all duration-300">
        @lang('pagination.previous')
    </span>
    @else
    <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="inline-flex items-center px-4 py-2 text-sm font-medium text-[var(--color-text-secondary)] bg-[var(--color-bg-card)] border border-[var(--color-border)] rounded-xl hover:bg-[var(--color-primary-soft)] hover:text-[var(--color-primary)] hover:border-[var(--color-primary)] transition-all duration-300">
        @lang('pagination.previous')
    </a>
    @endif

    {{-- Pagination Elements --}}
    <div class="flex items-center gap-1.5">
        @foreach ($elements as $element)
        {{-- "Three Dots" Separator --}}
        @if (is_string($element))
        <span class="inline-flex items-center px-4 py-2 text-sm font-medium text-[var(--color-text-muted)] bg-[var(--color-bg-card)] border border-[var(--color-border)] cursor-default rounded-xl">
            {{ $element }}
        </span>
        @endif

        {{-- Array Of Links --}}
        @if (is_array($element))
        @foreach ($element as $page => $url)
        @if ($page == $paginator->currentPage())
        <span class="inline-flex items-center px-4 py-2 text-sm font-semibold text-white bg-[var(--color-primary)] border border-[var(--color-primary)] rounded-xl shadow-lg shadow-[var(--color-primary)]/20" aria-current="page">
            {{ $page }}
        </span>
        @else
        <a href="{{ $url }}" class="inline-flex items-center px-4 py-2 text-sm font-medium text-[var(--color-text-secondary)] bg-[var(--color-bg-card)] border border-[var(--color-border)] rounded-xl hover:bg-[var(--color-primary-soft)] hover:text-[var(--color-primary)] hover:border-[var(--color-primary)] transition-all duration-300" aria-label="{{ __('Go to page :page', ['page' => $page]) }}">
            {{ $page }}
        </a>
        @endif
        @endforeach
        @endif
        @endforeach
    </div>

    {{-- Next Page Link --}}
    @if ($paginator->hasMorePages())
    <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="inline-flex items-center px-4 py-2 text-sm font-medium text-[var(--color-text-secondary)] bg-[var(--color-bg-card)] border border-[var(--color-border)] rounded-xl hover:bg-[var(--color-primary-soft)] hover:text-[var(--color-primary)] hover:border-[var(--color-primary)] transition-all duration-300">
        @lang('pagination.next')
    </a>
    @else
    <span class="inline-flex items-center px-4 py-2 text-sm font-medium text-[var(--color-text-muted)] bg-[var(--color-bg-card)] border border-[var(--color-border)] cursor-default rounded-xl transition-all duration-300">
        @lang('pagination.next')
    </span>
    @endif
</nav>
@endif