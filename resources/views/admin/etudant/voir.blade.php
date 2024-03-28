@extends('layouts.admin_menu')
@section('content')
    <div class="container" id="titre-page">
        <div class="row">
            <div class="col-2 d-flex align-items-center">
                <a href="{{ url('/admin/etudiant') }}" class="btn btn-dark"><i class="bi bi-arrow-left"></i><span
                        class="btn-description">Retour</span></a>
            </div>
            <div class="col-10 d-flex align-items-center">
                <h2>Voir les informations de stagiaire</h2>
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
                                                <h6>Profession :</h6>
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

                                    <div class="col-md-4 photo" style="padding-top: 10px;padding-bottom:10px;text-align:center;">
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
                                    <div class="col-md-2 text-center">
                                        <h6>Tarif :</h6>
                                        <p>{{ $etudiant->tarif }}</p>
                                    </div>
                                    <div class="col-md-2 text-center">
                                        <h6>Prix :</h6>
                                        <p>{{ $etudiant->prix_formation }} DA</p>
                                    </div>
                                </div>
                                <hr>
                            </div>

                            {{-- -------------------------------------- --}}
                            <div class="col-12" id="boutons">
                                <br>
                                <div class="row formulaire-btn">
                                    <div class="col-12 form-group" style="padding:40px;">
                                        {{-- bouton de sauvegarde  --}}
                                        <form class="download-form"
                                            action="{{ url('/admin/etudiant/' . $etudiant->id . '/download') }}"
                                            method="GET">
                                            @csrf
                                            <button type="button" onclick="telecharger(this)"
                                                class="btn btn-outline-danger alpa shadow"><i
                                                    class="bi bi-filetype-pdf icons"></i>Télécharger le PDF</button>
                                        </form>

                                    </div>
                                </div>

                            </div>
                            {{-- -------------------------------------- --}}







                        </div>

                    </div>
                </div>





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
                        title: "Êtes-vous sûr(e) de vouloir télécharger la fiche d'inscription de stagiaire ?",
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
