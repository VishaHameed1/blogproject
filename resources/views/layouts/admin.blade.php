<!DOCTYPE html>
<html lang="en"
    class="h-full"
    data-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Admin · chronicle')</title>

    {{-- ============================================================
        Fonts
    ============================================================ --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&family=Work+Sans:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">

    {{-- ============================================================
        Vite
    ============================================================ --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- ============================================================
        Third-party
    ============================================================ --}}
    <script src="https://unpkg.com/htmx.org@1.9.12"></script>

    <script
        defer
        src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js">
    </script>


    {{-- ============================================================
        Admin Theme
    ============================================================ --}}
    <style>
        /* ==========================================================
           DESIGN TOKENS
        ========================================================== */

        :root {
            /* Background */
            --color-bg: #F8F9FA;
            --color-bg-card: #FFFFFF;
            --color-bg-sidebar: #FFFFFF;
            --color-bg-elevated: #FFFFFF;

            /* Text */
            --color-text-primary: #111827;
            --color-text-secondary: #6B7280;
            --color-text-muted: #9CA3AF;

            /* Borders */
            --color-border: #E5E7EB;

            /* Brand */
            --color-primary: #7C3AED;
            --color-primary-hover: #6D28D9;
            --color-primary-soft: rgba(124, 58, 237, 0.10);

            /* Secondary */
            --color-secondary: #3B82F6;
            --color-secondary-hover: #2563EB;

            /* States */
            --color-success: #10B981;
            --color-error: #EF4444;
            --color-warning: #F59E0B;

            /* Shadows */
            --color-shadow: rgba(0, 0, 0, 0.06);
            --color-shadow-hover: rgba(0, 0, 0, 0.12);
        }


        /* ==========================================================
           DARK THEME
        ========================================================== */

        [data-theme="dark"] {
            --color-bg: #0A0A0A;
            --color-bg-card: #141414;
            --color-bg-sidebar: #0A0A0A;
            --color-bg-elevated: #1A1A1A;

            --color-text-primary: #FFFFFF;
            --color-text-secondary: #A0A0A0;
            --color-text-muted: #6B7280;

            --color-border: #2A2A2A;

            --color-primary: #3B82F6;
            --color-primary-hover: #60A5FA;
            --color-primary-soft: rgba(59, 130, 246, 0.14);

            --color-secondary: #3B82F6;
            --color-secondary-hover: #60A5FA;

            --color-success: #34D399;
            --color-error: #F87171;
            --color-warning: #FBBF24;

            --color-shadow: rgba(0, 0, 0, 0.40);
            --color-shadow-hover: rgba(0, 0, 0, 0.60);
        }


        /* ==========================================================
           GLOBAL TYPOGRAPHY
        ========================================================== */

        html {
            background: var(--color-bg);
            color: var(--color-text-secondary);

            transition:
                background-color 0.25s ease,
                color 0.25s ease;
        }

        body {
            margin: 0;

            font-family:
                'Work Sans',
                ui-sans-serif,
                system-ui,
                -apple-system,
                BlinkMacSystemFont,
                "Segoe UI",
                sans-serif;

            background: var(--color-bg);
            color: var(--color-text-secondary);

            transition:
                background-color 0.25s ease,
                color 0.25s ease;
        }

        .heading-font {
            font-family:
                'Poppins',
                ui-sans-serif,
                system-ui,
                -apple-system,
                BlinkMacSystemFont,
                "Segoe UI",
                sans-serif !important;

            letter-spacing: -0.02em !important;

            color: var(--color-text-primary);
        }


        /* ==========================================================
           SELECTION
        ========================================================== */

        ::selection {
            background: var(--color-primary-soft);
            color: var(--color-text-primary);
        }

        [data-theme="dark"] ::selection {
            background: var(--color-primary-soft);
            color: #FFFFFF;
        }


        /* ==========================================================
           SCROLLBAR
        ========================================================== */

        ::-webkit-scrollbar {
            width: 6px;
            height: 6px;
        }

        ::-webkit-scrollbar-track {
            background: var(--color-bg);
        }

        ::-webkit-scrollbar-thumb {
            background: var(--color-primary);
            border-radius: 999px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: var(--color-primary-hover);
        }


        /* ==========================================================
           SIDEBAR - FLOATING CARD
        ========================================================== */

        .admin-sidebar-wrapper {
            padding: 0;
            height: 100vh;
            position: sticky;
            top: 0;
        }

        .admin-sidebar-card {
            background: var(--color-bg-card);
            border: 1px solid var(--color-border);
            border-radius: 1.25rem;
            padding: 1.25rem 1rem;
            transition: all 0.3s ease;
            box-shadow: 0 4px 20px var(--color-shadow);
            display: flex;
            flex-direction: column;
            height: 100%;
            width: 100%;
            overflow-y: auto;
        }

        .admin-sidebar-card::-webkit-scrollbar {
            display: none;
        }

        .admin-sidebar-card {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }

        .admin-sidebar-card:hover {
            border-color: var(--color-primary);
            box-shadow: 0 8px 32px var(--color-shadow-hover);
        }


        /* ==========================================================
           SIDEBAR - MOBILE
        ========================================================== */

        .mobile-sidebar-overlay {
            position: fixed;
            inset: 0;
            background: rgba(0, 0, 0, 0.5);
            z-index: 40;
            display: none;
            backdrop-filter: blur(4px);
        }

        .mobile-sidebar-overlay.active {
            display: block;
        }

        .mobile-sidebar {
            position: fixed;
            top: 0;
            left: 0;
            height: 100%;
            width: 280px;
            background: var(--color-bg-sidebar);
            border-right: 1px solid var(--color-border);
            z-index: 50;
            transform: translateX(-100%);
            transition: transform 0.3s ease;
            padding: 1rem;
            overflow-y: auto;
        }

        .mobile-sidebar::-webkit-scrollbar {
            display: none;
        }

        .mobile-sidebar {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }

        .mobile-sidebar.open {
            transform: translateX(0);
        }

        .mobile-sidebar .admin-sidebar-card {
            border: none;
            box-shadow: none;
            padding: 0;
            height: 100%;
        }

        .mobile-sidebar .admin-sidebar-card:hover {
            border: none;
            box-shadow: none;
        }

        .mobile-close-btn {
            position: absolute;
            top: 1rem;
            right: 1rem;
            background: transparent;
            border: none;
            color: var(--color-text-muted);
            font-size: 1.5rem;
            cursor: pointer;
            transition: color 0.2s ease;
            z-index: 51;
        }

        .mobile-close-btn:hover {
            color: var(--color-text-primary);
        }


        /* ==========================================================
           MOBILE TOGGLE BUTTON
        ========================================================== */

        .mobile-toggle-btn {
            display: none;
            align-items: center;
            justify-content: center;
            background: var(--color-bg-card);
            border: 1px solid var(--color-border);
            border-radius: 0.75rem;
            padding: 0.5rem;
            cursor: pointer;
            color: var(--color-text-secondary);
            transition: all 0.2s ease;
            position: fixed;
            bottom: 1rem;
            left: 1rem;
            z-index: 30;
            box-shadow: 0 4px 12px var(--color-shadow);
        }

        .mobile-toggle-btn:hover {
            border-color: var(--color-primary);
            color: var(--color-primary);
            box-shadow: 0 4px 16px var(--color-shadow-hover);
        }

        .mobile-toggle-btn svg {
            width: 1.5rem;
            height: 1.5rem;
        }


        /* ==========================================================
           CARD SYSTEM
        ========================================================== */

        .card-hover {
            background: var(--color-bg-card);

            border: 1px solid var(--color-border);

            border-radius: 1rem;

            transition:
                transform 0.25s ease,
                box-shadow 0.25s ease,
                border-color 0.25s ease,
                background-color 0.25s ease;
        }

        .card-hover:hover {
            transform: translateY(-2px);

            border-color: var(--color-primary-soft);

            box-shadow:
                0 10px 30px var(--color-shadow-hover);
        }


        /* ==========================================================
           STAT CARDS
        ========================================================== */

        .stat-card {
            background: var(--color-bg-card);

            border: 1px solid var(--color-border);

            border-radius: 1rem;

            padding: 1.5rem;

            transition:
                transform 0.25s ease,
                box-shadow 0.25s ease,
                border-color 0.25s ease,
                background-color 0.25s ease;
        }

        .stat-card:hover {
            transform: translateY(-2px);

            border-color: var(--color-primary-soft);

            box-shadow:
                0 10px 30px var(--color-shadow-hover);
        }


        /* ==========================================================
           QUICK ACTIONS
        ========================================================== */

        .quick-action {
            display: flex;
            align-items: center;

            background: var(--color-bg-card);

            border: 1px solid var(--color-border);

            border-radius: 0.875rem;

            color: var(--color-text-secondary);

            transition:
                transform 0.25s ease,
                background-color 0.25s ease,
                border-color 0.25s ease,
                color 0.25s ease,
                box-shadow 0.25s ease;
        }

        .quick-action:hover {
            transform: translateY(-2px);

            background: var(--color-primary);

            border-color: var(--color-primary);

            color: #FFFFFF !important;

            box-shadow:
                0 8px 24px var(--color-shadow);
        }


        /* ==========================================================
           PRIMARY BUTTON
        ========================================================== */

        .btn-primary {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;

            background: var(--color-primary) !important;

            color: #FFFFFF !important;

            padding: 0.625rem 1.25rem;

            border: 0;

            border-radius: 9999px;

            font-family: 'Poppins', sans-serif;

            font-size: 0.875rem;

            font-weight: 600;

            cursor: pointer;

            transition:
                transform 0.2s ease,
                background-color 0.2s ease,
                box-shadow 0.2s ease;
        }

        .btn-primary:hover {
            background: var(--color-primary-hover) !important;

            transform: translateY(-1px);

            box-shadow:
                0 6px 18px var(--color-shadow);
        }

        .btn-primary:active {
            transform: translateY(0);
        }


        /* ==========================================================
           LEGACY RUST BUTTON
        ========================================================== */

        .btn-rust {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;

            background: var(--color-primary) !important;

            color: #FFFFFF !important;

            padding: 0.625rem 1.25rem;

            border: 0;

            border-radius: 9999px;

            font-family: 'Poppins', sans-serif;

            font-size: 0.875rem;

            font-weight: 600;

            cursor: pointer;

            transition:
                transform 0.2s ease,
                background-color 0.2s ease,
                box-shadow 0.2s ease;
        }

        .btn-rust:hover {
            background: var(--color-primary-hover) !important;

            transform: translateY(-1px);

            box-shadow:
                0 6px 18px var(--color-shadow);
        }


        /* ==========================================================
           STATUS BADGES
        ========================================================== */

        .badge-pending,
        .badge-published,
        .badge-draft {
            display: inline-flex;
            align-items: center;

            padding: 0.3rem 0.7rem;

            border-radius: 999px;

            font-family: 'Poppins', sans-serif;

            font-size: 0.65rem;

            font-weight: 600;

            line-height: 1;
        }


        .badge-pending {
            background: var(--color-primary-soft);
            color: var(--color-primary);
            border: 1px solid var(--color-primary-soft);
        }


        .badge-published {
            background: rgba(16, 185, 129, 0.10);
            color: var(--color-success);
            border: 1px solid rgba(16, 185, 129, 0.18);
        }

        [data-theme="dark"] .badge-published {
            background: rgba(52, 211, 153, 0.10);
            color: #34D399;
            border-color: rgba(52, 211, 153, 0.20);
        }


        .badge-draft {
            background: rgba(107, 114, 128, 0.08);
            color: var(--color-text-muted);
            border: 1px solid var(--color-border);
        }


        /* ==========================================================
           TABLE
        ========================================================== */

        .admin-table {
            width: 100%;

            border-collapse: separate;

            border-spacing: 0;

            font-size: 0.875rem;

            color: var(--color-text-secondary);
        }

        .admin-table thead {
            background: var(--color-bg);
        }

        .admin-table thead th {
            padding: 0.8rem 1rem;

            color: var(--color-text-muted);

            font-family: 'Poppins', sans-serif;

            font-size: 0.65rem;

            font-weight: 600;

            text-align: left;

            text-transform: uppercase;

            letter-spacing: 0.05em;

            border-bottom:
                1px solid var(--color-border);
        }

        .admin-table tbody tr {
            background: transparent;

            border-bottom:
                1px solid var(--color-border);

            transition:
                background-color 0.2s ease;
        }

        .admin-table tbody tr:hover {
            background: var(--color-primary-soft);
        }

        .admin-table tbody td {
            padding: 0.9rem 1rem;

            color: var(--color-text-secondary);

            border-bottom:
                1px solid var(--color-border);
        }


        /* ==========================================================
           STATUS DOT
        ========================================================== */

        .status-dot {
            display: inline-block;

            width: 6px;
            height: 6px;

            margin-right: 0.5rem;

            border-radius: 50%;
        }

        .status-dot.pending {
            background: var(--color-primary);

            box-shadow:
                0 0 0 3px var(--color-primary-soft);
        }

        .status-dot.published {
            background: var(--color-success);

            box-shadow:
                0 0 0 3px rgba(16, 185, 129, 0.10);
        }

        .status-dot.draft {
            background: var(--color-text-muted);
        }


        /* ==========================================================
           ACTIVITY
        ========================================================== */

        .activity-item {
            padding: 0.8rem 0;

            border-bottom:
                1px solid var(--color-border);

            transition:
                padding-left 0.2s ease,
                background-color 0.2s ease;
        }

        .activity-item:last-child {
            border-bottom: 0;
        }

        .activity-item:hover {
            padding-left: 0.4rem;
        }


        /* ==========================================================
           SUCCESS / ERROR
        ========================================================== */

        .success-message {
            background:
                rgba(16, 185, 129, 0.06);

            border:
                1px solid rgba(16, 185, 129, 0.18);

            color:
                var(--color-success);
        }

        .error-message {
            background:
                rgba(239, 68, 68, 0.06);

            border:
                1px solid rgba(239, 68, 68, 0.18);

            color:
                var(--color-error);
        }


        /* ==========================================================
           THEME TOGGLE
        ========================================================== */

        .theme-toggle-admin {
            display: inline-flex;
            align-items: center;
            gap: 0.4rem;

            padding: 0.4rem 0.75rem;

            background:
                var(--color-bg-card);

            border:
                1px solid var(--color-border);

            border-radius: 999px;

            color:
                var(--color-text-secondary);

            cursor: pointer;

            font-family:
                'Work Sans',
                sans-serif;

            font-size: 0.75rem;

            font-weight: 500;

            transition:
                background-color 0.2s ease,
                color 0.2s ease,
                border-color 0.2s ease,
                transform 0.2s ease,
                box-shadow 0.2s ease;
        }

        .theme-toggle-admin:hover {
            background:
                var(--color-primary);

            border-color:
                var(--color-primary);

            color: #FFFFFF;

            transform:
                translateY(-1px);

            box-shadow:
                0 5px 15px var(--color-shadow);
        }

        .theme-toggle-admin:active {
            transform:
                translateY(0);
        }

        .theme-toggle-admin svg {
            width: 14px;
            height: 14px;
        }


        /* ==========================================================
           MAIN ADMIN SURFACE
        ========================================================== */

        .admin-main {
            background:
                var(--color-bg);

            color:
                var(--color-text-secondary);

            transition:
                background-color 0.25s ease,
                color 0.25s ease;
        }


        /* ==========================================================
           FORM CONTROLS
        ========================================================== */

        .admin-input {
            width: 100%;

            background:
                var(--color-bg-card);

            color:
                var(--color-text-primary);

            border:
                1px solid var(--color-border);

            border-radius:
                0.75rem;

            transition:
                border-color 0.2s ease,
                box-shadow 0.2s ease,
                background-color 0.2s ease;
        }

        .admin-input::placeholder {
            color:
                var(--color-text-muted);
        }

        .admin-input:focus {
            outline: none;

            border-color:
                var(--color-primary);

            box-shadow:
                0 0 0 3px var(--color-primary-soft);
        }


        /* ==========================================================
           LINKS
        ========================================================== */

        .admin-link {
            color:
                var(--color-primary);

            transition:
                color 0.2s ease;
        }

        .admin-link:hover {
            color:
                var(--color-primary-hover);
        }


        /* ==========================================================
           RESPONSIVE
        ========================================================== */

        @media (max-width: 767px) {
            .desktop-sidebar {
                display: none !important;
            }

            .mobile-toggle-btn {
                display: inline-flex;
            }

            .admin-main {
                padding: 1rem;
                width: 100%;
                margin-left: 0 !important;
            }
        }

        @media (min-width: 768px) {
            .mobile-toggle-btn {
                display: none !important;
            }

            .mobile-sidebar-overlay {
                display: none !important;
            }

            .mobile-sidebar {
                display: none !important;
            }
        }


        /* ==========================================================
           ACCESSIBILITY
        ========================================================== */

        @media (prefers-reduced-motion: reduce) {

            *,
            *::before,
            *::after {
                animation-duration: 0.01ms !important;
                animation-iteration-count: 1 !important;
                transition-duration: 0.01ms !important;
                scroll-behavior: auto !important;
            }
        }
    </style>


    {{-- ============================================================
        Theme + HTMX
    ============================================================ --}}
    <script>
        /*
        |--------------------------------------------------------------------------
        | Prevent theme flash
        |--------------------------------------------------------------------------
        */

        (() => {

            const savedTheme =
                localStorage.getItem('theme');

            const theme =
                savedTheme === 'dark' ||
                savedTheme === 'light' ?
                savedTheme :
                'light';

            document.documentElement.setAttribute(
                'data-theme',
                theme
            );

        })();


        /*
        |--------------------------------------------------------------------------
        | HTMX CSRF
        |--------------------------------------------------------------------------
        */

        document.addEventListener(
            'htmx:configRequest',
            (event) => {

                const token =
                    document.querySelector(
                        'meta[name="csrf-token"]'
                    );

                if (token) {

                    event.detail.headers[
                        'X-CSRF-TOKEN'
                    ] = token.content;

                }

            }
        );


        /*
        |--------------------------------------------------------------------------
        | Theme toggle
        |--------------------------------------------------------------------------
        */

        function toggleTheme() {

            const html =
                document.documentElement;

            const currentTheme =
                html.getAttribute('data-theme') ||
                'light';

            const newTheme =
                currentTheme === 'dark' ?
                'light' :
                'dark';

            html.setAttribute(
                'data-theme',
                newTheme
            );

            localStorage.setItem(
                'theme',
                newTheme
            );

            updateAdminThemeUI(
                newTheme
            );
        }


        /*
        |--------------------------------------------------------------------------
        | Update theme UI
        |--------------------------------------------------------------------------
        */

        function updateAdminThemeUI(theme) {

            const isDark =
                theme === 'dark';


            const icons =
                document.querySelectorAll(
                    '.theme-toggle-admin svg'
                );


            const labels =
                document.querySelectorAll(
                    '.theme-toggle-label'
                );


            icons.forEach((icon) => {

                icon.innerHTML =
                    isDark ?
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

            });


            labels.forEach((label) => {

                label.textContent =
                    isDark ?
                    'Light' :
                    'Dark';

            });

        }


        /*
        |--------------------------------------------------------------------------
        | Initialize theme UI
        |--------------------------------------------------------------------------
        */

        document.addEventListener(
            'DOMContentLoaded',
            () => {

                const theme =
                    document.documentElement
                    .getAttribute('data-theme') ||
                    'light';

                updateAdminThemeUI(
                    theme
                );

            }
        );


        /*
        |--------------------------------------------------------------------------
        | Mobile Sidebar Functions
        |--------------------------------------------------------------------------
        */

        function toggleMobileSidebar() {
            const sidebar = document.getElementById('mobileSidebar');
            const overlay = document.getElementById('mobileSidebarOverlay');

            if (!sidebar || !overlay) return;

            const isOpen = sidebar.classList.toggle('open');
            overlay.classList.toggle('active');

            document.body.style.overflow = isOpen ? 'hidden' : '';
        }

        function closeMobileSidebar() {
            const sidebar = document.getElementById('mobileSidebar');
            const overlay = document.getElementById('mobileSidebarOverlay');

            if (!sidebar || !overlay) return;

            sidebar.classList.remove('open');
            overlay.classList.remove('active');

            document.body.style.overflow = '';
        }

        // Close on escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                closeMobileSidebar();
            }
        });

        // Close on resize to desktop
        window.addEventListener('resize', function() {
            if (window.innerWidth >= 768) {
                closeMobileSidebar();
            }
        });
    </script>


    @stack('styles')

