@extends('layouts.admin')

@section('title', 'Manage Users · Admin')

@push('styles')
<style>
    /* Heading font - Poppins */
    .heading-font {
        font-family: 'Poppins', ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif !important;
        letter-spacing: -0.02em !important;
    }

    /* Body font - Work Sans */
    .body-font {
        font-family: 'Work Sans', ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif !important;
    }

    /* Selection color - Theme aware */
    ::selection {
        background-color: var(--color-primary-soft) !important;
        color: #ffffff !important;
    }

    /* Table styles - Theme aware */
    .admin-table {
        background-color: var(--color-bg-card) !important;
        border-color: var(--color-border) !important;
    }

    .admin-table thead {
        background-color: var(--color-bg) !important;
        border-bottom-color: var(--color-border) !important;
    }

    .admin-table tbody tr {
        border-bottom-color: var(--color-border) !important;
    }

    .admin-table tbody tr:hover {
        background-color: var(--color-primary-soft) !important;
    }

    /* Role badges - Updated with theme aware colors */
    .role-badge {
        font-family: 'Poppins', sans-serif !important;
        font-weight: 600 !important;
        letter-spacing: 0.02em !important;
    }

    /* Smooth theme transitions */
    * {
        transition-property: background-color, border-color, color, fill, stroke;
        transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
        transition-duration: 300ms;
    }

    /* Scrollbar styling - Theme aware */
    ::-webkit-scrollbar {
        width: 6px;
    }

    ::-webkit-scrollbar-track {
        background: var(--color-bg);
    }

    ::-webkit-scrollbar-thumb {
        background: var(--color-primary);
        border-radius: 3px;
    }

    ::-webkit-scrollbar-thumb:hover {
        background: var(--color-primary-hover);
    }
</style>
@endpush

