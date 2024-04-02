@extends('layouts.admin_menu')
@section('content')

<div class="container" id="titre-page">
    <div class="row">
        <div class="col-2 d-flex align-items-center">
            <a href="{{ url('/admin/formations') }}" class="btn btn-dark"><i class="bi bi-arrow-left"></i><span
                    class="btn-description">Retour</span></a>
        </div>
        <div class="col-10 text-center">
            <h1>{{ $formation->titre }}</h1>
            {{-- <h2>informations de la formation</h2> --}}
        </div>
    </div>
</div>

<div class="container">

    <div class="row animate__animated animate__backInLeft">
        <div class="col-md-12">
            <div class="card shadow" style="background-color: #ffff;">

                <div class="card-body">

                    <div class="row">
                        {{-- <div style="text-align: center">
                            <h3 style="color: rebeccapurple; font-size: 30px">{{ $formation->titre }}</h3>
                            
                        </div> --}}
                        <div class="col-md-6">
                            <div class="row">
                        
                                <div>
                                    <h3><i class="fa-solid fa-people-group"></i> Public concerné :</h3>
                                    <p> {{ $formation->publique }} </p>
                                    
                                </div>
                                <div class="col-12 py-3">
                                    <h3> <i class="fa-solid fa-bullseye"></i> Objectifs :</h3>
                                    <p> {{ $formation->objectifs }} </p>
                                </div>
                                <div>
                                    <h3> <i
                                        class="fa-solid fa-stopwatch"></i> Duré :  {{ $formation->dure }}</h3>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div>
                                <img id="imagePreview" class="img-fluid" src="{{ asset('storage/' . $formation->photo) }}" alt="L'image n'a pas été sélectionnée!" style="height: 300px;width: auto;">
                            </div>
                        </div>
                    </div>
                    <hr>

                    <div class="row">
                        
                    
    
                        <div class="col-12 py-3">
                            <h3>Description de la formation :</h3>
                            <p> {{ $formation->description }} </p>
                        </div>
    
                            {{-- ----------------- --}}

                            <div class="row espace-inputs justify-content-center">
                                <div class="col-md-12">
                                    <hr>
                                    <h5 style="text-align: center"><i class="bi bi-cash-stack fa-2xl"></i> Tarifs : (en Dinars)
                                    </h5>
                                    <hr>
                                </div>
                                

                                <div class="row justify-content-center">
                                @foreach ($paiements as $paiement)
                                            
                                            <div class="col-2 form-group" id="montant" style="text-align: center;">
                                                <label style="font-weight: bold;" for=""> {{ $paiement->titre }} :</label>

                                                <input style="text-align: center;" readonly type="text" value="{{ $paiement->prix }} DA" name="prix"
                                                 
                                                    class="form-control">
                                            </div>
                                        @endforeach
                                 
                                 </div>
                                </div>
                            {{-- ----------------- --}}


                    </div>
                </div>

            </div>
        


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