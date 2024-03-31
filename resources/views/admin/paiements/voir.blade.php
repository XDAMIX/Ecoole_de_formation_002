@extends('layouts.admin_menu')
@section('content')
    <div class="container" id="titre-page">
        <div class="row">
            <div class="col-2 d-flex align-items-center">
                <a href="{{ url('/admin/paiement') }}" class="btn btn-dark"><i class="bi bi-arrow-left"></i><span
                        class="btn-description">Retour</span></a>
            </div>
            <div class="col-10 d-flex align-items-center pl-5">
                <h2>les paiement de stagiaire</h2>
            </div>
        </div>
    </div>

    {{-- ---------------------------------------------------------- --}}

    <div class="container" style="padding-top: 10px;">
        <div class="row justify-content-center animate__animated animate__backInLeft">
            <div class="col-md-12">
                <div class="card shadow" style="background-color: #ffff;">
                    {{-- information personnelles  --}}
                    <div class="container">
                        <div class="row" style="margin-top: 10px;margin-bottom:10px;">
                            {{-- -------------------------------------- --}}
                            <div class="col-12" id="informations-personnelles">
                                <h5><i class="bi bi-person-fill"></i> Informations
                                    personnelles</h5>
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="row" style="padding-top: 10px;padding-bottom:10px;">

                                            <div class="col-md-4">
                                                <h6>Identifiant :</h6>
                                                <p>{{ $etudiant->code }}</p>

                                            </div>

                                            <div class="col-md-4">
                                                <h6>Date d'inscription :</h6>
                                                <p>{{ $etudiant->created_at }}</p>

                                            </div>

                                            <div class="col-md-4">


                                            </div>

                                            <div class="col-md-4">
                                                <h6>Sexe :</h6>
                                                <p>
                                                    @if ($etudiant->sexe == 'H')
                                                        HOMME
                                                    @else
                                                        FEMME
                                                    @endif
                                                </p>
                                            </div>
                                            <div class="col-md-4">
                                                <h6>Nom :</h6>
                                                <p>{{ $etudiant->nom }}</p>

                                            </div>

                                            <div class="col-md-4">
                                                <h6>Prénom :</h6>
                                                <p>{{ $etudiant->prenom }}</p>

                                            </div>

                                            <div class="col-md-4">
                                                <h6>Wilaya de résidence :</h6>
                                                <p>{{ $etudiant->wilaya }}</p>

                                            </div>

                                            <div class="col-md-4">
                                                <h6>Date de naissance :</h6>
                                                <p>{{ $etudiant->date_naissance }}</p>

                                            </div>

                                            <div class="col-md-4">
                                                <h6>Lieu de naissance :</h6>
                                                <p>{{ $etudiant->lieu_naissance }}</p>

                                            </div>


                                            <div class="col-md-4">
                                                <h6>Profession / Niveau d'études :</h6>
                                                <p>{{ $etudiant->profession }}</p>

                                            </div>

                                            <div class="col-md-4">
                                                <h6>N° de Téléphone :</h6>
                                                <p>{{ $etudiant->tel }}</p>

                                            </div>

                                            <div class="col-md-4">
                                                <h6>E-Mail :</h6>
                                                <p>{{ $etudiant->email }}</p>

                                            </div>

                                        </div>
                                    </div>

                                    <div class="col-md-4 photo"
                                        style="padding-top: 10px;padding-bottom:10px;text-align:center;">
                                        <div
                                            style="background-image:url({{ asset('storage/' . $etudiant->photo) }});background-size: cover;background-position: center;background-repeat: no-repeat;  height: 250px; width: 220px; margin-left:5px; margin-right:5px;">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- -------------------------------------- --}}
                            <div class="col-12" id="formation">
                                <h5><i class="bi bi-mortarboard-fill"></i> Formation</h5>
                                <div class="row" style="padding-top: 10px;padding-bottom:10px;">
                                    <div class="col-md-4 text-center">
                                        <h6>Formation:</h6>
                                        <p>{{ $formation->titre }}</p>
                                    </div>
                                    <div class="col-md-4 text-center">
                                        <h6>Session:</h6>
                                        <p>{{ $session->nom }}</p>
                                    </div>
                                    <div class="col-md-4 text-center">
                                        <h6>Etat formation:</h6>
                                        <p>{{ $etudiant->etat_formation }}</p>
                                    </div>
                                </div>
                            </div>

                            {{-- -------------------------------------- --}}
                            <div class="col-12" id="paiement">
                                <h5><i class="bi bi-cash-stack"></i> Paiement</h5>
                                <div class="row justify-content-center" style="padding-top: 10px;padding-bottom:10px;">
                                    <div class="col-md-3 text-center">
                                        <h6>Tarif :</h6>
                                        <p>{{ $etudiant->tarif }}</p>
                                    </div>
                                    <div class="col-md-3 text-center">
                                        <h6>Prix Formation :</h6>
                                        <p>{{ $etudiant->prix_formation }} DA</p>
                                    </div>
                                    <div class="col-md-3 text-center">
                                        <h6>Verssé :</h6>
                                        <p > <span id="total">{{ $total }} </span> DA</p>
                                    </div>
                                    <div class="col-md-3 text-center">
                                        <h6 >Reste :</h6>
                                        <p ><span id="reste" >{{ $reste }}  </span> DA</p>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12 text-center" id="bouton_resul">
                                        {{-- ajouter button    --}}

                                    </div>
                                </div>

                                {{-- tableau des paiements:  --}}

                                <div class="row">
                                    <div class="col-12">
                                        <table id="example" class="table table-bordered" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">Date</th>
                                                    <th class="text-center">Encaissé par</th>
                                                    <th class="text-center">montant</th>
                                               
                                            </thead>

                                            <tbody id="tableau" class="text-center">


                                            </tbody>

                                        </table>
                                    </div>
                                </div>

                                {{-- -------------------------------------- --}}
                                <hr>
                            </div>

                            {{-- -------------------------------------- --}}
                            <div class="col-12" id="boutons">
                                <br>
                                <div class="row formulaire-btn">
                                    <div class="col-12 form-group" style="padding:40px;">
                                        {{-- bouton de sauvegarde  --}}
                                        <form class="download-form"
                                            action="{{ url('/admin/paiement/' . $etudiant->id . '/download') }}"
                                            method="GET">
                                            @csrf
                                            @if ($reste==0)
                                                     <button type="button" onclick="telecharger(this)"
                                                     class="btn btn-outline-danger alpa shadow"><i
                                                     class="bi bi-filetype-pdf icons"></i>Télécharger la facture</button>
                                            @endif
                                        </form>

                                    </div>
                                </div>

                            </div>
                            {{-- -------------------------------------- --}}







                        </div>

                    </div>
                </div>

                <form action="" id="form2" method="GET">
                    @csrf
                </form>



            </div>
        </div>

        {{-- script télécharger le pdf  --}}
        <script>
            function telecharger(button) {
                // Utilisez le bouton pour obtenir le formulaire parent
                const form = button.closest('.download-form');

                // Vérifiez si le formulaire a été trouvé
                if (form) {

                    Swal.fire({
                        title: "Êtes-vous sûr(e) de vouloir télécharger la facture de paiement totale ?",
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

        {{-- --------------------------------------------------------------------------------------------------------------------------------- --}}
   
        <script>
            function versement(button) {

                // const form1 = document.getElementById('add-form');
                // const form1 = button.closest('.add-form');

                const form1 = document.getElementsByClassName('add-form')[0];
                const form2 = document.getElementById('form2');

                var etudiantID = button.parentElement.dataset.etudiant;

                var userID = button.parentElement.dataset.user;

                var Reste = button.parentElement.dataset.reste;
                var rest_a = {{ $reste }} ;
                if(Reste > 0){



                Swal.fire({
                    title: "Ajouter un versement :",
                    input: "number", // Utilisez "number" pour un champ de saisie de nombre
                    inputLabel: "le reste à payer : " + rest_a +" DA",
                    inputPlaceholder: "Veuillez saisir le montant versé ici",
                    inputAttributes: {
                        min: 1,
                        max: Reste,
                    },
                    showCancelButton: true,
                    confirmButtonColor: "#198754",
                    cancelButtonColor: "#d33",
                    cancelButtonText: "Non",
                    confirmButtonText: "Oui, Valider"
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Utiliser result.value pour obtenir la valeur du champ de saisie
                        const montant = result.value;
                        if(montant > 0){

                            form1.action = "/admin/paiement/save/" + etudiantID + "/" + userID + "/" + montant;
                            form1.submit();
                            
                            Swal.fire({
                            title: "Paiement effectué",
                            text: "Votre paiement a été effectué avec succès",
                            icon: "success",
                            timer: 5000, // Time in milliseconds
                            showConfirmButton: false
                        });
                        setTimeout(function(){

                            AfficherPaiement();
                        },3000);


                        }

                    }
                }).catch(error => {
                    console.log(error);
                });

            }
            }
        </script>




<script>
    $(document).ready(function() {
            // Appeler la fonction au chargement de la page
            AfficherPaiement();
});
</script>




<script>
    // Fonction pour afficher le tableau
    function AfficherPaiement() {
        $.ajax({
            url: '/admin/paiement_ajax/{{ $etudiant->id }}/voir', // Correction de l'URL
            type: 'GET',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                $('#tableau').empty();
                $.each(response.paiements, function(key, value) { // Correction de response.paiments à response.paiements
                    var newRow = '<tr>' +
                        '<td class="align-middle">' + value.date + '</td>' +
                        '<td class="align-middle">' + value.user + '</td>' +
                        '<td class="align-middle">' + value.montant + ' DA</td>' +
                        '</tr>';
                    $('#tableau').append(newRow);
                });

                $('#reste').text(response.reste); 
                $('#total').text(response.total); 


                if (parseInt(response.reste) === 0) {
                    $('#bouton_resul').html(`
                        <h4 style="text-align: center;font-size: 20px;color: #e82121; margin:30px; "> 
                            <i class="fa-solid fa-ban fa-fade  fa-2xl"  style="color: #e82121;"></i>
                           pas de versement à effectuer
                        </h4>
                    `);
                } else {
                    $('#bouton_resul').html(`
                        <form class="add-form" action="" 
                            data-etudiant="{{ $etudiant->id }}"
                            data-user="{{ auth()->user()->id }}" 
                            data-reste="{{ $reste }}" 
                            method="POST">
                            @csrf
                            <button type="button" class="btn btn-outline-success alpa shadow"
                                style="margin-bottom:30px;" onclick="versement(this)">
                                <i class="bi bi-plus-circle" style="padding-right: 5px;"></i> Ajouter un nouveau Versement </button>
                        </form>
                    `);
                }
              },
                error: function(xhr, status, error) {
                console.error(error);
            }
        });
    }
    </script>
    



        <style>
            h5 {
                text-align: center;
                padding: 10px;
                background: #cdcccc;
                color: #ffff;
            }
        </style>



        {{-- footer  --}}
        <div class="container" id="pied-page"></div>
    @endsection
