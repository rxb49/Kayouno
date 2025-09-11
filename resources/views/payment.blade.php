{{-- resources/views/payment.blade.php --}}
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1, maximum-scale=1"
    >
    <title>Paiement — Kayouno</title>

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
            color: var(--text);
            text-shadow:
                0 0 22px rgba(124,58,237,.55),
                0 0 8px rgba(124,58,237,.75);
        }
        .subtitle{
            color:var(--muted);
            font-size:14px;
        }
        .card{
            width: min(520px, 100%);
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
        .order-summary{
            background: rgba(34,197,94,.08);
            border: 1px solid rgba(34,197,94,.25);
            border-radius: var(--radius);
            padding: 16px;
            margin-bottom: 20px;
        }
        .order-item{
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 8px;
        }
        .order-item:last-child{
            margin-bottom: 0;
            padding-top: 8px;
            border-top: 1px solid rgba(34,197,94,.35);
            font-weight: 600;
            color: var(--jackpot);
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
        .row-half{
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 12px;
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
        }
        .btn-primary{
            background: linear-gradient(135deg, var(--jackpot), #16A34A);
            color:white;
            box-shadow: 0 8px 26px rgba(34,197,94,.35);
        }
        .btn-primary:hover{ filter:brightness(1.08) }
        .btn-primary:active{ transform: translateY(1px) }

        .btn-secondary{
            background: transparent;
            border: 1px solid rgba(156,163,175,.35);
            color: var(--muted);
            margin-bottom: 12px;
        }
        .btn-secondary:hover{
            border-color: rgba(156,163,175,.55);
            color: var(--text);
        }

        .payment-methods{
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 12px;
            margin-bottom: 20px;
        }
        .payment-method{
            padding: 12px;
            border: 1px solid rgba(255,255,255,.08);
            border-radius: 12px;
            text-align: center;
            cursor: pointer;
            transition: .15s ease;
            background: rgba(0,0,0,.2);
        }
        .payment-method:hover{
            border-color: rgba(124,58,237,.5);
        }
        .payment-method.active{
            border-color: var(--neon);
            background: rgba(124,58,237,.15);
        }
        .payment-method-icon{
            font-size: 24px;
            margin-bottom: 4px;
        }
        .payment-method-name{
            font-size: 12px;
            color: var(--muted);
        }

        .security-info{
            background: rgba(250,204,21,.08);
            border: 1px solid rgba(250,204,21,.25);
            border-radius: 12px;
            padding: 12px;
            margin-top: 16px;
            font-size: 13px;
            color: #fef3c7;
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

        @media (max-width:480px){
            .card{padding:16px}
            .card-inner{padding:16px}
            .payment-methods{
                grid-template-columns: 1fr;
            }
            .row-half{
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
<div class="wrap">
    <div style="width: min(520px, 100%);">
        <a href="{{ url()->previous() }}" class="nav-back">
            ← Retour à la sélection
        </a>

        <div class="hero">
            <h1 class="title">Finaliser l'achat 💳</h1>
            <p class="subtitle">Quelques infos et c'est parti pour l'aventure !</p>
        </div>

        <div class="card">
            <div class="card-inner">
                {{-- Résumé de commande --}}
                <div class="order-summary">
                    <div class="order-item">
                        <span>{{ $boxName ?? 'Mystery Box' }}</span>
                        <span>{{ $boxPrice ?? '10' }} €</span>
                    </div>
                    <div class="order-item">
                        <span>Frais de port</span>
                        <span>aléatoire 🤪</span>
                    </div>
                    <div class="order-item">
                        <span><strong>Total</strong></span>
                        <span><strong>{{ $boxPrice ?? '10' }} €</strong></span>
                    </div>
                </div>

                <form action="{{ route('payment.process') }}" method="POST" id="paymentForm">
                    @csrf
                    <input type="hidden" name="box_id" value="{{ $boxId ?? '1' }}">
                    <input type="hidden" name="amount" value="{{ $boxPrice ?? '10' }}">

                    {{-- Méthodes de paiement --}}
                    <div class="payment-methods">
                        <div class="payment-method active" onclick="selectPaymentMethod(this, 'card')">
                            <div class="payment-method-icon">💳</div>
                            <div class="payment-method-name">Carte bancaire</div>
                        </div>
                        <div class="payment-method" onclick="selectPaymentMethod(this, 'paypal')">
                            <div class="payment-method-icon">🅿️</div>
                            <div class="payment-method-name">PayPal</div>
                        </div>
                    </div>
                    <input type="hidden" name="payment_method" value="card" id="paymentMethodInput">

                    {{-- Informations de paiement --}}
                    <div id="cardForm">
                        <div class="row">
                            <label for="card_number">Numéro de carte</label>
                            <input
                                id="card_number"
                                name="card_number"
                                type="text"
                                class="input"
                                placeholder="1234 5678 9012 3456"
                                maxlength="19"
                                required
                            >
                        </div>

                        <div class="row-half">
                            <div>
                                <label for="expiry">Date d'expiration</label>
                                <input
                                    id="expiry"
                                    name="expiry"
                                    type="text"
                                    class="input"
                                    placeholder="MM/AA"
                                    maxlength="5"
                                    required
                                >
                            </div>
                            <div>
                                <label for="cvv">CVV</label>
                                <input
                                    id="cvv"
                                    name="cvv"
                                    type="text"
                                    class="input"
                                    placeholder="123"
                                    maxlength="4"
                                    required
                                >
                            </div>
                        </div>

                        <div class="row">
                            <label for="card_name">Nom sur la carte</label>
                            <input
                                id="card_name"
                                name="card_name"
                                type="text"
                                class="input"
                                placeholder="Jean Dupont"
                                required
                            >
                        </div>
                    </div>

                    {{-- Informations de livraison --}}
                    <div style="margin-top: 24px;">
                        <h3 style="color: var(--text); margin-bottom: 16px; font-size: 16px;">Adresse de livraison</h3>
                        
                        <div class="row">
                            <label for="address">Adresse</label>
                            <input
                                id="address"
                                name="address"
                                type="text"
                                class="input"
                                placeholder="123 Rue de la Chance"
                                required
                            >
                        </div>

                        <div class="row-half">
                            <div>
                                <label for="city">Ville</label>
                                <input
                                    id="city"
                                    name="city"
                                    type="text"
                                    class="input"
                                    placeholder="Paris"
                                    required
                                >
                            </div>
                            <div>
                                <label for="postal_code">Code postal</label>
                                <input
                                    id="postal_code"
                                    name="postal_code"
                                    type="text"
                                    class="input"
                                    placeholder="75001"
                                    required
                                >
                            </div>
                        </div>
                    </div>

                    <button type="button" class="btn btn-secondary" onclick="fillRandomData()">
                        ✨ Remplir avec des données aléatoires
                    </button>

                    <button type="submit" class="btn btn-primary">
                        🎰 Confirmer et payer {{ $boxPrice ?? '10' }} €
                    </button>

                    <div class="security-info">
                        🔒 <strong>Paiement sécurisé fictif</strong><br>
                        Tes données ne sont pas sauvegardées, c'est juste pour le fun !
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

{{-- JavaScript pour les interactions --}}
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

    // Sélection de méthode de paiement
    function selectPaymentMethod(element, method) {
        document.querySelectorAll('.payment-method').forEach(el => el.classList.remove('active'));
        element.classList.add('active');
        document.getElementById('paymentMethodInput').value = method;
        
        const cardForm = document.getElementById('cardForm');
        if (method === 'paypal') {
            cardForm.style.display = 'none';
        } else {
            cardForm.style.display = 'block';
        }
    }

    // Formatage automatique des champs
    document.getElementById('card_number').addEventListener('input', function(e) {
        let value = e.target.value.replace(/\s+/g, '').replace(/[^0-9]/gi, '');
        let formattedValue = value.match(/.{1,4}/g)?.join(' ') || value;
        e.target.value = formattedValue;
    });

    document.getElementById('expiry').addEventListener('input', function(e) {
        let value = e.target.value.replace(/\D/g, '');
        if (value.length >= 2) {
            value = value.substring(0,2) + '/' + value.substring(2,4);
        }
        e.target.value = value;
    });

    document.getElementById('cvv').addEventListener('input', function(e) {
        e.target.value = e.target.value.replace(/\D/g, '');
    });

    // Remplissage automatique avec des données aléatoires
    function fillRandomData() {
        const names = ['Jean Dupont', 'Marie Martin', 'Pierre Durand', 'Sophie Moreau', 'Luc Bernard'];
        const addresses = ['123 Rue de la Chance', '45 Avenue du Jackpot', '78 Boulevard des Mystères', '12 Place du Casino'];
        const cities = ['Paris', 'Lyon', 'Marseille', 'Toulouse', 'Nice', 'Nantes'];
        
        // Données de carte
        document.getElementById('card_number').value = '4242 4242 4242 4242';
        document.getElementById('expiry').value = '12/28';
        document.getElementById('cvv').value = '123';
        document.getElementById('card_name').value = names[Math.floor(Math.random() * names.length)];
        
        // Adresse
        document.getElementById('address').value = addresses[Math.floor(Math.random() * addresses.length)];
        document.getElementById('city').value = cities[Math.floor(Math.random() * cities.length)];
        document.getElementById('postal_code').value = Math.floor(10000 + Math.random() * 90000).toString();
        
        // Petit feedback visuel
        const btn = event.target;
        btn.style.filter = 'brightness(1.15)';
        setTimeout(() => btn.style.filter = '', 180);
    }
</script>
</body>
</html>
