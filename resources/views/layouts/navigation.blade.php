<nav x-data="{ open: false }" class="bg-[#0a0a0a] border-b border-white/5 body-font">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('posts.index') }}" class="heading-font text-2xl sm:text-3xl font-bold tracking-tight text-white hover:text-rust transition-colors duration-300 flex items-center gap-2 group">
                        <span class="text-rust group-hover:scale-110 transition-transform duration-300">✦</span>
                        <span>chronicle</span>
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('posts.index')" :active="request()->routeIs('posts.index')" class="text-white/60 hover:text-white border-rust heading-font font-medium">
                        {{ __('Home') }}
                    </x-nav-link>
                    <x-nav-link :href="route('posts.categories')" :active="request()->routeIs('posts.categories')" class="text-white/60 hover:text-white border-rust heading-font font-medium">
                        {{ __('Categories') }}
                    </x-nav-link>
                    @auth
                        @if(Auth::user()->isAuthor())
                            <x-nav-link :href="route('author.dashboard')" :active="request()->routeIs('author.dashboard')" class="text-white/60 hover:text-white border-rust heading-font font-medium">
                                {{ __('Author Dashboard') }}
                            </x-nav-link>
                        @endif
                    @endauth
                </div>
            </div>

            <!-- Settings Dropdown / Guest Auth -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                @auth
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="inline-flex items-center px-3 py-1.5 border border-rust/30 text-sm font-medium rounded-full text-white/75 bg-[#121212] hover:border-rust focus:outline-none transition ease-in-out duration-300 heading-font">
                                <div class="w-6 h-6 rounded-full bg-rust/20 text-rust flex items-center justify-center font-bold text-xs me-2">
                                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                                </div>
                                <div>{{ Auth::user()->name }}</div>

                                <div class="ms-1">
                                    <svg class="fill-current h-4 w-4 text-white/30" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <!-- Profile Link -->
                            <x-dropdown-link :href="route('profile.index')" class="text-white/75 hover:text-rust hover:bg-white/5 transition-colors heading-font">
                                {{ __('Profile') }}
                            </x-dropdown-link>

                            <!-- Saved Posts -->
                            <x-dropdown-link :href="route('users.saved')" class="text-white/75 hover:text-rust hover:bg-white/5 transition-colors heading-font">
                                {{ __('Saved Posts') }}
                            </x-dropdown-link>

                            <!-- Reading History -->
                            <x-dropdown-link :href="route('users.history')" class="text-white/75 hover:text-rust hover:bg-white/5 transition-colors heading-font">
                                {{ __('Reading History') }}
                            </x-dropdown-link>

                            <div class="border-t border-white/5 my-2"></div>

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-dropdown-link :href="route('logout')"
                                        onclick="event.preventDefault();
                                                    this.closest('form').submit();"
                                        class="text-red-400 hover:text-red-300 hover:bg-red-500/10 transition-colors heading-font">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                @else
                    <div class="space-x-4">
                        <a href="{{ route('login') }}" class="text-sm text-white/60 hover:text-white font-medium heading-font transition-colors duration-300">Log in</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="text-sm px-4 py-2 rounded-full bg-rust hover:bg-rust/80 text-white font-semibold transition-all duration-300 shadow-lg shadow-rust/20 hover:shadow-rust/40 transform hover:scale-105 heading-font">
                                Register
                            </a>
                        @endif
                    </div>
                @endauth
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-white/40 hover:text-white hover:bg-white/5 focus:outline-none focus:bg-white/5 transition duration-300">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden bg-[#0a0a0a] border-t border-white/5">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('posts.index')" :active="request()->routeIs('posts.index')" class="text-white/60 hover:text-white hover:bg-white/5 transition-colors heading-font">
                {{ __('Home') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('posts.categories')" :active="request()->routeIs('posts.categories')" class="text-white/60 hover:text-white hover:bg-white/5 transition-colors heading-font">
                {{ __('Categories') }}
            </x-responsive-nav-link>
            @auth
                @if(Auth::user()->isAuthor())
                    <x-responsive-nav-link :href="route('author.dashboard')" :active="request()->routeIs('author.dashboard')" class="text-white/60 hover:text-white hover:bg-white/5 transition-colors heading-font">
                        {{ __('Author Dashboard') }}
                    </x-responsive-nav-link>
                @endif
            @endauth
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-white/5">
            @auth
                <div class="px-4">
                    <div class="font-medium text-base text-white heading-font">{{ Auth::user()->name }}</div>
                    <div class="font-medium text-sm text-white/40 body-font">{{ Auth::user()->email }}</div>
                </div>

                <div class="mt-3 space-y-1">
                    <x-responsive-nav-link :href="route('profile.index')" class="text-white/60 hover:text-white hover:bg-white/5 transition-colors heading-font">
                        {{ __('Profile') }}
                    </x-responsive-nav-link>
                    <x-responsive-nav-link :href="route('users.saved')" class="text-white/60 hover:text-white hover:bg-white/5 transition-colors heading-font">
                        {{ __('Saved Posts') }}
                    </x-responsive-nav-link>
                    <x-responsive-nav-link :href="route('users.history')" class="text-white/60 hover:text-white hover:bg-white/5 transition-colors heading-font">
                        {{ __('Reading History') }}
                    </x-responsive-nav-link>

                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-responsive-nav-link :href="route('logout')"
                                onclick="event.preventDefault();
                                            this.closest('form').submit();"
                                class="text-red-400 hover:text-red-300 hover:bg-red-500/10 transition-colors heading-font">
                            {{ __('Log Out') }}
                        </x-responsive-nav-link>
                    </form>
                </div>
            @else
                <div class="pt-2 pb-3 space-y-1">
                    <x-responsive-nav-link :href="route('login')" class="text-white/60 hover:text-white hover:bg-white/5 transition-colors heading-font">
                        {{ __('Log in') }}
                    </x-responsive-nav-link>
                    @if (Route::has('register'))
                        <x-responsive-nav-link :href="route('register')" class="text-white/60 hover:text-white hover:bg-white/5 transition-colors heading-font">
                            {{ __('Register') }}
                        </x-responsive-nav-link>
                    @endif
                </div>
            @endauth
        </div>
    </div>
</nav>