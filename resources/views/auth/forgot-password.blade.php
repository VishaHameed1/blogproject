@extends('layouts.public')

@section('title', 'Forgot Password · chronicle')

@section('content')

<div class="min-h-screen flex items-center justify-center bg-[var(--color-bg)] text-[var(--color-text-secondary)] py-12 px-4 sm:px-6 lg:px-8 selection:bg-[var(--color-primary)]/30 selection:text-white">
    
    <style>
        /* Theme variables */
        :root {
            --color-bg: #F8F9FA;
            --color-bg-card: #FFFFFF;
            --color-text-primary: #111827;
            --color-text-secondary: #6B7280;
            --color-text-muted: #9CA3AF;
            --color-border: #E5E7EB;
            --color-primary: #7C3AED;
            --color-primary-hover: #6D28D9;
            --color-secondary: #3B82F6;
            --color-secondary-hover: #60A5FA;
            --color-shadow: rgba(0, 0, 0, 0.08);
            --color-shadow-hover: rgba(0, 0, 0, 0.12);
        }

        [data-theme="dark"] {
            --color-bg: #0A0A0A;
            --color-bg-card: #1A1A1A;
            --color-text-primary: #FFFFFF;
            --color-text-secondary: #A0A0A0;
            --color-text-muted: #6B7280;
            --color-border: #2A2A2A;
            --color-primary: #7C3AED;
            --color-primary-hover: #6D28D9;
            --color-secondary: #3B82F6;
            --color-secondary-hover: #60A5FA;
            --color-shadow: rgba(0, 0, 0, 0.3);
            --color-shadow-hover: rgba(0, 0, 0, 0.5);
        }

        /* Background glow - Purple in light, Blue in dark */
        .bg-primary-glow {
            background-color: rgba(124, 58, 237, 0.08) !important;
        }
        [data-theme="dark"] .bg-primary-glow {
            background-color: rgba(59, 130, 246, 0.08) !important;
        }

        /* Logo hover - Blue in dark mode */
        .logo-link {
            transition: all 0.3s ease;
            text-decoration: none;
        }
        .logo-link:hover .logo-text {
            color: var(--color-primary) !important;
        }
        .logo-link:hover .logo-icon {
            transform: scale(1.1) rotate(10deg);
        }
        [data-theme="dark"] .logo-link:hover .logo-text {
            color: #60A5FA !important;
        }
        [data-theme="dark"] .logo-link:hover .logo-icon {
            color: #60A5FA !important;
        }

        /* Heading font */
        .heading-font {
            font-family: 'Poppins', ui-sans-serif, system-ui, sans-serif !important;
            letter-spacing: -0.02em !important;
        }

        /* Selection color */
        ::selection {
            background-color: rgba(124, 58, 237, 0.3) !important;
            color: #ffffff !important;
        }
        [data-theme="dark"] ::selection {
            background-color: rgba(59, 130, 246, 0.3) !important;
        }

        /* Neon border animation */
        @keyframes border-spin {
            100% {
                transform: rotate(360deg);
            }
        }

        .neon-tracer-box {
            position: relative;
            border-radius: 1.5rem;
            overflow: hidden;
            padding: 2px;
            isolation: isolate;
        }

        .neon-tracer-box::before {
            content: '';
            position: absolute;
            inset: -50%;
            width: 200%;
            height: 200%;
            background: conic-gradient(
                transparent 0deg,
                transparent 280deg,
                #7C3AED 340deg,
                #6D28D9 360deg
            );
            animation: border-spin 6s linear infinite;
            z-index: -1;
        }

        [data-theme="dark"] .neon-tracer-box::before {
            background: conic-gradient(
                transparent 0deg,
                transparent 280deg,
                #3B82F6 340deg,
                #60A5FA 360deg
            );
        }

        @media (prefers-reduced-motion: reduce) {
            .neon-tracer-box::before {
                animation: none;
            }
        }

        /* Input styles - Theme aware */
        .forgot-password-input {
            background-color: var(--color-bg-card) !important;
            border-color: var(--color-border) !important;
            color: var(--color-text-primary) !important;
            transition: all 0.3s ease;
        }
        .forgot-password-input::placeholder {
            color: var(--color-text-muted) !important;
        }
        .forgot-password-input:focus {
            border-color: var(--color-primary) !important;
            box-shadow: 0 0 0 3px rgba(124, 58, 237, 0.15) !important;
            outline: none;
        }
        [data-theme="dark"] .forgot-password-input:focus {
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.15) !important;
        }

        /* Button styles - Theme aware */
        .btn-primary {
            background-color: var(--color-primary) !important;
            color: #ffffff !important;
            transition: all 0.3s ease;
        }
        .btn-primary:hover {
            background-color: var(--color-primary-hover) !important;
            transform: scale(1.02);
            box-shadow: 0 10px 25px var(--color-shadow-hover) !important;
        }
        [data-theme="dark"] .btn-primary {
            background-color: #3B82F6 !important;
        }
        [data-theme="dark"] .btn-primary:hover {
            background-color: #2563EB !important;
        }

        /* Link hover - Blue in dark mode */
        .link-hover {
            transition: all 0.3s ease;
        }
        .link-hover:hover {
            color: var(--color-secondary) !important;
        }
        [data-theme="dark"] .link-hover:hover {
            color: #60A5FA !important;
        }

        /* Card background - Theme aware */
        .card-bg {
            background-color: var(--color-bg-card) !important;
            border-color: var(--color-border) !important;
        }

        /* Status message - Theme aware */
        .status-message {
            border-color: rgba(16, 185, 129, 0.2) !important;
            background-color: rgba(16, 185, 129, 0.05) !important;
            color: #10B981 !important;
        }
    </style>

    <div class="w-full max-w-md">
        
        {{-- Logo --}}
        <div class="text-center mb-8">
            <a href="{{ route('posts.index') }}" class="logo-link inline-flex items-center gap-2 heading-font text-2xl sm:text-3xl font-bold tracking-tight text-[var(--color-text-primary)] transition-colors duration-300">
                <span class="logo-icon text-[var(--color-primary)] transition-all duration-300">✦</span>
                <span class="logo-text transition-colors duration-300">chronicle</span>
            </a>
        </div>

        {{-- Card --}}
        <div class="neon-tracer-box shadow-2xl shadow-[var(--color-primary)]/15">
            <div class="card-bg border border-[var(--color-border)] rounded-[22px] p-8 sm:p-10">

                {{-- Header --}}
                <div class="text-center mb-8">
                    <p class="text-xs font-semibold uppercase tracking-[0.2em] text-[var(--color-primary)] mb-2 heading-font">
                        Account Recovery
                    </p>
                    <h1 class="heading-font text-2xl sm:text-3xl font-bold text-[var(--color-text-primary)] tracking-tight">
                        Forgot Password?
                    </h1>
                    <p class="mt-2 text-sm text-[var(--color-text-muted)] leading-relaxed">
                        Enter your email address and we will send you a 6-digit verification PIN to log back in.
                    </p>
                </div>

                {{-- Session Status --}}
                @if (session('status'))
                    <div class="mb-4 text-sm font-medium text-green-400 status-message p-3 rounded-lg border">
                        {{ session('status') }}
                    </div>
                @endif

                {{-- Form --}}
                <form method="POST" action="{{ route('password.email.pin') }}" class="space-y-6">
                    @csrf

                    {{-- Email --}}
                    <div>
                        <label for="email" class="block text-sm font-medium text-[var(--color-text-secondary)] mb-1.5">
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
                            class="w-full px-4 py-3 rounded-xl forgot-password-input text-[var(--color-text-primary)] placeholder:text-[var(--color-text-muted)] border border-[var(--color-border)] focus:border-[var(--color-primary)] focus:ring-1 focus:ring-[var(--color-primary)]/30 transition-all duration-300 text-base"
                        >
                        
                        @error('email')
                            <span class="text-xs text-[var(--color-primary)] mt-1 block">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Submit Button --}}
                    <button 
                        type="submit"
                        class="w-full py-3 btn-primary text-white font-medium rounded-xl transition-all duration-300 shadow-lg shadow-[var(--color-primary)]/20 hover:shadow-[var(--color-primary)]/40 transform hover:scale-[1.02] text-base heading-font"
                    >
                        Send 6-Digit PIN
                    </button>
                </form>

                {{-- Back to Login --}}
                <div class="mt-6 text-center">
                    <a href="{{ route('login') }}" class="text-[var(--color-text-muted)] hover:text-[var(--color-secondary)] transition-colors text-sm inline-flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                        </svg>
                        Back to Sign In
                    </a>
                </div>
            </div>
        </div>

        {{-- Back to Home --}}
        <div class="text-center mt-6">
            <a href="{{ route('posts.index') }}" class="inline-flex items-center gap-2 text-[var(--color-text-muted)] hover:text-[var(--color-secondary)] transition-colors text-sm">
                <span>←</span> Back to home
            </a>
        </div>

    </div>
</div>

@endsection