@extends('layouts.admin_menu')
@section('content')
    <div class="container" id="titre-page">
        <div class="row">
            <div class="col-2 d-flex align-items-center">
                <a href="{{ url('/admin/prof') }}" class="btn btn-dark"><i class="bi bi-arrow-left"></i><span
                        class="btn-description">Retour</span></a>
            </div>
            <div class="col-10 d-flex align-items-center">
                <h2>Voir les informations de profésseur</h2>
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
                                                <p>{{ $prof->id }}</p>

                                            </div>

                                            <div class="col-md-4">
                                                <h6>Date d'ajout :</h6>
                                                <p>{{ $prof->created_at }}</p>

                                            </div>

                                            <div class="col-md-4">


                                            </div>

                                            {{-- -------------------------------------- --}}
                                            <div class="col-md-4">
                                                <h6>sexe :</h6>
                                                <p>
                                                    @if ($prof->sexe == 'H')
                                                        HOMME
                                                    @else
                                                        FEMME
                                                    @endif
                                                </p>
                                            </div>
                                            <div class="col-md-4">
                                                <h6>Nom :</h6>
                                                <p>{{ $prof->nom }}</p>

                                            </div>

                                            <div class="col-md-4">
                                                <h6>Prénom :</h6>
                                                <p>{{ $prof->prenom }}</p>

                                            </div>
                                            {{-- -------------------------------------- --}}
                                            
                                            <div class="col-md-4">
                                                <h6>Date de naissance :</h6>
                                                <p>{{ $prof->date_naissance }}</p>
                                                
                                            </div>
                                            
                                            <div class="col-md-4">
                                                <h6>Lieu de naissance :</h6>
                                                <p>{{ $prof->lieu_naissance }}</p>
                                                
                                            </div>
                                            
                                            <div class="col-md-4">


                                            </div>
                                            {{-- -------------------------------------- --}}
                                            
                                            <div class="col-md-4">
                                                <h6>Wilaya de résidence :</h6>
                                                <p>{{ $prof->wilaya }}</p>
                                                
                                            </div>
                                            
                                            <div class="col-md-8">
                                                <h6>Adresse :</h6>
                                                <p>{{ $prof->adresse }}</p>
                                                
                                            </div>

                                            {{-- -------------------------------------- --}}
                                            
                                            <div class="col-md-4">
                                                <h6>Diplôme :</h6>
                                                <p>{{ $prof->diplome }}</p>
                                                
                                            </div>

                                            <div class="col-md-4">
                                                <h6>N° de Téléphone :</h6>
                                                <p>{{ $prof->tel }}</p>

                                            </div>

                                            <div class="col-md-4">
                                                <h6>E-Mail :</h6>
                                                <p>{{ $prof->email }}</p>

                                            </div>

                                            {{-- -------------------------------------- --}}
                                        </div>
                                    </div>

                                    <div class="col-md-4 photo" style="padding-top: 10px;padding-bottom:10px;text-align:center;">
                                        <div
                                            style="background-image:url({{ asset('storage/' . $prof->photo) }});background-size: cover;background-position: center;background-repeat: no-repeat;  height: 250px; width: 220px; margin-left:5px; margin-right:5px;">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- -------------------------------------- --}}
                            <div class="col-12" id="formation">
                                <h5><i class="bi bi-mortarboard-fill"></i> Formations </h5>
                                <div class="row" style="padding-top: 10px;padding-bottom:10px;">
                                    <div class="col-12">

                                        @foreach($cours as $cour)
                                        <h6 style="margin-top:20px;"> <span style="color: #444444"> Formation  :</span>    {{ $cour->titre_formation }}</h6>
                                        @endforeach

                                    </div>

                                </div>
                            </div>

                            {{-- -------------------------------------- --}}
                            <div class="col-12" id="boutons">
                                <br>
                                <div class="row formulaire-btn">
                                    <div class="col-12 form-group" style="padding:40px;">
                                        {{-- bouton de sauvegarde  --}}
                                        <form class="download-form"
                                            action="{{ url('/admin/prof/' . $prof->id . '/download') }}"
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
    </div>

{{-- script télécharger le pdf  --}}
<script>
    function telecharger(button) {
        // Utilisez le bouton pour obtenir le formulaire parent
        const form = button.closest('.download-form');

        // Vérifiez si le formulaire a été trouvé
        if (form) {

            Swal.fire({
                title: "Êtes-vous sûr(e) de vouloir télécharger la fiche des informations de profésseur ?",
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
                    // form.action = `/admin/inscriptions/${id}/edit`;
                    form.submit();
                }
            });
        } else {
            console.error("Le formulaire n'a pas été trouvé.");
        }
    }
</script>

    <style>
h5{
    text-align: center;
    padding:10px;
    background: #cdcccc;
    color: #ffff;
}

    </style>
@endsection
