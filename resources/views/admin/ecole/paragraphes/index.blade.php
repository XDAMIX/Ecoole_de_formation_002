@extends('layouts.admin_menu')
@section('content')

<div class="container" style="padding-top: 10px;">

<div class="container">
<div class="row">
    <a href="/admin/ecole/presentation/nouveau" class="btn btn-success">Nouveau</a>
</div>

@foreach($paragraphes as $paragraphe)
    <div class="row">

        <div class="col-md-12" style="text-align: center;">
            <h3 class="titre">{{$paragraphe->titre}}</h3>
        </div>

        <div class="col-md-6">
            <img src="{{url('storage/'.$paragraphe->photo)}}" class="img-fluid" alt="image">
        </div>
        <div class="col-md-6">
            <h5 class="stitre">{{$paragraphe->sous_titre}}</h5>
            <p class="paragraph">{{$paragraphe->paragraphe}}</p>
        </div>

        <div class="col-md-12" style="text-align: center;">
                    <form action="{{ url('/admin/ecole/presentation/'.$paragraphe->id.'/delete') }}" method="POST">
                    @csrf
                    @method('DELETE')
                             <a href="{{url('/admin/ecole/presentation/'.$paragraphe->id.'/edit')}}" class="btn btn-primary">Modifier</a>
                            <button type="submit" onclick="return confirm('Êtes vous sure?')" class="btn btn-danger"><i class="bi bi-trash3"></i>Supprimer</button>
                    </form>


        </div>
    </div>
@endforeach



</div>

</div>

@endsection
