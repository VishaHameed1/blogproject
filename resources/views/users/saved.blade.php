@extends('layouts.public')

@section('title', 'Saved Posts · chronicle')

@section('content')

<div class="min-h-screen bg-[var(--color-bg)] text-[var(--color-text-secondary)] transition-colors duration-300">

    {{-- =========================================================
         PAGE HEADER
    ========================================================== --}}

    <section class="border-b border-[var(--color-border)] bg-[var(--color-bg)] transition-colors duration-300">

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 sm:py-14">

            <div class="text-center max-w-3xl mx-auto">

                <p class="text-sm font-semibold uppercase tracking-[0.2em] text-[var(--color-primary)] mb-3 heading-font">
                    Your Library
                </p>

                <h1 class="heading-font text-3xl sm:text-4xl lg:text-5xl font-bold tracking-tight text-[var(--color-text-primary)]">
                    Saved Posts
                </h1>

                <p class="mt-4 text-base sm:text-lg leading-relaxed text-[var(--color-text-secondary)]">
                    Articles you've saved for later.
                </p>

            </div>

        </div>

    </section>


    {{-- =========================================================
         SAVED POSTS
    ========================================================== --}}

    <section class="py-10 sm:py-14">

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">


            @if($posts->count() > 0)

            {{-- =================================================
                     POSTS GRID
                ================================================== --}}

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 lg:gap-8">

                @foreach($posts as $post)

                <article
                    class="
                        group
                        flex
                        flex-col
                        overflow-hidden
                        rounded-2xl
                        bg-[var(--color-bg-card)]
                        border
                        border-[var(--color-border)]
                        shadow-sm
                        hover:shadow-lg
                        hover:border-[var(--color-primary)]/30
                        transition-all
                        duration-300
                    ">

                    {{-- =================================================
                         IMAGE
                    ================================================== --}}

                    @if($post->featured_image)

                    <a
                        href="{{ route('posts.show', $post) }}"
                        class="block overflow-hidden aspect-[16/9] bg-[var(--color-bg)]">

                        <img
                            src="{{ asset('storage/' . $post->featured_image) }}"
                            alt="{{ $post->title }}"
                            loading="lazy"
                            class="
                                w-full
                                h-full
                                object-cover
                                transition-transform
                                duration-500
                                group-hover:scale-105
                            ">

                    </a>

                    @else

                    <a
                        href="{{ route('posts.show', $post) }}"
                        class="
                            block
                            aspect-[16/9]
                            bg-gradient-to-br
                            from-[var(--color-bg)]
                            to-[var(--color-primary-soft)]
                            flex
                            items-center
                            justify-center
                        ">

                        <span class="text-4xl text-[var(--color-primary)]/50">
                            ✦
                        </span>

                    </a>

                    @endif


                    {{-- =================================================
                         CONTENT
                    ================================================== --}}

                    <div class="flex flex-col flex-1 p-5 sm:p-6">

                        {{-- Category Tag --}}

                        @if($post->category)

                        <a
                            href="{{ route('posts.category', $post->category) }}"
                            class="
                                inline-flex
                                w-fit
                                px-3
                                py-1
                                rounded-full
                                text-xs
                                font-semibold
                                uppercase
                                tracking-wider
                                bg-[var(--color-primary-soft)]
                                text-[var(--color-primary)]
                                hover:bg-[var(--color-primary)]
                                hover:text-white
                                transition-all
                                duration-200
                                heading-font
                            ">
                            {{ $post->category->name }}
                        </a>

                        @endif


                        {{-- Title --}}

                        <h2
                            class="
                                mt-3
                                text-xl
                                sm:text-2xl
                                font-bold
                                leading-tight
                                text-[var(--color-text-primary)]
                                group-hover:text-[var(--color-primary)]
                                transition-colors
                                heading-font
                                tracking-tight
                            ">

                            <a href="{{ route('posts.show', $post) }}">
                                {{ $post->title }}
                            </a>

                        </h2>


                        {{-- Excerpt --}}

                        @if($post->excerpt)

                        <p
                            class="
                                mt-3
                                text-sm
                                sm:text-base
                                leading-relaxed
                                text-[var(--color-text-secondary)]
                                line-clamp-3
                            ">
                            {{ $post->excerpt }}
                        </p>

                        @elseif($post->body)

                        <p
                            class="
                                mt-3
                                text-sm
                                sm:text-base
                                leading-relaxed
                                text-[var(--color-text-secondary)]
                                line-clamp-3
                            ">
                            {{ \Illuminate\Support\Str::limit(strip_tags($post->body), 150) }}
                        </p>

                        @endif


                        {{-- =================================================
                             META & TAGS
                        ================================================== --}}

                        <div class="mt-auto pt-5 space-y-3">

                            {{-- Model Tags (if applicable) --}}
                            @if(isset($post->model) || isset($post->ai_model))
                            <div class="flex flex-wrap gap-2">
                                @if(isset($post->model) && $post->model == 'grok')
                                <span class="
                                    inline-flex
                                    px-3
                                    py-1
                                    rounded-full
                                    text-xs
                                    font-semibold
                                    bg-[var(--color-primary-soft)]
                                    text-[var(--color-primary)]
                                ">
                                    Grok
                                </span>
                                @endif
                                @if(isset($post->model) && $post->model == 'claude')
                                <span class="
                                    inline-flex
                                    px-3
                                    py-1
                                    rounded-full
                                    text-xs
                                    font-semibold
                                    bg-blue-500/20
                                    text-blue-600 dark:text-blue-400
                                ">
                                    Claude
                                </span>
                                @endif
                                @if(isset($post->model) && $post->model == 'chatgpt')
                                <span class="
                                    inline-flex
                                    px-3
                                    py-1
                                    rounded-full
                                    text-xs
                                    font-semibold
                                    bg-emerald-500/20
                                    text-emerald-600 dark:text-emerald-400
                                ">
                                    ChatGPT
                                </span>
                                @endif
                            </div>
                            @endif

                            {{-- WIP Status (if applicable) --}}
                            @if(isset($post->status) && $post->status == 'wip')
                            <div class="flex items-center gap-2">
                                <span class="
                                    inline-flex
                                    items-center
                                    gap-1.5
                                    px-2.5
                                    py-0.5
                                    rounded-full
                                    text-xs
                                    font-medium
                                    bg-yellow-500/10
                                    text-yellow-600
                                    dark:bg-yellow-500/20
                                    dark:text-yellow-400
                                ">
                                    <span class="relative flex h-2 w-2">
                                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-yellow-400 opacity-75"></span>
                                        <span class="relative inline-flex rounded-full h-2 w-2 bg-yellow-500"></span>
                                    </span>
                                    Work in Progress
                                </span>
                            </div>
                            @endif

                            <div
                                class="
                                    flex
                                    items-center
                                    justify-between
                                    gap-3
                                    text-xs
                                    text-[var(--color-text-muted)]
                                ">

                                <span>
                                    @if($post->published_at)
                                    {{ $post->published_at->format('M d, Y') }}
                                    @else
                                    {{ $post->created_at->format('M d, Y') }}
                                    @endif
                                </span>


                                <a
                                    href="{{ route('posts.show', $post) }}"
                                    class="
                                        font-semibold
                                        text-[var(--color-primary)]
                                        hover:text-[var(--color-primary-hover)]
                                        transition-colors
                                    ">
                                    Read →
                                </a>

                            </div>

                        </div>

                    </div>

                </article>

                @endforeach

            </div>


            {{-- =================================================
                     PAGINATION
                ================================================== --}}

            @if(method_exists($posts, 'links'))

            <div class="mt-10">
                {{ $posts->links() }}
            </div>

            @endif


            @else

            {{-- =================================================
                     EMPTY STATE
                ================================================== --}}

            <div
                class="
                    max-w-2xl
                    mx-auto
                    text-center
                    py-16
                    sm:py-20
                    px-6
                    rounded-2xl
                    bg-[var(--color-bg-card)]
                    border
                    border-[var(--color-border)]
                    shadow-sm
                ">

                <div
                    class="
                        mx-auto
                        flex
                        items-center
                        justify-center
                        w-16
                        h-16
                        rounded-full
                        bg-[var(--color-primary-soft)]
                        border
                        border-[var(--color-primary-soft)]
                        text-[var(--color-primary)]
                    ">

                    <svg
                        class="w-7 h-7"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="1.8"
                            d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z" />
                    </svg>

                </div>


                <h2 class="mt-6 text-2xl font-bold text-[var(--color-text-primary)] heading-font tracking-tight">
                    No saved posts yet
                </h2>


                <p class="mt-3 text-[var(--color-text-secondary)] leading-relaxed">
                    When you find an article you want to read later,
                    save it and it will appear here.
                </p>


                <a
                    href="{{ route('posts.index') }}"
                    class="
                        inline-flex
                        items-center
                        justify-center
                        mt-7
                        px-5
                        py-2.5
                        rounded-full
                        bg-[var(--color-primary)]
                        hover:bg-[var(--color-primary-hover)]
                        text-white
                        text-sm
                        font-semibold
                        transition-all
                        duration-200
                        shadow-lg
                        shadow-[var(--color-primary)]/20
                        hover:shadow-[var(--color-primary)]/40
                        transform
                        hover:scale-105
                    ">
                    Explore Articles
                </a>

            </div>

            @endif

        </div>

    </section>

</div>

@endsection

@push('styles')
<style>
    /* Heading font - Poppins */
    .heading-font {
        font-family: 'Poppins', ui-sans-serif, system-ui, sans-serif !important;
        letter-spacing: -0.02em !important;
    }

    /* Body font - Work Sans */
    .body-font {
        font-family: 'Work Sans', ui-sans-serif, system-ui, sans-serif !important;
    }

    /* Selection color - Theme aware */
    ::selection {
        background-color: var(--color-primary-soft) !important;
        color: #ffffff !important;
    }

    /* Line clamp utilities */
    .line-clamp-3 {
        display: -webkit-box;
        -webkit-line-clamp: 3;
        line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    /* Smooth theme transitions */
    * {
        transition-property: background-color, border-color, color, fill, stroke;
        transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
        transition-duration: 300ms;
    }

    /* Scrollbar styling - Theme aware */
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
</style>
@endpush