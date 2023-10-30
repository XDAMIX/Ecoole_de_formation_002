@extends('layouts.admin_menu')
@section('content')

<div class="container" style="padding-top: 10px;">
                                <!-- Page Heading -->
                                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                                    <a class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" href="{{'/admin'}}" id="btn-retour"><i class="fa-solid fa-house"></i> Acceuil</a>
                                    <h1 class="h3 mb-0 text-gray-800">PUBS</h1>
                                </div>

<div class="row">


@foreach($banners as $banner)

<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12" style="margin-bottom: 10px;">

<div class="card">
  <img src="{{ asset('storage/'.$banner->photo )}}" class="card-img-top" alt="..." style="height:100%;">
  <div class="card-body">
    <div class="form-group row">
    <div class="col-sm-6 mb-3 mb-sm-0">
    <label>Titre:</label>
    <h4 class="card-title">{{$banner->titre}}</h4>
    </div>
    <div class="col-sm-6 mb-3 mb-sm-0">
    <label>Date de la création:</label>
    <p class="card-text">{{$banner->created_at}}</p>
    </div>
</div>
    <div style="text-align: center;align-items:center;">

            {{-- bouttons --}}
                    <div class="form-group row" id="double-btn">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <a href="{{ url('/admin/banners/'.$banner->id.'/edit') }}" class="btn btn-primary btn-block btn-circle" style="margin-bottom: 5px;" ><i class="bi bi-pen"></i>Modifier</a>
                        </div>
                        <div class="col-sm-6">
                            <form id="delete-form" action="{{ url('/admin/banners/'.$banner->id.'/delete') }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Êtes vous sure de vouloir supprimer la pub?')" class="btn btn-danger btn-block btn-circle"><i class="bi bi-trash3"></i>Supprimer</button>
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



@endsection


<style>
    i{
        margin-right: 3px;
    }
</style>


