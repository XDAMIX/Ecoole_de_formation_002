@extends('layouts.admin_menu')
@section('content')


    {{-- retour en arrière  --}}
    <div class="container" id="titre-page">
        <div class="row">
            <div class="col-2 d-flex align-items-center">
                <a href="{{ url('/admin/banners') }}" class="btn btn-dark"><i class="bi bi-arrow-left"></i><span
                        class="btn-description">Retour</span></a>
            </div>
            <div class="col-10 d-flex align-items-center">
                <h2>Créer une nouvelle Publicité</h2>
            </div>
        </div>
    </div>


    <div class="container" style="margin-top: 10px;">

        <div class="row animate__animated animate__backInLeft">

            <div class="card shadow">
                {{-- <div class="card-header">
                <h5>Nouvelle Publicité :</h5>
              </div> --}}

                <div class="card-body">
                    <div class="col-12 text-center">
                        <img id="imagePreview" class="" src="" alt="l'image n'a pas été sélectionné!"
                            style="height: 300px;width: auto;">
                    </div>
                    <hr>

                    <form class="add-form" action="{{ url('/admin/banners/save') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="titre">Titre de la pub:</label>
                            <input name="titre" type="text" placeholder="titre"
                                class="form-control @if ($errors->get('titre')) is-invalid @endif" required
                                id="validationTitre">
                            <div id="validationTitreFeedback" class="invalid-feedback">
                                @if ($errors->get('titre'))
                                    @foreach ($errors->get('titre') as $message)
                                        {{ $message }}
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="photo">Sélectionner la photo de la pub:</label>
                            {{-- <input name="photo" type="file" class="form-control @if ($errors->get('photo')) is-invalid @endif" required  id="validationPhoto" Accept="image/*" onchange="previewImage();"> --}}
                            <input name="photo" type="file"
                                class="form-control @if ($errors->get('photo')) is-invalid @endif" required
                                id="validationPhoto" Accept="image/*" placeholder="veuillez choisir une image">
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
                                <button type="button" onclick="sauvegarder(this)" class="btn btn-outline-success alpa shadow"><i
                                    class="bi bi-check2"></i><span
                                    class="btn-description">Enregistrer</span></button>
                            </div>
                            <div class="col-6">
                                <a class="btn btn-outline-danger alpa shadow" href="{{ '/admin/banners' }}"><i
                                        class="bi bi-x"></i><span class="btn-description">Annuler</span></a>
                            </div>
                        </div>
                        {{-- bouttons --}}

                    </form>
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



    {{-- --------------------------------------------------------------     --}}

    {{-- script sauvegarder  --}}
    <script>
        function sauvegarder(button) {
            // Utilisez le bouton pour obtenir le formulaire parent
            const form = button.closest('.add-form');
    
            // Vérifiez si le formulaire a été trouvé
            if (form) {
    
                Swal.fire({
                    title: "Êtes-vous sûr(e) de vouloir enregistrer la pub ?",
                    text: name,
                    icon: "question",
                    showCancelButton: true,
                    confirmButtonColor: "#198754",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Oui",
                    cancelButtonText: "Non",
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            } else {
                console.error("Le formulaire n'a pas été trouvé.");
            }
        }
    </script>



{{-- ------------------------------ --}}
            <style>
                /* i {
                        margin-right: 10px;
                    } */
            </style>



            {{-- footer  --}}
            <div class="container" id="pied-page">

            @endsection
