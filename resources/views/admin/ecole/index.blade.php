@extends('layouts.admin_menu')
@section('content')


<div class="container" id="titre-page">
    <div class="row">
        <div class="col-2 d-flex align-items-center">
            <a href="{{ url('/admin/') }}" class="btn btn-dark"><i class="bi bi-house"></i><span class="btn-description">Acceuil</span></a>
        </div>
        <div class="col-10 d-flex align-items-center">
            <h2>Réglages Informations</h2>
        </div>
    </div>
</div>


<div class="container-fluid animate__animated animate__backInLeft" style="margin-top:10px;margin-bottom:10px;">

    <div class="card shadow" style="background-color: #ffff;" id="global">
        <div class="card-body">

<!-- informations ecole -->
<div class="container section">

    @foreach($informations as $information)
    
    
    <div class="row">

        
        <div class="row entete">
            <div class="col-2 col-md-1 d-flex align-items-center">
                <h4><i class="bi bi-buildings icons"></i></h4>            
            </div>
            <div class="col-8 col-md-11 d-flex align-items-center">
                <h4>Informations de l'école :</h4>            
            </div>
        </div>

        <div class="col-md-8" id="gauche">
            <div class="row">
                <div class="col-12 col-md-4">
                    <p class="titre"><i class="bi bi-building-gear icons"></i>Nom de l'école:</p>
                </div>
                <div class="col-12 col-md-8">
                    <p class="data"> {{ $information->nom }} </p>
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-md-4">
                    <p class="titre"><i class="bi bi-geo-alt icons"></i>Adresse:</p>
                </div>
                <div class="col-12 col-md-8">
                    <p class="data"> {{ $information->adresse }} </p>
                </div>
            </div>

            {{-- <div class="row">
                <div class="col-12 col-md-4">
                    <p class="titre"><i class="bi bi-map icons"></i>Localisation sur google-map (src):</p>
                </div>
                <div class="col-12 col-md-8">
                    <p class="data"> {{ $information->localisation }} </p>
                </div> 
            </div> --}}

            <div class="row">
                <div class="col-12 col-md-4">
                    <p class="titre"><i class="bi bi-envelope-at icons"></i>E-Mail:</p>
                </div>
                <div class="col-12 col-md-8">
                    <p class="data"> {{ $information->email }} </p>
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-md-4">
                    <p class="titre"><i class="bi bi-calendar-date icons"></i>Les heures de travail:</p>
                </div>
                <div class="col-12 col-md-8">
                    <p class="data"> {{ $information->heure_travail }} </p>
                </div>
            </div>
        </div>

        <div class="col-md-4" id="droite">
            <div class="col-12">
                <p class="titre"><i class="bi bi-file-image icons"></i>Logo:</p>
            </div>
            <div class="col-12" style="text-align: center;">
                <img src="{{ asset('storage/'.$information->logo ) }}" alt="..." class="img-fluid shadow" style="">
            </div>
        </div>


        {{-- bouton modifier --}}
        <div class="row fin-section">
            <div class="col-10 col-md-6 d-flex align-items-center">
                <h6>Modifier les informations de l'école :</h6>            
            </div>
            <div class="col-2 col-md-6 d-flex align-items-center">
                    <a href="{{ url('/admin/ecole/'.$information->id.'/edit') }}" class="btn btn-outline-primary alpa shadow"><i class="bi bi-pen"></i><span class="btn-description">Modifier</span></a>
            </div>
        </div>




@endforeach


<!-- row -->
    </div>
</div>
<!-- fin informations ecole -->



<hr>



<!-- Numéros de téléphones -->
<div class="container section">

<div class="row entete">
    <div class="col-2 col-md-1 d-flex align-items-center">
        <h4><i class="bi bi-buildings icons"></i></h4>
    </div>
    <div class="col-10 col-md-11 d-flex align-items-center">
        <h4>Numéros de téléphones :</h4>
    </div>
</div>


    @foreach($telephones as $telephone)
    <div class="row" style="margin-bottom: 20px;">
        <div class="col-5 col-md-3">
            <p class="titre"><i class="bi bi-telephone icons"></i>{{$telephone->operateur}}</p>
        </div>
        <div class="col-5 col-md-3">
            <p class="numeros data"> {{ $telephone->numero }} </p>
        </div>
        <div class="col-2 col-md-6">

                        <form action="{{ url('/admin/tel/'.$telephone->id.'/delete') }}" method="POST">
                        @csrf
                        @method('DELETE')
                                <a href="{{ url('/admin/tel/'.$telephone->id.'/edit') }}" class="btn btn-outline-primary alpa shadow"><i class="bi bi-pen"></i><span class="btn-description">Modifier</span></a>
                                <button type="submit" onclick="return confirm('Êtes vous sure?')" class="btn btn-outline-danger alpa shadow"><i class="bi bi-trash"></i><span class="btn-description">Supprimer</span></button>
                        </form>

        </div>
    </div>
    @endforeach

        {{-- bouton ajouter --}}
        <div class="row fin-section">
            <div class="col-10 col-md-6 d-flex align-items-center">
                <h6>Ajouter un nouveau numéro de téléphone :</h6>            
            </div>
            <div class="col-2 col-md-6 d-flex align-items-center">
                <a href="{{url('/admin/tel/nouveau')}}" class="btn btn-outline-success alpa shadow"><i class="bi bi-plus"></i><span class="btn-description">Ajouter</span></a>
            </div>
        </div>