</head>


<body
    class="body-font antialiased min-h-screen overflow-x-hidden"
    style="
        background: var(--color-bg);
        color: var(--color-text-secondary);
    ">

    <div
        class="
            relative
            min-h-screen
            w-full
            flex
            flex-col
            md:flex-row
        ">


        {{-- ========================================================
            SIDEBAR - DESKTOP
        ========================================================= --}}
        <aside
            class="desktop-sidebar
                w-72
                shrink-0
                sticky
                top-0
                h-screen
                z-30
                hidden
                md:block
            ">

            <x-sidebar />


        </aside>


        {{-- ========================================================
            SIDEBAR - MOBILE OVERLAY
        ========================================================= --}}
        <div
            id="mobileSidebarOverlay"
            class="mobile-sidebar-overlay"
            onclick="closeMobileSidebar()">
        </div>


        {{-- ========================================================
            SIDEBAR - MOBILE
        ========================================================= --}}
        <div
            id="mobileSidebar"
            class="mobile-sidebar">

            <button
                onclick="closeMobileSidebar()"
                class="mobile-close-btn"
                aria-label="Close sidebar">

                ✕

            </button>

            <x-sidebar :mobile="true" />

        </div>


        {{-- ========================================================
            MOBILE TOGGLE BUTTON
        ========================================================= --}}
        <button
            onclick="toggleMobileSidebar()"
            class="mobile-toggle-btn"
            aria-label="Toggle sidebar">

            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>

        </button>


        {{-- ========================================================
            MAIN CONTENT
        ========================================================= --}}
        <main
            class="
                admin-main
                w-full
                flex-1
                p-4
                sm:p-6
                lg:p-8
                min-h-screen
                box-border
            ">

            <div
                class="
                    w-full
                    max-w-7xl
                    mx-auto
                ">


                {{-- ==================================================
                    HEADER
                ================================================== --}}
                <header
                    class="
                        flex
                        justify-end
                        mb-6
                    ">

                    <button
                        type="button"
                        onclick="toggleTheme()"
                        class="theme-toggle-admin"
                        aria-label="Toggle dark and light mode">

                        <svg
                            id="admin-theme-icon"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                            aria-hidden="true">

                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />

                        </svg>

                        <span class="theme-toggle-label">
                            Dark
                        </span>

                    </button>

                </header>


                {{-- ==================================================
                    SUCCESS MESSAGE
                ================================================== --}}
                @if(session('success'))

                <div
                    class="
                            success-message
                            mb-5
                            p-4
                            rounded-xl
                            text-sm
                            flex
                            items-start
                            gap-3
                        "
                    role="alert">

                    <svg
                        class="w-5 h-5 shrink-0 mt-0.5"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24">

                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />

                    </svg>

                    <span class="break-words">
                        {{ session('success') }}
                    </span>

                </div>

                @endif


                {{-- ==================================================
                    ERROR MESSAGE
                ================================================== --}}
                @if(session('error'))

                <div
                    class="
                            error-message
                            mb-5
                            p-4
                            rounded-xl
                            text-sm
                            flex
                            items-start
                            gap-3
                        "
                    role="alert">

                    <svg
                        class="w-5 h-5 shrink-0 mt-0.5"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24">

                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77-1.333.192-3 1.732 3z" />

                    </svg>

                    <span class="break-words">
                        {{ session('error') }}
                    </span>

                </div>

                @endif


                {{-- ==================================================
                    PAGE CONTENT
                ================================================== --}}
                @yield('content')

            </div>

        </main>

    </div>


    @stack('scripts')

</body>

</html>