@extends('layouts.admin_menu')
@section('content')

<div class="container" style="padding-top: 10px;">

<div class="row">
        <div class="col-md-12">
        <div class="card" style="background-color: #ffff;">
                <div class="card-header"style="text-align:center;">
                  <a style="font-size: 20px;"><i class="bi bi-person"></i>Nouveau paragraphe de présentation</a>
                </div>
                <div class="card-body">

     <form action="{{ url('/admin/ecole/presentation/save') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="">Titre:</label>
        <input type="text" name="titre" class="form-control @if($errors->get('titre')) is-invalid @endif" id="validationServer01" placeholder="le titre" value="{{ old('titre') }}">
                <div id="validationServer01Feedback" class="invalid-feedback">
                    @if($errors->get('titre'))
                    @foreach($errors->get('titre') as $message)
                    {{ $message }}
                    @endforeach
                    @endif
                </div>



    </div>

    <div class="form-group">
        <label for="">Sous titre:</label>
        <input type="text" name="sous_titre" class="form-control @if($errors->get('sous_titre')) is-invalid @endif" id="validationServer02" placeholder="le sous titre" value="{{ old('sous_titre') }}">
                <div id="validationServer02Feedback" class="invalid-feedback">
                    @if($errors->get('sous_titre'))
                    @foreach($errors->get('sous_titre') as $message)
                    {{ $message }}
                    @endforeach
                    @endif
                </div>
    </div>

    <div class="form-group">
        <label for="">Paragraphe:</label>
        <textarea type="text" name="paragraphe" class="form-control @if($errors->get('paragraphe')) is-invalid @endif" id="validationServer03" placeholder="le paragraphe" value="">{{ old('paragraphe') }}</textarea>
                <div id="validationServer03Feedback" class="invalid-feedback">
                    @if($errors->get('paragraphe'))
                    @foreach($errors->get('paragraphe') as $message)
                    {{ $message }}
                    @endforeach
                    @endif
                </div>
    </div>



    <div class="form-group">
        <label for="">Photo:</label>
        <input type="file" name="photo" id="validationServer06" class="form-control @if($errors->get('photo')) is-invalid @endif">
                <div id="validationServer06Feedback" class="invalid-feedback">
                    @if($errors->get('photo'))
                    @foreach($errors->get('photo') as $message)
                    {{ $message }}
                    @endforeach
                    @endif
                </div>
    </div>

    <br>
    <div class="form-group">
        <input type="submit" class="form-control btn btn-success" value="Enregistrer">
    </div>
    <br>
    <div class="">
        <a href="{{ url('/admin/ecole/presentation') }}" class="btn btn-secondary">Annuler</a>
    </div>

    </form>

    </div>
    </div>

    </div>
</div>


</div>

@endsection
