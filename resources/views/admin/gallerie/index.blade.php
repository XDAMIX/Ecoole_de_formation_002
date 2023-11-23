@extends('layouts.admin_menu')
@section('content')



{{-- retour à l'acceuil  --}}
<div class="container" id="titre-page">
    <div class="row">
        <div class="col-2 d-flex align-items-center">
            <a href="{{ url('/admin/') }}" class="btn btn-dark"><i class="bi bi-house"></i><span class="btn-description">Acceuil</span></a>
        </div>
        <div class="col-10 d-flex align-items-center">
            <h2>Actualités</h2>
        </div>
    </div>
</div>



<div class="container" style="padding-top: 10px;">
    <div class="row">


        @foreach($photos as $photo)
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 animate__animated animate__backInLeft" style="margin-bottom: 10px;">

            <div class="card shadow">
                <div class="" style="background-image: url({{ asset('storage/'.$photo->photo )}} );background-size: cover;background-position: center;background-repeat: no-repeat;  height:400px; width:100%;border-top-left-radius: 5px;border-top-right-radius: 5px;"></div>
              {{-- <img src="{{ asset('storage/'.$photo->photo )}}" class="card-img-top" alt="..." style="height:100%;"> --}}
              <div class="card-body">
                <div class="form-group row">
                <div class="col-sm-12 mb-3 mb-sm-0 text-center">
                <label>Titre:</label>
                <h4 class="card-title">{{$photo->titre}}</h4>
                </div>
                <div class="col-sm-6 mb-3 mb-sm-0 text-center">
                <label>Emplaçement:</label>
                <h4 class="card-title">{{$photo->emplacement}}</h4>
                </div>
                <div class="col-sm-6 mb-3 mb-sm-0 text-center">
                <label>Duré:</label>
                <p class="card-text">{{$photo->dure}}</p>
                </div>
            </div>
                <div style="text-align: center;align-items:center;">
            
                        {{-- bouttons --}}
                                <div class="form-group row" id="double-btn">
                                    <div class="col-6 col-sm-6 mb-3 mb-sm-0">
                                        <a href="{{ url('/admin/gallerie/'.$photo->id.'/edit') }}" class="btn btn-outline-primary alpa shadow" style="margin-bottom: 5px;" ><i class="bi bi-pen"></i> <span class="btn-description">Modifier</span></a>
                                    </div>
                                    <div class="col-6 col-sm-6">
                                        <form id="delete-form" action="{{ url('/admin/gallerie/'.$photo->id.'/delete') }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" onclick="return confirm('Êtes vous sure de vouloir supprimer l''''actualité?')" class="btn btn-outline-danger alpa shadow"><i class="bi bi-trash3"></i> <span class="btn-description">Supprimer</span></button>
                                        </form>
            
                                    </div>
                                </div>
                        {{-- bouttons         --}}
            
            
                </div>
              </div>
            
            </div>
            
            </div>

        @endforeach


    </div>
</div>

{{-- footer  --}}
<div class="container" id="pied-page">

@endsection
