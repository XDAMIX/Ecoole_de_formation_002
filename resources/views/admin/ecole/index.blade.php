@extends('layouts.admin_menu')
@section('content')

<div class="container" style="padding-top: 10px;">





<!-- informations ecole -->
<div class="container">
<h3><i class="bi bi-buildings"></i>Informations de l'école:</h3>
<div class="row">
@foreach($informations as $information)
<div class="col-md-2">
<i class="bi bi-building-gear"></i><p>Nom de l'école:</p>
</div>
<div class="col-md-10">
<p> {{ $information->nom }} </p>
</div>

<div class="col-md-2">
<i class="bi bi-geo-alt"></i><p>Adresse:</p>
</div>
<div class="col-md-10">
<p> {{ $information->adresse }} </p>
</div>

<!-- <div class="col-md-2">
<i class="bi bi-map"></i><p>Localisation sur google-map (src):</p>
</div>
<div class="col-md-10" style="font: size 2vw;">
<p> {{ $information->localisation }} </p>
</div> -->

<div class="col-md-2">
<i class="bi bi-envelope-at"></i><p>E-Mail:</p>
</div>
<div class="col-md-10">
<p> {{ $information->email }} </p>
</div>

<div class="col-md-2">
<i class="bi bi-calendar-date"></i><p>Les heures de travail:</p>
</div>
<div class="col-md-10">
<p> {{ $information->heure_travail }} </p>
</div>

<div class="col-md-2">
<i class="bi bi-file-image"></i><p>Logo:</p>
</div>
<div class="col-md-10">
<img src="{{ asset('storage/'.$information->logo ) }}" alt="..." class="img-fluid" style="height: 200px; width:auto;">
</div>

@endforeach

<div class="col-md-12" style="text-align: center;">
<a href="{{ url('/admin/ecole/'.$information->id.'/edit') }}" class="btn btn-primary" style="margin-bottom: 10px;margin-top: 10px;"><i class="bi bi-pencil-square"></i>Modifier</a>
</div>
<!-- row -->
</div>
</div>
<!-- fin informations ecole -->



<hr>



<!-- Numéros de téléphones -->
<div class="container">

<div class="row">
    <div class="col-md-10">
    <h3><i class="bi bi-buildings"></i>Numéros de téléphones:</h3>
    </div>
    <div class="col-md-2">
    <a href="{{url('/admin/tel/nouveau')}}" class="btn btn-success" style="margin-bottom: 10px;"><i class="bi bi-plus-circle">Ajouter</a>
    </div>
</div>



    @foreach($telephones as $telephone)
    <div class="row">
    <div class="col-md-1">
        <p><i class="bi bi-telephone"></i></p>
    </div>
    <div class="col-md-1">
        <p>{{$telephone->operateur}} :</p>
    </div>
    <div class="col-md-3">
        <p> {{ $telephone->numero }} </p>
    </div>
    <div class="col-md-7">

                    <form action="{{ url('/admin/tel/'.$telephone->id.'/delete') }}" method="POST">
                    @csrf
                    @method('DELETE')
                            <a href="{{ url('/admin/tel/'.$telephone->id.'/edit') }}" class="btn btn-primary" style="margin-bottom: 5px;" ><i class="bi bi-pen"></i>Modifier</a>
                            <button type="submit" onclick="return confirm('Êtes vous sure?')" class="btn btn-danger"><i class="bi bi-trash3"></i>Supprimer</button>
                    </form>

    </div>
    </div>
    @endforeach


<!-- fin Numéros de téléphones -->
</div>



<hr>



<!-- LIENS -->
<div class="container">

<div class="row">
    <h3><i class="bi bi-buildings"></i>Liens vers vos comptes sur les réseaux sociaux:</h3>
</div>

@foreach($liens as $lien)
<div class="row">
    <div class="col-md-1">
    <p><i class="bi bi-globe"></i></p>
    </div>
    <div class="col-md-1">
    <p>{{$lien->reseau_social}}</p>
    </div>
    <div class="col-md-8">

    <p>Lien :<a href="{{url($lien->lien)}}" target="_blank">{{$lien->lien}}</a></p>
    </div>
    <div class="col-md-2">
    <a href="{{ url('/admin/lien/'.$lien->id.'/'.$lien->reseau_social) }}" class="btn btn-primary" style="margin-bottom: 10px;"><i class="bi bi-pencil-square">Modifier</a>
    </div>
</div>
@endforeach
<!-- fin LIENS -->
</div>



<hr>


<!-- Autres informations -->
<div class="container">

<div class="row">
<h3>autres informations:</h3>
</div>

<div class="row">
<div class="col-md-3">
<p><i class="bi bi-buildings"></i>Présentation de l'école:</p>
</div>
<div class="col-md-3">
<a href="/admin/ecole/presentation" class="btn btn-primary"><i class="bi bi-arrow-right"></i>Ouvrir</a>
</div>

<div class="col-md-3">
<p><i class="bi bi-image"></i>Image d'acceuil sur le site web:</p>
</div>
<div class="col-md-3">
<a href="/admin/ecole/acceuil" class="btn btn-primary"><i class="bi bi-arrow-right"></i>Ouvrir</a>
</div>
</div>

<!-- fin Autres informations -->
</div>




</div>





<style>
    h3{
        color:var(--color5);
    }
</style>



<!-- <script>
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
</script>     -->


@endsection

