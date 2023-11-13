{{-- retour à l'acceuil  --}}
<div class="container" id="titre-page">
    <div class="row">
        <div class="col-2 d-flex align-items-center">
            <a href="{{ url('/admin/') }}" class="btn btn-dark"><i class="bi bi-house"></i><span
                    class="btn-description">Acceuil</span></a>
        </div>
        <div class="col-10 d-flex align-items-center">
            <h2>Réglages Informations</h2>
        </div>
    </div>
</div>


{{-- retour en arrière  --}}
<div class="container" id="titre-page">
    <div class="row">
        <div class="col-2 d-flex align-items-center">
            <a href="{{ url('/admin/ecole') }}" class="btn btn-dark"><i class="bi bi-arrow-left"></i><span
                    class="btn-description">Retour</span></a>
        </div>
        <div class="col-10 d-flex align-items-center">
            <h2>Modifier le lien vers le compte</h2>
        </div>
    </div>
</div>

{{-- footer  --}}
<div class="container" id="pied-page">



    {{-- form buttons  --}}
    <div class="form-group row justify-content-center text-center">
        <div class="col-6">
            <button type="submit" class="btn btn-outline-success"><i class="bi bi-check2 icons"></i>Enregistrer</button>
        </div>
            <div class="col-6">
                <a class="btn btn-outline-danger" href="{{ '/lien/vers/la/liste' }}"><i class="bi bi-x icons"></i>Annuler</a>
            </div>
    </div>

    {{-- card  --}}
    <div class="card" style="background-color: #ffff;">
        <div class="card-body">