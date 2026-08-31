@extends('layouts.author')

@section('content')

<div class="max-w-3xl mx-auto px-4 sm:px-6 py-6 sm:py-8 font-['Work_Sans',sans-serif]">

    {{-- Header Section --}}
    <section class="text-center mb-8 relative">
        <div class="absolute -top-16 left-1/2 -translate-x-1/2 w-72 h-72 bg-orange-600/10 blur-[100px] rounded-full pointer-events-none"></div>
        
        <div class="relative z-10">
            <div class="flex items-center justify-center gap-2 mb-1.5">
                <span class="h-px w-6 bg-orange-500"></span>
                <span class="text-[10px] uppercase tracking-[0.25em] font-semibold text-orange-400 font-['Poppins',sans-serif]">AUTHOR STUDIO</span>
                <span class="h-px w-6 bg-orange-500"></span>
            </div>
            <h1 class="text-2xl sm:text-3xl font-bold tracking-tight text-white font-['Poppins',sans-serif]">
                Create New Post
            </h1>
            <p class="mt-1 text-xs sm:text-sm text-zinc-400 max-w-md mx-auto">
                Shape your thoughts into something worth reading. Save your work as a draft or submit it for approval.
            </p>
        </div>
    </section>

    {{-- Main Form Card (Dark Charcoal & Rust Theme) --}}
    <div class="bg-[#121212] border border-zinc-800/80 rounded-2xl shadow-2xl shadow-black/50 overflow-hidden relative">
        
        {{-- Top Rust Accent Border Line --}}
        <div class="h-1 w-full bg-gradient-to-r from-orange-700 via-orange-500 to-amber-500"></div>

        <div class="p-6 sm:p-8">
            <form action="{{ route('author.posts.store') }}" method="POST" enctype="multipart/form-data" x-data="{ imagePreview: null }">
                @csrf

                {{-- Title --}}
                <div class="mb-5">
                    <label class="block text-xs font-semibold text-zinc-200 mb-1.5 font-['Poppins',sans-serif]" for="title">Title</label>
                    <input type="text" name="title" id="title" value="{{ old('title') }}" placeholder="Give your post a thoughtful title..."
                        class="w-full h-11 px-4 rounded-xl bg-zinc-950 border border-zinc-800 text-zinc-100 placeholder:text-zinc-600 text-xs sm:text-sm shadow-inner shadow-black/40 transition-all duration-300 focus:outline-none focus:border-orange-500 focus:ring-2 focus:ring-orange-500/10 hover:border-zinc-700">
                    @error('title')
                        <p class="mt-1.5 text-xs text-red-400 flex items-center gap-1 font-['Poppins',sans-serif]"><span>⚠</span> {{ $message }}</p>
                    @enderror
                </div>

                {{-- Category --}}
                <div class="mb-5">
                    <label class="block text-xs font-semibold text-zinc-200 mb-1.5 font-['Poppins',sans-serif]" for="category_id">Category</label>
                    <div class="relative">
                        <select name="category_id" id="category_id"
                            class="appearance-none w-full h-11 px-4 pr-10 rounded-xl bg-zinc-950 border border-zinc-800 text-zinc-100 text-xs sm:text-sm shadow-inner shadow-black/40 transition-all duration-300 focus:outline-none focus:border-orange-500 focus:ring-2 focus:ring-orange-500/10 hover:border-zinc-700">
                            <option value="" class="bg-[#121212] text-zinc-500">Select Category</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" class="bg-[#121212]" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                        <div class="absolute right-4 top-1/2 -translate-y-1/2 pointer-events-none text-zinc-500">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </div>
                    </div>
                    @error('category_id')
                        <p class="mt-1.5 text-xs text-red-400 flex items-center gap-1 font-['Poppins',sans-serif]"><span>⚠</span> {{ $message }}</p>
                    @enderror
                </div>

                {{-- Cover Image --}}
                <div class="mb-5">
                    <label class="block text-xs font-semibold text-zinc-200 mb-1.5 font-['Poppins',sans-serif]" for="image_upload">Cover Image</label>
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
                        class="w-full text-xs text-zinc-400 file:mr-3 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-zinc-800 file:text-zinc-200 hover:file:bg-orange-600 hover:file:text-white file:transition-all file:duration-300 file:cursor-pointer bg-zinc-950 border border-zinc-800 rounded-xl p-1.5 shadow-inner shadow-black/40 transition-all duration-300 focus:outline-none focus:border-orange-500 focus:ring-2 focus:ring-orange-500/10 hover:border-zinc-700">
                    <p class="mt-1.5 text-xs text-zinc-500">Optional. Supported formats: PNG, JPG, WEBP, GIF (Max 5MB).</p>
                    
                    <div x-show="imagePreview" x-transition class="mt-3 relative max-w-sm rounded-xl overflow-hidden border border-zinc-800 bg-zinc-950">
                        <img :src="imagePreview" alt="Cover Preview" class="w-full h-32 object-cover">
                        <button type="button" @click="imagePreview = null; document.getElementById('image_upload').value = ''" 
                            class="absolute top-2 right-2 bg-black/70 hover:bg-rose-600 text-white rounded-full w-6 h-6 flex items-center justify-center text-xs transition-colors">
                            ✕
                        </button>
                    </div>
                    @error('image_upload')
                        <p class="mt-1.5 text-xs text-red-400 flex items-center gap-1 font-['Poppins',sans-serif]"><span>⚠</span> {{ $message }}</p>
                    @enderror
                </div>

                {{-- Content --}}
                <div class="mb-6">
                    <label class="block text-xs font-semibold text-zinc-200 mb-1.5 font-['Poppins',sans-serif]" for="body">Content</label>
                    <textarea name="body" id="body" rows="6" placeholder="Start writing your story..."
                        class="w-full px-4 py-3 rounded-xl bg-zinc-950 border border-zinc-800 text-zinc-100 placeholder:text-zinc-600 text-xs sm:text-sm leading-relaxed resize-y shadow-inner shadow-black/40 transition-all duration-300 focus:outline-none focus:border-orange-500 focus:ring-2 focus:ring-orange-500/10 hover:border-zinc-700">{{ old('body') }}</textarea>
                    @error('body')
                        <p class="mt-1.5 text-xs text-red-400 flex items-center gap-1 font-['Poppins',sans-serif]"><span>⚠</span> {{ $message }}</p>
                    @enderror
                </div>

                {{-- Actions --}}
                <div class="border-t border-zinc-800/80 pt-5 flex items-center justify-end gap-3 font-['Poppins',sans-serif]">
                    <button type="submit" name="action" value="draft"
                        class="inline-flex items-center justify-center gap-2 px-4 py-2.5 rounded-xl border border-zinc-700 bg-zinc-800/60 hover:bg-zinc-800 hover:border-zinc-600 text-zinc-300 hover:text-white text-xs sm:text-sm font-semibold transition-all duration-300 focus:outline-none">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h8m-8 4h8m-8 4h5M5 3h10l4 4v14H5V3z"/>
                        </svg>
                        <span>Save Draft</span>
                    </button>
                    <button type="submit" name="action" value="submit"
                        class="inline-flex items-center justify-center gap-2 px-5 py-2.5 rounded-xl bg-gradient-to-r from-orange-600 to-amber-600 hover:from-orange-500 hover:to-amber-500 text-white text-xs sm:text-sm font-semibold shadow-md shadow-orange-950/30 transition-all duration-300 hover:-translate-y-0.5 focus:outline-none">
                        <span>Submit for Approval</span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14m-6-6l6 6-6 6"/>
                        </svg>
                    </button>
                </div>
            </form>
        </div>
    </div>

    {{-- Footnote --}}
    <div class="mt-6 text-center flex items-center justify-center gap-2 text-xs text-zinc-500">
        <span class="text-orange-500">✦</span>
        <span>Take your time. Good writing doesn't need to be rushed.</span>
    </div>

</div>

@endsection