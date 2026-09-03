<div class="space-y-6">

    {{-- =========================================================
         Title Field
    ========================================================== --}}
    <div class="group">

        <label
            for="title"
            class="block text-sm heading-font font-semibold
                   text-[var(--color-text-secondary)]
                   mb-2 transition-colors duration-200
                   group-focus-within:text-[var(--color-primary)]">

            Title
            <span class="text-[var(--color-primary)]">*</span>
        </label>

        <input
            type="text"
            name="title"
            id="title"
            value="{{ old('title', $post->title ?? '') }}"
            required
            class="w-full px-4 py-3 rounded-xl
                   bg-[var(--color-bg)]
                   border border-[var(--color-border)]
                   text-sm body-font
                   text-[var(--color-text-primary)]
                   placeholder:text-[var(--color-text-muted)]
                   focus:outline-none
                   focus:border-[var(--color-primary)]
                   focus:ring-2
                   focus:ring-[var(--color-primary)]/20
                   transition-all duration-200"
            placeholder="Enter post title...">

        @error('title')
        <p class="text-red-500 text-xs mt-1.5 body-font">
            {{ $message }}
        </p>
        @enderror

    </div>


    {{-- =========================================================
         Category Field
    ========================================================== --}}
    <div class="group">

        <label
            for="category_id"
            class="block text-sm heading-font font-semibold
                   text-[var(--color-text-secondary)]
                   mb-2 transition-colors duration-200
                   group-focus-within:text-[var(--color-primary)]">

            Category
            <span class="text-[var(--color-primary)]">*</span>
        </label>

        <div class="relative">

            <select
                name="category_id"
                id="category_id"
                required
                class="w-full px-4 py-3 pr-10 rounded-xl
                       bg-[var(--color-bg)]
                       border border-[var(--color-border)]
                       text-sm body-font
                       text-[var(--color-text-primary)]
                       focus:outline-none
                       focus:border-[var(--color-primary)]
                       focus:ring-2
                       focus:ring-[var(--color-primary)]/20
                       transition-all duration-200
                       appearance-none cursor-pointer">

                <option
                    value=""
                    class="bg-[var(--color-bg-card)]
                           text-[var(--color-text-muted)]">
                    Select a category
                </option>

                @foreach ($categories as $category)

                <option
                    value="{{ $category->id }}"
                    class="bg-[var(--color-bg-card)]
                               text-[var(--color-text-primary)]"
                    @selected(
                    old( 'category_id' ,
                    $post->category_id ?? ''
                    ) == $category->id
                    )
                    >
                    {{ $category->name }}
                </option>

                @endforeach

            </select>

            {{-- Custom Arrow --}}
            <div
                class="pointer-events-none absolute
                       right-4 top-1/2 -translate-y-1/2
                       text-[var(--color-text-muted)]">

                <svg
                    class="w-4 h-4"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24">

                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M19 9l-7 7-7-7" />

                </svg>

            </div>

        </div>

        @error('category_id')
        <p class="text-red-500 text-xs mt-1.5 body-font">
            {{ $message }}
        </p>
        @enderror

    </div>


    {{-- =========================================================
         Body Field
    ========================================================== --}}
    <div class="group">

        <label
            for="body"
            class="block text-sm heading-font font-semibold
                   text-[var(--color-text-secondary)]
                   mb-2 transition-colors duration-200
                   group-focus-within:text-[var(--color-primary)]">

            Body
            <span class="text-[var(--color-primary)]">*</span>
        </label>

        <textarea
            name="body"
            id="body"
            rows="10"
            required
            class="w-full px-4 py-3 rounded-xl
                   bg-[var(--color-bg)]
                   border border-[var(--color-border)]
                   text-[var(--color-text-primary)]
                   placeholder:text-[var(--color-text-muted)]
                   body-font text-sm
                   focus:outline-none
                   focus:border-[var(--color-primary)]
                   focus:ring-2
                   focus:ring-[var(--color-primary)]/20
                   transition-all duration-200
                   leading-relaxed
                   resize-y"
            placeholder="Write your post content here...">{{ old('body', $post->body ?? '') }}</textarea>

        @error('body')
        <p class="text-red-500 text-xs mt-1.5 body-font">
            {{ $message }}
        </p>
        @enderror

    </div>

</div>


@push('styles')
<style>
    /* =========================================================
       CHRONICLE ADMIN POST FORM
       Theme:
       Light  → Purple
       Dark   → Blue
    ========================================================== */

    /* ---------- Inputs ---------- */

    input,
    textarea,
    select {
        color-scheme: light;
    }

    [data-theme="dark"] input,
    [data-theme="dark"] textarea,
    [data-theme="dark"] select {
        color-scheme: dark;
    }


    /* ---------- Placeholder ---------- */

    input::placeholder,
    textarea::placeholder {
        color: var(--color-text-muted);
        opacity: 0.7;
    }


    /* ---------- Select ---------- */

    select option {
        background-color: var(--color-bg-card);
        color: var(--color-text-primary);
    }

    [data-theme="dark"] select option {
        background-color: var(--color-bg-card);
        color: var(--color-text-primary);
    }


    /* ---------- Autofill ---------- */

    input:-webkit-autofill,
    input:-webkit-autofill:hover,
    input:-webkit-autofill:focus,
    textarea:-webkit-autofill,
    textarea:-webkit-autofill:hover,
    textarea:-webkit-autofill:focus,
    select:-webkit-autofill {

        -webkit-text-fill-color: var(--color-text-primary);

        -webkit-box-shadow:
            0 0 0px 1000px var(--color-bg) inset;

        transition:
            background-color 5000s ease-in-out 0s;
    }


    /* ---------- Focus ---------- */

    input:focus,
    textarea:focus,
    select:focus {
        box-shadow:
            0 0 0 3px color-mix(in srgb,
                var(--color-primary) 12%,
                transparent);
    }


    /* ---------- Textarea ---------- */

    textarea {
        min-height: 240px;
    }


    /* ---------- Scrollbar ---------- */

    textarea::-webkit-scrollbar {
        width: 6px;
    }

    textarea::-webkit-scrollbar-track {
        background: transparent;
    }

    textarea::-webkit-scrollbar-thumb {
        background: var(--color-border);
        border-radius: 999px;
    }

    textarea::-webkit-scrollbar-thumb:hover {
        background: var(--color-primary);
    }


    /* ---------- Selection ---------- */

    input::selection,
    textarea::selection,
    select::selection {
        background: var(--color-primary-soft);
        color: #ffffff;
    }


    /* ---------- Firefox ---------- */

    input,
    textarea,
    select {
        scrollbar-width: thin;
        scrollbar-color:
            var(--color-border) transparent;
    }
</style>
@endpush