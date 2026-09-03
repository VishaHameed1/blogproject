@extends('layouts.admin')

@section('title', 'New Post · Admin')

@section('content')

<div class="max-w-4xl mx-auto animate-fade-in">

    {{-- Header --}}
    <div class="mb-8 text-center sm:text-left">
        <h1 class="heading-font text-3xl font-bold text-[var(--color-text-primary)] tracking-tight">
            New Post
        </h1>

        <p class="text-sm text-[var(--color-text-muted)] mt-1">
            Create a new blog post
        </p>
    </div>

    {{-- Form --}}
    <form
        method="POST"
        action="{{ route('admin.posts.store') }}"
        enctype="multipart/form-data"
        class="
            bg-[var(--color-bg-card)]
            border border-[var(--color-border)]
            rounded-2xl
            shadow-sm
            p-6 md:p-8
            space-y-6
            transition-all duration-300
            hover:border-[var(--color-primary)]/30
        ">
        @csrf

        {{-- Title --}}
        <div class="group">

            <label
                for="title"
                class="
                    block text-sm
                    heading-font font-semibold
                    text-[var(--color-text-secondary)]
                    mb-2
                    transition-colors
                    group-focus-within:text-[var(--color-primary)]
                ">
                Title
                <span class="text-[var(--color-primary)]">*</span>
            </label>

            <input
                type="text"
                name="title"
                id="title"
                value="{{ old('title') }}"
                required
                class="
                    w-full
                    px-4 py-3
                    rounded-xl
                    bg-[var(--color-bg)]
                    border border-[var(--color-border)]
                    text-sm
                    text-[var(--color-text-primary)]
                    placeholder:text-[var(--color-text-muted)]
                    focus:outline-none
                    focus:border-[var(--color-primary)]
                    focus:ring-2 focus:ring-[var(--color-primary)]/20
                    transition-all duration-200
                "
                placeholder="Enter post title...">

            @error('title')
            <p class="text-red-500 text-xs mt-1.5">
                {{ $message }}
            </p>
            @enderror

        </div>


        {{-- Category --}}
        <div class="group">

            <label
                for="category_id"
                class="
                    block text-sm
                    heading-font font-semibold
                    text-[var(--color-text-secondary)]
                    mb-2
                    transition-colors
                    group-focus-within:text-[var(--color-primary)]
                ">
                Category
                <span class="text-[var(--color-primary)]">*</span>
            </label>

            <select
                name="category_id"
                id="category_id"
                required
                class="
                    w-full
                    px-4 py-3
                    rounded-xl
                    bg-[var(--color-bg)]
                    border border-[var(--color-border)]
                    text-sm
                    text-[var(--color-text-primary)]
                    focus:outline-none
                    focus:border-[var(--color-primary)]
                    focus:ring-2 focus:ring-[var(--color-primary)]/20
                    transition-all duration-200
                    appearance-none
                ">

                <option
                    value=""
                    class="
                        bg-[var(--color-bg-card)]
                        text-[var(--color-text-muted)]
                    ">
                    Select a category
                </option>

                @foreach($categories as $category)

                <option
                    value="{{ $category->id }}"
                    class="
                            bg-[var(--color-bg-card)]
                            text-[var(--color-text-primary)]
                        "
                    @selected(old('category_id')==$category->id)
                    >
                    {{ $category->name }}
                </option>

                @endforeach

            </select>

            @error('category_id')
            <p class="text-red-500 text-xs mt-1.5">
                {{ $message }}
            </p>
            @enderror

        </div>


        {{-- Body --}}
        <div class="group">

            <label
                for="body"
                class="
                    block text-sm
                    heading-font font-semibold
                    text-[var(--color-text-secondary)]
                    mb-2
                    transition-colors
                    group-focus-within:text-[var(--color-primary)]
                ">
                Body
                <span class="text-[var(--color-primary)]">*</span>
            </label>

            <textarea
                name="body"
                id="body"
                rows="12"
                required
                class="
                    w-full
                    px-4 py-3
                    rounded-xl
                    bg-[var(--color-bg)]
                    border border-[var(--color-border)]
                    text-[var(--color-text-primary)]
                    placeholder:text-[var(--color-text-muted)]
                    font-mono text-sm
                    focus:outline-none
                    focus:border-[var(--color-primary)]
                    focus:ring-2 focus:ring-[var(--color-primary)]/20
                    transition-all duration-200
                    leading-relaxed
                "
                placeholder="Write your post content here...">{{ old('body') }}</textarea>

            @error('body')
            <p class="text-red-500 text-xs mt-1.5">
                {{ $message }}
            </p>
            @enderror

        </div>


        {{-- Featured Image Upload --}}
        <div class="space-y-2">

            <label
                for="image_upload"
                class="
                    block text-sm
                    heading-font font-semibold
                    text-[var(--color-text-secondary)]
                ">
                Featured Image
            </label>

            <div>

                <input
                    type="file"
                    name="image_upload"
                    id="image_upload"
                    accept="image/jpeg,image/png,image/jpg,image/gif,image/webp"
                    class="
        w-full
        text-xs
        text-[var(--color-text-muted)]

        file:mr-4
        file:py-2.5
        file:px-6
        file:rounded-xl
        file:border-0

        file:text-xs
        file:heading-font
        file:font-semibold

        file:bg-[var(--color-primary)]
file:text-white

hover:file:bg-[var(--color-primary-hover)]

file:shadow-lg
file:shadow-[var(--color-primary)]/30
hover:file:shadow-[var(--color-primary)]/50

