{{-- resources/views/box.blade.php --}}
@include('layouts.navigation') {{-- Ton navbar modifié --}}

<x-app-layout>

    <div class="bg-gray-900 text-white">

        {{-- HEADER SECTION --}}
        <div class="text-center py-12 border-b border-gray-800">
            <h1 class="text-3xl font-bold mb-2">Box #2 — Le Caillou Mystère</h1>
            <p class="text-gray-400 mb-6">Prix : 800 € • Rareté 1★ à 5★</p>

            {{-- Rarity Wheel --}}
            <div class="flex justify-center mb-6">
                <div class="bg-gray-800 px-6 py-4 rounded-lg flex space-x-6">
                    <span>⭐</span>
                    <span>🪨</span>
                    <span>💰</span>
                </div>
            </div>

            <div class="flex justify-center space-x-4 mb-6">
                <button class="bg-indigo-600 hover:bg-indigo-700 px-4 py-2 rounded-lg">Ouvrir la Box</button>
                <a href="#chances" 
                class="bg-gray-700 hover:bg-gray-600 px-4 py-2 rounded-lg text-white text-center">
                Voir les probabilités
                </a>            
            </div>

            <p class="text-gray-400 text-sm">⏰ 23:45:12 — 284 ouvertures aujourd'hui</p>
        </div>

        {{-- Box Details --}}
        <section id="chances" class="py-12">
            <div class="max-w-lg mx-auto bg-gray-800 p-6 rounded-2xl text-center">
                <h2 class="text-xl font-bold mb-4">Box #2</h2>
                <p class="text-2xl font-bold mb-4">800 €</p>
                <p class="text-gray-400 mb-4">Chances d'obtention :</p>
                <div class="flex justify-center space-x-2 mb-4 text-gray-400 text-sm">
                    <span>1★ — 20%</span>
                    <span>2★ — 40%</span>
                    <span>3★ — 15%</span>
                    <span>4★ — 8%</span>
                    <span>5★ — 3%</span>
                </div>
                <button class="bg-indigo-600 px-4 py-2 rounded-lg">Ouvrir (800 €)</button>
            </div>
        </section>

        {{-- WHY SECTION --}}
        <section class="py-12">
            <h2 class="text-center text-2xl font-bold mb-8">Pourquoi choisir Box #2 ?</h2>
            <div class="max-w-5xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-8 text-center px-6">
                <div>
                    <p class="text-3xl mb-2">🎲</p>
                    <h3 class="font-bold mb-2">Aléatoire fun</h3>
                    <p class="text-gray-400">Chaque ouverture est une surprise garantie</p>
                </div>
                <div>
                    <p class="text-3xl mb-2">⭐</p>
                    <h3 class="font-bold mb-2">Rareté claire</h3>
                    <p class="text-gray-400">Système de rareté transparent et équitable</p>
                </div>
                <div>
                    <p class="text-3xl mb-2">📦</p>
                    <h3 class="font-bold mb-2">Petit prix</h3>
                    <p class="text-gray-400">Accessible à tous pour tester votre chance</p>
                </div>
            </div>
        </section>

    </div>
</x-app-layout>

