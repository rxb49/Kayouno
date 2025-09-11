{{-- resources/views/profile/edit.blade.php --}}
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1, maximum-scale=1"
    >
    <title>Mon Profil — Kayouno</title>

    {{-- Palette + styles légers, sans dépendance Tailwind --}}
    <style>
        :root{
            --night:#0B0E12;
            --panel:#151A20;
            --neon:#7C3AED;
            --jackpot:#22C55E;
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
            font-family: Inter, system-ui, -apple-system, Segoe UI, Roboto, "Helvetica Neue", Arial, "Noto Sans", "Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol";
        }
        a{color:var(--muted); text-decoration:none}
        a:hover{color:var(--text)}
        .wrap{
            min-height:100%;
            padding:48px 16px;
        }
        .container{
            max-width: 1200px;
            margin: 0 auto;
        }
        .hero{
            text-align:center;
            margin-bottom:40px;
        }
        .title{
            font-family: Montserrat, Inter, system-ui, sans-serif;
            font-weight:800;
            font-size: clamp(28px, 4vw, 44px);
            line-height:1.08;
            margin:0 0 8px;
            letter-spacing: .4px;
            color: var(--text);
            text-shadow:
                0 0 22px rgba(124,58,237,.55),
                0 0 8px rgba(124,58,237,.75);
        }
        .subtitle{
            color:var(--muted);
            font-size:14px;
        }
        .grid{
            display: grid;
            gap: 24px;
            grid-template-columns: 1fr;
        }
        @media (min-width: 768px) {
            .grid {
                grid-template-columns: 1fr 1fr;
            }
            .grid-full {
                grid-column: 1 / -1;
            }
        }
        .card{
            background: linear-gradient(180deg, rgba(21,26,32,.92), rgba(21,26,32,.88));
            border: 1px solid rgba(124,58,237,.22);
            border-radius: var(--radius-lg);
            box-shadow: var(--shadow);
            padding: 22px;
        }
        .card-inner{
            background: rgba(0,0,0,.18);
            border: 1px solid rgba(255,255,255,.04);
            border-radius: var(--radius);
            padding: 22px;
        }
        .card-header{
            margin-bottom: 20px;
        }
        .card-title{
            font-size: 18px;
            font-weight: 600;
            color: var(--text);
            margin: 0 0 8px;
        }
        .card-description{
            color: var(--muted);
            font-size: 13px;
            line-height: 1.4;
        }
        label{
            display:block;
            font-size: 13px;
            color: var(--muted);
            margin-bottom:8px;
        }
        .input{
            width:100%;
            height:44px;
            padding:0 14px;
            border-radius:12px;
            border:1px solid rgba(255,255,255,.08);
            background:#0f141a;
            color:var(--text);
            outline:none;
            transition:.15s ease;
        }
        .input::placeholder{color:#6b7280}
        .input:focus{
            border-color: rgba(124,58,237,.75);
            box-shadow: 0 0 0 3px rgba(124,58,237,.25);
        }
        .row{margin-bottom:16px}
        .row:last-child{margin-bottom:0}

        .btn{
            height:44px;
            padding: 0 20px;
            border:0;
            border-radius: 12px;
            cursor:pointer;
            font-weight: 600;
            font-size: 14px;
            letter-spacing:.2px;
            transition: transform .06s ease, box-shadow .15s ease, filter .2s ease;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }
        .btn-primary{
            background: linear-gradient(135deg, var(--neon), #9F67FF);
            color:white;
            box-shadow: 0 8px 26px rgba(124,58,237,.35);
        }
        .btn-primary:hover{ filter:brightness(1.08) }
        .btn-primary:active{ transform: translateY(1px) }

        .btn-danger{
            background: linear-gradient(135deg, var(--rose), #EC4899);
            color:white;
            box-shadow: 0 8px 26px rgba(244,114,182,.35);
        }
        .btn-danger:hover{ filter:brightness(1.08) }
        .btn-danger:active{ transform: translateY(1px) }

        .btn-ghost{
            background: transparent;
            border: 1px solid rgba(250,204,21,.35);
            color: var(--gold);
        }
        .btn-ghost:hover{
            box-shadow: 0 0 18px rgba(250,204,21,.22) inset, 0 0 10px rgba(250,204,21,.2);
        }

        .btn-secondary{
            background: rgba(255,255,255,.08);
            border: 1px solid rgba(255,255,255,.12);
            color: var(--text);
        }
        .btn-secondary:hover{
            background: rgba(255,255,255,.12);
        }

        .actions{
            display:flex;
            align-items:center;
            gap:12px;
            margin-top:20px;
        }

        .errors{
            margin: 10px 0 0;
            padding:10px 12px;
            border-radius:12px;
            background: rgba(244,114,182,.10);
            border: 1px solid rgba(244,114,182,.35);
            color: #ffd9e8;
            font-size: 13px;
        }
        .status{
            margin: 10px 0 0;
            padding:10px 12px;
            border-radius:12px;
            background: rgba(34,197,94,.10);
            border: 1px solid rgba(34,197,94,.35);
            color: #bbf7d0;
            font-size: 13px;
        }
        .success-message{
            color: var(--jackpot);
            font-size: 13px;
            font-weight: 500;
        }

        .nav-back{
            display: inline-flex;
            align-items: center;
            gap: 8px;
            color: var(--muted);
            font-size: 14px;
            margin-bottom: 20px;
            transition: color .15s ease;
        }
        .nav-back:hover{
            color: var(--text);
        }

        .modal{
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0,0,0,.8);
            display: none;
            align-items: center;
            justify-content: center;
            z-index: 1000;
            padding: 20px;
        }
        .modal.show{
            display: flex;
        }
        .modal-content{
            background: linear-gradient(180deg, rgba(21,26,32,.95), rgba(21,26,32,.92));
            border: 1px solid rgba(244,114,182,.35);
            border-radius: var(--radius-lg);
            padding: 24px;
            max-width: 400px;
            width: 100%;
            box-shadow: var(--shadow);
        }
        .modal-title{
            font-size: 18px;
            font-weight: 600;
            color: var(--text);
            margin: 0 0 12px;
        }
        .modal-description{
            color: var(--muted);
            font-size: 14px;
            line-height: 1.4;
            margin-bottom: 20px;
        }
        .modal-actions{
            display: flex;
            gap: 12px;
            justify-content: flex-end;
        }

        @media (max-width:480px){
            .card{padding:16px}
            .card-inner{padding:16px}
            .grid{
                grid-template-columns: 1fr;
            }
            .actions{
                flex-direction: column;
                align-items: stretch;
            }
            .btn{
                width: 100%;
            }
        }
    </style>
</head>
<body>
<div class="wrap">
    <div class="container">
        <a href="{{ route('home') }}" class="nav-back">
            ← Retour aux cailloux mystères :)
        </a>

        <div class="hero">
            <h1 class="title">Mon Profil 🎰</h1>
            <p class="subtitle">Gère ton compte et tes paramètres de jeu.</p>
        </div>

        <div class="grid">
            {{-- Informations du profil --}}
            <div class="card">
                <div class="card-inner">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            {{-- Mot de passe --}}
            <div class="card">
                <div class="card-inner">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            {{-- Suppression du compte --}}
            <div class="card grid-full">
                <div class="card-inner">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Mini-JS pour les effets --}}
<script>
    // Neon breathing on the title
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

    // Gestion des messages de succès avec disparition automatique
    document.addEventListener('DOMContentLoaded', function() {
        const successMessages = document.querySelectorAll('.success-message');
        successMessages.forEach(msg => {
            setTimeout(() => {
                msg.style.opacity = '0';
                msg.style.transition = 'opacity 0.3s ease';
                setTimeout(() => msg.remove(), 300);
            }, 2000);
        });
    });
</script>
</body>
</html>