<!-- fin Numéros de téléphones -->
</div>



<hr>



<!-- LIENS -->
<div class="container section">

<div class="row entete">
    <div class="col-2 col-md-1 d-flex align-items-center">
        <h4><i class="bi bi-buildings icons"></i></h4>
    </div>
    <div class="col-10 col-md-11 d-flex align-items-center">
        <h4>Liens vers vos comptes sur les réseaux sociaux :</h4>
    </div>
    {{-- <div class="col-12 col-md-3 d-flex align-items-center">
        <h6>
        <div class="row">
            <div class="col-2"><i class="bi bi-twitter"></i></div>
            <div class="col-2"><i class="bi bi-facebook"></i></div>
            <div class="col-2"><i class="bi bi-instagram"></i></div>
            <div class="col-2"><i class="bi bi-youtube"></i></div>
            <div class="col-2"><i class="bi bi-linkedin"></i></div>
            <div class="col-2"><i class="bi bi-tiktok"></i></div>
        </div>
        </h6>
    </div> --}}
</div>

@foreach($liens as $lien)
<div class="row">
    <div class="col-12">
        <p class="titre"><i class="bi bi-globe icons"></i>{{$lien->reseau_social}}</p>
    </div>
    <div class="col-10 col-md-6">

        <p class="data">Lien :<a href="{{url($lien->lien)}}" target="_blank">{{$lien->lien}}</a></p>
    </div>
    <div class="col-2 col-md-6">
        
        <form action="{{ url('/admin/lien/'.$lien->id.'/vider') }}" method="POST">
            @csrf
            @method('DELETE')
            
                     <a href="{{ url('/admin/lien/'.$lien->id.'/'.$lien->reseau_social) }}" class="btn btn-outline-primary alpa shadow"><i class="bi bi-pen"></i><span class="btn-description">Modifier</span></a>

                    <button type="submit" onclick="return confirm('Êtes vous sure?')" class="btn btn-outline-danger alpa shadow"><i class="bi bi-trash"></i><span class="btn-description">Supprimer</span></button>
            </form>
        

        
    </div>
</div>
@endforeach
<!-- fin LIENS -->
</div>



<hr>


<!-- Autres informations -->
<div class="container section">

<div class="row entete">
    <div class="col-2 col-md-1 d-flex align-items-center">
        <h4><i class="bi bi-buildings icons"></i></h4>
    </div>
    <div class="col-10 col-md-11 d-flex align-items-center">
        <h4>Autres informations :</h4>
    </div>
</div>

<div class="row">
    <div class="col-12 col-md-12">
        <p class="titre"><i class="bi bi-globe icons"></i>Banner d'acceuil sur le site web :</p>
    </div>
</div>

<div class="row">
@foreach($acceuils as $acceuil)
        <div class="col-12" style="background-image: url(  {{asset('storage/'.$acceuil->photo)}} );background-size: cover;background-repeat: no-repeat; text-align:center ;height:500px;padding-top:50px;padding-bottom:50px;">
          <div class="titres" style="height:100%;width:100%;padding:50px;text-align: center;background-color: #ffff;opacity: 0.6;">
            <h2>{{$acceuil->titre}}</h2>
            <p>
                {{$acceuil->sous_titre1}}
                <br>
                {{$acceuil->sous_titre2}}
            </p>
          </div>
        </div>
@endforeach
</div>
        {{-- bouton modifier --}}
        <div class="row fin-section">
            <div class="col-10 col-md-6 d-flex align-items-center">
                <h6>Modifier le Banner d'acceuil sur le site web :</h6>            
            </div>
            <div class="col-2 col-md-6 d-flex align-items-center">
                <a href="{{ url('/admin/ecole/acceuil/'.$acceuil->id.'/edit') }}" class="btn btn-outline-primary alpa shadow"><i class="bi bi-pen"></i><span class="btn-description">Modifier</span></a>
            </div>
        </div>


</div>

<!-- fin Autres informations -->


        </div></div>
{{-- fin container global --}}
</div>

{{-- pied page --}}
    <div class="container" id="pied-page">

    </div>


{{-- <style>

:root{
    font-size:16px;
}
    p{
        font-size: 1em;
    }
    .btn{
        margin-bottom: 3px;
    }
    
    .titre{
        font-size: 1,5em;
        font-weight: bold;
    }
    #global{
        background-color: white;
    }
    #pied-page{
        height: 100px;
    }
    .section{
        padding-top: 40px;
        padding-bottom: 40px;
    }
    .entete{
        margin-bottom: 30px;
    }
    .btn-description{
        padding-left: 8px;
    }
    .icons{
        padding-right: 8px;
    }
/* Extra small devices (portrait phones, less than 576px) */
    @media (max-width: 575.98px)
    { 
        .btn-description{
            display: none;
        }
    }
    .alpa:hover{
    box-shadow: 0 0 5px #383837;
    text-shadow: 0 0 5px #383837;
    }
    .numeros{
        font-family: Arial, Helvetica, sans-serif;
    }
</style> --}}



 {{-- <script>
var app=new Vue({
el:'#repertoire',
data:{
    telephones:[]
},
methods:{
    gettelephones: function(){
        axios.get('http://localhost:8000/admin/ecole')
        .then(response=>{
            console.log(response.data);
        })
        .catch(error=>{
            console.log('errors:',error);
        })
    }
},
mounted:function(){
        this.gettelephones();
}



});
</script>    --}}


@endsection

