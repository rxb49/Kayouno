<div class="card-header">
    <h2 class="card-title">Supprimer le compte</h2>
    <p class="card-description">
        Une fois ton compte supprimé, toutes tes données seront définitivement effacées. Avant de supprimer ton compte, assure-toi de télécharger toutes les données que tu souhaites conserver.
    </p>
</div>

{{-- Erreurs --}}
@if ($errors->userDeletion->any())
    <div class="errors">
        <strong>Oups…</strong>
        <ul style="margin:6px 0 0; padding-left:18px;">
            @foreach ($errors->userDeletion->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div style="margin-top: 10px;">
    <button type="button" class="btn btn-danger" onclick="openDeleteModal()">
        🗑️ Supprimer le compte
    </button>
</div>

{{-- Modal de confirmation --}}
<div id="deleteModal" class="modal">
    <div class="modal-content">
        <h2 class="modal-title">Es-tu sûr de vouloir supprimer ton compte ?</h2>
        <p class="modal-description">
            Une fois ton compte supprimé, toutes tes données seront définitivement effacées. Saisis ton mot de passe pour confirmer que tu veux supprimer définitivement ton compte.
        </p>
        
        <form method="post" action="{{ route('profile.destroy') }}">
            @csrf
            @method('delete')
            
            <div class="row">
                <label for="delete_password">Mot de passe</label>
                <input
                    id="delete_password"
                    name="password"
                    type="password"
                    class="input"
                    placeholder="Confirme avec ton mot de passe"
                    required
                >
            </div>
            
            <div class="modal-actions">
                <button type="button" class="btn btn-secondary" onclick="closeDeleteModal()">
                    Annuler
                </button>
                <button type="submit" class="btn btn-danger">
                    Supprimer le compte
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    function openDeleteModal() {
        document.getElementById('deleteModal').classList.add('show');
        document.getElementById('delete_password').focus();
    }
    
    function closeDeleteModal() {
        document.getElementById('deleteModal').classList.remove('show');
        document.getElementById('delete_password').value = '';
    }
    
    // Fermer la modal en cliquant à l'extérieur
    document.getElementById('deleteModal').addEventListener('click', function(e) {
        if (e.target === this) {
            closeDeleteModal();
        }
    });
    
    // Fermer la modal avec Escape
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            closeDeleteModal();
        }
    });
</script>
