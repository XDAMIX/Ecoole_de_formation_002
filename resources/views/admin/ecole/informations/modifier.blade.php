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
                                    id="validationNom" placeholder="Nom" value="{{ $information->nom }}">
                                <div id="validationNomFeedback" class="invalid-feedback">
                                    @if ($errors->get('nom'))
                                        @foreach ($errors->get('nom') as $message)
                                            {{ $message }}
                                        @endforeach
                                    @endif
                                </div>
                            </div>


                            <div class="form-group" id="wilaya">
                                <label for="">Wilaya :</label>

                                <select class="form-control form-select" name="wilaya">

                                    <option value="{{ $information->wilaya }}" style="display:none;" selected>
                                        {{ $information->wilaya }}</option>

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
                                    <option value="Alger">Alger-16 </option>
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
                                    <option value="Bordj Bou Arreridj">Bordj Bou Arreridj-34 </option>
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
                                    <option value="Bordj Badji Mokhtar">Bordj Badji Mokhtar-50 </option>

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

                            <div class="form-group">
                                <label for="">Adresse:</label>
                                <input type="text" name="adresse"
                                    class="form-control @if ($errors->get('adresse')) is-invalid @endif"
                                    id="validationAdresse" placeholder="Adresse" value="{{ $information->adresse }}">
                                <div id="validationAdresseFeedback" class="invalid-feedback">
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
                                    id="validationLocalisation" placeholder="Localisation">{{ $information->localisation }}</textarea>
                                <div id="validationLocalisationFeedback" class="invalid-feedback">
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
                                    id="validationEmail" placeholder="E-Mail" value="{{ $information->email }}">
                                <div id="validationEmailFeedback" class="invalid-feedback">
                                    @if ($errors->get('email'))
                                        @foreach ($errors->get('email') as $message)
                                            {{ $message }}
                                        @endforeach
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="">Site-Web:</label>
                                <input type="text" name="site_web"
                                    class="form-control @if ($errors->get('site_web')) is-invalid @endif"
                                    id="validationSite" placeholder="site web" value="{{ $information->site_web }}">
                                <div id="validationSiteFeedback" class="invalid-feedback">
                                    @if ($errors->get('site_web'))
                                        @foreach ($errors->get('site_web') as $message)
                                            {{ $message }}
                                        @endforeach
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="">Heure de travail:</label>
                                <input type="text" name="heure_travail"
                                    class="form-control @if ($errors->get('nom')) is-invalid @endif"
                                    id="validationTravail" placeholder="Heure de Travail"
                                    value="{{ $information->heure_travail }}">
                                <div id="validationTravailFeedback" class="invalid-feedback">
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
                                    id="validationLogo" accept="image/*" onchange="previewImage();"
                                    value="{{ $information->logo }}">

                                {{-- <div id="validationLogoFeedback" class="invalid-feedback">
                                    @if ($errors->get('logo'))
                                        @foreach ($errors->get('logo') as $message)
                                            {{ $message }}
                                        @endforeach
                                    @endif
                                </div> --}}

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
