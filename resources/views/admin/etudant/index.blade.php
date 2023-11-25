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
                <h2>Liste des Stagiaires</h2>
            </div>
        </div>
    </div>



    {{-- --------------------------------------------------------------------------------------------------------------------------------- --}}

    {{-- javascript DataTables --}}

    <script>
        $(document).ready(function() {
            $('#example').DataTable({
                processing: true,
                dom: '<"buttons-container"lBfrtip>', // Custom button container
                lengthMenu: [
                    [10, 25, 50, -1],
                    [10, 25, 50, "All"]
                ], // Specify the options
                buttons: [{
                        extend: 'excel',
                        text: '<i class="fas fa-file-excel"></i> Excel',
                        className: 'btn btn-dark'
                    },
                    {
                        extend: 'pdf',
                        text: '<i class="fas fa-file-pdf"></i> PDF',
                        className: 'btn btn-dark'
                    },
                    {
                        extend: 'print',
                        text: '<i class="fas fa-print"></i> Imprimer',
                        className: 'btn btn-dark'
                    },
                    {
                        extend: 'colvis',
                        text: '<i class="fas fa-columns"></i> Affichage des Colonnes',
                        className: 'btn btn-dark'
                    },
                ],
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
                }
            });
        });
    </script>

    {{-- CSS  --}}

    <style>
        .buttons-container {
            text-align: left;
            margin-top: 10px;
            margin-bottom: 10px;
            background-color: rgb(255, 255, 255);
        }

        #titre-page {
            margin-bottom: 20px;
        }
    </style>
    {{-- --------------------------------------------------------------------------------------------------------------------------------- --}}



    {{-- html  --}}

    <div class="container-fluid" style="padding-top:10px;padding-bottom:80px;">
        <div class="row animate__animated animate__backInLeft">
            <div class="col-md-12">
                <div class="card shadow" style="background-color: #ffff;">
                    <div class="card-body">
                        <table id="example" class="table table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th >ID</th>
                                    <th>Nom</th>
                                    <th>Prénom</th>
                                    <th>Âge</th>
                                    {{-- <th >Wilaya</th> --}}
                                    {{-- <th>email</th> --}}
                                    {{-- <th>Tel</th> --}}
                                    <th>Formation</th>
                                    <th>Session</th>
                                    {{-- <th >profession</th> --}}

                                    <th>Actions</th>
                            </thead>

                            <tbody>
                                @foreach ($etudiants as $etudiant)
                                    <tr>
                                        <td>{{ $etudiant->id }}</td>
                                        <td>{{ $etudiant->nom }}</td>
                                        <td>{{ $etudiant->prenom }}</td>
                                        <td>{{ $etudiant->age }}</td>
                                        {{-- <td>{{ $etudiant->wilaya}}</td> --}}
                                        {{-- <td>{{ $etudiant->email }}</td> --}}
                                        {{-- <td>{{ $etudiant->tel }}</td> --}}
                                        <td>{{ $etudiant->formation }}</td>
                                        <td>{{ $etudiant->session }}</td>

                                        <td>

                                            <div class="container">
                                                <div class="row">

                                                    <div class="col-4">
                                                        {{-- show button    --}}
                                                        <form class="show-form"
                                                            action="{{ url('/admin/etudiant/' . $etudiant->id . '/voir') }}"
                                                            method="GET">
                                                            @csrf
                                                            <button type="submit"
                                                                class="btn btn-outline-info alpa shadow"><i
                                                                    class="bi bi-eye"></i></button>
                                                        </form>
                                                    </div>

                                                    <div class="col-4">
                                                        {{-- edit button    --}}
                                                        <form class="edit-form" action="" data-id="{{ $etudiant->id }}"
                                                            data-name="{{ $etudiant->nom . ' ' . $etudiant->prenom }}"
                                                            method="GET">
                                                            @csrf
                                                            <button type="button" onclick="edit_confirmation(this)"
                                                                class="btn btn-outline-primary alpa shadow"><i
                                                                    class="bi bi-pen"></i></button>
                                                        </form>
                                                    </div>

                                                    {{-- validate button  --}}

                                                    <div class="col-4">
                                                        {{-- delete button  --}}
                                                        <form class="delete-form" action=""
                                                            data-id="{{ $etudiant->id }}"
                                                            data-name="{{ $etudiant->nom . ' ' . $etudiant->prenom }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="button" onclick="supprimer_confirmation(this)"
                                                                class="btn btn-outline-danger alpa shadow"><i
                                                                    class="bi bi-trash3"></i></button>
                                                        </form>
                                                    </div>


                                                </div>
                                            </div>


                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>Nom</th>
                                    <th>Prénom</th>

                                    <th>Âge</th>
                                    {{-- <th >Wilaya</th> --}}
                                    {{-- <th>email</th> --}}
                                    {{-- <th>Tel</th> --}}
                                    <th>Formation</th>
                                    <th>Session</th>

                                    <th>Actions</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>





    {{-- footer  --}}
    <div class="container" id="pied-page">



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
                        title: "Êtes-vous sûr(e) de vouloir supprimer cet(te) stagiaire ?",
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
                            form.action = `/admin/etudiant/${id}/delete`;
                            form.submit();

                            Swal.fire({
                                title: "Etudiant supprimée !",
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
                        title: "Êtes-vous sûr(e) de vouloir modifier cet(te) stagiaire ?",
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
                            form.action = `/admin/etudiant/${id}/edit`;
                            form.submit();
                        }
                    });
                } else {
                    console.error("Le formulaire n'a pas été trouvé.");
                }
            }
        </script>



        {{-- --------------------------------------------------------------------------------------------------------------------------------------------   --}}







        {{-- footer  --}}
        <div class="container" id="pied-page">
        @endsection
