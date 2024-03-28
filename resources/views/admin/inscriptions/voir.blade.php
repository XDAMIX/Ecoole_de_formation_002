@extends('layouts.admin_menu')
@section('content')
    <div class="container" id="titre-page">
        <div class="row">
            <div class="col-2 d-flex align-items-center">
                <a href="{{ url('/admin/inscriptions') }}" class="btn btn-dark"><i class="bi bi-arrow-left"></i><span
                        class="btn-description">Retour</span></a>
            </div>
            <div class="col-10 d-flex align-items-center">
                <h2>Voir l'inscription</h2>
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
                        <div class="row justify-content-center">

                            <div class="col-md-12">
                                <br>
                                <h5><i class="bi bi-person-fill"></i> Informations
                                    personnelles</h5>
                                <hr>
                            </div>

                            <div class="col-md-2">
                                <h6>ID :</h6>
                                <p>{{ $inscription->id }}</p>

                            </div>

                            <div class="col-md-2">
                                <h6>Date d'inscription :</h6>
                                <p>{{ $inscription->created_at }}</p>

                            </div>

                            <div class="col-md-2">
                                <h6>sexe :</h6>
                                <p>
                                    @if ($inscription->sexe == 'H')
                                        HOMME
                                    @else
                                        FEMME
                                    @endif
                                </p>
                            </div>


                            <div class="col-md-3">
                                <h6>Nom :</h6>
                                <p>{{ $inscription->nom }}</p>

                            </div>

                            <div class="col-md-3">
                                <h6>Prénom :</h6>
                                <p>{{ $inscription->prenom }}</p>

                            </div>

                            {{-- ----------------------------------------------------------  --}}
                            <div class="col-12">
                                <hr>
                            </div>
                            {{-- ----------------------------------------------------------  --}}
                            
                            <div class="col-md-2">
                                <h6>Age :</h6>
                                <p>{{ $inscription->age }} ans</p>

                            </div>

                            <div class="col-md-2">
                                <h6>wilaya :</h6>
                                <p>{{ $inscription->wilaya }}</p>

                            </div>

                            <div class="col-md-2">
                                <h6>N° de Téléphone :</h6>
                                <p>{{ $inscription->tel }}</p>
                                
                            </div>
                            
                            <div class="col-md-3">
                                <h6>E-Mail :</h6>
                                <p>{{ $inscription->email }}</p>
                                
                            </div>

                            <div class="col-md-3">
                                <h6>Proféssion / Niveau d'études :</h6>
                                <p>{{ $inscription->profession }}</p>

                            </div>
                            {{-- --------------------------------------------------------------  --}}
                            
         

                            {{-- ---------------------------------------------------------------------  --}}
                            
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-md-12">
                                <hr>
                                <h5 style="text-align: center"><i class="bi bi-mortarboard-fill"></i> Formation</h5>
                                <hr>
                            </div>
                            <br>
                            <div class="col-md-12 text-center">
                                <h6>Formation choisie:</h6>
                                <p>{{ $inscription->formation }}</p>
                            <hr>
                            </div>
                        </div>
                        <br>
                        <div class="row formulaire-btn">
                            <div class="col-12 form-group" style="padding:40px;">
                              {{-- bouton de sauvegarde  --}}
                              <form class="download-form" action="{{ url('/admin/inscriptions/'.$inscription->id.'/download') }}" method="GET">
                                @csrf
                                <button type="button" onclick="telecharger(this)" class="btn btn-outline-danger alpa shadow"><i class="bi bi-filetype-pdf icons"></i>Télécharger le PDF</button>
                              </form>

                            </div>
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
                title: "Êtes-vous sûr(e) de vouloir télécharger l'Accusé de réception de cette inscription ?",
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
