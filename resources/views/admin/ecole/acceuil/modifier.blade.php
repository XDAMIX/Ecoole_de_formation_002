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

<div class="container" style="padding-top: 10px;">
    <div class="row">
        <div class="col-md-12">
        <div class="card" style="background-color: #ffff;">
                <div class="card-header"style="text-align:center;">
                  <a style="font-size: 20px;"><i class="bi bi-person"></i>Modifier l'acceuil sur le site web:'</a>
                </div>
                <div class="card-body">

     <form action="{{ url('/admin/ecole/acceuil/'.$acceuil->id.'/update') }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label for="">Titre:</label>
        <input type="text" name="titre" class="form-control @if($errors->get('titre')) is-invalid @endif" id="validationServer01" placeholder="le titre" value="{{ $acceuil->titre }}">
                <div id="validationServer01Feedback" class="invalid-feedback">
                    @if($errors->get('titre'))
                    @foreach($errors->get('titre') as $message)
                    {{ $message }}
                    @endforeach
                    @endif
                </div>
    </div>

    <div class="form-group">
        <label for="">SousTitre1:</label>
        <input type="text" name="stitre1" class="form-control @if($errors->get('titre')) is-invalid @endif" id="validationServer02" placeholder="le titre" value="{{ $acceuil->sous_titre1 }}">
                <div id="validationServer02Feedback" class="invalid-feedback">
                    @if($errors->get('stitre1'))
                    @foreach($errors->get('stitre1') as $message)
                    {{ $message }}
                    @endforeach
                    @endif
                </div>
    </div>

    <div class="form-group">
        <label for="">SousTitre2:</label>
        <input type="text" name="stitre2" class="form-control @if($errors->get('titre')) is-invalid @endif" id="validationServer03" placeholder="le titre" value="{{ $acceuil->sous_titre2 }}">
                <div id="validationServer03Feedback" class="invalid-feedback">
                    @if($errors->get('stitre2'))
                    @foreach($errors->get('stitre2') as $message)
                    {{ $message }}
                    @endforeach
                    @endif
                </div>
    </div>


    <div class="form-group">
        <label for="">Photo:</label>
        <img src="{{ asset('storage/'.$acceuil->photo ) }}" class="img-fluid rounded" alt="" style="margin-top: 5px;margin-bottom: 5px;" id="preview">
        <input type="file" name="photo" class="form-control @if($errors->get('photo')) is-invalid @endif" id="validationServer06" accept="image/*" onchange="previewImage();" value="{{ $acceuil->photo }}">



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
        <a href="{{ url('/admin/ecole/acceuil') }}" class="btn btn-secondary">Annuler</a>
    </div>

</form>

                </div>
            </div>

        </div>
    </div>



    <!-- teste -->
    <!-- <div class="row" style="margin-top: 150px;margin-bottom: 150px;">
        <form action="">
        <input type="file" name="file" id="file" accept="image/*" onchange="previewImage();">
        <img src="vide" class="img-fluid rounded" alt="teste image upload and show" id="preview">
        </form>
    </div> -->
    <!-- teste -->


</div>


@endsection
