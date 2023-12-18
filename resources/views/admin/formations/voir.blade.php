@extends('layouts.admin_menu')
@section('content')

<div class="container" id="titre-page">
    <div class="row">
        <div class="col-2 d-flex align-items-center">
            <a href="{{ url('/admin/formations') }}" class="btn btn-dark"><i class="bi bi-arrow-left"></i><span
                    class="btn-description">Retour</span></a>
        </div>
        <div class="col-10 d-flex align-items-center">
            <h2>informations de la formation</h2>
        </div>
    </div>
</div>

<div class="container">

    <div class="row animate__animated animate__backInLeft">
        <div class="col-md-12">
            <div class="card shadow" style="background-color: #ffff;">
                {{-- <div class="card-header"style="text-align:center;">
              <a style="font-size: 20px;">Nouveau bloc de présentation</a>
            </div> --}}
                <div class="card-body">

                    <div class="col-12 text-center">
                        <img id="imagePreview" class="" src="{{ asset('storage/' . $formation->photo) }}" alt="l'image n'a pas été sélectionné!"
                            style="height: 300px;width: auto;">
                    </div>
                    <hr>

                    <div class="row text-center">
                        
                        <div class="col-12 py-3">
                            <h3>Titre de la formation :</h3>
                            <h5> {{ $formation->titre }} </h5>
                        </div>
    
                        <div class="col-12 py-3">
                            <h3>La duré de la formation :</h3>
                            <h5> {{ $formation->dure }} </h5>
                        </div>
    
                        <div class="col-12 py-3">
                            <h3>Description de la formation :</h3>
                            <p> {{ $formation->description }} </p>
                        </div>
    
                        <div class="col-12 py-3">
                            <h3>Public concerné :</h3>
                            <p> {{ $formation->publique }} </p>
                        </div>
    
                        <div class="col-12 py-3">
                            <h3>Objectifs :</h3>
                            <p> {{ $formation->objectifs }} </p>
                        </div>

                    </div>





                    
                </div>
            </div>

        </div>
    </div>


</div>

    {{-- footer  --}}
<div class="container" id="pied-page"></div>

@endsection