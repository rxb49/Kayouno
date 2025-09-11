{{-- resources/views/payment-success.blade.php --}}
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1, maximum-scale=1"
    >
    <title>Paiement Réussi — Kayouno</title>

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
            display:grid;
            place-items:center;
            padding:48px 16px;
        }
        .hero{
            text-align:center;
            margin-bottom:28px;
        }
        .title{
            font-family: Montserrat, Inter, system-ui, sans-serif;
            font-weight:800;
            font-size: clamp(28px, 4vw, 44px);
            line-height:1.08;
            margin:0 0 8px;
            letter-spacing: .4px;
            color: var(--jackpot);
            text-shadow:
                0 0 22px rgba(34,197,94,.55),
                0 0 8px rgba(34,197,94,.75);
        }
        .subtitle{
            color:var(--muted);
            font-size:14px;
        }
        .card{
            width: min(520px, 100%);
            background: linear-gradient(180deg, rgba(21,26,32,.92), rgba(21,26,32,.88));
            border: 1px solid rgba(34,197,94,.22);
            border-radius: var(--radius-lg);
            box-shadow: var(--shadow);
            padding: 22px;
        }
        .card-inner{
            background: rgba(0,0,0,.18);
            border: 1px solid rgba(255,255,255,.04);
            border-radius: var(--radius);
            padding: 22px;
            text-align: center;
        }
        .success-icon{
            font-size: 64px;
            margin-bottom: 20px;
            animation: bounce 2s infinite;
        }
        @keyframes bounce {
            0%, 20%, 50%, 80%, 100% { transform: translateY(0); }
            40% { transform: translateY(-10px); }
            60% { transform: translateY(-5px); }
        }
        .order-details{
            background: rgba(34,197,94,.08);
            border: 1px solid rgba(34,197,94,.25);
            border-radius: var(--radius);
            padding: 16px;
            margin: 20px 0;
            text-align: left;
        }
        .detail-row{
            display: flex;
            justify-content: space-between;
            margin-bottom: 8px;
        }
        .detail-row:last-child{
            margin-bottom: 0;
            padding-top: 8px;
            border-top: 1px solid rgba(34,197,94,.35);
            font-weight: 600;
        }
        .btn{
            width:100%;
            height:46px;
            border:0;
            border-radius: 12px;
            cursor:pointer;
            font-weight: 700;
            letter-spacing:.2px;
            transition: transform .06s ease, box-shadow .15s ease, filter .2s ease;
            margin-bottom: 12px;
        }
        .btn-primary{
            background: linear-gradient(135deg, var(--neon), #9F67FF);
            color:white;
            box-shadow: 0 8px 26px rgba(124,58,237,.35);
        }
        .btn-primary:hover{ filter:brightness(1.08) }
        .btn-primary:active{ transform: translateY(1px) }

        .btn-secondary{
            background: transparent;
            border: 1px solid rgba(156,163,175,.35);
            color: var(--muted);
        }
        .btn-secondary:hover{
            border-color: rgba(156,163,175,.55);
            color: var(--text);
        }

        .tracking-info{
            background: rgba(250,204,21,.08);
            border: 1px solid rgba(250,204,21,.25);
            border-radius: 12px;
            padding: 16px;
            margin: 20px 0;
            font-size: 14px;
        }
        .tracking-number{
            font-family: monospace;
            font-weight: bold;
            color: var(--gold);
            font-size: 16px;
        }

        @media (max-width:480px){
            .card{padding:16px}
            .card-inner{padding:16px}
        }
    </style>
</head>
<body>
<div class="wrap">
    <div style="width: min(520px, 100%);">
        <div class="hero">
            <h1 class="title">Paiement réussi ! 🎉</h1>
            <p class="subtitle">Ton caillou mystère est en préparation...</p>
        </div>

        <div class="card">
            <div class="card-inner">
                <div class="success-icon">🎰</div>
                
                <h2 style="color: var(--jackpot); margin-bottom: 16px;">Commande confirmée !</h2>
                <p style="color: var(--muted); margin-bottom: 20px;">
                    Félicitations ! Ton paiement a été traité avec succès. 
                    Prépare-toi à découvrir ton caillou mystère !
                </p>

                <div class="order-details">
                    <div class="detail-row">
                        <span>Commande n°</span>
                        <span><strong>KYN-{{ date('Ymd') }}-{{ rand(1000, 9999) }}</strong></span>
                    </div>
                    <div class="detail-row">
                        <span>Mystery Box</span>
                        <span>{{ $boxName ?? 'Box #1' }}</span>
                    </div>
                    <div class="detail-row">
                        <span>Montant payé</span>
                        <span><strong>{{ $amount ?? '10' }} €</strong></span>
                    </div>
                    <div class="detail-row">
                        <span>Date</span>
                        <span>{{ date('d/m/Y à H:i') }}</span>
                    </div>
                </div>

                <div class="tracking-info">
                    <p style="margin: 0 0 8px; color: var(--gold);"><strong>📦 Suivi de livraison</strong></p>
                    <p style="margin: 0 0 8px; font-size: 13px;">Numéro de suivi :</p>
                    <div class="tracking-number">KYN{{ rand(100000, 999999) }}FR</div>
                    <p style="margin: 8px 0 0; font-size: 13px; color: var(--muted);">
                        Livraison estimée : {{ date('d/m/Y', strtotime('+3 days')) }}
                    </p>
                </div>

                <p style="font-size: 14px; color: var(--muted); margin: 20px 0;">
                    🎲 <strong>Que va contenir ta box ?</strong><br>
                    Mystère total ! De la simple pierre 1★ au légendaire ULURU 5★...
                </p>

                <a href="{{ route('home') }}" class="btn btn-primary">
                    🏠 Retour à l'accueil
                </a>
                
                <button onclick="shareSuccess()" class="btn btn-secondary">
                    📱 Partager ma chance
                </button>

                <div style="margin-top: 20px; padding-top: 20px; border-top: 1px solid rgba(255,255,255,.08); font-size: 13px; color: var(--muted);">
                    <p>💌 Un email de confirmation a été envoyé (fictif)</p>
                    <p>🎁 Première commande ? Tu as gagné 10% sur ta prochaine box !</p>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- JavaScript pour les effets --}}
