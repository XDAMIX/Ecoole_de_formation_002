@extends('layouts.admin_menu')
@section('content')


    <div class="container" id="titre-page">
        <div class="row">
            <div class="col-2 d-flex align-items-center">
                <a href="{{ url('/admin/inscriptions') }}" class="btn btn-dark"><i class="bi bi-arrow-left"></i><span
                        class="btn-description">Retour</span></a>
            </div>
            <div class="col-10 d-flex align-items-center">
                <h2>Valider l'inscription</h2>
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

                        <form class="validation-form"
                            action="{{ url('/admin/inscriptions/' . $inscription->id . '/valideupdate') }}" method="POST">
                            @csrf
                            @method('PUT')




                            {{-- sexe ,nom ,prenom  --}}
                            {{-- ---------------------------------------------------------- --}}
                            <div class="row espace-inputs">

                                <div class="col-md-12">
                                    <h5 style="text-align: center"><i class="bi bi-person-fill"></i> informations
                                        personnelles</h5>
                                    <hr>
                                </div>



                                <div class="col-md-6 form-group" id="nom">
                                    <label for="">Nom :</label>

                                    <input type="text" name="nom"
                                        class="form-control @if ($errors->get('nom')) is-invalid @endif"
                                        id="validationServer01" placeholder="Veuillez saisir votre nom ici"
                                        value="{{ $inscription->nom }}">
                                    <div id="validationServer01Feedback" class="invalid-feedback">
                                        @if ($errors->get('nom'))
                                            @foreach ($errors->get('nom') as $message)
                                                {{ $message }}
                                            @endforeach
                                        @endif
                                    </div>

                                </div>


                                <div class="col-md-6 form-group" id="prenom">
                                    <label for="">Prénom :</label>

                                    <input type="text" name="prenom"
                                        class="form-control @if ($errors->get('prenom')) is-invalid @endif"
                                        id="validationServer02" placeholder="Veuillez saisir votre prénom ici"
                                        value="{{ $inscription->prenom }}">
                                    <div id="validationServer02Feedback" class="invalid-feedback">
                                        @if ($errors->get('prenom'))
                                            @foreach ($errors->get('prenom') as $message)
                                                {{ $message }}
                                            @endforeach
                                        @endif
                                    </div>

                                </div>


                            </div>




                            {{-- formation --}}
                            {{-- -------------------------------------------------------------------------- --}}

                            <div class="row espace-inputs justify-content-center">
                                <div class="col-md-12">
                                    <hr>
                                    <h5 style="text-align: center"><i class="bi bi-mortarboard-fill"></i> Formation</h5>
                                    <hr>
                                </div>

                                <div class="col-md-6 form-group" id="formation" style="text-align: center;">
                                    <label for="">Choix de Session :</label>

                                    <select class="form-control @if ($errors->get('session')) is-invalid @endif"
                                        id="validationServer03" name="session" style="text-align: center;">

                                        @foreach ($sessions as $session)
                                            <option value="{{ $session->nom }}">{{ $session->nom }} /
                                                {{ $session->formation }} / {{ $session->prof }}</option>
                                        @endforeach
                                    </select>
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        @if ($errors->get('session'))
                                            @foreach ($errors->get('session') as $message)
                                                {{ $message }}
                                            @endforeach
                                        @endif
                                    </div>
                                </div>


                                <div class="col-md-6 form-group" id="montant" style="text-align: center;">
                                    <label for="">Paiement :</label>

                                    <input type="text" value="0" name="montant"
                                        class="form-control @if ($errors->get('montant')) is-invalid @endif"
                                        id="validationServer04" placeholder="Veuillez saisir le montant d'argent encaissé">

                                    <div id="validationServer04Feedback" class="invalid-feedback">
                                        @if ($errors->get('montant'))
                                            @foreach ($errors->get('montant') as $message)
                                                {{ $message }}
                                            @endforeach
                                        @endif
                                    </div>

                                </div>

                            </div>

                            <hr>

                            <div class="row formulaire-btn">

                                {{-- form buttons  --}}
                                <div class="form-group row justify-content-center text-center">
                                    <div class="col-6">
                                        <button type="button" onclick="validation(this)"
                                            class="btn btn-outline-success alpa shadow"><i
                                                class="bi bi-check2 icons"></i>Enregistrer</button>
                                    </div>
                                    <div class="col-6">
                                        <a class="btn btn-outline-danger alpa shadow" href="{{ '/admin/inscriptions' }}"><i
                                                class="bi bi-x icons"></i>Annuler</a>
                                    </div>
                                </div>

                        </form>
                        {{-- form de redirection --}}
                        <form class="redirect-form" action="{{ url('/admin/inscriptions') }}" method="GET"></form>
                    </div>
                </div>

            </div>
        </div>





    </div>


    {{-- script sauvegarder  --}}
    <script>
        function validation(button) {
            // Utilisez le bouton pour obtenir le formulaire parent
            const form1 = document.querySelector('.validation-form');
            const form2 = document.querySelector('.redirect-form');

            // Vérifiez si le formulaire a été trouvé
            if (form1 && form2) {

                Swal.fire({
                    title: "Êtes-vous sûr(e) de vouloir valider cette inscription ?",
                    text: name,
                    icon: "question",
                    showCancelButton: true,
                    confirmButtonColor: "#198754",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Oui",
                    cancelButtonText: "Non",
                }).then(async (result) => {
                    try {
                        if (result.isConfirmed) {
                            // Soumettre le premier formulaire
                            await form1.submit();

                            // Attendez que le premier formulaire soit soumis avant de soumettre le deuxième
                            await new Promise(resolve => setTimeout(resolve,
                                10000)); // 5 seconde de délai (ajustez si nécessaire)

                            form2.submit();
                        }
                    } catch (error) {
                        console.error("Erreur lors de la soumission du formulaire : ", error);
                    }
                });
            } else {
                console.error("Le formulaire n'a pas été trouvé.");
            }
        }
    </script>

    <script>
        async function sauvegarder() {
            // Utilisez le bouton pour obtenir le formulaire parent
            const form1 = document.querySelector('.inscription-form');
            const form2 = document.querySelector('.redirect-form');

            // Vérifiez si le formulaire a été trouvé
            if (form1 && form2) {

                Swal.fire({
                    title: "Êtes-vous sûr(e) de vouloir enregistrer cette inscription ?",
                    icon: "question",
                    showCancelButton: true,
                    confirmButtonColor: "#198754",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Oui",
                    cancelButtonText: "Non",
                }).then(async (result) => {
                    try {
                        if (result.isConfirmed) {
                            // Soumettre le premier formulaire
                            await form1.submit();

                            // Attendez que le premier formulaire soit soumis avant de soumettre le deuxième
                            await new Promise(resolve => setTimeout(resolve,
                                5000)); // 1 seconde de délai (ajustez si nécessaire)

                            form2.submit();
                        }
                    } catch (error) {
                        console.error("Erreur lors de la soumission du formulaire : ", error);
                    }
                });
            } else {
                console.error("Il y a une erreur !");
            }
        }
    </script>


@endsection
