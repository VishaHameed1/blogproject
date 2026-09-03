@extends('layouts.admin')

@section('title', 'Manage Users · Admin')

@section('content')

<div class="max-w-7xl mx-auto space-y-6 animate-fade-in">

    {{-- Header --}}
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div class="text-center sm:text-left">
            <h1 class="heading-font text-3xl font-bold text-[var(--color-text-primary)] tracking-tight">
                Manage Users
            </h1>

            <p class="text-sm text-[var(--color-text-secondary)] mt-1">
                Manage all registered users and their roles
            </p>
        </div>

        <div class="flex justify-center sm:justify-end">
            <a
                href="{{ route('admin.users.create') }}"
                class="inline-flex items-center gap-2 px-5 py-2.5
                       bg-[var(--color-primary)]
                       hover:bg-[var(--color-primary-hover)]
                       text-white text-sm heading-font font-semibold
                       rounded-xl
                       shadow-lg shadow-[var(--color-primary)]/20
                       hover:shadow-[var(--color-primary)]/40
                       transition-all duration-300
                       transform hover:scale-[1.02]">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M12 4v16m8-8H4" />
                </svg>

                New User
            </a>
        </div>
    </div>


    {{-- Success Message --}}
    @if(session('success'))
    <div
        class="p-4
                   bg-green-500/10
                   border border-green-500/20
                   rounded-xl
                   text-green-600 dark:text-green-400
                   text-sm">
        {{ session('success') }}
    </div>
    @endif


    {{-- Error Message --}}
    @if(session('error'))
    <div
        class="p-4
                   bg-red-500/10
                   border border-red-500/20
                   rounded-xl
                   text-red-600 dark:text-red-400
                   text-sm">
        {{ session('error') }}
    </div>
    @endif


    {{-- Users Table --}}
    <div
        class="bg-[var(--color-bg-card)]
               border border-[var(--color-border)]
               rounded-2xl
               overflow-hidden
               shadow-sm
               dark:shadow-none
               transition-all duration-300
               hover:border-[var(--color-primary)]/30">

        <div class="overflow-x-auto">

            <table class="admin-table w-full text-sm">

                {{-- Table Header --}}
                <thead
                    class="bg-[var(--color-bg)]
                           border-b border-[var(--color-border)]">
                    <tr>

                        <th class="px-6 py-4 text-left text-[var(--color-text-muted)] heading-font text-xs uppercase tracking-wider font-semibold">
                            #
                        </th>

                        <th class="px-6 py-4 text-left text-[var(--color-text-muted)] heading-font text-xs uppercase tracking-wider font-semibold">
                            Name
                        </th>

                        <th class="px-6 py-4 text-left text-[var(--color-text-muted)] heading-font text-xs uppercase tracking-wider font-semibold">
                            Email
                        </th>

                        <th class="px-6 py-4 text-left text-[var(--color-text-muted)] heading-font text-xs uppercase tracking-wider font-semibold">
                            Role
                        </th>

                        <th class="px-6 py-4 text-left text-[var(--color-text-muted)] heading-font text-xs uppercase tracking-wider font-semibold">
                            Joined
                        </th>

                        <th class="px-6 py-4 text-right text-[var(--color-text-muted)] heading-font text-xs uppercase tracking-wider font-semibold">
                            Actions
                        </th>

                    </tr>
                </thead>


                {{-- Table Body --}}
                <tbody
                    class="divide-y divide-[var(--color-border)]">

                    @forelse ($users as $user)

                    <tr
                        class="hover:bg-[var(--color-primary-soft)]
                                   transition-colors duration-300">

                        {{-- Number --}}
                        <td
                            class="px-6 py-4
                                       text-[var(--color-text-muted)]">
                            {{ $loop->iteration }}
                        </td>


                        {{-- Name --}}
                        <td class="px-6 py-4">

                            <div class="flex items-center gap-3">

                                {{-- Avatar --}}
                                <div
                                    class="w-9 h-9
                                               rounded-full
                                               bg-[var(--color-primary-soft)]
                                               border border-[var(--color-primary-soft)]
                                               flex items-center justify-center
                                               text-[var(--color-primary)]
                                               heading-font
                                               font-bold
                                               text-sm
                                               shrink-0">
                                    {{ $user->initials }}
                                </div>


                                {{-- Name --}}
                                <div class="min-w-0">

                                    <div class="flex items-center gap-2">

                                        <span
                                            class="font-medium
                                                       text-[var(--color-text-primary)]
                                                       truncate">
                                            {{ $user->name }}
                                        </span>

                                        @if($user->id === auth()->id())

                                        <span
                                            class="text-[10px]
                                                           heading-font
                                                           font-semibold
                                                           uppercase
                                                           tracking-wider
                                                           bg-[var(--color-primary-soft)]
                                                           text-[var(--color-primary)]
                                                           px-2 py-0.5
                                                           rounded-full
                                                           border border-[var(--color-primary-soft)]">
                                            You
                                        </span>

                                        @endif

                                    </div>

                                </div>

                            </div>

                        </td>


                        {{-- Email --}}
                        <td
                            class="px-6 py-4
                                       text-[var(--color-text-secondary)] body-font">
                            {{ $user->email }}
                        </td>


                        {{-- Role --}}
                        <td class="px-6 py-4">

                            <span
                                class="inline-flex items-center gap-1.5
                                           px-3 py-1
                                           rounded-full
                                           text-xs
                                           heading-font
                                           font-medium
                                           capitalize
                                           border

                                           @if($user->role_slug === 'admin')
                                               bg-red-500/10
                                               text-red-600 dark:text-red-400
                                               border-red-500/20

                                           @elseif($user->role_slug === 'editor')
                                               bg-blue-500/10
                                               text-blue-600 dark:text-blue-400
                                               border-blue-500/20

                                           @elseif($user->role_slug === 'author')
                                               bg-green-500/10
                                               text-green-600 dark:text-green-400
                                               border-green-500/20

                                           @else
                                               bg-[var(--color-bg)]
                                               text-[var(--color-text-muted)]
                                               border-[var(--color-border)]
                                           @endif">

                                <span
                                    class="w-1.5 h-1.5 rounded-full

                                        @if($user->role_slug === 'admin')
                                            bg-red-500

                                        @elseif($user->role_slug === 'editor')
                                            bg-blue-500

                                        @elseif($user->role_slug === 'author')
                                            bg-green-500

                                        @else
                                            bg-gray-400
                                        @endif"></span>

                                {{ $user->role_name }}

                            </span>

                        </td>


                        {{-- Joined --}}
                        <td
                            class="px-6 py-4
                                       text-[var(--color-text-muted)]">
                            {{ $user->created_at?->format('M j, Y') }}
                        </td>


                        {{-- Actions --}}
                        <td class="px-6 py-4">

                            <div class="flex items-center justify-end gap-1">

                                {{-- Edit --}}
                                <a
                                    href="{{ route('admin.users.edit', $user) }}"
                                    class="p-2
                                               text-[var(--color-text-muted)]
                                               hover:text-[var(--color-primary)]
                                               hover:bg-[var(--color-primary-soft)]
                                               rounded-xl
                                               transition-all duration-300"
                                    title="Edit">

                                    <svg
                                        class="w-4 h-4"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                    </svg>

                                </a>


                                {{-- Delete --}}
                                @if($user->id !== auth()->id())

                                <form
                                    action="{{ route('admin.users.destroy', $user) }}"
                                    method="POST"
                                    class="inline"
                                    onsubmit="return confirm('Are you sure you want to delete this user?');">

                                    @csrf
                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="p-2
                                                       text-[var(--color-text-muted)]
                                                       hover:text-red-500
                                                       hover:bg-red-500/10
                                                       rounded-xl
                                                       transition-all duration-300"
                                        title="Delete">

                                        <svg
                                            class="w-4 h-4"
                                            fill="none"
                                            stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>

                                    </button>

                                </form>

                                @endif

                            </div>

                        </td>

                    </tr>

                    @empty

                    {{-- Empty State --}}
                    <tr>

                        <td
                            colspan="6"
                            class="px-6 py-16 text-center">

                            <div
                                class="w-14 h-14 mx-auto mb-4
                                           rounded-2xl
                                           bg-[var(--color-bg)]
                                           border border-[var(--color-border)]
                                           flex items-center justify-center">
                                <svg
                                    class="w-7 h-7 text-[var(--color-text-muted)]"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="1.5"
                                        d="M16 21v-2a4 4 0 00-4-4H6a4 4 0 00-4 4v2m8-8a4 4 0 100-8 4 4 0 000 8zm8-4v6m3-3h-6" />
                                </svg>
                            </div>

                            <p
                                class="heading-font
                                           font-semibold
                                           text-[var(--color-text-primary)]">
                                No users found
                            </p>

                            <p
                                class="text-sm body-font
                                           text-[var(--color-text-muted)]
                                           mt-1">
                                Create your first user to get started.
                            </p>

                            <a
                                href="{{ route('admin.users.create') }}"
                                class="inline-flex
                                           items-center gap-2
                                           mt-4
                                           px-5 py-2.5
                                           bg-[var(--color-primary)]
                                           hover:bg-[var(--color-primary-hover)]
                                           text-white
                                           rounded-xl
                                           text-sm
                                           heading-font
                                           font-semibold
                                           shadow-lg
                                           shadow-[var(--color-primary)]/20
                                           hover:shadow-[var(--color-primary)]/40
                                           transition-all duration-300
                                           transform hover:scale-[1.02]">
                                <svg
                                    class="w-4 h-4"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M12 4v16m8-8H4" />
                                </svg>

                                Create User
                            </a>

                        </td>

                    </tr>

                    @endforelse

                </tbody>

            </table>

        </div>


        {{-- Pagination --}}
        @if(method_exists($users, 'hasPages') && $users->hasPages())

        <div
            class="px-6 py-4
                       border-t border-[var(--color-border])
                       bg-[var(--color-bg)]/50">
            {{ $users->links() }}
        </div>

        @endif

    </div>

