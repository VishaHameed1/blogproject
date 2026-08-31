@extends('layouts.admin')

@section('title', 'New User · Admin')

@section('content')
<div class="max-w-2xl mx-auto">
    {{-- Header --}}
    <div class="text-center mb-8">
        <h1 class="heading-font text-2xl sm:text-3xl font-bold text-white tracking-tight">New User</h1>
        <p class="text-sm text-white/40 mt-1">Create a new user account</p>
    </div>

    {{-- Form --}}
    <form method="POST" action="{{ route('admin.users.store') }}" class="bg-[#121212] border border-white/5 rounded-2xl shadow-xl p-6 md:p-8 hover:border-rust/30 transition-all duration-300">
        @csrf

        {{-- Name --}}
        <div class="mb-6">
            <label for="name" class="block text-sm font-medium text-white/60 mb-1.5 heading-font">Full Name <span class="text-red-400">*</span></label>
            <input type="text" 
                   name="name" 
                   id="name" 
                   value="{{ old('name') }}"
                   required
                   class="w-full px-4 py-2.5 rounded-xl bg-[#0a0a0a]/80 border border-white/5 text-white placeholder:text-white/20 focus:outline-none focus:border-rust focus:ring-1 focus:ring-rust/30 transition-all text-sm"
                   placeholder="John Doe">
            @error('name')
                <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Email --}}
        <div class="mb-6">
            <label for="email" class="block text-sm font-medium text-white/60 mb-1.5 heading-font">Email <span class="text-red-400">*</span></label>
            <input type="email" 
                   name="email" 
                   id="email" 
                   value="{{ old('email') }}"
                   required
                   class="w-full px-4 py-2.5 rounded-xl bg-[#0a0a0a]/80 border border-white/5 text-white placeholder:text-white/20 focus:outline-none focus:border-rust focus:ring-1 focus:ring-rust/30 transition-all text-sm"
                   placeholder="john@example.com">
            @error('email')
                <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Password --}}
        <div class="mb-6">
            <label for="password" class="block text-sm font-medium text-white/60 mb-1.5 heading-font">Password <span class="text-red-400">*</span></label>
            <input type="password" 
                   name="password" 
                   id="password" 
                   required
                   class="w-full px-4 py-2.5 rounded-xl bg-[#0a0a0a]/80 border border-white/5 text-white placeholder:text-white/20 focus:outline-none focus:border-rust focus:ring-1 focus:ring-rust/30 transition-all text-sm"
                   placeholder="Minimum 8 characters">
            @error('password')
                <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Confirm Password --}}
        <div class="mb-6">
            <label for="password_confirmation" class="block text-sm font-medium text-white/60 mb-1.5 heading-font">Confirm Password <span class="text-red-400">*</span></label>
            <input type="password" 
                   name="password_confirmation" 
                   id="password_confirmation" 
                   required
                   class="w-full px-4 py-2.5 rounded-xl bg-[#0a0a0a]/80 border border-white/5 text-white placeholder:text-white/20 focus:outline-none focus:border-rust focus:ring-1 focus:ring-rust/30 transition-all text-sm"
                   placeholder="Confirm password">
        </div>

        {{-- Role --}}
        <div class="mb-6">
            <label for="role_id" class="block text-sm font-medium text-white/60 mb-1.5 heading-font">Role <span class="text-red-400">*</span></label>
            <select name="role_id" 
                    id="role_id" 
                    required
                    class="w-full px-4 py-2.5 rounded-xl bg-[#0a0a0a]/80 border border-white/5 text-white focus:outline-none focus:border-rust focus:ring-1 focus:ring-rust/30 transition-all text-sm appearance-none">
                <option value="" class="bg-[#121212] text-white/50">Select a role</option>
                @foreach($roles as $role)
                    <option value="{{ $role->id }}" {{ old('role_id') == $role->id ? 'selected' : '' }} class="bg-[#121212] text-white">
                        {{ $role->name }} ({{ $role->slug }})
                    </option>
                @endforeach
            </select>
            @error('role_id')
                <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Actions --}}
        <div class="flex flex-col sm:flex-row items-center justify-center gap-3 pt-4 border-t border-white/5">
            <button type="submit" class="w-full sm:w-auto px-6 py-2.5 bg-rust text-white rounded-xl hover:bg-rust/80 transition-all duration-300 font-semibold shadow-lg shadow-rust/20 hover:shadow-rust/40 transform hover:scale-[1.02] heading-font text-sm">
                Create User
            </button>
            <a href="{{ route('admin.users.index') }}" class="w-full sm:w-auto px-6 py-2.5 border border-white/5 text-white/40 rounded-xl hover:border-rust/30 hover:text-white/60 transition-all duration-300 text-sm font-medium text-center">
                Cancel
            </a>
        </div>
    </form>
</div>

@push('styles')
<style>
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