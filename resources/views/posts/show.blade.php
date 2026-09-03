@extends('layouts.public')

@section('title', $post->title . ' · chronicle')

@section('content')

<style>
    /* Heading font */
    .heading-font {
        font-family: 'Poppins', ui-sans-serif, system-ui, sans-serif !important;
        letter-spacing: -0.02em !important;
    }

    /* Selection color - Purple theme */
    ::selection {
        background-color: rgba(124, 58, 237, 0.3) !important;
        color: #ffffff !important;
    }
    .dark ::selection {
        background-color: rgba(59, 130, 246, 0.3) !important;
    }

    /* Scrollbar styling */
    ::-webkit-scrollbar {
        width: 6px;
    }
    ::-webkit-scrollbar-track {
        background: #F8F9FA;
    }
    ::-webkit-scrollbar-thumb {
        background: #7C3AED;
        border-radius: 3px;
    }
    ::-webkit-scrollbar-thumb:hover {
        background: #6D28D9;
    }
    .dark ::-webkit-scrollbar-track {
        background: #1A1A2E;
    }
    .dark ::-webkit-scrollbar-thumb {
        background: #7C3AED;
    }
    .dark ::-webkit-scrollbar-thumb:hover {
        background: #6D28D9;
    }

    /* Line clamp utilities */
    .line-clamp-1 {
        display: -webkit-box;
        -webkit-line-clamp: 1;
        line-clamp: 1;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
    .line-clamp-2 {
        display: -webkit-box;
        -webkit-line-clamp: 2;
        line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
    .line-clamp-3 {
        display: -webkit-box;
        -webkit-line-clamp: 3;
        line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    /* Article avatar */
    .article-avatar {
        background-color: #7C3AED !important;
        color: #000000 !important;
        box-shadow: 0 0 10px rgba(124, 58, 237, 0.4) !important;
    }
    .dark .article-avatar {
        background-color: #3B82F6 !important;
        box-shadow: 0 0 10px rgba(59, 130, 246, 0.4) !important;
    }

    /* Featured image badge */
    .featured-image-badge {
        background-color: #7C3AED !important;
        color: #ffffff !important;
        box-shadow: 0 0 12px rgba(124, 58, 237, 0.6) !important;
    }
    .dark .featured-image-badge {
        background-color: #3B82F6 !important;
        box-shadow: 0 0 12px rgba(59, 130, 246, 0.6) !important;
    }

    /* Title highlight */
    .article-title-highlight {
        background-color: #7C3AED !important;
        opacity: 0.4;
    }
    .article-title-highlight:hover {
        background-color: #7C3AED !important;
        opacity: 0.7;
    }
    .dark .article-title-highlight {
        background-color: #3B82F6 !important;
        opacity: 0.3;
    }
    .dark .article-title-highlight:hover {
        background-color: #3B82F6 !important;
        opacity: 0.5;
    }

    /* Share buttons */
    .share-button {
        background-color: #FFFFFF !important;
        color: #9CA3AF !important;
        border-color: #E5E7EB !important;
    }
    .dark .share-button {
        background-color: #121212 !important;
        color: #6B7280 !important;
        border-color: rgba(255, 255, 255, 0.1) !important;
    }
    .share-button:hover {
        border-color: #7C3AED !important;
        color: #7C3AED !important;
        box-shadow: 0 0 12px rgba(124, 58, 237, 0.4) !important;
    }
    .dark .share-button:hover {
        border-color: #60A5FA !important;
        color: #60A5FA !important;
        box-shadow: 0 0 12px rgba(59, 130, 246, 0.4) !important;
    }

    /* Article body */
    .article-body {
        font-family: 'Work Sans', ui-sans-serif, system-ui, sans-serif !important;
    }
    .article-body p {
        color: #6B7280 !important;
    }
    .dark .article-body p {
        color: #A0A0A0 !important;
    }
    .article-body a {
        color: #7C3AED !important;
    }
    .article-body a:hover {
        color: #6D28D9 !important;
        text-shadow: 0 0 8px rgba(124, 58, 237, 0.4) !important;
    }
    .dark .article-body a {
        color: #60A5FA !important;
    }
    .dark .article-body a:hover {
        color: #93C5FD !important;
        text-shadow: 0 0 8px rgba(59, 130, 246, 0.4) !important;
    }
    .article-body blockquote {
        border-color: #7C3AED !important;
        background-color: rgba(124, 58, 237, 0.05) !important;
        color: #6B7280 !important;
    }
    .dark .article-body blockquote {
        border-color: #60A5FA !important;
        background-color: rgba(59, 130, 246, 0.05) !important;
        color: #A0A0A0 !important;
    }
    .article-body h1, .article-body h2, .article-body h3, 
    .article-body h4, .article-body h5, .article-body h6 {
        color: #1A1A2E !important;
    }
    .dark .article-body h1, .dark .article-body h2, 
    .dark .article-body h3, .dark .article-body h4, 
    .dark .article-body h5, .dark .article-body h6 {
        color: #FFFFFF !important;
    }

    /* Article body prose overrides */
    .article-body {
        font-size: 16px;
        line-height: 1.8;
    }
    @media (min-width: 768px) {
        .article-body {
            font-size: 18px;
            line-height: 1.85;
        }
    }
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
    .article-body ul, .article-body ol {
        font-size: 16px;
        line-height: 1.8;
        margin-bottom: 1.5rem;
        color: #6B7280 !important;
    }
    .dark .article-body ul, .dark .article-body ol {
        color: #A0A0A0 !important;
    }
    @media (min-width: 768px) {
        .article-body ul, .article-body ol {
            font-size: 18px;
            line-height: 1.85;
        }
    }
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
    .article-body code {
        font-size: 0.9em;
    }
    .article-body img {
        max-width: 100%;
        height: auto;
    }

    /* Featured image overlay */
    .featured-image-overlay {
        background: linear-gradient(to top, #F8F9FA, rgba(10, 10, 10, 0.4) 60%, transparent) !important;
    }
    .dark .featured-image-overlay {
        background: linear-gradient(to top, #1A1A2E, rgba(10, 10, 10, 0.6) 60%, transparent) !important;
    }

    /* Article hero hover */
    .article-hero:hover {
        border-color: #7C3AED !important;
    }
    .dark .article-hero:hover {
        border-color: #60A5FA !important;
    }

    /* Category link */
    .article-category-link {
        color: #7C3AED !important;
        border-color: #7C3AED !important;
    }
    .article-category-link:hover {
        color: #6D28D9 !important;
        box-shadow: 0 4px 12px rgba(124, 58, 237, 0.3) !important;
    }
    .dark .article-category-link {
        color: #60A5FA !important;
        border-color: #60A5FA !important;
    }
    .dark .article-category-link:hover {
        color: #93C5FD !important;
        box-shadow: 0 4px 12px rgba(59, 130, 246, 0.3) !important;
    }

    /* Mid article card */
    .mid-article-card {
        background-color: #FFFFFF !important;
        border-color: #E5E7EB !important;
    }
    .dark .mid-article-card {
        background-color: #121212 !important;
        border-color: rgba(255, 255, 255, 0.05) !important;
    }
    .mid-article-card:hover {
        border-color: #7C3AED !important;
        box-shadow: 0 0 20px rgba(124, 58, 237, 0.12) !important;
    }
    .dark .mid-article-card:hover {
        border-color: #60A5FA !important;
        box-shadow: 0 0 20px rgba(59, 130, 246, 0.15) !important;
    }
    .mid-article-label {
        color: #7C3AED !important;
    }
    .dark .mid-article-label {
        color: #60A5FA !important;
    }
    .mid-article-title {
        color: #1A1A2E !important;
    }
    .dark .mid-article-title {
        color: #FFFFFF !important;
    }
    .mid-article-title:hover {
        color: #7C3AED !important;
        text-shadow: 0 0 6px rgba(124, 58, 237, 0.4) !important;
    }
    .dark .mid-article-title:hover {
        color: #60A5FA !important;
        text-shadow: 0 0 6px rgba(59, 130, 246, 0.4) !important;
    }
    .mid-article-excerpt {
        color: #9CA3AF !important;
    }
    .dark .mid-article-excerpt {
        color: #6B7280 !important;
    }

    /* Share footer */
    .share-footer {
        border-color: #E5E7EB !important;
    }
    .dark .share-footer {
        border-color: rgba(255, 255, 255, 0.05) !important;
    }
    .share-back-link {
        color: #9CA3AF !important;
    }
    .dark .share-back-link {
        color: #6B7280 !important;
    }
    .share-back-link:hover {
        color: #7C3AED !important;
        text-shadow: 0 0 8px rgba(124, 58, 237, 0.4) !important;
    }
    .dark .share-back-link:hover {
        color: #60A5FA !important;
        text-shadow: 0 0 8px rgba(59, 130, 246, 0.4) !important;
    }

    /* Sidebar */
    .sidebar-card {
        background-color: #FFFFFF !important;
        border-color: #E5E7EB !important;
    }
    .dark .sidebar-card {
        background-color: #121212 !important;
        border-color: rgba(255, 255, 255, 0.05) !important;
    }
    .sidebar-card:hover {
        border-color: #7C3AED !important;
    }
    .dark .sidebar-card:hover {
        border-color: #60A5FA !important;
    }
    .sidebar-quote {
        border-color: #7C3AED !important;
        color: #6B7280 !important;
    }
    .dark .sidebar-quote {
        border-color: #60A5FA !important;
        color: #A0A0A0 !important;
    }
    .sidebar-label {
        color: #7C3AED !important;
    }
    .dark .sidebar-label {
        color: #60A5FA !important;
    }

    /* Related stories */
    .related-section {
        border-color: #E5E7EB !important;
    }
    .dark .related-section {
        border-color: rgba(255, 255, 255, 0.05) !important;
    }
    .related-title {
        color: #1A1A2E !important;
    }
    .dark .related-title {
        color: #FFFFFF !important;
    }
    .related-card {
        background-color: #FFFFFF !important;
        border-color: #E5E7EB !important;
    }
    .dark .related-card {
        background-color: #121212 !important;
        border-color: rgba(255, 255, 255, 0.05) !important;
    }
    .related-card:hover {
        border-color: #7C3AED !important;
        box-shadow: 0 0 20px rgba(124, 58, 237, 0.15) !important;
    }
    .dark .related-card:hover {
        border-color: #60A5FA !important;
        box-shadow: 0 0 20px rgba(59, 130, 246, 0.15) !important;
    }
    .related-card-category {
        color: #7C3AED !important;
    }
    .dark .related-card-category {
        color: #60A5FA !important;
    }
    .related-card-title {
        color: #1A1A2E !important;
    }
    .dark .related-card-title {
        color: #FFFFFF !important;
    }
    .related-card-title:hover {
        color: #7C3AED !important;
    }
    .dark .related-card-title:hover {
        color: #60A5FA !important;
    }
    .related-card-excerpt {
        color: #9CA3AF !important;
    }
    .dark .related-card-excerpt {
        color: #6B7280 !important;
    }
    .related-card-date {
        color: #9CA3AF !important;
    }
    .dark .related-card-date {
        color: #6B7280 !important;
    }

    /* Featured image container */
    .featured-image-container:hover {
        border-color: #7C3AED !important;
    }
    .dark .featured-image-container:hover {
        border-color: #60A5FA !important;
    }

    .featured-image-title {
        color: #1A1A2E !important;
    }
    .dark .featured-image-title {
        color: #FFFFFF !important;
    }
    .featured-image-title:hover {
        color: #7C3AED !important;
    }
    .dark .featured-image-title:hover {
        color: #60A5FA !important;
    }
</style>

<article class="bg-[#F8F9FA] dark:bg-[#1A1A2E] text-[#6B7280] dark:text-white/60 min-h-screen py-10 md:py-16 selection:bg-[#7C3AED]/30 selection:text-white">

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        {{-- ================================================================
             TOP SECTION: CURRENT POST HERO
        ================================================================= --}}

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-stretch mb-16">

            {{-- ============================================================
                 LEFT: ARTICLE HEADER
            ============================================================= --}}

            <div class="lg:col-span-7 flex flex-col justify-between bg-white dark:bg-[#121212] border border-[#E5E7EB] dark:border-white/5 rounded-3xl p-8 sm:p-12 shadow-2xl transition-all duration-300 group article-hero">

                <div>

                    {{-- Category --}}
                    <div class="flex items-center gap-6 text-xs font-semibold text-white/30 uppercase tracking-widest mb-6">

                        <a href="{{ route('posts.category', $post->category) }}"
                           class="article-category-link font-bold border-b-2 pb-0.5 transition-all heading-font">

                            {{ $post->category->name }}

                        </a>

                    </div>


                    {{-- Author & Date --}}
                    <div class="flex items-center gap-3 mb-6">

                        <div class="w-8 h-8 rounded-full article-avatar flex items-center justify-center font-bold text-xs uppercase shadow-lg heading-font">

                            {{ strtoupper(substr($post->category->name ?? 'A', 0, 1)) }}

                        </div>

                        <span class="text-xs font-medium text-[#6B7280] dark:text-white/60">
                            Chronicle Staff
                        </span>

                        <span class="text-xs text-[#9CA3AF] dark:text-white/20">
                            &bull;
                        </span>

                        <time class="text-xs text-[#9CA3AF] dark:text-white/30 font-medium">

                            {{ $post->published_at ? $post->published_at->format('d M Y') : '' }}

                        </time>

                    </div>


                    {{-- ====================================================
                         MAIN TITLE
                    ===================================================== --}}

                    <h1 class="text-[#1A1A2E] dark:text-white heading-font text-4xl sm:text-5xl lg:text-6xl font-bold leading-[1.1] tracking-tight mb-6">

                        {!! preg_replace(
                            '/(\w+)/',
                            '<span class="relative inline-block">$1<span class="article-title-highlight absolute bottom-1 left-0 w-full h-2 -z-10 transition-all"></span></span>',
                            e($post->title),
                            1
                        ) !!}

                    </h1>


                    {{-- Excerpt --}}
                    <p class="text-[#9CA3AF] dark:text-white/40 text-lg md:text-xl leading-relaxed">

                        {{ $post->excerpt ?? Str::limit(strip_tags($post->body), 180) }}

                    </p>

                </div>

            </div>


            {{-- ============================================================
                 RIGHT: FEATURED IMAGE
            ============================================================= --}}

            <div class="lg:col-span-5">

                <div class="relative flex flex-col justify-end h-full min-h-[460px] rounded-3xl overflow-hidden border border-[#E5E7EB] dark:border-white/5 shadow-2xl transition-all duration-300 group/img featured-image-container">

                    @if($post->featured_image)

                        <img
                            src="{{ $post->featured_image_url }}"
                            alt="{{ $post->title }}"
                            class="absolute inset-0 w-full h-full object-cover group-hover/img:scale-105 transition-transform duration-500"
                        >

                    @else

                        <div class="absolute inset-0 bg-gradient-to-tr from-[#F8F9FA] dark:from-[#1A1A2E] via-white dark:via-[#121212] to-[#7C3AED]/60 dark:to-[#3B82F6]/60 opacity-90"></div>

                    @endif


                    {{-- Image Overlay --}}
                    <div class="featured-image-overlay absolute inset-0"></div>


                    {{-- Image Caption --}}
                    <div class="relative z-10 p-8">

                        <span class="featured-image-badge inline-block px-3 py-1 font-bold text-[10px] uppercase tracking-widest rounded-full mb-2 heading-font">

                            Featured Image

                        </span>

                        <h2 class="featured-image-title heading-font text-xl font-bold line-clamp-2 transition-colors">

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


                    <div class="p-6 rounded-2xl mid-article-card border transition-all duration-300 flex flex-col sm:flex-row items-center gap-6 group/mid">

                        {{-- Related Image --}}
                        @if($midPost->featured_image)

                            <div class="w-full sm:w-44 h-32 rounded-xl overflow-hidden bg-[#F8F9FA] dark:bg-[#1A1A2E] shrink-0 border border-[#E5E7EB] dark:border-white/5">

                                <img
                                    src="{{ $midPost->featured_image_url }}"
                                    alt="{{ $midPost->title }}"
                                    class="w-full h-full object-cover group-hover/mid:scale-105 transition-transform duration-300"
                                >

                            </div>

                        @endif


                        {{-- Related Content --}}
                        <div class="space-y-2">

                            <span class="mid-article-label text-[10px] font-bold uppercase tracking-widest heading-font">

                                Also Read in
                                {{ $midPost->category->name ?? 'Chronicle' }}

                            </span>


                            <h3 class="mid-article-title heading-font font-bold text-xl transition-all leading-snug">

                                <a href="{{ route('posts.show', $midPost) }}">

                                    {{ $midPost->title }}

                                </a>

                            </h3>


                            <p class="mid-article-excerpt text-sm md:text-base leading-relaxed line-clamp-2">

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
                            prose-headings:font-family-heading

                            prose-p:text-base
                            md:prose-p:text-lg
                            prose-p:leading-[1.8]

                            prose-a:font-semibold">

                    {!! nl2br(e($post->body)) !!}

                </div>


                {{-- ========================================================
                     SHARE / USER ACTIONS FOOTER
                ========================================================= --}}

                <footer class="share-footer pt-8 border-t flex flex-wrap items-center justify-between gap-4 text-xs font-semibold">


                    {{-- Back --}}
                    <a
                        href="{{ route('posts.index') }}"
                        class="share-back-link transition-all flex items-center gap-2"
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
                                    class="share-button px-4 py-1.5 rounded-full border transition-all flex items-center gap-1.5"
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
                                class="share-button px-4 py-1.5 rounded-full border transition-all flex items-center gap-1.5"
                            >
                                <svg class="w-3.5 h-3.5 fill-current" viewBox="0 0 24 24">
                                    <path d="M13 3a9 9 0 0 0-9 9H1l3.89 3.89.07.14L9 12H6c0-3.87 3.13-7 7-7s7 3.13 7 7-3.13 7-7 7c-1.93 0-3.68-.79-4.94-2.06l-1.42 1.42A8.954 8.954 0 0 0 13 21c4.97 0 9-4.03 9-9s-4.03-9-9-9zm-1 5v5l4.28 2.54.72-1.21-3.5-2.08V8H12z"/>
                                </svg>
                                <span>History</span>
                            </a>

                            <span class="text-[#9CA3AF] dark:text-white/20">|</span>
                        @endauth


                        <span class="text-[#9CA3AF] dark:text-white/40 uppercase tracking-widest text-[10px] mr-1">

                            Share:

                        </span>


                        {{-- Twitter --}}
                        <a
                            href="https://twitter.com/intent/tweet?text={{ urlencode($post->title) }}&url={{ urlencode(request()->fullUrl()) }}"
                            target="_blank"
                            rel="noopener noreferrer"
                            class="share-button px-4 py-1.5 rounded-full border transition-all"
                        >

                            Twitter

                        </a>


                        {{-- Copy Link --}}
                        <button
                            type="button"
                            onclick="navigator.clipboard.writeText(window.location.href); alert('Link copied!');"
                            class="share-button px-4 py-1.5 rounded-full border transition-all"
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

                <div class="sidebar-card sticky top-24 p-6 rounded-2xl border transition-all duration-300 shadow-lg">

                    <span class="sidebar-label text-[10px] font-bold uppercase tracking-widest block mb-2 heading-font">

                        Article Quote

                    </span>


                    <blockquote class="sidebar-quote italic text-lg md:text-xl leading-relaxed border-l-2 pl-4 py-1">

                        "{{ $post->excerpt ?? Str::limit(strip_tags($post->body), 140) }}"

                    </blockquote>

                </div>

            </aside>

        </div>


        {{-- ================================================================
             RELATED STORIES
        ================================================================= --}}

        @if(isset($relatedPosts) && $relatedPosts->count() > 1)

            <section class="related-section mt-20 pt-12 border-t">

                <h2 class="related-title heading-font text-2xl font-bold mb-8 tracking-tight">

                    More Stories

                </h2>


                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">


                    @foreach($relatedPosts->skip(1)->take(3) as $gridPost)

                        <article
                            class="related-card border rounded-2xl overflow-hidden shadow-xl transition-all duration-300 flex flex-col justify-between group"
                        >

                            <div>


                                {{-- Related Image --}}
                                @if($gridPost->featured_image)

                                    <div class="aspect-[16/10] overflow-hidden bg-[#F8F9FA] dark:bg-[#1A1A2E]">

                                        <img
                                            src="{{ $gridPost->featured_image_url }}"
                                            alt="{{ $gridPost->title }}"
                                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300"
                                        >

                                    </div>

                                @endif


                                {{-- Related Content --}}
                                <div class="p-6">

                                    <span class="related-card-category text-[10px] font-bold uppercase tracking-widest block mb-2 heading-font">

                                        {{ $gridPost->category->name ?? 'Article' }}

                                    </span>


                                    <h3 class="related-card-title heading-font font-bold text-xl transition-colors line-clamp-2 leading-snug">

                                        <a href="{{ route('posts.show', $gridPost) }}">

                                            {{ $gridPost->title }}

                                        </a>

                                    </h3>


                                    <p class="related-card-excerpt text-sm md:text-base mt-2 line-clamp-3 leading-relaxed">

                                        {{ Str::limit(strip_tags($gridPost->body), 110) }}

                                    </p>

                                </div>

                            </div>


                            {{-- Date --}}
                            <div class="related-card-date px-6 pb-6 text-xs font-medium">

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

</style>

@endpush