</div>


@push('styles')

<style>
    /* =========================================
       Chronicle Admin Theme
       Light: Purple (#7C3AED) | Dark: Blue (#3B82F6)
       ========================================= */

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


    /* Heading Typography - Poppins */

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


    /* Body Typography - Work Sans */

    .body-font {
        font-family:
            'Work Sans',
            ui-sans-serif,
            system-ui,
            -apple-system,
            BlinkMacSystemFont,
            "Segoe UI",
            sans-serif !important;
    }


    /* Table */

    .admin-table {
        width: 100%;
        font-size: 0.875rem;
    }


    .admin-table thead th {
        padding: 0.75rem 1.5rem;

        text-align: left;

        font-weight: 600;

        color: var(--color-text-muted);

        font-family: 'Poppins', sans-serif;

        font-size: 0.65rem;

        text-transform: uppercase;

        letter-spacing: 0.05em;

        white-space: nowrap;
    }


    .admin-table tbody td {
        padding: 0.75rem 1.5rem;

        color: var(--color-text-secondary);
    }


    /* Selection - Theme Aware */

    ::selection {
        background: var(--color-primary-soft);
        color: #ffffff;
    }


    /* Scrollbar - Theme Aware */

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


    /* Dark mode scrollbar override */

    [data-theme="dark"] ::-webkit-scrollbar-track {
        background: var(--color-bg);
    }

    [data-theme="dark"] ::-webkit-scrollbar-thumb {
        background: var(--color-primary);
    }

    [data-theme="dark"] ::-webkit-scrollbar-thumb:hover {
        background: var(--color-primary-hover);
    }


    /* Reduced motion */

    @media (prefers-reduced-motion: reduce) {

        .animate-fade-in {
            animation: none;
        }

        * {
            scroll-behavior: auto !important;
            transition-duration: 0.01ms !important;
        }

    }
</style>

@endpush

@endsection