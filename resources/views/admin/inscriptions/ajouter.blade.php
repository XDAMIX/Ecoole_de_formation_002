@extends('layouts.admin_menu')
@section('content')



    <div class="container" id="titre-page">
        <div class="row">
            <div class="col-2 d-flex align-items-center">
                <a href="{{ url('/admin/inscriptions') }}" class="btn btn-dark"><i class="bi bi-arrow-left"></i><span
                        class="btn-description">Retour</span></a>
            </div>
            <div class="col-10 d-flex align-items-center">
                <h2>Nouvelle inscription</h2>
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

                        <form class="inscription-form" action="{{ url('/admin/inscriptions/save') }}" method="POST">
                            @csrf





                            {{-- sexe ,nom ,prenom  --}}
                            {{-- ---------------------------------------------------------- --}}
                            <div class="row espace-inputs">

                                <div class="col-md-12">
                                    <h5 style="text-align: center"><i class="bi bi-person-fill"></i> informations
                                        personnelles</h5>
                                    <hr>
                                </div>

                                <div class="col-md-4 form-group" id="sexe">
                                    <label for="">sexe :</label>

                                    <select class="form-control" name="sexe">
                                        <option value="H">HOMME</option>
                                        <option value="F">FEMME</option>
                                    </select>
                                </div>


                                <div class="col-md-4 form-group" id="nom">
                                    <label for="">Nom :</label>

                                    <input type="text" name="nom"
                                        class="form-control @if ($errors->get('nom')) is-invalid @endif"
                                        id="validationServer01" placeholder="Veuillez saisir votre nom ici">
                                    <div id="validationServer01Feedback" class="invalid-feedback">
                                        @if ($errors->get('nom'))
                                            @foreach ($errors->get('nom') as $message)
                                                {{ $message }}
                                            @endforeach
                                        @endif
                                    </div>

                                </div>


                                <div class="col-md-4 form-group" id="prenom">
                                    <label for="">Prénom :</label>

                                    <input type="text" name="prenom"
                                        class="form-control @if ($errors->get('prenom')) is-invalid @endif"
                                        id="validationServer02" placeholder="Veuillez saisir votre prénom ici">
                                    <div id="validationServer02Feedback" class="invalid-feedback">
                                        @if ($errors->get('prenom'))
                                            @foreach ($errors->get('prenom') as $message)
                                                {{ $message }}
                                            @endforeach
                                        @endif
                                    </div>

                                </div>


                            </div>



                            {{-- age ,wilaya  --}}
                            {{-- ---------------------------------------------------------- --}}
                            <div class="row espace-inputs">


                                <div class="col-md-4 form-group" id="age">
                                    <label for="">Age :</label>

                                    <input type="number" name="age"
                                        class="form-control @if ($errors->get('age')) is-invalid @endif"
                                        id="validationServer03" placeholder="" min="18" value="18">
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        @if ($errors->get('age'))
                                            @foreach ($errors->get('age') as $message)
                                                {{ $message }}
                                            @endforeach
                                        @endif
                                    </div>

                                </div>


                                <div class="col-md-4 form-group" id="wilaya">
                                    <label for="">Wilaya de résidence :</label>

                                    <select class="form-control" name="wilaya">
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

                                <div class="col-md-4 form-group" id="profession">
                                    <label for="">Votre profession / Niveau d'études :</label>

                                    <input type="text" name="profession"
                                        class="form-control @if ($errors->get('profession')) is-invalid @endif"
                                        id="validationServer04" placeholder="Veuillez saisir votre profession ici">
                                    <div id="validationServer04Feedback" class="invalid-feedback">
                                        @if ($errors->get('profession'))
                                            @foreach ($errors->get('profession') as $message)
                                                {{ $message }}
                                            @endforeach
                                        @endif
                                    </div>

                                </div>

                            </div>





                            {{-- telephone ,email --}}
                            {{-- -------------------------------------------------------------------------- --}}
                            <div class="row espace-inputs">

                                <div class="col-md-6 form-group" id="telephone">
                                    <label for="">Numéro de téléphone :</label>

                                    <input type="text" name="tel"
                                        class="form-control @if ($errors->get('tel')) is-invalid @endif"
                                        id="validationServer05"
                                        placeholder="Veuillez saisir votre numéro de téléphone ici">
                                    <div id="validationServer05Feedback" class="invalid-feedback">
                                        @if ($errors->get('tel'))
                                            @foreach ($errors->get('tel') as $message)
                                                {{ $message }}
                                            @endforeach
                                        @endif
                                    </div>

                                </div>
                                <div class="col-md-6 form-group" id="email">
                                    <label for="">Adresse e-mail :</label>

                                    <input type="text" name="email"
                                        class="form-control @if ($errors->get('email')) is-invalid @endif"
                                        id="validationServer06" placeholder="Veuillez saisir votre adresse e-mail ici">
                                    <div id="validationServer06Feedback" class="invalid-feedback">
                                        @if ($errors->get('email'))
                                            @foreach ($errors->get('email') as $message)
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
                                    <label for="">Veuillez choisir la Formation auquelle vous êtes intéressé
                                        :</label>

                                    <select class="form-control" name="formation">
                                        @foreach ($formations as $formation)
                                            <option value="{{ $formation->id }}">{{ $formation->titre }}</option>
                                        @endforeach
                                    </select>
                                </div>

                            </div>

                            <hr>

                            <div class="row formulaire-btn" style="margin-top:20px;margin-bottom:30px;">
                                <div class="col-6 form-group">

                                    <button type="button" onclick="sauvegarder()"
                                        class="btn btn-outline-success alpa shadow"><i
                                            class="bi bi-check2"></i><span class="btn-description">Valider</span></button>


                                </div>
                                <div class="col-6 form-group">

                                    <a href="/admin/inscriptions" class="btn btn-outline-danger alpa shadow"><i
                                            class="bi bi-x"></i><span class="btn-description">Annuler</span></a>

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
                          await new Promise(resolve => setTimeout(resolve, 10000)); // 5 seconde de délai (ajustez si nécessaire)
                          
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
