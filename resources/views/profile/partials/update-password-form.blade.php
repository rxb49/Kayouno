<div class="card-header">
    <h2 class="card-title">Changer le mot de passe</h2>
    <p class="card-description">
        Assure-toi d'utiliser un mot de passe long et aléatoire pour rester sécurisé.
    </p>
</div>

{{-- Erreurs --}}
@if ($errors->updatePassword->any())
    <div class="errors">
        <strong>Oups…</strong>
        <ul style="margin:6px 0 0; padding-left:18px;">
            @foreach ($errors->updatePassword->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="post" action="{{ route('password.update') }}" style="margin-top: 10px;">
    @csrf
    @method('put')

    {{-- Mot de passe actuel --}}
    <div class="row">
        <label for="update_password_current_password">Mot de passe actuel</label>
        <input
            id="update_password_current_password"
            name="current_password"
            type="password"
            class="input"
            placeholder="••••••••"
            autocomplete="current-password"
        >
    </div>

    {{-- Nouveau mot de passe --}}
    <div class="row">
        <label for="update_password_password">Nouveau mot de passe</label>
        <input
            id="update_password_password"
            name="password"
            type="password"
            class="input"
            placeholder="••••••••"
            autocomplete="new-password"
        >
    </div>

    {{-- Confirmation --}}
    <div class="row">
        <label for="update_password_password_confirmation">Confirmer le mot de passe</label>
        <input
            id="update_password_password_confirmation"
            name="password_confirmation"
            type="password"
            class="input"
            placeholder="••••••••"
            autocomplete="new-password"
        >
    </div>

    <div class="actions">
        <button type="submit" class="btn btn-primary">Sauvegarder</button>
        
        @if (session('status') === 'password-updated')
            <span class="success-message">Mot de passe mis à jour !</span>
        @endif
    </div>
</form>
