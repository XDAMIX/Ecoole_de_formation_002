@extends('layouts.admin_menu')
@section('content')
    {{-- retour en arrière  --}}
    <div class="container" id="titre-page">
        <div class="row">
            <div class="col-2 d-flex align-items-center">
                <a href="{{ url('/admin/session') }}" class="btn btn-dark"><i class="bi bi-arrow-left"></i><span
                        class="btn-description">Retour</span></a>
            </div>
            <div class="col-10 d-flex align-items-center pl-5">
                <h2>Informations de la session</h2>
            </div>
        </div>
    </div>



    {{-- -------------------------------------------------------------------------------------- --}}

    <!-- DataTales Example -->
    <div class="container-fluid" style="padding-top:10px;padding-bottom:80px;">
        <div class="row animate__animated animate__backInLeft">
            <div class="col-md-12">
                <div class="card shadow" style="background-color: #ffff;">
                    <div class="card-body">

                        <div class="row">
                            <div class="col-12">
                                <h3 style="padding-top:10px; padding-bottom:10px;">Informations de la session</h3>
                            </div>
                        </div>

                        {{-- ---------------------------------------------------------- --}}

                        <div class="row">

                            {{-- ---------------------------------------------------------- --}}
                            <div class="col-12 col-md-4">

                                <div class="row cote-gauche shadow carte">

                                    <div class="col-12 icon">
                                        <i class="fa-solid fa-award"></i>
                                    </div>

                                    <div class="col-12 titre">
                                        <h5 class="">Formation :</h5>
                                    </div>

                                    <div class="col-12 titre">
                                        <h5 class="font-weight-bold">{{ $session->titre_formation }} </h5>

                                    </div>

                                    <div class="col-12"
                                        style="height: 400px; background-image:url({{ asset('storage/' . $session->photo_formation) }});background-size: cover;background-position: center;background-repeat: no-repeat; margin-top:5px;">

                                    </div>


                                </div>
                            </div>

                            {{-- ---------------------------------------------------------- --}}
                            <div class="col-12 col-md-4">
                                <div class="row cote-centre shadow carte">

                                    <div class="col-12 icon">
                                        <i class="fa-solid fa-users"></i>
                                    </div>

                                    <div class="col-12 titre">
                                        <h5 class="">Session :</h5>
                                    </div>

                                    <div class="col-12 titre">
                                        <h5 class="font-weight-bold">{{ $session->nom }}</h5>
                                    </div>


                                    <div class="col-12 infos" style="height: 80px;">
                                        {{-- <h6 class="font-weight-bold">Etat :</h6> --}}
                                        <div class="col-12 infos">
                                            @if ($session->statut == 'En attente')
                                                <h5 style="text-align: center;font-size: 20px;color: #1141ae; margin-top:20px;"
                                                    class="font-weight-bold"> <i
                                                        class="fa-solid fa-stopwatch fa-bounce fa-2xl"
                                                        style="color: #1141ae; margin-right:5px;"></i>
                                                    {{ $session->statut }}</h5>
                                            @elseif ($session->statut == 'En cours')
                                                <h5 style="text-align: center;font-size: 20px;color: #06823a; margin-top:20px;"
                                                    class="font-weight-bold"><i class="fa-solid fa-spinner fa-spin fa-2xl "
                                                        style="color: #06823a; margin-right:5px;"></i>
                                                    {{ $session->statut }}
                                                </h5>
                                            @elseif ($session->statut == 'Terminée')
                                                <h5 style="text-align: center;font-size: 20px;color: #e82121; margin-top:20px;"
                                                    class="font-weight-bold"> <i class="fa-solid fa-ban fa-fade  fa-2xl"
                                                        style="color: #e82121; margin-right:5px;"></i>
                                                    {{ $session->statut }}
                                                </h5>
                                            @elseif ($session->statut == 'Prolongée')
                                                <h5 style="text-align: center;font-size: 20px;color: #c7e821; margin-top:20px;"
                                                    class="font-weight-bold"><i
                                                        class="fa-sharp fa-solid fa-plus fa-bounce  fa-2xl"
                                                        style="color: #c7e821; margin-right:5px;"></i>
                                                    {{ $session->statut }}
                                                </h5>
                                            @endif
                                        </div>
                                    </div>



                                    <div class="col-12 infos text-center">
                                        <h6 class="font-weight-bold ">Date de Début : {{ $session->date_debut }}</h6>

                                    </div>

                                    <div class="col-12 infos text-center">
                                        <h6 class="font-weight-bold ">Date de Fin : {{ $session->date_fin }}</h6>

                                    </div>

                                    <div class="col-12 titre" style="height: 10px;"></div>

                                    <div class="col-12 boutons">

                                        @if ($session->statut == 'En attente')
                                            <div class="text-center">
                                                {{-- démmarer button    --}}
                                                <form class="play-form"
                                                    action="{{ url('/admin/session/voir/' . $session->id . '/demmarer_session') }}"
                                                    data-id="{{ $session->id }}" data-name="{{ $session->nom }}"
                                                    method="POST">
                                                    @csrf
                                                    <button type="button" class="btn btn-success alpa shadow"
                                                        onclick="play_confirmation(this)"><i class="bi bi-play-circle-fill"
                                                            style="font-size: 30px; padding-right:5px;"></i><br>Marquer le
                                                        début de la formation</button>
                                                </form>
                                            </div>
                                        @elseif ($session->statut == 'En cours' || $session->statut == 'Prolongée')
                                            <div class="text-center">
                                                {{-- arrêter button    --}}
                                                <form class="stop-form"
                                                    action="{{ url('/admin/session/voir/' . $session->id . '/arreter_session') }}"
                                                    data-id="{{ $session->id }}" data-name="{{ $session->nom }}"
                                                    method="POST">
                                                    @csrf
                                                    <button type="button" class="btn btn-danger alpa shadow"
                                                        onclick="stop_confirmation(this)"><i class="bi bi-stop-circle-fill"
                                                            style="font-size: 30px; padding-right:5px;"></i><br>Marquer la
                                                        fin de la formation</button>
                                                </form>
                                            </div>
                                        @elseif ($session->statut == 'Terminée')
                                            <div class="text-center">

                                                {{-- telecharger tout les certificats button    --}}
                                                <form class="certificats-form"
                                                    action="{{ url('/admin/session/voir/' . $session->id . '/certificats_session') }}"
                                                    data-id_session="{{ $session->id }}" data-name="{{ $session->nom }}"
                                                    method="GET">
                                                    @csrf
                                                    <button type="button" class="btn btn-success alpa shadow"
                                                        onclick="certificats_confirmation(this)"><i class="bi bi-patch-check"
                                                            style="font-size: 30px; padding-right:5px;"></i><br>Télécharger tout les certificats</button>
                                                </form>
                                                <br>
                                                {{-- prolonger button    --}}
                                                <form class="plus-form"
                                                    action="{{ url('/admin/session/voir/' . $session->id . '/prolonger_session') }}"
                                                    data-id="{{ $session->id }}" data-name="{{ $session->nom }}"
                                                    method="POST">
                                                    @csrf
                                                    <button type="button" class="btn btn-warning alpa shadow" style="padding: 10px 30px;"
                                                        onclick="plus_confirmation(this)"><i class="bi bi-plus-circle-fill"
                                                            style="font-size: 30px; padding-right:5px;"></i><br>Faire
                                                        prolonger</button>
                                                </form>

                                            </div>
                                        @endif

                                    </div>
                                    <div class="col-12" style="height: 80px;"></div>


                                </div>


                            </div>
                            {{-- ---------------------------------------------------------- --}}
                            <div class="col-12 col-md-4">

                                <div class="row cote-droite shadow carte">

                                    <div class="col-12 icon">
                                        <i class="fa-solid fa-person-chalkboard"></i>
                                    </div>

                                    <div class="col-12 titre">
                                        <h5 class="">Profésseur :</h5>
                                    </div>

                                    <div class="col-12 titre">
                                        <h5 class="font-weight-bold">
                                            @if ($session->sexe_prof == 'H')
                                                Mr :
                                            @else
                                                Mme :
                                            @endif
                                            {{ $session->nom_prof }}-{{ $session->prenom_prof }}
                                        </h5>
                                    </div>
                                    <div class="col-12 photo">
                                        <img src="{{ asset('storage/' . $session->photo_prof) }}" alt="image-prof"
                                            style="height:200px;width:185px;">
                                    </div>

                                    <div class="col-12 titre">
                                        <h4 class="font-weight-bold"> Contact:</h4>
                                    </div>

                                    <div class="col-12 ">
                                        <h5 class="infos text-center font-weight-bold"><i class="bi bi-phone"></i> N° tel
                                            :</h5>
                                        <h5 class="infos text-center">{{ $session->tel_prof }} </h5>
                                    </div>
                                    <div class="col-12 ">
                                        <h5 class="infos text-center font-weight-bold"><i class="bi bi-envelope"></i>
                                            e-mail :</h5>
                                        <h5 class="infos text-center">{{ $session->email_prof }}</h5>
                                    </div>

                                </div>
                            </div>


                        </div>








                        {{-- -------------------------------------------------------------------------------------- --}}
                        <div class="row">
                            <div class="col-12">
                                <h3 style="padding-top:10px; padding-bottom:10px;">Liste des stagiaires </h3>
                            </div>




                            <table id="example" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        {{-- <th >ID</th> --}}
                                        <th>Photo</th>
                                        <th>Nom</th>
                                        <th>Prénom</th>
                                        <th>N° tel</th>
                                        <th>e-mail</th>
                                        <th>état</th>


                                        <th>Actions</th>
                                </thead>

                                <tbody class="text-center">
                                    @foreach ($etudiants as $etudiant)
                                        <tr>
                                            {{-- <td class=" align-middle">{{ $etudiant->id }}</td> --}}
                                            <td class=" align-middle" style="width:100px;">
                                                <div
                                                    style="background-image:url({{ asset('storage/' . $etudiant->photo) }});background-size: cover;background-position: center;background-repeat: no-repeat;  height: 100px; width: 90px; margin-left:5px; margin-right:5px;">
                                                </div>
                                            </td>
                                            <td class=" align-middle">{{ $etudiant->nom }}</td>
                                            <td class=" align-middle">{{ $etudiant->prenom }}</td>
                                            <td class=" align-middle">{{ $etudiant->tel }}</td>
                                            <td class=" align-middle">{{ $etudiant->email }}</td>
                                            @if ($etudiant->etat_formation == 'En-formation' || $etudiant->etat_formation == 'fin-de-la-formation')
                                                <td class="align-middle" style="color:rgb(7, 101, 46);">
                                                    {{ $etudiant->etat_formation }}</td>
                                            @else
                                                <td class="align-middle" style="color:rgb(193, 52, 52);">
                                                    {{ $etudiant->etat_formation }}</td>
                                            @endif


                                            <td class=" align-middle" style="width:240px;">

                                                <div class="container">
                                                    <div class="row">

                                                        @if ($etudiant->etat_formation == 'fin-de-la-formation')
                                                            <div class="col-12">
                                                                {{-- show button    --}}

                                                                <form class="certificat-form" action=""
                                                                    data-id_session="{{ $session->id }}"
                                                                    data-id_etudiant="{{ $etudiant->id }}"
                                                                    data-name="{{ $etudiant->nom . ' ' . $etudiant->prenom }}"
                                                                    method="GET">
                                                                    @csrf
                                                                    <button type="button"
                                                                        onclick="certificat_confirmation(this)"
                                                                        class="btn btn-outline-primary alpa shadow"><i
                                                                            class="bi bi-patch-check"></i>
                                                                        Certificat</button>
                                                                </form>

                                                            </div>
                                                        @endif


                                                        {{-- exclure button  --}}
                                                        @if ($session->statut !== 'Terminée'  &&  $etudiant->etat_formation !== 'Exclu' )
                                                            <div class="col-12">
                                                                {{-- delete button  --}}
                                                                <form class="delete-form" action=""
                                                                    data-id_session="{{ $session->id }}"
                                                                    data-id_etudiant="{{ $etudiant->id }}"
                                                                    data-name="{{ $etudiant->nom . ' ' . $etudiant->prenom }}"
                                                                    method="POST">
                                                                    @csrf
                                                                    <button type="button"
                                                                        onclick="supprimer_confirmation(this)"
                                                                        class="btn btn-outline-danger alpa shadow"><i
                                                                            class="bi bi-trash3"></i> Exclure</button>
                                                                </form>
                                                            </div>
                                                        @endif

                                                        @if ($session->statut !== 'Terminée'  &&  $etudiant->etat_formation == 'Exclu' )
                                                            <div class="col-12">
                                                                {{-- reprendre formation button  --}}
                                                                <form class="reprendre-form" action=""
                                                                    data-id_session="{{ $session->id }}"
                                                                    data-id_etudiant="{{ $etudiant->id }}"
                                                                    data-name="{{ $etudiant->nom . ' ' . $etudiant->prenom }}"
                                                                    method="POST">
                                                                    @csrf
                                                                    <button type="button"
                                                                        onclick="reprendre_confirmation(this)"
                                                                        class="btn btn-outline-success alpa shadow"><i
                                                                            class="bi bi-mortarboard"></i> Reprendre</button>
                                                                </form>
                                                            </div>
                                                        @endif

                                                    </div>
                                                </div>



                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                                <tfoot>
                                    <tr>
                                        {{-- <th>ID</th> --}}
                                        <th>Photo</th>
                                        <th>Nom</th>
                                        <th>Prénom</th>
                                        <th>N° tel</th>
                                        <th>e-mail</th>
                                        <th>état</th>

                                        <th>Actions</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    {{-- ---------------------------------------------------------- --}}
    <style>
        .icon {
            font-size: 40px;
            text-align: center;
            margin-top: 10px;
            margin-bottom: 10px;
            height: 60px;
            /* background-color: #06823a; */
        }

        .titre {
            font-size: 20px;
            text-align: center;
            padding-top: 5px;
            padding-bottom: 5px;
            height: 30px;
            /* background-color: #9019cc; */
        }

        .infos {
            font-size: 20px;
            padding-top: 5px;
            padding-bottom: 5px;
            height: 30px;
            /* background-color: #a31616; */
        }

        .photo {
            text-align: center;
            margin-top: 10px;
            margin-bottom: 10px;
        }

        .carte {
            height: 640px;
            margin: 10px;
            padding: 20px;
        }

        .boutons button {
            font-size: 16px;
            text-align: center;
            font-weight: bold;
            border-radius: 40px;
            padding: 5px 10px;
            text-transform: uppercase;
            color: #ffff;
        }
    </style>

    {{-- ---------------------------------------------------------- --}}

    {{-- script démmarer session  --}}
    <script>
        function play_confirmation(button) {
            // Utilisez le bouton pour obtenir le formulaire parent
            const form = button.closest('.play-form');

            // Vérifiez si le formulaire a été trouvé
            if (form) {
                // Utilisez le formulaire pour extraire l'ID
                const id = form.dataset.id;
                const name = form.dataset.name;

                Swal.fire({
                    title: "Êtes-vous sûr(e) de vouloir démmarer cette session ?",
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

    {{-- script arrêter session  --}}
    <script>
        function stop_confirmation(button) {
            // Utilisez le bouton pour obtenir le formulaire parent
            const form = button.closest('.stop-form');

            // Vérifiez si le formulaire a été trouvé
            if (form) {
                // Utilisez le formulaire pour extraire l'ID
                const id = form.dataset.id;
                const name = form.dataset.name;

                Swal.fire({
                    title: "Êtes-vous sûr(e) de vouloir arrêter cette session ?",
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

    {{-- script arrêter session  --}}
    <script>
        function plus_confirmation(button) {
            // Utilisez le bouton pour obtenir le formulaire parent
            const form = button.closest('.plus-form');

            // Vérifiez si le formulaire a été trouvé
            if (form) {
                // Utilisez le formulaire pour extraire l'ID
                const id = form.dataset.id;
                const name = form.dataset.name;

                Swal.fire({
                    title: "Êtes-vous sûr(e) de vouloir prolonger la durée de cette session ?",
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


{{-- ---------------------------------------------------------- --}}

    {{-- script exclure etudiant  --}}
    <script>
        function supprimer_confirmation(button) {
            // Utilisez le bouton pour obtenir le formulaire parent
            const form = button.closest('.delete-form');

            // Vérifiez si le formulaire a été trouvé
            if (form) {
                // Utilisez le formulaire pour extraire l'ID
                const id_session = form.dataset.id_session;
                const id_etudiant = form.dataset.id_etudiant;
                const name = form.dataset.name;

                Swal.fire({
                    title: "Êtes-vous sûr(e) de vouloir exclure cet(te) etudiant(e) ?",
                    text: name,
                    icon: "question",
                    showCancelButton: true,
                    confirmButtonColor: "#198754",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Oui",
                    cancelButtonText: "Non",
                }).then((result) => {
                    if (result.isConfirmed) {

                        form.action = `/admin/session/voir/${id_session}/${id_etudiant}/delete_etudiant`;
                        form.submit();
                    }
                });
            } else {
                console.error("Le formulaire n'a pas été trouvé.");
            }
        }
    </script>

    {{-- script reprendre etudiant  --}}
    <script>
        function reprendre_confirmation(button) {
            // Utilisez le bouton pour obtenir le formulaire parent
            const form = button.closest('.reprendre-form');

            // Vérifiez si le formulaire a été trouvé
            if (form) {
                // Utilisez le formulaire pour extraire l'ID
                const id_session = form.dataset.id_session;
                const id_etudiant = form.dataset.id_etudiant;
                const name = form.dataset.name;

                Swal.fire({
                    title: "Êtes-vous sûr(e) de laisser cet(te) etudiant(e) reprendre la formation ?",
                    text: name,
                    icon: "question",
                    showCancelButton: true,
                    confirmButtonColor: "#198754",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Oui",
                    cancelButtonText: "Non",
                }).then((result) => {
                    if (result.isConfirmed) {

                        form.action = `/admin/session/voir/${id_session}/${id_etudiant}/reprendre_etudiant`;
                        form.submit();
                    }
                });
            } else {
                console.error("Le formulaire n'a pas été trouvé.");
            }
        }
    </script>

{{-- ---------------------------------------------------------- --}}

    {{-- script telecharger le certificat pour le stagiaire  --}}
    <script>
        function certificat_confirmation(button) {
            // Utilisez le bouton pour obtenir le formulaire parent
            const form = button.closest('.certificat-form');

            // Vérifiez si le formulaire a été trouvé
            if (form) {
                // Utilisez le formulaire pour extraire l'ID
                const id_session = form.dataset.id_session;
                const id_etudiant = form.dataset.id_etudiant;
                const name = form.dataset.name;

                Swal.fire({
                    title: "Êtes-vous sûr(e) de vouloir telecharger le certificat pour cet(te) etudiant(e) ?",
                    text: name,
                    icon: "question",
                    showCancelButton: true,
                    confirmButtonColor: "#198754",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Oui",
                    cancelButtonText: "Non",
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.action = `/admin/session/voir/${id_session}/${id_etudiant}/certificat_etudiant`;
                        form.submit();
                    }
                });
            } else {
                console.error("Le formulaire n'a pas été trouvé.");
            }
        }
    </script>

    {{-- script telecharger tout les certificats pour la session  --}}
    <script>
        function certificats_confirmation(button) {
            // Utilisez le bouton pour obtenir le formulaire parent
            const form = button.closest('.certificats-form');

            // Vérifiez si le formulaire a été trouvé
            if (form) {
                // Utilisez le formulaire pour extraire l'ID
                const id_session = form.dataset.id_session;
                const name = form.dataset.name;

                Swal.fire({
                    title: "Êtes-vous sûr(e) de vouloir telecharger tout les certificats pour cette session ?",
                    text: name,
                    icon: "question",
                    showCancelButton: true,
                    confirmButtonColor: "#198754",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Oui",
                    cancelButtonText: "Non",
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.action = `/admin/session/voir/${id_session}/certificats_session`;
                        form.submit();
                    }
                });
            } else {
                console.error("Le formulaire n'a pas été trouvé.");
            }
        }
    </script>




    {{-- ---------------------------------------------------------- --}}
    <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js">
    </script>
    <script type="text/javascript" charset="utf8"
        src="https://cdn.datatables.net/buttons/2.3.6/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js">
    </script>
    <script type="text/javascript" charset="utf8"
        src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js">
    </script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.html5.min.js">
    </script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.print.min.js">
    </script>







    <script>
        $(document).ready(function() {
            $('#example').DataTable({
                processing: true,
                // scroller
                scrollCollapse: true,
                scroller: true,
                scrollY: 400 ,
                // ----------
                // dom: '<"buttons-container"lBfrtip>', 
                lengthMenu: [
                    [10, 25, 50, -1],
                    [10, 25, 50, "All"]
                ], // Specify the options
                buttons: [],
                language: {
                    "lengthMenu": "Afficher _MENU_ éléments par page",
                    "zeroRecords": "Aucun enregistrement trouvé",
                    "info": "Page _PAGE_ sur _PAGES_",
                    "infoEmpty": "Aucun enregistrement disponible",
                    "infoFiltered": "(filtré de _MAX_ total des enregistrements)",
                    "search": "Rechercher :",
                    "paginate": {
                        "first": "Premier",
                        "last": "Dernier",
                        "next": "Suivant",
                        "previous": "Précédent"
                    }
                },
                initComplete: function() {
                    // Ajouter des styles personnalisés
                    $('.dataTables_length select').css('width',
                        '60px'); // ajustez la largeur selon vos besoins
                },
            });
        });
    </script>


    {{-- -----------------------------------------------------------------------------------------------------    --}}



    {{-- footer  --}}
    <div class="container" id="pied-page">
    @endsection
