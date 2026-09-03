@extends('layouts.admin')

@section('title', 'New Category · Admin')

@section('content')
<div class="max-w-4xl mx-auto animate-fade-in">
    {{-- Header --}}
    <div class="mb-8 text-center sm:text-left">
        <h1 class="heading-font text-3xl font-bold text-[var(--color-text-primary)] tracking-tight">New Category</h1>
        <p class="text-sm text-[var(--color-text-muted)] mt-1">Create a new blog category</p>
    </div>

    {{-- Form --}}
    <form method="POST" action="{{ route('admin.categories.store') }}" enctype="multipart/form-data" class="bg-[var(--color-bg-card)] border border-[var(--color-border]) rounded-2xl shadow-xl p-6 md:p-8 space-y-6 transition-all duration-300 hover:border-[var(--color-primary)]/30">
        @csrf

        {{-- Name --}}
        <div class="group">
            <label for="name" class="block text-sm heading-font font-semibold text-[var(--color-text-secondary)] mb-2 transition-colors group-focus-within:text-[var(--color-primary)]">Name <span class="text-[var(--color-primary)]">*</span></label>
            <input type="text"
                name="name"
                id="name"
                value="{{ old('name') }}"
                required
                class="w-full px-4 py-3 rounded-xl bg-[var(--color-bg)] border border-[var(--color-border]) text-sm text-[var(--color-text-primary)] placeholder:text-[var(--color-text-muted)] focus:outline-none focus:border-[var(--color-primary)] focus:ring-1 focus:ring-[var(--color-primary)]/30 transition-all"
                placeholder="e.g., Technology, Design, Life">
            @error('name')
            <p class="text-red-500 text-xs mt-1.5">{{ $message }}</p>
            @enderror
        </div>

        {{-- Slug (readonly) --}}
        <div>
            <label class="block text-sm heading-font font-semibold text-[var(--color-text-secondary)] mb-2">Slug</label>
            <div class="px-4 py-3 rounded-xl bg-[var(--color-bg)] border border-[var(--color-border]) text-[var(--color-text-muted)] font-mono text-sm" id="slug-display">
                auto-generated
            </div>
            <p class="text-xs text-[var(--color-text-muted)] mt-1">Slug is automatically generated from the name</p>
        </div>

        {{-- Image Upload --}}
        <div>
            <label class="block text-sm heading-font font-semibold text-[var(--color-text-secondary)] mb-2">Category Image</label>
            <div>
                <input type="file"
                    name="image"
                    id="image"
                    accept="image/jpeg,image/png,image/jpg,image/gif,image/webp"
                    class="w-full text-xs text-[var(--color-text-muted)] file:mr-4 file:py-2.5 file:px-5 file:rounded-xl file:border-0 file:text-xs file:heading-font file:font-semibold file:bg-[var(--color-primary)] file:text-white hover:file:bg-[var(--color-primary-hover)] file:transition-all file:duration-300 file:cursor-pointer file:shadow-lg file:shadow-[var(--color-primary)]/20 hover:file:shadow-[var(--color-primary)]/40 cursor-pointer border border-[var(--color-border]) rounded-xl bg-[var(--color-bg)] py-1.5 px-2">
                <p class="text-xs text-[var(--color-text-muted)] mt-1">Supported formats: JPEG, PNG, JPG, GIF, WebP (Max: 5MB)</p>
                @error('image')
                <p class="text-red-500 text-xs mt-1.5">{{ $message }}</p>
                @enderror
            </div>

            {{-- Image Preview --}}
            <div id="image-preview" class="hidden mt-3">
                <p class="text-xs heading-font font-semibold text-[var(--color-text-muted)] mb-2">Image Preview</p>
                <div class="relative inline-block">
                    <img id="preview" src="" alt="Preview" class="h-32 w-auto rounded-xl border border-[var(--color-border]) object-cover shadow-md">
                </div>
            </div>
        </div>

        {{-- Description --}}
        <div class="group">
            <label for="description" class="block text-sm heading-font font-semibold text-[var(--color-text-secondary)] mb-2 transition-colors group-focus-within:text-[var(--color-primary)]">Description</label>
            <textarea name="description"
                id="description"
                rows="3"
                class="w-full px-4 py-3 rounded-xl bg-[var(--color-bg)] border border-[var(--color-border]) text-sm text-[var(--color-text-primary)] placeholder:text-[var(--color-text-muted)] focus:outline-none focus:border-[var(--color-primary)] focus:ring-1 focus:ring-[var(--color-primary)]/30 transition-all resize-none"
                placeholder="Brief description of this category...">{{ old('description') }}</textarea>
            @error('description')
            <p class="text-red-500 text-xs mt-1.5">{{ $message }}</p>
            @enderror
        </div>

        {{-- Actions --}}
        <div class="flex flex-col sm:flex-row items-center gap-4 pt-6 border-t border-[var(--color-border])">
            <button type="submit" class="w-full sm:w-auto px-6 py-2.5 bg-[var(--color-primary)] hover:bg-[var(--color-primary-hover)] text-white heading-font font-semibold text-sm rounded-xl shadow-lg shadow-[var(--color-primary)]/20 hover:shadow-[var(--color-primary)]/40 transition-all duration-300 transform hover:scale-[1.02]">
                Create Category
            </button>
            <a href="{{ route('admin.categories.index') }}" class="w-full sm:w-auto px-6 py-2.5 bg-[var(--color-bg)] hover:bg-[var(--color-bg)] border border-[var(--color-border]) text-[var(--color-text-muted)] hover:text-[var(--color-text-primary)] heading-font font-medium text-sm rounded-xl transition-all duration-300 text-center">
                Cancel
            </a>
        </div>
    </form>
</div>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Image Preview
        const imageInput = document.getElementById('image');
        const previewContainer = document.getElementById('image-preview');
        const previewImage = document.getElementById('preview');

        if (imageInput) {
            imageInput.addEventListener('change', function(e) {
                const file = e.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(event) {
                        previewImage.src = event.target.result;
                        previewContainer.classList.remove('hidden');
                    };
                    reader.readAsDataURL(file);
                } else {
                    previewContainer.classList.add('hidden');
                    previewImage.src = '';
                }
            });
        }

        // Auto-generate slug preview
        const nameInput = document.getElementById('name');
        const slugDisplay = document.getElementById('slug-display');

        if (nameInput && slugDisplay) {
            nameInput.addEventListener('input', function() {
                const slug = this.value.toLowerCase().replace(/[^a-z0-9]+/g, '-').replace(/^-|-$/g, '');
                if (slug) {
                    slugDisplay.textContent = slug;
                } else {
                    slugDisplay.textContent = 'auto-generated';
                }
            });
        }
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

    /* Heading font - Poppins */
    .heading-font {
        font-family: 'Poppins', ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif !important;
        letter-spacing: -0.02em !important;
    }

    /* Selection color - Theme aware */
    ::selection {
        background-color: var(--color-primary-soft) !important;
        color: #ffffff !important;
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

    /* File input consistency */
    input[type="file"]::file-selector-button {
        cursor: pointer;
    }

    /* Fix for border color in dark mode - no white border */
    [data-theme="dark"] .border-white\/5 {
        border-color: var(--color-border) !important;
    }

    [data-theme="dark"] .border-white\/10 {
        border-color: var(--color-border) !important;
    }

    [data-theme="dark"] .border-white\/20 {
        border-color: var(--color-border) !important;
    }
</style>
@endpush
@endsection