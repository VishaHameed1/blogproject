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

        .chronicle-auth {
            font-family: 'Work Sans', 'Inter', sans-serif;
            background-color: var(--color-bg) !important;
            transition: background-color 0.3s ease;
        }

        .chronicle-auth input,
        .chronicle-auth select {
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

        .chronicle-auth select option {
            background-color: var(--color-bg-card) !important;
            color: var(--color-text-primary) !important;
        }

        @keyframes border-spin {
            to {
                transform: rotate(360deg);
            }
        }

        .neon-tracer-box {
            position: relative;
            isolation: isolate;
            overflow: hidden;
            padding: 2px;
            border-radius: 1.5rem;
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

        /* Headings use Poppins */
        .chronicle-auth .text-2xl,
        .chronicle-auth .text-3xl,
        .chronicle-auth h1,
        .chronicle-auth h2,
        .chronicle-auth h3,
        .chronicle-auth .font-heading,
        .chronicle-auth .heading-font {
            font-family: 'Poppins', 'Inter', sans-serif !important;
            font-weight: 700 !important;
            letter-spacing: -0.02em !important;
            color: var(--color-text-primary) !important;
        }

        /* Body text - Work Sans */
        .chronicle-auth p,
        .chronicle-auth label,
        .chronicle-auth span,
        .chronicle-auth input,
        .chronicle-auth select,
        .chronicle-auth button {
            font-family: 'Work Sans', sans-serif !important;
        }

        /* Logo hover - Theme aware */
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
        .chronicle-auth .bg-\[\#0a0a0a\] {
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

        .chronicle-auth .text-white\/35 {
            color: var(--color-text-muted) !important;
        }

        .chronicle-auth .text-white\/30 {
            color: var(--color-text-muted) !important;
        }

        .chronicle-auth .text-white\/25 {
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

        /* Button styles */
        .chronicle-auth button[type="submit"] {
            font-family: 'Poppins', sans-serif !important;
            font-weight: 600 !important;
        }

        /* Selection color - Theme aware */
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

        .chronicle-auth .shadow-rust\/30 {
            box-shadow: 0 6px 10px var(--color-shadow) !important;
        }

        .chronicle-auth .focus\:ring-offset-\[\#121212\] {
            --tw-ring-offset-color: var(--color-bg-card) !important;
        }

        .chronicle-auth .focus\:ring-offset-\[\#0a0a0a\] {
            --tw-ring-offset-color: var(--color-bg-card) !important;
        }

        /* Guest layout override */
        .chronicle-auth+footer,
        .chronicle-auth~footer {
            display: none !important;
        }

        /* Theme toggle button */
        .theme-toggle-auth {
            background: var(--color-bg-card);
            border: 1px solid var(--color-border);
            color: var(--color-text-secondary);
            padding: 6px 14px;
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

        /* Nav link hover */
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
        class="chronicle-auth min-h-screen
               flex items-center justify-center
               bg-[var(--color-bg)]
               px-4 py-10 sm:py-12
               relative overflow-hidden"
        x-data="{
            showPassword: false,
            showConfirmPassword: false
        }">

        {{-- Background Glow --}}
        <div
            class="absolute
                   w-64 h-64 sm:w-80 sm:h-80
                   bg-purple/10
                   rounded-full
                   blur-[90px]
                   pointer-events-none
                   top-1/2 left-1/2
                   -translate-x-1/2
                   -translate-y-1/2"
            aria-hidden="true"></div>

        <div class="w-full max-w-md mx-auto relative z-10">

            {{-- Logo --}}
            <div class="text-center mb-7 sm:mb-8">

                <a
                    href="{{ route('posts.index') }}"
                    class="logo-link inline-flex items-center gap-2
                           text-2xl sm:text-3xl
                           font-bold
                           tracking-tight
                           text-[var(--color-text-primary)]
                           transition-colors duration-300
                           heading-font">
                    <span
                        class="logo-icon text-[var(--color-primary)] transition-all duration-300"
                        aria-hidden="true">✦</span>

                    <span class="logo-text transition-colors duration-300">chronicle</span>
                </a>

                <p class="text-sm leading-6 text-[var(--color-text-muted)] mt-2">
                    Create your account
                </p>

            </div>

            {{-- Registration Card --}}
            <div class="neon-tracer-box shadow-2xl shadow-rust/15">

                <div
                    class="relative z-10
                           bg-[var(--color-bg-card)]
                           rounded-[22px]
                           p-6 sm:p-8
                           border border-[var(--color-border)]">

                    <form
                        method="POST"
                        action="{{ route('register') }}"
                        class="space-y-5">
                        @csrf

                        {{-- Full Name --}}
                        <div>

                            <label
                                for="name"
                                class="block
                                       text-sm
                                       font-medium
                                       leading-5
                                       text-[var(--color-text-secondary)]
                                       mb-2">
                                Full name
                            </label>

                            <div class="relative">

                                <div
                                    class="absolute inset-y-0 left-0
                                           pl-3.5
                                           flex items-center
                                           pointer-events-none
                                           text-[var(--color-text-muted)]">
                                    <svg
                                        class="w-5 h-5"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M16 7a4 4 0 11-8 0
                                               4 4 0 018 0z
                                               M12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                </div>

                                <input
                                    id="name"
                                    type="text"
                                    name="name"
                                    value="{{ old('name') }}"
                                    required
                                    autofocus
                                    autocomplete="name"
                                    placeholder="John Doe"
                                    class="block w-full
                                           min-h-[48px]
                                           pl-11 pr-4
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

                            @error('name')
                            <p class="mt-2 text-sm leading-5 text-[var(--color-primary)]">
                                {{ $message }}
                            </p>
                            @enderror

                        </div>


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

                                <div
                                    class="absolute inset-y-0 left-0
                                           pl-3.5
                                           flex items-center
                                           pointer-events-none
                                           text-[var(--color-text-muted)]">
                                    <svg
                                        class="w-5 h-5"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8
                                               M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5
                                               a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                    </svg>
                                </div>

                                <input
                                    id="email"
                                    type="email"
                                    name="email"
                                    value="{{ old('email') }}"
                                    required
                                    autocomplete="username"
                                    placeholder="you@example.com"
                                    class="block w-full
                                           min-h-[48px]
                                           pl-11 pr-4
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


                        {{-- Role --}}
                        <div>

                            <label
                                for="role"
                                class="block
                                       text-sm
                                       font-medium
                                       leading-5
                                       text-[var(--color-text-secondary)]
                                       mb-2">
                                Account type
                            </label>

                            <div class="relative">

                                <div
                                    class="absolute inset-y-0 left-0
                                           pl-3.5
                                           flex items-center
                                           pointer-events-none
                                           text-[var(--color-text-muted)]">
                                    <svg
                                        class="w-5 h-5"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M17 20h5v-2a3 3 0 00-5.356-1.857
                                               M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857
                                               M7 20H2v-2a3 3 0 015.356-1.857
                                               M7 20v-2c0-.656.126-1.283.356-1.857
                                               m0 0a5.002 5.002 0 019.288 0
                                               M15 7a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                </div>

                                <select
                                    id="role"
                                    name="role"
                                    required
                                    class="block w-full
                                           min-h-[48px]
                                           pl-11 pr-10
                                           bg-[var(--color-bg-card)]
                                           border border-[var(--color-border)]
                                           rounded-xl
                                           text-[var(--color-text-primary)]
                                           focus:border-[var(--color-primary)]
                                           focus:ring-1
                                           focus:ring-[var(--color-primary)]/30
                                           outline-none
                                           transition-all duration-300
                                           appearance-none
                                           text-base">

                                    <option
                                        value=""
                                        disabled
                                        {{ old('role') ? '' : 'selected' }}
                                        class="bg-[var(--color-bg-card)] text-[var(--color-text-muted)]">
                                        Select account type
                                    </option>

                                    <option
                                        value="user"
                                        {{ old('role') === 'user' ? 'selected' : '' }}
                                        class="bg-[var(--color-bg-card)] text-[var(--color-text-primary)]">
                                        Reader / User
                                    </option>

                                    <option
                                        value="author"
                                        {{ old('role') === 'author' ? 'selected' : '' }}
                                        class="bg-[var(--color-bg-card)] text-[var(--color-text-primary)]">
                                        Author / Writer
                                    </option>

                                </select>

                                <div
                                    class="absolute inset-y-0 right-0
                                           pr-3.5
                                           flex items-center
                                           pointer-events-none
                                           text-[var(--color-text-muted)]">
                                    <svg
                                        class="w-5 h-5"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M19 9l-7 7-7-7" />
                                    </svg>
                                </div>

                            </div>

                            <p class="mt-2 text-xs leading-5 text-[var(--color-text-muted)]">
                                Choose <span class="text-[var(--color-text-secondary)] font-medium">Author</span>
                                if you want to write and submit posts.
                            </p>

                            @error('role')
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

                                <div
                                    class="absolute inset-y-0 left-0
                                           pl-3.5
                                           flex items-center
                                           pointer-events-none
                                           text-[var(--color-text-muted)]">
                                    <svg
                                        class="w-5 h-5"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M12 15v2
                                               m-6 4h12a2 2 0 002-2v-6
                                               a2 2 0 00-2-2H6a2 2 0 00-2 2v6
                                               a2 2 0 002 2zm10-10V7
                                               a4 4 0 00-8 0v4h8z" />
                                    </svg>
                                </div>

                                <input
                                    id="password"
                                    :type="showPassword ? 'text' : 'password'"
                                    name="password"
                                    required
                                    autocomplete="new-password"
                                    placeholder="Minimum 8 characters"
                                    class="block w-full
                                           min-h-[48px]
                                           pl-11 pr-12
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

                                <button
                                    type="button"
                                    @click="showPassword = !showPassword"
                                    :aria-label="showPassword
                                        ? 'Hide password'
                                        : 'Show password'"
                                    class="absolute inset-y-0 right-0
                                           pr-3.5
                                           flex items-center
                                           text-[var(--color-text-muted)]
                                           hover:text-[var(--color-text-secondary)]
                                           transition-colors duration-200">

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


                        {{-- Confirm Password --}}
                        <div>

                            <label
                                for="password_confirmation"
                                class="block
                                       text-sm
                                       font-medium
                                       leading-5
                                       text-[var(--color-text-secondary)]
                                       mb-2">
                                Confirm password
                            </label>

                            <div class="relative">

                                <div
                                    class="absolute inset-y-0 left-0
                                           pl-3.5
                                           flex items-center
                                           pointer-events-none
                                           text-[var(--color-text-muted)]">
                                    <svg
                                        class="w-5 h-5"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M9 12l2 2 4-4
                                               m5.618-4.016
                                               A11.955 11.955 0 0112 2.944
                                               a11.955 11.955 0 01-8.618 3.04
                                               A12.02 12.02 0 003 9
                                               c0 5.591 3.824 10.29 9 11.622
                                               C17.176 19.29 21 14.591 21 9
                                               c0-1.042-.133-2.052-.382-3.016z" />
                                    </svg>
                                </div>

                                <input
                                    id="password_confirmation"
                                    :type="showConfirmPassword
                                        ? 'text'
                                        : 'password'"
                                    name="password_confirmation"
                                    required
                                    autocomplete="new-password"
                                    placeholder="Confirm your password"
                                    class="block w-full
                                           min-h-[48px]
                                           pl-11 pr-12
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

                                <button
                                    type="button"
                                    @click="showConfirmPassword = !showConfirmPassword"
                                    :aria-label="showConfirmPassword
                                        ? 'Hide password confirmation'
                                        : 'Show password confirmation'"
                                    class="absolute inset-y-0 right-0
                                           pr-3.5
                                           flex items-center
                                           text-[var(--color-text-muted)]
                                           hover:text-[var(--color-text-secondary)]
                                           transition-colors duration-200">

                                    <svg
                                        x-show="!showConfirmPassword"
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
                                        x-show="showConfirmPassword"
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

                            @error('password_confirmation')
                            <p class="mt-2 text-sm leading-5 text-[var(--color-primary)]">
                                {{ $message }}
                            </p>
                            @enderror

                        </div>


                        {{-- Register Button --}}
                        <button
                            type="submit"
                            class="w-full
                                   min-h-[48px]
                                   px-6
                                   mt-1
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
                                   hover:shadow-[var(--color-primary)]/30
                                   transform hover:scale-[1.02]
                                   heading-font">
                            Create account
                        </button>


                        {{-- Login Link --}}
                        <p
                            class="text-center
                                   text-sm
                                   leading-6
                                   text-[var(--color-text-muted)]
                                   pt-1">
                            Already have an account?

                            <a
                                href="{{ route('login') }}"
                                class="text-[var(--color-primary)]
                                       hover:text-[var(--color-primary-hover)]
                                       transition-colors duration-300
                                       font-medium
                                       heading-font">
                                Sign in
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