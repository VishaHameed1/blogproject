<div class="space-y-6">
    {{-- Title Field --}}
    <div class="group">
        <label for="title" class="block text-sm font-heading font-semibold text-white mb-2 transition-colors group-focus-within:text-rust-400">
            Title <span class="text-rust-400">*</span>
        </label>
        <input
            type="text"
            name="title"
            id="title"
            value="{{ old('title', $post->title ?? '') }}"
            required
            class="w-full px-4 py-3 rounded-xl bg-white/5 border border-white/10 text-sm font-body text-white placeholder:text-white/30 focus:border-rust-500 focus:ring-2 focus:ring-rust-500/20 transition-all duration-200 outline-none"
            placeholder="Enter post title..."
        >
        @error('title')
            <p class="text-red-400 text-xs mt-1.5 font-body">{{ $message }}</p>
        @enderror
    </div>

    {{-- Category Field --}}
    <div class="group">
        <label for="category_id" class="block text-sm font-heading font-semibold text-white mb-2 transition-colors group-focus-within:text-rust-400">
            Category <span class="text-rust-400">*</span>
        </label>
        <select 
            name="category_id" 
            id="category_id"
            required
            class="w-full px-4 py-3 rounded-xl bg-[#1e1e1e] border border-white/10 text-sm font-body text-white focus:border-rust-500 focus:ring-2 focus:ring-rust-500/20 transition-all duration-200 outline-none"
        >
            <option value="" class="bg-[#1e1e1e] text-white/40">Select a category</option>
            @foreach ($categories as $category)
                <option
                    value="{{ $category->id }}"
                    class="bg-[#1e1e1e] text-white"
                    @selected(old('category_id', $post->category_id ?? '') == $category->id)
                >
                    {{ $category->name }}
                </option>
            @endforeach
        </select>
        @error('category_id')
            <p class="text-red-400 text-xs mt-1.5 font-body">{{ $message }}</p>
        @enderror
    </div>

    {{-- Body Field --}}
    <div class="group">
        <label for="body" class="block text-sm font-heading font-semibold text-white mb-2 transition-colors group-focus-within:text-rust-400">
            Body <span class="text-rust-400">*</span>
        </label>
        <textarea 
            name="body" 
            id="body"
            rows="10" 
            required
            class="w-full px-4 py-3 rounded-xl bg-white/5 border border-white/10 text-white placeholder:text-white/30 font-mono text-sm focus:border-rust-500 focus:ring-2 focus:ring-rust-500/20 transition-all duration-200 outline-none leading-relaxed"
            placeholder="Write your post content here..."
        >{{ old('body', $post->body ?? '') }}</textarea>
        @error('body')
            <p class="text-red-400 text-xs mt-1.5 font-body">{{ $message }}</p>
        @enderror
    </div>
</div>