@extends('layouts.admin')

@section('title', 'New Post · Admin')

@section('content')
<div class="max-w-4xl mx-auto animate-fade-in">
    {{-- Header --}}
    <div class="mb-8 text-center sm:text-left">
        <h1 class="heading-font text-3xl font-bold text-white tracking-tight">New Post</h1>
        <p class="text-sm text-white/50 mt-1">Create a new blog post</p>
    </div>

    {{-- Form --}}
    <form method="POST" action="{{ route('admin.posts.store') }}" enctype="multipart/form-data" 
          class="bg-[#121212] border border-white/5 rounded-2xl shadow-xl p-6 md:p-8 space-y-6 transition-all duration-300 hover:border-rust/30">
        @csrf

        {{-- Title --}}
        <div class="group">
            <label for="title" class="block text-sm heading-font font-semibold text-white/60 mb-2 transition-colors group-focus-within:text-rust">
                Title <span class="text-rust">*</span>
            </label>
            <input type="text" 
                   name="title" 
                   id="title" 
                   value="{{ old('title') }}"
                   required
                   class="w-full px-4 py-3 rounded-xl bg-[#0a0a0a]/80 border border-white/5 text-sm text-white placeholder:text-white/20 focus:outline-none focus:border-rust focus:ring-1 focus:ring-rust/30 transition-all"
                   placeholder="Enter post title...">
            @error('title')
                <p class="text-red-400 text-xs mt-1.5">{{ $message }}</p>
            @enderror
        </div>

        {{-- Category --}}
        <div class="group">
            <label for="category_id" class="block text-sm heading-font font-semibold text-white/60 mb-2 transition-colors group-focus-within:text-rust">
                Category <span class="text-rust">*</span>
            </label>
            <select name="category_id" 
                    id="category_id" 
                    required
                    class="w-full px-4 py-3 rounded-xl bg-[#0a0a0a]/80 border border-white/5 text-sm text-white focus:outline-none focus:border-rust focus:ring-1 focus:ring-rust/30 transition-all appearance-none">
                <option value="" class="bg-[#121212] text-white/40">Select a category</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" class="bg-[#121212] text-white" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
            @error('category_id')
                <p class="text-red-400 text-xs mt-1.5">{{ $message }}</p>
            @enderror
        </div>

        {{-- Body --}}
        <div class="group">
            <label for="body" class="block text-sm heading-font font-semibold text-white/60 mb-2 transition-colors group-focus-within:text-rust">
                Body <span class="text-rust">*</span>
            </label>
            <textarea name="body" 
                      id="body" 
                      rows="12" 
                      required
                      class="w-full px-4 py-3 rounded-xl bg-[#0a0a0a]/80 border border-white/5 text-white placeholder:text-white/20 font-mono text-sm focus:outline-none focus:border-rust focus:ring-1 focus:ring-rust/30 transition-all leading-relaxed"
                      placeholder="Write your post content here...">{{ old('body') }}</textarea>
            @error('body')
                <p class="text-red-400 text-xs mt-1.5">{{ $message }}</p>
            @enderror
        </div>

        {{-- Featured Image Upload --}}
        <div class="space-y-2">
            <label class="block text-sm heading-font font-semibold text-white/60">Featured Image</label>
            <div>
                <input type="file" 
                       name="image_upload" 
                       id="image_upload" 
                       accept="image/jpeg,image/png,image/jpg,image/gif,image/webp"
                       class="w-full text-xs text-white/40 file:mr-4 file:py-2.5 file:px-5 file:rounded-xl file:border-0 file:text-xs file:heading-font file:font-semibold file:bg-rust file:text-white hover:file:bg-rust/80 file:transition-all file:duration-300 file:cursor-pointer cursor-pointer border border-white/5 rounded-xl bg-[#0a0a0a]/80 py-1.5 px-2">
                <p class="text-xs text-white/20 mt-1.5">Supported formats: JPEG, PNG, JPG, GIF, WebP (Max: 5MB)</p>
                @error('image_upload')
                    <p class="text-red-400 text-xs mt-1.5">{{ $message }}</p>
                @enderror
            </div>
        </div>

        {{-- Image Preview --}}
        <div id="image-preview" class="hidden transform transition-all duration-300">
            <p class="text-xs heading-font font-semibold uppercase tracking-wider text-white/30 mb-2">Image Preview</p>
            <div class="relative inline-block overflow-hidden rounded-xl border border-white/5 shadow-lg">
                <img id="preview" src="" alt="Preview" class="max-h-48 rounded-xl object-cover transform transition-all duration-300 hover:scale-105">
            </div>
        </div>

        {{-- Publish Status --}}
        <div class="pt-2">
            <label class="flex items-center gap-3 cursor-pointer group w-fit">
                <input type="checkbox" 
                       name="is_published" 
                       id="is_published" 
                       value="1"
                       class="w-5 h-5 rounded border-white/20 bg-[#0a0a0a] text-rust focus:ring-rust/30 accent-rust transition-all cursor-pointer">
                <span class="text-sm heading-font font-semibold text-white/60 group-hover:text-rust transition-colors">Publish immediately</span>
            </label>
            <p class="text-xs text-white/20 mt-1 pl-8">If unchecked, the post will be saved as a draft</p>
        </div>

        {{-- Actions --}}
        <div class="flex flex-col sm:flex-row items-center gap-4 pt-6 border-t border-white/5">
            <button type="submit" 
                    class="w-full sm:w-auto px-6 py-2.5 bg-rust hover:bg-rust/80 text-white heading-font font-semibold text-sm rounded-xl shadow-lg shadow-rust/20 hover:shadow-rust/40 transition-all duration-300 transform hover:scale-[1.02]">
                Create Post
            </button>
            <a href="{{ route('admin.posts.index') }}" 
               class="w-full sm:w-auto px-6 py-2.5 bg-white/5 hover:bg-white/10 border border-white/5 text-white/40 hover:text-white heading-font font-medium text-sm rounded-xl transition-all duration-300 text-center">
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
            }
        });
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

    /* Select dropdown arrow */
    select {
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke='rgba(255,255,255,0.3)'%3E%3Cpath stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M19 9l-7 7-7-7'%3E%3C/path%3E%3C/svg%3E");
        background-repeat: no-repeat;
        background-position: right 1rem center;
        background-size: 1rem;
        padding-right: 2.5rem;
    }
</style>
@endpush
@endsection