@extends('layouts.admin_menu')
@section('content')
    {{-- retour en arrière  --}}
    <div class="container" id="titre-page">
        <div class="row">
            <div class="col-2 d-flex align-items-center">
                <a href="{{ url('/admin') }}" class="btn btn-dark"><i class="bi bi-house"></i><span
                        class="btn-description">Acceuil</span></a>
            </div>
            <div class="col-8  text-center">
                <h2>Informations de l'utilisateur</h2>
            </div>
        </div>
    </div>


    {{-- -------------------------------------------------------------------------------------- --}}

    <div class="container" style="margin-top: 10px;">

        <div class="row justify-content-center animate__animated animate__backInLeft">

            <div class="col-12 col-md-8 card shadow" style="background-color: #ffff;">

                <div class="card-body">

                    <div class="row">

                        <div class="col-12 d-flex justify-content-center text-center pt-3 pb-3">
                            <h5 class="text-secondary" style="text-transform: uppercase;">Utilisateur Actuel</h5>
                        </div>

                        <div class="col-6" id="cote-gauche">
                            <div class="row">
                                <div class="col-12 pt-3 pb-3">
                                    <p><i class="bi bi-person-fill"></i> Nom : {{ $user->name }}</p>
                                </div>
                                <div class="col-12 pt-3 pb-3">
                                    <p><i class="bi bi-envelope-at-fill"></i> E-mail : {{ $user->email }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-6 d-flex justify-content-center text-center" id="cote-droite">
                            <div class="col-12 shadow"
                                style="background-image:url({{ asset('storage/' . $user->photo) }});background-size: cover;background-position: center;
                                background-repeat: no-repeat;  height: 150px; width: 150px; margin-left:5px; margin-right:5px; border-radius:50%;">

                            </div>
                        </div>

                        <div class="row pt-4">

                            <div class="col-6 d-flex justify-content-center text-center">
                                {{-- edit button    --}}
                                <form class="user-edit-form" action="" data-id="{{ $user->id }}"
                                    data-name="{{ $user->name }}" method="GET">
                                    @csrf
                                    <button type="button" onclick="user_edit_confirmation(this)"
                                        class="btn btn-outline-primary btn-lg shadow mt-3 ml-1">
                                        <i class="bi bi-pen"></i>
                                        <span class="btn-description">Modifier les informations</span>
                                    </button>
                                </form>
                            </div>

                            <div class="col-6 d-flex justify-content-center text-center">
                                {{-- edit button    --}}
                                <form class="user-mdp-form" action="" data-id="{{ $user->id }}"
                                    data-name="{{ $user->name }}" method="GET">
                                    @csrf
                                    <button type="button" onclick="user_mdp_confirmation(this)"
                                        class="btn btn-outline-danger btn-lg shadow mt-3 ml-1">
                                        <i class="bi bi-shield-lock-fill"></i>
                                        <span class="btn-description">Modifier le mot de passe</span>
                                    </button>
                                </form>
                            </div>

                        </div>



                    </div>

                </div>

            </div>
        </div>
    </div>

    {{-- -------------------------------------------------------------------------------------- --}}
    {{-- script modifier informations  --}}
    <script>
        function user_edit_confirmation(button) {
            // Utilisez le bouton pour obtenir le formulaire parent
            const form = button.closest('.user-edit-form');

            // Vérifiez si le formulaire a été trouvé
            if (form) {
                // Utilisez le formulaire pour extraire l'ID
                const id = form.dataset.id;
                const name = form.dataset.name;

                Swal.fire({
                    title: "Êtes-vous sûr(e) de vouloir modifier les informations de l'utilisateur ?",
                    text: name,
                    icon: "question",
                    showCancelButton: true,
                    confirmButtonColor: "#198754",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Oui",
                    cancelButtonText: "Non",
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Mettez à jour l'action du formulaire avec l'ID et soumettez-le
                        form.action = `/admin/user/${id}/edit`;
                        form.submit();
                    }
                });
            } else {
                console.error("Le formulaire n'a pas été trouvé.");
            }
        }
    </script>


    {{-- script modifier mot de passe  --}}
    <script>
        function user_mdp_confirmation(button) {
            
            const form = button.closest('.user-mdp-form');

            
            if (form) {
                
                const id = form.dataset.id;
                const name = form.dataset.name;

                Swal.fire({
                    title: "Êtes-vous sûr(e) de vouloir modifier le MOT DE PASSE ?",
                    text: name,
                    icon: "question",
                    showCancelButton: true,
                    confirmButtonColor: "#198754",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Oui",
                    cancelButtonText: "Non",
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Mettez à jour l'action du formulaire avec l'ID et soumettez-le
                        form.action = `/admin/user/${id}/mot-de-passe`;
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
