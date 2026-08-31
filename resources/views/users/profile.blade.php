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

    /* Input styles */
    .profile-input {
        background-color: rgba(10, 10, 10, 0.8) !important;
        border-color: rgba(255, 255, 255, 0.06) !important;
        color: #ffffff !important;
        font-family: 'Work Sans', sans-serif !important;
    }

    .profile-input:focus {
        border-color: #c45a2e !important;
        box-shadow: 0 0 0 3px rgba(196, 90, 46, 0.15) !important;
    }

    .profile-input::placeholder {
        color: rgba(255, 255, 255, 0.20) !important;
    }

    .profile-textarea {
        background-color: rgba(10, 10, 10, 0.8) !important;
        border-color: rgba(255, 255, 255, 0.06) !important;
        color: #ffffff !important;
        font-family: 'Work Sans', sans-serif !important;
    }

    .profile-textarea:focus {
        border-color: #c45a2e !important;
        box-shadow: 0 0 0 3px rgba(196, 90, 46, 0.15) !important;
    }

    .profile-textarea::placeholder {
        color: rgba(255, 255, 255, 0.20) !important;
    }
</style>
@endpush

<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-10 sm:py-14 body-font">

    {{-- PAGE HEADER --}}
    <div class="border-b border-white/5 pb-5 mb-8">
        <div class="text-center max-w-3xl mx-auto">
            <p class="text-sm font-semibold uppercase tracking-[0.2em] text-rust mb-3 heading-font">
                Account Settings
            </p>
            <h1 class="heading-font text-3xl sm:text-4xl lg:text-5xl font-bold tracking-tight text-white">
                Profile Settings
            </h1>
            <p class="mt-4 text-base sm:text-lg leading-relaxed text-white/50">
                Manage your personal profile details, avatar, and security preferences.
            </p>
        </div>
    </div>

    {{-- STATUS NOTIFICATION --}}
    @if (session('status') === 'profile-updated')
        <div class="mb-6 p-4 rounded-xl bg-rust/10 border border-rust/30 text-rust text-sm flex items-center justify-between max-w-2xl mx-auto">
            <span>✦ Profile details have been updated successfully.</span>
            <button onclick="this.parentElement.remove()" class="text-white/30 hover:text-white/60 transition-colors">✕</button>
        </div>
    @elseif (session('status') === 'password-updated')
        <div class="mb-6 p-4 rounded-xl bg-rust/10 border border-rust/30 text-rust text-sm flex items-center justify-between max-w-2xl mx-auto">
            <span>✦ Security password updated successfully.</span>
            <button onclick="this.parentElement.remove()" class="text-white/30 hover:text-white/60 transition-colors">✕</button>
        </div>
    @endif

    <div class="space-y-10 max-w-2xl mx-auto">

        {{-- =========================================================
             SECTION 1: UPDATE PROFILE INFORMATION & AVATAR
        ========================================================== --}}
        <section class="bg-[#121212] border border-white/5 rounded-2xl p-6 sm:p-8 shadow-xl hover:border-rust/30 transition-all duration-300">
            <div class="text-center">
                <h2 class="heading-font text-xl font-bold text-white mb-1 tracking-tight">
                    Profile Information
                </h2>
                <p class="text-white/40 text-sm mb-6">
                    Update your public profile photo and display name.
                </p>
            </div>

            <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data" class="space-y-6">
                @csrf
                @method('PATCH')

                {{-- AVATAR PREVIEW & UPLOAD --}}
                <div>
                    <label class="block text-center text-xs font-semibold text-rust uppercase tracking-widest mb-3 heading-font">
                        Avatar Photo
                    </label>

                    <div class="flex flex-col sm:flex-row items-center justify-center gap-6">
                        <div class="relative shrink-0">
                            @if ($user->avatar)
                                <img src="{{ Storage::url($user->avatar) }}" alt="{{ $user->name }}" class="w-20 h-20 rounded-full object-cover border-2 border-rust/50 shadow-md shadow-rust/10">
                            @else
                                <div class="w-20 h-20 rounded-full bg-[#0a0a0a] border border-white/5 flex items-center justify-center text-white/30 font-bold text-2xl heading-font">
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
                                class="block w-full text-sm text-white/40
                                       file:mr-4 file:py-2 file:px-4
                                       file:rounded-full file:border-0
                                       file:text-sm file:font-semibold
                                       file:bg-rust/10 file:text-rust
                                       hover:file:bg-rust/20 hover:file:text-rust/80
                                       file:transition-all file:cursor-pointer
                                       heading-font"
                            >
                            <p class="text-xs text-white/20 mt-2">JPG, PNG, WEBP up to 2MB.</p>
                            @error('avatar')
                                <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                {{-- DISPLAY NAME --}}
                <div>
                    <label for="name" class="block text-xs font-semibold text-rust uppercase tracking-widest mb-2 text-center heading-font">
                        Full Name
                    </label>
                    <input 
                        type="text" 
                        name="name" 
                        id="name" 
                        value="{{ old('name', $user->name) }}" 
                        required 
                        class="w-full h-11 px-4 rounded-xl profile-input border border-white/5 text-white placeholder:text-white/20 focus:outline-none focus:border-rust focus:ring-1 focus:ring-rust/30 transition-all text-sm text-center"
                    >
                    @error('name')
                        <p class="text-red-400 text-xs mt-1 text-center">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex justify-center pt-2">
                    <button 
                        type="submit" 
                        class="px-6 py-2.5 rounded-full font-semibold bg-rust hover:bg-rust/80 text-white shadow-lg shadow-rust/20 hover:shadow-rust/40 transition-all text-sm transform hover:scale-[1.02] heading-font"
                    >
                        Save Changes
                    </button>
                </div>
            </form>
        </section>


        {{-- =========================================================
             SECTION 2: UPDATE PASSWORD
        ========================================================== --}}
        <section class="bg-[#121212] border border-white/5 rounded-2xl p-6 sm:p-8 shadow-xl hover:border-rust/30 transition-all duration-300">
            <div class="text-center">
                <h2 class="heading-font text-xl font-bold text-white mb-1 tracking-tight">
                    Update Password
                </h2>
                <p class="text-white/40 text-sm mb-6">
                    Ensure your account is using a long, random password to stay secure.
                </p>
            </div>

            <form method="POST" action="{{ route('password.update') }}" class="space-y-6">
                @csrf
                @method('PUT')

                {{-- CURRENT PASSWORD --}}
                <div>
                    <label for="current_password" class="block text-xs font-semibold text-rust uppercase tracking-widest mb-2 text-center heading-font">
                        Current Password
                    </label>
                    <input 
                        type="password" 
                        name="current_password" 
                        id="current_password" 
                        required 
                        autocomplete="current-password"
                        class="w-full h-11 px-4 rounded-xl profile-input border border-white/5 text-white placeholder:text-white/20 focus:outline-none focus:border-rust focus:ring-1 focus:ring-rust/30 transition-all text-sm text-center"
                    >
                    @error('current_password', 'updatePassword')
                        <p class="text-red-400 text-xs mt-1 text-center">{{ $message }}</p>
                    @enderror
                </div>

                {{-- NEW PASSWORD --}}
                <div>
                    <label for="password" class="block text-xs font-semibold text-rust uppercase tracking-widest mb-2 text-center heading-font">
                        New Password
                    </label>
                    <input 
                        type="password" 
                        name="password" 
                        id="password" 
                        required 
                        autocomplete="new-password"
                        class="w-full h-11 px-4 rounded-xl profile-input border border-white/5 text-white placeholder:text-white/20 focus:outline-none focus:border-rust focus:ring-1 focus:ring-rust/30 transition-all text-sm text-center"
                    >
                    @error('password', 'updatePassword')
                        <p class="text-red-400 text-xs mt-1 text-center">{{ $message }}</p>
                    @enderror
                </div>

                {{-- CONFIRM PASSWORD --}}
                <div>
                    <label for="password_confirmation" class="block text-xs font-semibold text-rust uppercase tracking-widest mb-2 text-center heading-font">
                        Confirm New Password
                    </label>
                    <input 
                        type="password" 
                        name="password_confirmation" 
                        id="password_confirmation" 
                        required 
                        autocomplete="new-password"
                        class="w-full h-11 px-4 rounded-xl profile-input border border-white/5 text-white placeholder:text-white/20 focus:outline-none focus:border-rust focus:ring-1 focus:ring-rust/30 transition-all text-sm text-center"
                    >
                    @error('password_confirmation', 'updatePassword')
                        <p class="text-red-400 text-xs mt-1 text-center">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex justify-center pt-2">
                    <button 
                        type="submit" 
                        class="px-6 py-2.5 rounded-full font-semibold bg-rust hover:bg-rust/80 text-white shadow-lg shadow-rust/20 hover:shadow-rust/40 transition-all text-sm transform hover:scale-[1.02] heading-font"
                    >
                        Update Password
                    </button>
                </div>
            </form>
        </section>

    </div>
</div>

@endsection