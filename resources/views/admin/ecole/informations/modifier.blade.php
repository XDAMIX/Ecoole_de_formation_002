@extends('layouts.admin_menu')
@section('content')

    <script>
        function previewImage() {
            var file = document.getElementById("validationServer06").files;
            if (file.length > 0) {
                var fileReader = new FileReader();

                fileReader.onload = function(event) {
                    document.getElementById("preview").setAttribute("src", event.target.result)
                };
                fileReader.readAsDataURL(file[0]);
            }
        }
    </script>


    <div class="container" id="titre-page">

        <div class="row">
            <div class="col-2 d-flex align-items-center">
                <a href="{{ url('/admin/ecole') }}" class="btn btn-dark"><i class="bi bi-arrow-left"></i><span
                        class="btn-description">Retour</span></a>
            </div>
            <div class="col-10 d-flex align-items-center">
                <h2>Modification des Informations</h2>
            </div>
        </div>
    </div>


    <div class="container" style="padding-top: 10px;">
        <div class="row animate__animated animate__backInLeft">
            <div class="col-md-12">
                <div class="card shadow" style="background-color: #ffff;">
                    {{-- <div class="card-header"style="text-align:center;">
                  <a style="font-size: 20px;">informations de l'école</a>
                </div> --}}
                    <div class="card-body">

                        <form class="edit-form" action="{{ url('/admin/ecole/' . $information->id . '/update') }}"
                            method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="">Nom de l'école:</label>
                                <input type="text" name="nom"
                                    class="form-control @if ($errors->get('nom')) is-invalid @endif"
                                    id="validationServer01" placeholder="Nom" value="{{ $information->nom }}">
                                <div id="validationServer01Feedback" class="invalid-feedback">
                                    @if ($errors->get('nom'))
                                        @foreach ($errors->get('nom') as $message)
                                            {{ $message }}
                                        @endforeach
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="">Adresse:</label>
                                <input type="text" name="adresse"
                                    class="form-control @if ($errors->get('adresse')) is-invalid @endif"
                                    id="validationServer02" placeholder="Adresse" value="{{ $information->adresse }}">
                                <div id="validationServer02Feedback" class="invalid-feedback">
                                    @if ($errors->get('adresse'))
                                        @foreach ($errors->get('adresse') as $message)
                                            {{ $message }}
                                        @endforeach
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="">Localisation:</label>
                                <textarea type="text" name="localisation" class="form-control @if ($errors->get('localisation')) is-invalid @endif"
                                    id="validationServer03" placeholder="Localisation">{{ $information->localisation }}</textarea>
                                <div id="validationServer03Feedback" class="invalid-feedback">
                                    @if ($errors->get('localisation'))
                                        @foreach ($errors->get('localisation') as $message)
                                            {{ $message }}
                                        @endforeach
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="">E-Mail:</label>
                                <input type="text" name="email"
                                    class="form-control @if ($errors->get('email')) is-invalid @endif"
                                    id="validationServer04" placeholder="E-Mail" value="{{ $information->email }}">
                                <div id="validationServer04Feedback" class="invalid-feedback">
                                    @if ($errors->get('email'))
                                        @foreach ($errors->get('email') as $message)
                                            {{ $message }}
                                        @endforeach
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="">Heure de travail:</label>
                                <input type="text" name="heure_travail"
                                    class="form-control @if ($errors->get('nom')) is-invalid @endif"
                                    id="validationServer05" placeholder="Heure de Travail"
                                    value="{{ $information->heure_travail }}">
                                <div id="validationServer05Feedback" class="invalid-feedback">
                                    @if ($errors->get('heure_travail'))
                                        @foreach ($errors->get('heure_travail') as $message)
                                            {{ $message }}
                                        @endforeach
                                    @endif
                                </div>
                            </div>


                            <div class="form-group">
                                <label for="">Logo:</label>
                                <input type="file" name="logo"
                                    class="form-control @if ($errors->get('logo')) is-invalid @endif"
                                    id="validationServer06" accept="image/*" onchange="previewImage();"
                                    value="{{ $information->logo }}">



                                <div id="validationServer06Feedback" class="invalid-feedback">
                                    @if ($errors->get('logo'))
                                        @foreach ($errors->get('logo') as $message)
                                            {{ $message }}
                                        @endforeach
                                    @endif
                                </div>

                                <div class="col-12" style="text-align: center;">
                                    <img src="{{ asset('storage/' . $information->logo) }}" class="img-fluid rounded"
                                        alt=""
                                        style="height:250px;width:auto; margin-top: 15px;margin-bottom: 15px;"
                                        id="preview">
                                </div>



                            </div>

                            <br>



                            <div class="form-group row justify-content-center text-center">
                                <div class="col-6">
                                    <button type="button" onclick="sauvegarder(this)"
                                        class="btn btn-outline-success alpa shadow"><i class="bi bi-check2"></i><span
                                            class="btn-description">Enregistrer</span></button>
                                </div>
                                <div class="col-6">
                                    <a class="btn btn-outline-danger alpa shadow" href="{{ '/admin/ecole' }}"><i
                                            class="bi bi-x"></i><span class="btn-description">Annuler</span></a>
                                </div>
                            </div>


                        </form>

                    </div>
                </div>

            </div>
        </div>




    </div>

    {{-- --------------------------------------------------------------     --}}

    {{-- script sauvegarder  --}}
    <script>
        function sauvegarder(button) {
            // Utilisez le bouton pour obtenir le formulaire parent
            const form = button.closest('.edit-form');

            // Vérifiez si le formulaire a été trouvé
            if (form) {

                Swal.fire({
                    title: "Êtes-vous sûr(e) de vouloir enregistrer les modifications ?",
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



    {{-- ------------------------------ --}}
    {{-- footer  --}}
    <div class="container" id="pied-page">

    @endsection
