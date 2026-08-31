@extends('layouts.admin')

@section('title', 'Edit Category · Admin')

@section('content')
<div class="max-w-4xl mx-auto animate-fade-in">
    {{-- Header --}}
    <div class="mb-8 text-center sm:text-left">
        <h1 class="heading-font text-3xl font-bold text-white tracking-tight">Edit Category</h1>
        <p class="text-sm text-white/50 mt-1">Update category details below</p>
    </div>

    {{-- Form --}}
    <form method="POST" action="{{ route('admin.categories.update', $category) }}" enctype="multipart/form-data" class="bg-[#121212] border border-white/5 rounded-2xl shadow-xl p-6 md:p-8 space-y-6 transition-all duration-300 hover:border-rust/30">
        @csrf
        @method('PUT')

        {{-- Name --}}
        <div class="group">
            <label for="name" class="block text-sm heading-font font-semibold text-white/60 mb-2 transition-colors group-focus-within:text-rust">Name <span class="text-rust">*</span></label>
            <input type="text" 
                   name="name" 
                   id="name" 
                   value="{{ old('name', $category->name) }}"
                   required
                   class="w-full px-4 py-3 rounded-xl bg-[#0a0a0a]/80 border border-white/5 text-sm text-white placeholder:text-white/20 focus:outline-none focus:border-rust focus:ring-1 focus:ring-rust/30 transition-all"
                   placeholder="e.g., Technology, Design, Life">
            @error('name')
                <p class="text-red-400 text-xs mt-1.5">{{ $message }}</p>
            @enderror
        </div>

        {{-- Slug (readonly) --}}
        <div>
            <label class="block text-sm heading-font font-semibold text-white/60 mb-2">Slug</label>
            <div class="px-4 py-3 rounded-xl bg-[#0a0a0a]/80 border border-white/5 text-white/30 font-mono text-sm break-all">
                {{ $category->slug }}
            </div>
            <p class="text-xs text-white/20 mt-1">Slug is automatically generated from the name</p>
        </div>

        {{-- Current Image --}}
        @if($category->image)
            <div>
                <label class="block text-sm heading-font font-semibold text-white/60 mb-2">Current Image</label>
                <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4 p-4 bg-[#0a0a0a]/50 rounded-xl border border-white/5 transition-opacity" id="current-image-container">
                    <img src="{{ $category->image_url }}" 
                         alt="{{ $category->name }}" 
                         class="h-20 max-w-full w-auto rounded-xl object-cover border border-white/5 shadow-sm">
                    <div class="flex items-center gap-2">
                        <label class="flex items-center gap-2 cursor-pointer select-none">
                            <input type="checkbox" 
                                   name="remove_image" 
                                   id="remove_image" 
                                   value="1"
                                   class="w-4 h-4 rounded border-white/20 bg-[#0a0a0a] text-rust focus:ring-rust/30 accent-rust cursor-pointer">
                            <span class="text-xs heading-font font-semibold text-red-400">Remove image</span>
                        </label>
                    </div>
                </div>
            </div>
        @endif

        {{-- Upload New Image --}}
        <div>
            <label class="block text-sm heading-font font-semibold text-white/60 mb-2">Upload New Image</label>
            <div class="w-full">
                <input type="file" 
                       name="image" 
                       id="image" 
                       accept="image/jpeg,image/png,image/jpg,image/gif,image/webp"
                       class="w-full text-xs text-white/40 file:mr-4 file:py-2.5 file:px-5 file:rounded-xl file:border-0 file:text-xs file:heading-font file:font-semibold file:bg-rust file:text-white hover:file:bg-rust/80 file:transition-all file:duration-300 file:cursor-pointer cursor-pointer border border-white/5 rounded-xl bg-[#0a0a0a]/80 py-1.5 px-2">
                <p class="text-xs text-white/20 mt-1">Supported formats: JPEG, PNG, JPG, GIF, WebP (Max: 5MB)</p>
                @error('image')
                    <p class="text-red-400 text-xs mt-1.5">{{ $message }}</p>
                @enderror
            </div>
            
            {{-- Image Preview --}}
            <div id="image-preview" class="hidden mt-3">
                <p class="text-xs heading-font font-semibold text-white/30 mb-2">New Image Preview</p>
                <div class="relative inline-block">
                    <img id="preview" src="" alt="Preview" class="h-32 max-w-full w-auto rounded-xl border border-white/5 object-cover shadow-md">
                </div>
            </div>
        </div>

        {{-- Description --}}
        <div class="group">
            <label for="description" class="block text-sm heading-font font-semibold text-white/60 mb-2 transition-colors group-focus-within:text-rust">Description</label>
            <textarea name="description" 
                      id="description" 
                      rows="3"
                      class="w-full px-4 py-3 rounded-xl bg-[#0a0a0a]/80 border border-white/5 text-sm text-white placeholder:text-white/20 focus:outline-none focus:border-rust focus:ring-1 focus:ring-rust/30 transition-all resize-none"
                      placeholder="Brief description of this category...">{{ old('description', $category->description) }}</textarea>
            @error('description')
                <p class="text-red-400 text-xs mt-1.5">{{ $message }}</p>
            @enderror
        </div>

        {{-- Post Count --}}
        <div class="p-4 bg-[#0a0a0a]/50 rounded-xl border border-white/5 text-center sm:text-left">
            <p class="text-xs sm:text-sm text-white/40">
                <span class="heading-font font-semibold text-rust">{{ $category->posts()->count() }}</span> 
                {{ Str::plural('post', $category->posts()->count()) }} in this category
            </p>
        </div>

        {{-- Actions --}}
        <div class="flex flex-col sm:flex-row items-center gap-4 pt-6 border-t border-white/5">
            <a href="{{ route('admin.categories.index') }}" class="w-full sm:w-auto px-6 py-2.5 bg-white/5 hover:bg-white/10 border border-white/5 text-white/40 hover:text-white heading-font font-medium text-sm rounded-xl transition-all duration-300 text-center">
                Cancel
            </a>
            <button type="submit" class="w-full sm:w-auto px-6 py-2.5 bg-rust hover:bg-rust/80 text-white heading-font font-semibold text-sm rounded-xl shadow-lg shadow-rust/20 hover:shadow-rust/40 transition-all duration-300 transform hover:scale-[1.02]">
                Update Category
            </button>
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

        // Remove image checkbox handling
        const removeImageCheck = document.getElementById('remove_image');
        if (removeImageCheck) {
            removeImageCheck.addEventListener('change', function() {
                const currentImageDiv = document.getElementById('current-image-container');
                if (this.checked) {
                    currentImageDiv.style.opacity = '0.3';
                } else {
                    currentImageDiv.style.opacity = '1';
                }
            });
        }
    });
</script>
@endpush

@push('styles')
<style>
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(6px); }
        to { opacity: 1; transform: translateY(0); }
    }
    .animate-fade-in {
        animation: fadeIn 0.6s ease-out forwards;
    }

    /* Heading font - Poppins */
    .heading-font {
        font-family: 'Poppins', ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif !important;
        letter-spacing: -0.02em !important;
    }

    /* Selection color */
    ::selection {
        background-color: rgba(196, 90, 46, 0.3) !important;
        color: #ffffff !important;
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
@endsection