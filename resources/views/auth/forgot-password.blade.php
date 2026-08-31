@extends('layouts.public')

@section('title', 'Forgot Password · chronicle')

@section('content')

<div class="min-h-screen flex items-center justify-center bg-[#0a0a0a] text-white/75 py-12 px-4 sm:px-6 lg:px-8 selection:bg-rust/30 selection:text-white">
    
    <div class="w-full max-w-md">
        
        {{-- Logo --}}
        <div class="text-center mb-8">
            <a href="{{ route('posts.index') }}" class="inline-flex items-center gap-2 heading-font text-2xl sm:text-3xl font-bold tracking-tight text-white hover:text-rust transition-colors duration-300 group">
                <span class="text-rust group-hover:scale-110 transition-transform duration-300">✦</span>
                <span>chronicle</span>
            </a>
        </div>

        {{-- Card --}}
        <div class="bg-[#121212] border border-white/5 rounded-2xl p-8 sm:p-10 shadow-2xl">

            {{-- Header --}}
            <div class="text-center mb-8">
                <p class="text-xs font-semibold uppercase tracking-[0.2em] text-rust mb-2 heading-font">
                    Account Recovery
                </p>
                <h1 class="heading-font text-2xl sm:text-3xl font-bold text-white tracking-tight">
                    Forgot Password?
                </h1>
                <p class="mt-2 text-sm text-white/50 leading-relaxed">
                    Enter your email address and we will send you a 6-digit verification PIN to log back in.
                </p>
            </div>

            {{-- Session Status --}}
            @if (session('status'))
                <div class="mb-4 text-sm font-medium text-green-400 bg-green-400/5 p-3 rounded-lg border border-green-400/20">
                    {{ session('status') }}
                </div>
            @endif

            {{-- Form --}}
            <form method="POST" action="{{ route('password.email.pin') }}" class="space-y-6">
                @csrf

                {{-- Email --}}
                <div>
                    <label for="email" class="block text-sm font-medium text-white/60 mb-1.5">
                        Email Address
                    </label>
                    <input 
                        id="email" 
                        name="email" 
                        type="email" 
                        value="{{ old('email') }}" 
                        required 
                        autofocus
                        placeholder="you@example.com"
                        class="w-full px-4 py-3 rounded-xl bg-[#0a0a0a]/80 border border-white/5 text-white placeholder:text-white/20 focus:outline-none focus:border-rust focus:ring-1 focus:ring-rust/30 transition-all duration-300 text-base"
                    >
                    
                    @error('email')
                        <span class="text-xs text-red-400 mt-1 block">{{ $message }}</span>
                    @enderror
                </div>

                {{-- Submit Button --}}
                <button 
                    type="submit"
                    class="w-full py-3 bg-rust hover:bg-rust/80 text-white font-medium rounded-xl transition-all duration-300 shadow-lg shadow-rust/20 hover:shadow-rust/40 transform hover:scale-[1.02] text-base heading-font"
                >
                    Send 6-Digit PIN
                </button>
            </form>

            {{-- Back to Login --}}
            <div class="mt-6 text-center">
                <a href="{{ route('login') }}" class="text-white/30 hover:text-white/60 transition-colors text-sm inline-flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                    </svg>
                    Back to Sign In
                </a>
            </div>
        </div>

        {{-- Back to Home --}}
        <div class="text-center mt-6">
            <a href="{{ route('posts.index') }}" class="inline-flex items-center gap-2 text-white/30 hover:text-white/60 transition-colors text-sm">
                <span>←</span> Back to home
            </a>
        </div>

    </div>
</div>

@endsection

@push('styles')
<style>
    /* Heading font */
    .heading-font {
        font-family: 'Poppins', ui-sans-serif, system-ui, sans-serif !important;
        letter-spacing: -0.02em !important;
    }

    /* Selection color */
    ::selection {
        background-color: rgba(196, 90, 46, 0.3) !important;
        color: #ffffff !important;
    }
</style>
@endpush