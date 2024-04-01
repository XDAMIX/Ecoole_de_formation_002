@extends('layouts.admin_menu')
@section('content')

    <script>
        function previewImage() {
            var file = document.getElementById("validationServer06").files;
            if (file.length > 0) {
                var fileReader = new FileReader();

                fileReader.onload = function(event) {
                    document.getElementById("preview").setAttribute("src", event.target.result)
                };
                fileReader.readAsDataURL(file[0]);
            }
        }
    </script>

    {{-- -------------------------------------------------------------------------------------- --}}
    <div class="container" id="titre-page">
        <div class="row">
            <div class="col-2 d-flex align-items-center">
                <a href="{{ url('/admin/formations') }}" class="btn btn-dark"><i class="bi bi-arrow-left"></i><span
                        class="btn-description">Retour</span></a>
            </div>
            <div class="col-8 text-center">
                <h2>Ajouter une nouvelle formation</h2>
            </div>
        </div>
    </div>


    {{-- -------------------------------------------------------------------------------------- --}}

    <div class="container">

        <div class="row animate__animated animate__backInLeft">
            <div class="col-md-12">
                <div class="card shadow" style="background-color: #ffff;">
                    {{-- <div class="card-header"style="text-align:center;">
                  <a style="font-size: 20px;">Nouveau bloc de présentation</a>
                </div> --}}
                    <div class="card-body">




                        <form class="add-form" action="{{ url('/admin/formation/save') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf

                            <div class="row">

                                <div class="form-group">

                                    <label for="">Titre:</label>
                                    <input type="text" name="titre"
                                        class="form-control @if ($errors->get('titre')) is-invalid @endif"
                                        id="ValidationTitre" placeholder="le titre" value="{{ old('titre') }}" required>
                                    <div id="ValidationTitreFeedback" class="invalid-feedback">
                                        @if ($errors->get('titre'))
                                            @foreach ($errors->get('titre') as $message)
                                                {{ $message }}
                                            @endforeach
                                        @endif
                                    </div>


                                </div>

                                <div class="form-group">

                                    <label for="">Duré:</label>
                                    <input type="text" name="dure"
                                        class="form-control @if ($errors->get('dure')) is-invalid @endif"
                                        id="validationDure" placeholder="la duré" value="{{ old('dure') }}" required>
                                    <div id="validationDureFeedback" class="invalid-feedback">
                                        @if ($errors->get('dure'))
                                            @foreach ($errors->get('dure') as $message)
                                                {{ $message }}
                                            @endforeach
                                        @endif
                                    </div>

                                </div>

                                <div class="form-group">

                                    <label for="">Description:</label>
                                    <textarea type="text" name="description" class="form-control @if ($errors->get('description')) is-invalid @endif"
                                        id="validationDescription" placeholder="la description" value="" required>{{ old('description') }}</textarea>
                                    <div id="validationDescriptionFeedback" class="invalid-feedback">
                                        @if ($errors->get('description'))
                                            @foreach ($errors->get('description') as $message)
                                                {{ $message }}
                                            @endforeach
                                        @endif
                                    </div>

                                </div>


                                <div class="form-group">

                                    <label for="">Public concerné:</label>
                                    <textarea type="text" name="publique" class="form-control @if ($errors->get('publique')) is-invalid @endif"
                                        id="validationPublic" placeholder="le public concerné" value="" required>{{ old('publique') }}</textarea>
                                    <div id="validationPublicFeedback" class="invalid-feedback">
                                        @if ($errors->get('publique'))
                                            @foreach ($errors->get('publique') as $message)
                                                {{ $message }}
                                            @endforeach
                                        @endif
                                    </div>

                                </div>


                                <div class="form-group">

                                    <label for="">Objectifs:</label>
                                    <textarea type="text" name="objectifs" class="form-control @if ($errors->get('objectifs')) is-invalid @endif"
                                        id="validationObjectifs" placeholder="les objectifs de la formation" value="" required>{{ old('objectifs') }}</textarea>
                                    <div id="validationObjectifsFeedback" class="invalid-feedback">
                                        @if ($errors->get('objectifs'))
                                            @foreach ($errors->get('objectifs') as $message)
                                                {{ $message }}
                                            @endforeach
                                        @endif
                                    </div>

                                </div>

                            </div>


                            {{-- paiement --}}
                            {{-- ---------------------------------------------------------- --}}

                            <div class="row espace-inputs justify-content-center">
                                <div class="col-md-12">
                                    <hr>
                                    <h5 style="text-align: center"><i class="bi bi-cash-stack"></i> Tarifs : (en Dinars)
                                    </h5>
                                    <hr>
                                </div>
                                <div class="row">

                                    @if ($types && $types->count() == 1)
                                        @foreach ($types as $type)
                                            <div class="col-12 form-group" id="montant" style="text-align: center;">
                                                <label for=""> {{ $type->titre }} :</label>

                                                <input type="number" value="0" name="montant_{{ $type->titre }}"
                                                    pattern="[0-9]*"
                                                    class="form-control @if ($errors->get('montant')) is-invalid @endif"
                                                    id="validationMontant_{{ $loop->index }}"
                                                    onfocus="attachKeyPressEvent(this.id)"
                                                    onblur="detachKeyPressEvent(this.id)" 
                                                    placeholder="Veuillez saisir le montant">

                                                <div id="validationMontantFeedback" class="invalid-feedback">
                                                    @if ($errors->get('montant'))
                                                        @foreach ($errors->get('montant') as $message)
                                                            {{ $message }}
                                                        @endforeach
                                                    @endif
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif

                                    @if ($types && $types->count() == 2)
                                        @foreach ($types as $type)
                                            <div class="col-12 col-md-6 form-group" id="montant"
                                                style="text-align: center;">
                                                <label for=""> {{ $type->titre }} :</label>

                                                <input type="number" value="0" name="montant_{{ $type->titre }}"
                                                    pattern="[0-9]*"
                                                    class="form-control @if ($errors->get('montant')) is-invalid @endif"
                                                    id="validationMontant_{{ $loop->index }}"
                                                    onfocus="attachKeyPressEvent(this.id)"
                                                    onblur="detachKeyPressEvent(this.id)" 
                                                    placeholder="Veuillez saisir le montant">

                                                <div id="validationMontantFeedback" class="invalid-feedback">
                                                    @if ($errors->get('montant'))
                                                        @foreach ($errors->get('montant') as $message)
                                                            {{ $message }}
                                                        @endforeach
                                                    @endif
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif

                                    @if ($types && $types->count() == 3)
                                        @foreach ($types as $type)
                                            <div class="col-12 col-md-4 form-group" style="text-align: center;">
                                                <label for=""> {{ $type->titre }} :</label>

                                                <input type="number" value="0" name="montant_{{ $type->titre }}"
                                                    class="form-control @if ($errors->get('montant')) is-invalid @endif"
                                                    id="validationMontant_{{ $loop->index }}"
                                                    onfocus="attachKeyPressEvent(this.id)"
                                                    onblur="detachKeyPressEvent(this.id)"
                                                    placeholder="Veuillez saisir le montant">

                                                <div id="validationMontantFeedback" class="invalid-feedback">
                                                    @if ($errors->get('montant'))
                                                        @foreach ($errors->get('montant') as $message)
                                                            {{ $message }}
                                                        @endforeach
                                                    @endif
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif


                                    @if ($types && $types->count() >= 4)
                                        @foreach ($types as $type)
                                            <div class="col-12 col-md-3 form-group" id="montant"
                                                style="text-align: center;">
                                                <label for=""> {{ $type->titre }} :</label>

                                                <input type="number" value="0" name="montant_{{ $type->titre }}"
                                                    pattern="[0-9]*"
                                                    class="form-control @if ($errors->get('montant')) is-invalid @endif"
                                                    id="validationMontant_{{ $loop->index }}"
                                                    onfocus="attachKeyPressEvent(this.id)"
                                                    onblur="detachKeyPressEvent(this.id)" 
                                                    placeholder="Veuillez saisir le montant">

                                                <div id="validationMontantFeedback" class="invalid-feedback">
                                                    @if ($errors->get('montant'))
                                                        @foreach ($errors->get('montant') as $message)
                                                            {{ $message }}
                                                        @endforeach
                                                    @endif
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>


                                <div class="form-group">
                                    <label for="photo">Photo :</label>
                                    {{-- <input name="photo" type="file" class="form-control @if ($errors->get('photo')) is-invalid @endif" required  id="validationPhoto" Accept="image/*" onchange="previewImage();"> --}}
                                    <input name="photo" type="file"
                                        class="form-control @if ($errors->get('photo')) is-invalid @endif" required
                                        id="validationPhoto" Accept="image/*" placeholder="veuillez choisir une image"
                                        required>
                                    <div id="validationPhotoFeedback" class="invalid-feedback">
                                        @if ($errors->get('photo'))
                                            @foreach ($errors->get('photo') as $message)
                                                {{ $message }}
                                            @endforeach
                                        @endif
                                    </div>
                                </div>

                                <div class="col-12 text-center">
                                    <img id="imagePreview" class="" src=""
                                        alt="l'image n'a pas été sélectionné!" style="height: 300px;width: auto;">
                                </div>


                            </div>

                            <br>
                            <div class="form-group row justify-content-center text-center">
                                <div class="col-6">
                                    <button type="button" onclick="sauvegarder(this)"
                                        class="btn btn-outline-success alpa shadow"><i class="bi bi-check2"></i><span
                                            class="btn-description">Enregistrer</span></button>
                                </div>
                                <div class="col-6">
                                    <a class="btn btn-outline-danger alpa shadow" href="{{ '/admin/formations' }}"><i
                                            class="bi bi-x"></i><span class="btn-description">Annuler</span></a>
                                </div>
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




    {{-- script sauvegarder  --}}
    <script>
        function sauvegarder(button) {
            // Utilisez le bouton pour obtenir le formulaire parent
            const form = button.closest('.add-form');

            // Vérifiez si le formulaire a été trouvé
            if (form) {

                Swal.fire({
                    title: "Êtes-vous sûr(e) de vouloir enregistrer cette formation ?",
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



<script>
    function attachKeyPressEvent(inputId) {
        var inputElement = document.getElementById(inputId);
        inputElement.addEventListener('keypress', validateNumberInput);
    }

    function detachKeyPressEvent(inputId) {
        var inputElement = document.getElementById(inputId);
        inputElement.removeEventListener('keypress', validateNumberInput);
    }

    function validateNumberInput(event) {
        var keyCode = event.keyCode || event.which;
        if (keyCode < 48 || keyCode > 57) {
            event.preventDefault();
        }
    }
</script>













    {{-- footer  --}}
    <div class="container" id="pied-page"></div>

@endsection
