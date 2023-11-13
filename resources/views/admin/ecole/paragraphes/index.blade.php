@extends('layouts.admin_menu')
@section('content')


<div class="container" id="titre-page">
    <div class="row">
        <div class="col-2 d-flex align-items-center">
            <a href="{{ url('/admin/') }}" class="btn btn-dark"><i class="bi bi-house"></i><span class="btn-description">Acceuil</span></a>
        </div>
        <div class="col-10 d-flex align-items-center">
            <h2>Présentation de l'école</h2>
        </div>
    </div>
</div>


<div class="container-fluid" id="global" style="margin-top:20px;margin-bottom: 20px;">

<div class="container">

{{-- <div class="row">
    <a href="/admin/ecole/presentation/nouveau" class="btn btn-success">Nouveau</a>
</div> --}}

@foreach($paragraphes as $paragraphe)
    <div class="row section">

        <div class="col-md-12 entete" style="text-align: center;">
            <h3 class="titre">{{$paragraphe->titre}}</h3>
        </div>

        <div class="col-md-6">
            <img src="{{url('storage/'.$paragraphe->photo)}}" class="img-fluid" alt="image">
        </div>
        <div class="col-md-6">
            <h5 class="titre" style="padding-top: 15px; ">{{$paragraphe->sous_titre}}</h5>
            <p class="data">{{$paragraphe->paragraphe}}</p>
        </div>

        <div class="col-md-12" style="text-align: center;margin-top :20px;">
                    <form action="{{ url('/admin/ecole/presentation/'.$paragraphe->id.'/delete') }}" method="POST">
                    @csrf
                    @method('DELETE')
                             
                             <a href="{{ url('/admin/ecole/presentation/'.$paragraphe->id.'/edit') }}" class="btn btn-outline-primary alpa"><i class="bi bi-pen"></i><span class="btn-description">Modifier</span></a>
                          
                            <button type="submit" onclick="return confirm('Êtes vous sure?')" class="btn btn-outline-danger alpa"><i class="bi bi-trash"></i><span class="btn-description">Supprimer</span></button>

                    </form>


        </div>
    </div>
<hr>
@endforeach

            {{-- bouton ajouter --}}
            <div class="row fin-section" style="padding-bottom: 50px;">
                <div class="col-10 col-md-6 d-flex align-items-center">
                    <h6>Ajouter un nouveau bloc de présentation :</h6>            
                </div>
                <div class="col-2 col-md-6 d-flex align-items-center">
                    <a href="{{url('/admin/ecole/presentation/nouveau')}}" class="btn btn-outline-success alpa"><i class="bi bi-plus"></i><span class="btn-description">Ajouter</span></a>
                </div>
            </div>


</div>

</div>


{{-- pied page --}}
<div class="container" id="pied-page">

</div>

@endsection
