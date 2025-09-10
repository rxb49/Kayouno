<!DOCTYPE html>
<html lang="fr" class="h-full">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tu es qui aujourd'hui ? - Kayouno</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600;700;800&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <style>
        :root {
            --nuit: #0B0E12;
            --gris-panel: #151A20;
            --violet-neon: #7C3AED;
            --vert-jackpot: #22C55E;
            --dore-rare: #FACC15;
            --rose-accent: #F472B6;
            --texte-principal: #E5E7EB;
            --texte-secondaire: #9CA3AF;
        }
        
        * {
            box-sizing: border-box;
        }
        
        body {
            background: linear-gradient(135deg, #0B0E12 0%, #1a1f2e 50%, #0B0E12 100%);
            background-attachment: fixed;
            position: relative;
            overflow-x: hidden;
            font-family: 'Inter', sans-serif;
            min-height: 100vh;
        }
        
        body::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: 
                radial-gradient(circle at 25% 25%, rgba(124, 58, 237, 0.15) 0%, transparent 50%),
                radial-gradient(circle at 75% 75%, rgba(250, 204, 21, 0.1) 0%, transparent 50%),
                radial-gradient(circle at 50% 50%, rgba(244, 114, 182, 0.08) 0%, transparent 50%);
            pointer-events: none;
            z-index: 0;
        }
        
        .content-wrapper {
            position: relative;
            z-index: 1;
        }
        
        .title-font {
            font-family: 'Montserrat', sans-serif;
        }
        
        .logo-container {
            position: relative;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, #7C3AED, #9333EA, #A855F7);
            border-radius: 50%;
            margin-bottom: 2rem;
            box-shadow: 
                0 0 30px rgba(124, 58, 237, 0.4),
                0 0 60px rgba(124, 58, 237, 0.2),
                inset 0 2px 4px rgba(255, 255, 255, 0.1);
        }
        
        .logo-container::before {
            content: '';
            position: absolute;
            inset: -4px;
            background: linear-gradient(45deg, #FACC15, #7C3AED, #F472B6, #FACC15);
            border-radius: 50%;
            z-index: -1;
            animation: rotate 3s linear infinite;
        }
        
        @keyframes rotate {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
        
        .logo-k {
            font-size: 2.5rem;
            font-weight: 800;
            color: white;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
        }
        
        .main-panel {
            background: linear-gradient(145deg, rgba(21, 26, 32, 0.95), rgba(21, 26, 32, 0.8));
            backdrop-filter: blur(20px);
            border: 1px solid rgba(124, 58, 237, 0.3);
            border-radius: 24px;
            box-shadow: 
                0 20px 40px rgba(0, 0, 0, 0.4),
                0 0 0 1px rgba(124, 58, 237, 0.1),
                inset 0 1px 0 rgba(255, 255, 255, 0.05);
            position: relative;
            overflow: hidden;
        }
        
        .main-panel::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 1px;
            background: linear-gradient(90deg, transparent, rgba(124, 58, 237, 0.5), transparent);
        }
        
        .btn-primary {
            background: linear-gradient(135deg, #7C3AED 0%, #9333EA 50%, #A855F7 100%);
            border: none;
            color: white;
            font-weight: 600;
            position: relative;
            overflow: hidden;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        .btn-primary::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.5s;
        }
        
        .btn-primary:hover::before {
            left: 100%;
        }
        
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 
                0 10px 30px rgba(124, 58, 237, 0.4),
                0 0 20px rgba(124, 58, 237, 0.3);
        }
        
        .btn-secondary {
            background: transparent;
            border: 2px solid #FACC15;
            color: #FACC15;
            font-weight: 500;
            position: relative;
            overflow: hidden;
            transition: all 0.3s ease;
        }
        
        .btn-secondary::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 0;
            height: 100%;
            background: linear-gradient(135deg, rgba(250, 204, 21, 0.1), rgba(250, 204, 21, 0.2));
            transition: width 0.3s ease;
        }
        
        .btn-secondary:hover::before {
            width: 100%;
        }
        
        .btn-secondary:hover {
            box-shadow: 0 0 20px rgba(250, 204, 21, 0.3);
            transform: translateY(-1px);
        }
        
        .input-field {
            background: rgba(11, 14, 18, 0.6);
            border: 2px solid rgba(156, 163, 175, 0.2);
            color: #E5E7EB;
            transition: all 0.3s ease;
            backdrop-filter: blur(10px);
        }
        
        .input-field:focus {
            border-color: #7C3AED;
            box-shadow: 
                0 0 0 4px rgba(124, 58, 237, 0.1),
                0 0 20px rgba(124, 58, 237, 0.2);
            outline: none;
            background: rgba(11, 14, 18, 0.8);
        }
        
        .input-field::placeholder {
            color: rgba(156, 163, 175, 0.6);
        }
        
        .marquee {
            background: linear-gradient(270deg, #7C3AED, #FACC15, #F472B6, #7C3AED);
            background-size: 400% 400%;
            animation: gradientShift 4s ease infinite;
        }
        
        @keyframes gradientShift {
            0%, 100% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
        }
        
        .star {
            color: #FACC15;
            filter: drop-shadow(0 0 6px rgba(250, 204, 21, 0.6));
            animation: starTwinkle 2s ease-in-out infinite alternate;
        }
        
        @keyframes starTwinkle {
            0% { opacity: 0.7; transform: scale(1); }
            100% { opacity: 1; transform: scale(1.1); }
        }
        
        .social-proof {
            background: linear-gradient(135deg, rgba(21, 26, 32, 0.8), rgba(21, 26, 32, 0.4));
            backdrop-filter: blur(10px);
            border: 1px solid rgba(124, 58, 237, 0.2);
        }
        
        .divider {
            height: 1px;
            background: linear-gradient(90deg, transparent, rgba(156, 163, 175, 0.3), transparent);
        }
        
        .toast {
            animation: slideInUp 0.3s ease-out;
        }
        
        @keyframes slideInUp {
            from {
                transform: translateY(100%);
                opacity: 0;
            }
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }
    </style>
</head>

<body class="h-full">
    <!-- Bandeau marquee -->
    <div class="fixed top-0 left-0 right-0 z-50 marquee text-center py-3 text-sm font-semibold text-white shadow-lg">
        <div class="animate-pulse">
            ⭐ Drop ULURU: 0.01% — Livraison express dispo — Chronocailloux ⭐
        </div>
    </div>

    <div class="content-wrapper min-h-screen flex items-center justify-center p-8 pt-24">
        <div class="w-full max-w-lg">
            <!-- Logo et titre -->
            <div class="text-center mb-16">
                <div class="logo-container">
                    <span class="logo-k title-font">K</span>
                </div>
                <h1 class="text-4xl font-bold title-font text-white mb-6 tracking-tight">
                    Tu es qui aujourd'hui ?
                </h1>
                <p class="text-gray-400 text-lg font-medium">
                    Connecte-toi pour tenter ta chance 🎰
                </p>
            </div>

            <!-- Panel principal -->
            <div class="main-panel p-12">
                <!-- Session Status -->
                <x-auth-session-status class="mb-8" :status="session('status')" />

                <form method="POST" action="{{ route('login') }}" class="space-y-10">
                    @csrf

                    <!-- Email Address -->
                    <div class="space-y-4">
                        <label for="email" class="block text-base font-semibold text-gray-200">
                            📧 Ton email magique
                        </label>
                        <input id="email" 
                               class="input-field w-full px-5 py-4 rounded-2xl text-base font-medium"
                               type="email" 
                               name="email" 
                               value="{{ old('email') }}" 
                               required 
                               autofocus 
                               autocomplete="username"
                               placeholder="ton-email@exemple.com" />
                        @error('email')
                            <p class="mt-3 text-sm text-red-400 font-medium">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Password -->
                    <div class="space-y-4">
                        <label for="password" class="block text-base font-semibold text-gray-200">
                            🔐 Mot de passe secret
                        </label>
                        <input id="password" 
                               class="input-field w-full px-5 py-4 rounded-2xl text-base font-medium"
                               type="password"
                               name="password"
                               required 
                               autocomplete="current-password"
                               placeholder="••••••••" />
                        @error('password')
                            <p class="mt-3 text-sm text-red-400 font-medium">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Remember Me -->
                    <div class="flex items-center space-x-3 py-2">
                        <input id="remember_me" 
                               type="checkbox" 
                               class="w-5 h-5 rounded-lg border-2 border-gray-500 bg-transparent text-violet-500 focus:ring-violet-500 focus:ring-2 focus:ring-offset-0" 
                               name="remember">
                        <label for="remember_me" class="text-base text-gray-300 font-medium">
                            Se souvenir de moi (pratique pour les sessions de jeu 🎲)
                        </label>
                    </div>

                    <!-- Actions -->
                    <div class="space-y-8 pt-6">
                        <button type="submit" class="btn-primary w-full py-4 px-6 rounded-2xl font-bold text-base tracking-wide">
                            🚀 Entrer dans l'arène
                        </button>
                        
                        @if (Route::has('password.request'))
                            <div class="text-center">
                                <a href="{{ route('password.request') }}" 
                                   class="text-base text-yellow-400 hover:text-yellow-300 transition-colors font-medium">
                                    💭 Mot de passe oublié ? (ça arrive aux meilleurs...)
                                </a>
                            </div>
                        @endif
                    </div>
                </form>

                <!-- Profil aléatoire -->
                <div class="mt-16 pt-10">
                    <div class="divider mb-10"></div>
                    <button type="button" 
                            class="btn-secondary w-full py-4 px-6 rounded-2xl font-semibold text-base"
                            onclick="generateRandomProfile()">
                        🎭 Générer un profil aléatoire
                    </button>
                    <p class="text-sm text-gray-500 text-center mt-4 font-medium">
                        Pour les joueurs anonymes qui aiment le mystère
                    </p>
                </div>
            </div>

            <!-- Footer fun -->
            <div class="text-center mt-12 space-y-6">
                <div class="flex items-center justify-center space-x-3 text-base text-gray-400">
                    <span class="star text-xl">⭐</span>
                    <span class="font-medium">Pas encore de compte ?</span>
                    <span class="star text-xl">⭐</span>
                </div>
                <a href="{{ route('register') }}" 
                   class="inline-block text-base font-semibold text-violet-400 hover:text-violet-300 transition-colors">
                    🎰 Créer un compte et tenter le jackpot
                </a>
            </div>

            <!-- Social proof -->
            <div class="social-proof text-center mt-10 p-5 rounded-2xl">
                <p class="text-sm text-gray-300 font-medium">
                    <span class="text-green-400 font-bold">1,284</span> ouvertures aujourd'hui
                    <span class="mx-3 text-gray-500">•</span>
                    <span class="text-yellow-400 font-semibold">Dernière connexion il y a 2 min</span>
                </p>
            </div>
        </div>
    </div>

    <script>
        function generateRandomProfile() {
            const fakeEmails = [
                'joueur.mysterieux@casino.net',
                'chance.supreme@jackpot.com',
                'pierre.collector@rare.fr',
                'lucky.winner@kayouno.fr',
                'caillou.hunter@legend.com'
            ];
            
            const randomEmail = fakeEmails[Math.floor(Math.random() * fakeEmails.length)];
            
            document.getElementById('email').value = randomEmail;
            document.getElementById('password').value = 'motdepasse123';
            
            // Toast notification
            const toast = document.createElement('div');
            toast.className = 'fixed bottom-4 right-4 bg-gray-800 border border-yellow-400 text-yellow-400 px-4 py-3 rounded-lg shadow-lg z-50';
            toast.innerHTML = `
                <div class="flex items-center space-x-2">
                    <span>🎭</span>
                    <span class="text-sm">Profil aléatoire généré ! (watermark: fake)</span>
                </div>
            `;
            document.body.appendChild(toast);
            
            setTimeout(() => {
                toast.remove();
            }, 3000);
        }
    </script>
</body>
</html>
