@extends('layouts.admin_menu')
@section('content')

<script>
    function previewImage(){
        var file = document.getElementById("validationServer06").files;
        if ( file.length > 0 ) {
            var fileReader = new FileReader();

            fileReader.onload = function (event){
                document.getElementById("preview").setAttribute("src", event.target.result)
            };
            fileReader.readAsDataURL(file[0]);
        }
    }
    </script>


<div class="container" id="titre-page">
    <div class="row">
        <div class="col-2 d-flex align-items-center">
            <a href="{{ url('/admin/ecole/presentation') }}" class="btn btn-dark"><i class="bi bi-arrow-left"></i><span class="btn-description">Retour</span></a>
        </div>
        <div class="col-10 d-flex align-items-center">
            <h2>Ajouter un nouveau bloc de présentation</h2>
        </div>
    </div>
</div>

<div class="container">

<div class="row">
        <div class="col-md-12">
        <div class="card shadow" style="background-color: #ffff;">
                {{-- <div class="card-header"style="text-align:center;">
                  <a style="font-size: 20px;">Nouveau bloc de présentation</a>
                </div> --}}
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
        <input type="file" name="photo" class="form-control @if($errors->get('photo')) is-invalid @endif" id="validationServer06" accept="image/*" onchange="previewImage();">
        {{-- <input type="file" name="photo" id="validationServer06" class="form-control @if($errors->get('photo')) is-invalid @endif"> --}}
                <div id="validationServer06Feedback" class="invalid-feedback">
                    @if($errors->get('photo'))
                    @foreach($errors->get('photo') as $message)
                    {{ $message }}
                    @endforeach
                    @endif
                </div>

        <div class="col-12" style="text-align: center;">
        <img src="" class="img-fluid rounded" alt="" style="width:100%; margin-top: 15px;margin-bottom: 15px;" id="preview">
        </div>

    </div>


    <br>
    <div class="form-group row justify-content-center text-center">
        <div class="col-6">
            <button type="submit" class="btn btn-outline-success alpa shadow"><i class="bi bi-check2"></i><span
                    class="btn-description">Enregistrer</span></button>
        </div>
        <div class="col-6">
            <a class="btn btn-outline-danger alpa shadow" href="{{ '/admin/ecole/presentation' }}"><i
                    class="bi bi-x"></i><span class="btn-description">Annuler</span></a>
        </div>
    </div>



    </form>

    </div>
    </div>

    </div>
</div>


</div>
{{-- footer  --}}
<div class="container" id="pied-page">
@endsection
