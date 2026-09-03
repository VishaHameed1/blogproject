@extends('layouts.public')

@section('title', isset($category) ? $category->name . ' · chronicle' : 'chronicle · home')

@section('content')

<style>
    .heading-font {
        font-family: 'Poppins', ui-sans-serif, system-ui, sans-serif !important;
        letter-spacing: -0.02em !important;
    }

    ::selection {
        background-color: var(--color-primary) !important;
        color: #ffffff !important;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
        }

        to {
            opacity: 1;
        }
    }

    @keyframes slideUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .animate-fade-in {
        animation: fadeIn 0.8s ease-out forwards;
    }

    .animate-slide-up {
        animation: slideUp 0.8s ease-out forwards;
        opacity: 0;
    }

    .animation-delay-200 {
        animation-delay: 0.2s;
    }

    .animation-delay-400 {
        animation-delay: 0.4s;
    }

    .line-clamp-1 {
        display: -webkit-box;
        -webkit-line-clamp: 1;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .line-clamp-2 {
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .badge-new {
        background-color: var(--color-primary) !important;
        color: #ffffff !important;
    }

    .avatar-border {
        border: 2px solid var(--color-primary-soft) !important;
    }

    .avatar-fallback {
        background-color: var(--color-primary-soft) !important;
        color: var(--color-primary) !important;
    }

    .post-card {
        transition: all 0.5s ease;
    }

    .post-card:hover {
        transform: translateY(-8px);
    }

    .post-card-title {
        transition: all 0.3s ease;
    }

    .featured-dot-active {
        background-color: var(--color-primary) !important;
        width: 2rem !important;
    }

    .featured-dot-inactive {
        background-color: var(--color-text-muted) !important;
        opacity: 0.2;
    }

    .featured-dot-inactive:hover {
        background-color: var(--color-text-secondary) !important;
        opacity: 0.4;
    }

    ::-webkit-scrollbar {
        width: 6px;
    }

    ::-webkit-scrollbar-track {
        background: var(--color-bg);
    }

    ::-webkit-scrollbar-thumb {
        background: var(--color-primary);
        border-radius: 3px;
    }

    ::-webkit-scrollbar-thumb:hover {
        background: var(--color-primary-hover);
    }

    /* Hero Card Border Effect */
    .hero-card {
        transition: all 0.3s ease;
        background: var(--color-bg-card);
        border: 1px solid var(--color-border);
        border-radius: 1.5rem;
        box-shadow: 0 4px 20px var(--color-shadow);
    }

    .hero-card:hover {
        box-shadow: 0 8px 40px var(--color-shadow-hover);
        border-color: var(--color-primary);
    }

    [data-theme="dark"] .hero-card {
        border-color: var(--color-border);
    }

    [data-theme="dark"] .hero-card:hover {
        border-color: var(--color-primary);
    }

    /* Theme-specific primary color mappings */
    :root,
    [data-theme="light"] {
        --color-primary: #7C3AED;
        --color-primary-hover: #6D28D9;
        --color-primary-soft: #F3E8FF;
    }

    [data-theme="dark"] {
        --color-primary: #3B82F6;
        --color-primary-hover: #2563EB;
        --color-primary-soft: #1E3A8A;
    }
</style>


{{-- ============================================================
     FEATURED POSTS CAROUSEL - WITH BORDER + SHADOW
============================================================ --}}

@if(!isset($category) && !($search ?? false) && $posts->count() > 0)

@php
$featuredPosts = $posts->take(3);
@endphp

<section class="bg-[var(--color-bg)] py-12 md:py-16 relative overflow-hidden">

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">

        {{-- Hero Card with Border --}}
        <div class="hero-card p-6 sm:p-8 md:p-10 lg:p-12">

            <div class="relative overflow-hidden">

                <div id="featured-carousel" class="flex transition-transform duration-700 ease-in-out">

                    @foreach($featuredPosts as $index => $post)

                    <div class="min-w-full">

                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-12 items-center">

                            {{-- Content --}}
                            <div class="order-2 lg:order-1">

                                <h2 class="heading-font text-3xl md:text-4xl lg:text-5xl font-bold leading-tight mb-4 tracking-tight text-[var(--color-text-primary)]">
                                    {{ $post->title }}
                                </h2>

                                <p class="text-[var(--color-text-secondary)] text-base md:text-lg max-w-2xl mb-6 leading-relaxed">
                                    {{ Str::limit(strip_tags($post->body ?? $post->content ?? ''), 160) }}
                                </p>

                                <div class="flex flex-wrap items-center gap-4 text-sm text-[var(--color-text-muted)]">

                                    {{-- Author --}}
                                    <div class="flex items-center gap-2">

                                        @if($post->user && $post->user->avatar_url)
                                        <img src="{{ $post->user->avatar_url }}" alt="{{ $post->user->name }}"
                                            class="w-8 h-8 rounded-full object-cover avatar-border" loading="lazy">
                                        @else
                                        <span class="w-8 h-8 rounded-full avatar-fallback flex items-center justify-center text-xs font-bold heading-font">
                                            {{ strtoupper(substr($post->user->name ?? 'A', 0, 1)) }}
                                        </span>
                                        @endif

                                        <span class="text-[var(--color-text-secondary)]">
                                            {{ $post->user->name ?? 'Unknown' }}
                                        </span>

                                    </div>

                                    <span class="hidden sm:inline text-[var(--color-text-muted)]">·</span>

                                    <span class="text-[var(--color-text-muted)]">
                                        {{ $post->category->name ?? 'Uncategorized' }}
                                    </span>

                                    <span class="hidden sm:inline text-[var(--color-text-muted)]">·</span>

                                    <span>
                                        @if($post->published_at)
                                        {{ $post->published_at->format('M j, Y') }}
                                        @else
                                        {{ $post->created_at?->format('M j, Y') }}
                                        @endif
                                    </span>

                                    <span class="hidden sm:inline text-[var(--color-text-muted)]">·</span>

                                    <span>{{ $post->read_time ?? 1 }} min read</span>

                                </div>

                                <div class="mt-6">
                                    <a href="{{ route('posts.show', $post) }}"
                                        class="text-[var(--color-primary)] hover:text-[var(--color-primary-hover)] inline-flex items-center gap-2 font-medium group transition-colors duration-300">
                                        Read more
                                        <svg class="w-4 h-4 transition-transform duration-300 group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                        </svg>
                                    </a>
                                </div>

                            </div>

                            {{-- Featured Image --}}
                            <div class="order-1 lg:order-2">
                                <div class="relative rounded-2xl overflow-hidden bg-[var(--color-bg)] aspect-[16/10]">
                                    @if($post->featured_image_url)
                                    <img src="{{ $post->featured_image_url }}" alt="{{ $post->title }}"
                                        class="w-full h-full object-cover"
                                        loading="{{ $index === 0 ? 'eager' : 'lazy' }}"
                                        @if($index===0) fetchpriority="high" @endif>
                                    @else
                                    <div class="w-full h-full flex items-center justify-center bg-[var(--color-bg)]">
                                        <span class="text-6xl">📄</span>
                                    </div>
                                    @endif
                                </div>
                            </div>

                        </div>

                    </div>

                    @endforeach

                </div>

                {{-- Carousel Dots --}}
                <div class="flex justify-center gap-2 mt-8">
                    @foreach($featuredPosts as $index => $post)
                    <button type="button"
                        class="featured-dot rounded-full transition-all duration-300 h-2.5 {{ $index === 0 ? 'featured-dot-active' : 'featured-dot-inactive' }}"
                        data-index="{{ $index }}"
                        aria-label="Go to slide {{ $index + 1 }}">
                    </button>
                    @endforeach
                </div>

            </div>

        </div>

    </div>

</section>


@elseif(!isset($category) && !($search ?? false))

{{-- ============================================================
     EMPTY HOME HERO - WITH BORDER + SHADOW
============================================================ --}}

<section class="bg-[var(--color-bg)] py-20 md:py-32 relative overflow-hidden">

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">

        {{-- Hero Card with Border --}}
        <div class="hero-card p-8 sm:p-10 md:p-12 lg:p-14 max-w-4xl mx-auto text-center">

            <span class="inline-block text-xs uppercase tracking-wider px-4 py-1.5 rounded-full mb-4 animate-fade-in heading-font font-semibold border text-[var(--color-primary)] bg-[var(--color-primary-soft)] border-[var(--color-border)]">
                ✦ Featured
            </span>

            <h1 class="heading-font text-4xl md:text-5xl lg:text-6xl font-bold leading-tight mb-4 tracking-tight text-[var(--color-text-primary)] animate-slide-up">
                Stories that
                <br class="hidden sm:block">
                <span class="text-[var(--color-primary)]">matter</span>
            </h1>

            <p class="text-[var(--color-text-secondary)] text-lg max-w-2xl mx-auto animate-slide-up animation-delay-200">
                Curated essays, fragments, and quiet observations from writers around the world.
            </p>

            <div class="mt-6 flex flex-wrap justify-center gap-4 animate-slide-up animation-delay-400">

                <a href="#posts"
                    class="px-6 py-2.5 rounded-full transition-all duration-300 shadow-lg shadow-[var(--color-primary)]/20 hover:shadow-[var(--color-primary)]/40 transform hover:scale-105 text-sm font-medium bg-[var(--color-primary)] hover:bg-[var(--color-primary-hover)] text-white">
                    Explore Posts
                </a>

                <a href="{{ route('about') }}"
                    class="px-6 py-2.5 rounded-full transition-all duration-300 transform hover:scale-105 text-sm font-medium border border-[var(--color-border)] text-[var(--color-text-secondary)] hover:bg-[var(--color-bg)]">
                    Learn More
                </a>

            </div>

        </div>

    </div>

</section>


@else

{{-- ============================================================
     SEARCH / CATEGORY HERO - WITH BORDER + SHADOW
============================================================ --}}

<section class="bg-[var(--color-bg)] py-16 md:py-20 relative overflow-hidden">

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">

        {{-- Hero Card with Border --}}
        <div class="hero-card p-8 sm:p-10 md:p-12 max-w-3xl mx-auto text-center">

            @if($search ?? false)

            <span class="inline-block text-xs uppercase tracking-wider px-4 py-1.5 rounded-full mb-4 heading-font font-semibold border text-[var(--color-primary)] bg-[var(--color-primary-soft)] border-[var(--color-border)]">
                🔍 Search results
            </span>

            <h1 class="heading-font text-4xl md:text-5xl lg:text-6xl font-bold leading-tight mb-4 tracking-tight text-[var(--color-text-primary)]">
                Results for “{{ $search }}”
            </h1>

            <p class="text-[var(--color-text-secondary)] text-lg">
                Found {{ $posts->total() }} {{ Str::plural('post', $posts->total()) }}
            </p>

            @elseif(isset($category))

            <span class="inline-block text-xs uppercase tracking-wider px-4 py-1.5 rounded-full mb-4 heading-font font-semibold border text-[var(--color-primary)] bg-[var(--color-primary-soft)] border-[var(--color-border)]">
                Category
            </span>

            <h1 class="heading-font text-4xl md:text-5xl lg:text-6xl font-bold leading-tight mb-4 tracking-tight text-[var(--color-text-primary)]">
                {{ $category->name }}
            </h1>

            @if($category->description)
            <p class="text-[var(--color-text-secondary)] text-lg">
                {{ $category->description }}
            </p>
            @endif

            @endif

        </div>

    </div>

</section>

@endif


{{-- ============================================================
     RECENT POSTS
============================================================ --}}

<section id="posts" class="bg-[var(--color-bg)] py-12">

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        {{-- Header --}}
        <div class="flex items-center justify-between mb-8">

            <h2 class="heading-font text-2xl font-bold tracking-tight text-[var(--color-text-primary)]">

                @if($search ?? false)
                Search results
                @elseif(isset($category))
                {{ $category->name }}
                @else
                Recent blog posts
                @endif

            </h2>

            <span class="text-[var(--color-text-muted)] text-sm">
                {{ $posts->total() }} {{ Str::plural('entry', $posts->total()) }}
            </span>

        </div>

        {{-- Posts Grid --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

            @forelse($posts as $post)

            @if(isset($featuredPosts) && $featuredPosts->contains('id', $post->id))
            @continue
            @endif

            <article class="post-card group rounded-2xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-500 border border-[var(--color-border)] bg-[var(--color-bg-card)] hover:border-[var(--color-primary)]">

                {{-- IMAGE --}}
                <a href="{{ route('posts.show', $post) }}" class="block h-48 overflow-hidden bg-[var(--color-bg)] relative">

                    @if($post->featured_image_url)
                    <img src="{{ $post->featured_image_url }}" alt="{{ $post->title }}"
                        class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700"
                        loading="lazy">
                    @else
                    <div class="w-full h-full bg-[var(--color-bg)] flex items-center justify-center">
                        <div class="text-center">
                            <span class="text-4xl block mb-2">📄</span>
                            <span class="text-xs text-[var(--color-text-muted)]">
                                {{ $post->category->name ?? 'Uncategorized' }}
                            </span>
                        </div>
                    </div>
                    @endif

                    {{-- New Badge --}}
                    @if($post->published_at && $post->published_at->isToday())
                    <span class="badge-new absolute top-3 right-3 px-2.5 py-0.5 rounded-full text-[10px] font-semibold uppercase tracking-wider z-10 shadow-lg shadow-[var(--color-primary)]/20 heading-font">
                        New
                    </span>
                    @endif

                </a>

                {{-- CARD CONTENT --}}
                <div class="p-6">

                    {{-- Category --}}
                    @if($post->category)
                    <a href="{{ route('posts.category', $post->category) }}"
                        class="inline-block text-xs font-medium px-3 py-1 rounded-full mb-3 transition-colors duration-300 text-[var(--color-primary)] bg-[var(--color-primary-soft)] hover:bg-[var(--color-primary-soft)]">
                        {{ $post->category->name }}
                    </a>
                    @endif

                    {{-- Title --}}
                    <h3 class="heading-font text-lg font-semibold tracking-tight mb-2">
                        <a href="{{ route('posts.show', $post) }}"
                            class="text-[var(--color-text-primary)] hover:text-[var(--color-primary)] line-clamp-2">
                            {{ $post->title }}
                        </a>
                    </h3>

                    {{-- Excerpt --}}
                    <p class="text-[var(--color-text-secondary)] text-sm leading-relaxed line-clamp-2 mb-4">
                        {{ Str::limit(strip_tags($post->body ?? $post->content ?? $post->excerpt ?? ''), 100) }}
                    </p>

                    {{-- Meta --}}
                    <div class="flex items-center justify-between text-xs text-[var(--color-text-muted)]">

                        <div class="flex items-center gap-2">

                            @if($post->user && $post->user->avatar_url)
                            <img src="{{ $post->user->avatar_url }}" alt="{{ $post->user->name }}"
                                class="w-6 h-6 rounded-full object-cover avatar-border" loading="lazy">
                            @else
                            <span class="w-6 h-6 rounded-full avatar-fallback flex items-center justify-center text-[10px] font-bold heading-font">
                                {{ strtoupper(substr($post->user->name ?? 'A', 0, 1)) }}
                            </span>
                            @endif

                            <span class="text-[var(--color-text-secondary)]">
                                {{ $post->user->name ?? 'Unknown' }}
                            </span>

                        </div>

                        <span>
                            @if($post->published_at)
                            {{ $post->published_at->format('M j, Y') }}
                            @else
                            {{ $post->created_at?->format('M j, Y') }}
                            @endif
                        </span>

                    </div>

                </div>

            </article>

            @empty

            {{-- Empty State --}}
            <div class="col-span-full text-center py-12 max-w-md mx-auto">

                <div class="text-[var(--color-text-muted)] text-6xl mb-4">📝</div>

                <h3 class="heading-font text-xl font-bold mb-2 tracking-tight text-[var(--color-text-primary)]">
                    No posts found
                </h3>

                <p class="text-[var(--color-text-muted)] mb-6">

                    @if($search ?? false)
                    We couldn't find anything matching “{{ $search }}”.
                    @else
                    Check back soon for new content.
                    @endif

                </p>

                @if($search ?? false)
                <a href="{{ route('posts.index') }}"
                    class="inline-block text-xs font-medium transition-colors text-[var(--color-primary)] hover:text-[var(--color-primary-hover)]">
                    Clear search & view all posts
                </a>
                @endif

            </div>

            @endforelse

        </div>

        {{-- Pagination --}}
        @if($posts->hasPages())
        <div class="mt-12 pt-6 border-t border-[var(--color-border)]">
            {{ $posts->appends(request()->query())->links() }}
        </div>
        @endif

    </div>

</section>

@endsection


{{-- ================================================================
     SCRIPTS
================================================================ --}}
@push('scripts')

<script>
    document.addEventListener('DOMContentLoaded', function() {

        const carousel = document.getElementById('featured-carousel');
        const dots = document.querySelectorAll('.featured-dot');

        if (!carousel) return;

        const slides = carousel.children.length;

        if (slides <= 1) return;

        let currentIndex = 0;
        let intervalId = null;

        function goToSlide(index) {

            if (index < 0) index = slides - 1;
            if (index >= slides) index = 0;

            currentIndex = index;

            carousel.style.transform =
                `translateX(-${currentIndex * 100}%)`;

            dots.forEach((dot, i) => {

                if (i === currentIndex) {
                    dot.classList.add('featured-dot-active');
                    dot.classList.remove('featured-dot-inactive');
                } else {
                    dot.classList.remove('featured-dot-active');
                    dot.classList.add('featured-dot-inactive');
                }

            });
        }

        function startAutoSlide() {

            if (intervalId) clearInterval(intervalId);

            intervalId = setInterval(function() {
                goToSlide(currentIndex + 1);
            }, 5000);
        }

        const carouselContainer = carousel.closest('.relative');

        if (carouselContainer) {

            carouselContainer.addEventListener('mouseenter', function() {
                if (intervalId) clearInterval(intervalId);
            });

            carouselContainer.addEventListener('mouseleave', function() {
                startAutoSlide();
            });
        }

        dots.forEach(function(dot, index) {

            dot.addEventListener('click', function() {
                goToSlide(index);
                startAutoSlide();
            });

        });

        goToSlide(0);
        startAutoSlide();

    });
</script>

@endpush