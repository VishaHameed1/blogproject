@extends('layouts.admin')

@section('title', 'New User · Admin')

@section('content')
<style>
    /* ==========================================================
       CHRONICLE DUAL-TONE THEME
       Light: Purple (#7C3AED) | Dark: Blue (#3B82F6)
    ========================================================== */

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

    /* Form card */
    .form-card {
        background-color: var(--color-bg-card) !important;
        border-color: var(--color-border) !important;
        transition: all 0.3s ease;
    }

    .form-card:hover {
        border-color: var(--color-primary) !important;
    }

    /* Form labels */
    .form-label {
        color: var(--color-text-secondary) !important;
        font-weight: 500;
    }

    /* Form inputs */
    .form-input {
        background-color: var(--color-bg) !important;
        border-color: var(--color-border) !important;
        color: var(--color-text-primary) !important;
        transition: all 0.3s ease;
    }

    .form-input::placeholder {
        color: var(--color-text-muted) !important;
    }

    .form-input:focus {
        border-color: var(--color-primary) !important;
        box-shadow: 0 0 0 3px var(--color-primary-soft) !important;
        outline: none;
    }

    /* Select dropdown */
    .form-select {
        background-color: var(--color-bg) !important;
        border-color: var(--color-border) !important;
        color: var(--color-text-primary) !important;
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke='%236B7280'%3E%3Cpath stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M19 9l-7 7-7-7'%3E%3C/path%3E%3C/svg%3E");
        background-repeat: no-repeat;
        background-position: right 1rem center;
        background-size: 1rem;
        padding-right: 2.5rem;
        transition: all 0.3s ease;
    }

    .form-select:focus {
        border-color: var(--color-primary) !important;
        box-shadow: 0 0 0 3px var(--color-primary-soft) !important;
        outline: none;
    }

    .form-select option {
        background-color: var(--color-bg-card) !important;
        color: var(--color-text-primary) !important;
    }

    /* Error message */
    .error-message {
        color: var(--color-primary) !important;
    }

    /* Required asterisk */
    .required-star {
        color: #EF4444 !important;
    }

    [data-theme="dark"] .required-star {
        color: #F87171 !important;
    }

    /* Primary button */
    .btn-primary-custom {
        background-color: var(--color-primary) !important;
        color: #ffffff !important;
        transition: all 0.3s ease;
    }

    .btn-primary-custom:hover {
        background-color: var(--color-primary-hover) !important;
        box-shadow: 0 8px 25px var(--color-shadow-hover) !important;
        transform: scale(1.02);
    }

    /* Cancel button */
    .btn-cancel {
        color: var(--color-text-muted) !important;
        border-color: var(--color-border) !important;
        transition: all 0.3s ease;
    }

    .btn-cancel:hover {
        border-color: var(--color-primary) !important;
        color: var(--color-text-primary) !important;
    }

    /* Divider */
    .form-divider {
        border-color: var(--color-border) !important;
    }

    /* Select dropdown dark mode */
    [data-theme="dark"] .form-select {
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke='%23A0A0A0'%3E%3Cpath stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M19 9l-7 7-7-7'%3E%3C/path%3E%3C/svg%3E");
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

<div class="max-w-2xl mx-auto">
    {{-- Header --}}
    <div class="text-center mb-8">
        <h1 class="heading-font text-2xl sm:text-3xl font-bold text-[var(--color-text-primary)] tracking-tight">New User</h1>
        <p class="text-sm text-[var(--color-text-muted)] mt-1">Create a new user account</p>
    </div>

    {{-- Form --}}
    <form method="POST" action="{{ route('admin.users.store') }}" class="form-card border rounded-2xl shadow-xl p-6 md:p-8 transition-all duration-300">
        @csrf

        {{-- Name --}}
        <div class="mb-6">
            <label for="name" class="form-label block text-sm font-medium mb-1.5 heading-font">Full Name <span class="required-star">*</span></label>
            <input type="text"
                name="name"
                id="name"
                value="{{ old('name') }}"
                required
                class="form-input w-full px-4 py-2.5 rounded-xl border placeholder:text-[var(--color-text-muted)] focus:border-[var(--color-primary)] focus:ring-1 focus:ring-[var(--color-primary)]/30 transition-all text-sm"
                placeholder="John Doe">
            @error('name')
            <p class="error-message text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Email --}}
        <div class="mb-6">
            <label for="email" class="form-label block text-sm font-medium mb-1.5 heading-font">Email <span class="required-star">*</span></label>
            <input type="email"
                name="email"
                id="email"
                value="{{ old('email') }}"
                required
                class="form-input w-full px-4 py-2.5 rounded-xl border placeholder:text-[var(--color-text-muted)] focus:border-[var(--color-primary)] focus:ring-1 focus:ring-[var(--color-primary)]/30 transition-all text-sm"
                placeholder="john@example.com">
            @error('email')
            <p class="error-message text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Password --}}
        <div class="mb-6">
            <label for="password" class="form-label block text-sm font-medium mb-1.5 heading-font">Password <span class="required-star">*</span></label>
            <input type="password"
                name="password"
                id="password"
                required
                class="form-input w-full px-4 py-2.5 rounded-xl border placeholder:text-[var(--color-text-muted)] focus:border-[var(--color-primary)] focus:ring-1 focus:ring-[var(--color-primary)]/30 transition-all text-sm"
                placeholder="Minimum 8 characters">
            @error('password')
            <p class="error-message text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Confirm Password --}}
        <div class="mb-6">
            <label for="password_confirmation" class="form-label block text-sm font-medium mb-1.5 heading-font">Confirm Password <span class="required-star">*</span></label>
            <input type="password"
                name="password_confirmation"
                id="password_confirmation"
                required
                class="form-input w-full px-4 py-2.5 rounded-xl border placeholder:text-[var(--color-text-muted)] focus:border-[var(--color-primary)] focus:ring-1 focus:ring-[var(--color-primary)]/30 transition-all text-sm"
                placeholder="Confirm password">
        </div>

        {{-- Role --}}
        <div class="mb-6">
            <label for="role_id" class="form-label block text-sm font-medium mb-1.5 heading-font">Role <span class="required-star">*</span></label>
            <select name="role_id"
                id="role_id"
                required
                class="form-select w-full px-4 py-2.5 rounded-xl border focus:border-[var(--color-primary)] focus:ring-1 focus:ring-[var(--color-primary)]/30 transition-all text-sm appearance-none">
                <option value="" class="text-[var(--color-text-muted)]">Select a role</option>
                @foreach($roles as $role)
                <option value="{{ $role->id }}" {{ old('role_id') == $role->id ? 'selected' : '' }} class="text-[var(--color-text-primary)]">
                    {{ $role->name }} ({{ $role->slug }})
                </option>
                @endforeach
            </select>
            @error('role_id')
            <p class="error-message text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Actions --}}
        <div class="flex flex-col sm:flex-row items-center justify-center gap-3 pt-4 form-divider border-t">
            <button type="submit" class="btn-primary-custom w-full sm:w-auto px-6 py-2.5 rounded-xl font-semibold shadow-lg shadow-[var(--color-primary)]/20 hover:shadow-[var(--color-primary)]/40 transform hover:scale-[1.02] heading-font text-sm">
                Create User
            </button>
            <a href="{{ route('admin.users.index') }}" class="btn-cancel w-full sm:w-auto px-6 py-2.5 border rounded-xl transition-all duration-300 text-sm font-medium text-center">
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

    /* Body font - Work Sans */
    .body-font {
        font-family: 'Work Sans', ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif !important;
    }

    /* Selection color - Theme aware */
    ::selection {
        background-color: var(--color-primary-soft) !important;
        color: #ffffff !important;
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
@endsection