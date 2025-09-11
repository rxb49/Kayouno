{{-- resources/views/auth/register.blade.php --}}
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1, maximum-scale=1"
    >
    <title>Inscription — Kayouno</title>

    <style>
        :root{
            --night:#0B0E12;
            --panel:#151A20;
            --neon:#7C3AED;
            --gold:#FACC15;
            --rose:#F472B6;
            --text:#E5E7EB;
            --muted:#9CA3AF;
            --shadow: 0 20px 60px rgba(0,0,0,.45);
            --radius:16px;
            --radius-lg:22px;
        }
        *{box-sizing:border-box}
        html,body{
            height:100%;
            margin:0;
            background: radial-gradient(80% 60% at 50% 0%, rgba(124,58,237,0.12) 0%, rgba(11,14,18,0) 60%), var(--night);
            color:var(--text);
            font-family: Inter, system-ui, -apple-system, Segoe UI, Roboto, "Helvetica Neue", Arial;
        }
        a{color:var(--rose); text-decoration:none}
        a:hover{color:#fff}
        .wrap{min-height:100%; display:grid; place-items:center; padding:48px 16px;}
        .hero{text-align:center; margin-bottom:28px;}
        .title{
            font-family: Montserrat, sans-serif;
            font-weight:800;
            font-size: clamp(28px, 4vw, 42px);
            margin:0 0 8px;
            color: var(--text);
            text-shadow:0 0 22px rgba(124,58,237,.55),0 0 8px rgba(124,58,237,.75);
        }
        .subtitle{color:var(--muted); font-size:14px;}
        .card{
            width:min(520px,100%);
            background: linear-gradient(180deg, rgba(21,26,32,.92), rgba(21,26,32,.88));
            border: 1px solid rgba(124,58,237,.22);
            border-radius: var(--radius-lg);
            box-shadow: var(--shadow);
            padding: 22px;
        }
        .card-inner{background: rgba(0,0,0,.18); border:1px solid rgba(255,255,255,.04); border-radius:var(--radius); padding:22px;}
        label{display:block; font-size:13px; color:var(--muted); margin-bottom:6px;}
        .input{width:100%; height:44px; padding:0 14px; border-radius:12px; border:1px solid rgba(255,255,255,.08); background:#0f141a; color:var(--text);}
        .input::placeholder{color:#6b7280}
        .input:focus{border-color: rgba(124,58,237,.75); box-shadow: 0 0 0 3px rgba(124,58,237,.25);}
        .row{margin-bottom:16px}
        .btn{width:100%; height:46px; border:0; border-radius:12px; cursor:pointer; font-weight:700; transition:.15s ease;}
        .btn-primary{background: linear-gradient(135deg, var(--neon), #9F67FF); color:white; box-shadow:0 8px 26px rgba(124,58,237,.35);}
        .btn-primary:hover{filter:brightness(1.08)}
        .btn-ghost{background:transparent; border:1px solid rgba(250,204,21,.35); color:var(--gold);}
        .btn-ghost:hover{box-shadow:0 0 18px rgba(250,204,21,.22) inset,0 0 10px rgba(250,204,21,.2);}
        .muted{color:var(--muted); font-size:13px; text-align:center; margin-top:12px;}
        .errors{margin:10px 0 0; padding:10px 12px; border-radius:12px; background:rgba(244,114,182,.10); border:1px solid rgba(244,114,182,.35); color:#ffd9e8; font-size:13px;}
        .status{margin:10px 0 0; padding:10px 12px; border-radius:12px; background:rgba(34,197,94,.10); border:1px solid rgba(34,197,94,.35); color:#bbf7d0; font-size:13px;}
        .foot{margin-top:18px; text-align:center; font-size:14px;}
        .checkbox{appearance:none; width:16px; height:16px; border-radius:5px; border:1px solid rgba(255,255,255,.16); background:#0f141a;}
        .checkbox:checked{background: linear-gradient(135deg, var(--neon), #9F67FF); box-shadow:0 0 8px rgba(124,58,237,.6);}
        .sparkle{display:inline-block; margin-right:6px; width:18px; height:18px; border-radius:6px; background: radial-gradient(circle at 30% 30%, #fff 0 10%, transparent 11%), radial-gradient(circle at 70% 70%, var(--gold) 0 12%, transparent 13%), linear-gradient(135deg, rgba(250,204,21,.45), rgba(124,58,237,.45)); box-shadow: 0 0 14px rgba(250,204,21,.4);}
    </style>
</head>
<body>
<div class="wrap">
    <div class="hero">
        <h1 class="title">Inscris-toi 🎰</h1>
        <p class="subtitle">Crée ton compte et tente le jackpot ULURU.</p>
    </div>

    <div class="card">
        <div class="card-inner">
            {{-- Status --}}
            @if (session('status'))
                <div class="status">{{ session('status') }}</div>
            @endif

            {{-- Erreurs --}}
            @if ($errors->any())
                <div class="errors">
                    <strong>Oups…</strong>
                    <ul style="margin:6px 0 0; padding-left:18px;">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('register') }}">
                @csrf

                {{-- Pseudo --}}
                <div class="row">
                    <label for="name">Pseudo</label>
                    <input id="name" name="name" type="text" class="input" placeholder="DiamantHunter2024" value="{{ old('name') }}" required autofocus>
                </div>

                {{-- Email --}}
                <div class="row">
                    <label for="email">Email</label>
                    <input id="email" name="email" type="email" class="input" placeholder="jackpot@casino.com" value="{{ old('email') }}" required>
                </div>

                {{-- Mot de passe --}}
                <div class="row">
                    <label for="password">Mot de passe</label>
                    <input id="password" name="password" type="password" class="input" placeholder="••••••••" required>
                </div>

                {{-- Confirmation --}}
                <div class="row">
                    <label for="password_confirmation">Confirmation du mot de passe</label>
                    <input id="password_confirmation" name="password_confirmation" type="password" class="input" placeholder="••••••••" required>
                </div>

                {{-- CGU --}}
                <div class="row" style="display:flex; align-items:center; gap:8px;">
                    <input id="terms" name="terms" type="checkbox" class="checkbox" required>
                    <label for="terms" style="margin:0; font-size:13px; color:var(--muted);">
                        J'accepte de payer mes frais de port livreur pour un caillou 14 !
                    </label>
                </div>

                <button type="submit" class="btn btn-primary">S'inscrire</button>

                <p class="muted">ou</p>

                <button type="button" id="fillRandom" class="btn btn-ghost">
                    <span class="sparkle" aria-hidden="true"></span>
                    Générer un profil aléatoire
                </button>

                <div class="foot">
                    Déjà un compte ? <a href="{{ route('login') }}">Se connecter</a>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    // effet glow sur le titre
    (function(){
        const t = document.querySelector('.title');
        let dir = 1, glow = 0.55, step = 0.01;
        setInterval(() => {
            glow += step * dir;
            if (glow > 0.95 || glow < 0.35) dir *= -1;
            t.style.textShadow =
                `0 0 22px rgba(124,58,237,${glow}), 0 0 8px rgba(124,58,237,${Math.min(glow+0.2,1)})`;
        }, 40);
    })();

    // Génération pseudo/email/mdp aléatoire
    document.getElementById('fillRandom').addEventListener('click', () => {
        const pseudos = ['LuckyStar','VegasLord','CaillouKing','MysticSpin','GoldenStone','NeonJack','RoyalDust'];
        const pseudo = pseudos[Math.floor(Math.random()*pseudos.length)] + Math.floor(Math.random()*999);
        const email = pseudo.toLowerCase() + "@casino.com";
        const passBank = ['MysteryBox!2025','Kayouno#777','Gold&Neon42','LuckySpin_84','Cr0wn^Jackpot'];
        const pwd = passBank[Math.floor(Math.random()*passBank.length)];

        document.getElementById('name').value = pseudo;
        document.getElementById('email').value = email;
        document.getElementById('password').value = pwd;
        document.getElementById('password_confirmation').value = pwd;

        const btn = document.getElementById('fillRandom');
        btn.style.filter = 'brightness(1.15)';
        setTimeout(()=> btn.style.filter='', 180);
    });
</script>
</body>
</html>