file:border
file:border-[var(--color-primary)]/30
hover:file:border-[var(--color-primary-hover)]/40

        file:border
        file:border-[var(--color-primary)]/20
        hover:file:border-[var(--color-primary-hover)]/30

        file:transform
        hover:file:scale-[1.02]
        active:file:scale-[0.98]

        cursor-pointer

        border
        border-[var(--color-border)]

        rounded-xl

        bg-[var(--color-bg)]

        py-1.5
        px-2

        transition-all
        focus-within:border-[var(--color-primary)]
    ">

                <p class="text-xs text-[var(--color-text-muted)] mt-1.5">
                    Supported formats: JPEG, PNG, JPG, GIF, WebP (Max: 5MB)
                </p>

                @error('image_upload')
                <p class="text-red-500 text-xs mt-1.5">
                    {{ $message }}
                </p>
                @enderror

            </div>

        </div>


        {{-- Image Preview --}}
        <div
            id="image-preview"
            class="hidden transform transition-all duration-300">

            <p
                class="
                    text-xs
                    heading-font
                    font-semibold
                    uppercase
                    tracking-wider
                    text-[var(--color-text-muted)]
                    mb-2
                ">
                Image Preview
            </p>

            <div
                class="
                    relative
                    inline-block
                    overflow-hidden
                    rounded-xl
                    border border-[var(--color-border)]
                    shadow-lg
                ">
                <img
                    id="preview"
                    src=""
                    alt="Preview"
                    class="
                        max-h-48
                        rounded-xl
                        object-cover
                        transform
                        transition-all
                        duration-300
                        hover:scale-105
                    ">
            </div>

        </div>


        {{-- Publish Status --}}
        <div class="pt-2">

            <label class="flex items-center gap-3 cursor-pointer group w-fit">

                <input
                    type="checkbox"
                    name="is_published"
                    id="is_published"
                    value="1"
                    class="
                        w-5 h-5
                        rounded
                        border-[var(--color-border)]
                        bg-[var(--color-bg)]
                        text-[var(--color-primary)]
                        focus:ring-[var(--color-primary)]/30
                        accent-[var(--color-primary)]
                        transition-all
                        cursor-pointer
                    ">

                <span
                    class="
                        text-sm
                        heading-font
                        font-semibold
                        text-[var(--color-text-secondary)]
                        group-hover:text-[var(--color-primary)]
                        transition-colors
                    ">
                    Publish immediately
                </span>

            </label>

            <p
                class="
                    text-xs
                    text-[var(--color-text-muted)]
                    mt-1 pl-8
                ">
                If unchecked, the post will be saved as a draft
            </p>

        </div>


        {{-- Actions --}}
        <div
            class="
                flex flex-col sm:flex-row
                items-center
                gap-4
                pt-6
                border-t
                border-[var(--color-border)]
            ">

            <button
                type="submit"
                class="
                    w-full sm:w-auto
                    px-6 py-2.5
                    bg-[var(--color-primary)]
                    hover:bg-[var(--color-primary-hover)]
                    text-white
                    heading-font
                    font-semibold
                    text-sm
                    rounded-xl
                    shadow-lg
                    shadow-[var(--color-primary)]/20
                    hover:shadow-[var(--color-primary)]/40
                    transition-all
                    duration-300
                    transform
                    hover:scale-[1.02]
                ">
                Create Post
            </button>

            <a
                href="{{ route('admin.posts.index') }}"
                class="
                    w-full sm:w-auto
                    px-6 py-2.5

                    bg-[var(--color-bg)]
                    hover:bg-[var(--color-bg)]

                    border
                    border-[var(--color-border)]

                    text-[var(--color-text-muted)]
                    hover:text-[var(--color-text-primary)]

                    heading-font
                    font-medium
                    text-sm

                    rounded-xl

                    transition-all
                    duration-300

                    text-center
                ">
                Cancel
            </a>

        </div>

    </form>

</div>


@push('scripts')

<script>
    document.addEventListener('DOMContentLoaded', function() {

        const imageUpload = document.getElementById('image_upload');
        const previewContainer = document.getElementById('image-preview');
        const previewImage = document.getElementById('preview');

        if (!imageUpload) return;

        imageUpload.addEventListener('change', function(e) {

            const file = e.target.files[0];

            if (file) {

                const reader = new FileReader();

                reader.onload = function(event) {

                    previewImage.src = event.target.result;

                    previewContainer.classList.remove('hidden');

                    previewContainer.classList.add('animate-fade-in');

                };

                reader.readAsDataURL(file);

            } else {

                previewContainer.classList.add('hidden');

                previewImage.src = '';

            }

        });

    });
</script>

@endpush


@push('styles')

<style>
    @keyframes fadeIn {

        from {
            opacity: 0;
            transform: translateY(6px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }

    }

    .animate-fade-in {
        animation: fadeIn 0.6s ease-out forwards;
    }


    /* Heading font */

    .heading-font {

        font-family:
            'Poppins',
            ui-sans-serif,
            system-ui,
            -apple-system,
            BlinkMacSystemFont,
            "Segoe UI",
            sans-serif !important;

        letter-spacing: -0.02em !important;

    }


    /* Selection - Theme aware */

    ::selection {

        background-color: var(--color-primary-soft) !important;

        color: #ffffff !important;

    }


    /* Scrollbar - Theme aware */

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


    /* Select arrow - Theme aware */

    select {

        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke='%236B7280'%3E%3Cpath stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M19 9l-7 7-7-7'/%3E%3C/svg%3E");

        background-repeat: no-repeat;

        background-position: right 1rem center;

        background-size: 1rem;

        padding-right: 2.5rem;

    }

    [data-theme="dark"] select {

        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke='%23A0A0A0'%3E%3Cpath stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M19 9l-7 7-7-7'/%3E%3C/svg%3E");

    }


    /* File input consistency */

    input[type="file"]::file-selector-button {
        cursor: pointer;
    }
</style>

@endpush

@endsection