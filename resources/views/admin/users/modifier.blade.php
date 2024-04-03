@extends('layouts.admin_menu')
@section('content')
    {{-- retour en arrière  --}}
    <div class="container" id="titre-page">
        <div class="row">
            <div class="col-2 d-flex align-items-center">
                <a href="{{ url('/admin/user/' . $user->id) }}" class="btn btn-dark"><i class="bi bi-arrow-left"></i><span
                        class="btn-description">Retour</span></a>
            </div>
            <div class="col-8 d-flex align-items-center text-center">
                <h2>Modifier les informations de l'utilisateur</h2>
            </div>
        </div>
    </div>


    {{-- -------------------------------------------------------------------------------------- --}}

    <div class="container" style="margin-top: 10px;">

        <div class="row justify-content-center animate__animated animate__backInLeft">

            <div class="col-12 col-md-8 card shadow" style="background-color: #ffff;">

                <div class="card-body">

                    <form class="update-form" action="{{ url('/admin/user/' . $user->id . '/update') }}" data-id="{{ $user->id }}"
                        data-name="{{ $user->name }}" method="POST"
                        enctype="multipart/form-data">

                        @csrf
                        @method('PUT')



                        <div class="row">


                            <div class="col-6" id="cote-gauche">
                                <div class="row">
                                    <div class="col-12 pt-3 pb-3 form-group">
                                        <label><i class="bi bi-person-fill"></i> Nom :</label>

                                        <input type="text" name="name"
                                            class="form-control @if ($errors->get('name')) is-invalid @endif"
                                            id="validationServer01" placeholder="" value="{{ $user->name }}">
                                        <div id="validationServer01Feedback" class="invalid-feedback">
                                            @if ($errors->get('name'))
                                                @foreach ($errors->get('name') as $message)
                                                    {{ $message }}
                                                @endforeach
                                            @endif
                                        </div>

                                    </div>
                                    <div class="col-12 pt-3 pb-3 form-group">
                                        <label><i class="bi bi-envelope-at-fill"></i> E-mail :</label>

                                        <input type="text" name="email"
                                            class="form-control @if ($errors->get('email')) is-invalid @endif"
                                            id="validationServer02" placeholder="" value="{{ $user->email }}">
                                        <div id="validationServer02Feedback" class="invalid-feedback">
                                            @if ($errors->get('email'))
                                                @foreach ($errors->get('email') as $message)
                                                    {{ $message }}
                                                @endforeach
                                            @endif
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="col-6 pt-2 form-group" id="cote-droite">
                                <div class="row d-flex justify-content-center text-center">
                                    <div class="col-12 shadow" id="imagePreview"
                                        style="background-image:url({{ asset('storage/' . $user->photo) }});background-size: cover;background-position: center;
                                background-repeat: no-repeat;  height: 150px; width: 150px; margin-left:5px; margin-right:5px; border-radius:50%;">

                                    </div>
                                    <div class="col-12 pt-2">

                                        <input type="file" name="photo"
                                            class="form-control @if ($errors->get('photo')) is-invalid @endif"
                                            id="validationPhoto" placeholder="" value="">
                                        <div id="validationPhotoFeedback" class="invalid-feedback">
                                            @if ($errors->get('photo'))
                                                @foreach ($errors->get('photo') as $message)
                                                    {{ $message }}
                                                @endforeach
                                            @endif
                                        </div>

                                    </div>
                                </div>

                            </div>
                        </div>


                        <div class="row d-flex justify-content-center align-items-center text-center">
                            <div class="col-6">
                                {{-- save button    --}}
                        
                                    <button type="button" onclick="user_update_confirmation(this)"
                                        class="btn btn-outline-success btn-lg shadow mt-3 ml-1 alpa">
                                        <i class="bi bi-pen"></i>
                                        <span class="btn-description">Enregistrer</span>
                                    </button>
                                
                            </div>

                            <div class="col-6">
                                {{-- annuler button    --}}
                                <a class="btn btn-outline-danger btn-lg alpa shadow mt-3"
                                    href="{{ url('/admin/user/' . $user->id) }}">
                                    <i class="bi bi-x"></i>
                                    <span class="btn-description">Annuler</span>
                                </a>

                            </div>
                        </div>


                    </form>




                </div>

            </div>
        </div>
    </div>

    {{-- -------------------------------------------------------------------------------------- --}}


    <script>
        // affichage de l'image
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


        // Sélection de l'élément img
        const imagePreview = document.getElementById('imagePreview');

        // Écoute de l'événement 'click' sur l'image
        imagePreview.addEventListener('click', function() {
            // Clic sur l'élément input
            document.getElementById('validationPhoto').click();
        });
    </script>

    {{-- -------------------------------------------------------------------------------------- --}}

    {{-- script sauvegarder  --}}
    <script>
        function user_update_confirmation(button) {
            
            const form = button.closest('.update-form');
            
            if (form) {

                const id = form.dataset.id;
                const name = form.dataset.name;

                Swal.fire({
                    title: "Êtes-vous sûr(e) de vouloir enregistrer ?",
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
    {{-- -------------------------------------------------------------------------------------- --}}

    {{-- footer  --}}
    <div class="container" id="pied-page">



    @endsection
