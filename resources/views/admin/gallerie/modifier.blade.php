@extends('layouts.admin_menu')
@section('content')

{{-- retour en arrière  --}}
<div class="container" id="titre-page">
    <div class="row">
        <div class="col-2 d-flex align-items-center">
            <a href="{{ url('/admin/gallerie') }}" class="btn btn-dark"><i class="bi bi-arrow-left"></i><span
                    class="btn-description">Retour</span></a>
        </div>
        <div class="col-10 d-flex align-items-center">
            <h2>Modifier les informations de l'actualité</h2>
        </div>
    </div>
</div>


<div class="container" style="padding-top: 10px;">

    <div class="row animate__animated animate__backInLeft">

        <div class="card shadow">
            {{-- <div class="card-header">
                <h5>Modifier la publicité :</h5>
              </div> --}}

            <div class="card-body">
                <div class="col-12 text-center">
                    <img id="imagePreview" class="" src="{{ asset('storage/' . $photo->photo) }}"
                        alt="l'image n'a pas été sélectionné!" style="height: 300px;width: auto;">
                </div>
                <hr>

                <form action="{{ url('/admin/gallerie/' . $photo->id . '/update') }}" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="titre">Titre de l'actualité :</label>
                        <input type="text" name="titre"
                            class="form-control @if ($errors->get('titre')) is-invalid @endif"
                            id="validationTitre" placeholder="titre" value="{{ $photo->titre }}" required>
                        <div id="validationTitreFeedback" class="invalid-feedback">
                            @if ($errors->get('titre'))
                                @foreach ($errors->get('titre') as $message)
                                    {{ $message }}
                                @endforeach
                            @endif
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="emplacement">Emplaçement :</label>
                        <input type="text" name="emplacement"
                            class="form-control" placeholder="emplacement" value="{{ $photo->emplacement }}" required>
                    </div>


                    <div class="form-group">
                        <label for="dure">Durée :</label>
                        <input type="text" name="dure"
                            class="form-control" placeholder="dure" value="{{ $photo->dure }}" required>
                    </div>


                    <div class="form-group">
                        <label for="description">Description :</label>
                        <textarea name="description"
                            class="form-control" placeholder="description" required>{{ $photo->description}}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="photo">Photo:</label>
                        <input type="file" name="photo"
                            class="form-control @if ($errors->get('photo')) is-invalid @endif"
                            id="validationPhoto" accept="image/*" onchange="previewImage();">
                        <input type="text" name="photo" hidden value="{{ $photo->photo }}">

                        <div id="validationPhotoFeedback" class="invalid-feedback">
                            @if ($errors->get('photo'))
                                @foreach ($errors->get('photo') as $message)
                                    {{ $message }}
                                @endforeach
                            @endif
                        </div>
                    </div>

                    {{-- bouttons --}}
                    <div class="form-group row justify-content-center text-center" id="double-btn">
                        <div class="col-6">
                            <button type="submit" class="btn btn-outline-success alpa shadow"><i
                                    class="bi bi-check2 bi-lg"></i><span class="btn-description">Enregistrer</span></button>
                        </div>
                        <div class="col-6">
                            <a class="btn btn-outline-danger alpa shadow" href="{{ '/admin/gallerie' }}"><i
                                    class="bi bi-x"></i><span class="btn-description">Annuler</span></a>
                        </div>
                    </div>
                    {{-- bouttons --}}
                </form>

            </div>
        </div>
    </div>
</div>

<script>
    // affichage de l'image
    // --------------------------------------------------------------------------------------

    // Sélection de l'élément input
    const input = document.getElementById('validationPhoto');

    // Écoute de l'événement 'change' sur l'input
    input.addEventListener('change', function() {
        // Vérification s'il y a un fichier sélectionné
        if (input.files && input.files[0]) {
            // Création d'un objet FileReader
            const reader = new FileReader();

            // Événement 'load' déclenché lorsque la lecture est terminée
            reader.onload = function(e) {
                // Mise à jour de l'attribut src de l'élément img avec les données de l'image
                document.getElementById('imagePreview').src = e.target.result;
            };

            // Lecture du contenu de l'image en tant que URL de données
            reader.readAsDataURL(input.files[0]);
        }
    });


    // choix de l'image
    // -----------------------------------------------------------------------------------------

    // Sélection de l'élément img
    const imagePreview = document.getElementById('imagePreview');

    // Écoute de l'événement 'click' sur l'image
    imagePreview.addEventListener('click', function() {
        // Clic sur l'élément input
        document.getElementById('validationPhoto').click();
    });
</script>

<style>

    
</style>


{{-- footer  --}}
<div class="container" id="pied-page">


@endsection
