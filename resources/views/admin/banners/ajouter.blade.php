@extends('layouts.admin_menu')
@section('content')


<div class="container" style="margin-top: 10px;" >

    <div class="row">

        <div class="card">
            <div class="card-header">
                <h5>Nouvelle Publicité :</h5>
              </div>

              <div class="card-body">
                <img id="imagePreview" class="card-img-top" src="" alt="l'image n'a pas été sélectionné!">
                <hr>

                <form action="{{ url('/admin/banners/save') }}" method="POST" enctype="multipart/form-data" class="user">
                @csrf
                <div class="form-group" >
                    <label for="titre">Titre de la pub:</label>
                    <input name="titre" type="text" placeholder="titre" class="form-control @if($errors->get('titre')) is-invalid @endif" required id="validationTitre">
                    <div id="validationTitreFeedback" class="invalid-feedback">
                        @if($errors->get('titre'))
                              @foreach($errors->get('titre') as $message)
                                 {{ $message }}
                            @endforeach
                        @endif
                    </div>
               </div>
                <div class="form-group" >
                    <label for="photo">Sélectionner la photo de la pub:</label>
                    {{-- <input name="photo" type="file" class="form-control @if($errors->get('photo')) is-invalid @endif" required  id="validationPhoto" Accept="image/*" onchange="previewImage();"> --}}
                    <input name="photo" type="file" class="form-control @if($errors->get('photo')) is-invalid @endif" required  id="validationPhoto" Accept="image/*" placeholder="veuillez choisir une image"  >
                    <div id="validationPhotoFeedback" class="invalid-feedback">
                        @if($errors->get('photo'))
                              @foreach($errors->get('photo') as $message)
                                 {{ $message }}
                            @endforeach
                        @endif
                    </div>
               </div>

               {{-- bouttons --}}
               <div class="form-group row" id="double-btn">
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <button type="submit" class="btn btn-success btn-block btn-circle"><i class="fa-solid fa-floppy-disk"></i>Enregistrer</button>
                </div>
                <div class="col-sm-6">
                    <a class="btn btn-primary btn-block btn-circle" href="{{'/admin/banners'}}"><i class="fa-solid fa-ban"></i>Annuler</a>
                </div>
                </div>
                {{-- bouttons --}}

                </form>
            </div>

          </div>


<script>
            // affichage de l'image
                // --------------------------------------------------------------------------------------

                // Sélection de l'élément input
                const input = document.getElementById('validationPhoto');

                // Écoute de l'événement 'change' sur l'input
                input.addEventListener('change', function() {
                  // Vérification s'il y a un fichier sélectionné
                  if (input.files && input.files[0]) {
                    // Création d'un objet FileReader
                    const reader = new FileReader();

                    // Événement 'load' déclenché lorsque la lecture est terminée
                    reader.onload = function(e) {
                      // Mise à jour de l'attribut src de l'élément img avec les données de l'image
                      document.getElementById('imagePreview').src = e.target.result;
                    };

                    // Lecture du contenu de l'image en tant que URL de données
                    reader.readAsDataURL(input.files[0]);
                  }
                });


            // choix de l'image
                // -----------------------------------------------------------------------------------------

                // Sélection de l'élément img
                const imagePreview = document.getElementById('imagePreview');

                // Écoute de l'événement 'click' sur l'image
                imagePreview.addEventListener('click', function() {
                  // Clic sur l'élément input
                  document.getElementById('validationPhoto').click();
                });

</script>

<style>
    i{
        margin-right: 10px;
    }
</style>


@endsection




