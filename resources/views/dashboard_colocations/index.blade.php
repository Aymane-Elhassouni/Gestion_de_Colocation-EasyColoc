<x-app-layout>
    <div class="p-6 lg:p-8" x-data="{ showModal: false }">

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

        <div
            class="bg-gradient-to-r from-blue-600 to-blue-500 rounded-[2rem] p-8 mb-8 text-white relative overflow-hidden shadow-lg shadow-blue-200">
            <div class="absolute right-0 top-0 w-64 h-64 bg-white/10 rounded-full -mr-20 -mt-20 blur-2xl"></div>
            <div class="absolute left-1/4 bottom-0 w-32 h-32 bg-white/5 rounded-full blur-xl"></div>

            <div class="relative z-10">
                <h3 class="text-2xl md:text-3xl font-bold mb-2">Bonjour, {{ Auth::user()->firstname }}
                    {{ Auth::user()->lastname }} 👋</h3>
                <p class="text-blue-100 opacity-90">Voici un résumé de vos colocations et dépenses.</p>
            </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <div
                class="bg-white p-6 rounded-[1.5rem] shadow-sm border border-slate-100 flex flex-col justify-between hover:shadow-md transition-shadow">
                <div class="flex justify-between items-start mb-4">
                    <div class="w-10 h-10 bg-blue-50 rounded-xl flex items-center justify-center text-blue-600">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <span
                        class="bg-red-50 text-red-500 text-[10px] font-bold px-2 py-1 rounded-full uppercase tracking-wider">Débiteur</span>
                </div>
                <div>
                    <p class="text-2xl font-black text-slate-800">529,91 €</p>
                    <p class="text-sm text-slate-400 font-medium">Solde actuel</p>
                </div>
            </div>

            <div
                class="bg-white p-6 rounded-[1.5rem] shadow-sm border border-slate-100 hover:shadow-md transition-shadow">
                <div class="w-10 h-10 bg-green-50 rounded-xl flex items-center justify-center text-green-600 mb-4">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <p class="text-2xl font-black text-slate-800">186,05 €</p>
                <p class="text-sm text-slate-400 font-medium">Total payé</p>
            </div>

            <div
                class="bg-white p-6 rounded-[1.5rem] shadow-sm border border-slate-100 hover:shadow-md transition-shadow">
                <div class="w-10 h-10 bg-purple-50 rounded-xl flex items-center justify-center text-purple-600 mb-4">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                    </svg>
                </div>
                <p class="text-2xl font-black text-slate-800">78/100</p>
                <p class="text-sm text-slate-400 font-medium mb-2">Réputation</p>
                <div class="w-full bg-slate-100 h-1.5 rounded-full">
                    <div class="bg-cyan-400 h-1.5 rounded-full" style="width: 78%"></div>
                </div>
            </div>

            <div
                class="bg-white p-6 rounded-[1.5rem] shadow-sm border border-slate-100 hover:shadow-md transition-shadow">
                <div class="w-10 h-10 bg-orange-50 rounded-xl flex items-center justify-center text-orange-500 mb-4">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                </div>
                <p class="text-2xl font-black text-slate-800">4</p>
                <p class="text-sm text-slate-400 font-medium">Colocataires</p>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">

            <div class="bg-white p-6 rounded-[1.5rem] shadow-sm border border-slate-100">
                <div class="flex justify-between items-center mb-6">
                    <h4 class="font-bold text-slate-800">Mes Colocations</h4>
                    <button @click="showModal = true" type="button"
                        class="bg-blue-600 text-white text-xs font-bold flex items-center gap-2 py-2 px-4 rounded-xl hover:bg-blue-700 transition-all shadow-md shadow-blue-100">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                d="M12 4v16m8-8H4" />
                        </svg>
                        Créer
                    </button>
                    <a href="#" class="text-blue-500 text-xs font-bold hover:underline">Voir toutes →</a>
                </div>
                <div class="space-y-4">
                    @forelse($colocations as $colocation)
                        <div
                            class="bg-slate-50 p-4 rounded-2xl border border-slate-100 flex justify-between items-center transition-hover hover:shadow-md">
                            <div>
                                <p class="font-bold text-slate-800">{{ $colocation->name }}</p>
                                <p class="text-xs text-slate-400">{{ Str::limit($colocation->description, 60) }}</p>
                            </div>
                            <div class="flex gap-2">
                                <span
                                    class="bg-green-100 text-green-600 text-[10px] font-bold px-2 py-0.5 rounded-full">
                                    {{ $colocation->pivot->role_colocation ?? 'Member' }}
                                </span>
                                <span class="bg-green-500 text-white text-[10px] font-bold px-2 py-0.5 rounded-full">
                                    {{ $colocation->status }}
                                </span>
                            </div>
                        </div>
                    @empty
                        <div class="text-center py-6">
                            <p class="text-slate-400 text-sm">Vous n'avez pas encore de colocations.</p>
                        </div>
                    @endforelse
                </div>
            </div>

            <div class="bg-white p-6 rounded-[1.5rem] shadow-sm border border-slate-100">
                <div class="flex justify-between items-center mb-6">
                    <h4 class="font-bold text-slate-800">Dépenses Récentes</h4>
                    <a href="#" class="text-blue-500 text-xs font-bold hover:underline">Toutes →</a>
                </div>
                <table class="w-full text-left">
                    <thead class="text-[10px] uppercase font-bold text-slate-400 border-b border-slate-50">
                        <tr>
                            <th class="pb-3">Dépense</th>
                            <th class="pb-3 text-center">Payeur</th>
                            <th class="pb-3 text-center">Montant</th>
                            <th class="pb-3 text-right">Date</th>
                        </tr>
                    </thead>
                    <tbody class="text-xs font-medium">
                        <tr class="border-b border-slate-50 last:border-0">
                            <td class="py-4">
                                <p class="text-slate-800 font-bold">Facture EDF Fév</p>
                                <p class="text-[10px] text-slate-400">Électricité</p>
                            </td>
                            <td class="py-4 text-center">
                                <span class="bg-slate-100 px-2 py-1 rounded-md text-slate-600">Clara Leroy</span>
                            </td>
                            <td class="py-4 text-center font-bold text-slate-800">72,10 €</td>
                            <td class="py-4 text-right text-slate-400">18 févr. 2026</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div x-show="showModal" class="fixed inset-0 z-[999] flex items-center justify-center p-4"
            style="display: none;" x-cloak>

            <div x-show="showModal" x-transition.opacity @click="showModal = false"
                class="fixed inset-0 bg-slate-900/60 backdrop-blur-sm"></div>

            <div x-show="showModal" x-transition.scale.95
                class="relative bg-white rounded-[2rem] p-8 shadow-2xl w-full max-w-lg z-10 border border-slate-100">

                <div class="flex items-center justify-between mb-8">
                    <h3 class="text-xl font-bold text-slate-800">Nouvelle colocation</h3>
                    <button @click="showModal = false" class="text-slate-400 hover:text-slate-600 p-2">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                <form action="{{ route('admin.colocations.store') }}" method="POST" class="space-y-4">
                    @csrf
                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-1.5">Nom de la colocation *</label>
                        <input type="text" name="name"
                            class="w-full border-slate-200 rounded-xl px-4 py-3 focus:ring-4 focus:ring-blue-500/10 focus:border-blue-500 outline-none transition-all"
                            placeholder="ex: Appartement Voltaire" required />
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-1.5">Description *</label>
                        <textarea name="description" rows="3"
                            class="w-full border-slate-200 rounded-xl px-4 py-3 focus:ring-4 focus:ring-blue-500/10 focus:border-blue-500 outline-none transition-all"
                            placeholder="Description courte..." required></textarea>
                    </div>

                    <div class="flex gap-4 pt-6">
                        <button type="submit"
                            class="flex-1 bg-blue-600 text-white py-3.5 rounded-2xl font-bold hover:bg-blue-700 shadow-lg shadow-blue-200 active:scale-95 transition-all">Créer</button>
                        <button type="button" @click="showModal = false"
                            class="flex-1 bg-slate-100 text-slate-600 py-3.5 rounded-2xl font-bold hover:bg-slate-200 active:scale-95 transition-all">Annuler</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
</x-app-layout>
