{{-- resources/views/home.blade.php --}}
@include('layouts.navigation') {{-- Ton navbar modifié --}}

@vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/script.js'])



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
                <a href="#mystery-boxes"
                class="bg-indigo-600 hover:bg-indigo-700 px-4 py-2 rounded-lg text-white text-center">
                Choisir ma box
                </a>
                <a href="#chances"
                class="bg-gray-700 hover:bg-gray-600 px-4 py-2 rounded-lg text-white text-center">
                Voir les probabilités
                </a>
            </div>


            <p id="clock" class="text-gray-400 text-sm">
                ⏰ <span id="time"></span> — 1284 ouvertures aujourd'hui
            </p>
        </div>

        {{-- Banner --}}
        <div class="bg-gray-800 text-center py-3 text-sm">
            🎉 ULURU drop: 0.01% — Quelqu’un a tenté sa chance il y a 3 min...
        </div>

        {{-- MYSTERY BOXES --}}
        <section id="mystery-boxes" class="py-12">
            <h2 class="text-center text-2xl font-bold mb-8">Mystery Boxes</h2>
            <div class="max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-6 px-6">

                @foreach($mysteryBoxs as $box)
                    <div class="bg-gray-800 p-6 rounded-2xl text-center
                        @if($box->is_popular) border-2 border-indigo-500 @endif">
                        {{-- Badge Populaire --}}
                        @if($box->is_popular)
                            <span class="bg-indigo-500 text-xs px-2 py-1 rounded-full">Populaire</span>
                        @endif

                        <h3 class="text-lg font-semibold mb-4">{{ $box->nom }}</h3>
                        <img src="data:image/jpeg;base64,{{ base64_encode($box->image) }}" alt="booster">
                        <p class="text-2xl font-bold mb-4">{{ number_format($box->prix, 0, ',', ' ') }} €</p>

                        {{-- Rareté / étoiles --}}
                        <div class="flex justify-center space-x-2 mb-4 text-gray-400 text-sm">
                            @for($i = 1; $i <= 5; $i++)
                                <span>{{ $i }}★</span>
                            @endfor
                        </div>

                        <a href="/box/{{ $box->id }}"
                           class="bg-{{ $box->is_popular ? 'indigo' : 'red' }}-600 px-4 py-2 rounded-lg inline-block">
                            {{ $box->button_text ?? "Ouvrir ({$box->prix} €)" }}
                        </a>

                        {{-- Optionnel : texte d'avertissement --}}
                        @if($box->is_danger)
                            <p class="text-xs text-yellow-400 mt-2">⚠️ Réservé aux inconscients</p>
                        @endif
                    </div>
                @endforeach

            </div>
            <p class="text-center text-gray-400 mt-6"><a href="#chances" class="underline">Voir le détail des probabilités</a></p>
        </section>


        {{-- CHANCES --}}
        <section id="chances" class="py-12 bg-gray-800">
            <h2 class="text-center text-2xl font-bold mb-6">Transparence totale des chances</h2>

            <div class="flex justify-center space-x-4 mb-6">
                <button onclick="showImage('img1', this)" class="px-3 py-1 bg-gray-700 rounded">Box 1</button>
                <button onclick="showImage('img2', this)" class="px-3 py-1 bg-gray-700 rounded">Box 2</button>
                <button onclick="showImage('img3', this)" class="px-3 py-1 bg-gray-700 rounded">Box 3</button>
            </div>

            <div class="max-w-lg mx-auto">
                <img id="img1" src="/images/MysteryBox1.png" alt="Graphique Box 1" class="w-full hidden">
                <img id="img2" src="/images/MysteryBox2.png" alt="Graphique Box 2" class="w-full hidden">
                <img id="img3" src="/images/MysteryBox3.png" alt="Graphique Box 3" class="w-full hidden">
            </div>
        </section>

        {{-- WHY SECTION --}}
        <section id="kayouno" class="py-12">
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
        <section id="avis" class="py-12 bg-gray-800">
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

<script>
    function showImage(id, btn) {
        // cacher toutes les images
        document.querySelectorAll('#chances img').forEach(img => img.classList.add('hidden'));
        // afficher uniquement l'image correspondante
        document.getElementById(id).classList.remove('hidden');

        // retirer la classe active de tous les boutons
        document.querySelectorAll('#chances button').forEach(b => {
            b.classList.remove('bg-indigo-600', 'text-white');
            b.classList.add('bg-gray-700');
        });

        // ajouter la classe active au bouton cliqué
        btn.classList.remove('bg-gray-700');
        btn.classList.add('bg-indigo-600', 'text-white');
    }

    // Afficher la première image par défaut + bouton actif
    document.addEventListener("DOMContentLoaded", () => {
        let firstBtn = document.querySelector('#chances button');
        showImage('img1', firstBtn);
    });
</script>
