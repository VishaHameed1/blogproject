@extends('layouts.public')

@section('title', 'Categories · chronicle')

@section('content')

{{-- Clean dark background matching design system --}}
<section class="bg-black text-white/75 w-full min-h-[calc(100vh-80px)] py-6 md:py-8 flex flex-col justify-between selection:bg-rust/30 selection:text-white">
    
    {{-- Main Content: Editorial Split Grid --}}
    <div class="max-w-[1700px] mx-auto w-full px-6 md:px-12 flex-1 flex items-center">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-10 items-center w-full">
            
            {{-- Left Column: Category Intro & Metadata --}}
            <div class="lg:col-span-4 space-y-4">
                <div>
                    <span class="text-xs uppercase tracking-widest text-rust block mb-1 heading-font font-semibold">
                        Explore Topics
                    </span>

                    <h1 class="heading-font text-3xl sm:text-4xl lg:text-5xl font-bold text-white tracking-tight leading-tight">
                        Categories & Collections
                    </h1>
                </div>

                <p class="text-xs md:text-sm text-white/60 leading-relaxed max-w-sm">
                    Browse our curated collections by topic. Select a category to reveal deep dives, technical essays, and insights.
                </p>

                <div class="pt-4 border-t border-white/10 space-y-1.5 text-xs text-white/50 max-w-sm">
                    <div class="flex justify-between">
                        <span>Total Topics:</span>
                        <span class="font-bold text-white">{{ $categories->count() }}</span>
                    </div>

                    <div class="flex justify-between">
                        <span>Navigation:</span>
                        <span class="hidden md:inline">Swipe / Drag / Arrow Keys</span>
                        <span class="md:hidden">Swipe / Touch</span>
                    </div>
                </div>

                {{-- Mobile Indicator --}}
                <div class="flex items-center gap-2 pt-1 md:hidden">
                    <span id="scrollProgress" class="text-[10px] uppercase tracking-wider text-rust heading-font font-semibold">
                        Card 1 of {{ max(1, $categories->count()) }}
                    </span>
                </div>
            </div>

            {{-- Right Column: Horizontal Scroll Cards --}}
            <div class="lg:col-span-8 relative">
                
                {{-- Scroll Container --}}
                <div id="categoryContainer" 
                     tabindex="0"
                     class="flex gap-5 overflow-x-auto snap-x snap-mandatory scrollbar-none pb-4 pt-1 px-1 cursor-grab active:cursor-grabbing outline-none">
                    
                    @forelse ($categories as $category)
                        <a href="{{ route('posts.category', $category) }}" 
                           class="category-card snap-start shrink-0 w-[260px] sm:w-[290px] md:w-[310px] lg:w-[330px] group flex flex-col justify-between select-none">
                            
                            {{-- Image Frame --}}
                            <div class="relative aspect-[4/5] bg-[#121212] overflow-hidden rounded-sm mb-3 border border-white/5 shadow-xl hover:border-rust/50 transition-all duration-300">
                                
                                @if(isset($category->image) && $category->image)
                                    <img src="{{ asset('storage/' . $category->image) }}" 
                                         alt="{{ $category->name }}" 
                                         draggable="false"
                                         class="w-full h-full object-cover grayscale brightness-90 group-hover:scale-105 group-hover:grayscale-0 group-hover:brightness-100 transition-all duration-700 ease-out">
                                @else
                                    <div class="w-full h-full flex flex-col items-center justify-center bg-[#121212] text-white/30 group-hover:text-rust transition-colors">
                                        <span class="text-4xl mb-2">📂</span>
                                        <span class="text-[11px] uppercase tracking-widest heading-font font-semibold">
                                            [ No Media ]
                                        </span>
                                    </div>
                                @endif

                                <div class="absolute top-3 right-3 bg-black/80 backdrop-blur-md text-white/75 text-[10px] px-2.5 py-0.5 uppercase tracking-widest rounded-full border border-white/5 heading-font font-semibold">
                                    {{ $category->posts_count ?? $category->posts()->whereNotNull('published_at')->count() }} Posts
                                </div>
                            </div>

                            {{-- Title & Description --}}
                            <div class="space-y-1.5">
                                <div class="flex items-center justify-between">
                                    <h3 class="heading-font text-lg font-bold text-white group-hover:text-rust transition-colors">
                                        {{ $category->name }}
                                    </h3>

                                    <span class="text-sm text-white/30 group-hover:translate-x-1 group-hover:text-rust transition-all">
                                        →
                                    </span>
                                </div>

                                @if($category->description)
                                    <p class="text-[11px] text-white/50 line-clamp-2 leading-relaxed">
                                        {{ $category->description }}
                                    </p>
                                @endif
                            </div>
                        </a>
                    @empty
                        <div class="w-full py-16 text-center border border-dashed border-white/10 rounded-lg">
                            <span class="text-xs text-white/30 uppercase tracking-widest heading-font font-semibold">
                                No categories available.
                            </span>
                        </div>
                    @endforelse
                </div>

            </div>
        </div>
    </div>

    {{-- Bottom Bar --}}
    <footer class="max-w-[1700px] mx-auto w-full px-6 md:px-12 pt-6 mt-6 border-t border-white/10 flex items-center justify-between text-xs text-white/50">
        
        <a href="{{ route('posts.index') }}" class="hover:text-white transition-colors flex items-center gap-2">
            <span>←</span> Back to Catalog
        </a>

        <div class="flex gap-4">
            <a href="#" class="hover:text-rust transition-colors">Tw.</a>
            <a href="#" class="hover:text-rust transition-colors">Fb.</a>
            <a href="#" class="hover:text-rust transition-colors">In.</a>
        </div>
    </footer>

