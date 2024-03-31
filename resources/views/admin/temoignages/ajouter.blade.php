@extends('layouts.admin_menu')
@section('content')


    {{-- retour en arrière  --}}
    <div class="container" id="titre-page">
        <div class="row">
            <div class="col-2 d-flex align-items-center">
                <a href="{{ url('/admin/temoignages') }}" class="btn btn-dark"><i class="bi bi-arrow-left"></i><span
                        class="btn-description">Retour</span></a>
            </div>
            <div class="col-10 d-flex align-items-center pl-5">
                <h2>Ajouter une nouveau témoignage</h2>
            </div>
        </div>
    </div>




    {{-- --------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- --}}

    <div class="container" style="margin-top: 10px;">

        <div class="row animate__animated animate__backInLeft">

            <div class="card shadow col-12">


                <div class="card-body col-12">


                    <form class="add-form" action="{{ url('/admin/temoignages/save') }}" method="post"
                        enctype="multipart/form-data">
                        @csrf

                        <div class="row">


                            <div class="col-12 col-md-6 gauche">


                                <div class="form-group">
                                    <label for="nom">Nom :</label>
                                    <input type="text" name="nom"
                                        class="form-control @if ($errors->get('nom')) is-invalid @endif"
                                        id="validationNom" placeholder="nom" required>
                                    <div id="validationNomFeedback" class="invalid-feedback">
                                        @if ($errors->get('nom'))
                                            @foreach ($errors->get('nom') as $message)
                                                {{ $message }}
                                            @endforeach
                                        @endif
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label for="poste">Poste ou Fonction / Formation Suivie :</label>
                                    <input type="text" name="poste"
                                        class="form-control @if ($errors->get('poste')) is-invalid @endif"
                                        id="validationPoste" placeholder="poste / formation" required>
                                    <div id="validationPosteFeedback" class="invalid-feedback">
                                        @if ($errors->get('poste'))
                                            @foreach ($errors->get('poste') as $message)
                                                {{ $message }}
                                            @endforeach
                                        @endif
                                    </div>
                                </div>



                                <div class="form-group">
                                    <label for="mot">Mot :</label>
                                    <textarea name="mot" class="form-control @if ($errors->get('mot')) is-invalid @endif" id="validationMot"
                                        placeholder="mot sur l'école" required></textarea>
                                    <div id="validationMotFeedback" class="invalid-feedback">
                                        @if ($errors->get('mot'))
                                            @foreach ($errors->get('mot') as $message)
                                                {{ $message }}
                                            @endforeach
                                        @endif
                                    </div>
                                </div>



                                <div class="form-group">
                                    <label for="photo">Photo:</label>
                                    <input type="file" name="photo"
                                        class="form-control @if ($errors->get('photo')) is-invalid @endif"
                                        id="validationPhoto" accept="image/*" onchange="previewImage();">
                                    <input type="text" name="photo" hidden>

                                    <div id="validationPhotoFeedback" class="invalid-feedback">
                                        @if ($errors->get('photo'))
                                            @foreach ($errors->get('photo') as $message)
                                                {{ $message }}
                                            @endforeach
                                        @endif
                                    </div>
                                </div>

                            </div>
                            {{-- ---------------------------------------------------------- --}}
                            <div class="col-12 col-md-6 droite" id="imagePreview"
                                style="background-image:; background-size: cover;background-position: center;background-repeat: no-repeat;  height:500px;">
                                <label for="imagePreview">Photo :</label>
                            </div>
                            {{-- ---------------------------------------------------------- --}}


                            {{-- ------------------------------------------------------------------------------------------------------------------------------- --}}
                            {{-- bouttons --}}
                            <div class="col-12 boutons">
                                <hr>
                                <div class="row justify-content-center text-center py-5" id="double-btn">
                                    <div class="form-group col-6">
                                        <button type="button" onclick="sauvegarder(this)"
                                            class="btn btn-outline-success alpa shadow"><i
                                                class="bi bi-check2 icons"></i><span
                                                class="btn-description">Enregistrer</span></button>
                                    </div>
                                    <div class="col-6">
                                        <a class="btn btn-outline-danger alpa shadow" href="{{ '/admin/temoignages' }}"><i
                                                class="bi bi-x"></i><span class="btn-description">Annuler</span></a>
                                    </div>
                                </div>
                                {{-- bouttons --}}
                            </div>
                    </form>

                </div>
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
                    // document.getElementById('imagePreview').src = e.target.result;
                    document.getElementById('imagePreview').style.backgroundImage = "url('" + e.target.result +
                        "')";
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


    {{-- ---------------------------------------------------------- --}}

    {{-- script sauvegarder  --}}
    <script>
        function sauvegarder(button) {
            // Utilisez le bouton pour obtenir le formulaire parent
            const form = button.closest('.add-form');

            // Vérifiez si le formulaire a été trouvé
            if (form) {

                Swal.fire({
                    title: "Êtes-vous sûr(e) de vouloir enregistrer ce témoignage ?",
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



    {{-- footer  --}}
    <div class="container" id="pied-page">


    @endsection
