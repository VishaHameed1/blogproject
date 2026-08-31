<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'chronicle') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <!-- Updated Fonts: Poppins for headings, Work Sans for body -->
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700;800&family=Work+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        
        @stack('styles')

        <style>
            /* Global typography & color variables */
            :root {
                --color-rust: #c45a2e;
                --color-rust-hover: rgba(196, 90, 46, 0.8);
                --color-dark: #0a0a0a;
                --color-card: #121212;
                --color-white: #ffffff;
                --color-white-75: rgba(255, 255, 255, 0.75);
                --color-white-60: rgba(255, 255, 255, 0.60);
                --color-white-50: rgba(255, 255, 255, 0.50);
                --color-white-40: rgba(255, 255, 255, 0.40);
                --color-white-30: rgba(255, 255, 255, 0.30);
                --color-white-20: rgba(255, 255, 255, 0.20);
                --color-white-05: rgba(255, 255, 255, 0.05);
            }

            /* Apply Work Sans as base font */
            body {
                font-family: 'Work Sans', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
                background-color: #0a0a0a !important;
            }

            /* Heading font family */
            h1, h2, h3, h4, h5, h6,
            .text-2xl, .text-3xl,
            .heading-font,
            .font-serif {
                font-family: 'Poppins', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif !important;
                letter-spacing: -0.02em !important;
            }

            /* Input minimum font size for mobile */
            input, select, textarea {
                font-size: 16px !important;
            }

            /* Color overrides */
            .bg-rust { background-color: #c45a2e !important; }
            .hover\:bg-rust\/80:hover { background-color: rgba(196, 90, 46, 0.8) !important; }
            .text-rust { color: #c45a2e !important; }
            .hover\:text-rust:hover { color: #c45a2e !important; }
            .border-rust { border-color: #c45a2e !important; }
            .border-rust\/20 { border-color: rgba(196, 90, 46, 0.2) !important; }
            .border-rust\/10 { border-color: rgba(196, 90, 46, 0.1) !important; }
            .shadow-rust\/20 { box-shadow: 0 4px 6px -1px rgba(196, 90, 46, 0.2), 0 2px 4px -1px rgba(196, 90, 46, 0.1) !important; }
            .shadow-rust\/40 { box-shadow: 0 10px 15px -3px rgba(196, 90, 46, 0.4), 0 4px 6px -2px rgba(196, 90, 46, 0.2) !important; }
            .focus\:ring-rust:focus { --tw-ring-color: #c45a2e !important; }
            .focus\:border-rust:focus { border-color: #c45a2e !important; }

            /* Dark backgrounds - charcoal mix */
            body, .min-h-screen, main, footer, header {
                background-color: #0a0a0a !important;
            }

            /* Card backgrounds */
            .bg-black {
                background-color: #0a0a0a !important;
            }
            .bg-black\/95 {
                background-color: rgba(10, 10, 10, 0.95) !important;
            }

            /* Text colors - muted white */
            .text-white { color: #ffffff !important; }
            .text-white\/90 { color: rgba(255, 255, 255, 0.90) !important; }
            .text-white\/75 { color: rgba(255, 255, 255, 0.75) !important; }
            .text-white\/70 { color: rgba(255, 255, 255, 0.70) !important; }
            .text-white\/60 { color: rgba(255, 255, 255, 0.60) !important; }
            .text-white\/50 { color: rgba(255, 255, 255, 0.50) !important; }
            .text-white\/40 { color: rgba(255, 255, 255, 0.40) !important; }
            .text-white\/30 { color: rgba(255, 255, 255, 0.30) !important; }
            .text-white\/20 { color: rgba(255, 255, 255, 0.20) !important; }
            .text-white\/10 { color: rgba(255, 255, 255, 0.10) !important; }

            /* Hover states */
            .hover\:text-white:hover { color: #ffffff !important; }
            .hover\:text-rust:hover { color: #c45a2e !important; }

            /* Border colors - subtle */
            .border-rust\/20 { border-color: rgba(196, 90, 46, 0.2) !important; }
            .border-rust\/10 { border-color: rgba(196, 90, 46, 0.1) !important; }
            .border-white\/5 { border-color: rgba(255, 255, 255, 0.05) !important; }
            .border-white\/10 { border-color: rgba(255, 255, 255, 0.10) !important; }

            /* Selection color */
            ::selection {
                background-color: rgba(196, 90, 46, 0.3) !important;
                color: #ffffff !important;
            }

            /* Backdrop blur */
            .backdrop-blur-sm {
                backdrop-filter: blur(4px);
            }

            /* Smooth transitions */
            .transition-all, .transition-colors, .transition-transform {
                transition-property: all;
                transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
                transition-duration: 300ms;
            }

            /* Group hover states */
            .group-hover\:scale-110:hover {
                transform: scale(1.1);
            }
            .group-hover\:text-rust:hover {
                color: #c45a2e !important;
            }
        </style>
    </head>
    <body class="font-sans antialiased bg-[#0a0a0a] text-white/75 selection:bg-rust/30 selection:text-white">
        <div class="min-h-screen flex flex-col bg-[#0a0a0a]">
            {{-- Guest Header --}}
            <header class="sticky top-0 z-50 bg-[#0a0a0a]/95 backdrop-blur-sm border-b border-rust/20">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="flex justify-between items-center h-16">
                        {{-- Logo --}}
                        <a href="{{ route('posts.index') }}" class="flex items-center gap-2 heading-font text-2xl sm:text-3xl font-bold tracking-tight text-white hover:text-rust transition-colors duration-300 group">
                            <span class="text-rust group-hover:scale-110 transition-transform duration-300">✦</span>
                            <span>chronicle</span>
                        </a>

                        {{-- Navigation --}}
                        <nav class="flex items-center gap-6 text-sm font-medium">
                            <a href="{{ route('posts.index') }}" class="relative text-white/60 hover:text-white transition-colors duration-300 py-1 group">
                                <span>Home</span>
                                <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-rust group-hover:w-full transition-all duration-300"></span>
                            </a>
                            <a href="{{ route('about') }}" class="relative text-white/60 hover:text-white transition-colors duration-300 py-1 group">
                                <span>About</span>
                                <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-rust group-hover:w-full transition-all duration-300"></span>
                            </a>
                            @if (Route::has('login'))
                                @auth
                                    <a href="{{ route('dashboard') }}" class="relative text-white/60 hover:text-white transition-colors duration-300 py-1 group">
                                        <span>Dashboard</span>
                                        <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-rust group-hover:w-full transition-all duration-300"></span>
                                    </a>
                                @else
                                    <a href="{{ route('login') }}" class="relative text-white/60 hover:text-white transition-colors duration-300 py-1 group">
                                        <span>Log in</span>
                                        <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-rust group-hover:w-full transition-all duration-300"></span>
                                    </a>
                                    @if (Route::has('register'))
                                        <a href="{{ route('register') }}" class="px-5 py-2 bg-rust text-white hover:bg-rust/80 rounded-full transition-all duration-300 shadow-lg shadow-rust/20 hover:shadow-rust/40 transform hover:scale-105 font-medium text-base">
                                            Register
                                        </a>
                                    @endif
                                @endauth
                            @endif
                        </nav>
                    </div>
                </div>
            </header>

            {{-- Page Content --}}
            <main class="flex-1 bg-[#0a0a0a]">
                {{ $slot }}
            </main>

            {{-- Footer --}}
            <footer class="bg-[#0a0a0a] text-white/60 border-t border-rust/10">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
                    <div class="flex flex-col sm:flex-row justify-between items-center text-sm text-white/30">
                        <p>&copy; {{ date('Y') }} chronicle · crafted with care</p>
                        <div class="flex items-center gap-4 mt-2 sm:mt-0">
                            <a href="{{ route('posts.index') }}" class="hover:text-rust transition-colors duration-300">Home</a>
                            <span>·</span>
                            <a href="#" class="hover:text-rust transition-colors duration-300">Privacy</a>
                            <span>·</span>
                            <a href="#" class="hover:text-rust transition-colors duration-300">Terms</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </body>
</html>