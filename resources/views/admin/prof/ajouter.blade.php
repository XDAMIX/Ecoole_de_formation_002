@extends('layouts.admin_menu')
@section('content')


    <div class="container" id="titre-page">
        <div class="row">
            <div class="col-2 d-flex align-items-center">
                <a href="{{ url('/admin/prof') }}" class="btn btn-dark"><i class="bi bi-arrow-left"></i><span
                        class="btn-description">Retour</span></a>
            </div>
            <div class="col-8  text-center">
                <h2>Nouveau Profésseur</h2>
            </div>
        </div>
    </div>

    {{-- ---------------------------------------------------------- --}}

    <div class="container" style="padding-top: 10px;">
        <div class="row justify-content-center animate__animated animate__backInLeft">
            <div class="col-md-12">
                <div class="card shadow" style="background-color: #ffff;">
                    {{-- <div class="card-header"style="text-align:center;">
          <a style="font-size: 20px;">Formulaire d'inscription</a>
        </div> --}}
                    <div class="card-body">

                        {{-- form ta3 button ajouter cour  --}}
                        <form class="add_form" action="" data-id="{{ $prof->id }}"> <button style="display: none"
                                onclick="AddCour(this)" id="add_btn"></button>
                        </form>





                        {{-- form ta3 ajouter prof  --}}
                        <form class="edit-form" action="{{ url('/admin/prof/' . $prof->id . '/update') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')





                            {{-- sexe ,nom ,prenom  --}}
                            {{-- ---------------------------------------------------------- --}}
                            <div class="row espace-inputs">

                                <div class="col-md-12">
                                    <h5 style="text-align: center"><i class="bi bi-person-fill"></i> informations personnelles</h5>
                                    <hr>
                                </div>

                                <div class="row">
                                    <div class="col-12">


                                        <div class="row">
                                            <div class="col-12 col-md-8 gauche informations">

                                                <div class="row">

                                                    <div class="col-12 col-md-4 form-group">
                                                        <label for="">sexe :</label>
                                                        <select class="form-control form-select" name="sexe">
                                                            <option value="H">HOMME</option>
                                                            <option value="F">FEMME</option>
                                                        </select>
                                                    </div>


                                                    <div class="col-12 col-md-4 form-group" id="nom">
                                                        <label for="">Nom :</label>

                                                        <input type="text" name="nom"
                                                            class="form-control @if ($errors->get('nom')) is-invalid @endif"
                                                            id="validationNom" placeholder="Veuillez saisir le nom ici">
                                                        <div id="validationNomFeedback" class="invalid-feedback">
                                                            @if ($errors->get('nom'))
                                                                @foreach ($errors->get('nom') as $message)
                                                                    {{ $message }}
                                                                @endforeach
                                                            @endif
                                                        </div>

                                                    </div>


                                                    <div class="col-12 col-md-4 form-group" id="prenom">
                                                        <label for="">Prénom :</label>

                                                        <input type="text" name="prenom"
                                                            class="form-control @if ($errors->get('prenom')) is-invalid @endif"
                                                            id="validationPrenom"
                                                            placeholder="Veuillez saisir le prénom ici">
                                                        <div id="validationPrenomFeedback" class="invalid-feedback">
                                                            @if ($errors->get('prenom'))
                                                                @foreach ($errors->get('prenom') as $message)
                                                                    {{ $message }}
                                                                @endforeach
                                                            @endif
                                                        </div>

                                                    </div>

                                                </div>

                                                <div class="row">

                                                    <div class="col-12 col-md-4 form-group" id="date_naissance">
                                                        <label for="">Date de naissance :</label>

                                                        <input type="date" name="date_naissance"
                                                            class="form-control @if ($errors->get('date_naissance')) is-invalid @endif"
                                                            id="validationDate">
                                                        <div id="validationDateFeedback" class="invalid-feedback">
                                                            @if ($errors->get('date_naissance'))
                                                                @foreach ($errors->get('date_naissance') as $message)
                                                                    {{ $message }}
                                                                @endforeach
                                                            @endif
                                                        </div>

                                                    </div>

                                                    <div class="col-12 col-md-8 form-group" id="lieu_naissance">
                                                        <label for="">lieu de naissance :</label>

                                                        <input type="text" name="lieu_naissance"
                                                            class="form-control @if ($errors->get('lieu_naissance')) is-invalid @endif"
                                                            id="validationLieu"
                                                            placeholder="Veuillez saisir le lieu de naissance ici">
                                                        <div id="validationLieuFeedback" class="invalid-feedback">
                                                            @if ($errors->get('lieu_naissance'))
                                                                @foreach ($errors->get('lieu_naissance') as $message)
                                                                    {{ $message }}
                                                                @endforeach
                                                            @endif
                                                        </div>

                                                    </div>





                                                    <div class="col-12 col-md-4 form-group" id="wilaya">
                                                        <label for="">Wilaya de résidence :</label>

                                                        <select class="form-control form-select" name="wilaya">

                                                            <option value="Adrar">Adrar-01 </option>
                                                            <option value="Chlef">Chlef-02 </option>
                                                            <option value="Laghouat">Laghouat-03</option>
                                                            <option value="Oum El Bouaghi">Oum El Bouaghi-04 </option>
                                                            <option value="Batna">Batna-05 </option>
                                                            <option value="Béjaïa">Béjaïa-06 </option>
                                                            <option value="Biskra">Biskra-07 </option>
                                                            <option value="Béchar">Béchar-08 </option>
                                                            <option value="Blida">Blida-09 </option>
                                                            <option value="Bouira">Bouira-10 </option>

                                                            <option value="Tamanrasset">Tamanrasset-11 </option>
                                                            <option value="Tébessa">Tébessa-12 </option>
                                                            <option value="Tlemcen">Tlemcen-13 </option>
                                                            <option value="Tiaret">Tiaret-14 </option>
                                                            <option value="Tizi Ouzou">Tizi Ouzou-15</option>
                                                            <option value="Alger" selected>Alger-16 </option>
                                                            <option value="Djelfa">Djelfa-17 </option>
                                                            <option value="Jijel">Jijel-18</option>
                                                            <option value="Sétif">Sétif-19 </option>
                                                            <option value="Saïda">Saïda-20 </option>

                                                            <option value="Skikda">Skikda-21 </option>
                                                            <option value="Sidi Bel Abbès">Sidi Bel Abbès-22 </option>
                                                            <option value="Annaba">Annaba-23 </option>
                                                            <option value="Guelma">Guelma-24 </option>
                                                            <option value="Constantine">Constantine-25 </option>
                                                            <option value="Médéa">Médéa-26 </option>
                                                            <option value="Mostaganem">Mostaganem-27</option>
                                                            <option value="M'Sila">M'Sila-28 </option>
                                                            <option value="Mascara">Mascara-29 </option>
                                                            <option value="Ouargla">Ouargla-30 </option>

                                                            <option value="Oran">Oran-31 </option>
                                                            <option value="El Bayadh">El Bayadh-32 </option>
                                                            <option value="Illizi">Illizi-33</option>
                                                            <option value="Bordj Bou Arreridj">Bordj Bou Arreridj-34
                                                            </option>
                                                            <option value="Boumerdès">Boumerdès-35 </option>
                                                            <option value="El Tarf">El Tarf-36 </option>
                                                            <option value="Tindouf">Tindouf-37 </option>
                                                            <option value="Tissemsilt">Tissemsilt-38 </option>
                                                            <option value="El Oued">El Oued-39 </option>
                                                            <option value="Khenchela">Khenchela-40 </option>

                                                            <option value="Souk Ahras">Souk Ahras-41 </option>
                                                            <option value="Tipaza">Tipaza-42 </option>
                                                            <option value="Mila">Mila-43 </option>
                                                            <option value="Aïn Defla">Aïn Defla-44 </option>
                                                            <option value="Naâma">Naâma-45 </option>
                                                            <option value="Aïn Témouchent">Aïn Témouchent-46 </option>
                                                            <option value="Ghardaïa">Ghardaïa-47 </option>
                                                            <option value="Relizane">Relizane-48 </option>
                                                            <option value="Timimoun">Timimoun-49 </option>
                                                            <option value="Bordj Badji Mokhtar">Bordj Badji Mokhtar-50
                                                            </option>

                                                            <option value="Ouled Djellal">Ouled Djellal-51</option>
                                                            <option value="Béni Abbès">Béni Abbès-52</option>
                                                            <option value="In Salah ">In Salah-53</option>
                                                            <option value="In Guezzam">In Guezzam-54</option>
                                                            <option value="Touggourt ">Touggourt-55</option>
                                                            <option value="Djanet">Djanet-56 </option>
                                                            <option value="El M'Ghair">El M'Ghair-57 </option>
                                                            <option value="El Meniaa">El Meniaa-58 </option>

                                                        </select>

                                                    </div>

                                                    <div class="col-12 col-md-8 form-group" id="adresse">
                                                        <label for="">Adresse :</label>

                                                        <input type="text" name="adresse"
                                                            class="form-control @if ($errors->get('adresse')) is-invalid @endif"
                                                            id="validationAdresse"
                                                            placeholder="Veuillez saisir l'adresse ici">
                                                        <div id="validationAdresseFeedback" class="invalid-feedback">
                                                            @if ($errors->get('adresse'))
                                                                @foreach ($errors->get('adresse') as $message)
                                                                    {{ $message }}
                                                                @endforeach
                                                            @endif
                                                        </div>

                                                    </div>


                                                    <div class="col-12 col-md-6 form-group" id="tel">
                                                        <label for="">N° de téléphone :</label>

                                                        <input type="text" name="tel"
                                                            class="form-control @if ($errors->get('tel')) is-invalid @endif"
                                                            id="validationTel"
                                                            placeholder="Veuillez saisir le numéro de téléphone ici">
                                                        <div id="validationTelFeedback" class="invalid-feedback">
                                                            @if ($errors->get('tel'))
                                                                @foreach ($errors->get('tel') as $message)
                                                                    {{ $message }}
                                                                @endforeach
                                                            @endif
                                                        </div>

                                                    </div>


                                                    <div class="col-12 col-md-6 form-group" id="email">
                                                        <label for="">e-mail :</label>

                                                        <input type="text" name="email"
                                                            class="form-control @if ($errors->get('email')) is-invalid @endif"
                                                            id="validationEmail"
                                                            placeholder="Veuillez saisir le email ici">
                                                        <div id="validationEmailFeedback" class="invalid-feedback">
                                                            @if ($errors->get('email'))
                                                                @foreach ($errors->get('email') as $message)
                                                                    {{ $message }}
                                                                @endforeach
                                                            @endif
                                                        </div>

                                                    </div>


                                                    <div class="col-12 col-md-12 form-group" id="diplome">
                                                        <label for="">Diplôme :</label>

                                                        <input type="text" name="diplome"
                                                            class="form-control @if ($errors->get('diplome')) is-invalid @endif"
                                                            id="validationDiplome"
                                                            placeholder="Veuillez saisir le diplome ici">
                                                        <div id="validationDiplomeFeedback" class="invalid-feedback">
                                                            @if ($errors->get('diplome'))
                                                                @foreach ($errors->get('diplome') as $message)
                                                                    {{ $message }}
                                                                @endforeach
                                                            @endif
                                                        </div>

                                                    </div>


                                                    

                                                </div>

                                            </div>

                                            <div class="col-12 col-md-4 droite photo">
                                                <label>Photo:</label>
                                                <div class="shadow" id="imagePreview"
                                                    style="background-image:;background-size: cover;background-position: center;background-repeat: no-repeat;  height: 290px; width: 250px; margin-left:20px; margin-right:20px;">
                                                </div>
                                                <br><br>
                                                <div class="form-group">
                                                    {{-- <label for="">Photo:</label> --}}
                                                    <input name="photo" type="file"
                                                        class="form-control @if ($errors->get('photo')) is-invalid @endif"
                                                        id="validationPhoto" Accept="image/*"
                                                        placeholder="veuillez choisir une image">
                                                    <div id="validationPhotoFeedback" class="invalid-feedback">
                                                        @if ($errors->get('photo'))
                                                            @foreach ($errors->get('photo') as $message)
                                                                {{ $message }}
                                                            @endforeach
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>

                                        </div>


                                    </div>

                                </div>




                            </div>




                            {{-- formation --}}
                            {{-- -------------------------------------------------------------------------- --}}


                            <div class="row espace-inputs justify-content-center">
                                <div class="col-md-12">
                                    <hr>
                                    <h5 style="text-align: center"><i class="bi bi-mortarboard-fill"></i> Formations
                                    </h5>
                                    <hr>
                                </div>

                                <div class="col-12 col-md-8 justify-content-center" style="">
                                    <label for="">Veuillez choisir les Formations prise en charge par ce profésseur:</label>

                                    <div class="input-group mb-3">

                                        <select class="form-select" id="formation"
                                            aria-label="Example select with button addon" name="formation">
                                            @foreach ($formations as $formation)
                                                <option value="{{ $formation->id }}">{{ $formation->titre }}</option>
                                            @endforeach
                                        </select>



                                        <button class="btn btn-outline-secondary alpa" type="button"
                                            onclick="btn_add_click()">
                                            <i class="bi bi-plus"></i><span class="btn-description">Ajouter à la liste</span>
                                        </button>

                                    </div>


                                    <div class="col-12" style="padding-top: 10px;">
                                        <table class="table table-bordered" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th class="align-middle">Formation</th>
                                                    <th class="align-middle">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody id="cours">
                                                {{-- cours liste  --}}
                                            </tbody>
                                        </table>
                                    </div>


                                </div>
                                <hr>

                                {{-- bouttons --}}
                                <div class="form-group row justify-content-center text-center mb-3" id="double-btn"
                                    style="margin-top:40px;">
                                    <div class="col-6">

                                        <button class="btn btn-outline-success alpa shadow" type="button"
                                            onclick="sauvegarder(this)">
                                            <i class="bi bi-check2"></i><span
                                                class="btn-description">Enregistrer</span></button>

                                    </div>
                                    <div class="col-6">
                                        <a class="btn btn-outline-danger alpa shadow" href="{{ '/admin/prof' }}"><i
                                                class="bi bi-x"></i><span class="btn-description">Annuler</span></a>
                                    </div>
                                </div>
                                {{-- bouttons --}}

                        </form>
                    </div>
                </div>

            </div>
        </div>





    </div>






    {{-- --------------------------------------------------------------------------------------------------------------------------------- --}}

    {{-- Fonction pour effectuer la requête AJAX --}}
    <script>
        function btn_add_click() {
            var addBtn = document.getElementById('add_btn');
            if (addBtn) {
                console.log("Le bouton a été trouvé.");
                var button = addBtn;
                AddCour(button);
            } else {
                console.error("Le bouton n'a pas été trouvé.");
            }
        }


        function AddCour(button) {
            const form = button.closest('.add_form');

            // Vérifier si l'élément form a été trouvé
            if (form) {
                const prof = form.getAttribute('data-id');
                const formation = $('#formation').val();

                // Vérifier si la valeur de formation n'est pas undefined
                if (formation !== undefined) {

                    $.ajax({
                        url: '/admin/prof/add-cour/' + formation + '/' + prof,
                        type: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function() {
                            Swal.fire({
                                title: "Formation ajoutée !",
                                icon: "success",
                                timer: 1000, // temps en millisecondes (5 secondes)
                                showConfirmButton: false // pour masquer le bouton "OK"
                            });
                        },
                        error: function(xhr, status, error) {
                            console.error(error);
                            Swal.fire({
                                title: "Ajout reffusé , la relation existe déja !",
                                icon: "warning",
                                timer: 1000, // temps en millisecondes (5 secondes)
                                showConfirmButton: false // pour masquer le bouton "OK"
                            });
                        }
                    });
                    AfficherFormations(prof);
                } else {
                    console.error('Formation value is undefined.');
                }
            } else {
                console.error('Parent form not found.');
            }
        }

        $(document).ready(function() {
                    // Appeler la fonction au chargement de la page
                    AfficherFormations({{ $prof->id }});
        });
    </script>


    {{-- --------------------------------------------------------------------------------------------------------------------------------- --}}

    <script>
        // Fonction pour effectuer la requête AJAX
        function AfficherFormations(prof) {
            $.ajax({
                url: '/admin/prof/get-formations/' + prof,
                type: 'GET',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    $('#cours').empty();
                    $.each(response.cours, function(key, value) {
                        $('#cours').append('<tr>' +
                            '<td>' + value.titre_formation + '</td>' +
                            '<td>' +
                            '<form class="delete-form" action="" data-id="' + value.id_cour + '" method="POST">' +
                            '@csrf' +
                            '@method("DELETE")' +
                            '<button class="btn btn-outline-danger" type="button" onclick="supprimer(this)">' +
                            'Supprimer cette Formation' +
                            '</button>' +
                            '</form>' +
                            '</td>' +
                            '</tr>');
                    });
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        }
    </script>
    











    {{-- --------------------------------------------------------------------------------------------------------------------------------- --}}

    {{-- script sauvegarder  --}}
    <script>
        function sauvegarder(button) {
            // Utilisez le bouton pour obtenir le formulaire parent
            const form = button.closest('.edit-form');
            // const form = document.getElementsByClassName('edit-form')[0];

            // Vérifiez si le formulaire a été trouvé
            if (form) {

                Swal.fire({
                    title: "Êtes-vous sûr(e) de vouloir enregistrer ?",
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
        // affichage de l'image
        // Sélection de l'élément input
        const input = document.getElementById('validationPhoto');

        // Écoute de l'événement 'change' sur l'input
        input.addEventListener('change', function() {
            // Vérification s'il y a un fichier sélectionné
            if (input.files && input.files[0]) {
                // Création d'un objet FileReader
                const reader = new FileReader();

                // Événement 'load' déclenché lorsque la lecture est terminée
                reader.onload = function(e) {
                    // Mise à jour de l'attribut src de l'élément img avec les données de l'image
                    // document.getElementById('imagePreview').src = e.target.result;
                    document.getElementById('imagePreview').style.backgroundImage = "url('" + e.target.result +
                        "')";
                };

                // Lecture du contenu de l'image en tant que URL de données
                reader.readAsDataURL(input.files[0]);
            }
        });


        // choix de l'image


        // Sélection de l'élément img
        const imagePreview = document.getElementById('imagePreview');

        // Écoute de l'événement 'click' sur l'image
        imagePreview.addEventListener('click', function() {
            // Clic sur l'élément input
            document.getElementById('validationPhoto').click();
        });
    </script>


    {{-- --------------------------------------------------------------------------------------------------------------------------------- --}}


    {{-- script supprimer formation  --}}
    <script>
        function supprimer(button) {
            const form = button.closest('.delete-form');
            const id = form.dataset.id;
    
            if (form) {
                $.ajax({
                    url: '/admin/prof/delete-cour/' + id,
                    type: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function () {
                        Swal.fire({
                            title: "Formation supprimée !",
                            icon: "warning",
                            timer: 1000,
                            showConfirmButton: false
                        });
                        AfficherFormations({{ $prof->id }});
                    },
                    error: function (xhr, status, error) {
                        console.error(error);
                        Swal.fire({
                            title: "Erreur lors de la suppression de la formation.",
                            icon: "error",
                        });
                    }
                });
            } else {
                console.error("Le formulaire n'a pas été trouvé.");
            }
        }
    </script>
    
    










    {{-- footer  --}}
    <div class="container" id="pied-page"></div>

@endsection
