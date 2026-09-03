@extends('layouts.public')

@section('title', 'Profile Settings · chronicle')

@section('content')

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

    /* Input styles - Light/Dark mode */
    .profile-input {
        background-color: var(--color-bg) !important;
        border-color: var(--color-border) !important;
        color: var(--color-text-primary) !important;
        font-family: 'Work Sans', sans-serif !important;
    }

    .profile-input:focus {
        border-color: var(--color-primary) !important;
        box-shadow: 0 0 0 3px var(--color-primary-soft) !important;
    }

    .profile-input::placeholder {
        color: var(--color-text-muted) !important;
    }

    /* Profile textarea styles */
    .profile-textarea {
        background-color: var(--color-bg) !important;
        border-color: var(--color-border) !important;
        color: var(--color-text-primary) !important;
        font-family: 'Work Sans', sans-serif !important;
    }

    .profile-textarea:focus {
        border-color: var(--color-primary) !important;
        box-shadow: 0 0 0 3px var(--color-primary-soft) !important;
    }

    .profile-textarea::placeholder {
        color: var(--color-text-muted) !important;
    }

    /* Smooth theme transitions */
    * {
        transition-property: background-color, border-color, color, fill, stroke;
        transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
        transition-duration: 300ms;
    }

    /* Fix for dark mode input text visibility */
    input.profile-input,
    input.profile-input:focus,
    input.profile-input:active {
        color: var(--color-text-primary) !important;
    }

    /* File input fix for dark mode */
    input[type="file"] {
        color: var(--color-text-secondary) !important;
    }

    input[type="file"]::file-selector-button {
        background-color: var(--color-primary-soft) !important;
        color: var(--color-primary) !important;
        border: none !important;
        padding: 0.5rem 1rem !important;
        border-radius: 9999px !important;
        font-size: 0.875rem !important;
        font-weight: 600 !important;
        cursor: pointer !important;
        transition: all 0.2s ease !important;
    }

    input[type="file"]::file-selector-button:hover {
        background-color: var(--color-primary) !important;
        color: #ffffff !important;
    }

    /* Avatar placeholder */
    .avatar-placeholder {
        background-color: var(--color-bg) !important;
        border-color: var(--color-border) !important;
        color: var(--color-text-muted) !important;
    }
</style>
@endpush

