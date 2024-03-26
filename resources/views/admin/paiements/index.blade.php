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
                <h2>Paiements</h2>
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
                                    {{-- <th >ID</th> --}}
                                    <th >Photo</th>
                                    <th>Nom</th>
                                    <th>Prénom</th>
                                    {{-- <th >Wilaya</th> --}}
                                    {{-- <th>email</th> --}}
                                    {{-- <th>Tel</th> --}}
                                    <th>Formation</th>
                                    <th>Session</th>
                                    {{-- <th >profession</th> --}}

                                    <th>Actions</th>
                            </thead>

                            <tbody class="text-center">
                                @foreach ($etudiants as $etudiant)
                                    <tr>
                                        {{-- <td class=" align-middle">{{ $etudiant->id }}</td> --}}
                                        <td class=" align-middle" style="width:80px;"><div style="background-image:url({{ asset('storage/' . $etudiant->photo) }});background-size: cover;background-position: center;background-repeat: no-repeat;  height: 80px; width: 70px; margin-left:5px; margin-right:5px;"></div></td>
                                        <td class=" align-middle">{{ $etudiant->nom }}</td>
                                        <td class=" align-middle">{{ $etudiant->prenom }}</td>

                                        <td class=" align-middle">{{ $etudiant->formation }}</td>
                                        <td class=" align-middle">{{ $etudiant->session }}</td>

                                        <td class=" align-middle" style="width:100px;">

                                            <div class="container">
                                                <div class="row">

                                                    <div class="col-12">
                                                        {{-- show button    --}}
                                                        <form class="show-form"
                                                            action="{{ url('/admin/paiement/' . $etudiant->id . '/voir') }}"
                                                            method="GET">
                                                            @csrf
                                                            <button type="submit"
                                                                class="btn btn-outline-info alpa shadow" style="width: 70px">
                                                                <i class="bi bi-currency-dollar"></i></button>
                                                        </form>
                                                    </div>



                                                </div>
                                            </div>



                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>





    {{-- footer  --}}
    <div class="container" id="pied-page"></div>



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
