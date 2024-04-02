@extends('layouts.admin_menu')
@section('content')



{{-- retour à l'acceuil  --}}
<div class="container" id="titre-page">
    <div class="row">
        <div class="col-2 d-flex align-items-center">
            <a href="{{ url('/admin/') }}" class="btn btn-dark"><i class="bi bi-house"></i><span class="btn-description">Acceuil</span></a>
        </div>
        <div class="col-8  text-center">
            <h2>Messages</h2>
        </div>
    </div>
</div>
 {{-- ---------------------------------------------------------------------------------------------------- --}}
 
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

{{-- ---------------------------------------------------------------------------------------------------- --}}


    {{-- html  --}}
    <div class="container-fluid" style="padding-top:10px;padding-bottom:80px;">
        <div class="row animate__animated animate__backInLeft">
            <div class="col-md-12">
                <div class="card shadow" style="background-color: #ffff;">
                    <div class="card-body">
                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th scope="col">N°</th>
                                    <th scope="col">Nom</th>
                                    <th scope="col">e-mail</th>
                                    <th scope="col">N° de téléphone</th>
                                    <th scope="col">Sujet</th>
                                    <th scope="col">Date et Heure</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($messages as $message)
                                    <tr>
                                        <td>{{ $message->id }}</td>
                                        <td style="font-weight: bold;">{{ $message->name }}</td>
                                        <td>{{ $message->email }}</td>
                                        <td>{{ $message->tel }}</td>
                                        <td>{{ $message->subject }}</td>
                                        <td>{{ $message->created_at }}</td>
      

                                        <td>

                                            <div class="container">
                                                <div class="row">

                                                    <div class="col-12 col-md-6">
                                                        {{-- show button    --}}
                                                        <form class="show-form" action="{{url('/admin/messages/'.$message->id.'/show')}}" method="GET">
                                                            @csrf
                                                            <button type="submit" class="btn btn-outline-primary alpa shadow"><i class="bi bi-envelope-paper"></i></button>
                                                        </form>
                                                    </div>


                                                    <div class="col-12 col-md-6">
                                                        {{-- delete button  --}}
                                                        <form class="delete-form" action=""
                                                            data-id="{{ $message->id }}"
                                                            data-name="{{ $message->id . ' : ' . $message->name }}"
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
                                    <th scope="col">N°</th>
                                    <th scope="col">Nom</th>
                                    <th scope="col">e-mail</th>
                                    <th scope="col">N° de téléphone</th>
                                    <th scope="col">Sujet</th>
                                    <th scope="col">Date et Heure</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

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
                        title: "Êtes-vous sûr(e) de vouloir supprimer ce message ?",
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
                            form.action = `/admin/messages/${id}/delete`;
                            form.submit();

                            Swal.fire({
                                title: "Message supprimé !",
                                icon: "success"
                            });
                        }
                    });
                } else {
                    console.error("Le formulaire n'a pas été trouvé.");
                }
            }
        </script>







{{-- ---------------------------------------------------------------------------------------------------- --}}






{{-- footer  --}}
<div class="container" id="pied-page">
@endsection
