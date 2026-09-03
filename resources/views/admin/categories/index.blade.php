@extends('layouts.admin')

@section('title', 'Manage Categories · Admin')

@section('content')

<div class="max-w-7xl mx-auto animate-fade-in">

    {{-- =========================================================
         HEADER
    ========================================================== --}}
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-8">

        <div class="text-center sm:text-left">
            <h1 class="heading-font text-3xl font-bold tracking-tight text-[var(--color-text-primary)]">
                Manage Categories
            </h1>

            <p class="text-sm text-[var(--color-text-secondary)] mt-1">
                Create and manage blog categories
            </p>
        </div>

        <div class="flex justify-center sm:justify-end">

            <a
                href="{{ route('admin.categories.create') }}"
                class="category-primary-btn inline-flex items-center gap-2
                       px-6 py-2.5 rounded-xl
                       text-white text-sm heading-font font-semibold
                       transition-all duration-300
                       transform hover:scale-[1.02]">

                <svg
                    class="w-5 h-5"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24"
                    aria-hidden="true">

                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M12 4v16m8-8H4" />

                </svg>

                New Category

            </a>

        </div>
    </div>


    {{-- =========================================================
         SUCCESS MESSAGE
    ========================================================== --}}
    @if(session('success'))

    <div
        class="mb-6 p-4
                   rounded-2xl
                   border
                   flex items-center gap-3
                   success-message">

        <svg
            class="w-5 h-5 shrink-0"
            fill="none"
            stroke="currentColor"
            viewBox="0 0 24 24"
            aria-hidden="true">

            <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0" />

        </svg>

        <span class="text-sm">
            {{ session('success') }}
        </span>

    </div>

    @endif


    {{-- =========================================================
         CATEGORIES TABLE CARD
    ========================================================== --}}
    <div class="categories-card rounded-2xl overflow-hidden">

        <div class="overflow-x-auto">

            <table class="admin-table w-full text-left">

                {{-- =================================================
                     TABLE HEADER
                ================================================== --}}
                <thead>

                    <tr>

                        <th class="px-6 py-4">
                            Image
                        </th>

                        <th class="px-6 py-4">
                            Name
                        </th>

                        <th class="px-6 py-4">
                            Slug
                        </th>

                        <th class="px-6 py-4">
                            Posts
                        </th>

                        <th class="px-6 py-4">
                            Created
                        </th>

                        <th class="px-6 py-4 text-right">
                            Actions
                        </th>

                    </tr>

                </thead>


                {{-- =================================================
                     TABLE BODY
                ================================================== --}}
                <tbody>

                    @forelse ($categories as $category)

                    <tr class="category-row">

                        {{-- =========================================
                                 IMAGE
                            ========================================== --}}
                        <td class="px-6 py-4">

                            @if($category->image)

                            <img
                                src="{{ $category->image_url }}"
                                alt="{{ $category->name }}"
                                loading="lazy"
                                class="category-image w-12 h-12 rounded-xl
                                               object-cover
                                               border
                                               shadow-sm
                                               transform
                                               transition-transform duration-300
                                               group-hover:scale-105">

                            @else

                            <div
                                class="category-image-placeholder
                                               w-12 h-12 rounded-xl
                                               flex items-center justify-center
                                               border">

                                <span
                                    class="text-[10px] uppercase
                                                   heading-font font-bold
                                                   tracking-wider">

                                    No img

                                </span>

                            </div>

                            @endif

                        </td>


                        {{-- =========================================
                                 NAME
                            ========================================== --}}
                        <td class="px-6 py-4">

                            <span
                                class="heading-font font-semibold
                                           text-[var(--color-text-primary)]
                                           tracking-tight text-sm
                                           transition-colors duration-200">

                                {{ $category->name }}

                            </span>

                        </td>


                        {{-- =========================================
                                 SLUG
                            ========================================== --}}
                        <td class="px-6 py-4">

                            <code class="category-slug
                                             text-xs
                                             px-2.5 py-1
                                             rounded-lg
                                             font-mono
                                             font-medium">

                                {{ $category->slug }}

                            </code>

                        </td>


                        {{-- =========================================
                                 POST COUNT
                            ========================================== --}}
                        <td class="px-6 py-4">

                            <span class="category-count
                                             inline-flex items-center
                                             px-3 py-1
                                             rounded-full
                                             text-xs
                                             heading-font
                                             font-medium">

                                {{ $category->posts_count ?? $category->posts()->count() }}

                            </span>

                        </td>


                        {{-- =========================================
                                 CREATED DATE
                            ========================================== --}}
                        <td class="px-6 py-4">

                            <span class="text-xs text-[var(--color-text-muted)]">

                                {{ $category->created_at->format('M j, Y') }}

                            </span>

                        </td>


                        {{-- =========================================
                                 ACTIONS
                            ========================================== --}}
                        <td class="px-6 py-4">

                            <div class="flex items-center justify-end gap-1">

                                {{-- View Posts --}}
                                <a
                                    href="{{ route('posts.category', $category) }}"
                                    target="_blank"
                                    rel="noopener noreferrer"
                                    class="category-action-btn"
                                    title="View Posts"
                                    aria-label="View posts">

                                    <svg
                                        class="w-4 h-4"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24"
                                        aria-hidden="true">

                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />

                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />

                                    </svg>

                                </a>


                                {{-- Edit --}}
                                <a
                                    href="{{ route('admin.categories.edit', $category) }}"
                                    class="category-action-btn category-edit-btn"
                                    title="Edit"
                                    aria-label="Edit category">

                                    <svg
                                        class="w-4 h-4"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24"
                                        aria-hidden="true">

                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />

                                    </svg>

                                </a>


                                {{-- Delete --}}
                                <form
                                    action="{{ route('admin.categories.destroy', $category) }}"
                                    method="POST"
                                    class="inline"
                                    onsubmit="return confirm('Are you sure you want to delete this category? This will not delete the posts, but they will become uncategorized.');">

                                    @csrf
                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="category-action-btn category-delete-btn"
                                        title="Delete"
                                        aria-label="Delete category">

                                        <svg
                                            class="w-4 h-4"
                                            fill="none"
                                            stroke="currentColor"
                                            viewBox="0 0 24 24"
                                            aria-hidden="true">

                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />

                                        </svg>

                                    </button>

                                </form>

                            </div>

                        </td>

                    </tr>

                    @empty

                    {{-- =============================================
                             EMPTY STATE
                        ============================================== --}}
                    <tr>

                        <td
                            colspan="6"
                            class="px-6 py-16 text-center">

                            <div
                                class="text-4xl mb-3 opacity-60"
                                aria-hidden="true">

                                📂

                            </div>

                            <p
                                class="heading-font font-semibold
                                           text-[var(--color-text-primary)]
                                           text-base">

                                No categories yet

                            </p>

                            <p
                                class="text-xs
                                           text-[var(--color-text-muted)]
                                           mt-1">

                                Create your first category to organize your blog posts.

                            </p>

                            <a
                                href="{{ route('admin.categories.create') }}"
                                class="category-primary-btn
                                           inline-block
                                           mt-4
                                           px-6 py-2.5
                                           text-white
                                           rounded-xl
                                           text-xs
                                           heading-font
                                           font-semibold
                                           transition-all duration-300
                                           transform hover:scale-[1.02]">

                                Create Category

                            </a>

                        </td>

                    </tr>

                    @endforelse

                </tbody>

            </table>

        </div>


        {{-- =========================================================
             PAGINATION
        ========================================================== --}}
        @if($categories->hasPages())

        <div class="category-pagination px-6 py-4">

            {{ $categories->links() }}

        </div>

        @endif

    </div>

