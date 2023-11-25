@extends('layouts.admin_menu')
@section('content')


<div class="container" id="titre-page">
  <div class="row">
      <div class="col-2 d-flex align-items-center">
          <a href="{{ url('/admin/prof') }}" class="btn btn-dark"><i class="bi bi-arrow-left"></i><span
                  class="btn-description">Retour</span></a>
      </div>
      <div class="col-10 d-flex align-items-center">
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

                  <form class="inscription-form" action="{{ url('/admin/prof/save') }}" method="POST">
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

                              <select class="form-control" name="sexe" required>
                                  <option value="H">HOMME</option>
                                  <option value="F">FEMME</option>
                              </select>
                          </div>


                          <div class="col-md-4 form-group" id="nom">
                              <label for="">Nom :</label>

                              <input type="text" name="nom"
                                  class="form-control @if ($errors->get('nom')) is-invalid @endif"
                                  id="validationServer01" placeholder="Veuillez saisir votre nom ici" required>
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
                                  id="validationServer02" placeholder="Veuillez saisir votre prénom ici" required>
                              <div id="validationServer02Feedback" class="invalid-feedback">
                                  @if ($errors->get('prenom'))
                                      @foreach ($errors->get('prenom') as $message)
                                          {{ $message }}
                                      @endforeach
                                  @endif
                              </div>

                          </div>


                      </div>



                      {{-- age, telephone ,email   --}}
                      {{-- ---------------------------------------------------------- --}}
                      <div class="row espace-inputs">


                          <div class="col-md-4 form-group" id="age">
                              <label for="">Age :</label>

                              <input type="number" name="age"
                                  class="form-control @if ($errors->get('age')) is-invalid @endif"
                                  id="validationServer03" placeholder="" min="18" value="18" required>
                              <div id="validationServer03Feedback" class="invalid-feedback">
                                  @if ($errors->get('age'))
                                      @foreach ($errors->get('age') as $message)
                                          {{ $message }}
                                      @endforeach
                                  @endif
                              </div>

                          </div>

                          <div class="col-md-4 form-group" id="telephone">
                              <label for="">Numéro de téléphone :</label>
    
                              <input type="text" name="tel"
                                  class="form-control @if ($errors->get('tel')) is-invalid @endif"
                                  id="validationServer05"
                                  placeholder="Veuillez saisir votre numéro de téléphone ici" required>
                              <div id="validationServer05Feedback" class="invalid-feedback">
                                  @if ($errors->get('tel'))
                                      @foreach ($errors->get('tel') as $message)
                                          {{ $message }}
                                      @endforeach
                                  @endif
                              </div>
    
                          </div>
                          <div class="col-md-4 form-group" id="email">
                              <label for="">Adresse e-mail :</label>
    
                              <input type="text" name="email"
                                  class="form-control @if ($errors->get('email')) is-invalid @endif"
                                  id="validationServer06" placeholder="Veuillez saisir votre adresse e-mail ici" required>
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

                          <div class="col-md-6 form-group" id="specialite" style="text-align: center;">
                              <label for="">Veuillez choisir la Spécialité de ce profésseur :</label>

                              <select class="form-control" name="specialite" required>
                                  @foreach ($formations as $formation)
                                      <option value="{{ $formation->titre }}">{{ $formation->titre }}</option>
                                  @endforeach
                              </select>
                          </div>

                      </div>

                      <hr>

                        {{-- bouttons --}}
                        <div class="form-group row justify-content-center text-center" id="double-btn">
                          <div class="col-6">
                              <button type="submit" class="btn btn-outline-success alpa shadow"><i
                                      class="bi bi-check2"></i> <span class="btn-description">Enregistrer</span>
                              </button>
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


      @endsection