@section('content')
<div class="max-w-7xl mx-auto body-font">
    {{-- Header --}}
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-8">
        <div class="text-center sm:text-left">
            <h1 class="heading-font text-2xl sm:text-3xl font-bold text-[var(--color-text-primary)] tracking-tight">Manage Users</h1>
            <p class="text-sm text-[var(--color-text-secondary)] mt-1">Manage all registered users and their roles</p>
        </div>
        <div class="flex justify-center sm:justify-end">
            <a href="{{ route('admin.users.create') }}" class="inline-flex items-center gap-2 px-6 py-2.5 bg-[var(--color-primary)] text-white rounded-full hover:bg-[var(--color-primary-hover)] transition-all duration-300 text-sm font-semibold shadow-lg shadow-[var(--color-primary)]/20 hover:shadow-[var(--color-primary)]/40 transform hover:scale-[1.02] heading-font">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                New User
            </a>
        </div>
    </div>

    {{-- Messages --}}
    @if(session('success'))
    <div class="mb-6 p-4 bg-green-400/5 border border-green-400/20 rounded-xl text-green-600 dark:text-green-400 text-sm text-center">
        {{ session('success') }}
    </div>
    @endif

    @if(session('error'))
    <div class="mb-6 p-4 bg-red-400/5 border border-red-400/20 rounded-xl text-red-600 dark:text-red-400 text-sm text-center">
        {{ session('error') }}
    </div>
    @endif

    {{-- Users Table --}}
    <div class="bg-[var(--color-bg-card)] rounded-2xl shadow-sm border border-[var(--color-border)] overflow-hidden hover:border-[var(--color-primary)]/30 transition-all duration-300">
        <div class="overflow-x-auto">
            <table class="admin-table w-full text-sm">
                <thead>
                    <tr>
                        <th class="px-6 py-4 text-left font-semibold text-[var(--color-text-muted)] heading-font text-xs uppercase tracking-wider">#</th>
                        <th class="px-6 py-4 text-left font-semibold text-[var(--color-text-muted)] heading-font text-xs uppercase tracking-wider">Name</th>
                        <th class="px-6 py-4 text-left font-semibold text-[var(--color-text-muted)] heading-font text-xs uppercase tracking-wider">Email</th>
                        <th class="px-6 py-4 text-left font-semibold text-[var(--color-text-muted)] heading-font text-xs uppercase tracking-wider">Role</th>
                        <th class="px-6 py-4 text-left font-semibold text-[var(--color-text-muted)] heading-font text-xs uppercase tracking-wider">Joined</th>
                        <th class="px-6 py-4 text-right font-semibold text-[var(--color-text-muted)] heading-font text-xs uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-[var(--color-border)]">
                    @forelse ($users as $user)
                    <tr class="hover:bg-[var(--color-primary-soft)] transition-colors duration-300">
                        <td class="px-6 py-4 text-[var(--color-text-muted)]">
                            {{ $loop->iteration }}
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                <div class="w-8 h-8 rounded-full bg-[var(--color-primary-soft)] flex items-center justify-center text-[var(--color-primary)] font-bold text-sm heading-font">
                                    {{ strtoupper(substr($user->name, 0, 2)) }}
                                </div>
                                <span class="font-medium text-[var(--color-text-primary)]">{{ $user->name }}</span>
                                @if($user->id === auth()->id())
                                <span class="text-xs bg-[var(--color-primary-soft)] text-[var(--color-primary)] px-2 py-0.5 rounded-full heading-font font-semibold">You</span>
                                @endif
                            </div>
                        </td>
                        <td class="px-6 py-4 text-[var(--color-text-secondary)]">
                            {{ $user->email }}
                        </td>
                        <td class="px-6 py-4">
                            <span class="role-badge inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-medium
                                    @if($user->role && $user->role->slug === 'admin') bg-purple-500/10 text-purple-600 dark:text-purple-400 border border-purple-500/20
                                    @elseif($user->role && $user->role->slug === 'editor') bg-blue-500/10 text-blue-600 dark:text-blue-400 border border-blue-500/20
                                    @elseif($user->role && $user->role->slug === 'author') bg-green-500/10 text-green-600 dark:text-green-400 border border-green-500/20
                                    @else bg-[var(--color-bg)] text-[var(--color-text-muted)] border border-[var(--color-border)] @endif">
                                <span class="w-1.5 h-1.5 rounded-full
                                        @if($user->role && $user->role->slug === 'admin') bg-purple-500
                                        @elseif($user->role && $user->role->slug === 'editor') bg-blue-500
                                        @elseif($user->role && $user->role->slug === 'author') bg-green-500
                                        @else bg-[var(--color-text-muted)] @endif">
                                </span>
                                {{ $user->role->name ?? 'No Role' }}
                            </span>
                        </td>
                        <td class="px-6 py-4 text-[var(--color-text-muted)]">
                            {{ $user->created_at->format('M j, Y') }}
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center justify-end gap-2">
                                {{-- Edit --}}
                                <a href="{{ route('admin.users.edit', $user) }}" class="p-2 text-[var(--color-text-muted)] hover:text-[var(--color-primary)] transition-colors duration-300" title="Edit">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                    </svg>
                                </a>

                                {{-- Delete --}}
                                @if($user->id !== auth()->id())
                                <form action="{{ route('admin.users.destroy', $user) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this user?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="p-2 text-[var(--color-text-muted)] hover:text-red-600 dark:hover:text-red-400 transition-colors duration-300" title="Delete">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </button>
                                </form>
                                @endif
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="px-6 py-12 text-center text-[var(--color-text-secondary)]">
                            <div class="text-4xl mb-3">👤</div>
                            <p class="font-medium text-[var(--color-text-primary)] heading-font">No users found</p>
                            <p class="text-sm text-[var(--color-text-muted)]">Create your first user to get started.</p>
                            <a href="{{ route('admin.users.create') }}" class="inline-block mt-3 px-4 py-2 bg-[var(--color-primary)] text-white rounded-full hover:bg-[var(--color-primary-hover)] transition-all duration-300 text-sm font-semibold shadow-lg shadow-[var(--color-primary)]/20 hover:shadow-[var(--color-primary)]/40 transform hover:scale-[1.02] heading-font">
                                Create User
                            </a>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- Pagination --}}
        @if($users->hasPages())
        <div class="px-6 py-4 border-t border-[var(--color-border)]">
            {{ $users->links() }}
        </div>
        @endif
    </div>
</div>
@endsection