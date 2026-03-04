<x-app-layout>
    <div class="p-6 lg:p-8" x-data="{ showModal: false }" @keydown.escape="showModal = false">
        
        <div class="flex flex-col md:flex-row md:items-center justify-between mb-8 gap-4">
            <div>
                <h1 class="text-2xl font-bold text-slate-800">Dashboard</h1>
                <p class="text-slate-500 text-sm">Vue d'ensemble de vos activités</p>
            </div>

            <div class="flex items-center gap-3 self-end md:self-auto">
                <div class="text-right hidden sm:block">
                    <p class="text-sm font-bold text-slate-800">{{ Auth::user()->firstname }} {{ Auth::user()->lastname }}</p>
                    <p class="text-xs text-slate-500">{{ Auth::user()->email }}</p>
                </div>
                <div class="w-12 h-12 bg-[#ec4899] rounded-full flex items-center justify-center text-white font-bold text-lg shadow-sm border-2 border-white">
                    {{ strtoupper(substr(Auth::user()->firstname, 0, 1)) }}{{ strtoupper(substr(Auth::user()->lastname, 0, 1)) }}
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">
            <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-100 border-l-4 border-l-blue-500">
                <p class="text-slate-500 text-xs font-bold uppercase tracking-wider mb-1">Total Dépensé</p>
                <p class="text-2xl font-black text-slate-800">{{ number_format($totalDepenses ?? 0, 2) }} €</p>
            </div>
            <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-100 border-l-4 border-l-green-500">
                <p class="text-slate-500 text-xs font-bold uppercase tracking-wider mb-1">Ma Contribution</p>
                <p class="text-2xl font-black text-slate-800">{{ number_format($maContribution ?? 0, 2) }} €</p>
            </div>
            <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-100 border-l-4 border-l-orange-500">
                <p class="text-slate-500 text-xs font-bold uppercase tracking-wider mb-1">Mon Solde</p>
                <p class="text-2xl font-black {{ ($monSolde ?? 0) >= 0 ? 'text-green-600' : 'text-red-600' }}">
                    {{ number_format($monSolde ?? 0, 2) }} €
                </p>
            </div>
        </div>

        <div class="grid lg:grid-cols-3 gap-8">
            <div class="lg:col-span-2 space-y-6">
                <div class="flex justify-between items-center">
                    <h2 class="text-xl font-bold text-slate-800 flex items-center gap-2">
                        <svg class="w-5 h-5 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" /></svg>
                        Mes Colocations
                    </h2>
                    <button type="button" @click="showModal = true" class="text-sm font-bold text-indigo-600 hover:text-indigo-800 flex items-center gap-1 transition-transform active:scale-95">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                        Nouvelle
                    </button>
                </div>

                <div class="grid sm:grid-cols-2 gap-4">
                    @forelse($colocations as $colocation)
                        <a href="{{ route('admin.colocations.show', $colocation->id) }}" class="bg-white p-5 rounded-2xl border border-slate-100 shadow-sm hover:border-indigo-300 transition-all group relative overflow-hidden">
                            <div class="absolute top-0 right-0">
                                @if($colocation->status == 'active')
                                    <span class="text-[9px] font-black uppercase tracking-widest bg-green-100 text-green-600 px-3 py-1 rounded-bl-xl shadow-sm">Actif</span>
                                @else
                                    <span class="text-[9px] font-black uppercase tracking-widest bg-slate-100 text-slate-500 px-3 py-1 rounded-bl-xl">{{ $colocation->status }}</span>
                                @endif
                            </div>

                            <div class="pt-2">
                                <h3 class="font-bold text-slate-800 group-hover:text-indigo-600">{{ $colocation->name }}</h3>
                                <p class="text-xs text-slate-400 mt-1 line-clamp-1">{{ $colocation->description }}</p>
                                
                                <div class="flex items-center gap-3 mt-4">
                                    <div class="flex -space-x-2">
                                        @foreach(range(1, 3) as $i)
                                            <div class="w-6 h-6 rounded-full border-2 border-white bg-slate-100 flex items-center justify-center text-[8px] font-bold text-slate-400">
                                                U
                                            </div>
                                        @endforeach
                                    </div>
                                    <span class="text-[10px] text-slate-400 font-medium italic">Membres actifs</span>
                                </div>
                            </div>
                        </a>
                    @empty
                        <div class="col-span-2 bg-slate-50 border-2 border-dashed border-slate-200 rounded-2xl p-8 text-center text-slate-400">
                            Aucune colocation trouvée.
                        </div>
                    @endforelse
                </div>
            </div>

            <div class="space-y-8">
                <div>
                    <h2 class="text-xl font-bold text-slate-800 flex items-center gap-2 mb-4">
                        <svg class="w-5 h-5 text-pink-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                        Derniers Flux
                    </h2>
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-4 max-h-[280px] overflow-y-auto">
                        <div class="space-y-3">
                            @forelse($dernieresDepenses ?? [] as $depense)
                                <div class="flex justify-between items-center py-2 border-b border-slate-50 last:border-0">
                                    <div class="min-w-0">
                                        <p class="text-sm font-bold text-slate-800 truncate">{{ $depense->titre }}</p>
                                        <p class="text-[10px] text-slate-400">{{ $depense->user->firstname }}</p>
                                    </div>
                                    <span class="font-bold text-slate-700 whitespace-nowrap ml-2">{{ number_format($depense->montant, 2) }}€</span>
                                </div>
                            @empty
                                <p class="text-xs text-slate-400 text-center py-4">Rien à signaler.</p>
                            @endforelse
                        </div>
                    </div>
                </div>

                <div>
                    <h2 class="text-xl font-bold text-slate-800 flex items-center gap-2 mb-4">
                        <svg class="w-5 h-5 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-7.714 2.143L11 21l-2.286-6.857L1 12l7.714-2.143L11 3z" /></svg>
                        Réputation
                    </h2>
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden flex flex-col">
                        <div class="p-4 space-y-4 max-h-[320px] overflow-y-auto">
                            @forelse($topMembres ?? [] as $membre)
                                <div class="flex items-center gap-3">
                                    <div class="relative flex-shrink-0">
                                        <div class="w-10 h-10 rounded-full bg-slate-100 flex items-center justify-center font-bold text-slate-600 border border-slate-200">
                                            {{ substr($membre->firstname, 0, 1) }}
                                        </div>
                                        <div class="absolute -bottom-1 -right-1 bg-amber-400 text-[8px] text-white px-1 rounded-full border border-white font-black">
                                            LVL {{ $membre->level ?? 1 }}
                                        </div>
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <p class="text-sm font-bold text-slate-800 truncate">{{ $membre->firstname }}</p>
                                        <div class="w-full bg-slate-100 h-1.5 rounded-full mt-1">
                                            <div class="bg-amber-400 h-1.5 rounded-full" style="width: {{ $membre->reputation_score ?? 70 }}%"></div>
                                        </div>
                                    </div>
                                    <div class="text-right flex-shrink-0">
                                        <span class="text-xs font-black text-amber-600 whitespace-nowrap">{{ $membre->reputation_points ?? 0 }} pts</span>
                                    </div>
                                </div>
                            @empty
                                <p class="text-xs text-slate-400 text-center py-2">Initialisation des scores...</p>
                            @endforelse
                        </div>
                        <div class="bg-amber-50/50 p-2 text-center border-t border-amber-100">
                            <p class="text-[9px] font-bold text-amber-700 uppercase tracking-widest">Top Colocataires</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div x-show="showModal" class="fixed inset-0 z-[999] overflow-y-auto" style="display: none;" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100">
            <div class="fixed inset-0 bg-slate-900/60 backdrop-blur-sm transition-opacity"></div>
            <div class="flex min-h-full items-center justify-center p-4">
                <div @click.away="showModal = false" class="relative bg-white rounded-2xl shadow-xl w-full max-w-md overflow-hidden">
                    <div class="p-6 border-b border-slate-100 flex justify-between items-center bg-slate-50/50">
                        <h3 class="text-lg font-bold text-slate-800">🏠 Nouvelle Colocation</h3>
                        <button @click="showModal = false" class="text-slate-400 hover:text-slate-600">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>
                        </button>
                    </div>
                    <form action="{{ route('admin.colocations.store') }}" method="POST" class="p-6 space-y-5">
                        @csrf
                        <div>
                            <label class="block text-sm font-semibold text-slate-700 mb-1">Nom de la colocation *</label>
                            <input type="text" name="name" required class="w-full rounded-xl border-slate-200 text-sm focus:ring-2 focus:ring-indigo-500" placeholder="Ex: Flatsharing Casa">
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-slate-700 mb-1">Description</label>
                            <textarea name="description" rows="3" class="w-full rounded-xl border-slate-200 text-sm focus:ring-2 focus:ring-indigo-500" placeholder="Description courte..."></textarea>
                        </div>
                        <input type="hidden" name="status" value="active">
                        <div class="flex gap-3 pt-2">
                            <button type="button" @click="showModal = false" class="flex-1 px-4 py-3 border border-slate-200 text-slate-600 text-sm font-bold rounded-xl active:scale-95 transition-all">Annuler</button>
                            <button type="submit" class="flex-1 px-4 py-3 bg-indigo-600 text-white text-sm font-bold rounded-xl shadow-md shadow-indigo-200 active:scale-95 transition-all">Créer</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>