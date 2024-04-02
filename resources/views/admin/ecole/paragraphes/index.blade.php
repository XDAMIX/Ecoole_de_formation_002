@extends('layouts.admin_menu')
@section('content')
    <div class="container" id="titre-page">
        <div class="row">
            <div class="col-2 d-flex align-items-center">
                <a href="{{ url('/admin/') }}" class="btn btn-dark"><i class="bi bi-house"></i><span
                        class="btn-description">Acceuil</span></a>
            </div>
            <div class="col-8  text-center">
                <h2>Présentation de l'école</h2>
            </div>
        </div>
    </div>

    {{-- -------------------------------------------------------------------------------------- --}}

    <div class="container-fluid animate__animated animate__backInLeft" style="margin-top:20px;margin-bottom: 20px;">
        <div class="card shadow" style="background-color: #ffff;" id="global">
            <div class="card-body">
                <div class="container">


                    @foreach ($paragraphes as $paragraphe)
                        <div class="row section">

                            <div class="col-md-12 entete" style="text-align: center;">
                                <h3 class="titre">{{ $paragraphe->titre }}</h3>
                            </div>

                            <div class="col-md-6">
                                <img src="{{ url('storage/' . $paragraphe->photo) }}" class="img-fluid" alt="image">
                            </div>
                            <div class="col-md-6 truncate-text" id="truncate-text{{ $paragraphe->id }}">
                                <h5 class="titre" style="padding-top: 15px; ">{{ $paragraphe->sous_titre }}</h5>
                                <p class="data texte">{{ $paragraphe->paragraphe }}</p>

                                {{-- expand button  --}}
                                <button id="truncate-button{{ $paragraphe->id }}" class="btn btn-light" onclick="toggleText({{ $paragraphe->id }})">voir plus</button>
                            </div>

                        </div>

                        {{-- bouttons --}}
                        <div class="form-group row" id="double-btn" style="padding-top:10px;text-align:center;">


                            <div class="col-6">

                                {{-- edit button    --}}
                                <form class="edit-form" action="" data-id="{{ $paragraphe->id }}"
                                    data-name="{{ $paragraphe->titre }}" method="GET">
                                    @csrf
                                    <button type="button" onclick="edit_confirmation(this)"
                                        class="btn btn-outline-primary alpa shadow" style="margin-bottom: 5px;"><i
                                            class="bi bi-pen"></i> <span class="btn-description">Modifier</span></button>
                                </form>

                            </div>


                            <div class="col-6">

                                {{-- delete button  --}}
                                <form class="delete-form" action="" data-id="{{ $paragraphe->id }}"
                                    data-name="{{ $paragraphe->titre }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" onclick="supprimer_confirmation(this)"
                                        class="btn btn-outline-danger alpa shadow"><i class="bi bi-trash3"></i>
                                        <span class="btn-description">Supprimer</span></button>
                                </form>

                            </div>

                        </div>
                        {{-- bouttons         --}}
                        <hr>
                    @endforeach

                    {{-- bouton ajouter --}}
                    <div class="row fin-section" style="padding-bottom: 50px;">
                        <div class="col-10 col-md-6 d-flex align-items-center">
                            <h6>Ajouter un nouveau bloc de présentation :</h6>
                        </div>
                        <div class="col-2 col-md-6 d-flex align-items-center">
                            <a href="{{ url('/admin/ecole/presentation/nouveau') }}"
                                class="btn btn-outline-success alpa shadow"><i class="bi bi-plus"></i><span
                                    class="btn-description">Ajouter</span></a>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>


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
                    title: "Êtes-vous sûr(e) de vouloir supprimer cette partie de présentation ?",
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
                        form.action = `/admin/ecole/presentation/${id}/delete`;
                        form.submit();

                        Swal.fire({
                            title: "Partie de présentation supprimée !",
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
                    title: "Êtes-vous sûr(e) de vouloir modifier cette partie de présentation ?",
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
                        form.action = `/admin/ecole/presentation/${id}/edit`;
                        form.submit();
                    }
                });
            } else {
                console.error("Le formulaire n'a pas été trouvé.");
            }
        }
    </script>



    {{-- -------------------------------------------------------------- --}}
    <script>
        function toggleText(id) {
            console.log("***ToggleText function called***");
            console.log('id : ' + id);

            var element = document.querySelector("#truncate-text" + id);
            var bouton = document.querySelector("#truncate-button" + id);

            if (element) {
                element.classList.toggle("expanded");
                if(bouton.textContent == 'voir plus'){
                    
                    bouton.textContent = "voir moin";
                }
                else {
                    
                    bouton.textContent = "voir plus";
                }
                console.log("L'élément a été trouvé et la classe est switché");
            } else {
                console.error();
                ("L'élément n'a pas été trouvé.");
            }
        }
    </script>

    <style>
        .truncate-text .texte {
            overflow: hidden;
            display: -webkit-box;
            -webkit-line-clamp: 300;
            /* Limit to three lines */
            -webkit-box-orient: vertical;
            max-height: calc(6em * 3);
            /* Adjust the line height accordingly */
            transition: max-height 0.3s ease;
            /* Add a smooth transition effect */
        }

        .truncate-text.expanded .texte {
            max-height: none;
            -webkit-line-clamp: 500;
            /* Allow the full height for the expanded state */
        }

        .truncate-text.expanded button {
            display: inline-block;
            /* Hide the "Lire la suite" button by default */
        }

        .truncate-text button {
            display: inline-block;
            /* Display the "Lire la suite" button in expanded mode */
        }
    </style>

    {{-- -------------------------------------------------------------- --}}



    {{-- pied page --}}
    <div class="container" id="pied-page">

    </div>
@endsection
