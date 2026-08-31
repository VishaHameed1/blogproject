<button
    hx-patch="{{ route('admin.posts.toggle-publish', $post) }}"
    hx-swap="outerHTML"
    class="px-3 py-1.5 rounded-xl font-heading text-xs font-semibold transition-all duration-200 cursor-pointer active:scale-95 {{ $post->published_at ? 'bg-emerald-500/10 text-emerald-400 border border-emerald-500/20 hover:bg-emerald-500/20' : 'bg-white/5 text-white/60 border border-white/10 hover:bg-white/10 hover:text-white' }}"
>
    {{ $post->published_at ? 'Published' : 'Draft' }}
</button>