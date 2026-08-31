<x-guest-layout>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700;800&family=Work+Sans:wght@400;500;600;700&display=swap');

        .chronicle-auth {
            font-family: 'Work Sans', 'Inter', sans-serif;
            background-color: #0a0a0a !important;
        }

        .chronicle-auth input,
        .chronicle-auth select {
            font-size: 16px !important;
            font-family: 'Work Sans', sans-serif !important;
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
            background: conic-gradient(
                transparent 0deg,
                transparent 280deg,
                #c45a2e 340deg,
                #d4783e 360deg
            );
            animation: border-spin 6s linear infinite;
            z-index: -1;
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

        /* Update all rust color references to #c45a2e */
        .chronicle-auth .bg-\[\#c05621\]\/10 {
            background-color: rgba(196, 90, 46, 0.08) !important;
        }
        .chronicle-auth .hover\:text-\[\#c05621\] {
            color: #c45a2e !important;
        }
        .chronicle-auth .focus\:border-\[\#c05621\] {
            border-color: #c45a2e !important;
        }
        .chronicle-auth .focus\:ring-\[\#c05621\] {
            --tw-ring-color: #c45a2e !important;
        }
        .chronicle-auth .bg-\[\#c05621\] {
            background-color: #c45a2e !important;
        }
        .chronicle-auth .hover\:bg-\[\#a0461a\] {
            background-color: rgba(196, 90, 46, 0.8) !important;
        }
        .chronicle-auth .shadow-\[\#c05621\]\/15 {
            --tw-shadow-color: rgba(196, 90, 46, 0.15) !important;
        }
        .chronicle-auth .shadow-\[\#c05621\]\/20 {
            --tw-shadow-color: rgba(196, 90, 46, 0.2) !important;
        }
        .chronicle-auth .shadow-\[\#c05621\]\/30 {
            --tw-shadow-color: rgba(196, 90, 46, 0.3) !important;
        }
        .chronicle-auth .text-\[\#c05621\] {
            color: #c45a2e !important;
        }
        .chronicle-auth .focus\:ring-offset-\[\#0a0a0a\] {
            --tw-ring-offset-color: #0a0a0a !important;
        }

        /* Card background */
        .chronicle-auth .bg-\[\#0a0a0a\] {
            background-color: #121212 !important;
        }

        /* Text colors - muted white variants */
        .chronicle-auth .text-white\/75 {
            color: rgba(255, 255, 255, 0.75) !important;
        }
        .chronicle-auth .text-white\/50 {
            color: rgba(255, 255, 255, 0.50) !important;
        }
        .chronicle-auth .text-white\/40 {
            color: rgba(255, 255, 255, 0.40) !important;
        }
        .chronicle-auth .text-white\/35 {
            color: rgba(255, 255, 255, 0.35) !important;
        }
        .chronicle-auth .text-white\/30 {
            color: rgba(255, 255, 255, 0.30) !important;
        }
        .chronicle-auth .text-white\/25 {
            color: rgba(255, 255, 255, 0.25) !important;
        }
        .chronicle-auth .text-white\/20 {
            color: rgba(255, 255, 255, 0.20) !important;
        }

        /* Input styles */
        .chronicle-auth input,
        .chronicle-auth select {
            background-color: rgba(10, 10, 10, 0.8) !important;
            border-color: rgba(255, 255, 255, 0.06) !important;
            color: #ffffff !important;
        }

        .chronicle-auth input:focus,
        .chronicle-auth select:focus {
            border-color: #c45a2e !important;
            box-shadow: 0 0 0 3px rgba(196, 90, 46, 0.15) !important;
        }

        .chronicle-auth input::placeholder {
            color: rgba(255, 255, 255, 0.20) !important;
        }

        /* Select options */
        .chronicle-auth select option {
            background-color: #121212 !important;
            color: #ffffff !important;
        }

        /* Button styles */
        .chronicle-auth button[type="submit"] {
            font-family: 'Poppins', sans-serif !important;
            font-weight: 600 !important;
        }

        /* Selection color */
        ::selection {
            background-color: rgba(196, 90, 46, 0.3) !important;
            color: #ffffff !important;
        }

        /* Guest layout override */
        .chronicle-auth + footer,
        .chronicle-auth ~ footer {
            display: none !important;
        }
    </style>

    <div
        class="chronicle-auth min-h-screen
               flex items-center justify-center
               bg-[#0a0a0a]
               px-4 py-10 sm:py-12
               relative overflow-hidden"
        x-data="{
            showPassword: false,
            showConfirmPassword: false
        }"
    >

        {{-- Background Glow --}}
        <div
            class="absolute
                   w-64 h-64 sm:w-80 sm:h-80
                   bg-rust/10
                   rounded-full
                   blur-[90px]
                   pointer-events-none
                   top-1/2 left-1/2
                   -translate-x-1/2
                   -translate-y-1/2"
            aria-hidden="true"
        ></div>

        <div class="w-full max-w-md mx-auto relative z-10">

            {{-- Logo --}}
            <div class="text-center mb-7 sm:mb-8">

                <a
                    href="{{ route('posts.index') }}"
                    class="inline-flex items-center gap-2
                           text-2xl sm:text-3xl
                           font-bold
                           tracking-tight
                           text-white
                           hover:text-rust
                           transition-colors duration-300
                           heading-font"
                >
                    <span
                        class="text-rust group-hover:scale-110 transition-transform duration-300"
                        aria-hidden="true"
                    >✦</span>

                    chronicle
                </a>

                <p class="text-sm leading-6 text-white/50 mt-2">
                    Create your account
                </p>

            </div>

            {{-- Registration Card --}}
            <div class="neon-tracer-box shadow-2xl shadow-rust/15">

                <div
                    class="relative z-10
                           bg-[#121212]
                           rounded-[22px]
                           p-6 sm:p-8
                           border border-white/5"
                >

                    <form
                        method="POST"
                        action="{{ route('register') }}"
                        class="space-y-5"
                    >
                        @csrf

                        {{-- Full Name --}}
                        <div>

                            <label
                                for="name"
                                class="block
                                       text-sm
                                       font-medium
                                       leading-5
                                       text-white/75
                                       mb-2"
                            >
                                Full name
                            </label>

                            <div class="relative">

                                <div
                                    class="absolute inset-y-0 left-0
                                           pl-3.5
                                           flex items-center
                                           pointer-events-none
                                           text-white/30"
                                >
                                    <svg
                                        class="w-5 h-5"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M16 7a4 4 0 11-8 0
                                               4 4 0 018 0z
                                               M12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"
                                        />
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
                                           bg-[#0a0a0a]/80
                                           border border-white/5
                                           rounded-xl
                                           text-white
                                           placeholder:text-white/20
                                           focus:border-rust
                                           focus:ring-1
                                           focus:ring-rust/30
                                           outline-none
                                           transition-all duration-300
                                           text-base"
                                />

                            </div>

                            @error('name')
                                <p class="mt-2 text-sm leading-5 text-rust">
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
                                       text-white/75
                                       mb-2"
                            >
                                Email address
                            </label>

                            <div class="relative">

                                <div
                                    class="absolute inset-y-0 left-0
                                           pl-3.5
                                           flex items-center
                                           pointer-events-none
                                           text-white/30"
                                >
                                    <svg
                                        class="w-5 h-5"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8
                                               M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5
                                               a2 2 0 00-2 2v10a2 2 0 002 2z"
                                        />
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
                                           bg-[#0a0a0a]/80
                                           border border-white/5
                                           rounded-xl
                                           text-white
                                           placeholder:text-white/20
                                           focus:border-rust
                                           focus:ring-1
                                           focus:ring-rust/30
                                           outline-none
                                           transition-all duration-300
                                           text-base"
                                />

                            </div>

                            @error('email')
                                <p class="mt-2 text-sm leading-5 text-rust">
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
                                       text-white/75
                                       mb-2"
                            >
                                Account type
                            </label>

                            <div class="relative">

                                {{-- User Icon --}}
                                <div
                                    class="absolute inset-y-0 left-0
                                           pl-3.5
                                           flex items-center
                                           pointer-events-none
                                           text-white/30"
                                >
                                    <svg
                                        class="w-5 h-5"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M17 20h5v-2a3 3 0 00-5.356-1.857
                                               M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857
                                               M7 20H2v-2a3 3 0 015.356-1.857
                                               M7 20v-2c0-.656.126-1.283.356-1.857
                                               m0 0a5.002 5.002 0 019.288 0
                                               M15 7a3 3 0 11-6 0 3 3 0 016 0z"
                                        />
                                    </svg>
                                </div>

                                <select
                                    id="role"
                                    name="role"
                                    required
                                    class="block w-full
                                           min-h-[48px]
                                           pl-11 pr-10
                                           bg-[#0a0a0a]/80
                                           border border-white/5
                                           rounded-xl
                                           text-white
                                           focus:border-rust
                                           focus:ring-1
                                           focus:ring-rust/30
                                           outline-none
                                           transition-all duration-300
                                           appearance-none
                                           text-base"
                                >

                                    <option
                                        value=""
                                        disabled
                                        {{ old('role') ? '' : 'selected' }}
                                        class="bg-[#121212] text-white/50"
                                    >
                                        Select account type
                                    </option>

                                    <option
                                        value="user"
                                        {{ old('role') === 'user' ? 'selected' : '' }}
                                        class="bg-[#121212] text-white"
                                    >
                                        Reader / User
                                    </option>

                                    <option
                                        value="author"
                                        {{ old('role') === 'author' ? 'selected' : '' }}
                                        class="bg-[#121212] text-white"
                                    >
                                        Author / Writer
                                    </option>

                                </select>

                                {{-- Dropdown Arrow --}}
                                <div
                                    class="absolute inset-y-0 right-0
                                           pr-3.5
                                           flex items-center
                                           pointer-events-none
                                           text-white/30"
                                >
                                    <svg
                                        class="w-5 h-5"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M19 9l-7 7-7-7"
                                        />
                                    </svg>
                                </div>

                            </div>

                            <p class="mt-2 text-xs leading-5 text-white/35">
                                Choose <span class="text-white/60 font-medium">Author</span>
                                if you want to write and submit posts.
                            </p>

                            @error('role')
                                <p class="mt-2 text-sm leading-5 text-rust">
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
                                       text-white/75
                                       mb-2"
                            >
                                Password
                            </label>

                            <div class="relative">

                                <div
                                    class="absolute inset-y-0 left-0
                                           pl-3.5
                                           flex items-center
                                           pointer-events-none
                                           text-white/30"
                                >
                                    <svg
                                        class="w-5 h-5"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M12 15v2
                                               m-6 4h12a2 2 0 002-2v-6
                                               a2 2 0 00-2-2H6a2 2 0 00-2 2v6
                                               a2 2 0 002 2zm10-10V7
                                               a4 4 0 00-8 0v4h8z"
                                        />
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
                                           bg-[#0a0a0a]/80
                                           border border-white/5
                                           rounded-xl
                                           text-white
                                           placeholder:text-white/20
                                           focus:border-rust
                                           focus:ring-1
                                           focus:ring-rust/30
                                           outline-none
                                           transition-all duration-300
                                           text-base"
                                />

                                <button
                                    type="button"
                                    @click="showPassword = !showPassword"
                                    :aria-label="showPassword
                                        ? 'Hide password'
                                        : 'Show password'"
                                    class="absolute inset-y-0 right-0
                                           pr-3.5
                                           flex items-center
                                           text-white/30
                                           hover:text-white/60
                                           transition-colors duration-200"
                                >

                                    {{-- Show --}}
                                    <svg
                                        x-show="!showPassword"
                                        class="w-5 h-5"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M15 12a3 3 0 11-6 0
                                               3 3 0 016 0z"
                                        />

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
                                               -9.542-7z"
                                        />
                                    </svg>

                                    {{-- Hide --}}
                                    <svg
                                        x-show="showPassword"
                                        class="w-5 h-5"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24"
                                        style="display: none;"
                                    >
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
                                               M3 3l18 18"
                                        />
                                    </svg>

                                </button>

                            </div>

                            @error('password')
                                <p class="mt-2 text-sm leading-5 text-rust">
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
                                       text-white/75
                                       mb-2"
                            >
                                Confirm password
                            </label>

                            <div class="relative">

                                <div
                                    class="absolute inset-y-0 left-0
                                           pl-3.5
                                           flex items-center
                                           pointer-events-none
                                           text-white/30"
                                >
                                    <svg
                                        class="w-5 h-5"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24"
                                    >
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
                                               c0-1.042-.133-2.052-.382-3.016z"
                                        />
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
                                           bg-[#0a0a0a]/80
                                           border border-white/5
                                           rounded-xl
                                           text-white
                                           placeholder:text-white/20
                                           focus:border-rust
                                           focus:ring-1
                                           focus:ring-rust/30
                                           outline-none
                                           transition-all duration-300
                                           text-base"
                                />

                                <button
                                    type="button"
                                    @click="showConfirmPassword = !showConfirmPassword"
                                    :aria-label="showConfirmPassword
                                        ? 'Hide password confirmation'
                                        : 'Show password confirmation'"
                                    class="absolute inset-y-0 right-0
                                           pr-3.5
                                           flex items-center
                                           text-white/30
                                           hover:text-white/60
                                           transition-colors duration-200"
                                >

                                    <svg
                                        x-show="!showConfirmPassword"
                                        class="w-5 h-5"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M15 12a3 3 0 11-6 0
                                               3 3 0 016 0z"
                                        />

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
                                               -9.542-7z"
                                        />
                                    </svg>

                                    <svg
                                        x-show="showConfirmPassword"
                                        class="w-5 h-5"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24"
                                        style="display: none;"
                                    >
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
                                               M3 3l18 18"
                                        />
                                    </svg>

                                </button>

                            </div>

                            @error('password_confirmation')
                                <p class="mt-2 text-sm leading-5 text-rust">
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
                                   bg-rust
                                   text-white
                                   rounded-xl
                                   hover:bg-rust/80
                                   focus:outline-none
                                   focus:ring-2
                                   focus:ring-rust
                                   focus:ring-offset-2
                                   focus:ring-offset-[#121212]
                                   transition-all duration-300
                                   font-semibold
                                   text-base
                                   shadow-lg
                                   shadow-rust/20
                                   hover:shadow-rust/30
                                   transform hover:scale-[1.02]
                                   heading-font"
                        >
                            Create account
                        </button>


                        {{-- Login Link --}}
                        <p
                            class="text-center
                                   text-sm
                                   leading-6
                                   text-white/50
                                   pt-1"
                        >
                            Already have an account?

                            <a
                                href="{{ route('login') }}"
                                class="text-rust
                                       hover:text-rust/80
                                       transition-colors duration-300
                                       font-medium
                                       heading-font"
                            >
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
                           text-white/30
                           hover:text-white/60
                           transition-colors duration-300"
                >
                    <svg
                        class="w-4 h-4"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M10 19l-7-7m0 0l7-7m-7 7h18"
                        />
                    </svg>

                    Back to home
                </a>

            </div>

        </div>
    </div>

</x-guest-layout>