<script>
    // Neon breathing on the title
    (function(){
        const t = document.querySelector('.title');
        let dir = 1, glow = 0.55, step = 0.01;
        setInterval(() => {
            glow += step * dir;
            if (glow > 0.95 || glow < 0.35) dir *= -1;
            t.style.textShadow =
                `0 0 22px rgba(34,197,94,${glow}), 0 0 8px rgba(34,197,94,${Math.min(glow+0.2,1)})`;
        }, 40);
    })();

    // Fonction de partage
    function shareSuccess() {
        if (navigator.share) {
            navigator.share({
                title: 'Kayouno - Mystery Box',
                text: 'Je viens d\'acheter une Mystery Box sur Kayouno ! 🎰 Qui sait ce que je vais recevoir...',
                url: window.location.origin
            });
        } else {
            // Fallback pour les navigateurs qui ne supportent pas l'API de partage
            const text = 'Je viens d\'acheter une Mystery Box sur Kayouno ! 🎰 Qui sait ce que je vais recevoir...';
            navigator.clipboard.writeText(text).then(() => {
                alert('Texte copié dans le presse-papier !');
            });
        }
    }

    // Petit effet de confettis (simple)
    function createConfetti() {
        const colors = ['#7C3AED', '#22C55E', '#FACC15', '#F472B6'];
        for (let i = 0; i < 50; i++) {
            setTimeout(() => {
                const confetti = document.createElement('div');
                confetti.style.position = 'fixed';
                confetti.style.left = Math.random() * 100 + 'vw';
                confetti.style.top = '-10px';
                confetti.style.width = '10px';
                confetti.style.height = '10px';
                confetti.style.backgroundColor = colors[Math.floor(Math.random() * colors.length)];
                confetti.style.borderRadius = '50%';
                confetti.style.pointerEvents = 'none';
                confetti.style.zIndex = '9999';
                confetti.style.animation = 'fall 3s linear forwards';
                
                document.body.appendChild(confetti);
                
                setTimeout(() => {
                    confetti.remove();
                }, 3000);
            }, i * 100);
        }
    }

    // CSS pour l'animation des confettis
    const style = document.createElement('style');
    style.textContent = `
        @keyframes fall {
            to {
                transform: translateY(100vh) rotate(360deg);
            }
        }
    `;
    document.head.appendChild(style);

    // Lancer les confettis au chargement
    window.addEventListener('load', () => {
        setTimeout(createConfetti, 500);
    });
</script>
</body>
</html>
