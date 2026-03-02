<aside x-data="{ sidebarOpen: true }" :class="sidebarOpen ? 'w-64' : 'w-20'"
    class="fixed left-0 top-0 h-screen bg-[#1e293b] text-slate-300 transition-all duration-300 z-50 flex flex-col shadow-2xl">
    <div class="p-5 flex items-center justify-between border-b border-slate-700/50">
        <div class="flex items-center gap-3 overflow-hidden">
            <div
                class="w-10 h-10 bg-blue-600 rounded-xl flex items-center justify-center flex-shrink-0 shadow-lg shadow-blue-500/30">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                        d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                </svg>
            </div>
            <span x-show="sidebarOpen" x-transition.opacity
                class="text-white font-bold text-xl tracking-tight">ColocManager</span>
        </div>
        <button @click="sidebarOpen = !sidebarOpen; $dispatch('toggle-sidebar', sidebarOpen)"
            class="p-1 hover:bg-slate-700 rounded-lg transition-colors">
            <svg :class="!sidebarOpen ? 'rotate-180' : ''"
                class="w-5 h-5 transition-transform duration-300 text-slate-400" fill="none" stroke="currentColor"
                viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 19l-7-7 7-7" />
            </svg>
        </button>
    </div>

    <nav class="flex-1 px-3 py-6 space-y-2 overflow-y-auto">
        @auth
            @php
                $isAdmin = Auth::user()->role_id == 2;
                $dashRoute = $isAdmin ? 'admin.dashboard' : 'user.dashboard';
                $colocRoute = $isAdmin ? 'admin.colocations.index' : 'user.colocations.index';
            @endphp

            @if (auth()->user() && auth()->user()->role_id === 2)
                <a href="{{ route('admin.dashboard') }}"
                    class="flex items-center gap-4 px-4 py-3 rounded-xl transition-all group {{ request()->routeIs('admin.dashboard') ? 'bg-white/10 text-white font-semibold' : 'hover:bg-white/5 hover:text-white' }}">

                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                    </svg>

                    <span x-show="sidebarOpen" class="whitespace-nowrap">Dashboard</span>
                </a>
            @endif

            <a href="{{ route($dashRoute) }}"
                class="flex items-center gap-4 px-4 py-3 rounded-xl transition-all group {{ request()->routeIs('*.dashboard') ? 'bg-white/10 text-white font-semibold' : 'hover:bg-white/5 hover:text-white' }}">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
                </svg>
                <span x-show="sidebarOpen" class="whitespace-nowrap">Colocation</span>
            </a>

            <a href="{{ route($colocRoute) }}"
                class="flex items-center gap-4 px-4 py-3 rounded-xl transition-all group {{ request()->routeIs('*.colocations.*') ? 'bg-white/10 text-white font-semibold' : 'hover:bg-white/5 hover:text-white' }}">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
                <span x-show="sidebarOpen" class="whitespace-nowrap">Colocation Dashboard</span>
            </a>

            <a href="{{ route('profile.edit') }}"
                class="flex items-center gap-4 px-4 py-3 rounded-xl transition-all group {{ request()->routeIs('profile.*') ? 'bg-white/10 text-white font-semibold' : 'hover:bg-white/5 hover:text-white' }}">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                </svg>
                <span x-show="sidebarOpen" class="whitespace-nowrap">Mon Profil</span>
            </a>
        @endauth
    </nav>

    <div class="p-4 border-t border-slate-700/50">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit"
                class="w-full flex items-center gap-4 px-4 py-3 rounded-xl text-slate-400 hover:bg-red-500/10 hover:text-red-400 transition-all">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                </svg>
                <span x-show="sidebarOpen" class="font-medium">Déconnexion</span>
            </button>
        </form>
    </div>
</aside>