<div class="min-h-screen bg-[var(--color-bg)] text-[var(--color-text-secondary)] transition-colors duration-300">

    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-10 sm:py-14 body-font">

        {{-- PAGE HEADER --}}
        <div class="border-b border-[var(--color-border)] pb-5 mb-8">
            <div class="text-center max-w-3xl mx-auto">
                <p class="text-sm font-semibold uppercase tracking-[0.2em] text-[var(--color-primary)] mb-3 heading-font">
                    Account Settings
                </p>
                <h1 class="heading-font text-3xl sm:text-4xl lg:text-5xl font-bold tracking-tight text-[var(--color-text-primary)]">
                    Profile Settings
                </h1>
                <p class="mt-4 text-base sm:text-lg leading-relaxed text-[var(--color-text-secondary)]">
                    Manage your personal profile details, avatar, and security preferences.
                </p>
            </div>
        </div>

        {{-- STATUS NOTIFICATION --}}
        @if (session('status') === 'profile-updated')
        <div class="mb-6 p-4 rounded-xl bg-[var(--color-primary-soft)] border border-[var(--color-primary-soft)] text-[var(--color-primary)] text-sm flex items-center justify-between max-w-2xl mx-auto">
            <span>✦ Profile details have been updated successfully.</span>
            <button onclick="this.parentElement.remove()" class="text-[var(--color-text-muted)] hover:text-[var(--color-text-secondary)] transition-colors">✕</button>
        </div>
        @elseif (session('status') === 'password-updated')
        <div class="mb-6 p-4 rounded-xl bg-[var(--color-primary-soft)] border border-[var(--color-primary-soft)] text-[var(--color-primary)] text-sm flex items-center justify-between max-w-2xl mx-auto">
            <span>✦ Security password updated successfully.</span>
            <button onclick="this.parentElement.remove()" class="text-[var(--color-text-muted)] hover:text-[var(--color-text-secondary)] transition-colors">✕</button>
        </div>
        @endif

        <div class="space-y-10 max-w-2xl mx-auto">

            {{-- =========================================================
                 SECTION 1: UPDATE PROFILE INFORMATION & AVATAR
            ========================================================== --}}
            <section class="bg-[var(--color-bg-card)] border border-[var(--color-border)] rounded-2xl p-6 sm:p-8 shadow-sm hover:border-[var(--color-primary)]/30 transition-all duration-300">
                <div class="text-center">
                    <h2 class="heading-font text-xl font-bold text-[var(--color-text-primary)] mb-1 tracking-tight">
                        Profile Information
                    </h2>
                    <p class="text-[var(--color-text-secondary)] text-sm mb-6">
                        Update your public profile photo and display name.
                    </p>
                </div>

                <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data" class="space-y-6">
                    @csrf
                    @method('PATCH')

                    {{-- AVATAR PREVIEW & UPLOAD --}}
                    <div>
                        <label class="block text-center text-xs font-semibold text-[var(--color-primary)] uppercase tracking-widest mb-3 heading-font">
                            Avatar Photo
                        </label>

                        <div class="flex flex-col sm:flex-row items-center justify-center gap-6">
                            <div class="relative shrink-0">
                                @if ($user->avatar)
                                <img src="{{ Storage::url($user->avatar) }}" alt="{{ $user->name }}" class="w-20 h-20 rounded-full object-cover border-2 border-[var(--color-primary)]/50 shadow-md shadow-[var(--color-primary)]/10">
                                @else
                                <div class="w-20 h-20 rounded-full bg-[var(--color-bg)] border border-[var(--color-border)] flex items-center justify-center text-[var(--color-text-muted)] font-bold text-2xl heading-font">
                                    {{ strtoupper(substr($user->name, 0, 1)) }}
                                </div>
                                @endif
                            </div>

                            <div class="flex-1 text-center sm:text-left">
                                <input
                                    type="file"
                                    name="avatar"
                                    id="avatar"
                                    accept="image/jpeg,image/png,image/jpg,image/webp"
                                    class="block w-full text-sm text-[var(--color-text-secondary)]
                                           file:mr-4 file:py-2 file:px-4
                                           file:rounded-full file:border-0
                                           file:text-sm file:font-semibold
                                           file:bg-[var(--color-primary-soft)] file:text-[var(--color-primary)]
                                           hover:file:bg-[var(--color-primary)] hover:file:text-white
                                           file:transition-all file:cursor-pointer
                                           heading-font">
                                <p class="text-xs text-[var(--color-text-muted)] mt-2">JPG, PNG, WEBP up to 2MB.</p>
                                @error('avatar')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>

                    {{-- DISPLAY NAME --}}
                    <div>
                        <label for="name" class="block text-xs font-semibold text-[var(--color-primary)] uppercase tracking-widest mb-2 text-center heading-font">
                            Full Name
                        </label>
                        <input
                            type="text"
                            name="name"
                            id="name"
                            value="{{ old('name', $user->name) }}"
                            required
                            class="w-full h-11 px-4 rounded-xl profile-input border focus:outline-none focus:border-[var(--color-primary)] focus:ring-1 focus:ring-[var(--color-primary)]/30 transition-all text-sm text-center">
                        @error('name')
                        <p class="text-red-500 text-xs mt-1 text-center">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex justify-center pt-2">
                        <button
                            type="submit"
                            class="px-6 py-2.5 rounded-full font-semibold bg-[var(--color-primary)] hover:bg-[var(--color-primary-hover)] text-white shadow-lg shadow-[var(--color-primary)]/20 hover:shadow-[var(--color-primary)]/40 transition-all text-sm transform hover:scale-[1.02] heading-font">
                            Save Changes
                        </button>
                    </div>
                </form>
            </section>


            {{-- =========================================================
                 SECTION 2: UPDATE PASSWORD
            ========================================================== --}}
            <section class="bg-[var(--color-bg-card)] border border-[var(--color-border)] rounded-2xl p-6 sm:p-8 shadow-sm hover:border-[var(--color-primary)]/30 transition-all duration-300">
                <div class="text-center">
                    <h2 class="heading-font text-xl font-bold text-[var(--color-text-primary)] mb-1 tracking-tight">
                        Update Password
                    </h2>
                    <p class="text-[var(--color-text-secondary)] text-sm mb-6">
                        Ensure your account is using a long, random password to stay secure.
                    </p>
                </div>

                <form method="POST" action="{{ route('password.update') }}" class="space-y-6">
                    @csrf
                    @method('PUT')

                    {{-- CURRENT PASSWORD --}}
                    <div>
                        <label for="current_password" class="block text-xs font-semibold text-[var(--color-primary)] uppercase tracking-widest mb-2 text-center heading-font">
                            Current Password
                        </label>
                        <input
                            type="password"
                            name="current_password"
                            id="current_password"
                            required
                            autocomplete="current-password"
                            class="w-full h-11 px-4 rounded-xl profile-input border focus:outline-none focus:border-[var(--color-primary)] focus:ring-1 focus:ring-[var(--color-primary)]/30 transition-all text-sm text-center">
                        @error('current_password', 'updatePassword')
                        <p class="text-red-500 text-xs mt-1 text-center">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- NEW PASSWORD --}}
                    <div>
                        <label for="password" class="block text-xs font-semibold text-[var(--color-primary)] uppercase tracking-widest mb-2 text-center heading-font">
                            New Password
                        </label>
                        <input
                            type="password"
                            name="password"
                            id="password"
                            required
                            autocomplete="new-password"
                            class="w-full h-11 px-4 rounded-xl profile-input border focus:outline-none focus:border-[var(--color-primary)] focus:ring-1 focus:ring-[var(--color-primary)]/30 transition-all text-sm text-center">
                        @error('password', 'updatePassword')
                        <p class="text-red-500 text-xs mt-1 text-center">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- CONFIRM PASSWORD --}}
                    <div>
                        <label for="password_confirmation" class="block text-xs font-semibold text-[var(--color-primary)] uppercase tracking-widest mb-2 text-center heading-font">
                            Confirm New Password
                        </label>
                        <input
                            type="password"
                            name="password_confirmation"
                            id="password_confirmation"
                            required
                            autocomplete="new-password"
                            class="w-full h-11 px-4 rounded-xl profile-input border focus:outline-none focus:border-[var(--color-primary)] focus:ring-1 focus:ring-[var(--color-primary)]/30 transition-all text-sm text-center">
                        @error('password_confirmation', 'updatePassword')
                        <p class="text-red-500 text-xs mt-1 text-center">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex justify-center pt-2">
                        <button
                            type="submit"
                            class="px-6 py-2.5 rounded-full font-semibold bg-[var(--color-primary)] hover:bg-[var(--color-primary-hover)] text-white shadow-lg shadow-[var(--color-primary)]/20 hover:shadow-[var(--color-primary)]/40 transition-all text-sm transform hover:scale-[1.02] heading-font">
                            Update Password
                        </button>
                    </div>
                </form>
            </section>

        </div>
    </div>
</div>

@endsection