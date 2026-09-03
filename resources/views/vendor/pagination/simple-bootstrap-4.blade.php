@if ($paginator->hasPages())
<nav role="navigation" aria-label="Pagination Navigation" class="flex items-center justify-center mt-8">
    <ul class="flex items-center gap-1.5">
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

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
        {{-- "Three Dots" Separator --}}
        @if (is_string($element))
        <li class="inline-flex" aria-disabled="true">
            <span class="inline-flex items-center px-4 py-2 text-sm font-medium text-[var(--color-text-muted)] bg-[var(--color-bg-card)] border border-[var(--color-border)] cursor-default rounded-xl">
                {{ $element }}
            </span>
        </li>
        @endif

        {{-- Array Of Links --}}
        @if (is_array($element))
        @foreach ($element as $page => $url)
        @if ($page == $paginator->currentPage())
        <li class="inline-flex" aria-current="page">
            <span class="inline-flex items-center px-4 py-2 text-sm font-semibold text-white bg-[var(--color-primary)] border border-[var(--color-primary)] rounded-xl shadow-lg shadow-[var(--color-primary)]/20">
                {{ $page }}
            </span>
        </li>
        @else
        <li class="inline-flex">
            <a class="inline-flex items-center px-4 py-2 text-sm font-medium text-[var(--color-text-secondary)] bg-[var(--color-bg-card)] border border-[var(--color-border)] rounded-xl hover:bg-[var(--color-primary-soft)] hover:text-[var(--color-primary)] hover:border-[var(--color-primary)] transition-all duration-300" href="{{ $url }}" aria-label="{{ __('Go to page :page', ['page' => $page]) }}">
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
</nav>
@endif