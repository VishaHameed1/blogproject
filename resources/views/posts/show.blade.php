@extends('layouts.public')

@section('title', $post->title . ' · chronicle')

@section('content')

<article class="bg-[#0a0a0a] text-white/75 min-h-screen py-10 md:py-16 selection:bg-rust/30 selection:text-white">

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        {{-- ================================================================
             TOP SECTION: CURRENT POST HERO
        ================================================================= --}}

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-stretch mb-16">

            {{-- ============================================================
                 LEFT: ARTICLE HEADER
            ============================================================= --}}

            <div class="lg:col-span-7 flex flex-col justify-between bg-[#121212] border border-white/5 hover:border-rust/50 rounded-3xl p-8 sm:p-12 shadow-2xl transition-all duration-300 group">

                <div>

                    {{-- Category --}}
                    <div class="flex items-center gap-6 text-xs font-semibold text-white/30 uppercase tracking-widest mb-6">

                        <a href="{{ route('posts.category', $post->category) }}"
                           class="text-rust font-bold border-b-2 border-rust pb-0.5 hover:text-rust/80 hover:shadow-[0_4px_12px_rgba(196,90,46,0.6)] transition-all heading-font">

                            {{ $post->category->name }}

                        </a>

                    </div>


                    {{-- Author & Date --}}
                    <div class="flex items-center gap-3 mb-6">

                        <div class="w-8 h-8 rounded-full bg-rust text-black flex items-center justify-center font-bold text-xs uppercase shadow-[0_0_10px_rgba(196,90,46,0.6)] heading-font">

                            {{ strtoupper(substr($post->category->name ?? 'A', 0, 1)) }}

                        </div>

                        <span class="text-xs font-medium text-white/60">
                            Chronicle Staff
                        </span>

                        <span class="text-xs text-white/20">
                            &bull;
                        </span>

                        <time class="text-xs text-white/40 font-medium">

                            {{ $post->published_at ? $post->published_at->format('d M Y') : '' }}

                        </time>

                    </div>


                    {{-- ====================================================
                         MAIN TITLE
                    ===================================================== --}}

                    <h1 class="heading-font text-4xl sm:text-5xl lg:text-6xl font-bold text-white leading-[1.1] tracking-tight mb-6">

                        {!! preg_replace(
                            '/(\w+)/',
                            '<span class="relative inline-block">$1<span class="absolute bottom-1 left-0 w-full h-2 bg-rust/40 -z-10 group-hover:bg-rust/70 transition-all"></span></span>',
                            e($post->title),
                            1
                        ) !!}

                    </h1>


                    {{-- Excerpt --}}
                    <p class="text-lg md:text-xl text-white/50 leading-relaxed">

                        {{ $post->excerpt ?? Str::limit(strip_tags($post->body), 180) }}

                    </p>

                </div>

            </div>


            {{-- ============================================================
                 RIGHT: FEATURED IMAGE
            ============================================================= --}}

            <div class="lg:col-span-5">

                <div class="relative flex flex-col justify-end h-full min-h-[460px] rounded-3xl overflow-hidden border border-white/5 hover:border-rust shadow-2xl transition-all duration-300 group/img">

                    @if($post->featured_image)

                        <img
                            src="{{ $post->featured_image_url }}"
                            alt="{{ $post->title }}"
                            class="absolute inset-0 w-full h-full object-cover group-hover/img:scale-105 transition-transform duration-500"
                        >

                    @else

                        <div class="absolute inset-0 bg-gradient-to-tr from-[#0a0a0a] via-[#121212] to-rust/80 opacity-90"></div>

                    @endif


                    {{-- Image Overlay --}}
                    <div class="absolute inset-0 bg-gradient-to-t from-[#0a0a0a] via-[#0a0a0a]/40 to-transparent"></div>


                    {{-- Image Caption --}}
                    <div class="relative z-10 p-8">

                        <span class="inline-block px-3 py-1 bg-rust text-white font-bold text-[10px] uppercase tracking-widest rounded-full mb-2 shadow-[0_0_12px_rgba(196,90,46,0.8)] heading-font">

                            Featured Image

                        </span>

                        <h2 class="heading-font text-xl font-bold text-white line-clamp-2 group-hover/img:text-rust transition-colors">

                            {{ $post->title }}

                        </h2>

                    </div>

                </div>

            </div>

        </div>


        {{-- ================================================================
             MAIN CONTENT AREA
        ================================================================= --}}

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12">


            {{-- ============================================================
                 LEFT: ARTICLE CONTENT
            ============================================================= --}}

            <div class="lg:col-span-8 space-y-10">


                {{-- ========================================================
                     RELATED POST / MID ARTICLE FEATURE
                ========================================================= --}}

                @if(isset($relatedPosts) && $relatedPosts->count() > 0)

                    @php
                        $midPost = $relatedPosts->first();
                    @endphp


                    <div class="p-6 rounded-2xl bg-[#121212] border border-white/5 hover:border-rust/80 transition-all duration-300 flex flex-col sm:flex-row items-center gap-6 group/mid hover:shadow-[0_0_20px_rgba(196,90,46,0.15)]">


                        {{-- Related Image --}}
                        @if($midPost->featured_image)

                            <div class="w-full sm:w-44 h-32 rounded-xl overflow-hidden bg-[#0a0a0a] shrink-0 border border-white/5">

                                <img
                                    src="{{ $midPost->featured_image_url }}"
                                    alt="{{ $midPost->title }}"
                                    class="w-full h-full object-cover group-hover/mid:scale-105 transition-transform duration-300"
                                >

                            </div>

                        @endif


                        {{-- Related Content --}}
                        <div class="space-y-2">

                            <span class="text-[10px] font-bold text-rust uppercase tracking-widest heading-font">

                                Also Read in
                                {{ $midPost->category->name ?? 'Chronicle' }}

                            </span>


                            <h3 class="heading-font font-bold text-xl text-white group-hover/mid:text-rust hover:drop-shadow-[0_0_6px_rgba(196,90,46,0.6)] transition-all leading-snug">

                                <a href="{{ route('posts.show', $midPost) }}">

                                    {{ $midPost->title }}

                                </a>

                            </h3>


                            <p class="text-sm md:text-base text-white/40 leading-relaxed line-clamp-2">

                                {{ Str::limit(strip_tags($midPost->body), 110) }}

                            </p>

                        </div>

                    </div>

                @endif


                {{-- ========================================================
                     ARTICLE BODY
                ========================================================= --}}

                <div class="article-body prose prose-invert max-w-none

                            prose-headings:font-bold
                            prose-headings:text-white
                            prose-headings:font-family-heading

                            prose-p:text-white/60
                            prose-p:text-base
                            md:prose-p:text-lg
                            prose-p:leading-[1.8]

                            prose-a:text-rust
                            prose-a:font-semibold
                            hover:prose-a:text-rust/80
                            hover:prose-a:drop-shadow-[0_0_8px_rgba(196,90,46,0.8)]

                            prose-blockquote:border-l-4
                            prose-blockquote:border-rust
                            prose-blockquote:bg-[#121212]/60
                            prose-blockquote:py-3
                            prose-blockquote:px-5
                            prose-blockquote:rounded-r-xl
                            prose-blockquote:text-white/60
                            prose-blockquote:text-base
                            md:prose-blockquote:text-lg
                            prose-blockquote:leading-relaxed">

                    {!! nl2br(e($post->body)) !!}

                </div>


                {{-- ========================================================
                     SHARE / USER ACTIONS FOOTER
                ========================================================= --}}

                <footer class="pt-8 border-t border-white/5 flex flex-wrap items-center justify-between gap-4 text-xs font-semibold">


                    {{-- Back --}}
                    <a
                        href="{{ route('posts.index') }}"
                        class="text-white/30 hover:text-rust hover:drop-shadow-[0_0_8px_rgba(196,90,46,0.8)] transition-all flex items-center gap-2"
                    >

                        &larr; Back to all stories

                    </a>


                    {{-- User Actions & Share --}}
                    <div class="flex items-center gap-3 flex-wrap">

                        {{-- Role Based Action Icons for Logged in Users --}}
                        @auth
                            {{-- Save Article Action --}}
                            <form action="{{ route('users.saved') }}" method="POST" class="inline">
                                @csrf
                                <input type="hidden" name="post_id" value="{{ $post->id }}">
                                <button
                                    type="submit"
                                    title="Save to Reading List"
                                    class="px-4 py-1.5 rounded-full bg-[#121212] text-white/60 border border-white/5 hover:border-rust hover:text-rust hover:shadow-[0_0_12px_rgba(196,90,46,0.5)] transition-all flex items-center gap-1.5"
                                >
                                    <svg class="w-3.5 h-3.5 fill-current" viewBox="0 0 24 24">
                                        <path d="M17 3H7c-1.1 0-2 .9-2 2v16l7-3 7 3V5c0-1.1-.9-2-2-2z"/>
                                    </svg>
                                    <span>Save</span>
                                </button>
                            </form>

                            {{-- View History Link --}}
                            <a
                                href="{{ route('users.history') }}"
                                title="View Reading History"
                                class="px-4 py-1.5 rounded-full bg-[#121212] text-white/60 border border-white/5 hover:border-rust hover:text-rust hover:shadow-[0_0_12px_rgba(196,90,46,0.5)] transition-all flex items-center gap-1.5"
                            >
                                <svg class="w-3.5 h-3.5 fill-current" viewBox="0 0 24 24">
                                    <path d="M13 3a9 9 0 0 0-9 9H1l3.89 3.89.07.14L9 12H6c0-3.87 3.13-7 7-7s7 3.13 7 7-3.13 7-7 7c-1.93 0-3.68-.79-4.94-2.06l-1.42 1.42A8.954 8.954 0 0 0 13 21c4.97 0 9-4.03 9-9s-4.03-9-9-9zm-1 5v5l4.28 2.54.72-1.21-3.5-2.08V8H12z"/>
                                </svg>
                                <span>History</span>
                            </a>

                            <span class="text-white/20">|</span>
                        @endauth


                        <span class="text-white/20 uppercase tracking-widest text-[10px] mr-1">

                            Share:

                        </span>


                        {{-- Twitter --}}
                        <a
                            href="https://twitter.com/intent/tweet?text={{ urlencode($post->title) }}&url={{ urlencode(request()->fullUrl()) }}"
                            target="_blank"
                            rel="noopener noreferrer"
                            class="px-4 py-1.5 rounded-full bg-[#121212] text-white/60 border border-white/5 hover:border-rust hover:text-rust hover:shadow-[0_0_12px_rgba(196,90,46,0.5)] transition-all"
                        >

                            Twitter

                        </a>


                        {{-- Copy Link --}}
                        <button
                            type="button"
                            onclick="navigator.clipboard.writeText(window.location.href); alert('Link copied!');"
                            class="px-4 py-1.5 rounded-full bg-[#121212] text-white/60 border border-white/5 hover:border-rust hover:text-rust hover:shadow-[0_0_12px_rgba(196,90,46,0.5)] transition-all"
                        >

                            Copy Link

                        </button>

                    </div>

                </footer>

            </div>


            {{-- ============================================================
                 RIGHT: SIDEBAR
            ============================================================= --}}

            <aside class="lg:col-span-4 space-y-6">

                <div class="sticky top-24 p-6 rounded-2xl bg-[#121212] border border-white/5 hover:border-rust/50 transition-all duration-300 shadow-lg">

                    <span class="text-[10px] font-bold text-rust uppercase tracking-widest block mb-2 heading-font">

                        Article Quote

                    </span>


                    <blockquote class="italic text-lg md:text-xl text-white/60 leading-relaxed border-l-2 border-rust pl-4 py-1">

                        "{{ $post->excerpt ?? Str::limit(strip_tags($post->body), 140) }}"

                    </blockquote>

                </div>

            </aside>

        </div>


        {{-- ================================================================
             RELATED STORIES
        ================================================================= --}}

        @if(isset($relatedPosts) && $relatedPosts->count() > 1)

            <section class="mt-20 pt-12 border-t border-white/5">

                <h2 class="heading-font text-2xl font-bold text-white mb-8 tracking-tight">

                    More Stories

                </h2>


                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">


                    @foreach($relatedPosts->skip(1)->take(3) as $gridPost)

                        <article
                            class="bg-[#121212] border border-white/5 hover:border-rust/80 rounded-2xl overflow-hidden shadow-xl hover:shadow-[0_0_20px_rgba(196,90,46,0.2)] transition-all duration-300 flex flex-col justify-between group"
                        >

                            <div>


                                {{-- Related Image --}}
                                @if($gridPost->featured_image)

                                    <div class="aspect-[16/10] overflow-hidden bg-[#0a0a0a]">

                                        <img
                                            src="{{ $gridPost->featured_image_url }}"
                                            alt="{{ $gridPost->title }}"
                                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300"
                                        >

                                    </div>

                                @endif


                                {{-- Related Content --}}
                                <div class="p-6">

                                    <span class="text-[10px] font-bold text-rust uppercase tracking-widest block mb-2 heading-font">

                                        {{ $gridPost->category->name ?? 'Article' }}

                                    </span>


                                    <h3 class="heading-font font-bold text-xl text-white group-hover:text-rust transition-colors line-clamp-2 leading-snug">

                                        <a href="{{ route('posts.show', $gridPost) }}">

                                            {{ $gridPost->title }}

                                        </a>

                                    </h3>


                                    <p class="text-sm md:text-base text-white/40 mt-2 line-clamp-3 leading-relaxed">

                                        {{ Str::limit(strip_tags($gridPost->body), 110) }}

                                    </p>

                                </div>

                            </div>


                            {{-- Date --}}
                            <div class="px-6 pb-6 text-xs text-white/20 font-medium">

                                {{ $gridPost->published_at ? $gridPost->published_at->format('M j, Y') : '' }}

                            </div>

                        </article>

                    @endforeach

                </div>

            </section>

        @endif

    </div>

</article>

@endsection


@push('styles')

<style>

    /*
    |--------------------------------------------------------------------------
    | Article Typography - Design System
    |--------------------------------------------------------------------------
    | 
    | Fonts:
    |   Headings: Poppins (with letter-spacing: -0.02em)
    |   Body: Work Sans
    |
    | Body text target:
    |   Mobile  : 16px
    |   Desktop : 18px
    |
    | Supporting text:
    |   Excerpt : 18px → 20px
    |   Quotes  : 18px → 20px
    |--------------------------------------------------------------------------
    */

    /* Heading font */
    .heading-font {
        font-family: 'Poppins', ui-sans-serif, system-ui, sans-serif !important;
        letter-spacing: -0.02em !important;
    }

    /* ---------------------------------------------------------------
       Global article font - Work Sans
    ---------------------------------------------------------------- */

    article,
    article input,
    article button,
    article textarea,
    article select {
        font-family: 'Work Sans', ui-sans-serif, system-ui, sans-serif !important;
    }

    /* ---------------------------------------------------------------
       Headings - Poppins
    ---------------------------------------------------------------- */

    article h1,
    article h2,
    article h3,
    article h4,
    article h5,
    article h6 {
        font-family: 'Poppins', ui-sans-serif, system-ui, sans-serif !important;
        letter-spacing: -0.02em !important;
    }

    /* ---------------------------------------------------------------
       Main article body
       16px mobile → 18px desktop
    ---------------------------------------------------------------- */

    .article-body {
        font-family: 'Work Sans', ui-sans-serif, system-ui, sans-serif !important;
        font-size: 16px;
        line-height: 1.8;
        color: rgba(255, 255, 255, 0.6);
    }

    @media (min-width: 768px) {
        .article-body {
            font-size: 18px;
            line-height: 1.85;
        }
    }

    /* ---------------------------------------------------------------
       Paragraphs
    ---------------------------------------------------------------- */

    .article-body p {
        font-size: 16px;
        line-height: 1.8;
        margin-bottom: 1.5rem;
    }

    @media (min-width: 768px) {
        .article-body p {
            font-size: 18px;
            line-height: 1.85;
        }
    }

    /* ---------------------------------------------------------------
       Lists
    ---------------------------------------------------------------- */

    .article-body ul,
    .article-body ol {
        font-size: 16px;
        line-height: 1.8;
        margin-bottom: 1.5rem;
    }

    @media (min-width: 768px) {
        .article-body ul,
        .article-body ol {
            font-size: 18px;
            line-height: 1.85;
        }
    }

    /* ---------------------------------------------------------------
       Blockquotes
    ---------------------------------------------------------------- */

    .article-body blockquote {
        font-size: 18px;
        line-height: 1.7;
    }

    @media (min-width: 768px) {
        .article-body blockquote {
            font-size: 20px;
            line-height: 1.7;
        }
    }

    /* ---------------------------------------------------------------
       Links
    ---------------------------------------------------------------- */

    .article-body a {
        font-size: inherit;
        color: #c45a2e !important;
    }

    .article-body a:hover {
        color: rgba(196, 90, 46, 0.8) !important;
    }

    /* ---------------------------------------------------------------
       Inline code
    ---------------------------------------------------------------- */

    .article-body code {
        font-size: 0.9em;
    }

    /* ---------------------------------------------------------------
       Images
    ---------------------------------------------------------------- */

    .article-body img {
        max-width: 100%;
        height: auto;
    }

    /* ---------------------------------------------------------------
       Existing line clamp utilities
    ---------------------------------------------------------------- */

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

    .line-clamp-3 {
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    /* ---------------------------------------------------------------
       Selection color
    ---------------------------------------------------------------- */

    ::selection {
        background-color: rgba(196, 90, 46, 0.3) !important;
        color: #ffffff !important;
    }

</style>

@endpush