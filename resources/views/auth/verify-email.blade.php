<x-guest-layout>
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
            --color-success: #10B981;
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
            --color-success: #34D399;
            --color-shadow: rgba(0, 0, 0, 0.3);
            --color-shadow-hover: rgba(0, 0, 0, 0.5);
        }

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

        /* Card background - Theme aware */
        .card-bg {
            background-color: var(--color-bg-card) !important;
            border-color: var(--color-border) !important;
        }

        /* Message styles */
        .info-message {
            color: var(--color-text-secondary) !important;
            background-color: var(--color-bg) !important;
            border-color: var(--color-border) !important;
        }

        .success-message {
            border-color: rgba(16, 185, 129, 0.2) !important;
            background-color: rgba(16, 185, 129, 0.05) !important;
            color: var(--color-success) !important;
        }

        /* Logout button */
        .logout-btn {
            color: var(--color-text-muted) !important;
            transition: all 0.3s ease;
            text-decoration: none;
            font-size: 14px;
        }
        .logout-btn:hover {
            color: var(--color-secondary) !important;
        }
        [data-theme="dark"] .logout-btn:hover {
            color: #60A5FA !important;
        }
    </style>

    <div class="min-h-screen flex items-center justify-center bg-[var(--color-bg)] text-[var(--color-text-secondary)] py-12 px-4 sm:px-6 lg:px-8 selection:bg-[var(--color-primary)]/30 selection:text-white">
        
        {{-- Background Glow --}}
        <div class="absolute w-72 h-72 sm:w-96 sm:h-96 bg-primary-glow rounded-full blur-3xl pointer-events-none top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2" aria-hidden="true"></div>

        <div class="w-full max-w-md relative z-10">
            
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
                            Email Verification
                        </p>
                        <h1 class="heading-font text-2xl sm:text-3xl font-bold text-[var(--color-text-primary)] tracking-tight">
                            Verify Your Email
                        </h1>
                        <div class="mt-3 text-sm text-[var(--color-text-muted)] leading-relaxed info-message p-4 rounded-xl border">
                            {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
                        </div>
                    </div>

                    {{-- Success Message --}}
                    @if (session('status') == 'verification-link-sent')
                        <div class="mb-6 text-sm font-medium success-message p-3 rounded-lg border">
                            {{ __('A new verification link has been sent to the email address you provided during registration.') }}
                        </div>
                    @endif

                    {{-- Actions --}}
                    <div class="mt-6 flex flex-col sm:flex-row items-center justify-between gap-4">
                        {{-- Resend Button --}}
                        <form method="POST" action="{{ route('verification.send') }}" class="w-full sm:w-auto">
                            @csrf
                            <button 
                                type="submit"
                                class="w-full sm:w-auto px-6 py-3 btn-primary text-white font-medium rounded-xl transition-all duration-300 shadow-lg shadow-[var(--color-primary)]/20 hover:shadow-[var(--color-primary)]/40 transform hover:scale-[1.02] text-base heading-font"
                            >
                                {{ __('Resend Verification Email') }}
                            </button>
                        </form>

                        {{-- Logout --}}
                        <form method="POST" action="{{ route('logout') }}" class="w-full sm:w-auto">
                            @csrf
                            <button 
                                type="submit" 
                                class="w-full sm:w-auto logout-btn font-medium rounded-md focus:outline-none focus:ring-2 focus:ring-[var(--color-primary)] focus:ring-offset-2 focus:ring-offset-[var(--color-bg-card)] px-4 py-2"
                            >
                                {{ __('Log Out') }}
                            </button>
                        </form>
                    </div>

                    {{-- Back to Home --}}
                    <div class="mt-6 text-center">
                        <a href="{{ route('posts.index') }}" class="inline-flex items-center gap-2 text-[var(--color-text-muted)] hover:text-[var(--color-secondary)] transition-colors text-sm">
                            <span>←</span> Back to home
                        </a>
                    </div>

                </div>
            </div>

        </div>
    </div>
</x-guest-layout>