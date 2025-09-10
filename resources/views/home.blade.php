{{-- resources/views/home.blade.php --}}
@include('layouts.navigation') {{-- Ton navbar modifié --}}
<x-app-layout>
    <div class="bg-gray-900 text-white">

        {{-- HEADER SECTION --}}
        <div class="text-center py-12 border-b border-gray-800">
            <h1 class="text-3xl font-bold mb-2">Achète un caillou mystère.<br>Gagne (peut-être) la légende.</h1>
            <p class="text-gray-400 mb-6">3 Mystery Box • Rareté 1★ à 5★ + Jackpot ULURU</p>

            {{-- Rarity Wheel --}}
            <div class="flex justify-center mb-6">
                <div class="bg-gray-800 px-6 py-4 rounded-lg flex space-x-6">
                    <span>⭐</span>
                    <span>🪨</span>
                    <span>💰</span>
                </div>
            </div>

            <div class="flex justify-center space-x-4 mb-6">
                <button class="bg-indigo-600 hover:bg-indigo-700 px-4 py-2 rounded-lg">Choisir ma box</button>
                <button class="bg-gray-700 hover:bg-gray-600 px-4 py-2 rounded-lg">Voir les probabilités</button>
            </div>

            <p class="text-gray-400 text-sm">⏰ 23:45:12 — 1284 ouvertures aujourd'hui</p>
        </div>

        {{-- Banner --}}
        <div class="bg-gray-800 text-center py-3 text-sm">
            🎉 ULURU drop: 0.01% — Quelqu’un a tenté sa chance il y a 3 min...
        </div>

        {{-- MYSTERY BOXES --}}
        <section class="py-12">
            <h2 class="text-center text-2xl font-bold mb-8">Mystery Boxes</h2>
            <div class="max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-6 px-6">

                {{-- Box 1 --}}
                <div class="bg-gray-800 p-6 rounded-2xl text-center">
                    <h3 class="text-lg font-semibold mb-4">Box #1</h3>
                    <p class="text-2xl font-bold mb-4">10 €</p>
                    <div class="flex justify-center space-x-2 mb-4 text-gray-400 text-sm">
                        <span>1★</span><span>2★</span><span>3★</span><span>4★</span><span>5★</span>
                    </div>
                    <button class="bg-indigo-600 px-4 py-2 rounded-lg">Ouvrir (10 €)</button>
                </div>

                {{-- Box 2 --}}
                <div class="bg-gray-800 p-6 rounded-2xl text-center border-2 border-indigo-500">
                    <span class="bg-indigo-500 text-xs px-2 py-1 rounded-full">Populaire</span>
                    <h3 class="text-lg font-semibold mb-4">Box #2</h3>
                    <p class="text-2xl font-bold mb-4">800 €</p>
                    <div class="flex justify-center space-x-2 mb-4 text-gray-400 text-sm">
                        <span>1★</span><span>2★</span><span>3★</span><span>4★</span><span>5★</span>
                    </div>
                    <button class="bg-indigo-600 px-4 py-2 rounded-lg">J’ose le 800 €</button>
                </div>

                {{-- Box 3 --}}
                <div class="bg-gray-800 p-6 rounded-2xl text-center">
                    <h3 class="text-lg font-semibold mb-4">Box #3</h3>
                    <p class="text-2xl font-bold mb-4">1 000 560 €</p>
                    <div class="flex justify-center space-x-2 mb-4 text-gray-400 text-sm">
                        <span>1★</span><span>2★</span><span>3★</span><span>4★</span><span>5★</span>
                    </div>
                    <button class="bg-red-600 px-4 py-2 rounded-lg">Je suis fou (1 000 560 €)</button>
                    <p class="text-xs text-yellow-400 mt-2">⚠️ Réservé aux inconscients</p>
                </div>
            </div>
            <p class="text-center text-gray-400 mt-6"><a href="#" class="underline">Voir le détail des probabilités</a></p>
        </section>

        {{-- CHANCES --}}
        <section class="py-12 bg-gray-800">
            <h2 class="text-center text-2xl font-bold mb-6">Transparence totale des chances</h2>
            <div class="flex justify-center space-x-4 mb-6">
                <button class="px-3 py-1 bg-gray-700 rounded">Box 1</button>
                <button class="px-3 py-1 bg-gray-700 rounded">Box 2</button>
                <button class="px-3 py-1 bg-gray-700 rounded">Box 3</button>
            </div>
            <div class="max-w-lg mx-auto">
                <img src="/images/chart.png" alt="Graphique des chances" class="w-full">
            </div>
        </section>

        {{-- WHY SECTION --}}
        <section class="py-12">
            <h2 class="text-center text-2xl font-bold mb-8">Pourquoi Kayouno ?</h2>
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
                    <h3 class="font-bold mb-2">Livraison suivie</h3>
                    <p class="text-gray-400">Trace ton caillou comme un pro</p>
                </div>
            </div>
        </section>

        {{-- TESTIMONIALS --}}
        <section class="py-12 bg-gray-800">
            <h2 class="text-center text-2xl font-bold mb-8">Avis de nos chasseurs</h2>
            <div class="max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-6 px-6">
                <div class="bg-gray-900 p-6 rounded-lg">
                    <p class="font-bold">Pierre_Hunter92 ⭐⭐⭐⭐⭐</p>
                    <p class="text-gray-400 mt-2">"J’ai eu un 4★ dans ma première box ! Le facteur a souri en effet."</p>
                </div>
                <div class="bg-gray-900 p-6 rounded-lg">
                    <p class="font-bold">CaillouMaster ⭐⭐⭐⭐⭐</p>
                    <p class="text-gray-400 mt-2">"Transparent et fun ! J’attends toujours mon ULURU mais l’espoir fait vivre."</p>
                </div>
                <div class="bg-gray-900 p-6 rounded-lg">
                    <p class="font-bold">RockCollector ⭐⭐⭐⭐⭐</p>
                    <p class="text-gray-400 mt-2">"Addiction garantie ! Mes doigts sont en sécurité depuis que j’ai arrêté les 5★."</p>
                </div>
            </div>
        </section>

    </div>
</x-app-layout>
    