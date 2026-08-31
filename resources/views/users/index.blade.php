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

    /* Selection color */
    ::selection {
        background-color: rgba(196, 90, 46, 0.3) !important;
        color: #ffffff !important;
    }

    /* Table styles */
    .admin-table {
        background-color: #121212 !important;
        border-color: rgba(255, 255, 255, 0.05) !important;
    }

    .admin-table thead {
        background-color: rgba(10, 10, 10, 0.8) !important;
        border-bottom-color: rgba(255, 255, 255, 0.05) !important;
    }

    .admin-table tbody tr {
        border-bottom-color: rgba(255, 255, 255, 0.03) !important;
    }

    .admin-table tbody tr:hover {
        background-color: rgba(196, 90, 46, 0.05) !important;
    }

    /* Role badges */
    .role-badge {
        font-family: 'Poppins', sans-serif !important;
        font-weight: 600 !important;
        letter-spacing: 0.02em !important;
    }

    /* Button styles */
    .btn-primary {
        background-color: #c45a2e !important;
        color: #ffffff !important;
        font-family: 'Poppins', sans-serif !important;
        font-weight: 600 !important;
    }

    .btn-primary:hover {
        background-color: rgba(196, 90, 46, 0.8) !important;
        box-shadow: 0 4px 15px rgba(196, 90, 46, 0.3) !important;
        transform: scale(1.02);
    }
</style>
@endpush

@section('content')
<div class="max-w-7xl mx-auto body-font">
    {{-- Header --}}
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-8">
        <div class="text-center sm:text-left">
            <h1 class="heading-font text-2xl sm:text-3xl font-bold text-white tracking-tight">Manage Users</h1>
            <p class="text-sm text-white/40 mt-1">Manage all registered users and their roles</p>
        </div>
        <div class="flex justify-center sm:justify-end">
            <a href="{{ route('admin.users.create') }}" class="inline-flex items-center gap-2 px-6 py-2.5 bg-rust text-white rounded-full hover:bg-rust/80 transition-all duration-300 text-sm font-semibold shadow-lg shadow-rust/20 hover:shadow-rust/40 transform hover:scale-[1.02] heading-font">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                </svg>
                New User
            </a>
        </div>
    </div>

    {{-- Messages --}}
    @if(session('success'))
        <div class="mb-6 p-4 bg-green-400/5 border border-green-400/20 rounded-xl text-green-400 text-sm text-center">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="mb-6 p-4 bg-red-400/5 border border-red-400/20 rounded-xl text-red-400 text-sm text-center">
            {{ session('error') }}
        </div>
    @endif

    {{-- Users Table --}}
    <div class="bg-[#121212] rounded-2xl shadow-sm border border-white/5 overflow-hidden hover:border-rust/30 transition-all duration-300">
        <div class="overflow-x-auto">
            <table class="admin-table w-full text-sm">
                <thead class="bg-[#0a0a0a]/80 border-b border-white/5">
                    <tr>
                        <th class="px-6 py-4 text-left font-semibold text-white/50 heading-font text-xs uppercase tracking-wider">#</th>
                        <th class="px-6 py-4 text-left font-semibold text-white/50 heading-font text-xs uppercase tracking-wider">Name</th>
                        <th class="px-6 py-4 text-left font-semibold text-white/50 heading-font text-xs uppercase tracking-wider">Email</th>
                        <th class="px-6 py-4 text-left font-semibold text-white/50 heading-font text-xs uppercase tracking-wider">Role</th>
                        <th class="px-6 py-4 text-left font-semibold text-white/50 heading-font text-xs uppercase tracking-wider">Joined</th>
                        <th class="px-6 py-4 text-right font-semibold text-white/50 heading-font text-xs uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-white/5">
                    @forelse ($users as $user)
                        <tr class="hover:bg-rust/5 transition-colors duration-300">
                            <td class="px-6 py-4 text-white/40">
                                {{ $loop->iteration }}
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    <div class="w-8 h-8 rounded-full bg-rust/10 flex items-center justify-center text-rust font-bold text-sm heading-font">
                                        {{ strtoupper(substr($user->name, 0, 2)) }}
                                    </div>
                                    <span class="font-medium text-white/75">{{ $user->name }}</span>
                                    @if($user->id === auth()->id())
                                        <span class="text-xs bg-rust/10 text-rust px-2 py-0.5 rounded-full heading-font font-semibold">You</span>
                                    @endif
                                </div>
                            </td>
                            <td class="px-6 py-4 text-white/50">
                                {{ $user->email }}
                            </td>
                            <td class="px-6 py-4">
                                <span class="role-badge inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-medium
                                    @if($user->role && $user->role->slug === 'admin') bg-red-500/10 text-red-400 border border-red-500/20
                                    @elseif($user->role && $user->role->slug === 'editor') bg-blue-500/10 text-blue-400 border border-blue-500/20
                                    @elseif($user->role && $user->role->slug === 'author') bg-green-500/10 text-green-400 border border-green-500/20
                                    @else bg-white/5 text-white/40 border border-white/5 @endif">
                                    <span class="w-1.5 h-1.5 rounded-full
                                        @if($user->role && $user->role->slug === 'admin') bg-red-400
                                        @elseif($user->role && $user->role->slug === 'editor') bg-blue-400
                                        @elseif($user->role && $user->role->slug === 'author') bg-green-400
                                        @else bg-white/30 @endif">
                                    </span>
                                    {{ $user->role->name ?? 'No Role' }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-white/40">
                                {{ $user->created_at->format('M j, Y') }}
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center justify-end gap-2">
                                    {{-- Edit --}}
                                    <a href="{{ route('admin.users.edit', $user) }}" class="p-2 text-white/30 hover:text-rust transition-colors duration-300" title="Edit">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                        </svg>
                                    </a>

                                    {{-- Delete --}}
                                    @if($user->id !== auth()->id())
                                        <form action="{{ route('admin.users.destroy', $user) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this user?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="p-2 text-white/30 hover:text-red-400 transition-colors duration-300" title="Delete">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                                </svg>
                                            </button>
                                        </form>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-6 py-12 text-center text-white/40">
                                <div class="text-4xl mb-3">👤</div>
                                <p class="font-medium text-white/60 heading-font">No users found</p>
                                <p class="text-sm text-white/30">Create your first user to get started.</p>
                                <a href="{{ route('admin.users.create') }}" class="inline-block mt-3 px-4 py-2 bg-rust text-white rounded-full hover:bg-rust/80 transition-all duration-300 text-sm font-semibold shadow-lg shadow-rust/20 hover:shadow-rust/40 transform hover:scale-[1.02] heading-font">
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
            <div class="px-6 py-4 border-t border-white/5">
                {{ $users->links() }}
            </div>
        @endif
    </div>
</div>
@endsection