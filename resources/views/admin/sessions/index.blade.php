@extends('layouts.admin_menu')
@section('content')


{{-- retour à l'acceuil  --}}

<div class="container" id="titre-page">
    <div class="row">
        <div class="col-2 d-flex align-items-center">
            <a href="{{ url('/admin/') }}" class="btn btn-dark"><i class="bi bi-house"></i><span
                    class="btn-description">Acceuil</span></a>
        </div>
        <div class="col-8  text-center">
            <h2>Sessions</h2>
        </div>
                    <div class="col-2 d-flex align-items-center">
            <a href="{{ url('/admin/session/ajouter') }}" class="btn btn-success"><i class="fa-solid fa-plus fa-beat-fade"></i><span
                    class="btn-description">Ajouter </span></a>
        </div>
    </div>
</div>

    {{-- javascript DataTables --}}

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


{{-- -------------------------------------------------------------------------------------- --}}
  {{-- --------------------------------------------------------------------------------------------------------------------------------- --}}



    {{-- html  --}}

    <div class="container-fluid" style="padding-top:10px;padding-bottom:80px;">
        <div class="row animate__animated animate__backInLeft">
            <div class="col-md-12">
                <div class="card shadow" style="background-color: #ffff;">
                    <div class="card-body">
                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    {{-- <th  scope="col">N°</th> --}}
                                    <th  scope="col">Titre</th>
                                    <th  scope="col">Profésseur</th>
                                    <th  scope="col">Formation</th>
                                    <th  scope="col">Date début</th>
                                    <th  scope="col">Date fin</th>
                                    <th  scope="col">Statut</th>
                                   
                                    
                                    <th  scope="col">Action</th>
                            </thead>

                            <tbody class="table-group-divider">
                                @foreach ($sessions as $session)
                                    <tr>
                                        {{-- <td scope="row">{{ $session->id }}</td> --}}
                                        <td class="align-middle">{{ $session->nom }}</td>
                                        <td class="align-middle">{{ $session->nom_prof }}-{{ $session->prenom_prof }}</td>
                                        <td class="align-middle">{{ $session->formation }}</td>                                   
                                        <td class="text-center align-middle">{{ $session->date_debut }}</td>
                                        <td class="text-center align-middle">{{ $session->date_fin }}</td>
                
                                        <td class="text-center align-middle @if($session->statut == 'En attente') bg-primary text-white @elseif($session->statut == 'En cours' || $session->statut == 'Prolongée') bg-success text-white @elseif($session->statut == 'Terminée') bg-danger text-white @endif"  class="action-column">{{ $session->statut }}</td>
                
                                    
                                        <td class="align-middle" style="width:240px;">

                                            <div class="container">
                                                <div class="row">

                                                    <div class="col-4">
                                                        {{-- show button    --}}
                                                        <form class="show-form"
                                                            action="{{ url('/admin/session/voir/' . $session->id ) }}"
                                                            method="GET">
                                                            @csrf
                                                            <button type="submit"
                                                                class="btn btn-outline-info alpa shadow"><i
                                                                    class="bi bi-eye"></i></button>
                                                        </form>
                                                    </div>

                                                    <div class="col-4">
                                                        {{-- edit button    --}}
                                                        <form class="edit-form" action=""
                                                            data-id="{{ $session->id }}"
                                                            data-name="{{ $session->nom }}"
                                                            method="GET">
                                                            @csrf
                                                            <button type="button" onclick="edit_confirmation(this)"
                                                                class="btn btn-outline-primary alpa shadow"><i
                                                                    class="bi bi-pen"></i></button>
                                                        </form>
                                                    </div>


                                                    <div class="col-4">
                                                        {{-- delete button  --}}
                                                        <form class="delete-form" action=""
                                                            data-id="{{ $session->id }}"
                                                            data-name="{{ $session->nom }}"
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
                                    {{-- <th   scope="col">N°</th> --}}
                                    <th   scope="col">Titre</th>
                                    <th   scope="col">Profésseur</th>
                                    <th   scope="col">Formation</th>
                                    <th   scope="col">Date début</th>
                                    <th   scope="col">Date fin</th>
                                    <th   scope="col">Statut</th>
                                   
                                    
                                    <th >Action</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

{{-- -------------------------------------------------------------------------------------- --}}



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
                        title: "Êtes-vous sûr(e) de vouloir supprimer cette session ?",
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
                            form.action = `/admin/session/${id}/delete`;
                            form.submit();

                            Swal.fire({
                                title: "Session supprimée !",
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
                        title: "Êtes-vous sûr(e) de vouloir modifier cette session?",
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
                            form.action = `/admin/session/${id}/edit`;
                            form.submit();
                        }
                    });
                } else {
                    console.error("Le formulaire n'a pas été trouvé.");
                }
            }
        </script>




{{-- -----------------------------------------------------------------------------------------------------    --}}

   

{{-- footer  --}}
<div class="container" id="pied-page">

    
@endsection