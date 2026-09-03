<button
    hx-patch="{{ route('admin.posts.toggle-publish', $post) }}"
    hx-swap="outerHTML"
    class="px-3 py-1.5 rounded-xl heading-font text-xs font-semibold transition-all duration-200 cursor-pointer active:scale-95 
        {{ $post->published_at 
            ? 'bg-emerald-500/10 text-emerald-500 border border-emerald-500/20 hover:bg-emerald-500/20' 
            : 'bg-[var(--color-bg)] text-[var(--color-text-muted)] border border-[var(--color-border)] hover:bg-[var(--color-bg)] hover:text-[var(--color-text-primary)]' 
        }}">
    {{ $post->published_at ? 'Published' : 'Draft' }}
</button>