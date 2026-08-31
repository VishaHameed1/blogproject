@extends('layouts.public')

@section('title', isset($category) ? $category->name . ' · chronicle' : 'chronicle · home')

@section('content')

{{-- Featured Posts Carousel Section --}}
@if(!isset($category) && !($search ?? false) && $posts->count() > 0)

    @php
        $featuredPosts = $posts->take(3);
    @endphp

    <section class="bg-[#0a0a0a] text-white py-12 md:py-16 relative overflow-hidden">

        <div class="absolute top-0 right-0 w-1/3 h-full bg-rust/10 blur-3xl"></div>
        <div class="absolute bottom-0 left-0 w-1/4 h-1/3 bg-rust/5 blur-2xl"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">

            <div class="relative overflow-hidden">

                <div id="featured-carousel" class="flex transition-transform duration-700 ease-in-out">

                    @foreach($featuredPosts as $index => $post)

                        <div class="min-w-full px-4">

                            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-12 items-center">

                                {{-- Content --}}
                                <div class="order-2 lg:order-1">

                                    <h2 class="heading-font text-3xl md:text-4xl lg:text-5xl font-bold leading-tight mb-4 tracking-tight text-white">
                                        {{ $post->title }}
                                    </h2>

                                    <p class="text-white/60 text-base md:text-lg max-w-2xl mb-6 leading-relaxed">
                                        {{ Str::limit(strip_tags($post->body), 160) }}
                                    </p>

                                    <div class="flex flex-wrap items-center gap-4 text-sm text-white/40">

                                        {{-- Author Avatar --}}
                                        <div class="flex items-center gap-2">
                                            @if($post->user && $post->user->avatar_url)
                                                <img src="{{ $post->user->avatar_url }}" 
                                                     alt="{{ $post->user->name }}" 
                                                     class="w-8 h-8 rounded-full object-cover border border-rust/30">
                                            @else
                                                <span class="w-8 h-8 rounded-full bg-rust/20 flex items-center justify-center text-xs font-bold text-rust heading-font">
                                                    {{ strtoupper(substr($post->user->name ?? 'A', 0, 1)) }}
                                                </span>
                                            @endif
                                            <span class="text-white/60">
                                                {{ $post->user->name ?? 'Unknown' }}
                                            </span>
                                        </div>

                                        <span class="hidden sm:inline text-white/20">·</span>

                                        <span class="text-white/40">
                                            {{ $post->category->name ?? 'Uncategorized' }}
                                        </span>

                                        <span class="hidden sm:inline text-white/20">·</span>

                                        <span>
                                            @if($post->published_at)
                                                {{ $post->published_at->format('M j, Y') }}
                                            @else
                                                {{ $post->created_at->format('M j, Y') }}
                                            @endif
                                        </span>

                                        <span class="hidden sm:inline text-white/20">·</span>

                                        <span>
                                            {{ $post->read_time ?? 1 }} min read
                                        </span>

                                    </div>

                                    <div class="mt-6">

                                        <a href="{{ route('posts.show', $post) }}"
                                           class="inline-flex items-center gap-2 text-rust hover:text-rust/80 transition-colors duration-300 font-medium group">

                                            Read more

                                            <svg class="w-4 h-4 transition-transform duration-300 group-hover:translate-x-1"
                                                 fill="none"
                                                 stroke="currentColor"
                                                 viewBox="0 0 24 24">

                                                <path stroke-linecap="round"
                                                      stroke-linejoin="round"
                                                      stroke-width="2"
                                                      d="M9 5l7 7-7 7"/>

                                            </svg>

                                        </a>

                                    </div>

                                </div>

                                {{-- Featured Image --}}
                                <div class="order-1 lg:order-2">

                                    <div class="relative rounded-2xl overflow-hidden bg-black/40 aspect-[16/10]">

                                        @if($post->featured_image)

                                            <img src="{{ $post->featured_image_url }}"
                                                 alt="{{ $post->title }}"
                                                 class="w-full h-full object-cover"
                                                 loading="lazy">

                                        @else

                                            <div class="w-full h-full bg-gradient-to-br from-rust/10 to-rust/5 flex items-center justify-center">
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

                        <button
                            class="featured-dot w-2.5 h-2.5 rounded-full transition-all duration-300 {{ $index === 0 ? 'bg-rust w-8' : 'bg-white/20 hover:bg-white/40' }}"
                            data-index="{{ $index }}"
                            aria-label="Go to slide {{ $index + 1 }}">
                        </button>

                    @endforeach

                </div>

            </div>

        </div>

    </section>

