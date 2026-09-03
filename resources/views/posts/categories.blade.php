@extends('layouts.public')

@section('title', 'Categories · chronicle')

@section('content')

<section
    class="w-full min-h-[calc(100vh-80px)]
           bg-[#F8F9FA] dark:bg-black
           py-6 md:py-8 flex flex-col justify-between
           selection:bg-[rgba(124,58,237,0.3)]
           dark:selection:bg-[rgba(59,130,246,0.3)]
           selection:text-white">

    <style>
        /* =========================================================
           CHRONICLE CATEGORY PAGE
           Editorial / Modern Tech Blog Color System
        ========================================================= */

        .heading-font {
            font-family: 'Poppins', ui-sans-serif, system-ui, sans-serif !important;
            letter-spacing: -0.02em !important;
        }

        .body-font {
            font-family: 'Work Sans', ui-sans-serif, system-ui, sans-serif !important;
        }

        /* =========================================================
           SCROLLBAR
        ========================================================= */

        .scrollbar-none::-webkit-scrollbar {
            display: none;
        }

        .scrollbar-none {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }

        /* =========================================================
           LINE CLAMP
        ========================================================= */

        .line-clamp-2 {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        /* =========================================================
           SELECTION
        ========================================================= */

        ::selection {
            background: rgba(124, 58, 237, 0.3) !important;
            color: #ffffff !important;
        }

        /* =========================================================
           CATEGORY CARD IMAGE
        ========================================================= */

        .category-card-image {
            background: #FFFFFF;
            border-color: #E5E7EB;

            transition:
                border-color 0.3s ease,
                box-shadow 0.3s ease;
        }

        .dark .category-card-image {
            background: #121212;
            border-color: rgba(255, 255, 255, 0.05);
        }

        .category-card:hover .category-card-image {
            border-color: #7C3AED;
            box-shadow: 0 20px 40px rgba(124, 58, 237, 0.12);
        }

        .dark .category-card:hover .category-card-image {
            border-color: #3B82F6;
            box-shadow: 0 20px 40px rgba(59, 130, 246, 0.12);
        }

        /* =========================================================
           CATEGORY TITLE
        ========================================================= */

        .category-card-title {
            color: #1A1A2E;
            transition: color 0.3s ease;
        }

        .dark .category-card-title {
            color: #FFFFFF;
        }

        .category-card:hover .category-card-title {
            color: #7C3AED;
        }

        .dark .category-card:hover .category-card-title {
            color: #3B82F6;
        }

        /* =========================================================
           DESCRIPTION
        ========================================================= */

        .category-card-description {
            color: #9CA3AF;
        }

        .dark .category-card-description {
            color: #6B7280;
        }

        /* =========================================================
           POST COUNT
        ========================================================= */

        .category-card-count {
            background: #F8F9FA;
            color: #6B7280;
            border-color: #E5E7EB;
        }

        .dark .category-card-count {
            background: #000000;
            color: #A0A0A0;
            border-color: rgba(255, 255, 255, 0.05);
        }

        /* =========================================================
           ARROW
        ========================================================= */

        .category-card-arrow {
            color: #9CA3AF;
            transition: all 0.3s ease;
        }

        .category-card:hover .category-card-arrow {
            color: #7C3AED;
            transform: translateX(4px);
        }

        .dark .category-card:hover .category-card-arrow {
            color: #3B82F6;
        }

        /* =========================================================
           NO MEDIA
        ========================================================= */

        .category-card-no-media {
            color: #9CA3AF;
            background: #FFFFFF;
        }

        .dark .category-card-no-media {
            color: #6B7280;
            background: #121212;
        }

        .category-card:hover .category-card-no-media {
            color: #7C3AED;
        }

        .dark .category-card:hover .category-card-no-media {
            color: #3B82F6;
        }

        /* =========================================================
           SECTION LABEL
        ========================================================= */

        .section-title-label {
            color: #7C3AED;
        }

        .dark .section-title-label {
            color: #3B82F6;
        }

        /* =========================================================
           METADATA
        ========================================================= */

        .metadata-label {
            color: #9CA3AF;
        }

        .dark .metadata-label {
            color: #6B7280;
        }

        .metadata-value {
            color: #1A1A2E;
        }

        .dark .metadata-value {
            color: #FFFFFF;
        }

        /* =========================================================
           BOTTOM BAR
        ========================================================= */

        .bottom-bar {
            border-color: #E5E7EB;
        }

        .dark .bottom-bar {
            border-color: rgba(255, 255, 255, 0.05);
        }

        .bottom-bar-link {
            color: #9CA3AF;
            transition: color 0.3s ease;
        }

        .dark .bottom-bar-link {
            color: #6B7280;
        }

        .bottom-bar-link:hover {
            color: #1A1A2E;
        }

        .dark .bottom-bar-link:hover {
            color: #FFFFFF;
        }

        .bottom-bar-social {
            color: #9CA3AF;
            transition: color 0.3s ease;
        }

        .dark .bottom-bar-social {
            color: #6B7280;
        }

        .bottom-bar-social:hover {
            color: #7C3AED;
        }

        .dark .bottom-bar-social:hover {
            color: #3B82F6;
        }

        /* =========================================================
           MOBILE INDICATOR
        ========================================================= */

        .mobile-indicator-text {
            color: #7C3AED;
        }

        .dark .mobile-indicator-text {
            color: #3B82F6;
        }

        /* =========================================================
           EMPTY STATE
        ========================================================= */

        .no-categories {
            border-color: #E5E7EB;
            color: #9CA3AF;
            background: #FFFFFF;
        }

        .dark .no-categories {
            border-color: rgba(255, 255, 255, 0.05);
            color: #6B7280;
            background: #121212;
        }
    </style>


    {{-- =========================================================
         MAIN CONTENT
    ========================================================== --}}

    <div class="max-w-[1700px] mx-auto w-full px-6 md:px-12 flex-1 flex items-center">

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-10 items-center w-full">


            {{-- =================================================
                 LEFT: INTRO
            ================================================== --}}

            <div class="lg:col-span-4 space-y-4">

                <div>

                    <span
                        class="text-xs uppercase tracking-widest
                               section-title-label block mb-1
                               heading-font font-semibold">
                        Explore Topics
                    </span>

                    <h1
                        class="heading-font text-3xl sm:text-4xl lg:text-5xl
                               font-bold
                               text-[#1A1A2E] dark:text-white
                               tracking-tight leading-tight">
                        Categories & Collections
                    </h1>

                </div>


                <p
                    class="text-xs md:text-sm
                           text-[#9CA3AF] dark:text-[#6B7280]
                           leading-relaxed max-w-sm">
                    Browse our curated collections by topic. Select a category
                    to reveal deep dives, technical essays, and insights.
                </p>


                {{-- Metadata --}}

                <div
                    class="pt-4
                           border-t border-[#E5E7EB]
                           dark:border-white/5
                           space-y-1.5 text-xs
                           text-[#9CA3AF] dark:text-[#6B7280]
                           max-w-sm">

                    <div class="flex justify-between">

                        <span class="metadata-label">
                            Total Topics:
                        </span>

                        <span class="metadata-value font-bold">
                            {{ $categories->count() }}
                        </span>

                    </div>


                    <div class="flex justify-between">

                        <span class="metadata-label">
                            Navigation:
                        </span>

                        <span
                            class="hidden md:inline
                                   text-[#6B7280] dark:text-[#A0A0A0]">
                            Swipe / Drag / Arrow Keys
                        </span>

                        <span
                            class="md:hidden
                                   text-[#6B7280] dark:text-[#A0A0A0]">
                            Swipe / Touch
                        </span>

                    </div>

                </div>


                {{-- Mobile Indicator --}}

                <div class="flex items-center gap-2 pt-1 md:hidden">

                    <span
                        id="scrollProgress"
                        class="text-[10px] uppercase tracking-wider
                               mobile-indicator-text
                               heading-font font-semibold">
                        Card 1 of {{ max(1, $categories->count()) }}
                    </span>

                </div>

            </div>


            {{-- =================================================
                 RIGHT: CATEGORY CARDS
            ================================================== --}}

            <div class="lg:col-span-8 relative">

                <div
                    id="categoryContainer"
                    tabindex="0"
                    class="flex gap-5 overflow-x-auto
                           snap-x snap-mandatory
                           scrollbar-none
                           pb-4 pt-1 px-1
                           cursor-grab active:cursor-grabbing
                           outline-none">

                    @forelse ($categories as $category)

                    <a
                        href="{{ route('posts.category', $category) }}"
                        class="category-card snap-start shrink-0
                                   w-[260px] sm:w-[290px]
                                   md:w-[310px] lg:w-[330px]
                                   group flex flex-col
                                   justify-between select-none">

                        {{-- =================================
                                 IMAGE FRAME
                            ================================== --}}

                        <div
                            class="relative aspect-[4/5]
                                       category-card-image
                                       overflow-hidden rounded-sm mb-3
                                       border shadow-xl
                                       transition-all duration-300">

                            @if(isset($category->image) && $category->image)

                            <img
                                src="{{ asset('storage/' . $category->image) }}"
                                alt="{{ $category->name }}"
                                draggable="false"
                                loading="lazy"
                                class="w-full h-full object-cover
                                               grayscale brightness-90
                                               group-hover:scale-105
                                               group-hover:grayscale-0
                                               group-hover:brightness-100
                                               transition-all duration-700
                                               ease-out">

                            @else

                            <div
                                class="w-full h-full
                                               flex flex-col
                                               items-center justify-center
                                               category-card-no-media
                                               transition-colors">

                                <span class="text-4xl mb-2">
                                    📂
                                </span>

                                <span
                                    class="text-[11px]
                                                   uppercase tracking-widest
                                                   heading-font font-semibold">
                                    [ No Media ]
                                </span>

                            </div>

                            @endif


                            {{-- =================================
                                     POST COUNT
                                ================================== --}}

                            <div
                                class="absolute top-3 right-3
                                           category-card-count
                                           text-[10px]
                                           px-2.5 py-0.5
                                           uppercase tracking-widest
                                           rounded-full border
                                           heading-font font-semibold
                                           shadow-sm">

                                {{ $category->posts_count ?? $category->posts()->whereNotNull('published_at')->count() }}
                                Posts

                            </div>

                        </div>


                        {{-- =================================
                                 TITLE & DESCRIPTION
                            ================================== --}}

                        <div class="space-y-1.5">

                            <div class="flex items-center justify-between">

                                <h3
                                    class="category-card-title
                                               heading-font text-lg
                                               font-bold
                                               transition-colors">

                                    {{ $category->name }}

                                </h3>

                                <span class="category-card-arrow text-sm">
                                    →
                                </span>

                            </div>


                            @if($category->description)

                            <p
                                class="text-[11px]
                                               category-card-description
                                               line-clamp-2
                                               leading-relaxed">

                                {{ $category->description }}

                            </p>

                            @endif

                        </div>

                    </a>

                    @empty

                    <div
                        class="w-full py-16 text-center
                                   border border-dashed
                                   no-categories rounded-lg">

                        <span
                            class="text-xs uppercase
                                       tracking-widest
                                       heading-font font-semibold">
                            No categories available.
                        </span>

                    </div>

                    @endforelse

                </div>

            </div>

        </div>

    </div>


    {{-- =========================================================
         BOTTOM BAR
    ========================================================== --}}

    <footer
        class="max-w-[1700px] mx-auto w-full
               px-6 md:px-12 pt-6 mt-6
               border-t bottom-bar
               flex items-center justify-between
               text-xs">

        <a
            href="{{ route('posts.index') }}"
            class="bottom-bar-link
                   flex items-center gap-2
                   transition-colors">

            <span>←</span>
            Back to Catalog

        </a>


        <div class="flex gap-4">

            <a
                href="#"
                class="bottom-bar-social transition-colors">
                Tw.
            </a>

            <a
                href="#"
                class="bottom-bar-social transition-colors">
                Fb.
            </a>

            <a
                href="#"
                class="bottom-bar-social transition-colors">
                In.
            </a>

        </div>

    </footer>

</section>


{{-- =========================================================
     JAVASCRIPT
========================================================== --}}

@push('scripts')

<script>
    document.addEventListener('DOMContentLoaded', () => {

        const container = document.getElementById('categoryContainer');

        const progressIndicator =
            document.getElementById('scrollProgress');

        const cards = container ?
            container.querySelectorAll('.category-card') : [];

        if (!container) return;


        let isDown = false;
        let startX;
        let scrollLeftPos;
        let isDragging = false;


        /* =====================================================
           MOUSE DRAG
        ====================================================== */

        container.addEventListener('mousedown', (e) => {

            isDown = true;
            isDragging = false;

            startX = e.pageX - container.offsetLeft;

            scrollLeftPos = container.scrollLeft;

        });


        const stopDragging = () => {

            isDown = false;

            setTimeout(() => {
                isDragging = false;
            }, 50);

        };


        container.addEventListener(
            'mouseleave',
            stopDragging
        );

        container.addEventListener(
            'mouseup',
            stopDragging
        );


        container.addEventListener('mousemove', (e) => {

            if (!isDown) return;

            e.preventDefault();

            const x =
                e.pageX - container.offsetLeft;

            const walk =
                (x - startX) * 1.5;


            if (Math.abs(walk) > 4) {
                isDragging = true;
            }


            container.scrollLeft =
                scrollLeftPos - walk;

        });


        /* =====================================================
           PREVENT CLICK AFTER DRAG
        ====================================================== */

        cards.forEach(card => {

            card.addEventListener('click', (e) => {

                if (isDragging) {

                    e.preventDefault();
                    e.stopPropagation();

                }

            });

        });


        /* =====================================================
           KEYBOARD NAVIGATION
        ====================================================== */

        container.addEventListener('keydown', (e) => {

            const cardWidth = cards[0] ?
                cards[0].offsetWidth + 20 :
                310;


            if (e.key === 'ArrowRight') {

                e.preventDefault();

                container.scrollBy({
                    left: cardWidth,
                    behavior: 'smooth'
                });

            } else if (e.key === 'ArrowLeft') {

                e.preventDefault();

                container.scrollBy({
                    left: -cardWidth,
                    behavior: 'smooth'
                });

            }

        });


        /* =====================================================
           MOBILE PROGRESS
        ====================================================== */

        const queryProgress = () => {

            if (
                !progressIndicator ||
                cards.length === 0
            ) {
                return;
            }


            const cardWidth =
                cards[0].offsetWidth + 20;


            const currentCard = Math.min(
                Math.round(
                    container.scrollLeft / cardWidth
                ) + 1,
                cards.length
            );


            progressIndicator.textContent =
                `Card ${currentCard} of ${cards.length}`;

        };


        container.addEventListener(
            'scroll',
            queryProgress, {
                passive: true
            }
        );


        /* Initial state */

        queryProgress();

    });
</script>

@endpush

@endsection