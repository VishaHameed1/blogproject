@extends('layouts.author')

@section('content')

<div class="max-w-3xl mx-auto px-4 sm:px-6 py-6 sm:py-8 body-font">

    {{-- Header Section (Left Aligned - Admin Style) --}}
    <section class="mb-8 relative">
        <div class="flex items-center justify-between gap-4 flex-wrap">
            <div>
                <h1 class="heading-font text-3xl font-bold text-[var(--color-text-primary)] tracking-tight">
                    Create New Post
                </h1>
                <p class="text-sm text-[var(--color-text-muted)] mt-1">
                    Shape your thoughts into something worth reading. Save your work as a draft or submit it for approval.
                </p>
            </div>

            <a href="{{ route('author.posts.index') }}"
                class="inline-flex items-center justify-center gap-2 px-5 py-2.5 rounded-xl border border-[var(--color-border)] bg-[var(--color-bg)] hover:bg-[var(--color-bg)] hover:border-[var(--color-primary)] text-[var(--color-text-muted)] hover:text-[var(--color-text-primary)] text-sm font-semibold transition-all duration-300 hover:scale-[1.02] heading-font shrink-0">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                <span>Back to Posts</span>
            </a>
        </div>
    </section>

    {{-- Main Form Card --}}
    <div class="bg-[var(--color-bg-card)] border border-[var(--color-border]) rounded-2xl shadow-2xl shadow-[var(--color-shadow)] overflow-hidden relative">

        {{-- Top Accent Border Line --}}
        <div class="h-1 w-full bg-gradient-to-r from-[var(--color-primary)] via-[var(--color-primary-hover)] to-[var(--color-primary)]"></div>

        <div class="p-6 sm:p-8">
            <form action="{{ route('author.posts.store') }}" method="POST" enctype="multipart/form-data" x-data="{ imagePreview: null }">
                @csrf

                {{-- Title --}}
                <div class="mb-5">
                    <label class="block text-xs font-semibold text-[var(--color-text-secondary)] mb-1.5 heading-font" for="title">Title</label>
                    <input type="text" name="title" id="title" value="{{ old('title') }}" placeholder="Give your post a thoughtful title..."
                        class="w-full h-11 px-4 rounded-xl bg-[var(--color-bg)] border border-[var(--color-border)] text-[var(--color-text-primary)] placeholder:text-[var(--color-text-muted)] text-xs sm:text-sm shadow-inner shadow-[var(--color-shadow)] transition-all duration-300 focus:outline-none focus:border-[var(--color-primary)] focus:ring-2 focus:ring-[var(--color-primary)]/10 hover:border-[var(--color-border)] body-font">
                    @error('title')
                    <p class="mt-1.5 text-xs text-red-400 flex items-center gap-1 heading-font">⚠ {{ $message }}</p>
                    @enderror
                </div>

                {{-- Category --}}
                <div class="mb-5">
                    <label class="block text-xs font-semibold text-[var(--color-text-secondary)] mb-1.5 heading-font" for="category_id">Category</label>
                    <div class="relative">
                        <select name="category_id" id="category_id"
                            class="appearance-none w-full h-11 px-4 pr-10 rounded-xl bg-[var(--color-bg)] border border-[var(--color-border)] text-[var(--color-text-primary)] text-xs sm:text-sm shadow-inner shadow-[var(--color-shadow)] transition-all duration-300 focus:outline-none focus:border-[var(--color-primary)] focus:ring-2 focus:ring-[var(--color-primary)]/10 hover:border-[var(--color-border)] body-font">
                            <option value="" class="bg-[var(--color-bg-card)] text-[var(--color-text-muted)]">Select Category</option>
                            @foreach($categories as $category)
                            <option value="{{ $category->id }}" class="bg-[var(--color-bg-card)]" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                            @endforeach
                        </select>
                        <div class="absolute right-4 top-1/2 -translate-y-1/2 pointer-events-none text-[var(--color-text-muted)]">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </div>
                    </div>
                    @error('category_id')
                    <p class="mt-1.5 text-xs text-red-400 flex items-center gap-1 heading-font">⚠ {{ $message }}</p>
                    @enderror
                </div>

                {{-- Cover Image --}}
                <div class="mb-5">
                    <label class="block text-xs font-semibold text-[var(--color-text-secondary)] mb-1.5 heading-font" for="image_upload">Cover Image</label>
                    <input type="file" name="image_upload" id="image_upload" accept="image/png, image/jpeg, image/webp, image/gif"
                        @change="
                            const file = $event.target.files[0];
                            if (file) {
                                const reader = new FileReader();
                                reader.onload = (e) => imagePreview = e.target.result;
                                reader.readAsDataURL(file);
                            } else {
                                imagePreview = null;
                            }
                        "
                        class="w-full text-xs text-[var(--color-text-muted)] file:mr-3 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-[var(--color-primary-soft)] file:text-[var(--color-primary)] hover:file:bg-[var(--color-primary)] hover:file:text-white file:transition-all file:duration-300 file:cursor-pointer bg-[var(--color-bg)] border border-[var(--color-border]) rounded-xl p-1.5 shadow-inner shadow-[var(--color-shadow)] transition-all duration-300 focus:outline-none focus:border-[var(--color-primary)] focus:ring-2 focus:ring-[var(--color-primary)]/10 hover:border-[var(--color-border)] body-font">
                    <p class="mt-1.5 text-xs text-[var(--color-text-muted)] body-font">Optional. Supported formats: PNG, JPG, WEBP, GIF (Max 5MB).</p>

                    <div x-show="imagePreview" x-transition class="mt-3 relative max-w-sm rounded-xl overflow-hidden border border-[var(--color-border)] bg-[var(--color-bg)]">
                        <img :src="imagePreview" alt="Cover Preview" class="w-full h-32 object-cover">
                        <button type="button" @click="imagePreview = null; document.getElementById('image_upload').value = ''"
                            class="absolute top-2 right-2 bg-black/70 hover:bg-red-500 text-white rounded-full w-6 h-6 flex items-center justify-center text-xs transition-colors">
                            ✕
                        </button>
                    </div>
                    @error('image_upload')
                    <p class="mt-1.5 text-xs text-red-400 flex items-center gap-1 heading-font">⚠ {{ $message }}</p>
                    @enderror
                </div>

                {{-- Content --}}
                <div class="mb-6">
                    <label class="block text-xs font-semibold text-[var(--color-text-secondary)] mb-1.5 heading-font" for="body">Content</label>
                    <textarea name="body" id="body" rows="6" placeholder="Start writing your story..."
                        class="w-full px-4 py-3 rounded-xl bg-[var(--color-bg)] border border-[var(--color-border)] text-[var(--color-text-primary)] placeholder:text-[var(--color-text-muted)] text-xs sm:text-sm leading-relaxed resize-y shadow-inner shadow-[var(--color-shadow)] transition-all duration-300 focus:outline-none focus:border-[var(--color-primary)] focus:ring-2 focus:ring-[var(--color-primary)]/10 hover:border-[var(--color-border)] body-font">{{ old('body') }}</textarea>
                    @error('body')
                    <p class="mt-1.5 text-xs text-red-400 flex items-center gap-1 heading-font">⚠ {{ $message }}</p>
                    @enderror
                </div>

                {{-- Actions --}}
                <div class="border-t border-[var(--color-border)] pt-5 flex items-center justify-end gap-3 heading-font">
                    <button type="submit" name="action" value="draft"
                        class="inline-flex items-center justify-center gap-2 px-4 py-2.5 rounded-xl border border-[var(--color-border)] bg-[var(--color-bg)] hover:bg-[var(--color-bg)] hover:border-[var(--color-primary)] text-[var(--color-text-muted)] hover:text-[var(--color-text-primary)] text-xs sm:text-sm font-semibold transition-all duration-300 focus:outline-none">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h8m-8 4h8m-8 4h5M5 3h10l4 4v14H5V3z" />
                        </svg>
                        <span>Save Draft</span>
                    </button>
                    <button type="submit" name="action" value="submit"
                        class="inline-flex items-center justify-center gap-2 px-5 py-2.5 rounded-xl bg-[var(--color-primary)] hover:bg-[var(--color-primary-hover)] text-white text-xs sm:text-sm font-semibold shadow-lg shadow-[var(--color-primary)]/20 hover:shadow-[var(--color-primary)]/40 transition-all duration-300 hover:-translate-y-0.5 focus:outline-none">
                        <span>Submit for Approval</span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14m-6-6l6 6-6 6" />
                        </svg>
                    </button>
                </div>
            </form>
        </div>
    </div>

    {{-- Footnote --}}
    <div class="mt-6 text-center flex items-center justify-center gap-2 text-xs text-[var(--color-text-muted)]">
        <span class="text-[var(--color-primary)]">✦</span>
        <span class="body-font">Take your time. Good writing doesn't need to be rushed.</span>
    </div>

</div>

@endsection