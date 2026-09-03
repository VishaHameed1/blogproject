<!DOCTYPE html>
<html lang="en" data-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'chronicle · thoughtful writing')</title>

    <meta name="theme-color" content="#F8F9FA" id="theme-color-meta">
    <meta name="color-scheme" content="light dark">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    {{-- Typography: Poppins headings + Work Sans body --}}
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&family=Work+Sans:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- Keep this only if the project still uses Tailwind CDN classes in Blade files --}}
    <script src="https://cdn.tailwindcss.com"></script>

    <script>
        tailwind.config = {
            darkMode: 'class',

            theme: {
                extend: {
                    fontFamily: {
                        sans: [
                            'Work Sans',
                            'ui-sans-serif',
                            'system-ui',
                            'sans-serif'
                        ],

                        heading: [
                            'Poppins',
                            'ui-sans-serif',
                            'system-ui',
                            'sans-serif'
                        ]
                    },

                    colors: {
                        purple: {
                            50: '#F5F3FF',
                            100: '#EDE9FE',
                            200: '#DDD6FE',
                            300: '#C4B5FD',
                            400: '#A78BFA',
                            500: '#7C3AED',
                            600: '#6D28D9',
                            700: '#5B21B6',
                            800: '#4C1D95',
                            900: '#3B0764',
                            950: '#2E1065',
                        },

                        blue: {
                            50: '#EFF6FF',
                            100: '#DBEAFE',
                            200: '#BFDBFE',
                            300: '#93C5FD',
                            400: '#60A5FA',
                            500: '#3B82F6',
                            600: '#2563EB',
                            700: '#1D4ED8',
                            800: '#1E40AF',
                            900: '#1E3A8A',
                            950: '#172554',
                        },

                        /* Legacy aliases */
                        rust: {
                            50: '#F5F3FF',
                            100: '#EDE9FE',
                            200: '#DDD6FE',
                            300: '#C4B5FD',
                            400: '#A78BFA',
                            500: '#7C3AED',
                            600: '#6D28D9',
                            700: '#5B21B6',
                            800: '#4C1D95',
                            900: '#3B0764',
                            950: '#2E1065',
                        },

                        charcoal: {
                            800: '#171717',
                            900: '#111111',
                            950: '#0A0A0A',
                        }
                    },

                    keyframes: {
                        'color-pulse': {
                            '0%, 100%': {
                                color: '#7C3AED'
                            },
                            '50%': {
                                color: '#6D28D9'
                            }
                        },

                        glow: {
                            '0%, 100%': {
                                opacity: '0.35'
                            },
                            '50%': {
                                opacity: '0.75'
                            }
                        }
                    },

                    animation: {
                        'color-pulse': 'color-pulse 4s infinite ease-in-out',
                        'glow': 'glow 3s infinite ease-in-out',
                    }
                }
            }
        }
    </script>

    <script src="https://unpkg.com/htmx.org@1.9.12"></script>

    {{-- ============================================================
         GLOBAL DESIGN SYSTEM
         ============================================================ --}}
    <style>
        /* ============================================================
           THEME VARIABLES
           ============================================================ */

        :root {
            /* Light Mode */
            --color-bg: #F8F9FA;
            --color-bg-card: #FFFFFF;
            --color-bg-elevated: #FFFFFF;

            --color-text-primary: #1A1A2E;
            --color-text-secondary: #4B5563;
            --color-text-muted: #9CA3AF;
            --color-text-light: #6B7280;

            --color-border: #E5E7EB;

            --color-primary: #7C3AED;
            --color-primary-hover: #6D28D9;
            --color-primary-soft: rgba(124, 58, 237, 0.10);
            --color-primary-softer: rgba(124, 58, 237, 0.05);

            --color-secondary: #3B82F6;
            --color-secondary-hover: #2563EB;
            --color-secondary-soft: rgba(59, 130, 246, 0.10);

            --color-success: #059669;
            --color-success-light: rgba(5, 150, 105, 0.10);
            --color-success-dark: #34D399;

            --color-shadow: rgba(17, 24, 39, 0.08);
            --color-shadow-hover: rgba(17, 24, 39, 0.14);

            --header-bg: rgba(255, 255, 255, 0.92);
        }

        [data-theme="dark"] {
            /* Dark Mode */
            --color-bg: #0A0A0A;
            --color-bg-card: #121212;
            --color-bg-elevated: #1B1B1B;

            --color-text-primary: #FFFFFF;
            --color-text-secondary: #A0A0A0;
            --color-text-muted: #6B7280;
            --color-text-light: #8B8B8B;

            --color-border: rgba(255, 255, 255, 0.05);

            --color-primary: #3B82F6;
            --color-primary-hover: #60A5FA;
            --color-primary-soft: rgba(59, 130, 246, 0.14);
            --color-primary-softer: rgba(59, 130, 246, 0.07);

            --color-secondary: #60A5FA;
            --color-secondary-hover: #93C5FD;
            --color-secondary-soft: rgba(96, 165, 250, 0.14);

            --color-success: #34D399;
            --color-success-light: rgba(52, 211, 153, 0.15);
            --color-success-dark: #34D399;

            --color-shadow: rgba(0, 0, 0, 0.30);
            --color-shadow-hover: rgba(0, 0, 0, 0.50);

            --header-bg: rgba(18, 18, 18, 0.94);
        }

        /* ============================================================
           BASE
           ============================================================ */

        html {
            background: var(--color-bg);
            scroll-behavior: smooth;
        }

        body {
            margin: 0;
            background: var(--color-bg);
            color: var(--color-text-secondary);
            font-family:
                'Work Sans',
                ui-sans-serif,
                system-ui,
                -apple-system,
                BlinkMacSystemFont,
                'Segoe UI',
                sans-serif;
            font-size: 16px;
            line-height: 1.6;
            -webkit-font-smoothing: antialiased;
            text-rendering: optimizeLegibility;
            transition:
                background-color 0.25s ease,
                color 0.25s ease;
        }

        *,
        *::before,
        *::after {
            box-sizing: border-box;
        }

        /* ============================================================
           TYPOGRAPHY
           ============================================================ */

        h1,
        h2,
        h3,
        h4,
        h5,
        h6,
        .heading-font {
            font-family:
                'Poppins',
                ui-sans-serif,
                system-ui,
                sans-serif !important;

            color: var(--color-text-primary);
            letter-spacing: -0.025em;
        }

        h1 {
            line-height: 1.15;
        }

        h2 {
            line-height: 1.2;
        }

        h3,
        h4 {
            line-height: 1.3;
        }

        p {
            color: var(--color-text-secondary);
        }

        a {
            text-decoration: none;
        }

        button,
        input,
        select,
        textarea {
            font-family: inherit;
        }

        /* ============================================================
           INPUTS
           ============================================================ */

        input,
        select,
        textarea {
            font-size: 16px !important;
            background-color: var(--color-bg-card) !important;
            color: var(--color-text-primary) !important;
            border-color: var(--color-border) !important;
        }

        input::placeholder,
        textarea::placeholder {
            color: var(--color-text-muted) !important;
            opacity: 1;
        }

        input:focus,
        select:focus,
        textarea:focus {
            outline: none !important;
            border-color: var(--color-primary) !important;
            box-shadow:
                0 0 0 3px var(--color-primary-soft) !important;
        }

        /* ============================================================
           SELECTION
           ============================================================ */

        ::selection {
            background: var(--color-primary);
            color: #FFFFFF;
        }

        /* ============================================================
           SCROLLBAR
           ============================================================ */

        ::-webkit-scrollbar {
            width: 7px;
            height: 7px;
        }

        ::-webkit-scrollbar-track {
            background: var(--color-bg);
        }

        ::-webkit-scrollbar-thumb {
            background: var(--color-border);
            border-radius: 999px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: var(--color-primary);
        }

        /* ============================================================
           GLOBAL BACKGROUNDS
           ============================================================ */

        body,
        .min-h-screen,
        main,
        footer {
            background-color: var(--color-bg) !important;
        }

        header {
            background-color: var(--header-bg) !important;
        }

        /* Legacy dark classes */
        .bg-charcoal-950,
        .bg-charcoal-900,
        .bg-charcoal-800,
        .bg-\[\#0f0e0d\],
        .bg-\[\#161513\],
        .bg-\[\#141311\] {
            background-color: var(--color-bg) !important;
        }

        .bg-stone-800,
        .bg-zinc-800 {
            background-color: var(--color-bg-card) !important;
        }

        /* ============================================================
           CARD BACKGROUNDS
           ============================================================ */

        .bg-\[\#121212\],
        .bg-\[\#1c1a17\],
        .bg-rust-950\/40,
        .bg-rust-950\/60,
        .bg-rust-950\/70 {
            background-color: var(--color-bg-card) !important;
        }

        .bg-stone-800\/40,
        .bg-stone-800\/70,
        .bg-white\/5,
        .bg-zinc-800\/60,
        .bg-zinc-800\/90 {
            background-color: var(--color-bg-card) !important;
        }

        /* ============================================================
           TEXT COLORS - ENHANCED CONTRAST
           ============================================================ */

        .text-white,
        .text-stone-100 {
            color: var(--color-text-primary) !important;
        }

        .text-stone-200,
        .text-stone-300,
        .text-gray-200,
        .text-gray-300 {
            color: var(--color-text-secondary) !important;
        }

        .text-stone-400,
        .text-gray-400,
        .text-zinc-400,
        .text-stone-500,
        .text-gray-500,
        .text-zinc-500 {
            color: var(--color-text-light) !important;
        }

        .text-gray-600,
        .text-stone-600,
        .text-zinc-600 {
            color: var(--color-text-secondary) !important;
        }

        .text-gray-700,
        .text-stone-700,
        .text-zinc-700 {
            color: var(--color-text-primary) !important;
        }

        .hover\:text-white:hover,
        .hover\:text-stone-100:hover {
            color: var(--color-text-primary) !important;
        }

        /* ============================================================
           PURPLE → PRIMARY (Light Mode)
           BLUE → PRIMARY (Dark Mode)
           ============================================================ */

        .text-purple-300,
        .text-purple-400,
        .text-purple-500,
        .text-purple {
            color: var(--color-primary) !important;
        }

        .hover\:text-purple-300:hover,
        .hover\:text-purple-400:hover,
        .hover\:text-purple:hover {
            color: var(--color-primary-hover) !important;
        }

        .bg-purple-600,
        .bg-purple {
            background-color: var(--color-primary) !important;
            color: #FFFFFF !important;
        }

        .hover\:bg-purple-500:hover,
        .hover\:bg-purple-700:hover {
            background-color: var(--color-primary-hover) !important;
        }

        .bg-purple-600\/5,
        .bg-purple\/5 {
            background-color: var(--color-primary-softer) !important;
        }

        .bg-purple-600\/20,
        .bg-purple\/20 {
            background-color: var(--color-primary-soft) !important;
        }

        .bg-purple\/10 {
            background-color: var(--color-primary-soft) !important;
        }

        .hover\:bg-purple\/10:hover {
            background-color: var(--color-primary-soft) !important;
        }

        .hover\:bg-purple\/20:hover {
            background-color: var(--color-primary-soft) !important;
        }

        .border-purple-800,
        .border-purple-800\/40 {
            border-color: var(--color-primary) !important;
        }

        .border-purple-950\/40,
        .border-purple-950\/50,
        .border-purple-950\/80,
        .border-purple\/10,
        .border-purple\/20,
        .border-purple\/40 {
            border-color: var(--color-border) !important;
        }

        .hover\:border-purple-800:hover,
        .hover\:border-purple:hover,
        .hover\:border-purple\/40:hover {
            border-color: var(--color-primary) !important;
        }

        /* ============================================================
           RUST LEGACY → PRIMARY
           ============================================================ */

        .text-rust-300,
        .text-rust-400,
        .text-rust-500,
        .text-rust {
            color: var(--color-primary) !important;
        }

        .hover\:text-rust-300:hover,
        .hover\:text-rust-400:hover,
        .hover\:text-rust:hover {
            color: var(--color-primary-hover) !important;
        }

        .bg-rust-600,
        .bg-rust {
            background-color: var(--color-primary) !important;
            color: #FFFFFF !important;
        }

        .hover\:bg-rust-500:hover,
        .hover\:bg-rust-700:hover {
            background-color: var(--color-primary-hover) !important;
        }

        .bg-rust-600\/5,
        .bg-rust\/5 {
            background-color: var(--color-primary-softer) !important;
        }

        .bg-rust-600\/20,
        .bg-rust\/20,
        .bg-rust\/10 {
            background-color: var(--color-primary-soft) !important;
        }

        .border-rust-800,
        .border-rust-800\/40 {
            border-color: var(--color-primary) !important;
        }

        .border-rust-950\/40,
        .border-rust-950\/50,
        .border-rust-950\/80,
        .border-rust\/10,
        .border-rust\/20,
        .border-rust\/40 {
            border-color: var(--color-border) !important;
        }

        .hover\:border-rust-800:hover,
        .hover\:border-rust:hover,
        .hover\:border-rust\/40:hover {
            border-color: var(--color-primary) !important;
        }

        /* ============================================================
           AMBER LEGACY → PRIMARY
           ============================================================ */

        .text-amber-400,
        .text-amber-500 {
            color: var(--color-primary) !important;
        }

        .hover\:text-amber-400:hover {
            color: var(--color-primary-hover) !important;
        }

        .bg-amber-500,
        .bg-amber-600 {
            background-color: var(--color-primary) !important;
            color: #FFFFFF !important;
        }

        .hover\:bg-amber-500:hover,
        .hover\:bg-amber-600:hover {
            background-color: var(--color-primary-hover) !important;
        }

        /* ============================================================
           BORDERS
           ============================================================ */

        .border-stone-800,
        .border-zinc-800,
        .border-stone-800\/80,
        .border-zinc-800\/80,
        .border-stone-700\/80,
        .border-zinc-700\/80,
        .border-stone-700,
        .border-zinc-700,
        .border-white\/5 {
            border-color: var(--color-border) !important;
        }

        .hover\:border-stone-700:hover,
        .group-hover\:border-stone-700:hover {
            border-color: var(--color-primary) !important;
        }

        /* ============================================================
           LINKS / INTERACTION
           ============================================================ */

        .transition-all,
        .transition-colors,
        .transition-transform {
            transition-timing-function:
                cubic-bezier(0.4, 0, 0.2, 1);
        }

        /* ============================================================
           POST LIST
           ============================================================ */

        .post-item {
            transition:
                padding-left 0.2s ease,
                border-color 0.2s ease,
                background-color 0.2s ease;

            border-bottom: 1px solid var(--color-border);
            padding: 1.5rem 0;
        }

        .post-item:last-child {
            border-bottom: none;
        }

        .post-item:hover {
            padding-left: 0.75rem;
            border-color: var(--color-primary);
        }

        .post-item:hover .post-title {
            color: var(--color-primary);
        }

        .post-item:hover .post-arrow {
            opacity: 1;
            transform: translateX(4px);
        }

        .post-arrow {
            opacity: 0;
            transition:
                opacity 0.2s ease,
                transform 0.2s ease;
        }

        /* ============================================================
           LOGO
           ============================================================ */

        .logo-link {
            text-decoration: none;
            transition:
                color 0.25s ease,
                transform 0.25s ease;
        }

        .logo-link:hover .logo-text {
            color: var(--color-primary) !important;
        }

        .logo-link:hover .logo-icon {
            transform: scale(1.1) rotate(10deg);
        }

        .logo-icon {
            color: var(--color-primary) !important;
        }

        .logo-text {
            font-family:
                'Poppins',
                ui-sans-serif,
                system-ui,
                sans-serif !important;

            color: var(--color-text-primary);
        }

        /* ============================================================
           THEME TOGGLE
           ============================================================ */

        .theme-toggle {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.4rem;

            min-height: 36px;
            padding: 6px 12px;

            background: var(--color-bg-card);
            border: 1px solid var(--color-border);
            color: var(--color-text-secondary);

            border-radius: 9999px;
            cursor: pointer;

            font-family: 'Work Sans', sans-serif;
            font-size: 13px;
            font-weight: 500;

            transition:
                background-color 0.2s ease,
                border-color 0.2s ease,
                color 0.2s ease,
                transform 0.2s ease;
        }

        .theme-toggle:hover {
            background: var(--color-primary);
            border-color: var(--color-primary);
            color: #FFFFFF;
            transform: translateY(-1px);
        }

        .theme-toggle svg {
            width: 16px;
            height: 16px;
            flex-shrink: 0;
        }

        /* ============================================================
           SEARCH
           ============================================================ */

        .search-container {
            z-index: 80;
        }

        #nav-search-results {
            background: var(--color-bg-card);
            border-color: var(--color-border);
            color: var(--color-text-primary);
        }

        #nav-search-results:empty {
            display: none;
        }

        /* ============================================================
           MOBILE MENU
           ============================================================ */

        #mobile-menu {
            background: var(--color-bg-card);
            border-color: var(--color-border);
            box-shadow: 0 20px 50px var(--color-shadow);
        }

        /* ============================================================
           CARDS
           ============================================================ */

        .prompt-card,
        .post-card,
        .content-card {
            background: var(--color-bg-card);
            border-color: var(--color-border);
            box-shadow: 0 8px 30px var(--color-shadow);
            transition:
                transform 0.25s ease,
                box-shadow 0.25s ease,
                border-color 0.25s ease;
        }

        .prompt-card:hover,
        .post-card:hover,
        .content-card:hover {
            border-color: var(--color-primary);
            box-shadow: 0 14px 40px var(--color-shadow-hover);
            transform: translateY(-2px);
        }

        /* ============================================================
           BADGES / TAGS
           ============================================================ */

        .category-tag,
        .prompt-tag,
        .model-tag {
            display: inline-flex;
            align-items: center;

            border-radius: 9999px;
            font-size: 12px;
            font-weight: 600;
            line-height: 1;

            padding: 0.45rem 0.7rem;

            background: var(--color-primary-soft);
            color: var(--color-primary);
            border: 1px solid rgba(124, 58, 237, 0.16);
        }

        /* ============================================================
           TABLE STYLES - ENHANCED CONTRAST
           ============================================================ */

        .admin-table tbody td {
            color: var(--color-text-secondary);
        }

        .admin-table tbody tr:hover td {
            color: var(--color-text-primary);
        }

        /* Category badge in table */
        .category-badge {
            color: var(--color-primary);
            background: var(--color-primary-soft);
        }

        /* Status badges - Theme aware with enhanced contrast */
        .status-badge {
            display: inline-flex;
            align-items: center;
            gap: 0.375rem;
            padding: 0.25rem 0.75rem;
            border-radius: 9999px;
            font-size: 0.65rem;
            font-weight: 600;
            font-family: 'Poppins', sans-serif;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            border: 1px solid transparent;
        }

        .status-badge-published {
            color: #059669;
            background: rgba(5, 150, 105, 0.10);
            border-color: rgba(5, 150, 105, 0.20);
        }

        [data-theme="dark"] .status-badge-published {
            color: #34D399;
            background: rgba(52, 211, 153, 0.15);
            border-color: rgba(52, 211, 153, 0.25);
        }

        .status-badge-pending {
            color: #7C3AED;
            background: rgba(124, 58, 237, 0.10);
            border-color: rgba(124, 58, 237, 0.20);
        }

        [data-theme="dark"] .status-badge-pending {
            color: #3B82F6;
            background: rgba(59, 130, 246, 0.15);
            border-color: rgba(59, 130, 246, 0.25);
        }

        .status-badge-draft {
            color: #6B7280;
            background: rgba(255, 255, 255, 0.05);
            border-color: #E5E7EB;
        }

        [data-theme="dark"] .status-badge-draft {
            color: #8B8B8B;
            background: rgba(255, 255, 255, 0.05);
            border-color: rgba(255, 255, 255, 0.10);
        }

        .status-badge-scheduled {
            color: #D97706;
            background: rgba(217, 119, 6, 0.10);
            border-color: rgba(217, 119, 6, 0.20);
        }

        [data-theme="dark"] .status-badge-scheduled {
            color: #FBBF24;
            background: rgba(251, 191, 36, 0.15);
            border-color: rgba(251, 191, 36, 0.25);
        }

        /* Status dot */
        .status-dot {
            width: 6px;
            height: 6px;
            border-radius: 50%;
            flex-shrink: 0;
        }

        .status-dot-published {
            background: #059669;
        }

        [data-theme="dark"] .status-dot-published {
            background: #34D399;
        }

        .status-dot-pending {
            background: #7C3AED;
        }

        [data-theme="dark"] .status-dot-pending {
            background: #3B82F6;
        }

        .status-dot-draft {
            background: #9CA3AF;
        }

        [data-theme="dark"] .status-dot-draft {
            background: #6B7280;
        }

        .status-dot-scheduled {
            background: #D97706;
        }

        [data-theme="dark"] .status-dot-scheduled {
            background: #FBBF24;
        }

        /* ============================================================
           FOOTER
           ============================================================ */

        footer {
            background-color: var(--color-bg-card) !important;
        }

        /* ============================================================
           ACCESSIBILITY
           ============================================================ */

        :focus-visible {
            outline: 2px solid var(--color-primary);
            outline-offset: 3px;
        }

        @media (prefers-reduced-motion: reduce) {
            html {
                scroll-behavior: auto;
            }

            *,
            *::before,
            *::after {
                animation-duration: 0.01ms !important;
                animation-iteration-count: 1 !important;
                transition-duration: 0.01ms !important;
            }
        }

        /* ============================================================
           MOBILE
           ============================================================ */

        @media (max-width: 767px) {
            .post-item:hover {
                padding-left: 0;
            }

            .post-arrow {
                opacity: 1;
            }

            .theme-toggle span {
                display: none;
            }

            .theme-toggle {
                width: 38px;
                padding: 6px;
            }
        }
    </style>

    @stack('styles')

</head>

<body
    class="
        font-sans
        antialiased
        bg-[var(--color-bg)]
        text-[var(--color-text-secondary)]
        selection:bg-[var(--color-primary)]
        selection:text-white
    ">

    <div class="min-h-screen flex flex-col bg-[var(--color-bg)]">

        {{-- ========================================================
             HEADER
             ======================================================== --}}

        <header
            class="
                sticky
                top-0
                z-50
                relative
                bg-[var(--color-bg-card)]/95
                backdrop-blur-md
                border-b
                border-[var(--color-border)]
                shadow-sm
            ">

            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

                <div
                    class="
                        flex
                        items-center
                        justify-between
                        h-16
                        gap-3
                        sm:gap-6
                    ">

                    {{-- LOGO --}}

                    <a
                        href="{{ route('posts.index') }}"
                        class="
                            logo-link
                            flex
                            items-center
                            gap-2
                            text-2xl
                            sm:text-3xl
                            font-bold
                            tracking-tight
                            text-[var(--color-text-primary)]
                            shrink-0
                            heading-font
                        ">

                        <span
                            class="
                                logo-icon
                                text-[var(--color-primary)]
                                group-hover:scale-110
                                transition-transform
                                duration-300
                                text-lg
                                sm:text-xl
                                inline-block
                            ">
                            ✦
                        </span>

                        <span
                            class="
                                logo-text
                                bg-gradient-to-r
                                from-[var(--color-text-primary)]
                                via-[var(--color-text-primary)]
                                to-[var(--color-primary)]
                                bg-clip-text
                                transition-colors
                                duration-300
                            ">
                            chronicle
                        </span>

                    </a>

                    {{-- SEARCH --}}

                    <div
                        class="
                            flex-1
                            min-w-0
                            max-w-xs
                            sm:max-w-md
                            relative
                            search-container
                        ">

                        <form
                            method="GET"
                            action="{{ route('posts.index') }}"
                            class="relative group">

                            @if(isset($category))

                            <input
                                type="hidden"
                                name="category"
                                value="{{ $category->slug ?? $category->id }}">

                            @endif

                            <input
                                type="text"
                                name="q"
                                value="{{ request('q') }}"
                                placeholder="Search articles..."
                                autocomplete="off"
                                hx-get="{{ route('posts.suggestions') }}"
                                hx-trigger="keyup changed delay:300ms, search"
                                hx-target="#nav-search-results"
                                hx-swap="innerHTML"
                                class="
                                    w-full
                                    h-9
                                    sm:h-10
                                    px-4
                                    py-2
                                    pl-9
                                    pr-8
                                    rounded-full
                                    bg-[var(--color-bg-card)]
                                    border
                                    border-[var(--color-border)]
                                    text-[var(--color-text-primary)]
                                    placeholder:text-[var(--color-text-muted)]
                                    text-base
                                    sm:text-sm
                                    focus:outline-none
                                    focus:border-[var(--color-primary)]
                                    focus:ring-1
                                    focus:ring-[var(--color-primary)]/30
                                    transition-all
                                    duration-200
                                ">

                            {{-- Search icon --}}

                            <svg
                                class="
                                    absolute
                                    left-3
                                    top-1/2
                                    -translate-y-1/2
                                    w-4
                                    h-4
                                    text-[var(--color-text-muted)]
                                    group-focus-within:text-[var(--color-primary)]
                                    transition-colors
                                "
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24">

                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />

                            </svg>

                            {{-- Clear search --}}

                            @if(request('q'))

                            <a
                                href="{{ route('posts.index') }}"
                                aria-label="Clear search"
                                class="
                                    absolute
                                    right-3
                                    top-1/2
                                    -translate-y-1/2
                                    text-[var(--color-text-muted)]
                                    hover:text-[var(--color-primary)]
                                    text-sm
                                    font-bold
                                    transition-colors
                                ">
                                ✕
                            </a>

                            @endif

                        </form>

                        <div
                            id="nav-search-results"
                            class="
                                absolute
                                left-0
                                right-0
                                top-full
                                mt-2
                                z-[60]
                                empty:hidden
                                max-h-80
                                overflow-y-auto
                                bg-[var(--color-bg-card)]
                                border
                                border-[var(--color-border)]
                                rounded-2xl
                                shadow-2xl
                                p-2
                            ">
                        </div>

                    </div>

                    {{-- DESKTOP NAV --}}

                    <nav
                        class="
                            hidden
                            md:flex
                            items-center
                            gap-6
                            text-sm
                            font-medium
                            shrink-0
                        ">

                        {{-- Home --}}

                        <a
                            href="{{ route('posts.index') }}"
                            class="
                                relative
                                py-1
                                transition-colors
                                duration-200
                                group
                                {{ request()->routeIs('posts.index')
                                    ? 'text-[var(--color-primary)] font-semibold'
                                    : 'text-[var(--color-text-secondary)] hover:text-[var(--color-text-primary)]' }}
                            ">

                            <span>Home</span>

                            <span
                                class="
                                    absolute
                                    bottom-0
                                    left-0
                                    h-0.5
                                    bg-[var(--color-primary)]
                                    transition-all
                                    duration-300
                                    {{ request()->routeIs('posts.index')
                                        ? 'w-full'
                                        : 'w-0 group-hover:w-full' }}
                                ">
                            </span>

                        </a>

                        {{-- Categories --}}

                        <a
                            href="{{ route('categories.index') }}"
                            class="
                                relative
                                py-1
                                transition-colors
                                duration-200
                                group
                                {{ request()->routeIs('categories.*') || request()->routeIs('posts.category')
                                    ? 'text-[var(--color-primary)] font-semibold'
                                    : 'text-[var(--color-text-secondary)] hover:text-[var(--color-text-primary)]' }}
                            ">

                            <span>Categories</span>

                            <span
                                class="
                                    absolute
                                    bottom-0
                                    left-0
                                    h-0.5
                                    bg-[var(--color-primary)]
                                    transition-all
                                    duration-300
                                    {{ request()->routeIs('categories.*') || request()->routeIs('posts.category')
                                        ? 'w-full'
                                        : 'w-0 group-hover:w-full' }}
                                ">
                            </span>

                        </a>

                        {{-- Theme Toggle --}}

                        <button
                            type="button"
                            onclick="toggleTheme()"
                            class="theme-toggle"
                            aria-label="Toggle theme">

                            <svg
                                id="theme-icon"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24">

                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />

                            </svg>

                            <span id="theme-label">Dark</span>

                        </button>

                        @auth

                        {{-- USER MENU --}}

                        <div class="relative group py-3">

                            <button
                                type="button"
                                class="
                                    flex
                                    items-center
                                    gap-2
                                    px-2
                                    py-1.5
                                    rounded-full
                                    border
                                    border-[var(--color-border)]
                                    bg-[var(--color-bg-card)]
                                    text-[var(--color-text-secondary)]
                                    hover:text-[var(--color-text-primary)]
                                    hover:border-[var(--color-primary)]
                                    transition-all
                                    duration-200
                                ">

                                @if(auth()->user()->avatar_url)

                                <img
                                    src="{{ auth()->user()->avatar_url }}"
                                    alt="{{ auth()->user()->name }}"
                                    class="
                                        w-7
                                        h-7
                                        rounded-full
                                        object-cover
                                        border
                                        border-[var(--color-primary)]/30
                                    ">

                                @else

                                <span
                                    class="
                                        flex
                                        items-center
                                        justify-center
                                        w-7
                                        h-7
                                        rounded-full
                                        bg-[var(--color-primary)]/20
                                        text-[var(--color-primary)]
                                        border
                                        border-[var(--color-primary)]/40
                                        font-bold
                                        text-xs
                                    ">
                                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                                </span>

                                @endif

                                <span
                                    class="
                                        hidden
                                        lg:block
                                        max-w-[100px]
                                        truncate
                                    ">
                                    {{ auth()->user()->name }}
                                </span>

                                <svg
                                    class="
                                        w-4
                                        h-4
                                        text-[var(--color-text-muted)]
                                        transition-transform
                                        duration-200
                                        group-hover:rotate-180
                                    "
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24">

                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M19 9l-7 7-7-7" />

                                </svg>

                            </button>

                            {{-- USER DROPDOWN --}}

                            <div
                                class="
                                    absolute
                                    right-0
                                    top-full
                                    hidden
                                    group-hover:block
                                    w-56
                                    pt-2
                                    z-[70]
                                ">

                                <div
                                    class="
                                        bg-[var(--color-bg-card)]
                                        border
                                        border-[var(--color-border)]
                                        rounded-2xl
                                        shadow-2xl
                                        p-2
                                    ">

                                    {{-- User information --}}

                                    <div
                                        class="
                                            px-4
                                            py-3
                                            mb-1
                                            rounded-xl
                                            bg-[var(--color-bg)]
                                        ">

                                        <div class="flex items-center gap-3">

                                            @if(auth()->user()->avatar_url)

                                            <img
                                                src="{{ auth()->user()->avatar_url }}"
                                                alt="{{ auth()->user()->name }}"
                                                class="
                                                    w-9
                                                    h-9
                                                    rounded-full
                                                    object-cover
                                                    border
                                                    border-[var(--color-primary)]/30
                                                ">

                                            @else

                                            <span
                                                class="
                                                    flex
                                                    items-center
                                                    justify-center
                                                    w-9
                                                    h-9
                                                    rounded-full
                                                    bg-[var(--color-primary)]/20
                                                    text-[var(--color-primary)]
                                                    border
                                                    border-[var(--color-primary)]/40
                                                    font-bold
                                                    text-sm
                                                ">
                                                {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                                            </span>

                                            @endif

                                            <div class="min-w-0">

                                                <p
                                                    class="
                                                        text-sm
                                                        font-semibold
                                                        text-[var(--color-text-primary)]
                                                        truncate
                                                        heading-font
                                                    ">
                                                    {{ auth()->user()->name }}
                                                </p>

                                                <p
                                                    class="
                                                        text-xs
                                                        text-[var(--color-text-muted)]
                                                        truncate
                                                        mt-0.5
                                                    ">
                                                    {{ auth()->user()->email }}
                                                </p>

                                            </div>

                                        </div>

                                    </div>

                                    {{-- Profile --}}

                                    <a
                                        href="{{ route('profile.index') }}"
                                        class="
                                            flex
                                            items-center
                                            gap-3
                                            px-4
                                            py-2.5
                                            rounded-xl
                                            text-sm
                                            text-[var(--color-text-secondary)]
                                            hover:text-[var(--color-text-primary)]
                                            hover:bg-[var(--color-bg)]
                                            transition-colors
                                        ">

                                        <svg
                                            class="w-4 h-4 text-[var(--color-primary)]"
                                            fill="none"
                                            stroke="currentColor"
                                            viewBox="0 0 24 24">

                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M5.121 17.804A13.937 13.937 0 0112 16c2.485 0 4.779.65 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0z" />

                                        </svg>

                                        <span>Profile</span>

                                    </a>

                                    {{-- Saved --}}

                                    <a
                                        href="{{ route('users.saved') }}"
                                        class="
                                            flex
                                            items-center
                                            gap-3
                                            px-4
                                            py-2.5
                                            rounded-xl
                                            text-sm
                                            text-[var(--color-text-secondary)]
                                            hover:text-[var(--color-text-primary)]
                                            hover:bg-[var(--color-bg)]
                                            transition-colors
                                            {{ request()->routeIs('users.saved')
                                                ? 'bg-[var(--color-primary)]/10 text-[var(--color-primary)]'
                                                : '' }}
                                        ">

                                        <svg
                                            class="w-4 h-4 text-[var(--color-primary)]"
                                            fill="none"
                                            stroke="currentColor"
                                            viewBox="0 0 24 24">

                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z" />

                                        </svg>

                                        <span>Saved Posts</span>

                                    </a>

                                    {{-- History --}}

                                    <a
                                        href="{{ route('users.history') }}"
                                        class="
                                            flex
                                            items-center
                                            gap-3
                                            px-4
                                            py-2.5
                                            rounded-xl
                                            text-sm
                                            text-[var(--color-text-secondary)]
                                            hover:text-[var(--color-text-primary)]
                                            hover:bg-[var(--color-bg)]
                                            transition-colors
                                            {{ request()->routeIs('users.history')
                                                ? 'bg-[var(--color-primary)]/10 text-[var(--color-primary)]'
                                                : '' }}
                                        ">

                                        <svg
                                            class="w-4 h-4 text-[var(--color-primary)]"
                                            fill="none"
                                            stroke="currentColor"
                                            viewBox="0 0 24 24">

                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />

                                        </svg>

                                        <span>Reading History</span>

                                    </a>

                                    {{-- Author dashboard --}}

                                    @if(Auth::user()->isAuthor())

                                    <a
                                        href="{{ route('author.dashboard') }}"
                                        class="
                                            flex
                                            items-center
                                            gap-3
                                            px-4
                                            py-2.5
                                            rounded-xl
                                            text-sm
                                            text-[var(--color-text-secondary)]
                                            hover:text-[var(--color-text-primary)]
                                            hover:bg-[var(--color-bg)]
                                            transition-colors
                                        ">

                                        <svg
                                            class="w-4 h-4 text-[var(--color-primary)]"
                                            fill="none"
                                            stroke="currentColor"
                                            viewBox="0 0 24 24">

                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M3 13h8V3H3v10zm10 8h8V11h-8v10zM3 21h8v-4H3v4zm10-10h8V3h-8v8z" />

                                        </svg>

                                        <span>Author Dashboard</span>

                                    </a>

                                    @endif

                                    {{-- Admin dashboard --}}

                                    @if(auth()->user()->is_admin ?? false)

                                    <a
                                        href="{{ route('admin.posts.index') }}"
                                        class="
                                            flex
                                            items-center
                                            gap-3
                                            px-4
                                            py-2.5
                                            rounded-xl
                                            text-sm
                                            text-[var(--color-text-secondary)]
                                            hover:text-[var(--color-text-primary)]
                                            hover:bg-[var(--color-bg)]
                                            transition-colors
                                        ">

                                        <svg
                                            class="w-4 h-4 text-[var(--color-primary)]"
                                            fill="none"
                                            stroke="currentColor"
                                            viewBox="0 0 24 24">

                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M3 13h8V3H3v10zm10 8h8V11h-8v10zM3 21h8v-4H3v4zm10-10h8V3h-8v8z" />

                                        </svg>

                                        <span>Dashboard</span>

                                    </a>

                                    @endif

                                    <div
                                        class="
                                            border-t
                                            border-[var(--color-border)]
                                            my-2
                                        ">
                                    </div>

                                    {{-- Logout --}}

                                    <a
                                        href="{{ route('logout') }}"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                        class="
                                            flex
                                            items-center
                                            gap-3
                                            w-full
                                            px-4
                                            py-2.5
                                            rounded-xl
                                            text-sm
                                            text-[var(--color-primary)]
                                            hover:text-[var(--color-primary-hover)]
                                            hover:bg-[var(--color-primary)]/10
                                            transition-colors
                                        ">

                                        <svg
                                            class="w-4 h-4"
                                            fill="none"
                                            stroke="currentColor"
                                            viewBox="0 0 24 24">

                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />

                                        </svg>

                                        <span>Logout</span>

                                    </a>

                                    <form
                                        id="logout-form"
                                        action="{{ route('logout') }}"
                                        method="POST"
                                        class="hidden">
                                        @csrf
                                    </form>

                                </div>

                            </div>

                        </div>

                        @else

                        {{-- GUEST NAV --}}

                        <div class="flex items-center gap-3">

                            <a
                                href="{{ route('login') }}"
                                class="
                                    text-sm
                                    text-[var(--color-text-secondary)]
                                    hover:text-[var(--color-text-primary)]
                                    font-medium
                                    transition-colors
                                ">
                                Log in
                            </a>

                            @if(Route::has('register'))

                            <a
                                href="{{ route('register') }}"
                                class="
                                    text-sm
                                    px-4
                                    py-2
                                    rounded-full
                                    bg-[var(--color-primary)]
                                    hover:bg-[var(--color-primary-hover)]
                                    text-white
                                    font-medium
                                    transition-all
                                    shadow-lg
                                    shadow-[var(--color-primary)]/20
                                    hover:shadow-[var(--color-primary)]/30
                                ">
                                Register
                            </a>

                            @endif

                        </div>

                        @endauth

                    </nav>

                    {{-- MOBILE MENU BUTTON --}}

                    <button
                        id="menu-toggle"
                        type="button"
                        aria-label="Toggle navigation menu"
                        aria-expanded="false"
                        class="
                            md:hidden
                            shrink-0
                            p-2.5
                            rounded-xl
                            text-[var(--color-text-secondary)]
                            bg-[var(--color-bg-card)]
                            border
                            border-[var(--color-border)]
                            hover:text-[var(--color-primary)]
                            hover:border-[var(--color-primary)]
                            transition-all
                            duration-200
                        ">

                        <svg
                            id="menu-open-icon"
                            class="h-5 w-5"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor">

                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16" />

                        </svg>

                        <svg
                            id="menu-close-icon"
                            class="hidden h-5 w-5"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor">

                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />

                        </svg>

                    </button>

                </div>

            </div>

            {{-- ====================================================
                 MOBILE MENU
                 ==================================================== --}}

            <div
                id="mobile-menu"
                class="
                    hidden
                    md:hidden
                    absolute
                    top-full
                    right-4
                    sm:right-6
                    w-64
                    max-w-[calc(100vw-2rem)]
                    mt-2
                    bg-[var(--color-bg-card)]
                    border
                    border-[var(--color-border)]
                    rounded-2xl
                    shadow-2xl
                    p-2
                    z-[70]
                ">

                @php
                $navItems = [
                'posts.index' => 'Home',
                'categories.index' => 'Categories',
                ];
                @endphp

                <div class="space-y-1">

                    @foreach($navItems as $route => $label)

                    <a
                        href="{{ route($route) }}"
                        class="
                            block
                            px-4
                            py-3
                            rounded-xl
                            text-base
                            font-medium
                            transition-all
                            duration-200
                            {{ request()->routeIs($route)
                                ? 'bg-[var(--color-primary)]/10 text-[var(--color-primary)] border border-[var(--color-primary)]/40'
                                : 'text-[var(--color-text-secondary)] hover:text-[var(--color-text-primary)] hover:bg-[var(--color-bg)]' }}
                        ">
                        {{ $label }}
                    </a>

                    @endforeach

                </div>

                {{-- Mobile theme toggle --}}

                <button
                    type="button"
                    onclick="toggleTheme()"
                    class="
                        flex
                        items-center
                        justify-between
                        w-full
                        px-4
                        py-3
                        mt-1
                        rounded-xl
                        text-base
                        font-medium
                        text-[var(--color-text-secondary)]
                        hover:text-[var(--color-primary)]
                        hover:bg-[var(--color-bg)]
                        transition-colors
                    ">

                    <span>Appearance</span>

                    <span
                        id="mobile-theme-label"
                        class="text-sm text-[var(--color-primary)]">
                        Dark
                    </span>

                </button>

                @auth

                <div class="border-t border-[var(--color-border)] my-2"></div>

                {{-- Mobile user info --}}

                <div
                    class="
                        px-4
                        py-3
                        mb-1
                        rounded-xl
                        bg-[var(--color-bg)]
                    ">

                    <div class="flex items-center gap-3">

                        @if(auth()->user()->avatar_url)

                        <img
                            src="{{ auth()->user()->avatar_url }}"
                            alt="{{ auth()->user()->name }}"
                            class="
                                w-9
                                h-9
                                rounded-full
                                object-cover
                                border
                                border-[var(--color-primary)]/30
                            ">

                        @else

                        <span
                            class="
                                flex
                                items-center
                                justify-center
                                w-9
                                h-9
                                rounded-full
                                bg-[var(--color-primary)]/20
                                text-[var(--color-primary)]
                                border
                                border-[var(--color-primary)]/40
                                shrink-0
                                font-bold
                                text-sm
                            ">
                            {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                        </span>

                        @endif

                        <div class="min-w-0">

                            <p
                                class="
                                    text-sm
                                    font-semibold
                                    text-[var(--color-text-primary)]
                                    truncate
                                    heading-font
                                ">
                                {{ auth()->user()->name }}
                            </p>

                            <p
                                class="
                                    text-xs
                                    text-[var(--color-text-muted)]
                                    truncate
                                ">
                                {{ auth()->user()->email }}
                            </p>

                        </div>

                    </div>

                </div>

                {{-- Profile --}}

                <a
                    href="{{ route('profile.index') }}"
                    class="
                        flex
                        items-center
                        gap-3
                        px-4
                        py-3
                        rounded-xl
                        text-base
                        text-[var(--color-text-secondary)]
                        hover:text-[var(--color-text-primary)]
                        hover:bg-[var(--color-bg)]
                        transition-colors
                    ">

                    <svg
                        class="w-5 h-5 text-[var(--color-primary)]"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24">

                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M5.121 17.804A13.937 13.937 0 0112 16c2.485 0 4.779.65 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0z" />

                    </svg>

                    <span>Profile</span>

                </a>

                {{-- Saved --}}

                <a
                    href="{{ route('users.saved') }}"
                    class="
                        flex
                        items-center
                        gap-3
                        px-4
                        py-3
                        rounded-xl
                        text-base
                        text-[var(--color-text-secondary)]
                        hover:text-[var(--color-text-primary)]
                        hover:bg-[var(--color-bg)]
                        transition-colors
                    ">

                    <svg
                        class="w-5 h-5 text-[var(--color-primary)]"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24">

                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z" />

                    </svg>

                    <span>Saved Posts</span>

                </a>

                {{-- History --}}

                <a
                    href="{{ route('users.history') }}"
                    class="
                        flex
                        items-center
                        gap-3
                        px-4
                        py-3
                        rounded-xl
                        text-base
                        text-[var(--color-text-secondary)]
                        hover:text-[var(--color-text-primary)]
                        hover:bg-[var(--color-bg)]
                        transition-colors
                    ">

                    <svg
                        class="w-5 h-5 text-[var(--color-primary)]"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24">

                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />

                    </svg>

                    <span>Reading History</span>

                </a>

                {{-- Author dashboard --}}

                @if(Auth::user()->isAuthor())

                <a
                    href="{{ route('author.dashboard') }}"
                    class="
                        flex
                        items-center
                        gap-3
                        px-4
                        py-3
                        rounded-xl
                        text-base
                        text-[var(--color-text-secondary)]
                        hover:text-[var(--color-text-primary)]
                        hover:bg-[var(--color-bg)]
                        transition-colors
                    ">

                    <svg
                        class="w-5 h-5 text-[var(--color-primary)]"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24">

                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M3 13h8V3H3v10zm10 8h8V11h-8v10zM3 21h8v-4H3v4zm10-10h8V3h-8v8z" />

                    </svg>

                    <span>Author Dashboard</span>

                </a>

                @endif

                {{-- Admin --}}

                @if(auth()->user()->is_admin ?? false)

                <a
                    href="{{ route('admin.posts.index') }}"
                    class="
                        flex
                        items-center
                        gap-3
                        px-4
                        py-3
                        rounded-xl
                        text-base
                        text-[var(--color-text-secondary)]
                        hover:text-[var(--color-text-primary)]
                        hover:bg-[var(--color-bg)]
                        transition-colors
                    ">

                    <svg
                        class="w-5 h-5 text-[var(--color-primary)]"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24">

                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M3 13h8V3H3v10zm10 8h8V11h-8v10zM3 21h8v-4H3v4zm10-10h8V3h-8v8z" />

                    </svg>

                    <span>Dashboard</span>

                </a>

                @endif

                <div class="border-t border-[var(--color-border)] my-2"></div>

                {{-- Logout --}}

                <a
                    href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form-mobile').submit();"
                    class="
                        flex
                        items-center
                        justify-center
                        gap-2
                        w-full
                        px-4
                        py-3
                        text-base
                        font-medium
                        text-[var(--color-primary)]
                        bg-[var(--color-primary)]/10
                        hover:bg-[var(--color-primary)]/20
                        rounded-xl
                        transition-all
                    ">

                    <svg
                        class="w-5 h-5"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24">

                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />

                    </svg>

                    <span>Logout</span>

                </a>

                <form
                    id="logout-form-mobile"
                    action="{{ route('logout') }}"
                    method="POST"
                    class="hidden">
                    @csrf
                </form>

                @else

                {{-- Guest mobile navigation --}}

                <div class="border-t border-[var(--color-border)] my-2"></div>

                <div class="grid grid-cols-2 gap-2">

                    <a
                        href="{{ route('login') }}"
                        class="
                            flex
                            items-center
                            justify-center
                            px-3
                            py-3
                            rounded-xl
                            text-sm
                            font-medium
                            text-[var(--color-text-secondary)]
                            border
                            border-[var(--color-border)]
                            hover:border-[var(--color-primary)]
                            hover:text-[var(--color-text-primary)]
                            transition-all
                        ">
                        Log in
                    </a>

                    @if(Route::has('register'))

                    <a
                        href="{{ route('register') }}"
                        class="
                            flex
                            items-center
                            justify-center
                            px-3
                            py-3
                            rounded-xl
                            text-sm
                            font-semibold
                            bg-[var(--color-primary)]
                            hover:bg-[var(--color-primary-hover)]
                            text-white
                            transition-all
                        ">
                        Register
                    </a>

                    @endif

                </div>

                @endauth

            </div>

        </header>

        {{-- ========================================================
             MAIN
             ======================================================== --}}

        <main
            class="
                flex-1
                w-full
                bg-[var(--color-bg)]
            ">

            @yield('content')

        </main>

        {{-- ========================================================
             FOOTER
             ======================================================== --}}

        <footer
            class="
                bg-[var(--color-bg-card)]
                text-[var(--color-text-secondary)]
                border-t
                border-[var(--color-border)]
                relative
                overflow-hidden
            ">

            {{-- Decorative glow --}}

            <div
                class="
                    absolute
                    -top-24
                    left-1/2
                    -translate-x-1/2
                    w-96
                    h-96
                    bg-[var(--color-primary)]/5
                    blur-[120px]
                    pointer-events-none
                    rounded-full
                ">
            </div>

            <div
                class="
                    max-w-7xl
                    mx-auto
                    px-5
                    sm:px-6
                    lg:px-8
                    py-10
                    sm:py-12
                    relative
                    z-10
                ">

                {{-- NEWSLETTER --}}

                <div class="max-w-xl mx-auto mb-12 text-center">

                    <h3
                        class="
                            heading-font
                            text-lg
                            font-semibold
                            text-[var(--color-text-primary)]
                            mb-2
                        ">
                        Subscribe to our Newsletter
                    </h3>

                    <p
                        class="
                            text-sm
                            text-[var(--color-text-muted)]
                            mb-4
                        ">
                        Get the latest posts delivered straight to your inbox.
                    </p>

                    <form
                        action="{{ route('newsletter.subscribe') }}"
                        method="POST"
                        class="
                            flex
                            flex-col
                            sm:flex-row
                            gap-3
                            max-w-md
                            mx-auto
                        ">

                        @csrf

                        <input
                            type="email"
                            name="email"
                            required
                            placeholder="Enter your email..."
                            class="
                                flex-1
                                px-4
                                py-2.5
                                rounded-xl
                                bg-[var(--color-bg)]
                                border
                                border-[var(--color-border)]
                                text-[var(--color-text-primary)]
                                placeholder:text-[var(--color-text-muted)]
                                focus:outline-none
                                focus:border-[var(--color-primary)]
                                focus:ring-1
                                focus:ring-[var(--color-primary)]/30
                                transition-all
                                text-sm
                            ">

                        <button
                            type="submit"
                            class="
                                px-6
                                py-2.5
                                bg-[var(--color-primary)]
                                hover:bg-[var(--color-primary-hover)]
                                text-white
                                rounded-xl
                                font-semibold
                                transition-all
                                duration-300
                                shadow-lg
                                shadow-[var(--color-primary)]/20
                                hover:shadow-[var(--color-primary)]/30
                                heading-font
                                text-sm
                                whitespace-nowrap
                            ">
                            Subscribe
                        </button>

                    </form>

                    <p
                        class="
                            text-xs
                            text-[var(--color-text-muted)]
                            mt-2
                        ">
                        No spam, unsubscribe anytime.
                    </p>

                </div>

                {{-- FOOTER GRID --}}

                <div
                    class="
                        grid
                        grid-cols-2
                        md:grid-cols-3
                        gap-x-8
                        gap-y-8
                        md:gap-10
                    ">

                    {{-- BRAND --}}

                    <div
                        class="
                            col-span-2
                            md:col-span-1
                        ">

                        <a
                            href="{{ route('posts.index') }}"
                            class="
                                logo-link
                                inline-flex
                                items-center
                                gap-2
                                text-2xl
                                sm:text-3xl
                                font-bold
                                text-[var(--color-text-primary)]
                                mb-3
                                heading-font
                            ">

                            <span
                                class="
                                    logo-icon
                                    text-[var(--color-primary)]
                                    transition-transform
                                    duration-300
                                ">
                                ✦
                            </span>

                            <span class="logo-text">
                                chronicle
                            </span>

                        </a>

                        <p
                            class="
                                text-[var(--color-text-muted)]
                                max-w-sm
                                text-base
                                leading-relaxed
                            ">
                            A quiet corner for thoughtful writing, curated essays,
                            and slow reading.
                        </p>

                    </div>

                    {{-- EXPLORE --}}

                    <div>

                        <h5
                            class="
                                font-semibold
                                text-[var(--color-primary)]
                                text-xs
                                uppercase
                                tracking-widest
                                mb-4
                                heading-font
                            ">
                            Explore Topics
                        </h5>

                        <ul
                            class="
                                space-y-2.5
                                text-sm
                                sm:text-base
                            ">

                            <li>

                                <a
                                    href="{{ route('posts.index') }}"
                                    class="
                                        text-[var(--color-text-muted)]
                                        hover:text-[var(--color-primary)]
                                        transition-colors
                                    ">
                                    All Posts
                                </a>

                            </li>

                            <li>

                                <a
                                    href="{{ route('categories.index') }}"
                                    class="
                                        text-[var(--color-text-muted)]
                                        hover:text-[var(--color-primary)]
                                        transition-colors
                                    ">
                                    Categories
                                </a>

                            </li>

                        </ul>

                    </div>

                    {{-- CATEGORIES --}}

                    <div>

                        <h5
                            class="
                                font-semibold
                                text-[var(--color-primary)]
                                text-xs
                                uppercase
                                tracking-widest
                                mb-4
                                heading-font
                            ">
                            Categories
                        </h5>

                        <ul
                            class="
                                space-y-2.5
                                text-sm
                                sm:text-base
                            ">

                            @foreach(\App\Models\Category::orderBy('name')->take(6)->get() as $cat)

                            <li>

                                <a
                                    href="{{ route('posts.category', $cat) }}"
                                    class="
                                        text-[var(--color-text-muted)]
                                        hover:text-[var(--color-primary)]
                                        transition-colors
                                        block
                                    ">
                                    {{ $cat->name }}
                                </a>

                            </li>

                            @endforeach

                            <li class="pt-1">

                                <a
                                    href="{{ route('categories.index') }}"
                                    class="
                                        text-[var(--color-primary)]
                                        hover:text-[var(--color-primary-hover)]
                                        transition-colors
                                        text-sm
                                        font-semibold
                                        inline-flex
                                        items-center
                                        gap-1.5
                                    ">

                                    <span>View all</span>

                                    <span>→</span>

                                </a>

                            </li>

                        </ul>

                    </div>

                </div>

                {{-- COPYRIGHT --}}

                <div
                    class="
                        border-t
                        border-[var(--color-border)]
                        mt-8
                        sm:mt-10
                        pt-6
                        sm:pt-8
                        flex
                        flex-col
                        sm:flex-row
                        justify-between
                        items-center
                        gap-3
                        text-sm
                        text-[var(--color-text-muted)]
                    ">

                    <p>
                        &copy; {{ date('Y') }}
                        chronicle · crafted with care
                    </p>

                    <button
                        type="button"
                        onclick="toggleTheme()"
                        class="
                            text-[var(--color-text-muted)]
                            hover:text-[var(--color-primary)]
                            transition-colors
                            text-xs
                        ">

                        <span id="footer-theme-label">
                            Switch to Dark
                        </span>

                    </button>

                </div>

            </div>

        </footer>

    </div>

    {{-- ============================================================
         JAVASCRIPT
         ============================================================ --}}

    <script>
        (() => {
            'use strict';

            const THEME_KEY = 'theme';

            /*
             * Apply theme as early as possible.
             * This prevents most light/dark flashing during navigation.
             */
            function getStoredTheme() {
                const saved = localStorage.getItem(THEME_KEY);

                if (saved === 'dark' || saved === 'light') {
                    return saved;
                }

                return 'light';
            }

            function applyTheme(theme) {
                const html = document.documentElement;

                html.setAttribute('data-theme', theme);

                /*
                 * Keep Tailwind's dark class synchronized as well.
                 * This allows existing dark:* classes to continue working.
                 */
                html.classList.toggle('dark', theme === 'dark');

                localStorage.setItem(THEME_KEY, theme);

                updateThemeUI(theme);
            }

            function updateThemeUI(theme) {
                const isDark = theme === 'dark';

                const icon = document.getElementById('theme-icon');
                const label = document.getElementById('theme-label');
                const mobileLabel = document.getElementById('mobile-theme-label');
                const footerLabel = document.getElementById('footer-theme-label');

                if (icon) {
                    icon.innerHTML = isDark ?
                        `
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"
                            />
                        ` :
                        `
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"
                            />
                        `;
                }

                if (label) {
                    label.textContent = isDark ? 'Light' : 'Dark';
                }

                if (mobileLabel) {
                    mobileLabel.textContent = isDark ? 'Light' : 'Dark';
                }

                if (footerLabel) {
                    footerLabel.textContent = isDark ?
                        'Switch to Light' :
                        'Switch to Dark';
                }

                const themeMeta = document.getElementById('theme-color-meta') || document.querySelector('meta[name="theme-color"]');

                if (themeMeta) {
                    themeMeta.setAttribute(
                        'content',
                        isDark ? '#1A1A2E' : '#F8F9FA'
                    );
                }
            }

            window.toggleTheme = function() {
                const current =
                    document.documentElement.getAttribute('data-theme') ||
                    'light';

                applyTheme(
                    current === 'dark' ?
                    'light' :
                    'dark'
                );
            };

            /*
             * Apply saved theme immediately.
             */
            applyTheme(getStoredTheme());

            document.addEventListener('DOMContentLoaded', function() {

                /* ====================================================
                   MOBILE MENU
                   ==================================================== */

                const toggleBtn =
                    document.getElementById('menu-toggle');

                const mobileMenu =
                    document.getElementById('mobile-menu');

                const openIcon =
                    document.getElementById('menu-open-icon');

                const closeIcon =
                    document.getElementById('menu-close-icon');

                function closeMobileMenu() {
                    if (!mobileMenu) {
                        return;
                    }

                    mobileMenu.classList.add('hidden');

                    openIcon?.classList.remove('hidden');
                    closeIcon?.classList.add('hidden');

                    toggleBtn?.setAttribute(
                        'aria-expanded',
                        'false'
                    );
                }

                function openMobileMenu() {
                    if (!mobileMenu) {
                        return;
                    }

                    mobileMenu.classList.remove('hidden');

                    openIcon?.classList.add('hidden');
                    closeIcon?.classList.remove('hidden');

                    toggleBtn?.setAttribute(
                        'aria-expanded',
                        'true'
                    );
                }

                toggleBtn?.addEventListener('click', function(event) {
                    event.stopPropagation();

                    const isOpen =
                        mobileMenu &&
                        !mobileMenu.classList.contains('hidden');

                    if (isOpen) {
                        closeMobileMenu();
                    } else {
                        openMobileMenu();
                    }
                });

                /* Close menu when clicking outside */

                document.addEventListener('click', function(event) {
                    if (!mobileMenu || !toggleBtn) {
                        return;
                    }

                    if (
                        !mobileMenu.contains(event.target) &&
                        !toggleBtn.contains(event.target)
                    ) {
                        closeMobileMenu();
                    }
                });

                /* Close menu with Escape */

                document.addEventListener('keydown', function(event) {
                    if (event.key === 'Escape') {
                        closeMobileMenu();
                    }
                });

                /* Close mobile menu after resizing to desktop */

                window.addEventListener('resize', function() {
                    if (window.innerWidth >= 768) {
                        closeMobileMenu();
                    }
                });

                /* ====================================================
                   SEARCH DROPDOWN
                   ==================================================== */

                const searchContainer =
                    document.querySelector('.search-container');

                const resultsContainer =
                    document.getElementById('nav-search-results');

                function closeSearchResults() {
                    if (resultsContainer) {
                        resultsContainer.innerHTML = '';
                    }
                }

                document.addEventListener('click', function(event) {
                    if (
                        searchContainer &&
                        !searchContainer.contains(event.target)
                    ) {
                        closeSearchResults();
                    }
                });

                document.addEventListener('keydown', function(event) {
                    if (event.key === 'Escape') {
                        closeSearchResults();
                    }
                });

                /*
                 * If the search input is cleared, remove suggestions.
                 */
                const searchInput =
                    searchContainer?.querySelector('input[name="q"]');

                searchInput?.addEventListener('input', function() {
                    if (!this.value.trim()) {
                        closeSearchResults();
                    }
                });

            });
        })();
    </script>

    @stack('scripts')

</body>

</html>