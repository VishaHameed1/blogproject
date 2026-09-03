<x-guest-layout>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&family=Work+Sans:wght@300;400;500;600;700&display=swap');

        /* ==========================================================
           CHRONICLE DUAL-TONE THEME
           Light: Purple (#7C3AED) | Dark: Blue (#3B82F6)
        ========================================================== */

        :root {
            /* Light Mode */
            --color-bg: #F8F9FA;
            --color-bg-card: #FFFFFF;
            --color-text-primary: #111827;
            --color-text-secondary: #6B7280;
            --color-text-muted: #9CA3AF;
            --color-border: #E5E7EB;
            --color-primary: #7C3AED;
            --color-primary-hover: #6D28D9;
            --color-primary-soft: rgba(124, 58, 237, 0.10);
            --color-secondary: #3B82F6;
            --color-secondary-hover: #60A5FA;
            --color-shadow: rgba(0, 0, 0, 0.08);
            --color-shadow-hover: rgba(0, 0, 0, 0.12);
        }

        [data-theme="dark"] {
            /* Dark Mode */
            --color-bg: #0A0A0A;
            --color-bg-card: #141414;
            --color-text-primary: #FFFFFF;
            --color-text-secondary: #A0A0A0;
            --color-text-muted: #6B7280;
            --color-border: #2A2A2A;
            --color-primary: #3B82F6;
            --color-primary-hover: #60A5FA;
            --color-primary-soft: rgba(59, 130, 246, 0.14);
            --color-secondary: #3B82F6;
            --color-secondary-hover: #60A5FA;
            --color-shadow: rgba(0, 0, 0, 0.30);
            --color-shadow-hover: rgba(0, 0, 0, 0.50);
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
            background: conic-gradient(transparent 0deg,
                    transparent 280deg,
                    var(--color-primary) 340deg,
                    var(--color-primary-hover) 360deg);
            animation: border-spin 6s linear infinite;
            z-index: -1;
        }

        [data-theme="dark"] .neon-tracer-box::before {
            background: conic-gradient(transparent 0deg,
                    transparent 280deg,
                    #3B82F6 340deg,
                    #60A5FA 360deg);
        }

        @media (prefers-reduced-motion: reduce) {
            .neon-tracer-box::before {
                animation: none;
            }
        }

        .chronicle-auth {
            font-family: 'Work Sans', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;
            min-height: 100vh;
            height: auto;
            overflow-y: auto;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 1.5rem 1rem;
            background-color: var(--color-bg) !important;
            transition: background-color 0.3s ease;
        }

        .chronicle-auth input,
        .chronicle-auth select,
        .chronicle-auth textarea {
            font-size: 16px !important;
            font-family: 'Work Sans', sans-serif !important;
            background-color: var(--color-bg-card) !important;
            color: var(--color-text-primary) !important;
            border-color: var(--color-border) !important;
            transition: all 0.3s ease;
        }

        .chronicle-auth input:focus,
        .chronicle-auth select:focus {
            border-color: var(--color-primary) !important;
            box-shadow: 0 0 0 3px var(--color-primary-soft) !important;
        }

        .chronicle-auth input::placeholder {
            color: var(--color-text-muted) !important;
        }

        /* Headings use Poppins */
        .chronicle-auth .text-2xl,
        .chronicle-auth .text-3xl,
        .chronicle-auth h1,
        .chronicle-auth h2,
        .chronicle-auth h3,
        .chronicle-auth .font-heading,
        .chronicle-auth .heading-font {
            font-family: 'Poppins', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif !important;
            letter-spacing: -0.02em !important;
            color: var(--color-text-primary) !important;
        }

        /* Body text - Work Sans */
        .chronicle-auth p,
        .chronicle-auth label,
        .chronicle-auth span,
        .chronicle-auth input,
        .chronicle-auth button {
            font-family: 'Work Sans', sans-serif !important;
        }

        /* Logo hover */
        .chronicle-auth .logo-link {
            transition: all 0.3s ease;
            text-decoration: none;
        }

        .chronicle-auth .logo-link:hover .logo-text {
            color: var(--color-primary) !important;
        }

        .chronicle-auth .logo-link:hover .logo-icon {
            transform: scale(1.1) rotate(10deg);
        }

        /* Background glow - Theme aware */
        .chronicle-auth .bg-purple\/10 {
            background-color: var(--color-primary-soft) !important;
        }

        /* Card background - Theme aware */
        .chronicle-auth .bg-\[\#121212\] {
            background-color: var(--color-bg-card) !important;
            border-color: var(--color-border) !important;
        }

        /* Text colors - Theme aware */
        .chronicle-auth .text-white\/75 {
            color: var(--color-text-secondary) !important;
        }

        .chronicle-auth .text-white\/50 {
            color: var(--color-text-muted) !important;
        }

        .chronicle-auth .text-white\/40 {
            color: var(--color-text-muted) !important;
        }

        .chronicle-auth .text-white\/30 {
            color: var(--color-text-muted) !important;
        }

        .chronicle-auth .text-white\/20 {
            color: var(--color-text-muted) !important;
        }

        .chronicle-auth .text-primary {
            color: var(--color-text-primary) !important;
        }

        .chronicle-auth .text-secondary {
            color: var(--color-text-secondary) !important;
        }

        .chronicle-auth .text-muted {
            color: var(--color-text-muted) !important;
        }

        /* Button styles */
        .chronicle-auth button[type="submit"] {
            font-family: 'Poppins', sans-serif !important;
            font-weight: 600 !important;
        }

        /* Checkbox styling */
        .chronicle-auth input[type="checkbox"] {
            background-color: var(--color-bg-card) !important;
            border-color: var(--color-border) !important;
        }

        .chronicle-auth input[type="checkbox"]:checked {
            background-color: var(--color-primary) !important;
            border-color: var(--color-primary) !important;
        }

        .chronicle-auth input[type="checkbox"]:focus {
            --tw-ring-color: var(--color-primary) !important;
        }

        /* Selection color */
        ::selection {
            background-color: var(--color-primary-soft) !important;
            color: #ffffff !important;
        }

        /* Legacy rust classes - kept for backward compatibility */
        .chronicle-auth .bg-rust {
            background-color: var(--color-primary) !important;
        }

        .chronicle-auth .bg-rust\/10 {
            background-color: var(--color-primary-soft) !important;
        }

        .chronicle-auth .hover\:bg-rust\/80:hover {
            background-color: var(--color-primary-hover) !important;
        }

        .chronicle-auth .text-rust {
            color: var(--color-primary) !important;
        }

        .chronicle-auth .hover\:text-rust:hover {
            color: var(--color-primary-hover) !important;
        }

        .chronicle-auth .border-rust {
            border-color: var(--color-primary) !important;
        }

        .chronicle-auth .focus\:border-rust:focus {
            border-color: var(--color-primary) !important;
        }

        .chronicle-auth .focus\:ring-rust:focus {
            --tw-ring-color: var(--color-primary) !important;
        }

        .chronicle-auth .shadow-rust\/20 {
            box-shadow: 0 4px 6px -1px var(--color-shadow), 0 2px 4px -1px var(--color-shadow) !important;
        }

        .chronicle-auth .shadow-rust\/15 {
            box-shadow: 0 2px 4px var(--color-shadow) !important;
        }

        .chronicle-auth .focus\:ring-offset-\[\#121212\] {
            --tw-ring-offset-color: var(--color-bg-card) !important;
        }

        /* Theme toggle button */
        .theme-toggle-auth {
            background: var(--color-bg-card);
            border: 1px solid var(--color-border);
            color: var(--color-text-secondary);
            padding: 6px 12px;
            border-radius: 9999px;
            cursor: pointer;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            font-family: 'Work Sans', sans-serif;
            font-size: 13px;
            font-weight: 500;
        }

        .theme-toggle-auth:hover {
            background: var(--color-primary);
            color: #ffffff;
            border-color: var(--color-primary);
        }

        .theme-toggle-auth svg {
            width: 16px;
            height: 16px;
        }

        /* Nav link hover with underline */
        .chronicle-auth .nav-link {
            color: var(--color-text-secondary);
            transition: all 0.3s ease;
            text-decoration: none;
            font-weight: 500;
            font-size: 14px;
            position: relative;
        }

        .chronicle-auth .nav-link::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 0;
            height: 2px;
            background: var(--color-primary);
            transition: width 0.3s ease;
        }

        .chronicle-auth .nav-link:hover {
            color: var(--color-text-primary);
        }

        .chronicle-auth .nav-link:hover::after {
            width: 100%;
        }
    </style>

    <div
        class="chronicle-auth relative"
        x-data="{ showPassword: false }">

        {{-- Background Glow --}}
        <div
            class="absolute w-72 h-72 sm:w-96 sm:h-96
                   bg-purple/10 rounded-full blur-3xl
                   pointer-events-none"
            aria-hidden="true"></div>

        <div class="w-full max-w-md relative z-10">

            {{-- Logo / Intro --}}
            <div class="text-center mb-8">

                <a
                    href="{{ route('posts.index') }}"
                    class="logo-link inline-flex items-center gap-2
                           text-2xl sm:text-3xl
                           font-bold tracking-tight
                           text-[var(--color-text-primary)]
                           transition-colors duration-300 heading-font">
                    <span
                        class="logo-icon text-[var(--color-primary)] transition-all duration-300"
                        aria-hidden="true">✦</span>

                    <span class="logo-text transition-colors duration-300">chronicle</span>
                </a>

                <p class="text-sm sm:text-[15px] leading-6 text-[var(--color-text-muted)] mt-2">
                    Sign in to your account
                </p>
            </div>

            {{-- Authentication Card --}}
            <div class="neon-tracer-box shadow-2xl shadow-rust/15">

                <div
                    class="relative z-10
                           bg-[var(--color-bg-card)]
                           rounded-[22px]
                           p-6 sm:p-8
                           border border-[var(--color-border)]">

                    {{-- Session Status --}}
                    @if (session('status'))
                    <div
                        class="mb-5 rounded-lg
                                   border border-green-400/20
                                   bg-green-400/5
                                   px-4 py-3
                                   text-sm leading-5
                                   text-green-400">
                        {{ session('status') }}
                    </div>
                    @endif

                    <form
                        method="POST"
                        action="{{ route('login') }}"
                        class="space-y-5">
                        @csrf

                        {{-- Email --}}
                        <div>
                            <label
                                for="email"
                                class="block
                                       text-sm
                                       font-medium
                                       leading-5
                                       text-[var(--color-text-secondary)]
                                       mb-2">
                                Email address
                            </label>

                            <div class="relative">
                                <input
                                    id="email"
                                    type="email"
                                    name="email"
                                    value="{{ old('email') }}"
                                    required
                                    autofocus
                                    autocomplete="username"
                                    placeholder="you@example.com"
                                    class="block w-full
                                           min-h-[48px]
                                           px-4
                                           bg-[var(--color-bg-card)]
                                           border border-[var(--color-border)]
                                           rounded-xl
                                           text-[var(--color-text-primary)]
                                           placeholder:text-[var(--color-text-muted)]
                                           focus:border-[var(--color-primary)]
                                           focus:ring-1
                                           focus:ring-[var(--color-primary)]/30
                                           outline-none
                                           transition-all duration-300
                                           text-base" />
                            </div>

                            @error('email')
                            <p class="mt-2 text-sm leading-5 text-[var(--color-primary)]">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>

                        {{-- Password --}}
                        <div>
                            <label
                                for="password"
                                class="block
                                       text-sm
                                       font-medium
                                       leading-5
                                       text-[var(--color-text-secondary)]
                                       mb-2">
                                Password
                            </label>

                            <div class="relative">

                                <input
                                    id="password"
                                    :type="showPassword ? 'text' : 'password'"
                                    name="password"
                                    required
                                    autocomplete="current-password"
                                    placeholder="Enter your password"
                                    class="block w-full
                                           min-h-[48px]
                                           pl-4 pr-12
                                           bg-[var(--color-bg-card)]
                                           border border-[var(--color-border)]
                                           rounded-xl
                                           text-[var(--color-text-primary)]
                                           placeholder:text-[var(--color-text-muted)]
                                           focus:border-[var(--color-primary)]
                                           focus:ring-1
                                           focus:ring-[var(--color-primary)]/30
                                           outline-none
                                           transition-all duration-300
                                           text-base" />

                                {{-- Password Visibility --}}
                                <button
                                    type="button"
                                    @click="showPassword = !showPassword"
                                    class="absolute inset-y-0 right-0
                                           pr-3.5
                                           flex items-center
                                           text-[var(--color-text-muted)]
                                           hover:text-[var(--color-text-secondary)]
                                           transition-colors duration-200"
                                    :aria-label="showPassword
                                        ? 'Hide password'
                                        : 'Show password'">
                                    <svg
                                        x-show="!showPassword"
                                        class="w-5 h-5"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M15 12a3 3 0 11-6 0
                                               3 3 0 016 0z" />

                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M2.458 12C3.732 7.943
                                               7.523 5 12 5
                                               c4.478 0 8.268 2.943
                                               9.542 7
                                               -1.274 4.057
                                               -5.064 7
                                               -9.542 7
                                               -4.477 0
                                               -8.268-2.943
                                               -9.542-7z" />
                                    </svg>

                                    <svg
                                        x-show="showPassword"
                                        class="w-5 h-5"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24"
                                        style="display: none;">
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M13.875 18.825
                                               A10.05 10.05 0 0112 19
                                               c-4.478 0-8.268-2.943
                                               -9.543-7
                                               a9.97 9.97 0 011.563-3.029
                                               m5.858-5.908
                                               a10.023 10.023 0 013.682-.763
                                               c4.478 0 8.268 2.943
                                               9.542 7
                                               a10.025 10.025 0 01-4.132 5.411
                                               m-4.09-4.09
                                               a3 3 0 00-4.243-4.243
                                               M3 3l18 18" />
                                    </svg>
                                </button>
                            </div>

                            @error('password')
                            <p class="mt-2 text-sm leading-5 text-[var(--color-primary)]">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>

                        {{-- Remember / Forgot --}}
                        <div
                            class="flex flex-col
                                   sm:flex-row
                                   sm:items-center
                                   sm:justify-between
                                   gap-3
                                   pt-1">

                            <label
                                for="remember_me"
                                class="inline-flex items-center
                                       cursor-pointer
                                       text-sm
                                       leading-5
                                       text-[var(--color-text-muted)]">
                                <input
                                    id="remember_me"
                                    type="checkbox"
                                    name="remember"
                                    value="1"
                                    {{ old('remember') ? 'checked' : '' }}
                                    class="rounded
                                           border-[var(--color-border)]
                                           bg-[var(--color-bg-card)]
                                           text-[var(--color-primary)]
                                           focus:ring-[var(--color-primary)]
                                           focus:ring-offset-0
                                           focus:ring-offset-[var(--color-bg-card)]
                                           w-4 h-4">

                                <span class="ms-2 text-[var(--color-text-muted)]">
                                    Remember me
                                </span>
                            </label>

                            <div class="flex items-center gap-3">
                                @if (Route::has('password.request'))
                                <a
                                    href="{{ route('password.request') }}"
                                    class="text-sm
                                               leading-5
                                               font-medium
                                               text-[var(--color-primary)]
                                               hover:text-[var(--color-primary-hover)]
                                               transition-colors duration-300
                                               heading-font">
                                    Forgot password?
                                </a>
                                @endif
                            </div>

                        </div>

                        {{-- Submit --}}
                        <button
                            type="submit"
                            class="w-full
                                   min-h-[48px]
                                   px-6
                                   bg-[var(--color-primary)]
                                   text-white
                                   rounded-xl
                                   hover:bg-[var(--color-primary-hover)]
                                   focus:outline-none
                                   focus:ring-2
                                   focus:ring-[var(--color-primary)]
                                   focus:ring-offset-2
                                   focus:ring-offset-[var(--color-bg-card)]
                                   transition-all duration-300
                                   font-semibold
                                   text-base
                                   shadow-lg
                                   shadow-[var(--color-primary)]/20
                                   hover:shadow-[var(--color-primary)]/40
                                   transform hover:scale-[1.02]
                                   heading-font">
                            Sign in
                        </button>

                        {{-- Register --}}
                        <p
                            class="text-center
                                   text-sm
                                   leading-6
                                   text-[var(--color-text-muted)]
                                   pt-1">
                            Don't have an account?

                            <a
                                href="{{ route('register') }}"
                                class="text-[var(--color-primary)]
                                       hover:text-[var(--color-primary-hover)]
                                       transition-colors duration-300
                                       font-medium
                                       heading-font">
                                Create one
                            </a>
                        </p>

                    </form>

                </div>
            </div>

            {{-- Back to Home --}}
            <div class="text-center mt-6">

                <a
                    href="{{ route('posts.index') }}"
                    class="inline-flex
                           items-center
                           gap-2
                           text-sm
                           leading-5
                           text-[var(--color-text-muted)]
                           hover:text-[var(--color-primary)]
                           transition-colors duration-300
                           group">
                    <svg
                        class="w-4 h-4 transition-colors duration-300 group-hover:text-[var(--color-primary)]"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>

                    <span>Back to home</span>
                </a>

            </div>

        </div>
    </div>
</x-guest-layout>