@elseif(!isset($category) && !($search ?? false))

    {{-- Hero Section for Home when no posts --}}

    <section class="bg-[#0a0a0a] text-white py-20 md:py-32 relative overflow-hidden">

        <div class="absolute top-0 right-0 w-1/2 h-full bg-rust/5 blur-3xl"></div>
        <div class="absolute bottom-0 left-0 w-1/3 h-1/2 bg-rust/10 blur-3xl"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">

            <div class="max-w-4xl mx-auto text-center">

                <span class="inline-block text-xs uppercase tracking-wider text-rust bg-rust/20 px-4 py-1.5 rounded-full mb-4 animate-fade-in heading-font font-semibold">
                    ✦ Featured
                </span>

                <h1 class="heading-font text-4xl md:text-5xl lg:text-6xl font-bold leading-tight mb-4 tracking-tight animate-slide-up text-white">
                    Stories that
                    <br class="hidden sm:block">
                    <span class="text-rust">matter</span>
                </h1>

                <p class="text-white/50 text-lg max-w-2xl mx-auto animate-slide-up animation-delay-200">
                    Curated essays, fragments, and quiet observations from writers around the world.
                </p>

                <div class="mt-6 flex flex-wrap justify-center gap-4 animate-slide-up animation-delay-400">

                    <a href="#posts"
                       class="px-6 py-2.5 bg-rust text-white rounded-full hover:bg-rust/80 transition-all duration-300 shadow-lg shadow-rust/20 hover:shadow-rust/40 transform hover:scale-105 text-sm font-medium">
                        Explore Posts
                    </a>

                    <a href="{{ route('about') }}"
                       class="px-6 py-2.5 border border-white/10 text-white rounded-full hover:bg-white/5 transition-all duration-300 transform hover:scale-105 text-sm font-medium">
                        Learn More
                    </a>

                </div>

            </div>

        </div>

    </section>

@else

    {{-- Hero Section for Search / Category --}}

    <section class="bg-[#0a0a0a] text-white py-16 md:py-20 relative overflow-hidden">

        <div class="absolute top-0 right-0 w-1/3 h-full bg-rust/10 blur-3xl"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">

            <div class="max-w-3xl mx-auto text-center">

                @if ($search ?? false)

                    {{-- Search Results Header --}}

                    <span class="inline-block text-xs uppercase tracking-wider text-rust border border-rust/30 px-4 py-1.5 rounded-full mb-4 heading-font font-semibold">
                        🔍 Search results
                    </span>

                    <h1 class="heading-font text-4xl md:text-5xl lg:text-6xl font-bold leading-tight mb-4 tracking-tight text-white">
                        Results for “{{ $search }}”
                    </h1>

                    <p class="text-white/50 text-lg">
                        Found {{ $posts->total() }}
                        {{ Str::plural('post', $posts->total()) }}
                    </p>

                @elseif (isset($category))

                    {{-- Category Header --}}

                    <span class="inline-block text-xs uppercase tracking-wider text-rust border border-rust/30 px-4 py-1.5 rounded-full mb-4 heading-font font-semibold">
                        Category
                    </span>

                    <h1 class="heading-font text-4xl md:text-5xl lg:text-6xl font-bold leading-tight mb-4 tracking-tight text-white">
                        {{ $category->name }}
                    </h1>

                    @if ($category->description ?? false)

                        <p class="text-white/50 text-lg">
                            {{ $category->description }}
                        </p>

                    @endif

                @endif

            </div>

        </div>

    </section>

