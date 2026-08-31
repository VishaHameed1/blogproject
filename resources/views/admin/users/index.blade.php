@extends('layouts.admin')

@section('title', 'Manage Users · Admin')

@section('content')
<div class="max-w-7xl mx-auto space-y-6 animate-fade-in">
    {{-- Header --}}
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div class="text-center sm:text-left">
            <h1 class="heading-font text-3xl font-bold text-white tracking-tight">Manage Users</h1>
            <p class="text-sm text-white/50 mt-1">Manage all registered users and their roles</p>
        </div>
        <div class="flex justify-center sm:justify-end">
            <a href="{{ route('admin.users.create') }}" class="inline-flex items-center gap-2 px-4 py-2.5 bg-rust hover:bg-rust/80 text-white text-sm heading-font font-semibold rounded-xl transition-all duration-300 shadow-lg shadow-rust/20 hover:shadow-rust/40 transform hover:scale-[1.02]">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                </svg>
                New User
            </a>
        </div>
    </div>

    {{-- Messages --}}
    @if(session('success'))
        <div class="p-4 bg-green-400/5 border border-green-400/20 rounded-xl text-green-400 text-sm text-center">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="p-4 bg-red-400/5 border border-red-400/20 rounded-xl text-red-400 text-sm text-center">
            {{ session('error') }}
        </div>
    @endif

    {{-- Users Table Card Wrapper --}}
    <div class="bg-[#121212] border border-white/5 rounded-2xl overflow-hidden shadow-xl transition-all duration-300 hover:border-rust/30">
        <div class="overflow-x-auto">
            <table class="admin-table w-full text-sm">
                <thead class="bg-[#0a0a0a]/80 border-b border-white/5">
                    <tr>
                        <th class="px-6 py-4 text-left text-xs heading-font font-semibold text-white/40 uppercase tracking-wider">#</th>
                        <th class="px-6 py-4 text-left text-xs heading-font font-semibold text-white/40 uppercase tracking-wider">Name</th>
                        <th class="px-6 py-4 text-left text-xs heading-font font-semibold text-white/40 uppercase tracking-wider">Email</th>
                        <th class="px-6 py-4 text-left text-xs heading-font font-semibold text-white/40 uppercase tracking-wider">Role</th>
                        <th class="px-6 py-4 text-left text-xs heading-font font-semibold text-white/40 uppercase tracking-wider">Joined</th>
                        <th class="px-6 py-4 text-right text-xs heading-font font-semibold text-white/40 uppercase tracking-wider">Actions</th>
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
                                    <div class="w-8 h-8 rounded-full bg-rust/20 flex items-center justify-center text-rust heading-font font-bold text-sm">
                                        {{ $user->initials }}
                                    </div>
                                    <span class="font-medium text-white/75">{{ $user->name }}</span>
                                    @if($user->id === auth()->id())
                                        <span class="text-xs heading-font bg-rust/10 text-rust px-2 py-0.5 rounded-full border border-rust/20">You</span>
                                    @endif
                                </div>
                            </td>
                            <td class="px-6 py-4 text-white/50">
                                {{ $user->email }}
                            </td>
                            <td class="px-6 py-4">
                                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs heading-font font-medium capitalize border
                                    @if($user->role_slug === 'admin') bg-red-500/10 text-red-400 border-red-500/20
                                    @elseif($user->role_slug === 'editor') bg-blue-500/10 text-blue-400 border-blue-500/20
                                    @elseif($user->role_slug === 'author') bg-green-500/10 text-green-400 border-green-500/20
                                    @else bg-white/5 text-white/30 border-white/5 @endif">
                                    <span class="w-1.5 h-1.5 rounded-full
                                        @if($user->role_slug === 'admin') bg-red-400
                                        @elseif($user->role_slug === 'editor') bg-blue-400
                                        @elseif($user->role_slug === 'author') bg-green-400
                                        @else bg-white/30 @endif">
                                    </span>
                                    {{ $user->role_name }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-white/30">
                                {{ $user->created_at?->format('M j, Y') }}
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center justify-end gap-2">
                                    <a href="{{ route('admin.users.edit', $user) }}" class="p-2 text-white/30 hover:text-rust transition-colors duration-300" title="Edit">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                        </svg>
                                    </a>
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
                            <td colspan="6" class="px-6 py-12 text-center">
                                <div class="text-4xl mb-3 text-white/10">👤</div>
                                <p class="heading-font font-medium text-white/40">No users found</p>
                                <p class="text-sm text-white/20 mt-1">Create your first user to get started.</p>
                                <a href="{{ route('admin.users.create') }}" class="inline-block mt-3 px-4 py-2 bg-rust text-white rounded-xl hover:bg-rust/80 transition-all duration-300 text-sm heading-font font-semibold shadow-lg shadow-rust/20 hover:shadow-rust/40 transform hover:scale-[1.02]">
                                    Create User
                                </a>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if(method_exists($users, 'hasPages') && $users->hasPages())
            <div class="px-6 py-4 border-t border-white/5">
                {{ $users->links() }}
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