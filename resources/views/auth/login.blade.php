<x-guest-layout>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700;800&family=Work+Sans:wght@400;500;600;700&display=swap');

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
                #c45a2e 340deg,
                #d4783e 360deg
            );
            animation: border-spin 6s linear infinite;
            z-index: -1;
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
            background-color: #0a0a0a !important;
        }

        .chronicle-auth input,
        .chronicle-auth select,
        .chronicle-auth textarea {
            font-size: 16px !important;
            font-family: 'Work Sans', sans-serif !important;
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
        }

        /* Body text - Work Sans */
        .chronicle-auth p,
        .chronicle-auth label,
        .chronicle-auth span,
        .chronicle-auth input,
        .chronicle-auth button {
            font-family: 'Work Sans', sans-serif !important;
        }

        /* Update all rust color references to #c45a2e */
        .chronicle-auth .bg-\[\#c05621\]\/10 {
            background-color: rgba(196, 90, 46, 0.1) !important;
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
        .chronicle-auth .shadow-\[\#c05621\]\/20 {
            --tw-shadow-color: rgba(196, 90, 46, 0.2) !important;
        }
        .chronicle-auth .shadow-\[\#c05621\]\/15 {
            --tw-shadow-color: rgba(196, 90, 46, 0.15) !important;
        }
        .chronicle-auth .text-\[\#c05621\] {
            color: #c45a2e !important;
        }
        .chronicle-auth .focus\:ring-offset-\[\#121212\] {
            --tw-ring-offset-color: #121212 !important;
        }

        /* Background glow */
        .chronicle-auth .bg-\[\#c05621\]\/10 {
            background-color: rgba(196, 90, 46, 0.08) !important;
        }

        /* Card background */
        .chronicle-auth .bg-\[\#121212\] {
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
        .chronicle-auth .text-white\/30 {
            color: rgba(255, 255, 255, 0.30) !important;
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

        /* Button styles */
        .chronicle-auth button[type="submit"] {
            font-family: 'Poppins', sans-serif !important;
            font-weight: 600 !important;
        }

        .chronicle-auth + footer,
        .chronicle-auth ~ footer {
            display: none !important;
        }

        /* Selection color */
        ::selection {
            background-color: rgba(196, 90, 46, 0.3) !important;
            color: #ffffff !important;
        }
    </style>

    <div
        class="chronicle-auth bg-[#0a0a0a] relative"
        x-data="{ showPassword: false }"
    >

        {{-- Background Glow --}}
        <div
            class="absolute w-72 h-72 sm:w-96 sm:h-96
                   bg-rust/10 rounded-full blur-3xl
                   pointer-events-none"
            aria-hidden="true"
        ></div>

        <div class="w-full max-w-md relative z-10">

            {{-- Logo / Intro --}}
            <div class="text-center mb-8">

                <a
                    href="{{ route('posts.index') }}"
                    class="inline-flex items-center gap-2
                           text-2xl sm:text-3xl
                           font-bold tracking-tight
                           text-white
                           hover:text-rust
                           transition-colors duration-300 heading-font"
                >
                    <span
                        class="text-rust group-hover:scale-110 transition-transform duration-300"
                        aria-hidden="true"
                    >✦</span>

                    <span class="text-white hover:text-rust transition-colors duration-300">chronicle</span>
                </a>

                <p class="text-sm sm:text-[15px] leading-6 text-white/50 mt-2">
                    Sign in to your account
                </p>
            </div>

            {{-- Authentication Card --}}
            <div class="neon-tracer-box shadow-2xl shadow-rust/15">

                <div
                    class="relative z-10
                           bg-[#121212]
                           rounded-[22px]
                           p-6 sm:p-8"
                >

                    {{-- Session Status --}}
                    @if (session('status'))
                        <div
                            class="mb-5 rounded-lg
                                   border border-green-400/20
                                   bg-green-400/5
                                   px-4 py-3
                                   text-sm leading-5
                                   text-green-400"
                        >
                            {{ session('status') }}
                        </div>
                    @endif

                    <form
                        method="POST"
                        action="{{ route('login') }}"
                        class="space-y-5"
                    >
                        @csrf

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
                                    aria-hidden="true"
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

                                {{-- Password Visibility --}}
                                <button
                                    type="button"
                                    @click="showPassword = !showPassword"
                                    class="absolute inset-y-0 right-0
                                           pr-3.5
                                           flex items-center
                                           text-white/30
                                           hover:text-white/60
                                           transition-colors duration-200"
                                    :aria-label="showPassword
                                        ? 'Hide password'
                                        : 'Show password'"
                                >
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

                        {{-- Remember / Forgot --}}
                        <div
                            class="flex flex-col
                                   sm:flex-row
                                   sm:items-center
                                   sm:justify-between
                                   gap-3
                                   pt-1"
                        >

                            <label
                                for="remember_me"
                                class="inline-flex items-center
                                       cursor-pointer
                                       text-sm
                                       leading-5
                                       text-white/50"
                            >
                                <input
                                    id="remember_me"
                                    type="checkbox"
                                    name="remember"
                                    value="1"
                                    {{ old('remember') ? 'checked' : '' }}
                                    class="rounded
                                           border-white/20
                                           bg-[#0a0a0a]
                                           text-rust
                                           focus:ring-rust
                                           focus:ring-offset-0
                                           focus:ring-offset-[#121212]
                                           w-4 h-4"
                                >

                                <span class="ms-2 text-white/50">
                                    Remember me
                                </span>
                            </label>

                            @if (Route::has('password.request'))
                                <a
                                    href="{{ route('password.request') }}"
                                    class="text-sm
                                           leading-5
                                           font-medium
                                           text-rust
                                           hover:text-rust/80
                                           transition-colors duration-300
                                           heading-font"
                                >
                                    Forgot password?
                                </a>
                            @endif

                        </div>

                        {{-- Submit --}}
                        <button
                            type="submit"
                            class="w-full
                                   min-h-[48px]
                                   px-6
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
                                   hover:shadow-rust/40
                                   transform hover:scale-[1.02]
                                   heading-font"
                        >
                            Sign in
                        </button>

                        {{-- Register --}}
                        <p
                            class="text-center
                                   text-sm
                                   leading-6
                                   text-white/50
                                   pt-1"
                        >
                            Don't have an account?

                            <a
                                href="{{ route('register') }}"
                                class="text-rust
                                       hover:text-rust/80
                                       transition-colors duration-300
                                       font-medium
                                       heading-font"
                            >
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