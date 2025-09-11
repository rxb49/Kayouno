<div class="card-header">
    <h2 class="card-title">Informations du profil</h2>
    <p class="card-description">
        Mets à jour tes informations de compte et ton adresse email.
    </p>
</div>

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

{{-- Status de vérification --}}
@if (session('status') === 'verification-link-sent')
    <div class="status">
        Un nouveau lien de vérification a été envoyé à ton adresse email.
    </div>
@endif

<form id="send-verification" method="post" action="{{ route('verification.send') }}">
    @csrf
</form>

<form method="post" action="{{ route('profile.update') }}" style="margin-top: 10px;">
    @csrf
    @method('patch')

    {{-- Nom/Pseudo --}}
    <div class="row">
        <label for="name">Pseudo</label>
        <input
            id="name"
            name="name"
            type="text"
            class="input"
            placeholder="DiamantHunter2024"
            value="{{ old('name', $user->name) }}"
            required
            autofocus
            autocomplete="name"
        >
    </div>

    {{-- Email --}}
    <div class="row">
        <label for="email">Email</label>
        <input
            id="email"
            name="email"
            type="email"
            class="input"
            placeholder="jackpot@casino.com"
            value="{{ old('email', $user->email) }}"
            required
            autocomplete="username"
        >
        
        @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
            <div style="margin-top: 12px; padding: 10px 12px; border-radius: 12px; background: rgba(250,204,21,.10); border: 1px solid rgba(250,204,21,.35); color: #fef3c7; font-size: 13px;">
                <p style="margin: 0 0 8px;">Ton adresse email n'est pas vérifiée.</p>
                <button form="send-verification" type="submit" style="background: none; border: none; color: var(--gold); text-decoration: underline; cursor: pointer; font-size: 13px;">
                    Cliquer ici pour renvoyer l'email de vérification.
                </button>
            </div>
        @endif
    </div>

    <div class="actions">
        <button type="submit" class="btn btn-primary">Sauvegarder</button>
        
        @if (session('status') === 'profile-updated')
            <span class="success-message">Sauvegardé !</span>
        @endif
    </div>
</form>
