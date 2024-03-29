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
                <h2>Dossier a fournir</h2>
            </div>
                        <div class="col-2 d-flex align-items-center">
                <a href="{{ url('/admin/dossier/nouveau') }}" class="btn btn-success"><i class="fa-solid fa-plus fa-beat-fade"></i><span
                        class="btn-description">Ajouter </span></a>
            </div>
        </div>
    </div>




    {{-- --------------------------------------------------------------------------------------------------------------------------------- --}}

    {{-- javascript DataTables --}}



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

    <div class="container-fluid d-flex justify-content-center align-items-center" style="padding-top:10px;padding-bottom:80px; ">
        <div class="row animate__animated animate__backInLeft">
            <div class="col-md-12">
                <div class="card shadow" style="background-color: #ffff;">
                    <div class="card-body">
                        <table id="example" class="table table-bordered"  style="width:100%">
                            <thead style="text-align: center">
                                <tr>
                                    <th >ID</th>
      
                                    <th>Titre</th>
                                  

                                    <th>Actions</th>
                            </thead>

                            <tbody id="tableau" class="text-center">
                             
                             

                            </tbody>
         
                        </table>
                    </div>

                    <div class="input-group mb-3">

                        <form  id="addForm" class="add-form" action="{{ url('/admin/dossier/save') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            
                               
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



                         
                            
                        </form>
                        <button class="btn btn-outline-secondary alpa" type="button"
                            onclick="btn_add_click()">
                            <i class="bi bi-plus"></i><span class="btn-description">Ajouter</span>
                        </button>
    
                    </div>


                </div>

            </div>
        </div>
    </div>





    {{-- footer  --}}
    <div class="container" id="pied-page"></div>

<script>
            $(document).ready(function() {
                    // Appeler la fonction au chargement de la page
                    AfficherDossiers();
        });
</script>


{{-- Fonction pour effectuer la requête AJAX pour ajouter  --}}

<script>
    function btn_add_click() {
        $.ajax({
            url: $('#addForm').attr('action'),
            method: 'POST',
            data: $('#addForm').serialize(),
            success: function(response) {
                AfficherDossiers();
            },
            error: function(xhr, status, error) {
                // Gérer les erreurs ici
            }
        });
    }

</script>

<script>
    // Fonction pour effectuer la requête AJAX
    function AfficherDossiers() {
    $.ajax({
        url: '/admin/dossier_ajax',
        type: 'GET',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(response) {
            $('#tableau').empty();
            $.each(response.dossiers, function(key, value) {
                var newRow = '<tr>' +
                    '<td>' + value.id + '</td>' +
                    '<td>' + value.titre + '</td>' +
                    '<td>' +
                    '<div class="container">' +
                    '<div class="container-fluid d-flex justify-content-center align-items-center">' +
                    '<div class="col-4">' +
                    '<form class="edit-form" action="" data-id="' + value.id +
                    '" data-name="' + value.titre + '" method="GET">' +
                    '@csrf' +
                    '<button type="button" onclick="edit_confirmation(this)"' +
                    'class="btn btn-outline-primary alpa shadow"><i class="bi bi-pen"></i></button>' +
                    '</form>' +
                    '</div>' +
                    '<div class="col-4">' +
                    '<form class="delete-form" action="" data-id="' + value.id + '" method="POST">' +
                    '@csrf' +
                    '@method("DELETE")' +
                    '<button type="button" onclick="supprimer_confirmation(this)"' +
                    'class="btn btn-outline-danger alpa shadow"><i class="bi bi-trash3"></i></button>' +
                    '</form>' +
                    '</div>' +
                    '</div>' +
                    '</div>' +
                    '</td>' +
                    '</tr>';
                $('#tableau').append(newRow);
            });
        },
        error: function(xhr, status, error) {
            console.error(error);
        }
    });
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
                    

                    Swal.fire({
                        title: "Êtes-vous sûr(e) de vouloir supprimer ce type ?",
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
                            // form.action = `/admin/dossier/${id}/delete`;
                            // form.submit();

                            ajax_supp(id);

                            Swal.fire({
                                title: "Type supprimée !",
                                icon: "success"
                            });
                        }
                    });
                } else {
                    console.error("Le formulaire n'a pas été trouvé.");
                }
            }
        </script>



{{-- Fonction pour effectuer la requête AJAX pour supprimer --}}

<script>
    function ajax_supp(id) {
        $.ajax({
            url : '/admin/dossier_ajax/'+id+'/delete',
            method: 'DELETE',
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function() {
          
           AfficherDossiers();
        },
        error: function(xhr, status, error) {
            console.error(error);
        }
    });
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
                            form.action = `/admin/dossier/${id}/edit`;
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
