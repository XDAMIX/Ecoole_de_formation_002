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
                <h2>type des paiements</h2>
            </div>
                        <div class="col-2 d-flex align-items-center">
             
                            <button type="button" onclick="add_formulaire()" class="btn btn-success"><i class="fa-solid fa-plus fa-beat-fade"></i><span
                                class="btn-description">Ajouter </span></button> 
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
                </div>
            </div>
        </div>
    </div>





    {{-- footer  --}}
    <div class="container" id="pied-page"></div>




        <script>
            $(document).ready(function() {
                    // Appeler la fonction au chargement de la page
                    AfficherTypes();
        });
    </script>

<script>
    // Fonction pour affichr le tableau
    function AfficherTypes() {
    $.ajax({
        url: '/admin/types_p_ajax',
        type: 'GET',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(response) {
            $('#tableau').empty();
                    $.each(response.types, function(key, value) {
                        var newRow = '<tr>' +
                    '<td class="align-middle">' + value.id + '</td>' +
                    '<td class="align-middle">' + value.titre + '</td>' +
                    '<td style="width:240px;">' +
                    '<div class="container">' +
                    '<div class="container-fluid d-flex justify-content-center align-items-center">' +
                    '<div class="col-4">' +
                    '<form class="edit-form" action="" data-id="' + value.id +
                    '" data-titre="' + value.titre + '" method="GET">' +
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
                        icon: "error",
                        showCancelButton: true,
                        confirmButtonColor: "#198754",
                        cancelButtonColor: "#d33",
                        confirmButtonText: "Oui, Supprime-le",
                        cancelButtonText: "Non, Annuler",
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // Mettez à jour l'action du formulaire avec l'ID et soumettez-le

                            ajax_supp(id);

                            Swal.fire({
                                showConfirmButton: false,
                                                            icon: "success",
                                                            
                                                            timer: 1500
                            });
                        }
                    });
                } else {
                    console.error("Le formulaire n'a pas été trouvé.");
                }
            }
        </script>


{{-- script pour effectuer la requête AJAX pour supprimer --}}

<script>
    function ajax_supp(id) {
        $.ajax({
            url : '/admin/types_p_ajax/'+id+'/delete',
            method: 'DELETE',
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function() {
          
           AfficherTypes();
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
                    const titre = form.dataset.titre;

                    Swal.fire({
                        title: "Êtes-vous sûr(e) de vouloir modifier ce type ?",
                      
                        icon: "warning",
                        input: "text",
                        inputValue : titre,
                        inputPlaceholder: "Veuillez saisir le titre de nouveau type ici",

                        showCancelButton: true,
                        confirmButtonColor: "#198754",
                        cancelButtonColor: "#d33",
                        confirmButtonText: "Oui",
                        cancelButtonText: "Non",
                    }).then((result) => {
                        if (result.isConfirmed) {

                                                            // ajaxe function 
                                                            $.ajax({
                                                            url : '/admin/types_p/' + id + '/' + result.value + 'update',
                                                            method: 'PUT',
                                                            headers: {
                                                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                                        },
                                                        success: function() {
                                                        Swal.fire({
                                                          
                                                            showConfirmButton: false,
                                                            icon: "success",
                                                            
                                                            timer: 1500
                                                        })
                                                        AfficherTypes();
                                                        },
                                                        error: function(xhr, status, error) {
                                                            console.error(error);
                                                        }
                                                    });

                        }
                    });
                } else {
                    console.error("Le formulaire n'a pas été trouvé.");
                }
            }
        </script>



       {{-- script ajouter un type   --}}
       <script>
        function add_formulaire(button) {
            Swal.fire({
                title: "ajouter un nouveau type ",
                input: "text",
                inputPlaceholder: "Veuillez saisir le titre de nouveau type ici",
                showCancelButton: true,
                confirmButtonColor: "#198754",
                cancelButtonColor: "#d33",
                confirmButtonText: "Oui",
                cancelButtonText: "Non",
            }).then((result) => {
                if (result.isConfirmed) {
                    // ajax function 
                    $.ajax({
                        url: '/admin/types_p/' + result.value + '/save',
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function () {
                            Swal.fire({
                                showConfirmButton: false,
                                icon: "success",
                                title: 'le nouveau type a bien été ajouté ',
                                timer: 1500
                            })
                            AfficherTypes();
                        },
                        error: function (xhr, status, error) {
                            console.error(error);
                        }
                    });
                }
            });
        }
    </script>







        



        {{-- --------------------------------------------------------------------------------------------------------------------------------------------   --}}







        {{-- footer  --}}
        <div class="container" id="pied-page">
        @endsection