@endif


{{-- Recent Posts Section --}}

<section id="posts" class="bg-[#0a0a0a] py-12">

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        {{-- Section Header --}}
        <div class="flex items-center justify-between mb-8">

            <h2 class="heading-font text-2xl font-bold text-white tracking-tight">

                @if ($search ?? false)

                    Search results

                @elseif (isset($category))

                    {{ $category->name }}

                @else

                    Recent blog posts

                @endif

            </h2>

            <span class="text-sm text-white/20">
                {{ $posts->total() }}
                {{ Str::plural('entry', $posts->total()) }}
            </span>

        </div>


        {{-- Posts Grid --}}

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

            @forelse ($posts as $post)

                {{-- Don't duplicate featured posts on homepage --}}

                @if(isset($featuredPosts) && $featuredPosts->contains('id', $post->id))
                    @continue
                @endif

                <article class="group bg-[#121212] rounded-2xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-500 border border-white/5 hover:border-rust/30 hover:-translate-y-2">

                    {{-- Image --}}

                    <a href="{{ route('posts.show', $post) }}"
                       class="block h-48 overflow-hidden bg-black/30 relative">

                        @if($post->featured_image)

                            <img src="{{ $post->featured_image_url }}"
                                 alt="{{ $post->title }}"
                                 class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700"
                                 loading="lazy">

                        @else

                            <div class="w-full h-full bg-gradient-to-br from-rust/5 to-rust/10 flex items-center justify-center">

                                <div class="text-center">

                                    <span class="text-4xl block mb-2">
                                        📄
                                    </span>

                                    <span class="text-xs text-white/20">
                                        {{ $post->category->name ?? 'Uncategorized' }}
                                    </span>

                                </div>

                            </div>

                        @endif


                        {{-- New Badge --}}

                        @if($post->published_at && $post->published_at->isToday())

                            <span class="absolute top-3 right-3 bg-rust text-white px-2.5 py-0.5 rounded-full text-[10px] font-semibold uppercase tracking-wider z-10 shadow-lg shadow-rust/20 heading-font">
                                New
                            </span>

                        @endif

                    </a>


                    {{-- Card Content --}}

                    <div class="p-6">

                        {{-- Category --}}

                        <a href="{{ route('posts.category', $post->category) }}"
                           class="inline-block text-xs font-medium text-rust bg-rust/10 px-3 py-1 rounded-full mb-3 hover:bg-rust/20 transition-colors duration-300">

                            {{ $post->category->name }}

                        </a>


                        {{-- Title --}}

                        <h3 class="heading-font text-lg font-semibold tracking-tight mb-2">

                            <a href="{{ route('posts.show', $post) }}"
                               class="text-white hover:text-rust transition-colors duration-300 line-clamp-2">

                                {{ $post->title }}

                            </a>

                        </h3>


                        {{-- Excerpt --}}

                        <p class="text-white/40 text-sm leading-relaxed line-clamp-2 mb-4">

                            {{ Str::limit(strip_tags($post->body), 100) }}

                        </p>


                        {{-- Meta --}}

                        <div class="flex items-center justify-between text-xs text-white/20">

                            <div class="flex items-center gap-2">

                                {{-- Author Avatar --}}
                                @if($post->user && $post->user->avatar_url)
                                    <img src="{{ $post->user->avatar_url }}" 
                                         alt="{{ $post->user->name }}" 
                                         class="w-6 h-6 rounded-full object-cover border border-rust/30">
                                @else
                                    <span class="w-6 h-6 rounded-full bg-rust/10 flex items-center justify-center text-[10px] font-bold text-rust heading-font">
                                        {{ strtoupper(substr($post->user->name ?? 'A', 0, 1)) }}
                                    </span>
                                @endif

                                <span class="text-white/30">
                                    {{ $post->user->name ?? 'Unknown' }}
                                </span>

                            </div>

                            <span class="text-white/20">
                                @if($post->published_at)
                                    {{ $post->published_at->format('M j, Y') }}
                                @else
                                    {{ $post->created_at->format('M j, Y') }}
                                @endif
                            </span>

                        </div>

                    </div>

                </article>

            @empty

                {{-- Empty State --}}

                <div class="col-span-full text-center py-12 max-w-md mx-auto">

                    <div class="text-6xl mb-4">
                        📝
                    </div>

                    <h3 class="heading-font text-xl font-bold text-white mb-2 tracking-tight">
                        No posts found
                    </h3>

                    <p class="text-white/40 mb-6">

                        @if ($search ?? false)

                            We couldn't find anything matching
                            “{{ $search }}”.

                        @else

                            Check back soon for new content.

                        @endif

                    </p>


                    @if ($search ?? false)

                        <a href="{{ route('posts.index') }}"
                           class="inline-block text-xs font-medium text-rust hover:text-rust/80 transition-colors">

                            Clear search & view all posts

                        </a>

                    @endif

                </div>

            @endforelse

        </div>


        {{-- Pagination --}}

        @if ($posts->hasPages())

            <div class="mt-12 pt-6 border-t border-white/5">

                {{ $posts->appends(request()->query())->links() }}

            </div>

        @endif

    </div>

</section>

@endsection


@push('scripts')

<script>

document.addEventListener('DOMContentLoaded', function () {

    /*
    |--------------------------------------------------------------------------
    | Featured Carousel
    |--------------------------------------------------------------------------
    */

    const carousel = document.getElementById('featured-carousel');
    const dots = document.querySelectorAll('.featured-dot');

    const slides = carousel
        ? carousel.children.length
        : 0;

    let currentIndex = 0;
    let intervalId = null;


    if (slides > 1) {

        function goToSlide(index) {

            if (index < 0) {
                index = slides - 1;
            }

            if (index >= slides) {
                index = 0;
            }

            currentIndex = index;

            carousel.style.transform =
                `translateX(-${currentIndex * 100}%)`;


            dots.forEach((dot, i) => {

                if (i === currentIndex) {

                    dot.classList.add(
                        'bg-rust',
                        'w-8'
                    );

                    dot.classList.remove(
                        'bg-white/20',
                        'hover:bg-white/40'
                    );

                } else {

                    dot.classList.remove(
                        'bg-rust',
                        'w-8'
                    );

                    dot.classList.add(
                        'bg-white/20',
                        'hover:bg-white/40'
                    );

                }

            });

        }


        function startAutoSlide() {

            if (intervalId) {
                clearInterval(intervalId);
            }

            intervalId = setInterval(() => {

                goToSlide(currentIndex + 1);

            }, 2000);

        }


        const carouselContainer =
            carousel.closest('.relative');


        carouselContainer.addEventListener(
            'mouseenter',
            () => {

                if (intervalId) {
                    clearInterval(intervalId);
                }

            }
        );


        carouselContainer.addEventListener(
            'mouseleave',
            startAutoSlide
        );


        dots.forEach((dot, index) => {

            dot.addEventListener('click', () => {

                goToSlide(index);
                startAutoSlide();

            });

        });


        goToSlide(0);
        startAutoSlide();

    }

});

</script>

@endpush


@push('styles')

<style>

    /* Heading font */
    .heading-font {
        font-family: 'Poppins', ui-sans-serif, system-ui, sans-serif !important;
        letter-spacing: -0.02em !important;
    }

    /* Line clamp utilities */
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

    /* Animations */
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

    /* Post card hover effects */
    .post-card {
        transition: all 0.3s ease;
    }

    .post-card:hover {
        transform: translateY(-4px);
        border-color: rgba(196, 90, 46, 0.3);
    }

    /* Scrollbar styling */
    ::-webkit-scrollbar {
        width: 6px;
    }
    ::-webkit-scrollbar-track {
        background: #0a0a0a;
    }
    ::-webkit-scrollbar-thumb {
        background: #c45a2e;
        border-radius: 3px;
    }
    ::-webkit-scrollbar-thumb:hover {
        background: #a0461a;
    }

</style>

@endpush