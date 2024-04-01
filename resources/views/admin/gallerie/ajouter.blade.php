@extends('layouts.admin_menu')
@section('content')


    {{-- retour en arrière  --}}
    <div class="container" id="titre-page">
        <div class="row">
            <div class="col-2 d-flex align-items-center">
                <a href="{{ url('/admin/gallerie') }}" class="btn btn-dark"><i class="bi bi-arrow-left"></i><span
                        class="btn-description">Retour</span></a>
            </div>
            <div class="col-10 text-center">
                <h2>Ajouter une nouvelle l'actualité</h2>
            </div>
        </div>
    </div>




    {{-- --------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- --}}

    <div class="container" style="margin-top: 10px;">

        <div class="row animate__animated animate__backInLeft">

            <div class="card shadow col-12">


                <div class="card-body col-12">


                    <form class="add-form" action="{{ url('/admin/gallerie/save') }}" method="post"
                        enctype="multipart/form-data">
                        @csrf

                        <div class="row">


                            <div class="col-12 col-md-6 gauche">


                                <div class="form-group">
                                    <label for="titre">Titre de l'actualité :</label>
                                    <input type="text" name="titre"
                                        class="form-control @if ($errors->get('titre')) is-invalid @endif"
                                        id="validationTitre" placeholder="titre" required>
                                    <div id="validationTitreFeedback" class="invalid-feedback">
                                        @if ($errors->get('titre'))
                                            @foreach ($errors->get('titre') as $message)
                                                {{ $message }}
                                            @endforeach
                                        @endif
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label for="emplacement">Emplacement :</label>
                                    <input type="text" name="emplacement" class="form-control" placeholder="emplacement"
                                        required>
                                </div>


                                <div class="form-group">
                                    <label for="dure">Durée :</label>
                                    <input type="text" name="dure" class="form-control" placeholder="dure" required>
                                </div>


                                <div class="form-group">
                                    <label for="description">Description :</label>
                                    <textarea name="description" class="form-control" placeholder="description" required></textarea>
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
                                                class="bi bi-check2 icons"></i><span class="btn-description">Enregistrer</span></button>
                                    </div>
                                    <div class="col-6">
                                        <a class="btn btn-outline-danger alpa shadow" href="{{ '/admin/gallerie' }}"><i
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
                    title: "Êtes-vous sûr(e) de vouloir enregistrer cette actualité ?",
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