</div>


{{-- =============================================================
     PAGE STYLES
============================================================= --}}
@push('styles')

<style>
    /* =========================================================
       ANIMATION
    ========================================================= */

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


    /* =========================================================
       HEADING FONT
    ========================================================= */

    .heading-font {
        font-family:
            'Poppins',
            ui-sans-serif,
            system-ui,
            -apple-system,
            BlinkMacSystemFont,
            "Segoe UI",
            sans-serif !important;

        letter-spacing: -0.02em !important;
    }


    /* =========================================================
       MAIN CARD
    ========================================================= */

    .categories-card {

        background: var(--color-bg-card);

        border: 1px solid var(--color-border);

        box-shadow:
            0 4px 12px var(--color-shadow);

        transition:
            border-color 0.3s ease,
            box-shadow 0.3s ease;

    }

    .categories-card:hover {

        border-color:
            color-mix(in srgb,
                var(--color-primary) 30%,
                var(--color-border));

        box-shadow:
            0 10px 30px var(--color-shadow-hover);

    }


    /* =========================================================
       PRIMARY BUTTON
    ========================================================= */

    .category-primary-btn {

        background: var(--color-primary);

        box-shadow:
            0 10px 24px color-mix(in srgb,
                var(--color-primary) 20%,
                transparent);

    }

    .category-primary-btn:hover {

        background: var(--color-primary-hover);

        box-shadow:
            0 12px 30px color-mix(in srgb,
                var(--color-primary) 35%,
                transparent);

    }


    /* =========================================================
       SUCCESS MESSAGE
    ========================================================= */

    .success-message {

        background: rgba(16, 185, 129, 0.06);

        border-color: rgba(16, 185, 129, 0.20);

        color: var(--color-success);

    }


    /* =========================================================
       TABLE
    ========================================================= */

    .admin-table {

        width: 100%;

        font-size: 0.875rem;

        border-collapse: collapse;

    }


    .admin-table thead {

        background: var(--color-bg);

        border-bottom:
            1px solid var(--color-border);

    }


    .admin-table thead th {

        padding: 0.75rem 1.5rem;

        text-align: left;

        font-family: 'Poppins', sans-serif;

        font-size: 0.65rem;

        font-weight: 600;

        text-transform: uppercase;

        letter-spacing: 0.05em;

        color: var(--color-text-muted);

        white-space: nowrap;

    }


    .admin-table tbody tr {

        border-bottom:
            1px solid var(--color-border);

        transition:
            background-color 0.25s ease;

    }


    .admin-table tbody tr:last-child {

        border-bottom: none;

    }


    .admin-table tbody tr:hover {

        background:
            color-mix(in srgb,
                var(--color-primary) 4%,
                transparent);

    }


    .admin-table tbody td {

        padding: 0.75rem 1.5rem;

        color: var(--color-text-secondary);

        vertical-align: middle;

    }


    /* =========================================================
       CATEGORY IMAGE
    ========================================================= */

    .category-image {

        border-color: var(--color-border);

    }


    .category-image-placeholder {

        background: var(--color-bg);

        border-color: var(--color-border);

        color: var(--color-text-muted);

    }


    /* =========================================================
       SLUG
    ========================================================= */

    .category-slug {

        background: var(--color-bg);

        color: var(--color-primary);

        border:
            1px solid var(--color-border);

    }


    /* =========================================================
       POST COUNT
    ========================================================= */

    .category-count {

        background:
            color-mix(in srgb,
                var(--color-primary) 7%,
                var(--color-bg-card));

        border:
            1px solid color-mix(in srgb,
                var(--color-primary) 12%,
                var(--color-border));

        color: var(--color-text-secondary);

    }


    /* =========================================================
       ACTION BUTTONS
    ========================================================= */

    .category-action-btn {

        display: inline-flex;

        align-items: center;

        justify-content: center;

        width: 34px;

        height: 34px;

        border-radius: 10px;

        color: var(--color-text-muted);

        transition:
            color 0.2s ease,
            background-color 0.2s ease,
            transform 0.2s ease;

    }


    .category-action-btn:hover {

        background:
            color-mix(in srgb,
                var(--color-primary) 7%,
                transparent);

        color: var(--color-primary);

        transform: translateY(-1px);

    }


    .category-edit-btn:hover {

        color: var(--color-primary);

    }


    .category-delete-btn:hover {

        color: var(--color-error);

        background:
            rgba(239, 68, 68, 0.08);

    }


    /* =========================================================
       PAGINATION
    ========================================================= */

    .category-pagination {

        border-top:
            1px solid var(--color-border);

        background:
            color-mix(in srgb,
                var(--color-bg) 60%,
                transparent);

    }


    /* =========================================================
       DARK MODE REFINEMENTS
    ========================================================= */

    [data-theme="dark"] .categories-card {

        box-shadow:
            0 10px 30px rgba(0, 0, 0, 0.20);

    }


    [data-theme="dark"] .admin-table tbody tr:hover {

        background:
            rgba(59, 130, 246, 0.035);

    }


    [data-theme="dark"] .category-slug {

        color: var(--color-secondary-hover);

    }


    [data-theme="dark"] .category-primary-btn {

        background: var(--color-secondary);

        box-shadow:
            0 10px 24px rgba(59, 130, 246, 0.18);

    }


    [data-theme="dark"] .category-primary-btn:hover {

        background: #2563EB;

        box-shadow:
            0 12px 30px rgba(59, 130, 246, 0.30);

    }


    /* =========================================================
       SCROLLBAR
    ========================================================= */

    .admin-table-wrapper::-webkit-scrollbar {

        height: 6px;

    }


    ::-webkit-scrollbar {

        width: 6px;
        height: 6px;

    }


    ::-webkit-scrollbar-track {

        background: var(--color-bg);

    }


    ::-webkit-scrollbar-thumb {

        background: var(--color-primary);

        border-radius: 999px;

    }


    ::-webkit-scrollbar-thumb:hover {

        background: var(--color-primary-hover);

    }


    [data-theme="dark"] ::-webkit-scrollbar-thumb {

        background: var(--color-secondary);

    }


    [data-theme="dark"] ::-webkit-scrollbar-thumb:hover {

        background: var(--color-secondary-hover);

    }


    /* =========================================================
       MOBILE
    ========================================================= */

    @media (max-width: 640px) {

        .admin-table thead th,
        .admin-table tbody td {

            padding-left: 1rem;
            padding-right: 1rem;

        }

    }
</style>

@endpush

@endsection