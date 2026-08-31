<!DOCTYPE html>
<html lang="en" class="h-full bg-[#0a0a0a]">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Admin · chronicle')</title>
    
    <!-- Fonts - Poppins for Headings + Work Sans for Body -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&family=Work+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Vite Assets -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <!-- Third-Party Scripts -->
    <script src="https://unpkg.com/htmx.org@1.9.12"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    
    <style>
        /* Heading font - Poppins */
        .heading-font {
            font-family: 'Poppins', ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif !important;
            letter-spacing: -0.02em !important;
        }

        /* Body font - Work Sans */
        .body-font {
            font-family: 'Work Sans', ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif !important;
        }

        /* Selection color */
        ::selection {
            background-color: rgba(196, 90, 46, 0.3) !important;
            color: #ffffff !important;
        }

        /* Scrollbar styling */
        ::-webkit-scrollbar {
            width: 6px;
        }
        ::-webkit-scrollbar-track {
            background: #0a0a0a;
        }
        ::-webkit-scrollbar-thumb {
            background: #c45a2e;
            border-radius: 3px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #a0461a;
        }

        /* Card hover effect */
        .card-hover {
            transition: all 0.3s ease;
        }
        .card-hover:hover {
            border-color: rgba(196, 90, 46, 0.3);
            transform: translateY(-2px);
        }

        /* Stat card */
        .stat-card {
            background-color: #121212;
            border: 1px solid rgba(255, 255, 255, 0.05);
            border-radius: 1rem;
            padding: 1.5rem;
            text-align: center;
            transition: all 0.3s ease;
        }
        .stat-card:hover {
            border-color: rgba(196, 90, 46, 0.3);
            transform: translateY(-2px);
        }

        /* Quick action card */
        .quick-action {
            background-color: #121212;
            border: 1px solid rgba(255, 255, 255, 0.05);
            border-radius: 0.75rem;
            padding: 1rem;
            transition: all 0.3s ease;
        }
        .quick-action:hover {
            background-color: rgba(196, 90, 46, 0.05);
            border-color: rgba(196, 90, 46, 0.3);
            transform: translateY(-2px);
        }

        /* Activity item */
        .activity-item {
            padding: 0.75rem 0;
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
            transition: all 0.3s ease;
        }
        .activity-item:last-child {
            border-bottom: none;
        }
        .activity-item:hover {
            padding-left: 0.5rem;
        }

        /* Button styles */
        .btn-rust {
            background-color: #c45a2e;
            color: #ffffff;
            padding: 0.5rem 1.5rem;
            border-radius: 9999px;
            font-weight: 600;
            transition: all 0.3s ease;
            font-family: 'Poppins', sans-serif;
        }
        .btn-rust:hover {
            background-color: rgba(196, 90, 46, 0.8);
            box-shadow: 0 4px 15px rgba(196, 90, 46, 0.3);
            transform: scale(1.02);
        }

        /* Badge styles */
        .badge-pending {
            background-color: rgba(196, 90, 46, 0.15);
            color: #c45a2e;
            padding: 0.25rem 0.75rem;
            border-radius: 9999px;
            font-size: 0.65rem;
            font-weight: 600;
            font-family: 'Poppins', sans-serif;
            border: 1px solid rgba(196, 90, 46, 0.2);
        }
        .badge-published {
            background-color: rgba(74, 222, 128, 0.15);
            color: #4ade80;
            padding: 0.25rem 0.75rem;
            border-radius: 9999px;
            font-size: 0.65rem;
            font-weight: 600;
            font-family: 'Poppins', sans-serif;
            border: 1px solid rgba(74, 222, 128, 0.2);
        }
        .badge-draft {
            background-color: rgba(255, 255, 255, 0.05);
            color: rgba(255, 255, 255, 0.4);
            padding: 0.25rem 0.75rem;
            border-radius: 9999px;
            font-size: 0.65rem;
            font-weight: 600;
            font-family: 'Poppins', sans-serif;
            border: 1px solid rgba(255, 255, 255, 0.05);
        }

        /* Table styles */
        .admin-table {
            width: 100%;
            font-size: 0.875rem;
        }
        .admin-table thead {
            background-color: rgba(10, 10, 10, 0.8);
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
        }
        .admin-table thead th {
            padding: 0.75rem 1rem;
            text-align: left;
            font-weight: 600;
            color: rgba(255, 255, 255, 0.4);
            font-family: 'Poppins', sans-serif;
            font-size: 0.65rem;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }
        .admin-table tbody tr {
            border-bottom: 1px solid rgba(255, 255, 255, 0.03);
            transition: all 0.3s ease;
        }
        .admin-table tbody tr:hover {
            background-color: rgba(196, 90, 46, 0.03);
        }
        .admin-table tbody td {
            padding: 0.75rem 1rem;
            color: rgba(255, 255, 255, 0.6);
        }

        /* Status dot */
        .status-dot {
            display: inline-block;
            width: 6px;
            height: 6px;
            border-radius: 50%;
            margin-right: 0.5rem;
        }
        .status-dot.pending {
            background-color: #c45a2e;
        }
        .status-dot.published {
            background-color: #4ade80;
        }
        .status-dot.draft {
            background-color: rgba(255, 255, 255, 0.2);
        }
    </style>
    
    <!-- HTMX CSRF Configuration -->
    <script>
        document.addEventListener('htmx:configRequest', (event) => {
            const token = document.querySelector('meta[name="csrf-token"]');
            if (token) {
                event.detail.headers['X-CSRF-TOKEN'] = token.content;
            }
        });
    </script>
    
    @stack('styles')
</head>
<body class="body-font antialiased bg-[#0a0a0a] text-white/75 min-h-screen overflow-x-hidden selection:bg-rust/30 selection:text-white">
    <div class="relative min-h-screen w-full flex flex-col md:flex-row">
        
        {{-- Sidebar: Permanent fixed position on desktop --}}
        <aside class="w-full md:w-64 md:fixed md:top-0 md:left-0 md:h-screen z-50 shrink-0 border-r border-white/5 bg-[#0a0a0a]">
            <x-sidebar />
        </aside>

        {{-- Main Content --}}
        <main class="w-full md:w-[calc(100%-16rem)] md:ml-64 p-6 min-h-screen box-border">
            <div class="w-full max-w-7xl mx-auto">
                
                {{-- Status Messages --}}
                @if(session('success'))
                    <div class="mb-4 p-3 bg-green-400/5 border border-green-400/20 rounded-xl text-green-400 text-sm flex items-center gap-2">
                        <svg class="w-4 h-4 text-green-400 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        <span class="break-words">{{ session('success') }}</span>
                    </div>
                @endif

                @if(session('error'))
                    <div class="mb-4 p-3 bg-red-400/5 border border-red-400/20 rounded-xl text-red-400 text-sm flex items-center gap-2">
                        <svg class="w-4 h-4 text-red-400 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                        </svg>
                        <span class="break-words">{{ session('error') }}</span>
                    </div>
                @endif

                @yield('content')
            </div>
        </main>
        
    </div>

    @stack('scripts')
</body>
</html>