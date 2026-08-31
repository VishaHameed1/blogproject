<nav class="bg-[#121212] text-zinc-100 border-b border-zinc-800 shadow-xl font-['Work_Sans',sans-serif]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16">
            <!-- Left Side: Mobile Toggle & Logo & Links -->
            <div class="flex items-center space-x-4 md:space-x-8">
                <!-- Mobile Hamburger Button -->
                <button
                    id="sidebar-toggle-btn"
                    type="button"
                    onclick="openAuthorSidebar()"
                    class="md:hidden p-2 rounded-md text-zinc-400 hover:text-white hover:bg-zinc-900 focus:outline-none transition"
                    aria-label="Open navigation"
                >
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                </button>

                <a href="{{ route('author.dashboard') }}" class="font-bold text-xl text-orange-400 tracking-wide hover:text-orange-300 transition font-['Poppins',sans-serif]">
                    ✍️ Author Panel
                </a>
                
                <div class="hidden md:flex space-x-4 font-['Poppins',sans-serif]">
                    <a href="{{ route('author.dashboard') }}" 
                       class="px-3 py-2 rounded-md text-sm font-medium transition {{ request()->routeIs('author.dashboard') ? 'bg-orange-600 text-white shadow-md' : 'text-zinc-400 hover:bg-zinc-900 hover:text-white' }}">
                        Dashboard
                    </a>
                    <a href="{{ route('author.posts.index') }}" 
                       class="px-3 py-2 rounded-md text-sm font-medium transition {{ request()->routeIs('author.posts.*') ? 'bg-orange-600 text-white shadow-md' : 'text-zinc-400 hover:bg-zinc-900 hover:text-white' }}">
                        My Posts
                    </a>
                    <a href="{{ route('author.posts.create') }}" 
                       class="px-3 py-2 bg-orange-600 hover:bg-orange-500 text-white rounded-md text-sm font-medium transition shadow-md">
                        + New Post
                    </a>
                </div>
            </div>

            <!-- Right Side: User Profile & Public Site Link -->
            <div class="flex items-center space-x-3 sm:space-x-4 font-['Poppins',sans-serif]">
                <a href="{{ route('posts.index') }}" target="_blank" class="text-xs bg-zinc-900 hover:bg-zinc-800 border border-orange-500/30 px-3 py-1.5 rounded-full text-orange-400 hover:text-orange-300 transition hidden sm:inline-block">
                    🌐 View Main Blog
                </a>
                
                <span class="text-sm font-medium text-zinc-200 truncate max-w-[120px] sm:max-w-none">{{ auth()->user()->name ?? 'Author' }}</span>

                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf
                    <button type="submit" class="text-xs bg-orange-700 hover:bg-orange-600 text-white px-3 py-1.5 rounded-md font-medium transition shadow">
                        Logout
                    </button>
                </form>
            </div>
        </div>
    </div>
</nav>