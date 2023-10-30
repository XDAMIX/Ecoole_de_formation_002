@extends('layouts.admin_menu')
@section('content')

<div class="container" style="padding-top: 10px;">

@foreach($acceuils as $acceuil)
        <div class="container" style="background-image: url(  {{asset('storage/'.$acceuil->photo)}} );background-size: cover;background-repeat: no-repeat; text-align:center ;height:500px;padding-top:50px;">
          <div class="titres" style="width:100%;padding:50px;text-align: center;background-color: #ffff;opacity: 0.8;">
            <h2>{{$acceuil->titre}}</h2>
            <p>
                {{$acceuil->sous_titre1}}
                <br>
                {{$acceuil->sous_titre2}}
            </p>
            <a href="{{ url('/admin/ecole/acceuil/'.$acceuil->id.'/edit') }}" class="btn btn-primary" style="margin-top: 70x;">Modifier</a>
          </div>
        </div>
@endforeach
        <div class="container" style="margin-top: 20px;">
                <a href="/admin/ecole" class="btn btn-secondary">Retour</a>
        </div>

</div>

@endsection

