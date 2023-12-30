@extends('layouts.admin_menu')
@section('content')
    {{-- retour à l'acceuil  --}}
    <div class="container" id="titre-page">
        <div class="row">
            <div class="col-2 d-flex align-items-center">
                <a href="{{ url('/admin/') }}" class="btn btn-dark"><i class="bi bi-house"></i><span
                        class="btn-description">Acceuil</span></a>
            </div>
            <div class="col-10 d-flex align-items-center">
                <h2>Publicités sur le site</h2>
            </div>
        </div>
    </div>



    <div class="container" style="padding-top: 10px;">

        <div class="row">


            @foreach ($banners as $banner)
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 animate__animated animate__backInLeft"
                    style="margin-bottom: 10px;">

                    <div class="card shadow">
                        <div class=""
                            style="background-image: url({{ asset('storage/' . $banner->photo) }} );background-size: cover;background-position: center;background-repeat: no-repeat;  height:400px; width:100%;border-top-left-radius: 5px;border-top-right-radius: 5px;">
                        </div>
                        {{-- <img src="{{ asset('storage/'.$banner->photo )}}" class="card-img-top" alt="..." style="height:100%;"> --}}
                        <div class="card-body">
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <label>Titre:</label>
                                    <h4 class="card-title">{{ $banner->titre }}</h4>
                                </div>
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <label>Date de la création:</label>
                                    <p class="card-text">{{ $banner->created_at }}</p>
                                </div>
                            </div>
                            <div style="text-align: center;align-items:center;">

                                {{-- bouttons --}}
                                <div class="form-group row" id="double-btn">
                                    <div class="col-6 col-sm-6 mb-3 mb-sm-0">

                                    {{-- edit button    --}}
                                    <form class="edit-form" action="" data-id="{{ $banner->id }}"
                                        data-name="{{ $banner->titre }}" method="GET">
                                        @csrf
                                        <button type="button" onclick="edit_confirmation(this)"
                                            class="btn btn-outline-primary alpa shadow" style="margin-bottom: 5px;"><i
                                                class="bi bi-pen"></i> <span
                                                class="btn-description">Modifier</span></button>
                                    </form>
                                    </div>

                                    <div class="col-6 col-sm-6">

                                    {{-- delete button  --}}
                                    <form class="delete-form" action="" data-id="{{ $banner->id }}"
                                        data-name="{{ $banner->titre }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" onclick="supprimer_confirmation(this)"
                                            class="btn btn-outline-danger alpa shadow"><i class="bi bi-trash3"></i>
                                            <span class="btn-description">Supprimer</span></button>
                                    </form>

                                    </div>

                                </div>
                                {{-- bouttons         --}}


                            </div>
                        </div>

                    </div>

                </div>
            @endforeach
        </div>

    </div>


    {{-- -------------------------------------------------------------- --}}

    {{-- script modifier --}}
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
                    title: "Êtes-vous sûr(e) de vouloir modifier cette pub ?",
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
                        form.action = `/admin/banners/${id}/edit`;
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
        function supprimer_confirmation(button) {
            // Utilisez le bouton pour obtenir le formulaire parent
            const form = button.closest('.delete-form');

            // Vérifiez si le formulaire a été trouvé
            if (form) {
                // Utilisez le formulaire pour extraire l'ID
                const id = form.dataset.id;
                const name = form.dataset.name;

                Swal.fire({
                    title: "Êtes-vous sûr(e) de vouloir supprimer cette pub ?",
                    text: name,
                    icon: "question",
                    showCancelButton: true,
                    confirmButtonColor: "#198754",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Oui, Supprime-la",
                    cancelButtonText: "Non, Annuler",
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Mettez à jour l'action du formulaire avec l'ID et soumettez-le
                        form.action = `/admin/banners/${id}/delete`;
                        form.submit();

                        Swal.fire({
                            title: "Pub supprimée !",
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


    {{-- footer  --}}
    <div class="container" id="pied-page">
    @endsection
