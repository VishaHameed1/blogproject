@extends('layouts.admin')

@section('title', 'Manage Categories · Admin')

@section('content')
<div class="max-w-7xl mx-auto animate-fade-in">
    {{-- Header --}}
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-8">
        <div class="text-center sm:text-left">
            <h1 class="heading-font text-3xl font-bold text-white tracking-tight">Manage Categories</h1>
            <p class="text-sm text-white/50 mt-1">Create and manage blog categories</p>
        </div>
        <div class="flex justify-center sm:justify-end">
            <a href="{{ route('admin.categories.create') }}" 
               class="inline-flex items-center gap-2 px-6 py-2.5 bg-rust hover:bg-rust/80 text-white rounded-xl shadow-lg shadow-rust/20 hover:shadow-rust/40 transition-all duration-300 text-sm heading-font font-semibold transform hover:scale-[1.02]">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                </svg>
                New Category
            </a>
        </div>
    </div>

    {{-- Categories Table Container --}}
    <div class="bg-[#121212] border border-white/5 rounded-2xl shadow-xl overflow-hidden transition-all duration-300 hover:border-rust/30">
        <div class="overflow-x-auto">
            <table class="admin-table w-full text-left">
                <thead class="bg-[#0a0a0a]/80 border-b border-white/5 text-white/40 uppercase text-xs heading-font font-semibold tracking-wider">
                    <tr>
                        <th class="px-6 py-4">Image</th>
                        <th class="px-6 py-4">Name</th>
                        <th class="px-6 py-4">Slug</th>
                        <th class="px-6 py-4">Posts</th>
                        <th class="px-6 py-4">Created</th>
                        <th class="px-6 py-4 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-white/5 text-sm">
                    @forelse ($categories as $category)
                        <tr class="hover:bg-rust/5 transition-colors duration-300 group">
                            {{-- Image --}}
                            <td class="px-6 py-4">
                                @if($category->image)
                                    <img src="{{ $category->image_url }}" 
                                         alt="{{ $category->name }}" 
                                         class="w-12 h-12 rounded-xl object-cover border border-white/5 shadow-sm transform transition-transform duration-300 group-hover:scale-105">
                                @else
                                    <div class="w-12 h-12 rounded-xl bg-[#0a0a0a] flex items-center justify-center border border-white/5">
                                        <span class="text-[10px] uppercase heading-font font-bold text-white/20 tracking-wider">No img</span>
                                    </div>
                                @endif
                            </td>

                            {{-- Name --}}
                            <td class="px-6 py-4">
                                <span class="heading-font font-semibold text-white hover:text-rust transition-colors tracking-tight text-sm">{{ $category->name }}</span>
                            </td>

                            {{-- Slug --}}
                            <td class="px-6 py-4">
                                <code class="text-xs bg-[#0a0a0a] text-rust border border-white/5 px-2.5 py-1 rounded-lg font-mono font-medium">
                                    {{ $category->slug }}
                                </code>
                            </td>

                            {{-- Post Count --}}
                            <td class="px-6 py-4">
                                <span class="inline-flex items-center px-3 py-1 bg-white/5 border border-white/5 rounded-full text-xs heading-font font-medium text-white/50">
                                    {{ $category->posts_count ?? $category->posts()->count() }}
                                </span>
                            </td>

                            {{-- Created Date --}}
                            <td class="px-6 py-4 text-white/30 text-xs">
                                {{ $category->created_at->format('M j, Y') }}
                            </td>

                            {{-- Actions --}}
                            <td class="px-6 py-4">
                                <div class="flex items-center justify-end gap-1">
                                    {{-- View Posts --}}
                                    <a href="{{ route('posts.category', $category) }}" 
                                       target="_blank" 
                                       class="p-2 text-white/30 hover:text-white hover:bg-white/5 rounded-xl transition-all duration-300" 
                                       title="View Posts">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                        </svg>
                                    </a>

                                    {{-- Edit --}}
                                    <a href="{{ route('admin.categories.edit', $category) }}" 
                                       class="p-2 text-white/30 hover:text-rust hover:bg-white/5 rounded-xl transition-all duration-300" 
                                       title="Edit">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                        </svg>
                                    </a>

                                    {{-- Delete --}}
                                    <form action="{{ route('admin.categories.destroy', $category) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this category? This will not delete the posts, but they will become uncategorized.');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                                class="p-2 text-white/30 hover:text-red-400 hover:bg-red-500/10 rounded-xl transition-all duration-300" 
                                                title="Delete">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-6 py-16 text-center text-white/40">
                                <div class="text-4xl mb-3 opacity-60">📂</div>
                                <p class="heading-font font-semibold text-white text-base">No categories yet</p>
                                <p class="text-xs text-white/30 mt-1">Create your first category to organize your blog posts.</p>
                                <a href="{{ route('admin.categories.create') }}" 
                                   class="inline-block mt-4 px-6 py-2.5 bg-rust text-white rounded-xl text-xs heading-font font-semibold shadow-lg shadow-rust/20 hover:shadow-rust/40 hover:bg-rust/80 transition-all duration-300 transform hover:scale-[1.02]">
                                    Create Category
                                </a>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- Pagination --}}
        @if($categories->hasPages())
            <div class="px-6 py-4 border-t border-white/5 bg-[#0a0a0a]/30">
                {{ $categories->links() }}
            </div>
        @endif
    </div>
</div>

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

    /* Table styles */
    .admin-table {
        width: 100%;
        font-size: 0.875rem;
    }
    .admin-table thead th {
        padding: 0.75rem 1.5rem;
        text-align: left;
        font-weight: 600;
        color: rgba(255, 255, 255, 0.4);
        font-family: 'Poppins', sans-serif;
        font-size: 0.65rem;
        text-transform: uppercase;
        letter-spacing: 0.05em;
    }
    .admin-table tbody td {
        padding: 0.75rem 1.5rem;
        color: rgba(255, 255, 255, 0.6);
    }
</style>
@endpush
@endsection