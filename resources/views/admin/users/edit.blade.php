@extends('layouts.admin')

@section('title', 'Edit User · Admin')

@section('content')
<div class="max-w-3xl mx-auto space-y-6 animate-fade-in">
    {{-- Header --}}
    <div class="text-center sm:text-left">
        <h1 class="heading-font text-3xl font-bold text-white tracking-tight">Edit User</h1>
        <p class="text-sm text-white/50 mt-1">Update user details and role</p>
    </div>

    {{-- Form --}}
    <form method="POST" action="{{ route('admin.users.update', $user) }}" class="bg-[#121212] border border-white/5 rounded-2xl shadow-xl p-6 md:p-8 space-y-6 transition-all duration-300 hover:border-rust/30">
        @csrf
        @method('PUT')

        {{-- Name --}}
        <div class="group">
            <label for="name" class="block text-sm heading-font font-semibold text-white/60 mb-2 transition-colors group-focus-within:text-rust">Full Name <span class="text-rust">*</span></label>
            <input type="text" 
                   name="name" 
                   id="name" 
                   value="{{ old('name', $user->name) }}"
                   required
                   class="w-full px-4 py-3 rounded-xl bg-[#0a0a0a]/80 border border-white/5 text-sm text-white placeholder:text-white/20 focus:outline-none focus:border-rust focus:ring-1 focus:ring-rust/30 transition-all"
                   placeholder="John Doe">
            @error('name')
                <p class="text-red-400 text-xs mt-1.5">{{ $message }}</p>
            @enderror
        </div>

        {{-- Email --}}
        <div class="group">
            <label for="email" class="block text-sm heading-font font-semibold text-white/60 mb-2 transition-colors group-focus-within:text-rust">Email <span class="text-rust">*</span></label>
            <input type="email" 
                   name="email" 
                   id="email" 
                   value="{{ old('email', $user->email) }}"
                   required
                   class="w-full px-4 py-3 rounded-xl bg-[#0a0a0a]/80 border border-white/5 text-sm text-white placeholder:text-white/20 focus:outline-none focus:border-rust focus:ring-1 focus:ring-rust/30 transition-all"
                   placeholder="john@example.com">
            @error('email')
                <p class="text-red-400 text-xs mt-1.5">{{ $message }}</p>
            @enderror
        </div>

        {{-- Password --}}
        <div class="group">
            <label for="password" class="block text-sm heading-font font-semibold text-white/60 mb-2 transition-colors group-focus-within:text-rust">Password</label>
            <input type="password" 
                   name="password" 
                   id="password" 
                   class="w-full px-4 py-3 rounded-xl bg-[#0a0a0a]/80 border border-white/5 text-sm text-white placeholder:text-white/20 focus:outline-none focus:border-rust focus:ring-1 focus:ring-rust/30 transition-all"
                   placeholder="Leave blank to keep current password">
            <p class="text-xs text-white/20 mt-1">Minimum 8 characters. Leave blank to keep current password.</p>
            @error('password')
                <p class="text-red-400 text-xs mt-1.5">{{ $message }}</p>
            @enderror
        </div>

        {{-- Confirm Password --}}
        <div class="group">
            <label for="password_confirmation" class="block text-sm heading-font font-semibold text-white/60 mb-2 transition-colors group-focus-within:text-rust">Confirm Password</label>
            <input type="password" 
                   name="password_confirmation" 
                   id="password_confirmation" 
                   class="w-full px-4 py-3 rounded-xl bg-[#0a0a0a]/80 border border-white/5 text-sm text-white placeholder:text-white/20 focus:outline-none focus:border-rust focus:ring-1 focus:ring-rust/30 transition-all"
                   placeholder="Confirm new password">
        </div>

        {{-- Role --}}
        <div class="group">
            <label for="role_id" class="block text-sm heading-font font-semibold text-white/60 mb-2 transition-colors group-focus-within:text-rust">Role <span class="text-rust">*</span></label>
            <select name="role_id" 
                    id="role_id" 
                    required
                    class="w-full px-4 py-3 rounded-xl bg-[#0a0a0a]/80 border border-white/5 text-sm text-white focus:outline-none focus:border-rust focus:ring-1 focus:ring-rust/30 transition-all appearance-none">
                <option value="" class="bg-[#121212] text-white/40">Select a role</option>
                @foreach($roles as $role)
                    <option value="{{ $role->id }}" {{ old('role_id', $user->role_id) == $role->id ? 'selected' : '' }} class="bg-[#121212] text-white">
                        {{ $role->name }} ({{ $role->slug }})
                    </option>
                @endforeach
            </select>
            @error('role_id')
                <p class="text-red-400 text-xs mt-1.5">{{ $message }}</p>
            @enderror
        </div>

        {{-- Actions --}}
        <div class="flex flex-col sm:flex-row items-center gap-4 pt-6 border-t border-white/5">
            <a href="{{ route('admin.users.index') }}" class="w-full sm:w-auto px-6 py-2.5 bg-white/5 hover:bg-white/10 border border-white/5 text-white/40 hover:text-white heading-font font-medium text-sm rounded-xl transition-all duration-300 text-center">
                Cancel
            </a>
            <button type="submit" class="w-full sm:w-auto px-6 py-2.5 bg-rust hover:bg-rust/80 text-white heading-font font-semibold text-sm rounded-xl shadow-lg shadow-rust/20 hover:shadow-rust/40 transition-all duration-300 transform hover:scale-[1.02]">
                Update User
            </button>
        </div>
    </form>
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

    /* Select dropdown arrow */
    select {
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke='rgba(255,255,255,0.3)'%3E%3Cpath stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M19 9l-7 7-7-7'%3E%3C/path%3E%3C/svg%3E");
        background-repeat: no-repeat;
        background-position: right 1rem center;
        background-size: 1rem;
        padding-right: 2.5rem;
    }
</style>
@endpush
@endsection