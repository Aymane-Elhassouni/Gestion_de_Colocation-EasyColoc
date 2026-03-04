<x-app-layout>
    <div class="flex flex-col md:flex-row md:items-center justify-between mb-8 gap-4">
            <div>
                <h1 class="text-2xl font-bold text-slate-800">Dashboard</h1>
                <p class="text-slate-500 text-sm">Vue d'ensemble de vos colocations</p>
            </div>

            <div class="flex items-center gap-3 self-end md:self-auto">
                <div class="text-right hidden sm:block">
                    <p class="text-sm font-bold text-slate-800">{{ Auth::user()->firstname }}
                        {{ Auth::user()->lastname }}</p>
                    <p class="text-xs text-slate-500">{{ Auth::user()->email }}</p>
                </div>
                <div
                    class="w-12 h-12 bg-[#ec4899] rounded-full flex items-center justify-center text-white font-bold text-lg shadow-sm border-2 border-white">
                    {{ strtoupper(substr(Auth::user()->firstname, 0, 1)) }}
                    {{ strtoupper(substr(Auth::user()->lastname, 0, 1)) }}
                </div>
                <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
            </div>
        </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