</section>

@push('styles')
<style>
    /* Heading font */
    .heading-font {
        font-family: 'Poppins', ui-sans-serif, system-ui, sans-serif !important;
        letter-spacing: -0.02em !important;
    }

    .scrollbar-none::-webkit-scrollbar {
        display: none;
    }

    .scrollbar-none {
        -ms-overflow-style: none;
        scrollbar-width: none;
    }

    .line-clamp-2 {
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    /* Selection color */
    ::selection {
        background-color: rgba(196, 90, 46, 0.3) !important;
        color: #ffffff !important;
    }
</style>
@endpush

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const container = document.getElementById('categoryContainer');
        const progressIndicator = document.getElementById('scrollProgress');
        const cards = container ? container.querySelectorAll('.category-card') : [];

        if (!container) return;

        let isDown = false;
        let startX;
        let scrollLeftPos;
        let isDragging = false;

        container.addEventListener('mousedown', (e) => {
            isDown = true;
            isDragging = false;
            startX = e.pageX - container.offsetLeft;
            scrollLeftPos = container.scrollLeft;
        });

        container.addEventListener('mouseleave', () => isDown = false);
        container.addEventListener('mouseup', () => isDown = false);

        container.addEventListener('mousemove', (e) => {
            if (!isDown) return;

            e.preventDefault();

            const x = e.pageX - container.offsetLeft;
            const walk = (x - startX) * 1.5;

            if (Math.abs(walk) > 5) {
                isDragging = true;
            }

            container.scrollLeft = scrollLeftPos - walk;
        });

        cards.forEach(card => {
            card.addEventListener('click', (e) => {
                if (isDragging) {
                    e.preventDefault();
                }
            });
        });

        container.addEventListener('keydown', (e) => {
            const cardWidth = cards[0] ? cards[0].offsetWidth + 20 : 310;

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

        const queryProgress = () => {
            if (!progressIndicator || cards.length === 0) return;

            const cardWidth = cards[0].offsetWidth + 20;

            const currentCard = Math.min(
                Math.round(container.scrollLeft / cardWidth) + 1,
                cards.length
            );

            progressIndicator.textContent =
                `Card ${currentCard} of ${cards.length}`;
        };

        container.addEventListener('scroll', queryProgress, {
            passive: true
        });
    });
</script>
@endpush

@endsection