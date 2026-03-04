<x-app-layout>
    <div id="main-content" class="main-content">
        <div class="p-6 pb-0">
            <div class="flex flex-col md:flex-row md:items-center justify-between mb-8 gap-4">
                <div>
                    <h1 class="text-2xl font-bold text-slate-800">Dashboard</h1>
                    <p class="text-slate-500 text-sm">Vue d'ensemble de vos activités</p>
                </div>

                <div class="flex items-center gap-3 self-end md:self-auto">
                    <div class="text-right hidden sm:block">
                        <p class="text-sm font-bold text-slate-800">{{ Auth::user()->firstname ?? Auth::user()->name }}
                            {{ Auth::user()->lastname ?? '' }}</p>
                        <p class="text-xs text-slate-500">{{ Auth::user()->email }}</p>
                    </div>
                    <div
                        class="w-12 h-12 bg-[#ec4899] rounded-full flex items-center justify-center text-white font-bold text-lg shadow-sm border-2 border-white">
                        {{ strtoupper(substr(Auth::user()->firstname ?? Auth::user()->name, 0, 1)) }}{{ strtoupper(substr(Auth::user()->lastname ?? '', 0, 1)) }}
                    </div>
                </div>
            </div>
        </div>

        <div
            class="sticky top-0 z-30 bg-white/80 backdrop-blur border-b border-slate-200 px-6 py-4 flex items-center justify-between gap-4">
            <div class="flex-1 min-w-0">
                <div class="flex items-center gap-3 flex-wrap">
                    <h2 class="text-xl font-bold text-slate-800 truncate">{{ $colocation->name }}</h2>
                    <span
                        class="text-xs font-semibold px-2 py-0.5 rounded-full {{ $colocation->status === 'active' ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
                        {{ ucfirst($colocation->status) }}
                    </span>
                </div>
            </div>

            <div class="flex items-center gap-2 flex-shrink-0">
                <x-primary-button x-on:click.prevent="$dispatch('open-modal', 'modal-invite')">
                    <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                    {{ __('Inviter') }}
                </x-primary-button>
            </div>
        </div>

        <main class="p-6">
            <div x-data="{ tab: 'balances' }">
                <div class="flex gap-2 mb-6 bg-white rounded-xl p-1.5 shadow-sm border border-slate-100 w-fit">
                    <button @click="tab = 'membres'"
                        :class="tab === 'membres' ? 'bg-indigo-50 text-indigo-600 shadow-sm' : 'text-slate-500'"
                        class="px-4 py-2 rounded-lg text-sm font-medium transition-all">👥 Membres</button>
                    <button @click="tab = 'depenses'"
                        :class="tab === 'depenses' ? 'bg-indigo-50 text-indigo-600 shadow-sm' : 'text-slate-500'"
                        class="px-4 py-2 rounded-lg text-sm font-medium transition-all">💸 Dépenses</button>
                    <button @click="tab = 'balances'"
                        :class="tab === 'balances' ? 'bg-indigo-50 text-indigo-600 shadow-sm' : 'text-slate-500'"
                        class="px-4 py-2 rounded-lg text-sm font-medium transition-all">⚖️ Balances</button>
                </div>

                <div x-show="tab === 'balances'" class="space-y-8">
                    <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-4">
                        @foreach ($membres as $membre)
                            <div class="bg-white p-5 rounded-2xl border border-slate-100 shadow-sm space-y-3">
                                <div class="flex items-center gap-3">
                                    <div
                                        class="w-10 h-10 rounded-full bg-indigo-100 text-indigo-600 flex items-center justify-center font-bold">
                                        {{ substr($membre->firstname, 0, 1) }} {{ substr($membre->lastname, 0, 1) }}</div>
                                    <div>
                                        <h4 class="font-bold text-slate-800 text-sm">{{ $membre->firstname }} {{ $membre->lastname }}</h4>
                                        <p class="text-[10px] text-slate-400 font-medium uppercase">Part : 0,00 €</p>
                                    </div>
                                </div>
                                <div class="pt-2 border-t border-slate-50">
                                    <div class="flex justify-between text-xs mb-1">
                                        <span class="text-slate-500">Total payé</span>
                                        <span class="font-bold text-slate-800">0,00 €</span>
                                    </div>
                                    <div class="flex justify-between text-xs">
                                        <span class="text-slate-500">Solde</span>
                                        <span class="font-bold text-green-600">+ 0,00 € créditeur</span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-sm">
                        <h3 class="font-bold text-slate-800 mb-6">Qui doit à qui ?</h3>
                        <div class="space-y-3">
                            <div
                                class="flex items-center justify-between p-4 bg-orange-50/50 rounded-xl border border-orange-100">
                                <div class="flex items-center gap-2 text-sm text-slate-700">
                                    <span class="font-bold">Membre A</span>
                                    <span class="text-slate-400">→ doit →</span>
                                    <span class="font-bold">Membre B</span>
                                </div>
                                <div class="flex items-center gap-4">
                                    <span class="font-bold text-orange-600 text-sm">0,00 €</span>
                                    <button
                                        class="bg-green-500 text-white text-[10px] font-bold px-3 py-1.5 rounded-lg uppercase">Marquer
                                        payé</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div x-show="tab === 'membres'" class="grid sm:grid-cols-2 lg:grid-cols-3 gap-4">
                    @foreach ($membres as $membre)
                        <div
                            class="bg-white p-6 rounded-[2rem] border border-slate-100 shadow-sm hover:shadow-md transition-shadow relative overflow-hidden">
                            <div class="flex items-start justify-between mb-4">
                                <div class="flex items-center gap-4">
                                    <div
                                        class="w-14 h-14 rounded-full bg-indigo-500 flex items-center justify-center text-white font-bold text-xl shadow-sm border-2 border-white">
                                       {{ substr($membre->firstname, 0, 1) }} {{ substr($membre->lastname, 0, 1) }}
                                    </div>

                                    <div>
                                        <div class="flex items-center gap-2">
                                            <h4 class="font-bold text-slate-800 text-lg">{{ $membre->firstname }} {{ $membre->lastname }}</h4>
                                            @if ($loop->first)
                                                <span
                                                    class="text-[10px] font-bold px-2 py-0.5 rounded-full bg-blue-100 text-blue-600 uppercase">Owner</span>
                                            @else
                                                <span
                                                    class="text-[10px] font-bold px-2 py-0.5 rounded-full bg-green-100 text-green-600 uppercase">Member</span>
                                            @endif
                                        </div>
                                        <p class="text-sm text-slate-400 font-medium">{{ $membre->email }}</p>
                                    </div>
                                </div>

                                @if (auth()->id() !== $membre->id)
                                    <form method="POST"
                                        action="/admin/colocations/{{ $colocation->id }}/remove/{{ $membre->id }}">
                                        @csrf @method('DELETE')
                                        <button type="submit"
                                            class="bg-red-500 text-white text-[10px] font-bold px-4 py-2 rounded-xl hover:bg-red-600 transition-colors uppercase shadow-sm">
                                            Retirer
                                        </button>
                                    </form>
                                @endif
                            </div>

                            <div class="mt-4">
                                <div class="flex justify-between items-center mb-1.5">
                                    <div class="h-2 w-full bg-slate-100 rounded-full overflow-hidden">
                                        <div class="h-full bg-green-500 rounded-full" style="width: 85%"></div>
                                    </div>
                                    <span class="ml-4 text-xs font-bold text-green-600">85/100</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div x-show="tab === 'depenses'"
                    class="bg-white rounded-2xl shadow-sm border border-slate-100 overflow-hidden">
                    <div
                        class="p-4 border-b border-slate-100 flex items-center justify-between font-bold text-slate-800">
                        Historique des dépenses
                        <x-secondary-button
                            x-on:click.prevent="$dispatch('open-modal', 'modal-depense')">Ajouter</x-secondary-button>
                    </div>
                    <table class="w-full text-left">
                        <thead class="bg-slate-50 text-slate-400 text-xs uppercase font-bold">
                            <tr>
                                <th class="px-6 py-3">Titre</th>
                                <th class="px-6 py-3">Payeur</th>
                                <th class="px-6 py-3 text-right">Montant</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100">
                            @forelse($depenses ?? [] as $depense)
                                <tr class="hover:bg-slate-50 transition-colors">
                                    <td class="px-6 py-4 text-sm font-medium text-slate-700">{{ $depense->titre }}</td>
                                    <td class="px-6 py-4 text-sm text-slate-500">{{ $depense->user->name }}</td>
                                    <td class="px-6 py-4 text-sm text-right font-bold text-slate-900">
                                        {{ number_format($depense->montant, 2) }} €</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="px-6 py-8 text-center text-slate-400">Aucune dépense.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>

    <x-modal name="modal-invite" focusable>
        <div class="p-6">
            <h2 class="text-lg font-bold text-slate-800 mb-6">Inviter un nouveau membre</h2>
            <form action="/admin/invitations/send" method="POST" class="space-y-4">
                @csrf
                <input type="hidden" name="colocation_id" value="{{ $colocation->id }}">
                <x-text-input name="email" type="email" class="w-full" placeholder="Email de l'invité"
                    required />
                <div class="flex justify-end gap-3">
                    <x-secondary-button x-on:click="$dispatch('close')">Annuler</x-secondary-button>
                    <x-primary-button type="submit">Envoyer</x-primary-button>
                </div>
            </form>
        </div>
    </x-modal>

    <x-modal name="modal-depense" focusable>
        <div class="p-6">
            <h2 class="text-lg font-bold text-slate-800 mb-6">Ajouter une dépense</h2>
            <form action="/admin/depenses/store" method="POST" class="space-y-4">
                @csrf
                <input type="hidden" name="colocation_id" value="{{ $colocation->id }}">
                <x-text-input name="titre" class="w-full" placeholder="Titre (ex: Loyer)" required />
                <x-text-input name="montant" type="number" step="0.01" class="w-full" placeholder="Montant"
                    required />
                <div class="flex justify-end gap-3">
                    <x-secondary-button x-on:click="$dispatch('close')">Annuler</x-secondary-button>
                    <x-primary-button type="submit">Enregistrer</x-primary-button>
                </div>
            </form>
        </div>
    </x-modal>
</x-app-layout>
