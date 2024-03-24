@extends('layouts.admin_menu')
@section('content')
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


    <div class="container-fluid animate__animated animate__backInLeft" style="margin-top:10px;margin-bottom:10px;">

        <div class="card shadow" style="background-color: #ffff;" id="global">
            <div class="card-body">

                <!-- informations ecole -->
                <div class="container section">

                    @foreach ($informations as $information)
                        <div class="row">


                            <div class="row entete">
                                <div class="col-2 col-md-1 d-flex align-items-center">
                                    <h4><i class="bi bi-buildings icons"></i></h4>
                                </div>
                                <div class="col-8 col-md-11 d-flex align-items-center">
                                    <h4>Informations de l'école :</h4>
                                </div>
                            </div>

                            <div class="col-md-8" id="gauche">
                                <div class="row">
                                    <div class="col-12 col-md-4">
                                        <p class="titre"><i class="bi bi-building-gear icons"></i>Nom de l'école:</p>
                                    </div>
                                    <div class="col-12 col-md-8">
                                        <p class="data"> {{ $information->nom }} </p>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12 col-md-4">
                                        <p class="titre"><i class="bi bi-geo-alt icons"></i>Wilaya:</p>
                                    </div>
                                    <div class="col-12 col-md-8">
                                        <p class="data"> {{ $information->wilaya }} </p>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12 col-md-4">
                                        <p class="titre"><i class="bi bi-pin-map icons"></i>Adresse:</p>
                                    </div>
                                    <div class="col-12 col-md-8">
                                        <p class="data"> {{ $information->adresse }} </p>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-12 col-md-4">
                                        <p class="titre"><i class="bi bi-envelope-at icons"></i>E-Mail:</p>
                                    </div>
                                    <div class="col-12 col-md-8">
                                        <p class="data"> {{ $information->email }} </p>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12 col-md-4">
                                        <p class="titre"><i class="bi bi-globe icons"></i>Site-Web:</p>
                                    </div>
                                    <div class="col-12 col-md-8">
                                        <p class="data"> {{ $information->site_web }} </p>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12 col-md-4">
                                        <p class="titre"><i class="bi bi-calendar-date icons"></i>Les heures de travail:
                                        </p>
                                    </div>
                                    <div class="col-12 col-md-8">
                                        <p class="data"> {{ $information->heure_travail }} </p>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12 col-md-4">
                                        <p class="titre"><i class="bi bi-calendar-date icons"></i>N° et date d'agrément:
                                        </p>
                                    </div>
                                    <div class="col-12 col-md-8">
                                        <p class="data">N° {{ $information->num_agrement }} | Date {{ $information->date_agrement }}</p>
                                    </div>
                                </div>



                            </div>

                            <div class="col-md-4 justify-content-center" id="droite">
                                <div class="col-12">
                                    <p class="titre"><i class="bi bi-file-image icons"></i>Logo:</p>
                                </div>
                                <div class="col-12" style="text-align: center;">
                                    <img src="{{ asset('storage/' . $information->logo_couleurs) }}" alt="..." class="img-fluid"
                                        style="width:300px;">
                                </div>
                            </div>


                            {{-- bouton modifier --}}
                            <div class="row fin-section">
                                <div class="col-10 col-md-10 d-flex align-items-center">
                                    <h6>Modifier les informations de l'école :</h6>
                                </div>
                                <div class="col-2 col-md-2 d-flex align-items-center">

                                    {{-- edit button    --}}
                                    <form class="informations-edit-form" action="" data-id="{{ $information->id }}"
                                        data-name="{{ $information->nom }}" method="GET">
                                        @csrf
                                        <button type="button" onclick="informations_edit_confirmation(this)"
                                            class="btn btn-outline-primary alpa shadow" style="margin-bottom: 5px;"><i
                                                class="bi bi-pen"></i><br><span
                                                class="btn-description">Modifier</span></button>
                                    </form>

                                </div>
                            </div>
                    @endforeach


                    <!-- row -->
                </div>
            </div>
            <!-- fin informations ecole -->



            <hr>



            <!-- Numéros de téléphones -->
            <div class="container section">

                <div class="row entete">
                    <div class="col-2 col-md-1 d-flex align-items-center">
                        <h4><i class="bi bi-buildings icons"></i></h4>
                    </div>
                    <div class="col-10 col-md-11 d-flex align-items-center">
                        <h4>Numéros de téléphones :</h4>
                    </div>
                </div>


                @foreach ($telephones as $telephone)
                    <div class="row d-flex align-items-center" style="margin-bottom: 20px;">

                        <div class="col-10 col-md-6">
                            <p class="titre"><i class="bi bi-telephone icons"></i>{{ $telephone->operateur }}</p>

                            <p class="numeros data">{{ $telephone->numero }}</p>
                        </div>

                        <div class="col-2 col-md-6">
                            <div class="row">
                                <div class="col-12 col-md-3">
                                    {{-- edit button    --}}
                                    <form class="tel-edit-form" action="" data-id="{{ $telephone->id }}"
                                        data-name="{{ $telephone->operateur }} {{ $telephone->numero }}" method="GET">
                                        @csrf
                                        <button type="button" onclick="tel_edit_confirmation(this)"
                                            class="btn btn-outline-primary alpa shadow" style="margin-bottom: 5px;"><i
                                                class="bi bi-pen"></i> <br><span
                                                class="btn-description">Modifier</span></button>
                                    </form>
                                </div>
                                <div class="col-12 col-md-3">
                                    {{-- delete button  --}}
                                    <form class="tel-delete-form" action="" data-id="{{ $telephone->id }}"
                                        data-name="{{ $telephone->operateur }} {{ $telephone->numero }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" onclick="tel_supprimer_confirmation(this)"
                                            class="btn btn-outline-danger alpa shadow"><i class="bi bi-trash3"></i><br>
                                            <span class="btn-description">Supprimer</span></button>
                                    </form>
                                </div>
                            </div>





                        </div>
                    </div>
                    <hr class="py-1 text-primary">
                @endforeach

                {{-- bouton ajouter --}}
                <div class="row fin-section">
                    <div class="col-10 col-md-10 d-flex align-items-center">
                        <h6>Ajouter un nouveau numéro de téléphone :</h6>
                    </div>
                    <div class="col-2 col-md-2 d-flex align-items-center">
                        <a href="{{ url('/admin/tel/nouveau') }}" class="btn btn-outline-success alpa shadow"><i
                                class="bi bi-plus"></i><br><span class="btn-description">Ajouter</span></a>
                    </div>
                </div>

                <!-- fin Numéros de téléphones -->
            </div>



            <hr>



            <!-- LIENS -->
            <div class="container section">

                <div class="row entete">
                    <div class="col-2 col-md-1 d-flex align-items-center">
                        <h4><i class="bi bi-buildings icons"></i></h4>
                    </div>
                    <div class="col-10 col-md-11 d-flex align-items-center">
                        <h4>Liens vers vos comptes sur les réseaux sociaux :</h4>
                    </div>

                </div>

                @foreach ($liens as $lien)
                    <div class="row d-flex align-items-center">

                        <div class="col-10 col-md-6">
                            <p class="titre"><i class="bi bi-globe icons"></i>{{ $lien->reseau_social }}</p>
                            <p class="data">Lien :<a href="{{ url($lien->lien) }}"
                                    target="_blank">{{ $lien->lien }}</a></p>
                        </div>

                        <div class="col-2 col-md-6">

                            <div class="row">
                                <div class="col-12 col-md-3">
                                    {{-- edit button    --}}
                                    <form class="rs-edit-form" action="" data-id="{{ $lien->id }}"
                                        data-name="{{ $lien->reseau_social }}" method="GET">
                                        @csrf
                                        <button type="button" onclick="rs_edit_confirmation(this)"
                                            class="btn btn-outline-primary alpa shadow" style="margin-bottom: 5px;"><i
                                                class="bi bi-pen"></i> <br><span
                                                class="btn-description">Modifier</span></button>
                                    </form>
                                </div>
                                <div class="col-12 col-md-3">
                                    {{-- delete button  --}}
                                    <form class="rs-delete-form" action="" data-id="{{ $lien->id }}"
                                        data-name="{{ $lien->reseau_social }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" onclick="rs_supprimer_confirmation(this)"
                                            class="btn btn-outline-danger alpa shadow"><i class="bi bi-trash3"></i><br>
                                            <span class="btn-description">Supprimer</span></button>
                                    </form>
                                </div>
                            </div>



                        </div>
                    </div>
                    <hr class="py-1 text-primary">
                @endforeach
                <!-- fin LIENS -->
            </div>



            <hr>


            <!-- Autres informations -->
            <div class="container section">

                <div class="row entete">
                    <div class="col-2 col-md-1 d-flex align-items-center">
                        <h4><i class="bi bi-buildings icons"></i></h4>
                    </div>
                    <div class="col-10 col-md-11 d-flex align-items-center">
                        <h4>Autres informations :</h4>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 col-md-12">
                        <p class="titre"><i class="bi bi-globe icons"></i>Banner d'acceuil sur le site web :</p>
                    </div>
                </div>

                <div class="row">
                    @foreach ($acceuils as $acceuil)
                        <div class="col-12"
                            style="background-image: url(  {{ asset('storage/' . $acceuil->photo) }} );background-size: cover;background-repeat: no-repeat; text-align:center ;height:500px;padding-top:50px;padding-bottom:50px;">
                            <div class="titres"
                                style="height:100%;width:100%;padding:50px;text-align: center;background-color: #ffff;opacity: 0.6;">
                                <img src="{{ asset('storage/' . $information->logo) }}" alt="..." class="img-fluid"
                                    style="width:200px;margin-bottom:20px;">
                                <h2>{{ $acceuil->titre }}</h2>
                                <p>
                                    {{ $acceuil->sous_titre1 }}
                                    <br>
                                    {{ $acceuil->sous_titre2 }}
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div>
                {{-- bouton modifier --}}
                <div class="row fin-section">
                    <div class="col-10 col-md-10 d-flex align-items-center">
                        <h6>Modifier le Banner d'acceuil sur le site web :</h6>
                    </div>
                    <div class="col-2 col-md-2 d-flex align-items-center">
                        {{-- edit button    --}}
                        <form class="banner-edit-form" action="" data-id="{{ $acceuil->id }}"
                            data-name="{{ $acceuil->titre }}" method="GET">
                            @csrf
                            <button type="button" onclick="banner_edit_confirmation(this)"
                                class="btn btn-outline-primary alpa shadow" style="margin-bottom: 5px;"><i
                                    class="bi bi-pen"></i> <br><span class="btn-description">Modifier</span></button>
                        </form>
                    </div>
                </div>


            </div>

            <!-- fin Autres informations -->


        </div>
    </div>
    {{-- fin container global --}}
    </div>


    {{-- -------------------------------------------------------------- --}}
    {{-- scripts btn  --}}

    {{-- script modifier informations  --}}
    <script>
        function informations_edit_confirmation(button) {
            // Utilisez le bouton pour obtenir le formulaire parent
            const form = button.closest('.informations-edit-form');

            // Vérifiez si le formulaire a été trouvé
            if (form) {
                // Utilisez le formulaire pour extraire l'ID
                const id = form.dataset.id;
                const name = form.dataset.name;

                Swal.fire({
                    title: "Êtes-vous sûr(e) de vouloir modifier les informations de l'école ?",
                    // text: name,
                    icon: "question",
                    showCancelButton: true,
                    confirmButtonColor: "#198754",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Oui",
                    cancelButtonText: "Non",
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Mettez à jour l'action du formulaire avec l'ID et soumettez-le
                        form.action = `/admin/ecole/${id}/edit`;
                        form.submit();
                    }
                });
            } else {
                console.error("Le formulaire n'a pas été trouvé.");
            }
        }
    </script>







    {{-- -------------------------------------------------------------- --}}

    {{-- script  telephone  --}}

    {{-- script modifier --}}
    <script>
        function tel_edit_confirmation(button) {
            // Utilisez le bouton pour obtenir le formulaire parent
            const form = button.closest('.tel-edit-form');

            // Vérifiez si le formulaire a été trouvé
            if (form) {
                // Utilisez le formulaire pour extraire l'ID
                const id = form.dataset.id;
                const name = form.dataset.name;

                Swal.fire({
                    title: "Êtes-vous sûr(e) de vouloir modifier ce numéro ?",
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
                        form.action = `/admin/tel/${id}/edit`;
                        form.submit();
                    }
                });
            } else {
                console.error("Le formulaire n'a pas été trouvé.");
            }
        }
    </script>


    {{-- script suppression  --}}
    <script>
        function tel_supprimer_confirmation(button) {
            // Utilisez le bouton pour obtenir le formulaire parent
            const form = button.closest('.tel-delete-form');

            // Vérifiez si le formulaire a été trouvé
            if (form) {
                // Utilisez le formulaire pour extraire l'ID
                const id = form.dataset.id;
                const name = form.dataset.name;

                Swal.fire({
                    title: "Êtes-vous sûr(e) de vouloir supprimer ce numéro ?",
                    text: name,
                    icon: "question",
                    showCancelButton: true,
                    confirmButtonColor: "#198754",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Oui, Supprime-le",
                    cancelButtonText: "Non, Annuler",
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Mettez à jour l'action du formulaire avec l'ID et soumettez-le
                        form.action = `/admin/tel/${id}/delete`;
                        form.submit();

                        Swal.fire({
                            title: "Numéro supprimée !",
                            icon: "success"
                        });
                    }
                });
            } else {
                console.error("Le formulaire n'a pas été trouvé.");
            }
        }
    </script>




    {{-- -------------------------------------------------------------- --}}

    {{-- script  reseaux sociaux  --}}

    {{-- script modifier  --}}
    <script>
        function rs_edit_confirmation(button) {
            // Utilisez le bouton pour obtenir le formulaire parent
            const form = button.closest('.rs-edit-form');

            // Vérifiez si le formulaire a été trouvé
            if (form) {
                // Utilisez le formulaire pour extraire l'ID
                const id = form.dataset.id;
                const name = form.dataset.name;

                Swal.fire({
                    title: "Êtes-vous sûr(e) de vouloir modifier ce lien ?",
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
                        form.action = `/admin/lien/${id}/${name}`;
                        form.submit();
                    }
                });
            } else {
                console.error("Le formulaire n'a pas été trouvé.");
            }
        }
    </script>


    {{-- script suppression  --}}
    <script>
        function rs_supprimer_confirmation(button) {
            // Utilisez le bouton pour obtenir le formulaire parent
            const form = button.closest('.rs-delete-form');

            // Vérifiez si le formulaire a été trouvé
            if (form) {
                // Utilisez le formulaire pour extraire l'ID
                const id = form.dataset.id;
                const name = form.dataset.name;

                Swal.fire({
                    title: "Êtes-vous sûr(e) de vouloir supprimer ce lien?",
                    text: name,
                    icon: "question",
                    showCancelButton: true,
                    confirmButtonColor: "#198754",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Oui, Supprime-le",
                    cancelButtonText: "Non, Annuler",
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Mettez à jour l'action du formulaire avec l'ID et soumettez-le
                        form.action = `/admin/lien/${id}/vider`;
                        form.submit();

                        Swal.fire({
                            title: "Lien supprimée !",
                            icon: "success"
                        });
                    }
                });
            } else {
                console.error("Le formulaire n'a pas été trouvé.");
            }
        }
    </script>


    {{-- -------------------------------------------------------------- --}}

    {{-- script  banner d'acceuil  --}}

    {{-- script modifier --}}
    <script>
        function banner_edit_confirmation(button) {
            // Utilisez le bouton pour obtenir le formulaire parent
            const form = button.closest('.banner-edit-form');

            // Vérifiez si le formulaire a été trouvé
            if (form) {
                // Utilisez le formulaire pour extraire l'ID
                const id = form.dataset.id;
                const name = form.dataset.name;

                Swal.fire({
                    title: "Êtes-vous sûr(e) de vouloir modifier l'acceuil sur le site-web ?",
                    // text: name,
                    icon: "question",
                    showCancelButton: true,
                    confirmButtonColor: "#198754",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Oui",
                    cancelButtonText: "Non",
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Mettez à jour l'action du formulaire avec l'ID et soumettez-le
                        form.action = `/admin/ecole/acceuil/${id}/edit`;
                        form.submit();
                    }
                });
            } else {
                console.error("Le formulaire n'a pas été trouvé.");
            }
        }
    </script>

    {{-- -------------------------------------------------------------- --}}

    {{-- pied page --}}
    <div class="container" id="pied-page">

    </div>
@endsection


{{-- delete button  --}}
{{-- <form class="delete-form" action="" data-id="{{ $question->id }}" data-name="{{ $question->question }}"
    method="POST">
    @csrf
    @method('DELETE')
    <button type="button" onclick="supprimer_confirmation(this)" class="btn btn-outline-danger alpa shadow"><i
            class="bi bi-trash3"></i>
        <span class="btn-description">Supprimer</span></button>
</form> --}}



{{-- --------------------------------------------------------------------------------------------------------------------------------- --}}




{{-- script suppression  --}}
<script>
    function supprimer_confirmation(button) {
        // Utilisez le bouton pour obtenir le formulaire parent
        const form = button.closest('.delete-form');

        // Vérifiez si le formulaire a été trouvé
        if (form) {
            // Utilisez le formulaire pour extraire l'ID
            const id = form.dataset.id;
            const name = form.dataset.name;

            Swal.fire({
                title: "Êtes-vous sûr(e) de vouloir supprimer cette Question/Réponse ?",
                // text: name,
                icon: "question",
                showCancelButton: true,
                confirmButtonColor: "#198754",
                cancelButtonColor: "#d33",
                confirmButtonText: "Oui, Supprime-la",
                cancelButtonText: "Non, Annuler",
            }).then((result) => {
                if (result.isConfirmed) {
                    // Mettez à jour l'action du formulaire avec l'ID et soumettez-le
                    form.action = `/admin/faq/${id}/delete`;
                    form.submit();

                    Swal.fire({
                        title: "Question/Réponse supprimée !",
                        icon: "success"
                    });
                }
            });
        } else {
            console.error("Le formulaire n'a pas été trouvé.");
        }
    }
</script>




{{-- script modifier  --}}
<script>
    function edit_confirmation(button) {
        // Utilisez le bouton pour obtenir le formulaire parent
        const form = button.closest('.edit-form');

        // Vérifiez si le formulaire a été trouvé
        if (form) {
            // Utilisez le formulaire pour extraire l'ID
            const id = form.dataset.id;
            const name = form.dataset.name;

            Swal.fire({
                title: "Êtes-vous sûr(e) de vouloir modifier cette Question/Réponse ?",
                // text: name,
                icon: "question",
                showCancelButton: true,
                confirmButtonColor: "#198754",
                cancelButtonColor: "#d33",
                confirmButtonText: "Oui",
                cancelButtonText: "Non",
            }).then((result) => {
                if (result.isConfirmed) {
                    // Mettez à jour l'action du formulaire avec l'ID et soumettez-le
                    form.action = `/admin/faq/${id}/edit`;
                    form.submit();
                }
            });
        } else {
            console.error("Le formulaire n'a pas été trouvé.");
        }
    }
</script>
