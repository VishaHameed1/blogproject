@extends('layouts.public')

@section('title', 'Reading History · chronicle')

@section('content')

<div class="min-h-screen bg-[#0a0a0a] text-white/75">

    {{-- =========================================================
         PAGE HEADER
    ========================================================== --}}

    <section class="border-b border-white/5 bg-[#0a0a0a]">

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 sm:py-14">

            <div class="text-center max-w-3xl mx-auto">

                <p class="text-sm font-semibold uppercase tracking-[0.2em] text-rust mb-3 heading-font">
                    Your Activity
                </p>

                <h1 class="heading-font text-3xl sm:text-4xl lg:text-5xl font-bold tracking-tight text-white">
                    Reading History
                </h1>

                <p class="mt-4 text-base sm:text-lg leading-relaxed text-white/50">
                    Articles you've recently read.
                </p>

            </div>

        </div>

    </section>


    {{-- =========================================================
         READING HISTORY
    ========================================================== --}}

    <section class="py-10 sm:py-14">

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">


            {{-- =================================================
                 HEADER ACTION
            ================================================== --}}

            @if(isset($history) && $history->count() > 0)

                <div class="flex flex-col sm:flex-row items-center justify-between gap-4 mb-8">

                    <div class="text-center sm:text-left">
                        <h2 class="heading-font text-xl sm:text-2xl font-bold text-white tracking-tight">
                            Recently Read
                        </h2>

                        <p class="mt-1 text-sm text-white/30">
                            Your reading activity
                        </p>
                    </div>


                    <form
                        action="{{ route('users.history.clear') }}"
                        method="POST"
                        onsubmit="return confirm('Are you sure you want to clear your reading history?');"
                    >

                        @csrf
                        @method('DELETE')

                        <button
                            type="submit"
                            class="
                                inline-flex
                                items-center
                                justify-center
                                px-4
                                py-2
                                rounded-full
                                border
                                border-red-900/50
                                text-red-400
                                hover:text-red-300
                                hover:bg-red-950/30
                                text-sm
                                font-semibold
                                transition-colors
                                duration-200
                            "
                        >
                            Clear History
                        </button>

                    </form>

                </div>


                {{-- =================================================
                     POSTS GRID
                ================================================== --}}

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 lg:gap-8">

                    @foreach($history as $post)

                        <article
                            class="
                                group
                                flex
                                flex-col
                                overflow-hidden
                                rounded-2xl
                                bg-[#121212]
                                border
                                border-white/5
                                hover:border-rust/50
                                shadow-lg
                                shadow-black/10
                                hover:shadow-xl
                                hover:shadow-black/20
                                transition-all
                                duration-300
                            "
                        >

                            {{-- =================================================
                                 IMAGE
                            ================================================== --}}

                            @if($post->featured_image)

                                <a
                                    href="{{ route('posts.show', $post) }}"
                                    class="block overflow-hidden aspect-[16/9] bg-[#0a0a0a]"
                                >

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
                                        "
                                    >

                                </a>

                            @else

                                <a
                                    href="{{ route('posts.show', $post) }}"
                                    class="
                                        block
                                        aspect-[16/9]
                                        bg-gradient-to-br
                                        from-[#0a0a0a]
                                        to-rust/10
                                        flex
                                        items-center
                                        justify-center
                                    "
                                >

                                    <span class="text-4xl text-rust/50">
                                        ✦
                                    </span>

                                </a>

                            @endif


                            {{-- =================================================
                                 CONTENT
                            ================================================== --}}

                            <div class="flex flex-col flex-1 p-5 sm:p-6">

                                {{-- Category --}}

                                @if($post->category)

                                    <a
                                        href="{{ route('posts.category', $post->category) }}"
                                        class="
                                            inline-flex
                                            w-fit
                                            text-xs
                                            font-semibold
                                            uppercase
                                            tracking-wider
                                            text-rust
                                            hover:text-rust/80
                                            transition-colors
                                            heading-font
                                        "
                                    >
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
                                        text-white
                                        group-hover:text-rust
                                        transition-colors
                                        heading-font
                                        tracking-tight
                                    "
                                >

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
                                            text-white/40
                                            line-clamp-3
                                        "
                                    >
                                        {{ $post->excerpt }}
                                    </p>

                                @elseif($post->body)

                                    <p
                                        class="
                                            mt-3
                                            text-sm
                                            sm:text-base
                                            leading-relaxed
                                            text-white/40
                                            line-clamp-3
                                        "
                                    >
                                        {{ \Illuminate\Support\Str::limit(strip_tags($post->body), 150) }}
                                    </p>

                                @endif


                                {{-- =================================================
                                     META
                                ================================================== --}}

                                <div
                                    class="
                                        mt-auto
                                        pt-5
                                        flex
                                        items-center
                                        justify-between
                                        gap-3
                                        text-xs
                                        text-white/20
                                    "
                                >

                                    <span>

                                        @if($post->pivot && $post->pivot->updated_at)

                                            Viewed {{ $post->pivot->updated_at->diffForHumans() }}

                                        @elseif($post->pivot && $post->pivot->created_at)

                                            Viewed {{ $post->pivot->created_at->diffForHumans() }}

                                        @elseif($post->published_at)

                                            Published {{ $post->published_at->format('M d, Y') }}

                                        @else

                                            {{ $post->created_at->format('M d, Y') }}

                                        @endif

                                    </span>


                                    <a
                                        href="{{ route('posts.show', $post) }}"
                                        class="
                                            font-semibold
                                            text-white/40
                                            hover:text-rust
                                            transition-colors
                                        "
                                    >
                                        Read →
                                    </a>

                                </div>

                            </div>

                        </article>

                    @endforeach

                </div>


                {{-- =================================================
                     PAGINATION
                ================================================== --}}

                @if(method_exists($history, 'links'))

                    <div class="mt-10">
                        {{ $history->links() }}
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
                        bg-[#121212]
                        border
                        border-white/5
                    "
                >

                    <div
                        class="
                            mx-auto
                            flex
                            items-center
                            justify-center
                            w-16
                            h-16
                            rounded-full
                            bg-rust/10
                            border
                            border-rust/30
                            text-rust
                        "
                    >

                        <svg
                            class="w-7 h-7"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="1.8"
                                d="M12 6v6l4 2"
                            />

                            <circle
                                cx="12"
                                cy="12"
                                r="9"
                            />
                        </svg>

                    </div>


                    <h2 class="mt-6 text-2xl font-bold text-white heading-font tracking-tight">
                        No reading history yet
                    </h2>


                    <p class="mt-3 text-white/40 leading-relaxed">
                        Articles you read will appear here so you can easily
                        return to them later.
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
                            bg-rust
                            hover:bg-rust/80
                            text-white
                            text-sm
                            font-semibold
                            transition-all
                            duration-200
                            shadow-lg
                            shadow-rust/20
                            hover:shadow-rust/40
                            transform
                            hover:scale-105
                        "
                    >
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
    /* Heading font */
    .heading-font {
        font-family: 'Poppins', ui-sans-serif, system-ui, sans-serif !important;
        letter-spacing: -0.02em !important;
    }

    /* Selection color */
    ::selection {
        background-color: rgba(196, 90, 46, 0.3) !important;
        color: #ffffff !important;
    }

    /* Line clamp utilities */
    .line-clamp-3 {
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
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